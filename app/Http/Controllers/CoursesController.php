<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Courses;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::orderBy('id','DESC')->get();
        return view('backend.courses.index', compact('courses'));
    }
}
