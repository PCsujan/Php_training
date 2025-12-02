@extends('backend.master')

@push('style')
<style>
    .subject-wrapper {
        max-width: 1000px;
        margin: 40px auto;
        padding: 20px;
        font-family: 'Arial', sans-serif;
        position: relative;
    }

    .subject-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .subject-wrapper h2 {
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
<div class="subject-wrapper">
    <div class="subject-header">
        <h2>Exams List</h2>
        <a href="{{ route('exams.create') }}" class="add-link">+ Add New Exam</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Exam Name</th>
                <th>Course</th>
                <th>Year</th>
                <th>Term</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($exams as $exam)
            <tr>
                <td>{{ $exam->id }}</td>
                <td>{{ $exam->exam_name }}</td>
                <td>{{ $exam->course->course_name ?? 'N/A' }}</td>
                <td>{{ $exam->exam_year }}</td>
                <td>{{ $exam->exam_term }}</td>
                <td>{{ $exam->start_date }}</td>
                <td>{{ $exam->end_date }}</td>
                <td>
                    <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-primary btn-sm">Edit</a>


                    <!-- Delete Button -->
                    <form action="{{ route('exams.destroy', $exam->id) }}" method="POST"
                        style="display:inline-block;"
                        onsubmit="return confirm('Are you sure you want to delete this Exam?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>



                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection