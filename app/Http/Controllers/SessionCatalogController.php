<?php

// app/Http/Controllers/SessionCatalogController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\YogaSession;

class SessionCatalogController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();
        return view('yoga_sessions.index', compact('trainers'));
    }

    public function trainerSessions($trainer)
    {
        $trainer = Trainer::where('name', $trainer)->firstOrFail();
        $ysessions = YogaSession::where('trainer_id', $trainer->id)->get();
        return view('yoga_sessions.by_trainer', compact('trainer', 'ysessions'));
    }
    // public function trainerSessions($trainer)
    // {
    //     $trainer = Trainer::where('name', $trainer)->firstOrFail();
    
    //     // Load sessions with their category
    //     $ysessions = YogaSession::where('trainer_id', $trainer->id)
    //         ->with('category') // make sure YogaSession model has category() relation
    //         ->get()
    //         ->groupBy(function ($session) {
    //             return $session->category ? $session->category->name : 'Uncategorized';
    //         });
    
    //     return view('yoga_sessions.by_trainer', compact('trainer', 'ysessions'));
    // }
//     public function trainerSessions($trainer)
// {
//     $trainer = Trainer::where('name', $trainer)->firstOrFail();

//     $ysessions = YogaSession::with('category')
//         ->where('trainer_id', $trainer->id)
//         ->get()
//         ->groupBy(fn($session) => $session->category?->name ?? 'Uncategorized');

//     return view('yoga_sessions.by_trainer', compact('trainer', 'ysessions'));
// }

    
    // /sessions/{session} -> detail + booking widget
    public function show(YogaSession $session)
    {
        $trainer = $session->trainer;
        return view('yoga_sessions.show', compact('session','trainer'));
    }
}
