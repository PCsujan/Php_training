@extends('backend.master')

@push('style')
<style>
    .subject-wrapper {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        font-family: 'Arial', sans-serif;
    }

    .subject-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .subject-wrapper h2 {
        font-size: 2em;
        font-weight: bold;
        color: #4a4a00;
        margin: 0;
    }

    .add-link {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        font-size: 1em;
        transition: background-color 0.3s, transform 0.2s;
    }

    .add-link:hover {
        background-color: #45a049;
        transform: translateY(-2px);
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        padding: 15px;
        border-radius: 8px;
        margin-top: 20px;
        font-size: 1em;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
    }

    input,
    select {
        width: 100%;
        padding: 8px 10px;
        font-size: 1em;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
</style>
@endpush

@section('content')
<div class="subject-wrapper">
    <div class="subject-header">
        <h2>Add New Subject</h2>
        <a href="{{ route('subjects.index') }}" class="add-link">Back to Subjects</a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                    {{ $course->course_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subject_name">Subject Name</label>
            <input type="text" name="subject_name" id="subject_name" value="{{ old('subject_name') }}" required>
        </div>

        <div class="form-group">
            <label for="subject_code">Subject Code</label>
            <input type="text" name="subject_code" id="subject_code" value="{{ old('subject_code') }}" required>
        </div>

        <div class="form-group">
            <label for="credit_hours">Credit Hours</label>
            <input type="number" name="credit_hours" id="credit_hours" value="{{ old('credit_hours') }}" required>
        </div>

        <div class="form-group">
            <label for="teacher_id">Teacher</label>
            <select name="teacher_id" id="teacher_id" required>
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->first_name }} {{ $teacher->last_name }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Save Subject</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection