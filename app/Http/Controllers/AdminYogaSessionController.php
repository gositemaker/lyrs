<?php

namespace App\Http\Controllers;

use App\Models\YogaSession;
use App\Models\YogaCategory;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Models\Trainer;
class AdminYogaSessionController extends Controller
{
    // List all sessions
    public function index() {
        $sessions = YogaSession::with(['trainer'])->latest()->get();
        return view('admin.yoga_sessions.index', compact('sessions'));
    }

    // Show create form
    public function create()
    {
        $trainers   = Trainer::orderBy('name')->get();
        $categories = YogaCategory::orderBy('name')->get();
        return view('admin.yoga_sessions.create', compact('trainers', 'categories'));
    }

    // Store new session
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string',
            'category'    => 'required|string',  // saving category name not id
            'description' => 'nullable|string',
            'duration'    => 'required|integer',
            'price'       => 'required|numeric',
            'trainer_id'  => 'required|exists:trainers,id',
            'status'      => 'required|in:Available,Booked',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('sessions', 'public');
        }

        YogaSession::create($validated);

        return redirect()->route('admin.yoga_sessions.index')
                         ->with('success', 'Session created successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $session    = YogaSession::findOrFail($id);
        $trainers   = Trainer::orderBy('name')->get();
        $categories = YogaCategory::orderBy('name')->get();

        return view('admin.yoga_sessions.edit', compact('session','trainers','categories'));
    }

    // Update session
    public function update(Request $request, $id)
    {
        $session = YogaSession::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string',
            'category'    => 'required|string',
            'description' => 'nullable|string',
            'duration'    => 'required|integer',
            'price'       => 'required|numeric',
            'trainer_id'  => 'required|exists:trainers,id',
            'status'      => 'required|in:Available,Booked',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // remove old
            if ($session->image) {
                \Storage::disk('public')->delete($session->image);
            }
            $validated['image'] = $request->file('image')->store('sessions', 'public');
        }

        $session->update($validated);

        return redirect()->route('admin.yoga_sessions.index')
                         ->with('success', 'Session updated successfully');
    }

    // Delete session
    public function destroy($id)
    {
        $session = YogaSession::findOrFail($id);

        if ($session->image) {
            \Storage::disk('public')->delete($session->image);
        }

        $session->delete();

        return redirect()->route('admin.yoga_sessions.index')
                         ->with('success', 'Session deleted successfully');
    }

}

