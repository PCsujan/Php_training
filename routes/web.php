<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('Login'); 
Route::post('/login', [AuthController::class, 'Submitlogin'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [Dashboardcontroller::class,'index'])->name('dashboard');

// Students
route::resource('students', StudentController::class);

// Teachers

Route::resource('teachers', TeacherController::class);

// Courses
Route::resource('courses', CoursesController::class);

// Subjects
Route::resource('subjects', SubjectController::class);
