<?php

namespace App\Http\Controllers;

use App\Models\YogaSession;
use App\Models\TimeSlot;
use App\Models\User;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AdminTimeSlotController extends Controller
{
    public function index($sessionId)
    {
        $session = YogaSession::findOrFail($sessionId);
        $slots = $session->timeSlots()->with('trainer')->get();
        return view('admin.time_slots.index', compact('session', 'slots'));
    }

    public function create($sessionId)
    {
        $session = YogaSession::findOrFail($sessionId);
        $trainers = Trainer::all(); 
        return view('admin.time_slots.create', compact('session', 'trainers'));
    }

    public function store(Request $request, $sessionId)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'trainer_id' => 'required|exists:users,id',
        ]);

        TimeSlot::create([
            'yoga_session_id' => $sessionId,
            'trainer_id' => $request->trainer_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('admin.time_slots.index', $sessionId)->with('success', 'Time slot added.');
    }

    public function destroy($sessionId, $slotId)
    {
        $slot = TimeSlot::where('id', $slotId)->where('yoga_session_id', $sessionId)->firstOrFail();
        $slot->delete();
        return back()->with('success', 'Slot deleted.');
    }
}
