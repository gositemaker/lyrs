<?php


// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Mail\BookingConfirmed;
use App\Models\Availability;
use App\Models\Booking;
use App\Models\YogaSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    // AJAX/HTTP: compute available slots for a session & date
    public function slots(YogaSession $session, Request $request)
    {
        $request->validate(['date' => ['required','date']]);
        $date = Carbon::parse($request->date)->toDateString();
        $trainerId = $session->trainer_id;

        $windows = Availability::where('trainer_id', $trainerId)
            ->whereDate('date', $date)->get();

        $duration = $session->durationMinutes();   // minutes
        $buffer   = 30;                             // minutes
        $taken = Booking::where('trainer_id', $trainerId)
            ->where('date', $date)
            ->get(['start_time','end_time']);

        $takenRanges = $taken->map(fn($b) => [
            'start' => Carbon::parse($b->start_time),
            'end'   => Carbon::parse($b->end_time),
        ]);

        $slots = [];
        foreach ($windows as $w) {
            $s = Carbon::parse($w->start_time);
            $e = Carbon::parse($w->end_time);

            while ($s->copy()->addMinutes($duration)->lte($e)) {
                $slotStart = $s->copy();
                $slotEnd   = $s->copy()->addMinutes($duration);

                // prevent overlap with existing bookings
                $overlap = $takenRanges->first(function ($r) use ($slotStart,$slotEnd) {
                    return $slotStart < $r['end'] && $slotEnd > $r['start'];
                });

                if (!$overlap) {
                    $slots[] = [
                        'label' => $slotStart->format('H:i') . ' - ' . $slotEnd->format('H:i'),
                        'start' => $slotStart->format('H:i'),
                        'end'   => $slotEnd->format('H:i'),
                    ];
                }

                // move pointer by duration + buffer
                $s = $slotEnd->copy()->addMinutes($buffer);
            }
        }

        return response()->json(['slots' => $slots]);
    }

    // POST booking (login required)
    public function store(YogaSession $session, Request $request)
    {
        $this->middleware('auth');
        $data = $request->validate([
            'date'       => ['required','date'],
            'start_time' => ['required','date_format:H:i'],
            'end_time'   => ['required','date_format:H:i','after:start_time'],
        ]);

        $trainerId = $session->trainer_id;
        $date      = $data['date'];

        // Final server-side guard: ensure slot is still free
        $exists = Booking::where('trainer_id', $trainerId)
            ->where('date', $date)
            ->where(function($q) use ($data) {
                $q->whereBetween('start_time', [$data['start_time'], $data['end_time']])
                  ->orWhereBetween('end_time', [$data['start_time'], $data['end_time']])
                  ->orWhere(function($q2) use ($data){
                      $q2->where('start_time','<=',$data['start_time'])
                         ->where('end_time','>=',$data['end_time']);
                  });
            })->exists();

        if ($exists) {
            return back()->withErrors('This slot has just been taken. Please choose another.');
        }

        // (Payment) Here you would redirect to Stripe/Razorpay and only create booking after payment succeeds.
        // For now we create directly as paid.
        $booking = DB::transaction(function () use ($session, $data, $request) {
            return Booking::create([
                'yoga_session_id' => $session->id,
                'trainer_id'      => $session->trainer_id,
                'user_id'         => $request->user()->id,
                'date'            => $data['date'],
                'start_time'      => $data['start_time'],
                'end_time'        => $data['end_time'],
                'status'          => 'confirmed',
                'payment_method'  => 'online',
                'payment_status'  => 'paid',
                'amount'          => $session->price,
            ]);
        });

        // Emails
        try {
            Mail::to($session->trainer->email)->send(new BookingConfirmed($booking));
            Mail::to($request->user()->email)->send(new BookingConfirmed($booking));
        } catch (\Throwable $e) {
            // swallow or log
        }

        return redirect()->route('booking.success', $booking)->with('success', 'Your session is booked!');
    }

    public function success(Booking $booking)
    {
       // $this->authorize('view', $booking); // optional policy
        return view('yoga_sessions.success', compact('booking'));
    }

    public function middleware()
    {
        return ['auth'];
    }
}
