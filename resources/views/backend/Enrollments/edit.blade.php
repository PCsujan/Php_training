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

.btn-primary {
    background: #007bff;
    border: none;
}

.btn-secondary {
    background: #6c757d;
    border: none;
    margin-left: 5px;
    text-decoration: none;
}
</style>

@section('content')

<div class="form-wrapper">

    <h2>Edit Enrollment</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Student -->
        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                <option value="">-- Select Student --</option>
                @foreach($students as $s)
                    <option value="{{ $s->id }}"
                        {{ $s->id == $enrollment->student_id ? 'selected' : '' }}>
                        {{ $s->first_name }} {{ $s->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Course -->
        <div class="mb-3">
            <label>Course</label>
            <select name="course_id" class="form-control" required>
                <option value="">-- Select Course --</option>
                @foreach($courses as $c)
                    <option value="{{ $c->id }}"
                        {{ $c->id == $enrollment->course_id ? 'selected' : '' }}>
                        {{ $c->course_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Enrollment Year -->
        <div class="mb-3">
            <label>Enrollment Year</label>
            <input type="number" name="enrollment_year" class="form-control"
                value="{{ old('enrollment_year', $enrollment->enrollment_year) }}" required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Active" {{ $enrollment->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Completed" {{ $enrollment->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Dropped" {{ $enrollment->status == 'Dropped' ? 'selected' : '' }}>Dropped</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Enrollment</button>
        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>

@endsection
