<?php

namespace App\Http\Controllers;

use App\Models\Enrollments;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;


class EnrollmentsController extends Controller
{
    public function index()
    {
        $enrollments = Enrollments::with(['student', 'course'])
            ->orderBy('id', 'DESC')
            ->get();

        return view('backend.enrollments.index', compact('enrollments'));
    }
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('backend.enrollments.create', compact('students', 'courses'));
    }
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'student_id'       => 'required|exists:students,id',
            'course_id'        => 'required|exists:courses,id',
            'enrollment_year'  => 'required|integer|min:1900|max:' . date('Y'),
            'status'           => 'required|string'
        ]);

     Enrollments::create($request->all());
     return redirect()->route('enrollments.index')->with('success','enrollments created successfully.');
    }

    public function edit($id)
{
    $enrollment = Enrollments::findOrFail($id);

    $students = Student::all();
    $courses = Course::all();

    return view('backend.Enrollments.edit', compact('enrollment', 'students', 'courses'));
}

public function update(Request $request, $id)
{
    $enrollment = Enrollments::findOrFail($id);

    $request->validate([
        'student_id' => 'required|exists:students,id',
        'course_id' => 'required|exists:courses,id',
        'enrollment_year' => 'required|integer',
        'status' => 'required|string',
    ]);

    $enrollment->update([
        'student_id' => $request->student_id,
        'course_id' => $request->course_id,
        'enrollment_year' => $request->enrollment_year,
        'status' => $request->status,
    ]);

    return redirect()->route('enrollments.index')
        ->with('success', 'Enrollment updated successfully!');
}

public function destroy($id)
{
    $enrollment = Enrollments::findOrFail($id);
    $enrollment->delete();

    return redirect()->route('enrollments.index')
        ->with('success', 'Enrollment deleted successfully!');
}

}
