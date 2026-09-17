@extends('home.ecx.layout')

@section('title', 'Privacy Policy - ' . ($settings->site_name ?? 'ECX Groups'))

@section('content')

  <!-- ================> Page header start here <================== -->
  <section class="page-header bg--cover" style="background-image:url({{ asset('themes/ecx/assets/images/header/1.png') }})">
    <div class="container">
      <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
        <h2>Privacy Policy</h2>
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
          </ol>
        </nav>
      </div>
      <div class="page-header__shape">
        <span class="page-header__shape-item page-header__shape-item--1"><img src="{{ asset('themes/ecx/assets/images/header/2.png') }}" alt="shape-icon"></span>
      </div>
    </div>
  </section>
  <!-- ================> Page header end here <================== -->

  <!-- ===============>> Policy content start here <<================= -->
  <section class="padding-top padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up" data-aos-duration="800">
          <h3>Privacy &amp; Data Protection Policy</h3>
          <p>At {{ $settings->site_name ?? 'ECX Groups' }}, we are firmly committed to safeguarding the privacy and confidential data of our global investors and clients.</p>

          <h4 class="mt-4">1. Information We Collect</h4>
          <p>We collect personal information necessary to deliver our services, including account credentials, email addresses, phone numbers, identity verification documents (for KYC compliance), and public blockchain wallet addresses.</p>

          <h4 class="mt-4">2. Security of Your Information</h4>
          <p>All sensitive client data is transmitted across encrypted 256-bit TLS channels and stored in SOC 2 Type II compliant data centers. Passwords are irreversibly hashed using standard cryptographic algorithms, ensuring no plaintext credentials are ever stored.</p>

          <h4 class="mt-4">3. Data Sharing &amp; Third Parties</h4>
          <p>We do not sell, rent, or monetize personal user data. Data is disclosed only when required to process verified financial transactions, comply with judicial process, or fulfill statutory anti-money laundering reporting requirements.</p>

          <h4 class="mt-4">4. Your Rights</h4>
          <p>You maintain the right to inspect, update, or request the deletion of your personal profile information at any time by contacting our compliance officer at <a href="mailto:{{ $settings->contact_email ?? 'info@ecxgroups.com' }}">{{ $settings->contact_email ?? 'info@ecxgroups.com' }}</a>.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- ===============>> Policy content end here <<================= -->

@endsection
