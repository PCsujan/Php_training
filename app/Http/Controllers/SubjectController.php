<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Courses;
use App\Models\Teacher;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with(['course', 'teacher'])->orderBy('id', 'DESC')->get();
        return view('backend.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $courses = Courses::all();
        $teachers = Teacher::all();
        return view('backend.subjects.create', compact('courses', 'teachers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'course_id'     => 'required|exists:courses,id',
            'subject_name'  => 'required',
            'subject_code'  => 'required|unique:subjects,subject_code',
            'credit_hours'  => 'required|integer',
            'teacher_id'    => 'required|exists:teachers,id',
        ]);
        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'subject created successfully.');
    }
}
