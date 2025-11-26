@extends('backend.master')

@section('content')
<h2>Subjects List</h2>
  <a href="{{ route('students.create') }}" class="add-link">+ Add New subject</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif


<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Subject</th>
        <th>Code</th>
        <th>Credit</th>
        <th>Course</th>
        <th>Teacher</th>
    </tr>

    @foreach($subjects as $s)
    <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->subject_name }}</td>
        <td>{{ $s->subject_code }}</td>
        <td>{{ $s->credit_hours }}</td>
        <td>{{ $s->course_id }}</td>
        <td>{{ $s->teacher_id }}</td>
    </tr>
    @endforeach
</table>
@endsection
