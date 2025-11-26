@extends('backend.master')

@section('content')
<h2>Courses List</h2>
  <a href="{{ route('students.create') }}" class="add-link">+ Add New Courses</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Course</th>
        <th>Code</th>
        <th>Years</th>
    </tr>

    @foreach($courses as $c)
    <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->course_name }}</td>
        <td>{{ $c->course_code }}</td>
        <td>{{ $c->duration_years }}</td>
    </tr>
    @endforeach
</table>

@endsection



