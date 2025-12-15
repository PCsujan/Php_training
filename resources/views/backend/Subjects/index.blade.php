@extends('backend.master')

@push('style')
<style>
    /* Wrapper */
    .subject-wrapper {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
    }

    /* Header */
    .subject-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .subject-header h2 {
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

    .subject-table {
        width: 100%;
        border-collapse: collapse;
    }

    .subject-table th,
    .subject-table td {
        padding: 12px 15px;
        text-align: left;
    }

    .subject-table th {
        background: #003366;
        color: #fff;
    }

    .subject-table tr:nth-child(even) {
        background: #f9f9f9;
    }

    .subject-table tr:hover {
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
        .subject-header {
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
<div class="subject-wrapper">

    <!-- Header with title and Add button for admin & teacher -->
    <div class="subject-header">
        <h2>Subjects List</h2>
        @role(['admin', 'teacher'])
        <a href="{{ route('subjects.create') }}" class="add-link">+ Add New Subject</a>
        @endrole
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="subject-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Credit Hours</th>
                    <th>Course</th>
                    <th>Teacher</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subjects as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->subject_code }}</td>
                    <td>{{ $s->subject_name }}</td>
                    <td>{{ $s->credit_hours }}</td>
                    <td>{{ $s->course->course_name ?? 'N/A' }}</td>
                    <td>{{ $s->teacher->first_name ?? '' }} {{ $s->teacher->last_name ?? '' }}</td>
                    <td class="actions">
                        @role(['admin', 'teacher'])
                        <a href="{{ route('subjects.edit', $s->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('subjects.destroy', $s->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this subject?');"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        @else
                        <span class="text-muted">No actions</span>
                        @endrole
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No subjects found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection