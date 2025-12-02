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

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('backend.students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_code' => 'required|unique:students,student_code,' . $id,
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        $student = Student::findOrFail($id);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
