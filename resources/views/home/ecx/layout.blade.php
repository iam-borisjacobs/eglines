<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $settings->site_name ?? 'ECX Groups' }} - @yield('title', $settings->site_title ?? 'Professional Crypto Investment Platform')</title>
    <meta name="description" content="{{ $settings->description ?? 'Secure, fast, and reliable institutional trading and crypto investment solutions.' }}">
    <meta name="keywords" content="{{ $settings->keywords ?? 'Crypto, Forex, Stocks, Trading, Investment, Arbitrage' }}">
    <meta name="author" content="{{ $settings->site_name ?? 'ECX Groups' }}">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $settings->site_name ?? 'ECX Groups' }} - {{ $settings->site_title ?? 'Investment Platform' }}">
    <meta property="og:site_name" content="{{ $settings->site_name ?? 'ECX Groups' }}">
    <meta property="og:description" content="{{ $settings->description ?? 'Welcome to ECX Groups, the premier cryptocurrency and investment management platform.' }}">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    @if(!empty($settings->favicon))
        <link rel="shortcut icon" href="{{ asset('storage/app/public/' . $settings->favicon) }}" type="image/x-icon">
        <link rel="apple-touch-icon" href="{{ asset('storage/app/public/' . $settings->favicon) }}">
    @else
        <link rel="shortcut icon" href="{{ asset('themes/ecx/assets/images/favicon.png') }}" type="image/x-icon">
    @endif

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('themes/ecx/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ecx/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ecx/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ecx/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ecx/assets/css/style.css') }}?v={{ time() }}">

    @yield('styles')
</head>

