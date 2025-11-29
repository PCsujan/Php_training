<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Management System</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #778873;
            display: flex;
            overflow: hidden;
        }

        /* ---------------- HEADER ---------------- */
        .header {
            background: linear-gradient(135deg, #4b79ff, #6b9bff);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 2000;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
        }

        .nav a,
        .nav button {
            color: white;
            margin-left: 25px;
            text-decoration: none;
            font-weight: 500;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .nav a:hover,
        .nav button:hover {
            color: #dce5ff;
        }

        /* ---------------- SIDEBAR ---------------- */
        .sidebar {
            width: 280px;
            background: #1D546C;
            height: 100vh;
            padding: 90px 20px 20px;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            overflow-y: auto;
        }

        .sidebar h2 {
            font-size: 20px;
            font-weight: 700;
            color: #4b79ff;
            margin-bottom: 20px;
            text-align: center;
        }

        .manu-item {
            background: #e8edff;
            padding: 14px;
            margin: 8px 0;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .manu-item:hover {
            background: #d5ddff;
            transform: scale(1.03);
        }


        .submenu {
            display: none;
            padding-left: 30px;
            margin-bottom: 10px;
        }

        .submenu a {
            display: flex;
            align-items: center;
            padding: 8px;
            gap: 10px;
            text-decoration: none;
            color: #F5F1DC;
            font-size: 15px;
        }

        .submenu a:hover {
            /* color: #4b79ff; */
            background: #e8eaff;
            color: #000;
            cursor: pointer;
        }


        /* ---------------- MAIN CONTENT ---------------- */
        .main-container {
            margin-left: 280px;
            width: calc(100% - 280px);
            padding: 120px 40px 40px;
            height: 100vh;
            overflow-y: auto;
        }

        .hero {
            background: linear-gradient(135deg, #4b79ff, #6b9bff);
            padding: 60px;
            color: white;
            border-radius: 12px;
            text-align: center;
            animation: fade 0.5s ease-in-out;
        }

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer {
            margin-top: 40px;
            padding: 15px;
            background: #e8ecff;
            border-radius: 12px;
            text-align: center;
        }

        .footer a {
            color: #4b79ff;
            text-decoration: none;
        }

        */
    </style>
    @stack('style')
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <div class="logo"><i class="fa-solid fa-user-graduate"></i>
            Student Management System</div>

        <div class="nav">
            <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a>
            <a href="#"><i class="fa fa-user"></i> Profile</a>
            <a href="#"><i class="fa fa-bell"></i> Notification</a>

            <!-- 🔥 LOGOUT FORM (POST method) -->
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit"><i class="fa fa-right-from-bracket"></i> logout</button>
            </form>
        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="manu-item"><i class="fa fa-book"></i> Academic</div>
        <div class="submenu">
            <a href="{{ route('students.index') }}"><i class="fa-solid fa-graduation-cap"></i> Student</a>
            <a href="{{ route('teachers.index') }}"><i class="fa-solid fa-chalkboard-user"></i> Teacher</a>
            <a href="{{ route('courses.index') }}"><i class="fa-solid fa-book"></i>Courses</a>
            <a href="{{ route('subjects.index') }}"><i class="fa-solid fa-layer-group"></i> Subjects</a>
            <a href="{{ route('exams.index') }}"><i class="fa-solid fa-file-pen"></i> Exams</a>
            <a href="{{ route('results.index') }}"><i class="fa-solid fa-square-poll-vertical"></i>Results</a>
            <a href="{{ route('enrollments.index') }}"><i class="fa fa-calendar"></i> Enrollments</a>
            <a href="#"><i class="fa-solid fa-gear"></i>Setting</a>


        </div>

    </div>

    <!-- MAIN CONTENT -->
    <div class="main-container">
        @yield('content')

        <div class="footer">
            <p>&copy; 2025 Online Student Management System | Designed by Your College</p>
            <a href="#">Privacy Policy</a> |
            <a href="#">Terms & Conditions</a>
        </div>
    </div>

    <script>
        document.querySelectorAll(".manu-item").forEach(item => {
            item.addEventListener("click", () => {
                const submenu = item.nextElementSibling;
                submenu.style.display = submenu.style.display === "none" ? "none" : "block";
            });
        });
    </script>
</body>

</html>