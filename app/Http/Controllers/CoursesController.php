<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Courses;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::orderBy('id', 'DESC')->get();
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

        Courses::create($request->all());

        return redirect()->route('courses.index')->with('success', 'courses created successfully.');
    }
}
