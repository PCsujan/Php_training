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

    <h2>Edit Course</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Course Name</label>
            <input type="text" name="course_name" class="form-control"
                   value="{{ old('course_name', $course->course_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Course Code</label>
            <input type="text" name="course_code" class="form-control"
                   value="{{ old('course_code', $course->course_code) }}" required>
        </div>

        <div class="mb-3">
            <label>Duration (Years)</label>
            <input type="number" name="duration_years" class="form-control"
                   value="{{ old('duration_years', $course->duration_years) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Course</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>
@endsection
