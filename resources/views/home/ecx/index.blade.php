@extends('home.ecx.layout')

@section('title', $settings->site_title ?? 'Professional Crypto Investment Platform')

@section('content')

  <style>
    /* ==========================================================================
       ECX Institutional 4-Tier & Luxury Landing Styles
       ========================================================================== */
    .ecx-glow-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 16px;
      border-radius: 9999px;
      background: rgba(0, 245, 155, 0.08);
      border: 1px solid rgba(0, 245, 155, 0.3);
      backdrop-filter: blur(10px);
      margin-bottom: 20px;
    }
    .ecx-glow-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #00f59b;
      box-shadow: 0 0 10px #00f59b;
      animation: ecxPulse 2s infinite ease-in-out;
    }
    @keyframes ecxPulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.4; transform: scale(0.85); }
    }

    /* Tier Showcase Cards */
    .ecx-tier-card {
      background: rgba(15, 23, 42, 0.6);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 20px;
      padding: 26px 20px;
      text-align: center;
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      height: 100%;
      backdrop-filter: blur(12px);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .ecx-tier-card:hover {
      transform: translateY(-6px);
    }
    .ecx-tier-card.tier-bronze:hover {
      border-color: rgba(205, 127, 50, 0.6);
      box-shadow: 0 12px 30px rgba(205, 127, 50, 0.2);
    }
    .ecx-tier-card.tier-silver:hover {
      border-color: rgba(226, 232, 240, 0.7);
      box-shadow: 0 12px 30px rgba(226, 232, 240, 0.2);
    }
    .ecx-tier-card.tier-gold:hover {
      border-color: rgba(245, 158, 11, 0.7);
      box-shadow: 0 12px 30px rgba(245, 158, 11, 0.25);
    }
    .ecx-tier-card.tier-diamond:hover {
      border-color: rgba(56, 189, 248, 0.8);
      box-shadow: 0 12px 35px rgba(56, 189, 248, 0.3);
    }

    /* 3D Emblem Container */
    .tier-emblem-wrap {
      width: 120px;
      height: 155px;
      margin: 0 auto 16px auto;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }
    .tier-emblem-wrap img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
      filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.6));
      transition: transform 0.35s ease;
    }
    .ecx-tier-card:hover .tier-emblem-wrap img {
      transform: scale(1.06);
    }

    /* Package Plan Cards */
    .package-plan-card {
      background: rgba(13, 20, 36, 0.85);
      border: 1px solid rgba(255, 255, 255, 0.09);
      border-radius: 20px;
      padding: 28px 24px;
      position: relative;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
    }
    .package-plan-card:hover {
      transform: translateY(-5px);
    }
    .package-plan-card.active-featured {
      border-color: #00f59b;
      box-shadow: 0 0 0 1px #00f59b, 0 14px 40px rgba(0, 245, 155, 0.2);
    }
    .plan-badge-pill {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      padding: 4px 12px;
      border-radius: 999px;
      display: inline-block;
    }

    /* Calculator */
    .ecx-calc-card {
      background: rgba(13, 20, 36, 0.9);
      border: 1px solid rgba(0, 245, 155, 0.25);
      border-radius: 24px;
      padding: 36px 30px;
      box-shadow: 0 16px 48px rgba(0, 0, 0, 0.4);
      backdrop-filter: blur(16px);
    }
    .calc-slider {
      -webkit-appearance: none;
      width: 100%;
      height: 8px;
      border-radius: 5px;
      background: #1e293b;
      outline: none;
      transition: background 0.2s;
    }
    .calc-slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background: #00f59b;
      cursor: pointer;
      box-shadow: 0 0 12px #00f59b;
      transition: transform 0.15s;
    }
    .calc-slider::-webkit-slider-thumb:hover {
      transform: scale(1.15);
    }
    .calc-preset-btn {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.12);
      color: #94a3b8;
      font-size: 12px;
      font-weight: 600;
      padding: 6px 14px;
      border-radius: 8px;
      transition: all 0.2s;
    }
    .calc-preset-btn:hover, .calc-preset-btn.active {
      background: rgba(0, 245, 155, 0.15);
      border-color: #00f59b;
      color: #00f59b;
    }
    .calc-result-box {
      background: rgba(15, 23, 42, 0.8);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      padding: 20px;
    }
  </style>

  <!-- ===============>> Banner section start here <<================= -->
  <section class="banner banner--style4 bg--cover" style="background-image:url({{ asset('themes/ecx/assets/images/banner/home4/1.png') }})">
    <div class="container">
      <div class="banner__wrapper">
        <div class="row justify-content-center">
          <div class="col-md-10 justify-content-center text-center">
            <div class="banner__content" data-aos="fade-up" data-aos-duration="800">
              
              <!-- Ambient Glow Pill -->
              <div class="ecx-glow-pill">
                <span class="ecx-glow-dot"></span>
                <span class="f-12 f-w-700 text-uppercase" style="color: #00f59b; letter-spacing: 1px;">Institutional 4-Tier Yield Architecture</span>
              </div>

              <h1>Deposit, Invest, Withdraw <br> Trade with us at scale.</h1>
              <p>A complete institutional ecosystem for your financial freedom. Automated cross-market yield strategies spanning from $100 to $150,000.</p>
              
              <div class="banner__content-btn btn-group justify-content-center">
                @auth
                  <a href="{{ url('/dashboard') }}" class="trk-btn trk-btn--primary trk-btn--arrow">Go to Dashboard</a>
                  <a href="{{ url('/dashboard/mplans') }}" class="trk-btn trk-btn--primary trk-btn--arrow" style="margin-left: 15px;">Explore Packages</a>
                @else
                  <a href="{{ route('register') }}" class="trk-btn trk-btn--primary trk-btn--arrow">Start Trading Today</a>
                  <a href="{{ route('login') }}" class="trk-btn trk-btn--outline" style="margin-left: 15px; border-color: rgba(255,255,255,0.25); color: #ffffff;">Access Account</a>
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
          <div class="col-sm-6 col-lg-3">
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
          <div class="col-sm-6 col-lg-3">
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
          <div class="col-sm-6 col-lg-3">
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
          <div class="col-sm-6 col-lg-3">
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

  <!-- ===============>> Dedicated 4-Tier Institutional Showcase <<================= -->
  <section class="padding-top padding-bottom" style="background: linear-gradient(180deg, rgba(8, 14, 26, 0) 0%, rgba(13, 22, 40, 0.75) 50%, rgba(8, 14, 26, 0) 100%);">
    <div class="container">
      <div class="section-header section-header--max65 text-center mb-50">
        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(0, 245, 155, 0.08); border: 1px solid rgba(0, 245, 155, 0.25);">
          <i class="fa-solid fa-gem text-success f-12"></i>
          <span class="f-11 f-w-700 text-uppercase" style="color: #00f59b; letter-spacing: 1px;">Institutional Standards</span>
        </div>
        <h2 class="mb-10 mt-minus-5">The ECX <span>Tier Architecture</span></h2>
        <p class="text-muted">Four precision-engineered capitalization tiers crafted for retail traders and private wealth clients from $100 to $150,000.</p>
      </div>

      <div class="row g-4 justify-content-center">
        <!-- Tier 1: Bronze -->
        <div class="col-sm-6 col-lg-3">
          <div class="ecx-tier-card tier-bronze" data-aos="fade-up" data-aos-duration="700">
            <div>
              <div class="tier-emblem-wrap">
                <img src="{{ asset('themes/ecx/assets/images/plans/plan_bronze_badge.jpg') }}" alt="Bronze Tier Logo">
              </div>
              <span class="plan-badge-pill mb-2" style="background: rgba(205, 127, 50, 0.15); color: #d97706; border: 1px solid rgba(205, 127, 50, 0.3);">
                Tier 1 &bull; Entry Pro
              </span>
              <h4 class="text-white f-w-700 mt-1 mb-1">BRONZE TIER</h4>
              <p class="text-muted f-12 mb-3">Algorithmic spot arbitrage &amp; foundational daily yield.</p>
              <div class="p-2 rounded-3 mb-3" style="background: rgba(255, 255, 255, 0.03); border: 1px dashed rgba(205, 127, 50, 0.25);">
                <div class="f-11 text-muted">Capital Range</div>
                <div class="f-15 f-w-700 text-white">$100 &ndash; $4,999</div>
              </div>
            </div>
            <div>
              <div class="f-13 f-w-700 text-success mb-3">+20% Daily Yield</div>
              <a href="{{ route('register') }}" class="trk-btn trk-btn--outline w-100 py-2 f-12" style="border-color: rgba(205, 127, 50, 0.4); color: #f59e0b;">Select Bronze</a>
            </div>
          </div>
        </div>

        <!-- Tier 2: Silver -->
        <div class="col-sm-6 col-lg-3">
          <div class="ecx-tier-card tier-silver" data-aos="fade-up" data-aos-duration="900">
            <div>
              <div class="tier-emblem-wrap">
                <img src="{{ asset('themes/ecx/assets/images/plans/plan_silver_badge.jpg') }}" alt="Silver Tier Logo">
              </div>
              <span class="plan-badge-pill mb-2" style="background: rgba(226, 232, 240, 0.15); color: #e2e8f0; border: 1px solid rgba(226, 232, 240, 0.3);">
                Tier 2 &bull; Growth
              </span>
              <h4 class="text-white f-w-700 mt-1 mb-1">SILVER TIER</h4>
              <p class="text-muted f-12 mb-3">Cross-DEX liquidity pooling &amp; accelerated yield drops.</p>
              <div class="p-2 rounded-3 mb-3" style="background: rgba(255, 255, 255, 0.03); border: 1px dashed rgba(226, 232, 240, 0.25);">
                <div class="f-11 text-muted">Capital Range</div>
                <div class="f-15 f-w-700 text-white">$5,000 &ndash; $24,999</div>
              </div>
            </div>
            <div>
              <div class="f-13 f-w-700 text-success mb-3">+40% Daily Yield</div>
              <a href="{{ route('register') }}" class="trk-btn trk-btn--outline w-100 py-2 f-12" style="border-color: rgba(226, 232, 240, 0.4); color: #e2e8f0;">Select Silver</a>
            </div>
          </div>
        </div>

        <!-- Tier 3: Gold -->
        <div class="col-sm-6 col-lg-3">
          <div class="ecx-tier-card tier-gold" data-aos="fade-up" data-aos-duration="1100">
            <div>
              <div class="tier-emblem-wrap">
                <img src="{{ asset('themes/ecx/assets/images/plans/plan_gold_badge.jpg') }}" alt="Gold Tier Logo">
              </div>
              <span class="plan-badge-pill mb-2" style="background: rgba(245, 158, 11, 0.15); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.3);">
                Tier 3 &bull; Institutional
              </span>
              <h4 class="text-white f-w-700 mt-1 mb-1">GOLD TIER</h4>
              <p class="text-muted f-12 mb-3">Priority isolated vault &amp; institutional order execution.</p>
              <div class="p-2 rounded-3 mb-3" style="background: rgba(255, 255, 255, 0.03); border: 1px dashed rgba(245, 158, 11, 0.25);">
                <div class="f-11 text-muted">Capital Range</div>
                <div class="f-15 f-w-700 text-white">$25,000 &ndash; $74,999</div>
              </div>
            </div>
            <div>
              <div class="f-13 f-w-700 text-success mb-3">+60% Daily Yield</div>
              <a href="{{ route('register') }}" class="trk-btn trk-btn--outline w-100 py-2 f-12" style="border-color: rgba(245, 158, 11, 0.4); color: #fbbf24;">Select Gold</a>
            </div>
          </div>
        </div>

        <!-- Tier 4: Diamond -->
        <div class="col-sm-6 col-lg-3">
          <div class="ecx-tier-card tier-diamond" data-aos="fade-up" data-aos-duration="1300">
            <div>
              <div class="tier-emblem-wrap">
                <img src="{{ asset('themes/ecx/assets/images/plans/plan_diamond_badge.jpg') }}" alt="Diamond Tier Logo">
              </div>
              <span class="plan-badge-pill mb-2" style="background: rgba(56, 189, 248, 0.15); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.3);">
                Tier 4 &bull; VIP Sovereign
              </span>
              <h4 class="text-white f-w-700 mt-1 mb-1">DIAMOND TIER</h4>
              <p class="text-muted f-12 mb-3">Private wealth desk, bespoke hedging &amp; maximal return.</p>
              <div class="p-2 rounded-3 mb-3" style="background: rgba(255, 255, 255, 0.03); border: 1px dashed rgba(56, 189, 248, 0.25);">
                <div class="f-11 text-muted">Capital Range</div>
                <div class="f-15 f-w-700 text-white">$75,000 &ndash; $150,000</div>
              </div>
            </div>
            <div>
              <div class="f-13 f-w-700 text-success mb-3">+80% Daily Yield</div>
              <a href="{{ route('register') }}" class="trk-btn trk-btn--outline w-100 py-2 f-12" style="border-color: rgba(56, 189, 248, 0.4); color: #38bdf8;">Select Diamond</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===============>> Dedicated 4-Tier Institutional Showcase End <<================= -->

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
                Our ecosystem is engineered to automate market arbitrage and yield generation with complete transparency, bank-grade encryption, and seamless multi-asset settlement across all four tiers.
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
      <h2 class="mb-10 mt-minus-5">Explore <span>ECX GROUPS</span> Best Features</h2>
      <p>We provide comprehensive solutions including professional trading, automated bots, and secure asset management.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('login') }}">PRO TRADING</a> </h5>
                  <p class="mb-0">Professional Crypto Industry Development Team providing top-tier market execution and algorithmic signals.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('login') }}">ECX BOT</a> </h5>
                  <p class="mb-0">Unique robot for trading. Advanced algorithmic modeling executing 24/7 cross-exchange arbitrage.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('login') }}">MANAGE ACCOUNT</a> </h5>
                  <p class="mb-0">Effortless asset management. Real-time portfolio tracking, multi-asset allocation, and transparent ledgering.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('login') }}">Mobile Trading</a> </h5>
                  <p class="mb-0">Trade on the go. Seamless responsive experience bringing global liquidity right to your fingertips.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('login') }}">Cold Storage Vaults</a> </h5>
                  <p class="mb-0">Multi-signature institutional cold storage ensuring cryptographic protection of client holdings.</p>
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
                  <h5> <a class="stretched-link" href="{{ route('login') }}">Web3 Connectivity</a> </h5>
                  <p class="mb-0">Instant non-custodial wallet connectivity supporting MetaMask, Trust Wallet, and Coinbase.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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

  <!-- ===============>> Upgraded 4-Tier Investment Packages Grid <<================= -->
  <section class="pricing padding-top padding-bottom bg--cover" style="background-image:url({{ asset('themes/ecx/assets/images/pricing/bg.png') }})">
    <div class="section-header section-header--max65 text-center mb-50">
      <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(0, 245, 155, 0.08); border: 1px solid rgba(0, 245, 155, 0.25);">
        <i class="fa-solid fa-layer-group text-success f-12"></i>
        <span class="f-11 f-w-700 text-uppercase" style="color: #00f59b; letter-spacing: 1px;">Live Investment Strategies</span>
      </div>
      <h2 class="mb-10 mt-minus-5">Explore <span>Investment Packages</span></h2>
      <p class="text-muted">Choose your allocation tier with guaranteed capital protection, automated daily returns, and instant liquidity.</p>
    </div>

    <div class="container">
      <div class="row g-4 justify-content-center">
        @php
          $tierBadges = [
            10 => ['badge' => 'plan_bronze_badge.jpg', 'glow' => 'rgba(205, 127, 50, 0.3)', 'tag' => 'Retail Pro'],
            11 => ['badge' => 'plan_silver_badge.jpg', 'glow' => 'rgba(226, 232, 240, 0.3)', 'tag' => 'Growth Alpha'],
            12 => ['badge' => 'plan_gold_badge.jpg', 'glow' => 'rgba(245, 158, 11, 0.3)', 'tag' => 'Institutional'],
            13 => ['badge' => 'plan_diamond_badge.jpg', 'glow' => 'rgba(56, 189, 248, 0.35)', 'tag' => 'VIP Sovereign'],
          ];
          $activePlans = isset($plans) && count($plans) > 0 ? $plans->whereIn('id', [10, 11, 12, 13]) : collect([]);
        @endphp

        @if($activePlans->count() > 0)
          @foreach($activePlans as $plan)
            @php
              $tData = $tierBadges[$plan->id] ?? ['badge' => 'plan_bronze_badge.jpg', 'glow' => 'rgba(0, 245, 155, 0.3)', 'tag' => 'Active'];
              $isFeatured = ($plan->id == 12);
            @endphp
            <div class="col-sm-6 col-lg-3">
              <div class="package-plan-card {{ $isFeatured ? 'active-featured' : '' }}" data-aos="fade-up" data-aos-duration="{{ 800 + ($loop->index * 150) }}">
                <div>
                  <!-- Tier 3D Emblem Header -->
                  <div class="text-center mb-3">
                    <div class="tier-emblem-wrap" style="height: 125px;">
                      <img src="{{ asset('themes/ecx/assets/images/plans/' . $tData['badge']) }}" alt="{{ $plan->name }}">
                    </div>
                    <span class="badge bg-white bg-opacity-10 text-white rounded-pill px-3 py-1 f-10 text-uppercase border border-white border-opacity-15 mb-2">
                      {{ $tData['tag'] }}
                    </span>
                    <h5 class="text-white f-w-800 mb-1">{{ $plan->name }}</h5>
                    <div class="d-flex align-items-baseline justify-content-center gap-1">
                      <h3 class="text-success f-w-900 mb-0">+{{ $plan->increment_amount }}%</h3>
                      <span class="text-muted f-12">/ {{ $plan->increment_interval }}</span>
                    </div>
                  </div>

                  <!-- Plan Limits Box -->
                  <div class="p-3 rounded-3 mb-3" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.08);">
                    <div class="d-flex justify-content-between mb-1 f-12">
                      <span class="text-muted">Min Capital:</span>
                      <strong class="text-white">{{ $settings->currency ?? '$' }}{{ number_format($plan->min_price) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between f-12">
                      <span class="text-muted">Max Capital:</span>
                      <strong class="text-white">{{ $settings->currency ?? '$' }}{{ number_format($plan->max_price) }}</strong>
                    </div>
                  </div>

                  <!-- Features List -->
                  <ul class="list-unstyled mb-4 f-12 text-muted" style="line-height: 2;">
                    <li><i class="fa-solid fa-circle-check text-success me-2"></i><strong>Duration:</strong> {{ $plan->expiration }}</li>
                    <li><i class="fa-solid fa-circle-check text-success me-2"></i><strong>Principal:</strong> 100% Guaranteed</li>
                    <li><i class="fa-solid fa-circle-check text-success me-2"></i><strong>Yield Drop:</strong> Automated Daily</li>
                    <li><i class="fa-solid fa-circle-check text-success me-2"></i><strong>Manager:</strong> Dedicated Priority</li>
                  </ul>
                </div>

                <div>
                  @auth
                    <a href="{{ url('/dashboard/mplans') }}" class="trk-btn trk-btn--primary w-100 text-center py-2.5 f-13 f-w-700">
                      Invest in {{ explode(' ', $plan->name)[0] }} &rarr;
                    </a>
                  @else
                    <a href="{{ route('register') }}" class="trk-btn trk-btn--primary w-100 text-center py-2.5 f-13 f-w-700">
                      Get Started with {{ $settings->currency ?? '$' }}{{ number_format($plan->min_price) }}
                    </a>
                  @endauth
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>
  <!-- ===============>> Upgraded Investment Packages Grid End <<================= -->

  <!-- ===============>> Interactive ROI Yield Calculator <<================= -->
  <section class="padding-top padding-bottom" style="background: #080e1a;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="ecx-calc-card" data-aos="fade-up" data-aos-duration="900">
            <div class="row g-4 align-items-center">
              <div class="col-lg-7">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(0, 245, 155, 0.08); border: 1px solid rgba(0, 245, 155, 0.25);">
                  <i class="fa-solid fa-calculator text-success f-12"></i>
                  <span class="f-11 f-w-700 text-uppercase" style="color: #00f59b; letter-spacing: 1px;">Live Returns Simulator</span>
                </div>
                <h3 class="text-white f-w-800 mb-2">Estimate Your <span>Earnings</span></h3>
                <p class="text-muted f-13 mb-4">Drag the slider or click a preset amount to see your qualifying tier and projected net returns.</p>

                <!-- Slider Form -->
                <div class="mb-4">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted f-12 text-uppercase f-w-600">Investment Capital</span>
                    <h3 class="text-white f-w-800 mb-0" id="calcDisplayAmount">$5,000</h3>
                  </div>
                  <input type="range" class="calc-slider mb-3" id="calcSlider" min="100" max="150000" step="100" value="5000">
                  
                  <!-- Quick Preset Buttons -->
                  <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="calc-preset-btn" onclick="setCalcAmount(100)">$100</button>
                    <button type="button" class="calc-preset-btn" onclick="setCalcAmount(1000)">$1,000</button>
                    <button type="button" class="calc-preset-btn active" onclick="setCalcAmount(5000)">$5,000</button>
                    <button type="button" class="calc-preset-btn" onclick="setCalcAmount(25000)">$25,000</button>
                    <button type="button" class="calc-preset-btn" onclick="setCalcAmount(75000)">$75,000</button>
                    <button type="button" class="calc-preset-btn" onclick="setCalcAmount(150000)">$150,000</button>
                  </div>
                </div>
              </div>

              <!-- Live Calculation Result Card -->
              <div class="col-lg-5">
                <div class="calc-result-box text-center">
                  <!-- Dynamic Tier Emblem -->
                  <div class="tier-emblem-wrap mb-2" style="height: 105px;">
                    <img id="calcTierImg" src="{{ asset('themes/ecx/assets/images/plans/plan_silver_badge.jpg') }}" alt="Active Tier Emblem">
                  </div>
                  <span id="calcTierName" class="plan-badge-pill mb-3" style="background: rgba(226, 232, 240, 0.15); color: #e2e8f0; border: 1px solid rgba(226, 232, 240, 0.3);">
                    SILVER TIER &bull; +40% DAILY
                  </span>

                  <div class="row g-2 text-start mb-3 pt-2 border-top border-secondary border-opacity-25">
                    <div class="col-6">
                      <span class="text-muted f-11 d-block">Daily Drop:</span>
                      <strong class="text-success f-15" id="calcDailyReturn">+$2,000.00</strong>
                    </div>
                    <div class="col-6 text-end">
                      <span class="text-muted f-11 d-block">Duration:</span>
                      <strong class="text-white f-13" id="calcDuration">14 Days</strong>
                    </div>
                  </div>

                  <div class="p-2.5 rounded-3 mb-3 text-start" style="background: rgba(0, 245, 155, 0.08); border: 1px solid rgba(0, 245, 155, 0.2);">
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="text-white f-12">Projected Total Return:</span>
                      <h4 class="text-success f-w-900 mb-0" id="calcTotalReturn">$33,000</h4>
                    </div>
                  </div>

                  @auth
                    <a href="{{ url('/dashboard/mplans') }}" class="trk-btn trk-btn--primary w-100 py-2 f-13 f-w-700">
                      Activate Package in Dashboard &rarr;
                    </a>
                  @else
                    <a href="{{ route('register') }}" class="trk-btn trk-btn--primary w-100 py-2 f-13 f-w-700">
                      Start Investing Now &rarr;
                    </a>
                  @endauth
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===============>> Interactive ROI Yield Calculator End <<================= -->

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
                          <span class="accordion__button-content">How do the four investment tiers work?</span>
                        </button>
                      </div>
                      <div id="faqB1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion1">
                        <div class="accordion__body accordion-body">
                          <p class="mb-0">Our ecosystem provides four capitalization tiers (Bronze, Silver, Gold, and Diamond) scaling from $100 up to $150,000. Each tier utilizes automated arbitrage bots with institutional risk protocols to deliver daily drops directly to your balance.</p>
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

@section('scripts')
  <script>
    // Live ROI Calculator Logic
    const badgePaths = {
      bronze: "{{ asset('themes/ecx/assets/images/plans/plan_bronze_badge.jpg') }}",
      silver: "{{ asset('themes/ecx/assets/images/plans/plan_silver_badge.jpg') }}",
      gold: "{{ asset('themes/ecx/assets/images/plans/plan_gold_badge.jpg') }}",
      diamond: "{{ asset('themes/ecx/assets/images/plans/plan_diamond_badge.jpg') }}"
    };

    function updateCalculator(val) {
      const amt = parseFloat(val) || 100;
      document.getElementById('calcDisplayAmount').innerText = '$' + amt.toLocaleString();

      let tierName = 'BRONZE TIER';
      let tierRate = 0.20;
      let durationDays = 7;
      let tierImg = badgePaths.bronze;
      let badgeStyle = 'background: rgba(205, 127, 50, 0.15); color: #d97706; border: 1px solid rgba(205, 127, 50, 0.3);';

      if (amt >= 75000) {
        tierName = 'DIAMOND TIER';
        tierRate = 0.80;
        durationDays = 30;
        tierImg = badgePaths.diamond;
        badgeStyle = 'background: rgba(56, 189, 248, 0.15); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.3);';
      } else if (amt >= 25000) {
        tierName = 'GOLD TIER';
        tierRate = 0.60;
        durationDays = 21;
        tierImg = badgePaths.gold;
        badgeStyle = 'background: rgba(245, 158, 11, 0.15); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.3);';
      } else if (amt >= 5000) {
        tierName = 'SILVER TIER';
        tierRate = 0.40;
        durationDays = 14;
        tierImg = badgePaths.silver;
        badgeStyle = 'background: rgba(226, 232, 240, 0.15); color: #e2e8f0; border: 1px solid rgba(226, 232, 240, 0.3);';
      }

      const dailyReturn = amt * tierRate;
      const totalYield = (dailyReturn * durationDays) + amt;

      document.getElementById('calcTierImg').src = tierImg;
      const tierBadge = document.getElementById('calcTierName');
      tierBadge.innerText = tierName + ' • +' + (tierRate * 100) + '% DAILY';
      tierBadge.setAttribute('style', badgeStyle);

      document.getElementById('calcDailyReturn').innerText = '+$' + dailyReturn.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
      document.getElementById('calcDuration').innerText = durationDays + ' Days';
      document.getElementById('calcTotalReturn').innerText = '$' + totalYield.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function setCalcAmount(amount) {
      const slider = document.getElementById('calcSlider');
      slider.value = amount;
      document.querySelectorAll('.calc-preset-btn').forEach(btn => {
        btn.classList.toggle('active', btn.innerText.replace(/[^0-9]/g, '') == amount);
      });
      updateCalculator(amount);
    }

    document.getElementById('calcSlider')?.addEventListener('input', function(e) {
      const val = this.value;
      document.querySelectorAll('.calc-preset-btn').forEach(btn => {
        btn.classList.toggle('active', btn.innerText.replace(/[^0-9]/g, '') == val);
      });
      updateCalculator(val);
    });

    // Initialize calculator on page load
    document.addEventListener('DOMContentLoaded', function() {
      updateCalculator(5000);
    });
  </script>
@endsection
