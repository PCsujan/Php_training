<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

// Welcome page
Route::get('/', [ContactController::class, 'index'])->name('home');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/inbox', [ContactController::class, 'inbox'])->name('contacts.inbox');

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // lowercase!
Route::post('/login', [AuthController::class, 'Submitlogin'])->name('login.submit');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (only accessible to logged-in users)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Students
route::resource('students', StudentController::class);

// Teachers

Route::resource('teachers', TeacherController::class);

// Courses
Route::resource('courses', CourseController::class);

// Subjects
Route::resource('subjects', SubjectController::class);

// results
Route::resource('results', ResultController::class);
Route::get('results/print/{id}', [ResultController::class, 'print'])->name('results.print');

// exams
Route::resource('exams', ExamsController::class);

// enrollmemts
Route::resource('enrollments', EnrollmentsController::class);
