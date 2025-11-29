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
        <h2>Add New Result</h2>
        <a href="{{ route('results.index') }}" class="add-link">Back to Results</a>
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

    <form action="{{ route('results.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="student_id">Student</label>
            <select name="student_id" id="student_id" required>
                <option value="">Select Student</option>
                @foreach($students as $student)
                <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                    {{ $student->first_name }} {{ $student->last_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exam_id">Exam</label>
            <select name="exam_id" id="exam_id" required>
                <option value="">Select Exam</option>
                @foreach($exams as $exam)
                <option value="{{ $exam->id }}" {{ old('exam_id') == $exam->id ? 'selected' : '' }}>
                    {{ $exam->exam_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subject_id">Subject</label>
            <select name="subject_id" id="subject_id" required>
                <option value="">Select Subject</option>
                @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->subject_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="obtained_marks">Obtained Marks</label>
            <input type="number" name="obtained_marks" id="obtained_marks" value="{{ old('obtained_marks') }}" required>
        </div>

        <div class="form-group">
            <label for="full_marks">Full Marks</label>
            <input type="number" name="full_marks" id="full_marks" value="{{ old('full_marks') }}" required>
        </div>

        <div class="form-group">
            <label for="pass_marks">Pass Marks</label>
            <input type="number" name="pass_marks" id="pass_marks" value="{{ old('pass_marks') }}" required>
        </div>

        <div class="form-group">
            <label for="grade">Grade</label>
            <input type="text" name="grade" id="grade" value="{{ old('grade') }}" required>
        </div>

        <div class="form-group">
            <label for="remarks">Remarks</label>
            <input type="text" name="remarks" id="remarks" value="{{ old('remarks') }}">
        </div>

        <button type="submit">Save Result</button>
         <a href="{{ route('results.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
