<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'DESC')->get();
        return view('backend.students.index', compact('students'));
    }

    
    public function create()
    {
        return view('backend.students.create');
    }

    
    public function store(Request $request)
    {
    
        $request->validate([
            'student_code' => 'required|unique:students,student_code',
            'first_name'   => 'required',
            'last_name'    => 'required',
            'gender'       => 'required|in:Male,Female,Other',
            'dob'          => 'required|date',
            'email'        => 'required|email|unique:students,email',
            'phone'        => 'required',
            'address'      => 'required',
        ]);

    
        Student::create($request->all());


        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }
}
