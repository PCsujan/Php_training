@extends('backend.master')

@push('style')
<style>
    /* Wrapper */
    .courses-wrapper {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
    }

    /* Header */
    .courses-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .courses-header h2 {
        font-size: 24px;
        color: #003366;
    }

    .add-link {
        background: #4b79ff;
        color: #fff;
        padding: 10px 15px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .add-link:hover {
        background: #3a5ed0;
    }

    /* Alerts */
    .alert-success {
        background: #d4edda;
        color: #155724;
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    /* Table */
    .table-responsive {
        overflow-x: auto;
    }

    .courses-table {
        width: 100%;
        border-collapse: collapse;
    }

    .courses-table th,
    .courses-table td {
        padding: 12px 15px;
        text-align: left;
    }

    .courses-table th {
        background: #003366;
        color: #fff;
    }

    .courses-table tr:nth-child(even) {
        background: #f9f9f9;
    }

    .courses-table tr:hover {
        background: #e8f0ff;
    }

    /* Buttons */
    .btn {
        padding: 6px 12px;
        border-radius: 5px;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
        margin: 2px 0;
    }

    .btn-primary {
        background: #4b79ff;
        color: #fff;
    }

    .btn-primary:hover {
        background: #3a5ed0;
    }

    .btn-danger {
        background: #ff4d4d;
        color: #fff;
        border: none;
    }

    .btn-danger:hover {
        background: #e60000;
    }

    /* Actions */
    .actions {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    /* Responsive */
    @media screen and (max-width: 768px) {
        .courses-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .actions {
            flex-direction: column;
            gap: 4px;
        }
    }
</style>
@endpush

@section('content')
<div class="courses-wrapper">

    <!-- Header with title and button -->
    <div class="courses-header">
        <h2>Courses List</h2>
        <a href="{{ route('courses.create') }}" class="add-link">+ Add New Courses</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="courses-table">
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Duration (Years)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->course_name }}</td>
                    <td>{{ $c->course_code }}</td>
                    <td>{{ $c->duration_years }}</td>
                    <td class="actions">
                        <a href="{{ route('courses.edit', $c->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('courses.destroy', $c->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this course?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No courses found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
