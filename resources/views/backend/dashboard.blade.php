@extends('backend.master')

@section('content')
<div class="hero">
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <p>Your full student portal in one place.</p>
</div>

<!-- Dashboard Cards -->
<div class="cards">
    <div class="card">
        <h3>Total Students</h3>
        <p>{{ $students_count ?? 0 }} Students</p>
    </div>
    <div class="card">
        <h3>Total Teachers</h3>
        <p>{{ $teachers_count ?? 0 }} Teachers</p>
    </div>
    <div class="card">
        <h3>Total Courses</h3>
        <p>{{ $courses_count ?? 0 }} Courses</p>
    </div>
    <div class="card">
        <h3>Total Subjects</h3>
        <p>{{ $subjects_count ?? 0 }} Subjects</p>
    </div>
</div>
@endsection
