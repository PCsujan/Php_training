@extends('master')

@section('title', 'About Us')

@push('style')
<style>
/* ===========================
   GLOBAL STYLES
=========================== */
body {
    font-family: "Poppins", sans-serif;
    color: #333;
}

/* ===========================
   SLIDER
=========================== */
.slider {
    width: 100%;
    height: 520px;
    position: relative;
    overflow: hidden;
    border-bottom: 6px solid #e6b769;
}

.slides {
    display: flex;
    height: 100%;
    transition: transform 0.8s ease-in-out;
}

.slides img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


/* ===========================
   ABOUT US SECTION
=========================== */
.about-us {
    padding: 80px 20px;
    background: linear-gradient(135deg, #f7f9fc 0%, #eef3f8 100%);
}

.section-block {
    max-width: 1200px;
    margin: 0 auto 70px;
    display: flex;
    flex-wrap: wrap;
    gap: 50px;
    align-items: center;
    padding: 40px;
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.section-block:hover {
    transform: translateY(-4px);
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
}

.section-block img {
    max-width: 100%;
    width: 430px;
    border-radius: 16px;
    object-fit: cover;
}

.section-text {
    flex: 1;
}

.section-text h2 {
    font-size: 2.2rem;
    font-weight: 700;
    color: #b88a44;
    margin-bottom: 18px;
    position: relative;
}

.section-text h2::after {
    content: "";
    display: block;
    width: 70px;
    height: 4px;
    background: #d1a05b;
    margin-top: 8px;
    border-radius: 3px;
}

.section-text p,
.section-text ul {
    font-size: 1.05rem;
    line-height: 1.7;
    color: #555;
}

.section-text ul {
    list-style: disc;
    margin-left: 25px;
}


/* ===========================
   SOCIAL ICONS
=========================== */
.social-icons a {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
    margin-right: 12px;
    border-radius: 50%;
    font-size: 1.3rem;
    background: #003f73;
    color: #fff;
    box-shadow: 0 6px 15px rgba(0, 64, 120, 0.3);
    transition: 0.3s;
}

.social-icons a:hover {
    background: #ffca45;
    color: #003f73;
    transform: scale(1.12);
}


/* ===========================
   RESPONSIVE DESIGN
=========================== */
@media(max-width: 992px) {
    .section-block {
        padding: 30px;
    }
}

@media(max-width: 768px) {
    .section-block {
        flex-direction: column;
        text-align: center;
    }
    
    .section-block img {
        width: 80%;
    }

    .section-text h2::after {
        margin-left: auto;
        margin-right: auto;
    }
}
</style>
@endpush


@section('content')

<!-- ===========================
     SLIDER SECTION
=========================== -->
<div class="slider">
    <div class="slides">
        <img src="{{ asset('images/slider/aboutsus1.jpg') }}" alt="Campus Slide 1">
        <img src="{{ asset('images/slider/aboutsus2.jpg') }}" alt="Campus Slide 2">
        <img src="{{ asset('images/slider/aboutsus3.jpg') }}" alt="Campus Slide 3">
    </div>
</div>


<!-- ===========================
     ABOUT US SECTION
=========================== -->
<section class="about-us">

    <!-- MISSION -->
    <div class="section-block">
        <img src="{{ asset('images/mission.png') }}" alt="Mission Image">
        <div class="section-text">
            <h2>Our Mission</h2>
            <p>
                The mission of the ACHS Education Foundation is to develop citizens of integrity with the managerial expertise,
                vision, pragmatism, and ethical sensibility to succeed professionally and personally, both independently and collaboratively.
            </p>
        </div>
    </div>

    <!-- VISION -->
    <div class="section-block" style="flex-direction: row-reverse;">
        <img src="{{ asset('images/vision.png') }}" alt="Vision Image">
        <div class="section-text">
            <h2>Our Vision</h2>
            <p>
                To be an innovative global leader in imparting competitive, quality education by transforming lives that will
                change the world for the better.
            </p>
        </div>
    </div>

    <!-- OBJECTIVES -->
    <div class="section-block">
        <img src="{{ asset('images/objective.png') }}" alt="Objectives Image">
        <div class="section-text">
            <h2>Our Objectives</h2>
            <ul>
                <li>Provide high-quality education in various disciplines.</li>
                <li>Encourage innovation, research, and critical thinking.</li>
                <li>Promote ethical, social, and cultural values.</li>
                <li>Foster leadership and personal development in students.</li>
                <li>Strengthen community engagement and global awareness.</li>
            </ul>
        </div>
    </div>

    <!-- CHAIRMAN MESSAGE -->
    <div class="section-block" style="flex-direction: row-reverse;">
        <img src="{{ asset('images/chairman.png') }}" alt="Chairman Image">
        <div class="section-text">
            <h2>Message from the Chairman</h2>
            <p>
                Welcome to the Asian College of Higher Studies (ACHS), an innovative learning center.
                Here, you're not just an individual; you're part of a supportive family. ACHS offers holistic growth through
                seminars, workshops, and co-curricular activities.
            </p>
            <p><strong>Mr. Dinesh Chandra Nakarmi — Chairman, Asian College</strong></p>
        </div>
    </div>

    <!-- SOCIAL MEDIA -->
    <div class="section-block" style="justify-content: center; background: transparent; box-shadow: none;">
        <div class="social-icons">
            <a href="https://www.facebook.com/achscollege" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/achscollege/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@achscollege" target="_blank"><i class="fab fa-tiktok"></i></a>
        </div>
    </div>

</section>


<!-- ===========================
     SLIDER SCRIPT
=========================== -->
<script>
const slides = document.querySelector('.slides');
const images = document.querySelectorAll('.slides img');
let index = 0;

function nextSlide() {
    index++;
    if(index >= images.length) index = 0;
    slides.style.transform = `translateX(-${index * 100}vw)`;
    slides.style.transition = 'transform 0.7s ease-in-out';
}

setInterval(nextSlide, 4000);

window.addEventListener('resize', () => {
    slides.style.transition = 'none';
    slides.style.transform = `translateX(-${index * 100}vw)`;
});
</script>

@endsection
