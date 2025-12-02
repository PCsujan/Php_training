<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with(['course', 'teacher'])->orderBy('id', 'DESC')->get();//Subject एक Course सँग सम्बन्धित छ भने, relationship singular course हुनुपर्छ।
        return view('backend.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $courses = Course::all();
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


    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('backend.subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'course_id'     => 'required|exists:courses,id',
            'subject_name'  => 'required',
            'subject_code'  => 'required|unique:subjects,subject_code,' . $id,
            'credit_hours'  => 'required|integer',
            'teacher_id'    => 'required|exists:teachers,id',
        ]);

        $subject = Subject::findOrFail($id);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }


    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
