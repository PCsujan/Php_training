
@extends('master')

@section('title', 'BCA Program Curriculum')

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

    /* Subject sections */
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

    <h1>BCA (Bachelor in Computer Application)</h1>

    <p>
        The <strong>BCA</strong> program prepares students for the IT industry with strong foundations
        in computer applications, software development, databases and web technologies.
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
            <div class="subject-title">Computer Fundamentals and Applications</div>
            <div class="subject-code">CACS101</div>
            <p>
                Introduction to computer systems, software, DBMS, operating systems,
                data communication & networking, and contemporary technologies.
                Includes practical skills using word processing, spreadsheets,
                presentations and graphics tools.
            </p>
            <a href="#" class="discover">Discover</a>
        </div>

        <div class="subject-card">
            <div class="subject-title">English I</div>
            <div class="subject-code">CACS103</div>
            <p>
                Focuses on English language skills with technical vocabulary,
                grammar accuracy, reading and listening passages related to
                modern computing topics and professional letter writing.
            </p>
            <a href="#" class="discover">Discover</a>
        </div>

        <div class="subject-card">
            <div class="subject-title">Society and Technology</div>
            <div class="subject-code">CACS102</div>
            <p>
                Covers sociology concepts and the impact of technology on society,
                Nepalese social structure, social systems and research in social sciences.
            </p>
            <a href="#" class="discover">Discover</a>
        </div>
    </div>

    <!-- ================= OTHER SEMESTERS (placeholder) ================= -->
    <div class="subjects" id="sem2"><h2>Semester II</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem3"><h2>Semester III</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem4"><h2>Semester IV</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem5"><h2>Semester V</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem6"><h2>Semester VI</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem7"><h2>Semester VII</h2><p>Subjects will be listed here.</p></div>
    <div class="subjects" id="sem8"><h2>Semester VIII</h2><p>Subjects will be listed here.</p></div>

    <!-- Coordinator -->
    <div class="info-box">
        <h3>Er. Pranaya Nakarmi</h3>
        <strong>BCA Coordinator</strong>
        <p>
            The BCA program blends theoretical concepts with practical application,
            preparing students for careers in software development, database management
            and web technologies.
        </p>
    </div>

    <!-- Highlights -->
    <div class="info-box">
        <h3>BCA Program Highlights</h3>
        <ul>
            <li>Focus on application development & software engineering</li>
            <li>Hands-on training with modern programming tools</li>
            <li>Industry-aligned curriculum</li>
            <li>Internship opportunities with IT companies</li>
            <li>Strong foundation for higher studies</li>
        </ul>
    </div>

    <!-- Entry Requirements -->
    <div class="info-box">
        <h3>Entry Requirements</h3>
        <ul>
            <li>10+2 or equivalent in any discipline with minimum 45%</li>
            <li>Must pass college entrance examination</li>
        </ul>
    </div>

    <!-- Fee -->
    <div class="info-box">
        <h3>Fee Structure & Scholarships</h3>
        <p><strong>Total Fee (including admission):</strong> NRs. 7,50,000</p>
        <ul>
            <li>Merit Scholarship: 10% as per TU rules</li>
            <li>Discounts based on NEB grades</li>
        </ul>
    </div>

</div>

<footer>
    © {{ date('Y') }} BCA Program – All Rights Reserved
</footer>

<script>
    function showSemester(sem){
        document.querySelectorAll('.subjects').forEach(s => s.style.display = 'none');
        document.getElementById('sem' + sem).style.display = 'block';
        window.scrollTo({ top: 350, behavior: 'smooth' });
    }
</script>
@endsection
