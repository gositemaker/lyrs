<?php

// app/Http/Controllers/Admin/AvailabilityController.php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Models\Booking;
class AdminAvailabilityController extends Controller
{
    // simple page to add day windows and list existing
public function index(Request $request) { 
    // If you use roles, confirm the logged-in admin/trainer here. 
    $trainerId = $request->get('trainer_id'); 
    // optional filter 
    $trainers = Trainer::orderBy('name')->get(); 
    $availabilities = Availability::with('trainer') ->when($trainerId, fn($q) => $q->where('trainer_id', $trainerId)) ->orderBy('date','asc')->orderBy('start_time','asc')->paginate(20); 
    return view('admin.availability.index', compact('trainers','availabilities','trainerId')); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'trainer_id' => ['required','exists:trainers,id'],
            'date'       => ['required','date'],
            'start_time' => ['required','date_format:H:i'],
            'end_time'   => ['required','date_format:H:i','after:start_time'],
        ]);
        $trainerId = $request->trainer_id;
        $date      = $request->date; // expect a date field (Y-m-d)
        $start     = $request->start_time;
        $end       = $request->end_time;
        $overlap = Availability::where('trainer_id', $trainerId)
        ->where('date', $date)
        ->where(function ($query) use ($start, $end) {
            $query->whereBetween('start_time', [$start, $end])
                  ->orWhereBetween('end_time', [$start, $end])
                  ->orWhere(function ($q) use ($start, $end) {
                      $q->where('start_time', '<=', $start)
                        ->where('end_time', '>=', $end);
                  });
        })
        ->exists();

        if ($overlap) {
            return redirect()->back()->with('error', 'Trainer already has availability in this time slot on ' . $date);
        }
        Availability::create($data);
        return back()->with('success', 'Availability added.');
    }

    // public function destroy(Availability $availability)
    // {
    //     $availability->delete();
    //     return back()->with('success','Availability removed.');
    // }

    // public function index() {
    //     $trainers = Trainer::all();
    //     $availabilities = Availability::with('trainer')->orderBy('date')->get();
    //     return view('admin.availability.index', compact('trainers','availabilities'));
    // }
    

// public function store(Request $request)
// {


//     $trainerId = $request->trainer_id;
//     $start     = $request->start_time;
//     $end       = $request->end_time;

//     // Check overlap
//     $overlap = Availability::where('trainer_id', $trainerId)
//         ->where(function ($query) use ($start, $end) {
//             $query->whereBetween('start_time', [$start, $end])
//                   ->orWhereBetween('end_time', [$start, $end])
//                   ->orWhere(function ($q) use ($start, $end) {
//                       $q->where('start_time', '<=', $start)
//                         ->where('end_time', '>=', $end);
//                   });
//         })
//         ->exists();

//     if ($overlap) {
//         return redirect()->back()->with('error', 'Trainer already has a session in this time slot!');

//         //return back()->withErrors(['time' => 'This trainer already has availability within that time range.']);
//     }

//     Availability::create([
//         'trainer_id' => $trainerId,
//         'start_time' => $start,
//         'end_time'   => $end,
//     ]);

//     return redirect()->back()->with('success', 'Availability added successfully');
// }

    // app/Http/Controllers/Admin/AvailabilityController.php

// app/Http/Controllers/Admin/AvailabilityController.php

public function calendar(Request $request)
{
    $events = [];
    $trainerId = $request->trainer_id;

    // ✅ Filter availabilities
    $availabilities = Availability::with('trainer')
        ->when($trainerId, fn($q) => $q->where('trainer_id', $trainerId))
        ->get();

    foreach ($availabilities as $a) {
        $events[] = [
            'title' => 'Available: ' . $a->trainer->name,
            'start' => $a->start_time->format('Y-m-d\TH:i:s'),
            'end'   => $a->end_time->format('Y-m-d\TH:i:s'),
            'color' => '#28a745'
        ];
    }

    // ✅ Filter bookings
    $bookings = Booking::with('trainer','session')
        ->when($trainerId, fn($q) => $q->where('trainer_id', $trainerId))
        ->get();

    foreach ($bookings as $b) {
        $events[] = [
            'title' => "Booked: " . $b->trainer->name . " - " . $b->session->name,
            'start' => $b->start_time->format('Y-m-d\TH:i:s'),
            'end'   => $b->end_time->format('Y-m-d\TH:i:s'),
            'color' => '#dc3545' // red
        ];
    }

    return response()->json($events);
}

public function view()
{
    $trainers = Trainer::all();
    return view('admin.availability.calendar', compact('trainers'));
}
public function create()
{
    $trainers = Trainer::orderBy('name')->get();
    return view('admin.availability.create', compact('trainers'));
}
public function update(Request $request, $id)
{


    $availability = Availability::findOrFail($id);
    $availability->update($request->all());

    return redirect()->route('admin.availability.index')->with('success','Availability updated');
}

public function destroy($id)
{
    $availability = Availability::findOrFail($id);
    $availability->delete();

    return redirect()->route('admin.availability.index')->with('success','Availability deleted');
}
}
