@extends('backend.master')

<style>
.form-wrapper {
    max-width: 600px;
    margin: 40px auto;
    background: #ffffff;
    padding: 25px 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
}

.form-wrapper h2 {
    text-align: center;
    font-weight: 700;
    margin-bottom: 25px;
    color: #333;
}

.form-wrapper .mb-3 label {
    font-weight: 600;
    color: #444;
    margin-bottom: 6px;
    display: block;
}

.form-wrapper .form-control {
    width: 100%;
    padding: 10px 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 15px;
}

.form-wrapper .form-control:focus {
    border-color: #007bff;
    box-shadow: 0px 0px 4px rgba(0,123,255,0.4);
}

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
    background: #acb1b7ff;
}

.form-wrapper .btn-secondary {
    background: #6c757d;
    border: none;
    margin-left: 5px;
    text-decoration: none;
}

.form-wrapper .btn-secondary:hover {
    background: #7bacddff;
}

/* Error Messages */
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
    <h2>Edit Exam</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('exams.update', $exam->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Exam Name</label>
            <input type="text" name="exam_name" class="form-control"
                   value="{{ old('exam_name', $exam->exam_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Course</label>
            <select name="course_id" class="form-control" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}"
                        {{ $exam->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Exam Year</label>
            <input type="number" name="exam_year" class="form-control"
                   value="{{ old('exam_year', $exam->exam_year) }}" required>
        </div>

        <div class="mb-3">
            <label>Term</label>
            <input type="text" name="exam_term" class="form-control"
                   value="{{ old('exam_term', $exam->exam_term) }}" required>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control"
                   value="{{ old('start_date', $exam->start_date) }}" required>
        </div>

        <div class="mb-3">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control"
                   value="{{ old('end_date', $exam->end_date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Exam</button>
        <a href="{{ route('exams.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