<body class="home-4">

    <!-- Preloader -->
    <div class="preloader">
        @if(!empty($settings->favicon))
            <img src="{{ asset('storage/app/public/' . $settings->favicon) }}" alt="preloader icon" style="max-height: 60px;">
        @else
            <img src="{{ asset('themes/ecx/assets/images/logo/preloader.png') }}" alt="preloader icon">
        @endif
    </div>

    <!-- Header Section -->
    <header class="header-section header-section--style4">
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            @if(!empty($settings->logo))
                                <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}" style="max-height: 48px; object-fit: contain;">
                            @else
                                <img src="{{ asset('themes/ecx/assets/images/logo/logo-dark.png') }}" alt="{{ $settings->site_name ?? 'ECX Groups' }}" style="max-height: 48px;">
                            @endif
                        </a>
                    </div>
                    <div class="menu-area">
                        <ul class="menu menu--style2">
                            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                            <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a></li>
                            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                            <li><a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'active' : '' }}">FAQs</a></li>
                            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a></li>
                            @auth
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                            @endauth
                        </ul>
                    </div>
                    <div class="header-action">
                        <div class="menu-area">
                            <div class="header-btn">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="trk-btn trk-btn--border trk-btn--primary">
                                        <span>Dashboard</span>
                                    </a>
                                @else
                                    <a href="{{ route('register') }}" class="trk-btn trk-btn--border trk-btn--primary">
                                        <span>Get Started</span>
                                    </a>
                                @endauth
                            </div>

                            <!-- Mobile Toggle -->
                            <div class="header-bar d-lg-none header-bar--style2">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Page Content -->
    @yield('content')

    <!-- Footer Section -->
    <footer class="footer brand-4">
        <div class="container">
            <div class="footer__wrapper">
                <div class="footer__top padding-bottom padding-top">
                    <div class="row g-5">
                        <div class="col-xl-4 col-md-6">
                            <div class="footer__about">
                                <a href="{{ route('home') }}" class="footer__about-logo mb-3 d-inline-block">
                                    @if(!empty($settings->logo))
                                        <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}" style="max-height: 44px; object-fit: contain;">
                                    @else
                                        <img src="{{ asset('themes/ecx/assets/images/logo/logo-dark.png') }}" alt="{{ $settings->site_name ?? 'ECX Groups' }}" style="max-height: 44px;">
                                    @endif
                                </a>
                                <p class="footer__about-text">
                                    {{ $settings->description ?? 'Experience the power of institutional-grade crypto trading and automated yield management. Secure, reliable, and compliant.' }}
                                </p>
                                <div class="mt-3">
                                    @if(!empty($settings->contact_email))
                                        <p class="mb-1 text-muted f-13"><i class="fa fa-envelope me-2 text-primary"></i> <a href="mailto:{{ $settings->contact_email }}" class="text-white text-opacity-75">{{ $settings->contact_email }}</a></p>
                                    @endif
                                    @if(!empty($settings->phone))
                                        <p class="mb-1 text-muted f-13"><i class="fa fa-phone me-2 text-primary"></i> <span class="text-white text-opacity-75">{{ $settings->phone }}</span></p>
                                    @endif
                                    @if(!empty($settings->location ?? $settings->address))
                                        <p class="mb-1 text-muted f-13"><i class="fa fa-map-marker-alt me-2 text-primary"></i> <span class="text-white text-opacity-75">{{ $settings->location ?? $settings->address }}</span></p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-3 col-6">
                            <div class="footer__links">
                                <div class="footer__links-tittle">
                                    <h6>Quick Links</h6>
                                </div>
                                <div class="footer__links-content">
                                    <ul class="footer__linklist">
                                        <li class="footer__linklist-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="footer__linklist-item"><a href="{{ route('about') }}">About Us</a></li>
                                        <li class="footer__linklist-item"><a href="{{ route('services') }}">Services</a></li>
                                        <li class="footer__linklist-item"><a href="{{ route('contact') }}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-3 col-6">
                            <div class="footer__links">
                                <div class="footer__links-tittle">
                                    <h6>Legal &amp; Support</h6>
                                </div>
                                <div class="footer__links-content">
                                    <ul class="footer__linklist">
                                        <li class="footer__linklist-item"><a href="{{ route('terms') }}">Terms of Service</a></li>
                                        <li class="footer__linklist-item"><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                        <li class="footer__linklist-item"><a href="{{ route('faq') }}">Frequently Asked Questions</a></li>
                                        @if(Route::has('security'))
                                            <li class="footer__linklist-item"><a href="{{ route('security') }}">Security Architecture</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="footer__links">
                                <div class="footer__links-tittle">
                                    <h6>Client Portal</h6>
                                </div>
                                <div class="footer__links-content">
                                    <p class="text-muted f-13 mb-3">Access institutional liquidity and automated asset management via your secure account.</p>
                                    <div class="d-flex flex-column gap-2">
                                        @auth
                                            <a href="{{ url('/dashboard') }}" class="trk-btn trk-btn--border trk-btn--primary btn-sm text-center">
                                                <span>Go to Dashboard</span>
                                            </a>
                                        @else
                                            <a href="{{ route('register') }}" class="trk-btn trk-btn--border trk-btn--primary btn-sm text-center mb-1">
                                                <span>Create Free Account</span>
                                            </a>
                                            <a href="{{ route('login') }}" class="trk-btn trk-btn--outline btn-sm text-center text-white border-secondary">
                                                <span>Member Login</span>
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer__bottom">
                    <div class="footer__end">
                        <div class="footer__end-copyright">
                            <p class="mb-0">&copy; {{ date('Y') }} All Rights Reserved By {{ $settings->site_name ?? 'ECX Groups' }}</p>
                        </div>
                        <div>
                            <ul class="social">
                                <li class="social__item">
                                    <a href="#" class="social__link social__link--style22"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="social__item">
                                    <a href="#" class="social__link social__link--style22"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="social__item">
                                    <a href="#" class="social__link social__link--style22"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li class="social__item">
                                    <a href="#" class="social__link social__link--style22"><i class="fab fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__shape">
            <span class="footer__shape-item footer__shape-item--1"><img src="{{ asset('themes/ecx/assets/images/footer/1.png') }}" alt="shape icon"></span>
            <span class="footer__shape-item footer__shape-item--2"> <span></span> </span>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <a href="#" class="scrollToTop scrollToTop--style1"><i class="fa-solid fa-arrow-up-from-bracket"></i></a>

    <!-- Scripts -->
    <script src="{{ asset('themes/ecx/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/ecx/assets/js/all.min.js') }}"></script>
    <script src="{{ asset('themes/ecx/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('themes/ecx/assets/js/aos.js') }}"></script>
    <script src="{{ asset('themes/ecx/assets/js/fslightbox.js') }}"></script>
    <script src="{{ asset('themes/ecx/assets/js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('themes/ecx/assets/js/custom.js') }}"></script>

    @yield('scripts')
</body>
</html>
