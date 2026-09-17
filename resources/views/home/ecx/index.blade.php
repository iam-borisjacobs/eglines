@extends('home.ecx.layout')

@section('title', $settings->site_title ?? 'Professional Crypto Investment Platform')

@section('content')

  <!-- ===============>> Banner section start here <<================= -->
  <section class="banner banner--style4 bg--cover" style="background-image:url({{ asset('themes/ecx/assets/images/banner/home4/1.png') }})">
    <div class="container">
      <div class="banner__wrapper">
        <div class="row justify-content-center">
          <div class="col-md-10 justify-content-center">
            <div class="banner__content" data-aos="fade-up" data-aos-duration="800">
              <h1>Deposit, Invest, Withdraw <br> Trade with us at scale.</h1>
              <p>A complete platform for your financial freedom. Comprehensive tools for smart investing and automated yield generation.</p>
              <div class="banner__content-btn btn-group justify-content-center">
                @auth
                  <a href="{{ url('/dashboard') }}" class="trk-btn trk-btn--primary trk-btn--arrow">Go to Dashboard</a>
                  <a href="{{ url('/dashboard/buy-plan') }}" class="trk-btn trk-btn--primary trk-btn--arrow" style="margin-left: 15px;">Explore Plans</a>
                @else
                  <a href="{{ route('register') }}" class="trk-btn trk-btn--primary trk-btn--arrow">Start Trading Today</a>
                  <a href="{{ url('/dashboard/connect-wallet') }}" class="trk-btn trk-btn--primary trk-btn--arrow" style="margin-left: 15px;">Connect Wallet</a>
                @endauth
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="banner__shape">
      <span class="banner__shape-item banner__shape-item--1"><img src="{{ asset('themes/ecx/assets/images/banner/home1/4.png') }}" alt="shape icon"></span>
      <span class="banner__shape-item banner__shape-item--5"><img src="{{ asset('themes/ecx/assets/images/banner/home4/2.png') }}" alt="shape icon"></span>
    </div>
  </section>
  <!-- ===============>> Banner section end here <<================= -->

  <!-- ===============>> Counter / Market Ticker start here <<================= -->
  <div class="counter padding-bottom">
    <div class="container">
      <!-- TradingView Widget BEGIN -->
      <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
          {
            "symbols": [
              { "description": "Bitcoin", "proName": "BINANCE:BTCUSDT" },
              { "description": "Ethereum", "proName": "BINANCE:ETHUSDT" },
              { "description": "Solana", "proName": "BINANCE:SOLUSDT" },
              { "description": "XRP", "proName": "BINANCE:XRPUSDT" },
              { "description": "Litecoin", "proName": "BINANCE:LTCUSDT" },
              { "description": "BNB", "proName": "BINANCE:BNBUSDT" }
            ],
            "showSymbolLogo": true,
            "isTransparent": false,
            "displayMode": "adaptive",
            "colorTheme": "dark",
            "locale": "en"
          }
        </script>
      </div>
      <!-- TradingView Widget END -->

      <div class="counter__wrapper">
        <div class="row g-5">
          <div class="col-am-6 col-lg-3">
            <div class="counter__item" data-aos="fade-up" data-aos-duration="800">
              <div class="counter__item-inner">
                <div class="counter__item-thumb">
                  <img src="{{ asset('themes/ecx/assets/images/banner/home4/icon/1.png') }}" alt="counter icon" style="max-height: 48px; object-fit: contain;">
                </div>
                <div class="counter__item-content">
                  <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $total_users ?? 25 }}"></span>+</h3>
                  <p>Active Verified Traders</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-am-6 col-lg-3">
            <div class="counter__item" data-aos="fade-up" data-aos-duration="1000">
              <div class="counter__item-inner">
                <div class="counter__item-thumb">
                  <img src="{{ asset('themes/ecx/assets/images/banner/home4/icon/2.png') }}" alt="counter icon" style="max-height: 48px; object-fit: contain;">
                </div>
                <div class="counter__item-content">
                  <h3>$<span class="purecounter" data-purecounter-start="0" data-purecounter-end="18"></span>M+</h3>
                  <p>Capital Managed</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-am-6 col-lg-3">
            <div class="counter__item" data-aos="fade-up" data-aos-duration="1200">
              <div class="counter__item-inner">
                <div class="counter__item-thumb">
                  <img src="{{ asset('themes/ecx/assets/images/banner/home4/icon/3.png') }}" alt="counter icon" style="max-height: 48px; object-fit: contain;">
                </div>
                <div class="counter__item-content">
                  <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="99"></span>.9%</h3>
                  <p>Vault Uptime</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-am-6 col-lg-3">
            <div class="counter__item" data-aos="fade-up" data-aos-duration="1400">
              <div class="counter__item-inner">
                <div class="counter__item-thumb">
                  <img src="{{ asset('themes/ecx/assets/images/banner/home4/icon/4.png') }}" alt="counter icon" style="max-height: 48px; object-fit: contain;">
                </div>
                <div class="counter__item-content">
                  <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="12"></span></h3>
                  <p>Global Jurisdictions</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ===============>> counter end here <<================= -->

  <!-- ===============>> About section start here <<================= -->
  <section class="about about--style4 padding-top padding-bottom">
    <div class="container">
      <div class="about__wrapper">
        <div class="row gx-5 gy-4 align-items-center">
          <div class="col-md-6">
            <div class="about__thumb" data-aos="fade-right" data-aos-duration="800">
              <div class="about__thumb-inner">
                <img src="{{ asset('themes/ecx/assets/images/about/home3/1.png') }}" alt="about-image" class="img-fluid rounded-4 shadow-sm">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="about__content" data-aos="fade-left" data-aos-duration="800">
              <h2>Meet <span>{{ $settings->site_name ?? 'ECX Groups' }}</span> — Institutional Precision</h2>
              <p class="mb-3">
                {{ $settings->description ?? 'Welcome to ECX Groups, the ultimate platform designed to transform your trading business. Secure, fast, and reliable investment solutions built with institutional grade infrastructure.' }}
              </p>
              <p class="mb-4">
                Our ecosystem is engineered to automate market arbitrage and yield generation with complete transparency, bank-grade encryption, and seamless multi-asset settlement.
              </p>
              <a href="{{ route('about') }}" class="trk-btn trk-btn--border trk-btn--primary">Explore More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===============>> About section end here <<================= -->

  <!-- ===============>> Service section start here <<================= -->
  <section class="service padding-top padding-bottom bg-color-7">
    <div class="section-header section-header--max50">
      <h2 class="mb-10 mt-minus-5">Explore <span>{{ $settings->site_name ?? 'ECX GROUPS' }}</span> Best Features</h2>
      <p>We provide comprehensive solutions including professional algorithmic trading, automated bots, and secure asset custody.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('services') }}">PRO ALGORITHMIC TRADING</a> </h5>
                  <p class="mb-0">Professional Quantitative Analysts and algorithmic developers delivering continuous execution and market insights.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('services') }}">AUTOMATED TRADING BOTS</a> </h5>
                  <p class="mb-0">High-frequency bots scanning order books across global exchanges to lock in profit spreads 24/7 without emotion.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('services') }}">MULTI-ASSET VAULT</a> </h5>
                  <p class="mb-0">Deposit, trade, and withdraw effortlessly across Bitcoin, Ethereum, USDT, and institutional banking rails.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('services') }}">RESPONSIVE CLIENT PORTAL</a> </h5>
                  <p class="mb-0">Manage your capital, track earnings, and request instant withdrawals from any device, anywhere in the world.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('services') }}">COLD STORAGE SECURITY</a> </h5>
                  <p class="mb-0">Over 95% of customer assets are held in multi-signature air-gapped cold storage protected against unauthorized access.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('services') }}">INSTANT SETTLEMENT</a> </h5>
                  <p class="mb-0">Fast funding and automated merchant gateways enabling seamless on-ramps and prompt payout processing.</p>
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

  <!-- ===============>> How to get started section start here <<================= -->
  <section class="service padding-top padding-bottom bg-color">
    <div class="section-header section-header--max50">
      <h2 class="mb-10 mt-minus-5">How to <span>get started</span></h2>
      <p>Start growing your portfolio in four simple steps.</p>
    </div>
    <div class="container">
      <div class="service__wrapper">
        <div class="row g-4 align-items-center">
          <div class="col-sm-6 col-lg-3">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="800">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img src="{{ asset('themes/ecx/assets/images/feature/5.png') }}" alt="icon">
                </div>
                <div class="service__item-content">
                  <h5> <a class="stretched-link" href="{{ route('register') }}">Create Account</a> </h5>
                  <p class="mb-0">Sign up in seconds with your email and basic details. Immediate activation.</p>
                  <a href="{{ route('register') }}" class="mt-3 d-inline-block text-primary">Register Now <i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="1000">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img src="{{ asset('themes/ecx/assets/images/feature/6.png') }}" alt="icon">
                </div>
                <div class="service__item-content">
                  <h5> <a class="stretched-link" href="{{ route('login') }}">Identity Verification</a> </h5>
                  <p class="mb-0">Complete seamless KYC verification to secure your profile and unlock higher limits.</p>
                  <a href="{{ route('login') }}" class="mt-3 d-inline-block text-primary">Get Verified <i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="1200">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img src="{{ asset('themes/ecx/assets/images/feature/7.png') }}" alt="icon">
                </div>
                <div class="service__item-content">
                  <h5> <a class="stretched-link" href="{{ route('login') }}">Deposit Capital</a> </h5>
                  <p class="mb-0">Fund your account easily with Bitcoin, Ethereum, USDT, or connected Web3 wallets.</p>
                  <a href="{{ route('login') }}" class="mt-3 d-inline-block text-primary">Deposit Now <i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="service__item service__item--style2" data-aos="fade-up" data-aos-duration="1400">
              <div class="service__item-inner text-center">
                <div class="service__item-thumb mb-30">
                  <img src="{{ asset('themes/ecx/assets/images/feature/8.png') }}" alt="icon">
                </div>
                <div class="service__item-content">
                  <h5> <a class="stretched-link" href="{{ route('login') }}">Earn &amp; Withdraw</a> </h5>
                  <p class="mb-0">Watch daily returns accumulate in real time and withdraw earnings whenever you choose.</p>
                  <a href="{{ route('login') }}" class="mt-3 d-inline-block text-primary">Start Earning <i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===============>> How to get started section end here <<================= -->

  <!-- ===============>> Pricing / Investment Plans section start here <<================= -->
  <section class="pricing padding-top padding-bottom bg--cover" style="background-image:url({{ asset('themes/ecx/assets/images/pricing/bg.png') }})">
    <div class="section-header section-header--max50">
      <h2 class="mb-10 mt-minus-5">Investment <span>Packages</span></h2>
      <p>Select from our institutional yield strategies designed to deliver consistent capital growth.</p>
    </div>
    <div class="container">
      <div class="pricing__wrapper">
        <div class="pricing__slider swiper">
          <div class="swiper-wrapper">
            @if(isset($plans) && count($plans) > 0)
              @foreach($plans as $plan)
                <div class="swiper-slide">
                  <div class="pricing__item">
                    <div class="pricing__item-inner {{ $loop->iteration == 2 ? 'active' : '' }}">
                      <div class="pricing__item-content">
                        <div class="pricing__item-top">
                          <h6 class="mb-15">{{ $plan->name }}</h6>
                          <h3 class="mb-25">{{ $plan->increment_amount }}% <span>/ {{ $plan->increment_interval ?? 'Daily' }}</span></h3>
                        </div>
                        <div class="pricing__item-middle">
                          <ul class="pricing__list">
                            <li class="pricing__list-item">
                              <span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span>
                              Min Deposit: {{ $settings->currency ?? '$' }}{{ number_format($plan->min_price) }}
                            </li>
                            <li class="pricing__list-item">
                              <span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span>
                              Max Deposit: {{ $settings->currency ?? '$' }}{{ number_format($plan->max_price) }}
                            </li>
                            <li class="pricing__list-item">
                              <span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span>
                              Duration: {{ $plan->expiration }}
                            </li>
                            <li class="pricing__list-item">
                              <span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span>
                              Capital Back: Yes
                            </li>
                            <li class="pricing__list-item">
                              <span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span>
                              24/7 Dedicated Support
                            </li>
                          </ul>
                        </div>
                        <div class="pricing__item-bottom">
                          @auth
                            <a href="{{ url('/dashboard/buy-plan') }}" class="trk-btn trk-btn--outline {{ $loop->iteration == 2 ? 'active' : '' }}">Choose Plan</a>
                          @else
                            <a href="{{ route('register') }}" class="trk-btn trk-btn--outline {{ $loop->iteration == 2 ? 'active' : '' }}">Choose Plan</a>
                          @endauth
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            @else
              <!-- Default showcase plans -->
              <div class="swiper-slide">
                <div class="pricing__item">
                  <div class="pricing__item-inner">
                    <div class="pricing__item-content">
                      <div class="pricing__item-top">
                        <h6 class="mb-15">Basic Arbitrage</h6>
                        <h3 class="mb-25">20% <span>/ 5 Days</span></h3>
                      </div>
                      <div class="pricing__item-middle">
                        <ul class="pricing__list">
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> Min Deposit: $1,000</li>
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> Max Deposit: $2,000</li>
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> Duration: 5 Days</li>
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> 24/7 Priority Support</li>
                        </ul>
                      </div>
                      <div class="pricing__item-bottom">
                        <a href="{{ route('register') }}" class="trk-btn trk-btn--outline">Invest Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="pricing__item">
                  <div class="pricing__item-inner active">
                    <div class="pricing__item-content">
                      <div class="pricing__item-top">
                        <h6 class="mb-15">Silver Tier</h6>
                        <h3 class="mb-25">40% <span>/ 2 Weeks</span></h3>
                      </div>
                      <div class="pricing__item-middle">
                        <ul class="pricing__list">
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> Min Deposit: $3,001</li>
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> Max Deposit: $5,000</li>
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> Duration: 14 Days</li>
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> Capital Return Guaranteed</li>
                        </ul>
                      </div>
                      <div class="pricing__item-bottom">
                        <a href="{{ route('register') }}" class="trk-btn trk-btn--outline active">Invest Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="pricing__item">
                  <div class="pricing__item-inner">
                    <div class="pricing__item-content">
                      <div class="pricing__item-top">
                        <h6 class="mb-15">Gold Institutional</h6>
                        <h3 class="mb-25">60% <span>/ 20 Days</span></h3>
                      </div>
                      <div class="pricing__item-middle">
                        <ul class="pricing__list">
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> Min Deposit: $10,001</li>
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> Max Deposit: $250,000</li>
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> Duration: 20 Days</li>
                          <li class="pricing__list-item"><span><img src="{{ asset('themes/ecx/assets/images/icon/check.svg') }}" alt="check"></span> Dedicated Account Executive</li>
                        </ul>
                      </div>
                      <div class="pricing__item-bottom">
                        <a href="{{ route('register') }}" class="trk-btn trk-btn--outline">Invest Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
          <div class="swiper-pagination pricing__pagination"></div>
        </div>
      </div>
    </div>
    <div class="pricing__shape">
      <span class="pricing__shape-item pricing__shape-item--5"><img src="{{ asset('themes/ecx/assets/images/icon/shape/3.png') }}" alt="shape-icon"></span>
      <span class="pricing__shape-item pricing__shape-item--6"><img src="{{ asset('themes/ecx/assets/images/icon/shape/1.png') }}" alt="shape-icon"></span>
    </div>
  </section>
  <!-- ===============>> Pricing section end here <<================= -->

  <!-- TradingView Crypto Heatmap Widget -->
  <div class="tradingview-widget-container my-5">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-crypto-coins-heatmap.js" async>
      {
        "dataSource": "CryptoWithoutBTC",
        "blockSize": "market_cap_calc",
        "blockColor": "24h_close_change|5",
        "locale": "en",
        "symbolUrl": "",
        "colorTheme": "dark",
        "hasTopBar": false,
        "isDataSetEnabled": false,
        "isZoomEnabled": false,
        "hasSymbolTooltip": true,
        "isMonoSize": false,
        "width": "100%",
        "height": 480
      }
    </script>
  </div>

  <!-- ===============>> FAQ section start here <<================= -->
  <section class="faq padding-top padding-bottom of-hidden">
    <div class="section-header section-header--max65">
      <h2 class="mb-10 mt-minus-5"><span>Frequently</span> Asked Questions</h2>
      <p>Have questions about {{ $settings->site_name ?? 'ECX Groups' }}? Here are the most common inquiries from our global community.</p>
    </div>
    <div class="container">
      <div class="faq__wrapper">
        <div class="row g-5 align-items-center justify-content-between">
          <div class="col-lg-12">
            <div class="accordion accordion--style1" id="faqAccordion1" data-aos="fade-up" data-aos-duration="1000">
              <div class="row g-3">
                @if(isset($faqs) && count($faqs) > 0)
                  @foreach($faqs as $faq)
                    <div class="col-md-6">
                      <div class="accordion__item accordion-item">
                        <div class="accordion__header accordion-header" id="faqHeader{{ $faq->id }}">
                          <button class="accordion__button accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                            <span class="accordion__button-content">{{ $faq->question }}</span>
                          </button>
                        </div>
                        <div id="faqCollapse{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#faqAccordion1">
                          <div class="accordion__body accordion-body">
                            <p class="mb-0">{{ $faq->answer }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                @else
                  <div class="col-md-6">
                    <div class="accordion__item accordion-item">
                      <div class="accordion__header accordion-header" id="faqH1">
                        <button class="accordion__button accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqB1" aria-expanded="true">
                          <span class="accordion__button-content">How does automated trading and yield generation work?</span>
                        </button>
                      </div>
                      <div id="faqB1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion1">
                        <div class="accordion__body accordion-body">
                          <p class="mb-0">Our platform deploys algorithmic trading bots that scan order books across premier cryptocurrency exchanges, capturing cross-market price variances and returning automated daily earnings to your account balance.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="accordion__item accordion-item">
                      <div class="accordion__header accordion-header" id="faqH2">
                        <button class="accordion__button accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqB2" aria-expanded="false">
                          <span class="accordion__button-content">How fast are deposits and withdrawals processed?</span>
                        </button>
                      </div>
                      <div id="faqB2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                        <div class="accordion__body accordion-body">
                          <p class="mb-0">Crypto deposits are credited automatically once confirmed on the blockchain (typically 1–3 network confirmations). Withdrawal requests are processed efficiently by our automated treasury system.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="accordion__item accordion-item">
                      <div class="accordion__header accordion-header" id="faqH3">
                        <button class="accordion__button accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqB3" aria-expanded="false">
                          <span class="accordion__button-content">Is my capital secure on {{ $settings->site_name ?? 'ECX Groups' }}?</span>
                        </button>
                      </div>
                      <div id="faqB3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                        <div class="accordion__body accordion-body">
                          <p class="mb-0">Yes. We implement military-grade 256-bit SSL encryption, multi-signature cold storage vaults, two-factor authentication (2FA), and strict regulatory compliance controls.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="accordion__item accordion-item">
                      <div class="accordion__header accordion-header" id="faqH4">
                        <button class="accordion__button accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqB4" aria-expanded="false">
                          <span class="accordion__button-content">Can I connect my Web3 wallet directly?</span>
                        </button>
                      </div>
                      <div id="faqB4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                        <div class="accordion__body accordion-body">
                          <p class="mb-0">Yes. We support all major Web3 wallet providers including MetaMask, Trust Wallet, Coinbase Wallet, and WalletConnect for instant non-custodial linkups.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===============>> FAQ section end here <<================= -->

@endsection
