<?php

namespace App\Http\Controllers;

use App\Models\Enrollments;
use Illuminate\Http\Request;


class EnrollmentsController extends Controller
{
    public function index()
    {
        $enrollments = Enrollments::with(['student', 'course'])
            ->orderBy('id', 'DESC')
            ->get();

        return view('enrollments.index', compact('enrollments'));
    }
}
