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
        $validated = $request->validate([
            'name'        => 'required|string',
            'trainer'    => 'required|string', 
            'level'       => 'required|string',
            'type'    => 'required|string',   // saving category name not id
            'description' => 'nullable|string',
            'duration'    => 'required|string',
            'price'       => 'required|numeric',
            'certification'  => 'required',
            'status'      => 'required',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('course', 'public');
        }

        Course::create($validated);
        return redirect()->route('admin.courses.index')
                         ->with('success', 'Course created successfully');
        
    }

    public function update(Request $request, $course)
    {
        $course = Course::findOrFail($course);
    
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'trainer'       => 'required|string|max:255', 
            'level'         => 'required|string|max:100',
            'type'          => 'required|string|max:100',
            'description'   => 'nullable|string',
            'duration'      => 'required|string|max:100',
            'price'         => 'required|numeric',
            'certification' => 'required|string|max:255',
            'status'        => 'required|string', // let’s just accept string (Active/Inactive)
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            if ($course->image && \Storage::disk('public')->exists($course->image)) {
                \Storage::disk('public')->delete($course->image);
            }
            $validated['image'] = $request->file('image')->store('course', 'public');
        }
    
        $course->update($validated);
    
        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully.');
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
