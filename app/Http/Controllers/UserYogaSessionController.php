<?php

namespace App\Http\Controllers;

use App\Models\YogaSession;
use App\Models\TimeSlot;
use App\Models\Booking;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;

class UserYogaSessionController extends Controller
{
    public function index() {
        $sessions = YogaSession::with('timeSlots')->get();
        return view('yoga_sessions.index', compact('sessions'));
    }

    public function show($id) {
        $session = YogaSession::with('timeSlots')->findOrFail($id);
        return view('yoga_sessions.show', compact('session'));
    }

    public function book(Request $request, $id) {
        $request->validate(['time_slot_id' => 'required|exists:time_slots,id']);

        $slot = TimeSlot::findOrFail($request->time_slot_id);
        $session = YogaSession::findOrFail($id);

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'yoga_session_id' => $session->id,
            'time_slot_id' => $slot->id,
            'amount' => $session->price,
            'status' => 'pending'
        ]);

        // Redirect to Razorpay
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create([
            'receipt' => $booking->id,
            'amount' => $session->price * 100,
            'currency' => 'INR'
        ]);

        return view('yoga_sessions.payment', compact('session', 'slot', 'booking', 'order'));
    }

    public function myBookings() {
        $bookings = Booking::with(['yogaSession', 'timeSlot'])->where('user_id', Auth::id())->latest()->get();
        return view('yoga_sessions.my_bookings', compact('bookings'));
    }
}