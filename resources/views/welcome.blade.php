<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Asian College - Student Management System')</title>

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- ======= GLOBAL STYLES ======= --}}
    <style>
        /* ================= COLOR VARIABLES (IMPORTANT FIX) ================= */
        :root {
            --achs-blue: #004080;
            --achs-yellow: #ffcc00;
        }

        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        /* ================= NAVBAR ================= */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: var(--achs-blue);
            color: #fff;
            position: sticky;
            top: 0;
            z-index: 1000;
            flex-wrap: wrap;
        }

        nav .logo {
            font-size: 1.6rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        nav .social-icons a {
            color: #fff;
            margin-left: 12px;
            text-decoration: none;
            transition: 0.3s;
        }

        nav .social-icons a:hover {
            color: var(--achs-yellow);
        }

        .from-registration {
            display: flex;
            gap: 15px;
        }

        .from-registration div {
            background: #0066cc;
            padding: 5px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .from-registration div:hover {
            background: #0052a3;
        }

        .from-registration div a {
            color: #fff;
            text-decoration: none;
            font-size: 0.9rem;
        }

        /* ================= MAIN CONTENT ================= */
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 64, 128, 0.7), rgba(0, 64, 128, 0.7)), url('https://images.unsplash.com/photo-1596495577886-d920f4c5a182?auto=format&fit=crop&w=1470&q=80') center/cover no-repeat;
            color: #fff;
            min-height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 3em;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease-in-out;
        }

        .hero p {
            font-size: 1.3em;
            margin-bottom: 30px;
            max-width: 700px;
            animation: fadeInUp 1s ease-in-out;
        }

        .hero .btn {
            padding: 15px 30px;
            font-size: 1.1em;
            background-color: #ffcc00;
            color: #004080;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
            margin: 5px;
        }

        .hero .btn:hover {
            background-color: #e6b800;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Statistics Cards */
        .stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            padding: 60px 20px;
            flex-wrap: wrap;
            background-color: #f0f4f8;
        }

        .card {
            background-color: #fff;
            flex: 1 1 250px;
            max-width: 300px;
            padding: 30px 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card i {
            font-size: 3em;
            color: #004080;
            margin-bottom: 15px;
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 1.5em;
            color: #004080;
        }

        .card p {
            font-size: 1em;
            color: #555;
        }



        /* --- CONTACT FORM SECTION (NEW) --- */
        .contact-section {
            padding: 60px 10%;
            background: #f0f4f8;
            text-align: center;
        }

        .contact-section h3 {
            font-size: 2em;
            color: #004080;
            margin-bottom: 20px;
        }

        .contact-section form {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact-section input,
        .contact-section textarea,
        .contact-section select {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 1em;
        }

        .contact-section input:focus,
        .contact-section textarea:focus,
        .contact-section select:focus {
            outline: 2px solid #004080;
        }

        .file-box label {
            cursor: pointer;
            color: #004080;
            font-weight: bold;
        }

        .contact-section button {
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #ffcc00;
            color: #004080;
            font-weight: bold;
            font-size: 1em;
            cursor: pointer;
            transition: 0.3s;
        }

        .contact-section button:hover {
            background-color: #e6b800;
        }

        /* --- SUCCESS MESSAGE --- */
        .success-msg {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }


        /* ================= FOOTER ================= */
        .main-footer {
            background: var(--achs-blue);
            color: #fff;
            padding: 70px 7%;
            margin-top: 40px;
        }

        .footer-flex {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 40px;
        }

        .footer-box {
            flex: 1 1 240px;
        }

        .footer-logo {
            width: 140px;
            margin-bottom: 15px;
            filter: brightness(0) invert(1);
            /* white logo */
        }

        .footer-box h3,
        .footer-box h4 {
            color: var(--achs-yellow);
            margin-bottom: 12px;
            font-weight: bold;
        }

        .footer-box p,
        .footer-box li,
        .footer-box a {
            color: #e6e6e6;
            font-size: 0.95rem;
            line-height: 1.7;
            text-decoration: none;
        }

        .footer-box ul {
            list-style: none;
            padding: 0;
        }

        .footer-box ul li {
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .footer-box ul li:hover {
            color: var(--achs-yellow);
            transform: translateX(5px);
        }

        .footer-box iframe {
            width: 100%;
            height: 160px;
            border-radius: 6px;
            border: 2px solid var(--achs-yellow);
        }

        .footer-line {
            margin-top: 40px;
            text-align: center;
            color: #ddd;
            font-size: 0.85rem;
            opacity: 0.7;
        }

        @media (max-width: 900px) {
            .footer-box {
                flex: 1 1 100%;
            }
        }
    </style>
    @stack('styles')
</head>

<body>

    {{-- ====================== NAVBAR ====================== --}}
    <nav>
        <div class="logo">
            <i class="fas fa-graduation-cap"></i> Asian College
        </div>

        <div class="social-icons">
            <a href="https://www.facebook.com/achscollege"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="https://www.instagram.com/achscollege/"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="https://www.tiktok.com/@achscollege"><i class="fab fa-tiktok"></i> TikTok</a>
        </div>

        <div class="from-registration">
            <div>
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
            </div>
            <div>
                <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Sign Up</a>
            </div>
        </div>
    </nav>

    {{-- ====================== CONTENT ====================== --}}

    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to Asian College</h1>
        <p>Your complete student management system for courses, exams, results, and more. Simplifying academic
            administration with modern tools and real-time insights.</p>
        <div>
            <button class="btn" onclick="window.location='{{ route('login') }}'">Get Started</button>
            <button class="btn" style="background-color:#fff;color:#004080;" onclick="document.getElementById('stats').scrollIntoView({behavior:'smooth'});">Learn More</button>
        </div>
    </section>

    <!-- Statistics Cards -->
    <section class="stats" id="stats">
        <div class="card">
            <i class="fas fa-user-graduate"></i>
            <h3>Students</h3>
            <p>1,250 enrolled students across all programs</p>
        </div>
        <div class="card">
            <i class="fas fa-book"></i>
            <h3>Courses</h3>
            <p>45 academic courses covering multiple disciplines</p>
        </div>
        <div class="card">
            <i class="fas fa-file-alt"></i>
            <h3>Exams & Results</h3>
            <p>100% exam tracking with instant result notifications</p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-section">
        <h3>Contact Us</h3>

        @if(session('success'))
        <div class="success-msg">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="name" placeholder="Your Name" required maxlength="255">
            <input type="email" name="email" placeholder="Your Email" required maxlength="255">
            <input type="text" name="phone_number" placeholder="Phone Number" maxlength="20">

            <div class="custom-select">
                <select name="request" required>
                    <option value="" disabled selected>Select your request</option>
                    <option value="general">General</option>
                    <option value="support">Support</option>
                    <option value="feedback">Feedback</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <textarea name="message" rows="5" placeholder="Your Message"></textarea>

            <div class="file-box">
                <input type="file" name="attachement" id="attachement">
                <label for="attachement">Upload File</label>
            </div>

            <button type="submit"><i class="fas fa-paper-plane"></i> Send Message</button>
        </form>
    </section>

    {{-- ====================== FOOTER ====================== --}}
    <footer class="main-footer">
        <div class="footer-flex">

            <div class="footer-box">
                <img src="{{ asset('images/logo.webp') }}" class="footer-logo" alt="Logo">
                <h3>Asian College of Higher Studies</h3>
                <p>Providing quality education in the heart of Lalitpur.</p>
            </div>

            <div class="footer-box">
                <h4>Our Programs</></h4>
                <ul>
                    <li><a href="{{ route('program.csit') }}">B.Sc. CSIT</a></li>
                    <li><a href="{{ route('program.bca') }}">BCA</a></li>
                    <li><a href="{{ route('program.bbm') }}">BBM</a></li>
                    <li><a href="{{ route('program.bbs') }}">BBS</a></li>
                </ul>
            </div>


            <div class="footer-box">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('life') }}">Life @ ACHS</a></li>
                    <li><a href="{{ route('news.events') }}">News & Events</a></li>
                </ul>
            </div>

            <div class="footer-box">
                <h4>Contact Us</h4>
                <p>📞 01-5912727</p>
                <p>📱 +977-9765341484</p>
                <p>✉ info@achsnepaledu.np</p>
            </div>

            <div class="footer-box">
                <h4>Our Location</h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.217018405558!2d85.30714821504898!3d27.670668631331766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19062bbc2a01%3A0xf5a732c7d6747814!2sAsian%20College%20of%20Higher%20Studies!5e0!3m2!1sen!2snp!4v1702425824629!5m2!1sen!2snp"
                    width="100%"
                    height="160"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>


        </div>

        <div class="footer-line">
            © {{ date('Y') }} Asian College — All Rights Reserved.
        </div>
    </footer>

    @stack('scripts')
</body>

</html>