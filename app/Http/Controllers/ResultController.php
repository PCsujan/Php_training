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
            'student_id' => 'required|exists:students,id',
            'exam_id' => 'required|exists:exams,id',
            'subject_id' => 'required|exists:subjects,id',
            'semester' => 'required|integer|between:1,6',
            'obtained_marks' => 'required|numeric|min:0',
            'full_marks' => 'required|numeric|min:1',
            'pass_marks' => 'required|numeric|min:0',
            'grade' => 'required|string|max:3',      
            'remarks' => 'required|string|max:50',   
        ]);

        Result::create($request->all());

        return redirect()->route('results.index')->with('success', 'Result added successfully!');
    }


    // ← Edit method
    public function edit($id)
    {
        $result = Result::findOrFail($id);
        $students = Student::all();
        $exams = Exam::all();
        $subjects = Subject::all();

        return view('backend.Results.edit', compact('result', 'students', 'exams', 'subjects'));
    }

    // ← Update method
    public function update(Request $request, $id)
    {
        $result = Result::findOrFail($id);

        $request->validate([
            'student_id'     => 'required|exists:students,id',
            'exam_id'        => 'required|exists:exams,id',
            'subject_id'     => 'required|exists:subjects,id',
            'obtained_marks' => 'required|numeric',
            'full_marks'     => 'required|numeric',
            'pass_marks'     => 'required|numeric',
            'grade'          => 'required|string|max:2',
            'remarks'        => 'nullable|string',
        ]);

        $result->update($request->all());

        return redirect()->route('results.index')->with('success', 'Result updated successfully.');
    }

    // ← Destroy method
    public function destroy($id)
    {
        $result = Result::findOrFail($id);
        $result->delete();

        return redirect()->route('results.index')->with('success', 'Result deleted successfully.');
    }

    public function print($id)
    {
        $student = Student::with([
            'enrollments.course',
            'results.subject',
            'results.exam'
        ])->findOrFail($id);

        return view('backend.results.print', compact('student'));
    }
}
