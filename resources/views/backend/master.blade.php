<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Management System</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @stack('style')
    <style>
        /* ---------- RESET & BASE ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f4f6f8;
            display: flex;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            cursor: pointer;
        }

        /* ---------- HEADER ---------- */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 70px;
            background: linear-gradient(135deg, #4b79ff, #6b9bff);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            color: #fff;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header .logo {
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header .nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header .nav a,
        .header .nav button {
            color: #fff;
            font-weight: 500;
            border: none;
            background: none;
            font-size: 16px;
            transition: 0.3s;
        }

        .header .nav a:hover,
        .header .nav button:hover {
            color: #dce5ff;
        }

        /* ---------- SIDEBAR ---------- */
        .sidebar {
            width: 260px;
            position: fixed;
            top: 70px;
            left: 0;
            bottom: 0;
            background: #1D546C;
            padding: 20px 0;
            overflow-y: auto;
        }

        .sidebar h2 {
            text-align: center;
            color: #4b79ff;
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 20px;
        }

        .manu-item {
            color: #fff;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
            transition: 0.3s;
            border-radius: 6px;
            margin: 5px 10px;
        }

        .manu-item:hover {
            background: #356aa0;
        }

        .submenu {
            display: none;
            flex-direction: column;
            margin-left: 20px;
        }

        .submenu a {
            padding: 8px 15px;
            border-radius: 6px;
            color: #f5f1dc;
            font-size: 14px;
            transition: 0.3s;
        }

        .submenu a:hover {
            background: #e8eaff;
            color: #000;
        }

        /* ---------- MAIN CONTENT ---------- */
        .main-container {
            margin-left: 260px;
            padding: 100px 40px 40px;
            width: calc(100% - 260px);
            transition: 0.3s;
        }

        /* ---------- DASHBOARD CARDS ---------- */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-size: 18px;
            color: #003366;
            margin-bottom: 8px;
        }

        .card p,
        .card small {
            font-size: 15px;
            color: #555;
        }

        .progress-bar {
            height: 10px;
            background: #ddd;
            border-radius: 5px;
            margin-top: 8px;
            overflow: hidden;
        }

        .progress-bar-inner {
            height: 10px;
            background: #003366;
            width: 0%;
            border-radius: 5px;
            transition: 0.5s;
        }

        /* ---------- TABLE ---------- */
        .table-section {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .table-section h2 {
            color: #003366;
            margin-bottom: 15px;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        table th {
            background: #003366;
            color: #fff;
        }

        /* FOOTER FIX */
        .footer {
            width: 100%;
            /* full width */
            background: #e8ecff;
            padding: 20px 0;
            text-align: center;
            color: #003366;
            font-size: 14px;
            position: relative;
            /* let it stay at bottom naturally */
            clear: both;
            margin-top: auto;
            /* ensures it stays at bottom if main content is short */
        }

        .footer a {
            color: #4b79ff;
            margin: 0 5px;
            text-decoration: none;
        }

        /* Optional: make page minimum height full so footer sticks at bottom */
        body,
        html {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .main-container {
            margin-left: 260px;
            padding: 100px 40px 40px;
            width: calc(100% - 260px);
            flex: 1;
            /* takes remaining space, pushes footer down */
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 992px) {
            .sidebar {
                width: 200px;
            }

            .main-container {
                margin-left: 200px;
                padding: 90px 20px 20px;
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                top: 0;
            }

            .main-container {
                margin-left: 0;
                width: 100%;
                padding: 120px 20px 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <div class="logo"><i class="fa-solid fa-user-graduate"></i> Student Management System</div>
        <div class="nav">
            <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a>
            <a href="{{ route('profile') }}"><i class="fa fa-user"></i> Profile</a>
            <a href="#"><i class="fa fa-bell"></i> Notification</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit"><i class="fa fa-right-from-bracket"></i> Logout</button>
            </form>
        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="manu-item"><i class="fa fa-book"></i> Academic</div>
        <div class="submenu">
            <a href="{{ route('students.index') }}"><i class="fa-solid fa-graduation-cap"></i> Student</a>
            <a href="{{ route('teachers.index') }}"><i class="fa-solid fa-chalkboard-user"></i> Teacher</a>
            <a href="{{ route('courses.index') }}"><i class="fa-solid fa-book"></i> Courses</a>
            <a href="{{ route('subjects.index') }}"><i class="fa-solid fa-layer-group"></i> Subjects</a>
            <a href="{{ route('exams.index') }}"><i class="fa-solid fa-file-pen"></i> Exams</a>
            <a href="{{ route('results.index') }}"><i class="fa-solid fa-square-poll-vertical"></i> Results</a>
            <a href="{{ route('enrollments.index') }}"><i class="fa fa-calendar"></i> Enrollments</a>
            <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
        </div>
        <div class="manu-item"><i class="fa fa-envelope"></i> Inbox</div>
        <div class="submenu">
            <a href="{{ route('contacts.inbox') }}"><i class="fa-solid fa-inbox"></i> View Messages</a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-container">
        @yield('content')
    </div>

    <!-- FOOTER -->
    <div class="footer">
        &copy; 2025 Online Student Management System | Designed by Your College
        <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a>
    </div>

    <script>
        // Sidebar submenu toggle
        document.querySelectorAll(".manu-item").forEach(item => {
            item.addEventListener("click", () => {
                const submenu = item.nextElementSibling;
                submenu.style.display = submenu.style.display === "block" ? "none" : "flex";
            });
        });
    </script>

</body>

</html>