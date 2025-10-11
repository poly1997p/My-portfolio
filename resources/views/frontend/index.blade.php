@extends('frontend.master')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center">
          <div class="col-lg-6 order-2 order-lg-1">
            <div class="hero-content">
              <h1 data-aos="fade-up" data-aos-delay="200">Hello, I'm <span class="highlight">Brandon Johnson</span></h1>
              <h2 data-aos="fade-up" data-aos-delay="300">Creative <span class="typed" data-typed-items="UI/UX Designer, Web Developer, Digital Artist, Brand Strategist"></span></h2>
              <p data-aos="fade-up" data-aos-delay="400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <div class="hero-actions" data-aos="fade-up" data-aos-delay="500">
                <a href="{{url('/portfolio-details')}}" class="btn btn-primary">View My Work</a>
                <a href="{{url('/contact')}}" class="btn btn-outline">Get In Touch</a>
              </div>
              <div class="social-links" data-aos="fade-up" data-aos-delay="600">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-github"></i></a>
                <a href="#"><i class="bi bi-dribbble"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2">
            <div class="hero-image" data-aos="zoom-in" data-aos-delay="300">
              <div class="image-wrapper">
                <img src="{{asset('frontend/assets/img/profile/poly.jpg')}}" alt="Sarah Mitchell" class="img-fluid">
                <div class="floating-elements">
                  <div class="floating-card design" data-aos="fade-left" data-aos-delay="700">
                    <i class="bi bi-palette"></i>
                    <span>Design</span>
                  </div>
                  <div class="floating-card code" data-aos="fade-right" data-aos-delay="800">
                    <i class="bi bi-code-slash"></i>
                    <span>Code</span>
                  </div>
                  <div class="floating-card creativity" data-aos="fade-up" data-aos-delay="900">
                    <i class="bi bi-lightbulb"></i>
                    <span>Ideas</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->

<!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection