<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        // $courses = Courses::all();
        // dd($courses);
        $courses = Course::with('students')->get();
        return view('backend.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('backend.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_code'     => 'required|unique:courses,course_code',
            'course_name'     => 'required',
            'duration_years'  => 'required|integer',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'courses created successfully.');
    }

    public function edit($id)
    {
        // Course fetch
        $course = Course::findOrFail($id);

        // Return edit view with the course data
        return view('backend.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        // Find the course by ID
        $course = Course::findOrFail($id);

        // Validation rules
        $request->validate([
            'course_name'    => 'required',
            'course_code'    => 'required|unique:courses,course_code,' . $id,
            'duration_years' => 'required|integer',
        ]);

        // Update the course
        $course->update([
            'course_name'    => $request->course_name,
            'course_code'    => $request->course_code,
            'duration_years' => $request->duration_years,
        ]);

        // Redirect back with success message
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }


    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'course deleted successfully.');
    }
}
 // $courses = Courses::orderBy('id', 'DESC')->get();
        // return view('backend.courses.index', compact('courses'));