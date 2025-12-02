@extends('backend.master')


<style>
    /* ---------- Wrapper Box ---------- */
    .form-wrapper {
        max-width: 650px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px 35px;
        border-radius: 12px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.12);
    }

    /* ---------- Title ---------- */
    .form-wrapper h2 {
        text-align: center;
        font-weight: 700;
        margin-bottom: 25px;
        color: #333;
    }

    /* ---------- Labels & Inputs ---------- */
    .form-wrapper label {
        font-weight: 600;
        color: #444;
        margin-bottom: 6px;
        display: block;
    }

    .form-wrapper .form-control,
    .form-wrapper select,
    .form-wrapper textarea {
        width: 100%;
        padding: 10px 12px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 15px;
    }

    .form-wrapper .form-control:focus,
    .form-wrapper select:focus,
    .form-wrapper textarea:focus {
        border-color: #007bff;
        box-shadow: 0px 0px 4px rgba(0, 123, 255, 0.4);
        outline: none;
    }

    /* ---------- Buttons ---------- */
    .form-wrapper .btn {
        padding: 10px 18px;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 600;
    }

    .form-wrapper .btn-primary {
        background: #007bff;
        border: none;
    }

    .form-wrapper .btn-primary:hover {
        background: #0056d6;
    }

    .form-wrapper .btn-secondary {
        background: #6c757d;
        border: none;
        margin-left: 5px;
        text-decoration: none;
    }

    .form-wrapper .btn-secondary:hover {
        background: #565e64;
    }

    /* ---------- Error Message ---------- */
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 20px;
    }
</style>

@section('content')
<div class="form-wrapper">
    <h2>Edit Result</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('results.update', $result->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                @foreach($students as $student)
                <option value="{{ $student->id }}" {{ $student->id == $result->student_id ? 'selected' : '' }}>
                    {{ $student->first_name }} {{ $student->last_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Exam</label>
            <select name="exam_id" class="form-control" required>
                @foreach($exams as $exam)
                <option value="{{ $exam->id }}" {{ $exam->id == $result->exam_id ? 'selected' : '' }}>
                    {{ $exam->exam_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Subject</label>
            <select name="subject_id" class="form-control" required>
                @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $subject->id == $result->subject_id ? 'selected' : '' }}>
                    {{ $subject->subject_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Obtained Marks</label>
            <input type="number" name="obtained_marks" class="form-control" value="{{ old('obtained_marks', $result->obtained_marks) }}" required>
        </div>

        <div class="mb-3">
            <label>Full Marks</label>
            <input type="number" name="full_marks" class="form-control" value="{{ old('full_marks', $result->full_marks) }}" required>
        </div>

        <div class="mb-3">
            <label>Pass Marks</label>
            <input type="number" name="pass_marks" class="form-control" value="{{ old('pass_marks', $result->pass_marks) }}" required>
        </div>

        <div class="mb-3">
            <label>Grade</label>
            <input type="text" name="grade" class="form-control" value="{{ old('grade', $result->grade) }}" required>
        </div>

        <div class="mb-3">
            <label>Remarks</label>
            <textarea name="remarks" class="form-control">{{ old('remarks', $result->remarks) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Result</button>
        <a href="{{ route('results.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection