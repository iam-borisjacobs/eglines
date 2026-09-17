@extends('home.ecx.layout')

@section('title', 'About Us - ' . ($settings->site_name ?? 'ECX Groups'))

@section('content')

  <!-- ================> Page header start here <================== -->
  <section class="page-header bg--cover" style="background-image:url({{ asset('themes/ecx/assets/images/header/1.png') }})">
    <div class="container">
      <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
        <h2>About Us</h2>
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About</li>
          </ol>
        </nav>
      </div>
      <div class="page-header__shape">
        <span class="page-header__shape-item page-header__shape-item--1"><img src="{{ asset('themes/ecx/assets/images/header/2.png') }}" alt="shape-icon"></span>
      </div>
    </div>
  </section>
  <!-- ================> Page header end here <================== -->

  <!-- ===============>> Story section start here <<================= -->
  <div class="story padding-top bg-color-3">
    <div class="container">
      <div class="story__wrapper">
        <div class="story__thumb">
          <div class="story__thumb-inner" data-aos="fade-up" data-aos-duration="800">
            <img src="{{ asset('themes/ecx/assets/images/about/4.png') }}" alt="story-image">
            <div class="story__thumb-playbtn">
              <a href="https://www.youtube.com/watch?v=uJSgaPIvgKk" data-fslightbox><i class="fa-solid fa-circle-play"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="story__shape">
      <span class="story__shape-item story__shape-item--1"><span></span> </span>
    </div>
  </div>
  <!-- ===============>> Story section end here <<================= -->

  <!-- ===============>> About section start here <<================= -->
  <section class="about about--style1">
    <div class="container">
      <div class="about__wrapper">
        <div class="row gx-5 gy-4 gy-sm-0 align-items-center">
          <div class="col-lg-6">
            <div class="about__thumb pe-lg-5" data-aos="fade-right" data-aos-duration="800">
              <div class="about__thumb-inner">
                <div class="about__thumb-image floating-content">
                  <img src="{{ asset('themes/ecx/assets/images/about/1.png') }}" alt="about-image">
                  <div class="floating-content__top-left" data-aos="fade-right" data-aos-duration="1000">
                    <div class="floating-content__item">
                      <h3> <span class="purecounter" data-purecounter-start="0" data-purecounter-end="10">10</span>+ Years</h3>
                      <p>Institutional Experience</p>
                    </div>
                  </div>
                  <div class="floating-content__bottom-right" data-aos="fade-right" data-aos-duration="1000">
                    <div class="floating-content__item">
                      <h3> <span class="purecounter" data-purecounter-start="0" data-purecounter-end="25">25</span>K+</h3>
                      <p>Satisfied Clients</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="about__content" data-aos="fade-left" data-aos-duration="800">
              <div class="about__content-inner">
                <h2>Empowering Your <span>Financial Future</span></h2>
                <p class="mb-3">
                  {{ $settings->site_name ?? 'ECX Groups' }} is a premier institutional cryptocurrency investment platform dedicated to providing secure, transparent, and high-yield trading solutions.
                </p>
                <p class="mb-4">
                  {{ $settings->description ?? 'We leverage advanced blockchain technology, algorithmic arbitrage, and expert quantitative market analysis to help our clients maximize returns while strictly minimizing downside exposure.' }}
                </p>
                <div class="d-flex gap-3">
                  <a href="{{ route('services') }}" class="trk-btn trk-btn--border trk-btn--primary">Our Services</a>
                  <a href="{{ route('contact') }}" class="trk-btn trk-btn--outline">Get In Touch</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===============>> About section end here <<================= -->

  <!-- ========== Roadmap Section start Here========== -->
  <section class="roadmap roadmap--style1 padding-top padding-bottom bg-color" id="roadmap">
    <div class="container">
      <div class="section-header section-header--max50">
        <h2 class="mb-10 mt-minus-5">Strategic <span>Roadmap</span></h2>
        <p>Our clear trajectory for continued technological innovation, regulatory expansion, and client yield growth.</p>
      </div>
      <div class="roadmap__wrapper">
        <div class="row gy-4 gy-md-0 gx-5">
          <div class="col-md-6 offset-md-6">
            <div class="roadmap__item ms-md-4" data-aos="fade-left" data-aos-duration="800">
              <div class="roadmap__item-inner">
                <div class="roadmap__item-content">
                  <div class="roadmap__item-header">
                    <h3>Strategic Analysis</h3>
                    <span>Phase 1</span>
                  </div>
                  <p>In-depth algorithmic analysis identifying high-yield arbitrage spreads across international exchanges.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="roadmap__item roadmap__item--style2 ms-auto me-md-4" data-aos="fade-right" data-aos-duration="800">
              <div class="roadmap__item-inner">
                <div class="roadmap__item-content">
                  <div class="roadmap__item-header">
                    <h3>Platform Architecture</h3>
                    <span>Phase 2</span>
                  </div>
                  <p>Designing zero-downtime, multi-signature cold vault infrastructure to safeguard user deposits.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 offset-md-6">
            <div class="roadmap__item ms-md-4" data-aos="fade-left" data-aos-duration="800">
              <div class="roadmap__item-inner">
                <div class="roadmap__item-content">
                  <div class="roadmap__item-header">
                    <h3>Security Audits</h3>
                    <span>Phase 3</span>
                  </div>
                  <p>Continuous penetration testing and institutional compliance checks across all operational jurisdictions.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="roadmap__item roadmap__item--style2 ms-auto me-md-4" data-aos="fade-right" data-aos-duration="800">
              <div class="roadmap__item-inner">
                <div class="roadmap__item-content">
                  <div class="roadmap__item-header">
                    <h3>Global Liquidity Pools</h3>
                    <span>Phase 4</span>
                  </div>
                  <p>Expanding institutional OTC liquidity corridors and non-custodial Web3 smart contract integration.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ========== Roadmap Section end Here========== -->

@endsection
