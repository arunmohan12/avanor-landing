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
            src="{{ \App\Support\MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            ) }}"

            srcset="
                {{ \App\Support\MediaUrl::fromMedia($coverMedia, 'cover_mobile_avif') }} 768w,
                {{ \App\Support\MediaUrl::fromMedia($coverMedia, 'cover_tablet_avif') }} 1280w,
                {{ \App\Support\MediaUrl::fromMedia($coverMedia, 'cover_avif') }} 1920w
            "

            sizes="100vw"

            alt="{{ $property->project?->name ?? $property->title }}"

            class="pja-hero-image"

            fetchpriority="high"
            decoding="async">

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

                    <a href="#" class="pja-btn pja-btn-primary" data-lead-popup-open data-button-text="DOWNLOAD BROCHURE">
                        DOWNLOAD BROCHURE
                    </a>

                    <a href="#" class="pja-btn pja-btn-secondary " data-lead-popup-open>
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
                    EXPLORE THE VILLA COLLECTIONS
                </div>

                <h2 class="title">
                    Two Signature Collections
                </h2>

                <p class="section-description">
                    Two exclusive villa collections define the final chapter
                    of Palm Jebel Ali — each with its own character, scale
                    and waterfront setting.
                </p>

            </div>


            <div class="pja-collections-grid">

                <!-- BEACH COLLECTION -->

                <article class="pja-collection-card" >
                    <a data-lead-popup-open>
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

                        <a href="#" class="pja-collection-link" data-lead-popup-open>
                            EXPLORE COLLECTION
                            <span>→</span>
                        </a>

                    </div>
                </a>
                </article>


                <!-- CORAL COLLECTION -->

                <article class="pja-collection-card">
                    <a data-lead-popup-open>
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

                        <a href="#" class="pja-collection-link" data-lead-popup-open>
                            EXPLORE COLLECTION
                            <span>→</span>
                        </a>

                    </div>
                    </a>
                </article>



            </div>

        </div>

    </section>

    <section class="pja-payment-plan pja-section">

        <div class="main-container pja-payment-plan-container">

            <!-- LEFT CONTENT -->
            <div class="pja-payment-plan-content">

                <div class="section-eyebrow">
                    PAYMENT PLAN
                </div>

                <h2 class="title">
                    A Flexible Plan<br>
                    For Your Waterfront Villa
                </h2>

                <p class="section-description">
                    Secure your place in the final phase of Palm Jebel Ali
                    with a structured payment plan designed to provide
                    flexibility throughout the construction journey.
                </p>

                <div class="pja-payment-plan-buttons">

                    <a href="#" class="pja-btn pja-btn-fill">
                        DOWNLOAD PAYMENT PLAN
                    </a>

                    <a href="#" class="pja-btn pja-btn-transparent">
                        DOWNLOAD BROCHURE
                    </a>

                </div>

            </div>


            <!-- RIGHT PAYMENT PLAN -->
            <div class="pja-payment-plan-steps">

                <!-- STEP 1 -->
                <div class="pja-payment-step">

                    <div class="pja-payment-step-number">
                        01
                    </div>

                    <div class="pja-payment-step-content">

                        <strong>20%</strong>

                        <h3>
                            DOWN PAYMENT
                        </h3>

                        <p>
                            Pay 20% to secure your villa
                            and confirm your purchase.
                        </p>

                    </div>

                </div>


                <!-- STEP 2 -->
                <div class="pja-payment-step">

                    <div class="pja-payment-step-number">
                        02
                    </div>

                    <div class="pja-payment-step-content">

                        <strong>50%</strong>

                        <h3>
                            DURING CONSTRUCTION
                        </h3>

                        <p>
                            50% payable through structured
                            instalments during construction.
                        </p>

                    </div>

                </div>


                <!-- STEP 3 -->
                <div class="pja-payment-step">

                    <div class="pja-payment-step-number">
                        03
                    </div>

                    <div class="pja-payment-step-content">

                        <strong>30%</strong>

                        <h3>
                            ON HANDOVER
                        </h3>

                        <p>
                            The remaining 30% is payable
                            upon completion and handover.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="pja-amenities pja-section">

        <div class="main-container">

            <div class="pja-amenities-header">

                <div class="section-eyebrow">
                    WATERFRONT LIVING
                </div>

                <h2 class="title">
                    Designed Around<br>
                    The Way You Live
                </h2>

                <p class="section-description">
                    Every detail is considered to create a refined
                    waterfront lifestyle, where private spaces,
                    nature and the sea come together.
                </p>

            </div>


            <div class="pja-amenities-grid">

                <!-- AMENITY 1 -->
                <div class="pja-amenity-box">

                    <div class="pja-amenity-icon">
                        <x-landing-icon name="beach" />
                    </div>

                    <h3>
                        PRIVATE BEACH
                    </h3>

                    <p>
                        Direct access to your own private
                        stretch of beachfront.
                    </p>

                </div>


                <!-- AMENITY 2 -->
                <div class="pja-amenity-box">

                    <div class="pja-amenity-icon">
                        <x-landing-icon name="pool" />
                    </div>

                    <h3>
                        PRIVATE POOL
                    </h3>

                    <p>
                        A private retreat designed for
                        relaxation and leisure.
                    </p>

                </div>


                <!-- AMENITY 3 -->
                <div class="pja-amenity-box">

                    <div class="pja-amenity-icon">
                        <x-landing-icon name="water" />
                    </div>

                    <h3>
                        WATERFRONT LIVING
                    </h3>

                    <p>
                        Expansive views and an uninterrupted
                        connection with the sea.
                    </p>

                </div>


                <!-- AMENITY 4 -->
                <div class="pja-amenity-box">

                    <div class="pja-amenity-icon">
                        <x-landing-icon name="garden" />
                    </div>

                    <h3>
                        LANDSCAPED GARDENS
                    </h3>

                    <p>
                        Beautifully designed outdoor spaces
                        that extend everyday living.
                    </p>

                </div>

            </div>
            <div class="pja-gallery-button-wrapper">

                <a href="#" class="pja-btn pja-btn-transparent" data-lead-popup-open>
                    DOWNLOAD ALL AMENITIES
                </a>

            </div>
        </div>

    </section>


    {{-- =========================================================
     PROJECT GALLERY
========================================================= --}}

    <section class="pja-gallery pja-section">

        <div class="main-container">

            {{-- SECTION HEADER --}}
            <div class="pja-gallery-header">

                <div class="section-eyebrow">
                    PROJECT GALLERY
                </div>

                <h2 class="title">
                    Experience The Final<br>
                    Collection
                </h2>

            </div>


            {{-- SPLIT GALLERY --}}
            <div class="pja-gallery-layout">


                {{-- =================================================
                     LEFT: GALLERY NAVIGATION
                ================================================== --}}

                <div class="pja-gallery-content">

                    <div class="pja-gallery-list">


                        {{-- IMAGE 01 --}}
                        <button
                            type="button"
                            class="pja-gallery-item active"
                            data-gallery-image="1"
                        >

                        <span class="pja-gallery-number">
                            01
                        </span>

                            <span class="pja-gallery-title">
                            VILLA EXTERIOR
                        </span>

                        </button>


                        {{-- IMAGE 02 --}}
                        <button
                            type="button"
                            class="pja-gallery-item"
                            data-gallery-image="2"
                        >

                        <span class="pja-gallery-number">
                            02
                        </span>

                            <span class="pja-gallery-title">
                            WATERFRONT
                        </span>

                        </button>


                        {{-- IMAGE 03 --}}
                        <button
                            type="button"
                            class="pja-gallery-item"
                            data-gallery-image="3"
                        >

                        <span class="pja-gallery-number">
                            03
                        </span>

                            <span class="pja-gallery-title">
                            LIVING SPACES
                        </span>

                        </button>


                        {{-- IMAGE 04 --}}
                        <button
                            type="button"
                            class="pja-gallery-item"
                            data-gallery-image="4"
                        >

                        <span class="pja-gallery-number">
                            04
                        </span>

                            <span class="pja-gallery-title">
                            BEACHFRONT
                        </span>

                        </button>


                        {{-- IMAGE 05 --}}
                        <button
                            type="button"
                            class="pja-gallery-item"
                            data-gallery-image="5"
                        >

                        <span class="pja-gallery-number">
                            05
                        </span>

                            <span class="pja-gallery-title">
                            PRIVATE POOL
                        </span>

                        </button>


                        {{-- IMAGE 06 --}}
                        <button
                            type="button"
                            class="pja-gallery-item"
                            data-gallery-image="6"
                        >

                        <span class="pja-gallery-number">
                            06
                        </span>

                            <span class="pja-gallery-title">
                            PALM JEBEL ALI
                        </span>

                        </button>


                    </div>
                    <div class="pja-gallery-button-wrapper">

                        <a href="#" class="pja-btn pja-btn-transparent" data-lead-popup-open>
                            DOWNLOAD BROCHURE
                        </a>

                    </div>
                </div>


                {{-- =================================================
                     RIGHT: IMAGE
                ================================================== --}}

                <div class="pja-gallery-visual">


                    <div class="pja-gallery-image-wrap">

                        <img
                            src="{{ asset('assets/images/landing/palm-jebel-ali/gallery-01.jpg') }}"
                            alt="Villa exterior at Palm Jebel Ali"
                            class="pja-gallery-image"
                            id="pjaGalleryImage"
                        >

                    </div>


                    {{-- IMAGE CONTROLS --}}
                    <div class="pja-gallery-controls">


                        <button
                            type="button"
                            class="pja-gallery-prev"
                            aria-label="Previous image"
                        >
                            ←
                        </button>


                        <div class="pja-gallery-counter">

                        <span id="pjaGalleryCurrent">
                            01
                        </span>

                            <span>
                            /
                        </span>

                            <span>
                            06
                        </span>

                        </div>


                        <button
                            type="button"
                            class="pja-gallery-next"
                            aria-label="Next image"
                        >
                            →
                        </button>


                    </div>

                </div>

            </div>

        </div>

    </section>


    @php
        $locations = [
            [
                'type' => 'metro',
                'text' => '16 minutes from Life Pharmacy Metro Station',
                'lat' => 25.0485,
                'lng' => 55.1180,
                'icon' => 'metro',
            ],
            [
                'type' => 'mall',
                'text' => '19 minutes from Ibn Battuta Mall',
                'lat' => 25.0442,
                'lng' => 55.1203,
                'icon' => 'mall',
            ],
            [
                'type' => 'plane',
                'text' => '24 minutes from Al Maktoum International Airport (DWC)',
                'lat' => 24.8962,
                'lng' => 55.1614,
                'icon' => 'plane',
            ],
            [
                'type' => 'location',
                'text' => '24 minutes from Expo City',
                'lat' => 24.9608,
                'lng' => 55.1523,
                'icon' => 'location',
            ],
            [
                'type' => 'boat',
                'text' => '25 minutes from Dubai Marina',
                'lat' => 25.0772,
                'lng' => 55.1332,
                'icon' => 'beach_side',
            ],
            [
                'type' => 'palm',
                'text' => '27 minutes from Palm Jumeirah',
                'lat' => 25.1124,
                'lng' => 55.1390,
                'icon' => 'location',
            ],
        ];
    @endphp


    <section class="location-section pja-section">
        <div class="main-container">

            <div class="pja-gallery-header">

                <div class="section-eyebrow">
                    LOCATIONS NEAR BY
                </div>

                <h2 class="title">
                    Where Dubai Meets The Sea
                </h2>

            </div>
            <div class="location-grid">
                <!-- Left Column: Custom Silver-Grey Google Map -->
                <div class="map-container">

                    <div id="custom-map"
                         data-api-key="{{ config('services.google.maps_key') }}"
                         data-lat="25.008860"
                         data-lng="54.987102"
                         data-title="Palm Jebel Ali"
                         data-locations='@json($locations)'>
                    </div>
                </div>

                <!-- Right Column: Location Proximity Checklist -->
                <div class="details-container">


                    <ul class="location-list">
                        @foreach($locations as $item)
                            <li class="location-item">
                                <div class="icon-box">
                                    <x-landing-icon name="{{ $item['icon'] }}" />
                                </div>
                                <div class="text-box">
                                    <p>{{ $item['text'] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>



    {{-- =========================================================
     FAQ
========================================================= --}}

    <section class="pja-faq pja-section">

        <div class="main-container pja-faq-container">

            {{-- LEFT CONTENT --}}
            <div class="pja-faq-content">

                <div class="section-eyebrow">
                    FREQUENTLY ASKED QUESTIONS
                </div>

                <h2 class="title">
                    Everything You Need<br>
                    To Know
                </h2>

                <p class="section-description">
                    Explore answers to the most common questions
                    about the final collection of beachfront villas
                    at Palm Jebel Ali Frond F.
                </p>

            </div>


            {{-- RIGHT FAQ --}}
            <div class="pja-faq-list">

                <div class="pja-faq-item">

                    <button type="button"
                            class="pja-faq-question"
                            aria-expanded="false">

                        <span class="pja-faq-number">01</span>

                        <span class="pja-faq-title">
                        What is Palm Jebel Ali Frond F?
                    </span>

                        <span class="pja-faq-icon">+</span>

                    </button>

                    <div class="pja-faq-answer">
                        <p>
                            Frond F is part of the final collection of
                            premium beachfront villas at Palm Jebel Ali,
                            positioned towards the tip of the frond.
                        </p>
                    </div>

                </div>


                <div class="pja-faq-item">

                    <button type="button"
                            class="pja-faq-question"
                            aria-expanded="false">

                        <span class="pja-faq-number">02</span>

                        <span class="pja-faq-title">
                        How many villas are available?
                    </span>

                        <span class="pja-faq-icon">+</span>

                    </button>

                    <div class="pja-faq-answer">
                        <p>
                            The final collection consists of 44 exclusive
                            beachfront villas, divided between the Beach
                            Collection and Coral Collection.
                        </p>
                    </div>

                </div>


                <div class="pja-faq-item">

                    <button type="button"
                            class="pja-faq-question"
                            aria-expanded="false">

                        <span class="pja-faq-number">03</span>

                        <span class="pja-faq-title">
                        What types of villas are available?
                    </span>

                        <span class="pja-faq-icon">+</span>

                    </button>

                    <div class="pja-faq-answer">
                        <p>
                            The Beach Collection offers 5 and 6-bedroom
                            villas, while the Coral Collection offers
                            6 and 7-bedroom villas.
                        </p>
                    </div>

                </div>


                <div class="pja-faq-item">

                    <button type="button"
                            class="pja-faq-question"
                            aria-expanded="false">

                        <span class="pja-faq-number">04</span>

                        <span class="pja-faq-title">
                        What is the starting price?
                    </span>

                        <span class="pja-faq-icon">+</span>

                    </button>

                    <div class="pja-faq-answer">
                        <p>
                            The Beach Collection starts from AED 29.34M,
                            while the Coral Collection starts from AED 47.9M.
                        </p>
                    </div>

                </div>


                <div class="pja-faq-item">

                    <button type="button"
                            class="pja-faq-question"
                            aria-expanded="false">

                        <span class="pja-faq-number">05</span>

                        <span class="pja-faq-title">
                        What is the payment plan?
                    </span>

                        <span class="pja-faq-icon">+</span>

                    </button>

                    <div class="pja-faq-answer">
                        <p>
                            The payment plan is structured as 20% on booking,
                            50% during construction and 30% on handover.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <section class="editorial-section pja-section">
        <div class="editorial-container">
            <div class="editorial-grid">

                <!-- LEFT COLUMN: ABOUT THE DEVELOPER -->
                <div class="editorial-col col-left">
                    <div>
                        <div class="section-eyebrow">About The Developer</div>
                        <h2 class="main-heading">Nakheel Properties</h2>

                        <p class="body-paragraph">
                            Nakheel is one of Dubai's premier master developers, world-renowned for pioneering iconic waterfront developments, luxury island sanctuaries, and transformative urban destinations across the UAE.
                        </p>

                        <p class="body-paragraph">
                            Palm Jebel Ali is Nakheel's flagship master development in Dubai, engineered to set a new benchmark for ultra-luxury coastal living, featuring pristine private beaches, lush green corridors, and an exclusive island lifestyle.
                        </p>
                    </div>

                    <!-- 4 Mini Feature Columns -->
                    <div class="mini-features-grid">
                        <div class="mini-feature-item">
                            <div class="mini-feature-icon">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                                </svg>
                            </div>
                            <div class="mini-feature-title">Global Leader</div>
                            <div class="mini-feature-sub">in Waterfront Masterplans</div>
                        </div>

                        <div class="mini-feature-item">
                            <div class="mini-feature-icon">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                                </svg>
                            </div>
                            <div class="mini-feature-title">Proven</div>
                            <div class="mini-feature-sub">Track Record</div>
                        </div>

                        <div class="mini-feature-item">
                            <div class="mini-feature-icon">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6 0 3.375 3.375 0 016 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                </svg>
                            </div>
                            <div class="mini-feature-title">Premium</div>
                            <div class="mini-feature-sub">Communities</div>
                        </div>

                        <div class="mini-feature-item">
                            <div class="mini-feature-icon">
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                                </svg>
                            </div>
                            <div class="mini-feature-title">20+ Years</div>
                            <div class="mini-feature-sub">of Excellence</div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: COMMUNITY / PROJECT HIGHLIGHTS -->
                <div class="editorial-col col-right">
                    <div class="right-header">
                        <div class="header-image">
                            <img
                                src="{{ asset('assets/images/landing/palm-jebel-ali/PalmJebelAlifontlogo.png') }}"
                                alt="Palm Jebel Ali Sanctuary"
                            >
                        </div>
                        <span class="right-header-sub">BY NAKHEEL</span>
                        <p class="right-header-desc">
                            An extraordinary luxury island sanctuary in Dubai, engineered to redefine ultra-luxury waterfront living with pristine private beaches, lush green corridors, and world-class resort living.
                        </p>
                    </div>

                    <!-- 3 Big Stat Pillars (Single Row on Mobile) -->
                    <div class="stats-trio-grid">

                        <!-- Stat 1 -->
                        <div class="stat-trio-col">
                            <div class="stat-circle-icon">
                                <x-landing-icon name="beach_side" />
                            </div>
                            <div class="stat-big-number">110KM</div>

                            <div class="stat-main-label">BEACHFRONT</div>
                            <div class="stat-sub-label">Pristine Coastline</div>
                        </div>

                        <!-- Stat 2 -->
                        <div class="stat-trio-col">
                            <div class="stat-circle-icon">
                                <svg fill="none" stroke="currentColor" stroke-width="1.3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5s0 0 0 0m3 0h1.5m-4.5 3h1.5m3 0h1.5m-4.5 3h1.5m3 0h1.5m-4.5 3h1.5m3 0h1.5"/>
                                </svg>
                            </div>
                            <div class="stat-big-number">16 FRONDS</div>

                            <div class="stat-main-label">EXCLUSIVE</div>
                            <div class="stat-sub-label">Coral Fronds</div>
                        </div>

                        <!-- Stat 3 -->
                        <div class="stat-trio-col">
                            <div class="stat-circle-icon">
                                <x-landing-icon name="resort" />
                            </div>
                            <div class="stat-big-number">80+</div>
                            <div class="stat-main-label">EXCLUSIVE</div>
                            <div class="stat-sub-label">Hotels & Resorts</div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite('resources/js/landing/palm-jebel-ali.js')
    @vite('resources/js/map.js')

@endpush



<div
    class="landing-lead-popup"
    id="landingLeadPopup"
    aria-hidden="true">

    <div
        class="landing-lead-popup-backdrop"
        data-lead-popup-close>
    </div>

    <div
        class="landing-lead-popup-dialog"
        role="dialog"
        aria-modal="true"
        aria-label="Register Your Interest">

        <button
            type="button"
            class="landing-lead-popup-close"
            data-lead-popup-close
            aria-label="Close">
            ×
        </button>

        @include('partials.lead-form', [
        'formId' => 'landing-popup-form',
        'heading' => 'GET PROJECT DETAILS',
        'buttonText' => 'SUBMIT',
        'source' => 'the_heights_popup',

        'action' => route('landing.leads.store'),
        ])

    </div>

</div>
