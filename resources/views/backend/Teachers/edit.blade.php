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

    <h2>Edit Teacher</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Teacher Code</label>
            <input type="text" name="teacher_code" class="form-control"
                   value="{{ old('teacher_code', $teacher->teacher_code) }}" required>
        </div>

        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control"
                   value="{{ old('first_name', $teacher->first_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control"
                   value="{{ old('last_name', $teacher->last_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $teacher->email) }}" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control"
                   value="{{ old('phone', $teacher->phone) }}" required>
        </div>

        <div class="mb-3">
            <label>Qualification</label>
            <input type="text" name="qualification" class="form-control"
                   value="{{ old('qualification', $teacher->qualification) }}" required>
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control" required>{{ old('address', $teacher->address) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Teacher</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
