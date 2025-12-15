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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

// Welcome page
Route::get('/', [ContactController::class, 'index'])->name('home');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// Inbox & Single Message
Route::get('/contacts/inbox', [ContactController::class, 'inbox'])->name('contacts.inbox');
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');

// Actions
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
Route::post('/contacts/{id}/mark-read', [ContactController::class, 'markRead'])->name('contacts.markRead');



// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');


// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // lowercase!
Route::post('/login', [AuthController::class, 'Submitlogin'])->name('login.submit');

// Profile page for logged-in users
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Optional: Admin view other profiles
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');


// homes pages 
Route::get('/about', function () {
    return view('frontend.aboutus');
})->name('about');

Route::get('/life', function () {
    return view('frontend.life');
})->name('life');

Route::get('/news-events', function () {
    return view('frontend.news-events');
})->name('news.events');



Route::get('/programs/csit', function () {
    return view('frontend.csit');
})->name('program.csit');

Route::get('/programs/bca', function () {
    return view('frontend.bca');
})->name('program.bca');

Route::get('/programs/bbm', function () {
    return view('frontend.bbm');
})->name('program.bbm');

Route::get('/programs/bbs', function () {
    return view('frontend.bbs');
})->name('program.bbs');





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


// role and permission 
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('posts', Dashboardcontroller::class);
});

Route::get('posts/create', [Dashboardcontroller::class, 'create'])
    ->middleware(['auth', 'permission:create posts']);