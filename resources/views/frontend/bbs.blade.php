@extends('master')

@section('title', 'BBS Program')

@push('style')
<style>
    .program-header {
        background: #003366;
        color: #fff;
        padding: 40px 20px;
        text-align: center;
    }

    .program-header h1 {
        margin: 0;
        font-size: 36px;
    }

    .container {
        max-width: 1100px;
        margin: auto;
        padding: 20px;
    }

    .section-title {
        font-size: 26px;
        margin-top: 40px;
        margin-bottom: 15px;
        border-left: 5px solid #003366;
        padding-left: 10px;
        font-weight: bold;
        color: #003366;
    }

    .content-box {
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.08);
        margin-bottom: 25px;
    }

    .highlight-box ul {
        padding-left: 20px;
    }

    .fee-box {
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.08);
    }
</style>
@endpush

@section('content')

<div class="program-header">
    <h1>BBS (Bachelor of Business Studies)</h1>
    <p>Tribhuvan University Affiliated Program</p>
</div>

<div class="container">

    <!-- Program Overview -->
    <h2 class="section-title">Program Overview</h2>
    <div class="content-box">
        <p>
            <strong>BBS (Bachelor of Business Studies)</strong> is a four-year undergraduate program
            designed to provide students with a comprehensive understanding of business,
            management, accounting, economics, finance and entrepreneurship.
        </p>
        <p>
            The program focuses on developing analytical, managerial and leadership skills
            required for modern business environments.
        </p>
    </div>

    <!-- Program Highlights -->
    <h2 class="section-title">BBS Program Highlights</h2>
    <div class="content-box highlight-box">
        <ul>
            <li>Strong foundation in business, accounting and management</li>
            <li>Practical and theoretical learning approach</li>
            <li>Focus on entrepreneurship and leadership skills</li>
            <li>Industry-oriented curriculum</li>
            <li>Preparation for professional careers and higher studies</li>
        </ul>
    </div>

    <!-- Entry Requirements -->
    <h2 class="section-title">Entry Requirements</h2>
    <div class="content-box">
        <ul>
            <li>10+2 or equivalent in any discipline from a recognized board</li>
            <li>Minimum eligibility criteria as prescribed by Tribhuvan University</li>
            <li>No entrance examination required</li>
        </ul>
    </div>

    <!-- Career Prospects -->
    <h2 class="section-title">Career Prospects</h2>
    <div class="content-box">
        <ul>
            <li>Accountant</li>
            <li>Banking and Finance Officer</li>
            <li>Business Analyst</li>
            <li>Entrepreneur</li>
            <li>Management Trainee</li>
            <li>Further studies (MBA, MBS, CA, ACCA)</li>
        </ul>
    </div>

    <!-- Fee Structure -->
    <h2 class="section-title">Fee Structure & Scholarships</h2>
    <div class="fee-box">
        <p><strong>Total Fee (including admission):</strong> NRs. 4,50,000</p>
        <ul>
            <li>Merit Scholarship as per TU rules</li>
            <li>Need-based and performance-based scholarships available</li>
        </ul>
    </div>

</div>

@endsection
