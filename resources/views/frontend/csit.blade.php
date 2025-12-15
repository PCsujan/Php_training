@extends('master')

@section('title', 'BSc CSIT Curriculum')

@push('style')
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f7f7f7;
        color: #222;
        line-height: 1.6;
    }

    header {
        background: #003366;
        padding: 40px 20px;
        color: #fff;
        text-align: center;
    }

    header h1 {
        margin: 0;
        font-size: 36px;
        letter-spacing: 1px;
    }

    .container {
        max-width: 1100px;
        margin: auto;
        padding: 20px;
    }

    .section-title {
        font-size: 26px;
        margin-top: 40px;
        margin-bottom: 10px;
        border-left: 5px solid #003366;
        padding-left: 10px;
        font-weight: bold;
        color: #003366;
    }

    .text-block,
    .subject-card,
    .profile-box,
    .highlight-section,
    .fee-box {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        margin-top: 15px;
        box-shadow: 0 0 10px rgba(0,0,0,0.08);
    }

    /* Semester buttons */
    .semester-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 12px;
        margin: 25px 0;
    }

    .semester-btn {
        background: #003366;
        color: #fff;
        padding: 15px;
        text-align: center;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        transition: .3s;
    }

    .semester-btn:hover {
        background: #0055aa;
    }

    .subjects {
        display: none;
        margin-top: 25px;
    }

    .subject-title {
        font-size: 20px;
        font-weight: bold;
        color: #003366;
    }

    .subject-code {
        font-weight: bold;
        color: #555;
        margin-bottom: 8px;
    }

    .discover {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 16px;
        background: #003366;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }
</style>
@endpush

@section('content')

<header>
    <h1>BSc CSIT Program</h1>
</header>

<div class="container">

    <!-- Program Overview -->
    <h2 class="section-title">Program Overview</h2>
    <div class="text-block">
        <p>
            <strong>B.Sc. CSIT</strong> (Bachelor of Science in Computer Science and Information Technology)
            is a four-year (8 semesters, 126 credit hours) course offering intensive knowledge
            in Computer Science and Information Technology.
        </p>
    </div>

    <!-- Curriculum -->
    <h2 class="section-title">Program Curriculum</h2>

    <div class="semester-list">
        <div class="semester-btn" onclick="showSemester(1)">Semester I</div>
        <div class="semester-btn" onclick="showSemester(2)">Semester II</div>
        <div class="semester-btn" onclick="showSemester(3)">Semester III</div>
        <div class="semester-btn" onclick="showSemester(4)">Semester IV</div>
        <div class="semester-btn" onclick="showSemester(5)">Semester V</div>
        <div class="semester-btn" onclick="showSemester(6)">Semester VI</div>
        <div class="semester-btn" onclick="showSemester(7)">Semester VII</div>
        <div class="semester-btn" onclick="showSemester(8)">Semester VIII</div>
    </div>

    <!-- SEMESTER I -->
    <div class="subjects" id="sem1">
        <h3>Semester I</h3>

        <div class="subject-card">
            <div class="subject-title">Introduction to Information Technology</div>
            <div class="subject-code">CSC109</div>
            <p>Computer systems, hardware, software, databases and internet basics.</p>
            <a href="#" class="discover">Discover</a>
        </div>

        <div class="subject-card">
            <div class="subject-title">Digital Logic</div>
            <div class="subject-code">CSC111</div>
            <p>Boolean algebra, logic gates, combinational and sequential circuits.</p>
            <a href="#" class="discover">Discover</a>
        </div>

        <div class="subject-card">
            <div class="subject-title">Physics</div>
            <div class="subject-code">PHY113</div>
            <p>Oscillation, EM theory, quantum mechanics and semiconductor physics.</p>
            <a href="#" class="discover">Discover</a>
        </div>

        <div class="subject-card">
            <div class="subject-title">C Programming</div>
            <div class="subject-code">CSC110</div>
            <p>Structured programming using C language.</p>
            <a href="#" class="discover">Discover</a>
        </div>

        <div class="subject-card">
            <div class="subject-title">Mathematics I</div>
            <div class="subject-code">MTH112</div>
            <p>Limits, continuity, differentiation and integration.</p>
            <a href="#" class="discover">Discover</a>
        </div>
    </div>

    <!-- SEMESTER VII (sample) -->
    <div class="subjects" id="sem7">
        <h3>Semester VII</h3>

        <div class="subject-card">
            <div class="subject-title">Advanced Database</div>
            <div class="subject-code">CSC461</div>
            <p>NoSQL, big data, query optimization and modern DB technologies.</p>
            <a href="#" class="discover">Discover</a>
        </div>
    </div>

    <!-- SEMESTER VIII -->
    <div class="subjects" id="sem8">
        <h3>Semester VIII</h3>

        <div class="subject-card">
            <div class="subject-title">Internship</div>
            <div class="subject-code">CSC410</div>
            <p>Real-world industry experience.</p>
            <a href="#" class="discover">Discover</a>
        </div>
    </div>

    <!-- Coordinator -->
    <div class="profile-box">
        <h3>Er. Pranaya Nakarmi</h3>
        <strong>BSc CSIT Coordinator</strong>
        <p>
            Our B.Sc. CSIT program builds strong theoretical and practical IT skills
            for solving real-world problems.
        </p>
    </div>

    <!-- Highlights -->
    <h2 class="section-title">Program Highlights</h2>
    <div class="highlight-section">
        <ul>
            <li>Strong programming & analytical foundation</li>
            <li>Hands-on lab-based learning</li>
            <li>Industry exposure & internships</li>
            <li>Modern curriculum</li>
        </ul>
    </div>

    <!-- Fee -->
    <h2 class="section-title">Fee Structure & Scholarships</h2>
    <div class="fee-box">
        <p><strong>Total Fee:</strong> NRs. 11,60,000</p>
        <ul>
            <li>Merit Scholarship: 10% (TU rule)</li>
            <li>NEB grade-based discounts</li>
        </ul>
    </div>

</div>

@push('script')
<script>
    function showSemester(sem) {
        document.querySelectorAll('.subjects').forEach(s => s.style.display = 'none');
        document.getElementById('sem' + sem).style.display = 'block';
        window.scrollTo({ top: 300, behavior: 'smooth' });
    }
</script>
@endpush

@endsection
