<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    public function index()
    {
        $exams = Exam::with('course')->get();
        return view('backend.Exam.index', compact('exams'));
    }

    public function create()
    {
        $courses = Course::all();
        $subjects = Subject::all();
        return view('backend.Exam.create', compact('courses','subjects'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'exam_name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'exam_year' => 'required',
            'exam_term' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Exam::create($request->all());

        return redirect()->route('exams.index')->with('success', 'Exam created successfully!');
    }

    // ← Add this edit() method
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $courses = Course::all(); // so you can select course in dropdown
        $subject = Subject::all(); //so yasle subject table data haru dropdown gare select garnsakinxa
        return view('backend.Exam.edit', compact('exam', 'courses', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $request->validate([
            'exam_name' => 'required',
            'course_id' => 'required|exists:courses,id',
            'exam_year' => 'required|integer',
            'exam_term' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $exam->update([
            'exam_name' => $request->exam_name,
            'course_id' => $request->course_id,
            'exam_year' => $request->exam_year,
            'exam_term' => $request->exam_term,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('exams.index')->with('success', 'Exam updated successfully.');
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('exams.index')->with('success', 'Exam deleted successfully.');
    }
}
