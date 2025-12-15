<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Constructor to apply middleware for authentication and permissions
     */
    public function __construct()
    {
        // Require authentication for all methods
        $this->middleware('auth');

        // Apply permission middleware for posts (example)
        $this->middleware('permission:create posts')->only(['create', 'store']);
        $this->middleware('permission:edit posts')->only(['edit', 'update']);
        $this->middleware('permission:delete posts')->only('destroy');
    }

    /**
     * Display the dashboard.
     */
    public function index()
    {
        return view('backend.dashboard', [
            'students_count' => Student::count(),
            'teachers_count' => Teacher::count(),
            'courses_count'  => Course::count(),
            'subjects_count' => Subject::count(),
        ]);
    }

    /**
     * Example method to show creating posts (permission controlled)
     */
    public function create()
    {
        // Only accessible if user has 'create posts' permission
        return view('backend.posts.create');
    }
}
