@extends('backend.master')

@push('style')
<style>
    /* Wrapper */
    .teacher-wrapper {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
    }

    /* Header */
    .teacher-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .teacher-header h2 {
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

    .teacher-table {
        width: 100%;
        border-collapse: collapse;
    }

    .teacher-table th,
    .teacher-table td {
        padding: 12px 15px;
        text-align: left;
    }

    .teacher-table th {
        background: #003366;
        color: #fff;
    }

    .teacher-table tr:nth-child(even) {
        background: #f9f9f9;
    }

    .teacher-table tr:hover {
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
        .teacher-header {
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
<div class="teacher-wrapper">

    <!-- Header with title and button -->
    <div class="teacher-header">
        <h2>Teachers List</h2>
        <a href="{{ route('teachers.create') }}" class="add-link">+ Add New Teacher</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="teacher-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Qualification</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>{{ $t->teacher_code }}</td>
                    <td>{{ $t->first_name }} {{ $t->last_name }}</td>
                    <td>{{ $t->email }}</td>
                    <td>{{ $t->phone }}</td>
                    <td>{{ $t->qualification }}</td>
                    <td>{{ $t->address }}</td>
                    <td class="actions">
                        <a href="{{ route('teachers.edit', $t->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('teachers.destroy', $t->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this teacher?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No teachers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection