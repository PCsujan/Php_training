@extends('backend.master')

@push('style')
<style>
    .profile-wrapper {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        max-width: 800px;
        margin: auto;
    }

    /* Header */
    .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .profile-header img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #4b79ff;
    }

    .profile-header h2 {
        font-size: 24px;
        color: #003366;
    }

    /* Info */
    .profile-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px 30px;
    }

    .profile-info div {
        background: #f7f7f7;
        padding: 15px;
        border-radius: 8px;
    }

    .profile-info strong {
        display: block;
        font-weight: 600;
        color: #003366;
        margin-bottom: 5px;
    }

    @media screen and (max-width: 768px) {
        .profile-info {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="profile-wrapper">
    <div class="profile-header">
        <img src="{{ $profile->photo ?? asset('backend/images/default-user.png') }}" alt="Profile Picture">
        <h2>{{ $profile->name ?? $profile->first_name.' '.$profile->last_name }}</h2>
    </div>

    <div class="profile-info">
        <div>
            <strong>Email:</strong>
            {{ $profile->email ?? 'N/A' }}
        </div>
        <div>
            <strong>Role:</strong>
            {{ ucfirst($profile->role ?? 'Student') }}
        </div>
        <div>
            <strong>Phone:</strong>
            {{ $profile->phone ?? 'N/A' }}
        </div>
        <div>
            <strong>Address:</strong>
            {{ $profile->address ?? 'N/A' }}
        </div>
        @if(isset($profile->student_id))
        <div>
            <strong>Enrollment No:</strong>
            {{ $profile->student_id }}
        </div>
        <div>
            <strong>Course:</strong>
            {{ $profile->course->course_name ?? 'N/A' }}
        </div>
        @endif
    </div>
</div>
@endsection