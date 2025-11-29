<?php

namespace App\Http\Controllers;

use App\Models\Enrollments;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Courses;


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
        $courses = Courses::all();
        return view('backend.enrollments.create', compact('students', 'courses'));
    }
}
