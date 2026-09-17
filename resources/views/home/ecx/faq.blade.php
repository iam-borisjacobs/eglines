@extends('home.ecx.layout')

@section('title', 'Frequently Asked Questions - ' . ($settings->site_name ?? 'ECX Groups'))

@section('content')

  <!-- ================> Page header start here <================== -->
  <section class="page-header bg--cover" style="background-image:url({{ asset('themes/ecx/assets/images/header/1.png') }})">
    <div class="container">
      <div class="page-header__content" data-aos="fade-right" data-aos-duration="1000">
        <h2>Frequently Asked Questions</h2>
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">FAQs</li>
          </ol>
        </nav>
      </div>
      <div class="page-header__shape">
        <span class="page-header__shape-item page-header__shape-item--1"><img src="{{ asset('themes/ecx/assets/images/header/2.png') }}" alt="shape-icon"></span>
      </div>
    </div>
  </section>
  <!-- ================> Page header end here <================== -->

  <!-- ===============>> FAQ section start here <<================= -->
  <section class="faq padding-top padding-bottom of-hidden">
    <div class="section-header section-header--max65">
      <h2 class="mb-10 mt-minus-5"><span>Frequently</span> Asked Questions</h2>
      <p>Clear, direct answers regarding platform functionality, deposit security, daily yield distributions, and withdrawal procedures.</p>
    </div>
    <div class="container">
      <div class="faq__wrapper">
        <div class="row g-5 align-items-center justify-content-between">
          <div class="col-lg-12">
            <div class="accordion accordion--style1" id="faqAccordionPage" data-aos="fade-up" data-aos-duration="1000">
              <div class="row g-3">
                @if(isset($faqs) && count($faqs) > 0)
                  @foreach($faqs as $faq)
                    <div class="col-md-6">
                      <div class="accordion__item accordion-item">
                        <div class="accordion__header accordion-header" id="pageFaqHeader{{ $faq->id }}">
                          <button class="accordion__button accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#pageFaqCollapse{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                            <span class="accordion__button-content">{{ $faq->question }}</span>
                          </button>
                        </div>
                        <div id="pageFaqCollapse{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#faqAccordionPage">
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
                          <span class="accordion__button-content">How do I create and fund my account?</span>
                        </button>
                      </div>
                      <div id="faqB1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordionPage">
                        <div class="accordion__body accordion-body">
                          <p class="mb-0">Registration takes less than two minutes. Once verified, log in to your dashboard, navigate to "Deposit", select your preferred payment gateway (Bitcoin, Ethereum, USDT, Bank Wire, or Web3 Wallet), and transfer your funds.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="accordion__item accordion-item">
                      <div class="accordion__header accordion-header" id="faqH2">
                        <button class="accordion__button accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqB2" aria-expanded="false">
                          <span class="accordion__button-content">When are investment returns credited?</span>
                        </button>
                      </div>
                      <div id="faqB2" class="accordion-collapse collapse" data-bs-parent="#faqAccordionPage">
                        <div class="accordion__body accordion-body">
                          <p class="mb-0">Yields are automatically credited to your active wallet balance according to your chosen plan's schedule (e.g. Daily, Weekly). You can compound profits or request withdrawals at any time.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="accordion__item accordion-item">
                      <div class="accordion__header accordion-header" id="faqH3">
                        <button class="accordion__button accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqB3" aria-expanded="false">
                          <span class="accordion__button-content">What are the withdrawal limits and fees?</span>
                        </button>
                      </div>
                      <div id="faqB3" class="accordion-collapse collapse" data-bs-parent="#faqAccordionPage">
                        <div class="accordion__body accordion-body">
                          <p class="mb-0">Withdrawals are fee-free for all standard crypto payouts. There is no minimum restriction beyond standard network gas limits, and processing is automated for verified accounts.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="accordion__item accordion-item">
                      <div class="accordion__header accordion-header" id="faqH4">
                        <button class="accordion__button accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqB4" aria-expanded="false">
                          <span class="accordion__button-content">How is user capital safeguarded?</span>
                        </button>
                      </div>
                      <div id="faqB4" class="accordion-collapse collapse" data-bs-parent="#faqAccordionPage">
                        <div class="accordion__body accordion-body">
                          <p class="mb-0">Client assets are segregated from company operational accounts and maintained in air-gapped institutional cold vaults with multi-signature authorization protocols.</p>
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
