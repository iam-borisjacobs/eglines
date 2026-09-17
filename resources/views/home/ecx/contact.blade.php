@extends('home.ecx.layout')

@section('title', 'Contact Us - ' . ($settings->site_name ?? 'ECX Groups'))

@section('content')

  <!-- ================> Page header start here <================== -->
  <section class="page-header bg--cover" style="background-image:url({{ asset('themes/ecx/assets/images/header/1.png') }})">
    <div class="container">
      <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
        <h2>Contact Us</h2>
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
          </ol>
        </nav>
      </div>
      <div class="page-header__shape">
        <span class="page-header__shape-item page-header__shape-item--1"><img src="{{ asset('themes/ecx/assets/images/header/2.png') }}" alt="shape-icon"></span>
      </div>
    </div>
  </section>
  <!-- ================> Page header end here <================== -->

  <!-- ===============>> Contact section start here <<================= -->
  <div class="contact padding-top padding-bottom">
    <div class="container">
      <div class="contact__wrapper">
        <div class="row g-5">
          <div class="col-md-5">
            <div class="contact__info" data-aos="fade-right" data-aos-duration="1000">
              <div class="contact__social">
                <h3>Let’s <span>get in touch</span> with us</h3>
                <p class="text-muted f-14 mb-4">Our dedicated operations and client advisory team is available 24/7 to assist with your portfolio inquiries.</p>
                <ul class="social mb-4">
                  <li class="social__item">
                    <a href="#" class="social__link social__link--style4 active"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li class="social__item">
                    <a href="#" class="social__link social__link--style4"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li class="social__item">
                    <a href="#" class="social__link social__link--style4"><i class="fa-brands fa-linkedin-in"></i></a>
                  </li>
                  <li class="social__item">
                    <a href="#" class="social__link social__link--style4"><i class="fab fa-twitter"></i></a>
                  </li>
                </ul>
              </div>

              <div class="contact__details">
                @if(!empty($settings->phone))
                  <div class="contact__item" data-aos="fade-right" data-aos-duration="1000">
                    <div class="contact__item-inner">
                      <div class="contact__item-thumb">
                        <span><img src="{{ asset('themes/ecx/assets/images/contact/1.png') }}" alt="contact-icon"></span>
                      </div>
                      <div class="contact__item-content">
                        <small class="text-muted d-block text-uppercase f-11 f-w-600">Direct Telephone</small>
                        <p class="mb-0 f-w-600">{{ $settings->phone }}</p>
                      </div>
                    </div>
                  </div>
                @endif

                @if(!empty($settings->contact_email))
                  <div class="contact__item" data-aos="fade-right" data-aos-duration="1100">
                    <div class="contact__item-inner">
                      <div class="contact__item-thumb">
                        <span><img src="{{ asset('themes/ecx/assets/images/contact/2.png') }}" alt="contact-icon"></span>
                      </div>
                      <div class="contact__item-content">
                        <small class="text-muted d-block text-uppercase f-11 f-w-600">Client Support</small>
                        <p class="mb-0 f-w-600"><a href="mailto:{{ $settings->contact_email }}" class="text-white">{{ $settings->contact_email }}</a></p>
                      </div>
                    </div>
                  </div>
                @endif

                @if(!empty($settings->location ?? $settings->address))
                  <div class="contact__item" data-aos="fade-right" data-aos-duration="1200">
                    <div class="contact__item-inner">
                      <div class="contact__item-thumb">
                        <span><img src="{{ asset('themes/ecx/assets/images/contact/3.png') }}" alt="contact-icon"></span>
                      </div>
                      <div class="contact__item-content">
                        <small class="text-muted d-block text-uppercase f-11 f-w-600">Corporate Headquarters</small>
                        <p class="mb-0 f-w-600">{{ $settings->location ?? $settings->address }}</p>
                      </div>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="contact__form">
              @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                  <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                  <i class="fa fa-exclamation-triangle me-2"></i> {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              <form action="{{ route('enquiry') }}" method="POST" data-aos="fade-left" data-aos-duration="1000">
                @csrf
                <div class="row g-4">
                  <div class="col-12 col-md-6">
                    <div>
                      <label for="name" class="form-label text-muted f-13">Full Name</label>
                      <input class="form-control" type="text" name="name" id="name" placeholder="John Doe" required>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div>
                      <label for="email" class="form-label text-muted f-13">Email Address</label>
                      <input class="form-control" type="email" name="email" id="email" placeholder="name@example.com" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div>
                      <label for="subject" class="form-label text-muted f-13">Subject</label>
                      <input class="form-control" type="text" name="subject" id="subject" placeholder="Inquiry regarding investment plans" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div>
                      <label for="message" class="form-label text-muted f-13">Message</label>
                      <textarea cols="30" rows="5" class="form-control" name="message" id="message" placeholder="Please describe how we can assist you..." required></textarea>
                    </div>
                  </div>
                </div>
                <button type="submit" class="trk-btn trk-btn--border trk-btn--primary mt-4 d-inline-block">
                  <span>Send Message Now</span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ===============>> Contact section end here <<================= -->

@endsection
