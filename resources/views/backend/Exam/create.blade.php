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
        <h2>Add New Exam</h2>
        <a href="{{ route('exams.index') }}" class="add-link">Back to Exams</a>
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

    <form action="{{ route('exams.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="exam_name">Exam Name</label>
            <input type="text" name="exam_name" id="exam_name" value="{{ old('exam_name') }}" required>
        </div>

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
            <label for="exam_year">Exam Year</label>
            <input type="text" name="exam_year" id="exam_year" value="{{ old('exam_year') }}" required>
        </div>

        <div class="form-group">
            <label for="exam_term">Exam Term</label>
            <input type="text" name="exam_term" id="exam_term" value="{{ old('exam_term') }}" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
        </div>

        <button type="submit">Save Exam</button>
        <a href="{{ route('exams.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
