@extends('home.ecx.layout')

@section('title', 'Terms of Service - ' . ($settings->site_name ?? 'ECX Groups'))

@section('content')

  <!-- ================> Page header start here <================== -->
  <section class="page-header bg--cover" style="background-image:url({{ asset('themes/ecx/assets/images/header/1.png') }})">
    <div class="container">
      <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
        <h2>Terms of Service</h2>
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Terms</li>
          </ol>
        </nav>
      </div>
      <div class="page-header__shape">
        <span class="page-header__shape-item page-header__shape-item--1"><img src="{{ asset('themes/ecx/assets/images/header/2.png') }}" alt="shape-icon"></span>
      </div>
    </div>
  </section>
  <!-- ================> Page header end here <================== -->

  <!-- ===============>> Terms content start here <<================= -->
  <section class="padding-top padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up" data-aos-duration="800">
          <h3>Terms of Agreement — {{ $settings->site_name ?? 'ECX Groups' }}</h3>
          <p>These terms and conditions outline the rules and regulations for the use of {{ $settings->site_name ?? 'ECX Groups' }}'s platform and client portal.</p>
          <p>By accessing this website and engaging with our automated trading or investment packages, you accept these terms and conditions in full. Do not continue to use {{ $settings->site_name ?? 'ECX Groups' }} if you do not agree with all terms outlined herein.</p>

          <h4 class="mt-4">1. Custody and Digital Assets</h4>
          <p>Client deposits are held in segregated, multi-signature digital asset storage. All transactions on the blockchain are irreversible once broadcast. Users are responsible for confirming accuracy of recipient wallet addresses.</p>

          <h4 class="mt-4">2. Account Security &amp; Compliance</h4>
          <p>You are responsible for maintaining the confidentiality of your login credentials and two-factor authentication secrets. Any actions performed under your account are deemed authorized by you. We reserve the right to request identity verification (KYC) to comply with international AML regulations.</p>

          <h4 class="mt-4">3. Investment Yields &amp; Distributions</h4>
          <p>Yield percentages and distribution intervals correspond to the active plan selected at the time of deposit. Automated payouts are calculated according to platform smart contracts and verified market arbitrage records.</p>

          <h4 class="mt-4">4. Risk Disclosure</h4>
          <p>Digital asset trading carries market exposure. While our algorithmic strategies are engineered to hedge risk and lock in arbitrage spreads, historical returns do not constitute a perpetual guarantee. Users should invest capital in accordance with their personal risk profile.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- ===============>> Terms content end here <<================= -->

@endsection
