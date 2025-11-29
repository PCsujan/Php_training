<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    // Show all exams
   public function index()
    {
        $exams = Exam::with('course')->get(); // Use singular 'course'
        return view('backend.Exam.index', compact('exams'));
    }

    public function create()
    {
        $courses = Courses::all(); // Use singular Course model
        return view('backend.Exam.create', compact('courses'));
    }

    // Store new exam
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

    // Show edit form
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $courses = Courses::all();

        return view('backend.Exam.edit', compact('exam', 'courses'));
    }

    // Update exam
    public function update(Request $request, $id)
    {
        $request->validate([
            'exam_name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'exam_year' => 'required',
            'exam_term' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $exam = Exam::findOrFail($id);
        $exam->update($request->all());

        return redirect()->route('Exam.index')->with('success', 'Exam updated successfully!');
    }

    // Delete exam
    public function destroy($id)
    {
        Exam::findOrFail($id)->delete();
        return redirect()->route('Exam.index')->with('success', 'Exam deleted successfully!');
    }
}
