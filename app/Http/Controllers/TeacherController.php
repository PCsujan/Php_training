<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\models\Subject;
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
        return view('backend.teachers.create');
    }


    public function store(Request $request)
    {
    
        $request->validate([
            'teacher_code' => 'required|unique:teachers,teacher_code',
            'first_name'   => 'required',
            'last_name'    => 'required',
            'email'        => 'required|email|unique:teachers,email',
            'phone'        => 'required',
            'address'      => 'required',
            'qualification' => 'required',
        ]);


        Teacher::create($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }
        public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('backend.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'teacher_code' => 'required|unique:teachers,teacher_code,' . $id,
             'first_name'   => 'required',
            'last_name'    => 'required',
            'email'        => 'required|email|unique:teachers,email,'  . $id,
            'phone'        => 'required',
            'address'      => 'required',
            'qualification' => 'required',
        ]);

        $teacher = Teacher::findOrFail($id);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'teacher deleted successfully.');
    }
}
