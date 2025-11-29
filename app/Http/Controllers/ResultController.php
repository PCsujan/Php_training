<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Student;
use App\Models\Exam;
use App\Models\Subject;


class ResultController extends Controller
{
        // Show all results
    public function index()
    {
        $results = Result::with(['student', 'exam', 'subject'])->get();
        return view('backend.results.index', compact('results'));
    }

    // Show create form
    public function create()
    {
        $students = Student::all();
        $exams = Exam::all();
        $subjects = Subject::all();

        return view('backend.results.create', compact('students', 'exams', 'subjects'));
    }

    // Store result
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'exam_id' => 'required',
            'subject_id' => 'required',
            'obtained_marks' => 'required|numeric',
            'full_marks' => 'required|numeric',
            'pass_marks' => 'required|numeric',
            'grade' => 'nullable|string',
            'remarks' => 'nullable|string',
        ]);

        Result::create($request->all());

        return redirect()->route('results.index')->with('success', 'Result added successfully!');
    }

    // Edit result form
    public function edit($id)
    {
        $result = Result::findOrFail($id);
        $students = Student::all();
        $exams = Exam::all();
        $subjects = Subject::all();

        return view('backend.results.edit', compact('result', 'students', 'exams', 'subjects'));
    }

    // Update result
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'exam_id' => 'required',
            'subject_id' => 'required',
            'obtained_marks' => 'required|numeric',
            'full_marks' => 'required|numeric',
            'pass_marks' => 'required|numeric',
        ]);

        $result = Result::findOrFail($id);
        $result->update($request->all());

        return redirect()->route('results.index')->with('success', 'Result updated successfully!');
    }

    // Delete result
    public function destroy($id)
    {
        $result = Result::findOrFail($id);
        $result->delete();

        return redirect()->route('results.index')->with('success', 'Result deleted successfully!');
    }
}
