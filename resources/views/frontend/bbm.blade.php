@extends('master')

@section('title', 'BBM Program Curriculum')

@push('style')
<style>
    body{
        font-family: Arial, sans-serif;
        background:#f4f6f8;
        margin:0;
        padding:0;
        line-height:1.6;
    }

    .container{
        max-width:1100px;
        margin:auto;
        padding:20px;
    }

    h1{
        text-align:center;
        color:#003366;
    }

    /* Semester buttons */
    .semester-list{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(150px,1fr));
        gap:12px;
        margin:30px 0;
    }

    .semester-btn{
        background:#003366;
        color:#fff;
        padding:15px;
        text-align:center;
        border-radius:6px;
        cursor:pointer;
        font-weight:bold;
        transition:.3s;
    }

    .semester-btn:hover{
        background:#0055aa;
    }

    /* Subjects */
    .subjects{
        display:none;
        margin-top:30px;
    }

    .subject-card{
        background:#fff;
        padding:20px;
        border-radius:8px;
        margin-bottom:20px;
        box-shadow:0 0 10px rgba(0,0,0,.08);
    }

    .subject-title{
        font-size:20px;
        font-weight:bold;
        color:#003366;
    }

    .subject-code{
        font-weight:bold;
        color:#555;
        margin-bottom:8px;
    }

    .discover{
        display:inline-block;
        margin-top:10px;
        padding:8px 15px;
        background:#003366;
        color:#fff;
        text-decoration:none;
        border-radius:5px;
    }

    .info-box{
        background:#fff;
        padding:25px;
        margin-top:30px;
        border-radius:10px;
        box-shadow:0 0 10px rgba(0,0,0,.08);
    }

    footer{
        margin-top:40px;
        background:#003366;
        color:#fff;
        text-align:center;
        padding:15px;
    }
</style>
@endpush

@section('content')
<div class="container">

    <h1>BBM (Bachelor in Business Management)</h1>

    <p>
        The <strong>BBM</strong> program is a four-year (8 semesters, 126 credit hours)
        degree designed to provide intensive knowledge in business management and leadership.
    </p>

    <!-- Semester Buttons -->
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

    <!-- ================= SEMESTER I ================= -->
    <div class="subjects" id="sem1">
        <h2>Semester I</h2>

        <div class="subject-card">
            <div class="subject-title">Microeconomics for Business</div>
            <div class="subject-code">ECO203</div>
            <p>
                Introduces economic principles relevant to business decision-making,
                including demand & supply, market structures, and cost analysis.
            </p>
            <a href="#" class="discover">Discover</a>
        </div>

        <div class="subject-card">
            <div class="subject-title">Foundation of Business Management</div>
            <div class="subject-code">MGT231</div>
            <p>
                Covers fundamentals of management, planning, organizing, leading,
                controlling and modern management practices.
            </p>
            <a href="#" class="discover">Discover</a>
        </div>

        <div class="subject-card">
            <div class="subject-title">Sociology for Business Management</div>
            <div class="subject-code">SOC203</div>
            <p>
                Examines social behavior, organizational culture, social systems
                and their impact on business and management.
            </p>
            <a href="#" class="discover">Discover</a>
        </div>

        <div class="subject-card">
            <div class="subject-title">English I</div>
            <div class="subject-code">ENG201</div>
            <p>
                Develops communication skills for business including reading,
                writing, presentation and professional correspondence.
            </p>
            <a href="#" class="discover">Discover</a>
        </div>

        <div class="subject-card">
            <div class="subject-title">Business Mathematics I</div>
            <div class="subject-code">MTH201</div>
            <p>
                Covers functions, limits, differentiation, integration and
                mathematical tools used in business analysis.
            </p>
            <a href="#" class="discover">Discover</a>
        </div>
    </div>

    <!-- ================= OTHER SEMESTERS ================= -->
    <div class="subjects" id="sem2"><h2>Semester II</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem3"><h2>Semester III</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem4"><h2>Semester IV</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem5"><h2>Semester V</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem6"><h2>Semester VI</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem7"><h2>Semester VII</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem8"><h2>Semester VIII</h2><p>Subjects will be listed here.</p></div>

    <!-- Coordinator -->
    <div class="info-box">
        <h3>Shreejana Shahi, CHE</h3>
        <strong>BBM Co-ordinator</strong>
        <p>
            Our BBM program develops future business leaders through a blend
            of theory and practical learning, preparing students for real-world
            business challenges.
        </p>
    </div>

    <!-- Highlights -->
    <div class="info-box">
        <h3>BBM Program Highlights</h3>
        <ul>
            <li>Comprehensive coverage of business management disciplines</li>
            <li>Case-study based learning approach</li>
            <li>Industry interaction through guest lectures & visits</li>
            <li>Entrepreneurship development focus</li>
            <li>Practical training in business analytics</li>
        </ul>
    </div>

    <!-- Entry Requirements -->
    <div class="info-box">
        <h3>Entry Requirements</h3>
        <ul>
            <li>10+2 or equivalent in any discipline with minimum 45%</li>
            <li>No entrance examination required</li>
        </ul>
    </div>

    <!-- Fee -->
    <div class="info-box">
        <h3>Fee Structure & Scholarships</h3>
        <p><strong>Total Fee (including admission):</strong> NRs. 6,00,000</p>
        <ul>
            <li>Merit Scholarship: 10% as per TU rules</li>
            <li>Discounts based on NEB grades</li>
        </ul>
    </div>

</div>

<footer>
    © {{ date('Y') }} BBM Program – All Rights Reserved
</footer>

<script>
    function showSemester(sem){
        document.querySelectorAll('.subjects').forEach(s => s.style.display = 'none');
        document.getElementById('sem' + sem).style.display = 'block';
        window.scrollTo({ top: 350, behavior: 'smooth' });
    }
</script>
@endsection



