<?php

namespace App\Http\Controllers;

use App\Models\YogaSession;
use App\Models\YogaCategory;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Models\Trainer;
class AdminYogaSessionController extends Controller
{
    public function index() {
        
        //$sessions = YogaSession::with('timeSlots')->get();
        $sessions = YogaSession::with(['trainer', 'timeSlots'])->get();

        return view('admin.yoga_sessions.index', compact('sessions'));
    }

    public function create()
    {
        $trainers = Trainer::all(); // Fetch all trainers
        $categories = YogaCategory::where('type', 'session')->get();
        return view('admin.yoga_sessions.create', compact('categories', 'trainers'));
    }
    

    public function store(Request $request)
    {
        YogaSession::create($request->all());
        return back()->with('success', 'Session created successfully.');
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'category' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'duration' => 'required|integer',
        //     'price' => 'required|numeric',
        //     'trainer_id' => 'required|exists:trainers,id',
        //     'status' => 'required|in:Available,Booked',
        // ]);
    
        // YogaSession::create($validated);
    
        // return redirect()->route('admin.yoga_sessions.index')->with('success', 'Session created successfully.');
    }
    
    public function show($id)
    {
        // Eager load category, trainer, timeSlots, etc. if needed
        $session = YogaSession::with(['category', 'trainer', 'timeSlots'])->findOrFail($id);
    
        $categories = YogaCategory::all();
        $trainers = Trainer::all();
    
        return view('admin.yoga_sessions.show', compact('session', 'categories', 'trainers'));
    }
    
    // public function edit($id) {
    //     $session = YogaSession::with('timeSlots')->findOrFail($id);
    //     return view('admin.yoga_sessions.edit', compact('session'));
    // }
    public function edit($id)
    {
        //$session = YogaSession::findOrFail($id);
        $session = YogaSession::with('timeSlots')->findOrFail($id);
        $categories = YogaCategory::all();

        $trainers = Trainer::all();
        return view('admin.yoga_sessions.edit', compact('session', 'categories', 'trainers'));

        //return view('admin.yoga_sessions.edit', compact('session', 'trainers'));
    }
    
    public function update(Request $request, $id)
    {
        $session = YogaSession::findOrFail($id);
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
            'trainer_id' => 'required|exists:trainers,id',
            'status' => 'required|in:Available,Booked',
        ]);
    
        $session->update($validated);
    
        return redirect()->route('admin.yoga_sessions.index')->with('success', 'Session updated successfully.');
    }
    

    public function destroy($id) {
        YogaSession::findOrFail($id)->delete();
        return back()->with('success', 'Session deleted');
    }

    public function addSlot(Request $request, $id) {
        $request->validate(['start_time' => 'required|date']);
        TimeSlot::create(['yoga_session_id' => $id, 'start_time' => $request->start_time]);
        return back()->with('success', 'Slot added');
    }

    public function deleteSlot($id) {
        TimeSlot::findOrFail($id)->delete();
        return back()->with('success', 'Slot removed');
    }
}

