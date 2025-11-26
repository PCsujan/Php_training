@extends('backend.master')

@push('style')
<style>

    .add-link {
        color: #8b00a3;
        font-weight: 600;
        text-decoration: underline;
    }

    .alert-success {
        background: #fff3cd;
        color: #664d03;
        border: 1px solid #ffeeba;
    }
</style>
@endpush


@section('content')
<div class="student-wrapper">

    <h2>Students List</h2>

    <a href="{{ route('students.create') }}" class="add-link">+ Add New Student</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->student_code }}</td>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">No students found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
