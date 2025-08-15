<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\YogaSession;
class YogaBookingController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();
        return view('yoga_sessions.index', compact('trainers'));
    }

    public function show(Trainer $trainer)
    {
        $trainer->load('yogaCategories.sessions');
        return view('yoga_sessions.show', compact('trainer'));
    }
    public function trainerSessions($trainer)
    {
        $trainer = Trainer::where('name', $trainer)->firstOrFail();
        $ysessions = YogaSession::where('trainer_id', $trainer->id)->get();
        return view('yoga_sessions.by_trainer', compact('trainer', 'ysessions'));
    }
}
