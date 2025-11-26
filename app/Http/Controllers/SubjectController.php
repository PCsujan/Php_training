<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        // lowercase 'course', match function name in model
        $subjects = Subject::with(['course', 'teacher'])->get();
        return view('backend.subjects.index', compact('subjects'));
    }
}
