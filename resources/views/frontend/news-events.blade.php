@extends('master')

@section('title', 'News & Events')

@push('style')
<style>
    .news-header {
        background: #003366;
        color: #fff;
        padding: 40px 20px;
        text-align: center;
    }

    .news-header h1 {
        margin: 0;
        font-size: 36px;
    }

    .container {
        max-width: 1100px;
        margin: auto;
        padding: 20px;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-top: 30px;
    }

    .news-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 12px rgba(0,0,0,0.08);
        transition: transform .3s;
    }

    .news-card:hover {
        transform: translateY(-5px);
    }

    .news-image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .news-content {
        padding: 20px;
    }

    .news-date {
        font-size: 14px;
        color: #777;
        margin-bottom: 8px;
    }

    .news-title {
        font-size: 20px;
        font-weight: bold;
        color: #003366;
        margin-bottom: 10px;
    }

    .news-desc {
        font-size: 15px;
        color: #444;
    }

    .read-more {
        display: inline-block;
        margin-top: 12px;
        padding: 8px 15px;
        background: #003366;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
    }
</style>
@endpush

@section('content')

<div class="news-header">
    <h1>News & Events</h1>
    <p>Latest updates, announcements and upcoming events</p>
</div>

<div class="container">

    <div class="news-grid">

        <!-- News Item -->
        <div class="news-card">
            <div class="news-image">
                <img src="{{ asset('images/news1.jpg') }}" alt="News">
            </div>
            <div class="news-content">
                <div class="news-date">August 20, 2025</div>
                <div class="news-title">BSc CSIT Entrance Exam Notice</div>
                <p class="news-desc">
                    Entrance examination schedule for BSc CSIT has been published.
                    Interested students are requested to check details.
                </p>
                <a href="#" class="read-more">Read More</a>
            </div>
        </div>

        <!-- Event Item -->
        <div class="news-card">
            <div class="news-image">
                <img src="{{ asset('images/event1.jpg') }}" alt="Event">
            </div>
            <div class="news-content">
                <div class="news-date">September 5, 2025</div>
                <div class="news-title">Tech Talk & Career Guidance Program</div>
                <p class="news-desc">
                    A special tech talk session with industry experts focusing
                    on career opportunities in IT sector.
                </p>
                <a href="#" class="read-more">Read More</a>
            </div>
        </div>

        <!-- News Item -->
        <div class="news-card">
            <div class="news-image">
                <img src="{{ asset('images/news2.jpg') }}" alt="News">
            </div>
            <div class="news-content">
                <div class="news-date">July 28, 2025</div>
                <div class="news-title">BBM & BCA Admission Open</div>
                <p class="news-desc">
                    Admissions for BBM and BCA programs are now open.
                    Apply before the deadline.
                </p>
                <a href="#" class="read-more">Read More</a>
            </div>
        </div>

    </div>

</div>

@endsection
