<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Trainer;
class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function store(Request $request)
    {
        Course::create($request->all());
        return back()->with('success', 'Course created successfully.');
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        return back()->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with('success', 'Course deleted successfully.');
    }


    public function userIndex()
    {
        $trainers = Trainer::all();
        return view('courses.index', compact('trainers'));
    }

    public function trainerCourses($trainer)
    {
        $trainer = Trainer::where('name', $trainer)->firstOrFail();
        $courses = Course::where('trainer', $trainer->name)->get();
        return view('courses.by_trainer', compact('trainer', 'courses'));
    }
}
