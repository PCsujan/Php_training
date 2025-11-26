<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('id', 'DESC')->get();
        return view('backend.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }


    public function store(Request $request)
    {
    
        $request->validate([
            'student_code' => 'required|unique:students,student_code',
            'first_name'   => 'required',
            'last_name'    => 'required',
            'gender'       => 'required|in:Male,Female,Other',
            'email'        => 'required|email|unique:students,email',
            'phone'        => 'required',
            'address'      => 'required',
            'qualification' => 'required',
        ]);


        Teacher::create($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }
}
