@extends('layouts.landing')

@section('title', 'Palm Jebel Ali')

@push('styles')
    @vite('resources/css/landing/palm-jebel-ali.css')
@endpush

@section('content')

    {{-- Header --}}
    <header class="pja-header">

        <div class="pja-header-inner">

            <div class="pja-logo-group">

                <a href="#" class="pja-logo">
                    <img
                        src="{{ asset('assets/images/landing/palm-jebel-ali/logo-palm-jebel-ali.svg') }}"
                        alt="Palm Jebel ALi"
                    >
                </a>

{{--                <span class="pja-logo-divider">|</span>--}}

{{--                <a href="#" class="pja-logo">--}}
{{--                    <img--}}
{{--                        src="{{ asset('assets/images/landing/palm-jebel-ali/logo-2.svg') }}"--}}
{{--                        alt="Avanor"--}}
{{--                    >--}}
{{--                </a>--}}

            </div>

            <nav class="pja-navigation">
                <a href="#about">Palm Jebel ali</a>
                <a href="#downloads">Downloads</a>
                <a href="#gallery">Gallery</a>
                <a href="#location">Location</a>
                <a href="#contact">Contact</a>
            </nav>

        </div>

    </header>


    {{-- Hero --}}
    <section class="pja-hero">

        <img
            src="{{ asset('assets/images/landing/palm-jebel-ali/hero.jpg') }}"
            alt="Palm Jebel Ali"
            class="pja-hero-image"
        >

        <div class="pja-hero-content">

            <div class="pja-hero-box">

                <div class="pja-hero-eyebrow">
                    PALM JEBEL ALI | FROND F
                </div>

                <h1>
                    THE FINAL COLLECTION<br>
                    OF BEACHFRONT VILLAS
                </h1>

                <p class="pja-hero-description">
                    An exclusive waterfront collection in the final phase
                    of Palm Jebel Ali, positioned towards the tip of Frond F.
                </p>

                <div class="pja-hero-stats">



                    <div class="pja-hero-stat">
                        <strong>5–7</strong>
                        <span>BEDROOMS</span>
                    </div>

                    <div class="pja-hero-stat">
                        <strong>JAN 2030</strong>
                        <span>HANDOVER</span>
                    </div>

                </div>

                <div class="pja-hero-buttons">

                    <a href="#" class="pja-btn pja-btn-primary">
                        DOWNLOAD BROCHURE
                    </a>

                    <a href="#" class="pja-btn pja-btn-secondary">
                        REGISTER YOUR INTEREST
                    </a>

                </div>

            </div>

        </div>

    </section>
    <section class="pja-project-info pja-section">

        <div class="main-container pja-project-info-container">

            <!-- LEFT CONTENT -->
            <div class="pja-project-info-content">

                <div class="section-eyebrow">
                    PALM JEBEL ALI | FROND F
                </div>

                <h2 class="title">
                    The Final Phase
                    Of Palm Jebel Ali
                </h2>

                <p class="section-description">
                    Frond F marks the final collection of premium
                    beachfront villas at Palm Jebel Ali.
                    Positioned towards the tip of the frond, the
                    location offers a wider opening towards the water
                    and a more exclusive waterfront setting.
                </p>


                <!-- PRICE & PAYMENT -->
                <div class="pja-project-highlights">

                    <!-- STARTING PRICE -->
                    <div class="pja-project-highlight">

                        <div class="pja-project-highlight-icon">
                            <x-landing-icon name="aed" />
                        </div>

                        <div class="pja-project-highlight-content">

                            <span>FROM</span>

                            <strong>AED 29.34M</strong>

                        </div>

                    </div>


                    <!-- PAYMENT PLAN -->
                    <div class="pja-project-highlight">

                        <div class="pja-project-highlight-icon">
                            <x-landing-icon name="payment" />
                        </div>

                        <div class="pja-project-highlight-content">

                            <span>PAYMENT PLAN</span>

                            <strong>70% — 30%</strong>

                        </div>

                    </div>

                </div>

            </div>




            <aside class="landing-about-v2-form">

                <div class="landing-about-v2-form-inner">



                    @include('partials.lead-form', [
                    'formId' => 'landing-about-form'
                    ])



                </div>

            </aside>

        </div>

    </section>



    <section class="pja-collections pja-section">

        <div class="main-container">

            <div class="pja-collections-header">

                <div class="section-eyebrow">
                    PALM JEBEL ALI | FROND F
                </div>

                <h2>
                    TWO DISTINCT<br>
                    COLLECTIONS
                </h2>

                <p class="section-description">
                    Two exclusive villa collections define the final chapter
                    of Palm Jebel Ali — each with its own character, scale
                    and waterfront setting.
                </p>

            </div>


            <div class="pja-collections-grid">

                <!-- BEACH COLLECTION -->
                <article class="pja-collection-card">

                    <div class="pja-collection-image">

                        <img
                            src="{{ asset('assets/images/landing/palm-jebel-ali/bay-villas.jpg') }}"
                            alt="Beach Collection villas at Palm Jebel Ali"
                        >

                    </div>

                    <div class="pja-collection-content">

                        <div class="pja-collection-label">
                             VILLA UNITS
                        </div>

                        <h3>
                            BEACH<br>
                            COLLECTION
                        </h3>

                        <div class="pja-collection-meta">

                            <div>
                                <span>BEDROOMS</span>
                                <strong>5–6</strong>
                            </div>

                            <div>
                                <span>FROM</span>
                                <strong>AED 29.34M</strong>
                            </div>

                        </div>

                        <a href="#villa-types" class="pja-collection-link">
                            EXPLORE COLLECTION
                            <span>→</span>
                        </a>

                    </div>

                </article>


                <!-- CORAL COLLECTION -->
                <article class="pja-collection-card">

                    <div class="pja-collection-image">

                        <img
                            src="{{ asset('assets/images/landing/palm-jebel-ali/bay-villas.jpg') }}"
                            alt="Coral Collection villas at Palm Jebel Ali"
                        >

                    </div>

                    <div class="pja-collection-content">

                        <div class="pja-collection-label">
                            VILLAS UNITS
                        </div>

                        <h3>
                            CORAL<br>
                            COLLECTION
                        </h3>

                        <div class="pja-collection-meta">

                            <div>
                                <span>BEDROOMS</span>
                                <strong>6–7</strong>
                            </div>

                            <div>
                                <span>FROM</span>
                                <strong>AED 47.9M</strong>
                            </div>

                        </div>

                        <a href="#villa-types" class="pja-collection-link">
                            EXPLORE COLLECTION
                            <span>→</span>
                        </a>

                    </div>

                </article>

            </div>

        </div>

    </section>
@endsection

@push('scripts')
    @vite('resources/js/landing/palm-jebel-ali.js')
@endpush
