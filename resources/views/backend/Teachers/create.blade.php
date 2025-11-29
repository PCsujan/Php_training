@extends('backend.master')

@push('style')
<style>
.form-wrapper {
    background: #fff7b3; 
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    max-width: 800px;
    margin: 40px auto;
    font-family: 'Arial', sans-serif;
}

.form-wrapper h2 {
    text-align: center;
    font-size: 2em;
    font-weight: bold;
    color: #4a4a00;
    margin-bottom: 25px;
}

label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #4a4a00;
}

input[type="text"],
input[type="email"],
input[type="date"],
select,
textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #e6d267;
    border-radius: 8px;
    background-color: #fffbe0;
    font-size: 1em;
    transition: border-color 0.3s, box-shadow 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="date"]:focus,
select:focus,
textarea:focus {
    border-color: #d4b300;
    box-shadow: 0 0 8px rgba(212, 179, 0, 0.3);
    outline: none;
}


.btn {
    padding: 12px 30px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 700;
    font-size: 1em;
    transition: background-color 0.3s, transform 0.2s;
}

.btn-success {
    background-color: #e0b100;
    color: #000;
}

.btn-success:hover {
    background-color: #c49a00;
    transform: translateY(-2px);
}

.btn-secondary {
    background-color: #b8b8b8;
    color: #fff;
}

.btn-secondary:hover {
    background-color: #999;
    transform: translateY(-2px);
}


.alert-danger {
    background-color: #ffe3e3;
    border: 1px solid #ffb3b3;
    color: #900;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.alert-danger ul {
    margin: 0;
    padding-left: 20px;
}

.alert-danger li {
    margin-bottom: 8px;
}


.mb-3 {
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .form-wrapper {
        padding: 20px 15px;
    }
}
</style>
@endpush

@section('content')
<div class="from-wrapper">
    <h2>Add New Teacher</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Teacher Code</label>
            <input type="text" name="teacher_code" class="form-control" value="{{ old('teacher_code') }}" required>
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
            <label>Qualification</label>
            <input
                type="text"
                name="qualification"
                class="form-control"
                value="{{ old('qualification') }}"
                required>
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

        <button type="submit" class="btn btn-success">Save teacher</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection