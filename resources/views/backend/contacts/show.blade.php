@extends('backend.master')

@push('style')
<style>
    .message-wrapper {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .back-link {
        text-decoration: none;
        color: #4b79ff;
        font-weight: 600;
    }

    .back-link:hover {
        color: #3a5ed0;
    }

    .message-info div {
        margin-bottom: 10px;
    }

    .message-body {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .message-actions button {
        margin-right: 10px;
        padding: 8px 14px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
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

    .btn-secondary {
        background: #6c757d;
        color: #fff;
        border: none;
    }

    .btn-secondary:hover {
        background: #5a6268;
    }
</style>
@endpush

@section('content')
<div class="message-wrapper">
    <div class="message-header">
        <h2>📩 Message Details</h2>
        <a href="{{ route('contacts.inbox') }}" class="back-link">&larr; Back to Inbox</a>
    </div>

    <div class="message-info">
        <div><strong>Name:</strong> {{ $contact->name }}</div>
        <div><strong>Email:</strong> {{ $contact->email }}</div>
        <div><strong>Request Type:</strong> {{ ucfirst($contact->request) }}</div>
        <div><strong>Date:</strong> {{ $contact->created_at->format('d M Y, H:i A') }}</div>
    </div>

    <div class="message-body">
        {{ $contact->message }}
    </div>

    <div class="message-actions">
        <form action="{{ route('contacts.markRead', $contact->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Mark as Read</button>
        </form>

        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection