@extends('home.ecx.layout')

@section('title', 'Institutional Services - ' . ($settings->site_name ?? 'ECX Groups'))

@section('content')

  <!-- ================> Page header start here <================== -->
  <section class="page-header bg--cover" style="background-image:url({{ asset('themes/ecx/assets/images/header/1.png') }})">
    <div class="container">
      <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
        <h2>Services</h2>
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
          </ol>
        </nav>
      </div>
      <div class="page-header__shape">
        <span class="page-header__shape-item page-header__shape-item--1"><img src="{{ asset('themes/ecx/assets/images/header/2.png') }}" alt="shape-icon"></span>
      </div>
    </div>
  </section>
  <!-- ================> Page header end here <================== -->

  <!-- ===============>> Service section start here <<================= -->
  <section class="service padding-top padding-bottom bg-color-7">
    <div class="section-header section-header--max50">
      <h2 class="mb-10 mt-minus-5">Explore <span>{{ $settings->site_name ?? 'ECX GROUPS' }}</span> Capabilities</h2>
      <p>Comprehensive institutional solutions designed for capital preservation, algorithmic yield, and rapid digital settlement.</p>
    </div>
    <div class="container">
      <div class="service__wrapper">
        <div class="row g-4 align-items-center">
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="800">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img src="{{ asset('themes/ecx/assets/images/service/1.png') }}" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5> <a class="stretched-link" href="{{ route('register') }}">ALGORITHMIC TRADING</a> </h5>
                  <p class="mb-0">Professional Quantitative Analysts executing low-latency market making and spatial arbitrage strategies across tier-one venues.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="1000">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img src="{{ asset('themes/ecx/assets/images/service/2.png') }}" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5> <a class="stretched-link" href="{{ route('register') }}">AUTOMATED TRADING BOTS</a> </h5>
                  <p class="mb-0">Proprietary automated trading execution eliminating psychological bias and executing optimal entry and exit points 24/7.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="1200">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img src="{{ asset('themes/ecx/assets/images/service/3.png') }}" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5> <a class="stretched-link" href="{{ route('register') }}">PORTFOLIO MANAGEMENT</a> </h5>
                  <p class="mb-0">Institutional asset segregation, automated yield compounding, and complete visibility over historical ROI and transaction flows.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="800">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img src="{{ asset('themes/ecx/assets/images/service/4.png') }}" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5> <a class="stretched-link" href="{{ route('register') }}">MOBILE &amp; WEB ACCESS</a> </h5>
                  <p class="mb-0">Full responsive web app capability allowing real-time trading review, plan subscription, and swift withdrawal processing on any screen.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="1000">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img src="{{ asset('themes/ecx/assets/images/service/5.png') }}" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5> <a class="stretched-link" href="{{ route('register') }}">COLD STORAGE CUSTODY</a> </h5>
                  <p class="mb-0">Institutional cryptographic custody safeguarding your deposits behind multi-party computation (MPC) and segregated cold vaults.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="1200">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img src="{{ asset('themes/ecx/assets/images/service/6.png') }}" alt="service-icon">
                </div>
                <div class="service__item-content">
                  <h5> <a class="stretched-link" href="{{ route('register') }}">FIAT &amp; CRYPTO SETTLEMENT</a> </h5>
                  <p class="mb-0">Fast on-ramps and off-ramps supporting global wire transfers, automated merchant processors, and direct blockchain payouts.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="service__shape">
      <span class="service__shape-item service__shape-item--2"> <img src="{{ asset('themes/ecx/assets/images/icon/shape/1.png') }}" alt="shape-icon"></span>
      <span class="service__shape-item service__shape-item--3"> <img src="{{ asset('themes/ecx/assets/images/icon/shape/2.png') }}" alt="shape-icon"></span>
    </div>
  </section>
  <!-- ===============>> Service section end here <<================= -->

@endsection
