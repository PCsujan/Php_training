<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Asian College - Student Management System')</title>

  {{-- FontAwesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  @stack('style')

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

    nav .nav-social-icons a {
      color: #fff;
      margin-left: 18px;
      font-size: 1rem;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      text-decoration: none;
      transition: 0.3s ease;
    }

    nav .nav-social-icons a:hover {
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
    main {
      min-height: 60vh;
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
</head>

<body>

  {{-- ====================== NAVBAR ====================== --}}
  <nav>
    <div class="logo">
      <i class="fas fa-graduation-cap"></i> Asian College
    </div>

    <div class="nav-social-icons">
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
  <main>
    @yield('content')
  </main>

  {{-- ====================== FOOTER ====================== --}}
  <footer class="main-footer">
    <div class="footer-flex">

      <div class="footer-box">
        <img src="{{ asset('images/logo.webp') }}" class="footer-logo" alt="Logo">
        <h3>Asian College of Higher Studies</h3>
        <p>Providing quality education in the heart of Lalitpur.</p>
      </div>

      <div class="footer-box">
        <h4>Our Programs</>
        </h4>
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