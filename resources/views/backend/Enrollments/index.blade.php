@extends('backend.master')

@push('style')
<style>
    .enollment-wrapper {
        max-width: 1000px;
        margin: 40px auto;
        padding: 20px;
        font-family: 'Arial', sans-serif;
        position: relative;
    }

    .enollment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .enollment-wrapper h2 {
        font-size: 2em;
        font-weight: bold;
        color: #4a4a00;
        margin: 0;
    }

    .add-link {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        font-size: 1em;
        transition: background-color 0.3s, transform 0.2s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .add-link:hover {
        background-color: #45a049;
        transform: translateY(-2px);
    }

    .alert-success {
        background-color: #fff3cd;
        color: #664d03;
        border: 1px solid #ffeeba;
        padding: 15px;
        border-radius: 8px;
        margin-top: 20px;
        font-size: 1em;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
    }

    thead {
        background-color: #f2f2f2;
    }

    th {
        padding: 12px 15px;
        text-align: left;
        font-weight: 600;
        font-size: 1em;
        color: #333;
        border-bottom: 1px solid #ddd;
    }

    tbody tr:nth-child(even) {
        background-color: #fafafa;
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }

    td {
        padding: 12px 15px;
        font-size: 0.95em;
        color: #555;
    }

    @media (max-width: 768px) {

        table,
        thead,
        tbody,
        tr,
        th,
        td {
            display: block;
            width: 100%;
        }

        thead {
            display: none;
        }

        tr {
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
        }

        td {
            padding: 10px;
            position: relative;
            padding-left: 50%;
            border: none;
            border-bottom: 1px solid #eee;
        }

        td::before {
            position: absolute;
            top: 10px;
            left: 15px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            font-weight: 600;
            content: attr(data-label);
        }
    }
</style>
@endpush

@section('content')
<div class="enollment-wrapper">

    <div class="enollment-header">
        <h2>Enrollments List</h2>
        <a href="{{ route('enrollments.create') }}" class="add-link">+ Add New Enrollment</a>

    </div>
    @if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif


    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Course</th>
            <th>Year</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @foreach($enrollments as $e)
        <tr>
            <td>{{ $e->id }}</td>

            <td>{{ $e->student->first_name ?? 'N/A' }} {{ $e->student->last_name ?? '' }}</td>

            <td>{{ $e->course->course_name ?? 'N/A' }}</td>

            <td>{{ $e->enrollment_year }}</td>
            <td>{{ $e->status }}</td>
            <td>
                <a href="{{ route('enrollments.edit', $e->id) }}" class="btn btn-primary btn-sm">Edit</a>

                <form action="{{ route('enrollments.destroy', $e->id) }}" method="POST"
                    style="display:inline-block;"
                    onsubmit="return confirm('Are you sure you want to delete this enrollments?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach
    </table>
</div>
@endsection