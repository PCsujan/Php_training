@extends('backend.master')

@section('content')
<div style="background:white;padding:20px;border-radius:10px;">
    <h2 style="margin-bottom:20px;">📩 Inbox Messages</h2>

    <table style="width:100%;border-collapse:collapse;">
        <thead>
            <tr style="background:#1D546C;color:white;">
                <th style="padding:10px;">Name</th>
                <th>Email</th>
                <th>Request Type</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            @foreach($contacts as $contact)
            <tr style="border-bottom:1px solid #ddd;">
                <td style="padding:10px;">{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ ucfirst($contact->request) }}</td>
                <td>{{ Str::limit($contact->message, 40) }}</td>
                <td>{{ $contact->created_at->diffForHumans() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
