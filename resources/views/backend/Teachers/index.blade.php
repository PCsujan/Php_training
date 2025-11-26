@extends('backend.master')


@section('content')
<h2>Teachers List</h2>
<a href="{{ route('teachers.create') }}" class="add-link">+ Add New Teacher</a>

@if(session('success'))
<div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif


<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Qualification</th>
    </tr>

    @foreach($teachers as $t)
    <tr>
        <td>{{ $t->id }}</td>
        <td>{{ $t->teacher_code }}</td>
        <td>{{ $t->first_name }} {{ $t->last_name }}</td>
        <td>{{ $t->email }}</td>
        <td>{{ $t->phone }}</td>
        <td>{{ $t->qualification }}</td>
    </tr>
    @endforeach
</table>
@endsection