@extends('backend.master')

@push('style')
<style>
    /* Wrapper */
    .results-wrapper {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
    }

    /* Header */
    .results-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .results-header h2 {
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

    .results-table {
        width: 100%;
        border-collapse: collapse;
    }

    .results-table th,
    .results-table td {
        padding: 12px 15px;
        text-align: left;
    }

    .results-table th {
        background: #003366;
        color: #fff;
    }

    .results-table tr:nth-child(even) {
        background: #f9f9f9;
    }

    .results-table tr:hover {
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

    .btn-info {
        background: #17a2b8;
        color: #fff;
    }

    .btn-info:hover {
        background: #138496;
    }

    /* Actions */
    .actions {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    /* Responsive */
    @media screen and (max-width: 768px) {
        .results-header {
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
<div class="results-wrapper">

    <!-- Header with title and button -->
    <div class="results-header">
        <h2>Results List</h2>
        <a href="{{ route('results.create') }}" class="add-link">+ Add New Result</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="results-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Exam</th>
                    <th>Subject</th>
                    <th>Obtained Marks</th>
                    <th>Full Marks</th>
                    <th>Pass Marks</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($results as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->student->first_name ?? '' }} {{ $r->student->last_name ?? '' }}</td>
                    <td>{{ $r->exam->exam_name ?? 'N/A' }}</td>
                    <td>{{ $r->subject->subject_name ?? 'N/A' }}</td>
                    <td>{{ $r->obtained_marks }}</td>
                    <td>{{ $r->full_marks }}</td>
                    <td>{{ $r->pass_marks }}</td>
                    <td>{{ $r->grade }}</td>
                    <td>{{ $r->remarks }}</td>
                    <td class="actions">
                        <a href="{{ route('results.edit', $r->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('results.destroy', $r->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this result?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                        <a href="{{ route('results.print', $r->student_id) }}" target="_blank"
                            class="btn btn-info btn-sm">Print Marksheet</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">No results found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection