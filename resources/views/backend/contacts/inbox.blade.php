@extends('backend.master')

@push('style')
<style>
    /* Wrapper */
    .inbox-wrapper {
        background: #fff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
    }

    /* Header */
    .inbox-wrapper h2 {
        font-size: 26px;
        color: #003366;
        margin-bottom: 20px;
    }

    /* Table */
    .inbox-table {
        width: 100%;
        border-collapse: collapse;
    }

    .inbox-table thead tr {
        background: #1D546C;
        color: #fff;
    }

    .inbox-table th,
    .inbox-table td {
        padding: 12px 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-size: 14px;
    }

    .inbox-table tbody tr:hover {
        background: #f1f1f1;
    }

    /* Buttons */
    .btn {
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        font-size: 13px;
        transition: 0.3s;
    }

    .btn-primary {
        background: #4b79ff;
        color: #fff;
        border: none;
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

    /* Alert */
    .alert-success {
        background: #d4edda;
        color: #155724;
        padding: 10px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    /* Responsive */
    @media screen and (max-width: 768px) {

        .inbox-table th,
        .inbox-table td {
            font-size: 12px;
            padding: 8px 6px;
        }

        .btn {
            font-size: 12px;
            padding: 5px 10px;
        }
    }
</style>
@endpush

@section('content')
<div class="inbox-wrapper">
    <h2>📩 Inbox Messages</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="inbox-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Request Type</th>
                <th>Message</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ ucfirst($contact->request) }}</td>
                <td>{{ Str::limit($contact->message, 50) }}</td>
                <td>{{ $contact->created_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-primary btn-sm">View</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center;">No messages found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection