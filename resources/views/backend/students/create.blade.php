@extends('backend.master')

@push('style')
<style>
    .form-wrapper {
        background: #fff7b3;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        width: 100%;
        max-width: 750px;
        margin: auto;
    }

    .form-wrapper h2 {
        font-weight: bold;
        color: #4a4a00;
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
        color: #4a4a00;
    }

    input, select, textarea {
        background: #fffbe0;
        border: 1px solid #e6d267;
    }

    .btn-success {
        background: #e0b100;
        border: none;
        font-weight: 700;
        color: black;
    }

    .btn-success:hover {
        background: #c49a00;
    }

    .btn-secondary {
        background: #b8b8b8;
        border: none;
        font-weight: bold;
    }

    .alert-danger {
        background: #ffe3e3;
        border: 1px solid #ffb3b3;
        color: #900;
    }
</style>
@endpush


@section('content')
<div class="form-wrapper">

    <h2>Add New Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Student Code</label>
            <input type="text" name="student_code" class="form-control" value="{{ old('student_code') }}" required>
        </div>

        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control" required>
                <option value="">Select Gender</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Save Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
