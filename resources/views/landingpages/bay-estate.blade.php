@extends('layouts.landing')


@if (!empty($propertyImageUrl))
    @section('og_image', $propertyImageUrl)
@endif


@section(
'title',
$property->meta_title ?: $property->title . ' | Avanor Capital'
)
@push('favicon')
    <link rel="icon" type="image/png"
          href="{{ asset('assets/img/landing/palm-central/favicon.png') }}">
@endpush
@section(
'meta_description',
$property->meta_description
?: \Illuminate\Support\Str::limit(
strip_tags($property->description ?? ''),
155
)
)
@section('canonical', 'https://bay-estate.sales-centre.net')
@section('robots', 'index,follow')
@php
    $displayPrice =
    $property->price
    ?: $property->project?->starting_price;

    $propertySchema = [
    '@context' => 'https://schema.org',
    '@type' => 'RealEstateListing',

    'name' => $property->title,

    'description' =>
    $property->meta_description
    ?: \Illuminate\Support\Str::limit(
    strip_tags($property->description ?? ''),
    155
    ),

    'url' => 'https://bay-estate.sales-centre.net',
    ];

    if (!empty($propertyImageUrl)) {
    $propertySchema['image'] = [
    $propertyImageUrl
    ];
    }

    if ($property->project?->location) {
    $propertySchema['address'] = [
    '@type' => 'PostalAddress',
    'addressLocality' => $property->project->location,
    'addressCountry' => 'AE',
    ];
    }

    if ($displayPrice) {
    $propertySchema['offers'] = [
    '@type' => 'Offer',
    'priceCurrency' => 'AED',
    'price' => $displayPrice,
    'url' => 'https://bay-estate.sales-centre.net',
    ];
    }
@endphp

@push('structured-data')
<script type="application/ld+json">
{!! json_encode(
    $propertySchema,
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
) !!}
</script>
@endpush

@push('styles')
    @vite('resources/css/landing/bay-estate.css')
@endpush

@section('content')

    {{-- Header --}}
    <header class="pja-header">

    <div class="pja-header-inner">

        <div class="pja-logo-group">

            <a href="#" class="pja-logo">
                <img
                    src="{{ asset('assets/img/landing/bay-estate/Bay-Estate-logo.svg') }}"
                    alt="{{ $property->project?->name ?? $property->title }}"
                >
            </a>

        </div>

        {{-- Desktop Navigation --}}
        <nav class="pja-navigation">
            <a href="#about">About</a>
            <a href="#home-types">Properties</a>
            <a href="#payment-plan">Payment Plan</a>
            <a href="#gallery">Gallery</a>
            <a href="#location">Location</a>
            <a href="#contact">Contact</a>
        </nav>

        {{-- Mobile Menu Button --}}
        <button
            class="pja-mobile-menu-toggle"
            type="button"
            aria-label="Open menu"
            aria-expanded="false"
            aria-controls="pja-mobile-menu">
            <span></span>
            <span></span>
        </button>

    </div>

    {{-- Mobile Navigation --}}
    <nav class="pja-mobile-navigation" id="pja-mobile-menu">
        <a href="#about">About</a>
        <a href="#home-types">Properties</a>
        <a href="#payment-plan">Payment Plan</a>
        <a href="#gallery">Gallery</a>
        <a href="#location">Location</a>
        <a href="#contact">Contact</a>
    </nav>

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
                    NEW LAUNCH BY NAKHEEL · DUBAI ISLANDS
                </div>

                <h1 class="pja-hero-title" id="dynamic-ad-h1">
                    Bay Estate by Nakheel on Dubai Islands
                </h1>

                <p class="pja-hero-description">
                    Island townhouses and villas, from around AED 5.9M. Secure yours with just 20%
down.
                </p>

                <div class="pja-hero-stats">



                  

                    <div class="pja-hero-stat">
                        <strong>10 YEAR</strong>
                        <span>GOLDEN VISA ELIGIBLE</span>
                    </div>
                      <div class="pja-hero-stat">
                        <strong>PAY 40%</strong>
                        <span>ON HANDOVER IN 2031 </span>
                    </div>
                      <div class="pja-hero-stat">
                        <strong>3 & 4</strong>
                        <span>BEDROOM TOWNHOUSES,VILLAS AND GARDEN VILLAS</span>
                    </div>

                </div>

                <div class="pja-hero-buttons">

                    <a href="#" data-open-enquiry class="pja-btn pja-btn-primary"  data-open-enquiry data-button-text="DOWNLOAD BROCHURE">
                        ENQUIR NOW
                    </a>

                    

                </div>

            </div>

        </div>

    </section>
<div class="content-stream">



<section class="pja-project-info pja-section" id="show-mob-form">

    <div class="main-container">

       

         @include('partials.lead-form-bay-estate')

             

    </div>

</section>

<section class="pja-project-info pja-section" id="details">

    <div class="main-container">

        <div class="pja-project-info-content">

            <div class="section-eyebrow">
                Bay Estate by Nakheel
            </div>

            <h2 class="title">
                Bay Estate Price List, Floor Plans & Availability
            </h2>

            <p class="section-description">
                Everything You Need to Choose Your Home
            </p>

        </div>

        <div class="pja-details-grid pja-details">

            <div class="pja-details-card"
                 data-open-enquiry
                 role="button"
                 tabindex="0">

                <div class="pja-details-lock" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="4" y="10" width="16" height="11" rx="2"/>
                        <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                    </svg>
                </div>

                <h3 class="pja-details-card-title">
                    Launch price list
                </h3>

                <div class="pja-details-divider"></div>

                <p class="pja-details-card-text">
                    Prices for every unit type and plot
                </p>

            </div>


            <div class="pja-details-card"
                 data-open-enquiry
                 role="button"
                 tabindex="0">

                <div class="pja-details-lock" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="4" y="10" width="16" height="11" rx="2"/>
                        <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                    </svg>
                </div>

                <h3 class="pja-details-card-title">
                    Payment schedule
                </h3>

                <div class="pja-details-divider"></div>

                <p class="pja-details-card-text">
                    Every instalment and date, from booking to handover
                </p>

            </div>


            <div class="pja-details-card"
                 data-open-enquiry
                 role="button"
                 tabindex="0">

                <div class="pja-details-lock" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="4" y="10" width="16" height="11" rx="2"/>
                        <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                    </svg>
                </div>

                <h3 class="pja-details-card-title">
                    Floor plans
                </h3>

                <div class="pja-details-divider"></div>

                <p class="pja-details-card-text">
                    All 5 layouts, with room-by-room dimensions
                </p>

            </div>


            <div class="pja-details-card"
                 data-open-enquiry
                 role="button"
                 tabindex="0">

                <div class="pja-details-lock" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="4" y="10" width="16" height="11" rx="2"/>
                        <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                    </svg>
                </div>

                <h3 class="pja-details-card-title">
                     Masterplan
                </h3>

                <div class="pja-details-divider"></div>

                <p class="pja-details-card-text">
                    Where each townhouse, villa and plot sits
                </p>

            </div>


            <div class="pja-details-card"
                 data-open-enquiry
                 role="button"
                 tabindex="0">

                <div class="pja-details-lock" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="4" y="10" width="16" height="11" rx="2"/>
                        <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                    </svg>
                </div>

                <h3 class="pja-details-card-title">
                    Live availability
                </h3>

                <div class="pja-details-divider"></div>

                <p class="pja-details-card-text">
                    Which units and positions are still open
                </p>

            </div>

        </div>

             <div class="pja-gallery-button-wrapper" bis_skin_checked="1">

                <a href="#" class="pja-btn pja-btn-transparent" data-open-enquiry="">
                    UNLOCK THE DETAILS
                </a>

            </div>

    </div>

</section>

    <section class="pja-project-info pja-section" id="about">

        <div class="main-container ">

            <!-- LEFT CONTENT -->
            <div class="pja-project-info-content">

                <div class="section-eyebrow">
                    KNOW MORE ABOUT YOUR VILLA HOME
                </div>

                <h2 class="title">
                    Bay Estate: Nakheel's New Villas & Townhouses on Dubai Islands
                </h2>

                <p class="section-description">
                    Bay Estate is Nakheel's newest community of villas and townhouses on Dubai Islands, set
around landscaped green spaces and lined by waterfront and beach villa plots. Choose from 3
and 4-bedroom townhouses, 4-bedroom attached villas and spacious 4-bedroom garden villas,
with a payment plan that spreads 40% of the cost to handover.
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

                            <strong>AED 5.9M</strong>

                        </div>

                    </div>


                    <!-- PAYMENT PLAN -->
                    <div class="pja-project-highlight">

                        <div class="pja-project-highlight-icon">
                            <x-landing-icon name="payment" />
                        </div>

                        <div class="pja-project-highlight-content">

                            <span>Villas & Townhouses</span>

                            <strong>3 & 4</strong>

                        </div>

                    </div>

                </div>

            </div>





        </div>

    </section>



    <section class="pja-collections pja-section" id="home-types">

    <div class="main-container">

        <div class="pja-collections-header">

            <div class="section-eyebrow">
                EXPLORE VILLA OPTIONS
            </div>

            <h2 class="title">
                Bay Estate Townhouses & Villas
            </h2>

            <p class="section-description">
                Explore the latest townhouses and villas available at Bay Estate.
            </p>

        </div>

        <div class="pja-collections-grid">

            <article class="pja-collection-card">
                <a href="#" data-open-enquiry>

                    <div class="pja-collection-image">
                        <img
                            src="{{ asset('assets/img/landing/bay-estate/3-br-townhouse.webp') }}"
                            alt="3 Bedroom Townhouse at Bay Estate"
                        >
                    </div>

                    <div class="pja-collection-content">

                        <div class="pja-collection-label">
                            TOWNHOUSE
                        </div>

                        <h3>
                            3 BEDROOM<br>
                            TOWNHOUSE
                        </h3>

                        <div class="pja-collection-meta">

                            <div>
                                <span>FLOORS &amp; SIZE</span>
                                <strong>2 FLOORS · 3,000+ SQ FT</strong>
                            </div>

                            <div>
                                <span>FROM</span>
                                <strong>AED 5.9M</strong>
                            </div>

                        </div>

                    </div>

                </a>
            </article>


            <article class="pja-collection-card">
                <a href="#" data-open-enquiry>

                    <div class="pja-collection-image">
                        <img
                            src="{{ asset('assets/img/landing/bay-estate/4-br-townhouse.webp') }}"
                            alt="4 Bedroom Townhouse at Bay Estate"
                        >
                    </div>

                    <div class="pja-collection-content">

                        <div class="pja-collection-label">
                            TOWNHOUSE
                        </div>

                        <h3>
                            4 BEDROOM<br>
                            TOWNHOUSE
                        </h3>

                        <div class="pja-collection-meta">

                            <div>
                                <span>FLOORS &amp; SIZE</span>
                                <strong>2 FLOORS · 3,500+ SQ FT</strong>
                            </div>

                            <div>
                                <span>PRICE</span>
                                <strong>ON REQUEST</strong>
                            </div>

                        </div>

                    </div>

                </a>
            </article>


            <article class="pja-collection-card">
                <a href="#" data-open-enquiry>

                    <div class="pja-collection-image">
                        <img
                            src="{{ asset('assets/img/landing/bay-estate/4-br-attached-villa.webp') }}"
                            alt="4 Bedroom Attached Villa at Bay Estate"
                        >
                    </div>

                    <div class="pja-collection-content">

                        <div class="pja-collection-label">
                            ATTACHED VILLA
                        </div>

                        <h3>
                            4 BEDROOM<br>
                            ATTACHED VILLA
                        </h3>

                        <div class="pja-collection-meta">

                            <div>
                                <span>FLOORS &amp; SIZE</span>
                                <strong>G+1 · 3,600+ SQ FT</strong>
                            </div>

                            <div>
                                <span>PRICE</span>
                                <strong>ON REQUEST</strong>
                            </div>

                        </div>

                    </div>

                </a>
            </article>


            <article class="pja-collection-card">
                <a href="#" data-open-enquiry>

                    <div class="pja-collection-image">
                        <img
                            src="{{ asset('assets/img/landing/bay-estate/4-br-plus-attached-villas.webp') }}"
                            alt="4 Bedroom Plus Attached Villa at Bay Estate"
                        >
                    </div>

                    <div class="pja-collection-content">

                        <div class="pja-collection-label">
                            ATTACHED VILLA
                        </div>

                        <h3>
                            4 BEDROOM<br>
                            PLUS ATTACHED VILLA
                        </h3>

                        <div class="pja-collection-meta">

                            <div>
                                <span>FLOORS &amp; SIZE</span>
                                <strong>G+2 · 5,200+ SQ FT</strong>
                            </div>

                            <div>
                                <span>PRICE</span>
                                <strong>ON REQUEST</strong>
                            </div>

                        </div>

                    </div>

                </a>
            </article>


            <article class="pja-collection-card">
                <a href="#" data-open-enquiry>

                    <div class="pja-collection-image">
                        <img
                            src="{{ asset('assets/img/landing/bay-estate/4-br-garden-villa.webp') }}"
                            alt="4 Bedroom Garden Villa at Bay Estate"
                        >
                    </div>

                    <div class="pja-collection-content">

                        <div class="pja-collection-label">
                            GARDEN VILLA
                        </div>

                        <h3>
                            4 BEDROOM<br>
                            GARDEN VILLA
                        </h3>

                        <div class="pja-collection-meta">

                            <div>
                                <span>PLOT &amp; SIZE</span>
                                <strong>LARGEST PLOTS · 5,200+ SQ FT</strong>
                            </div>

                            <div>
                                <span>PRICE</span>
                                <strong>ON REQUEST</strong>
                            </div>

                        </div>

                    </div>

                </a>
            </article>


            <article class="pja-collection-card pja-collection-card-cta">
                <a href="#" data-open-enquiry>

                    <div class="pja-collection-content">

                        <div class="pja-collection-label">
                            BAY ESTATE
                        </div>

                        <h3>
                            GET PRICES<br>
                            FOR ALL<br>
                            HOME TYPES
                        </h3>

                        <div class="pja-collection-meta">

                            <div>
                                <span>AVAILABLE HOME TYPES</span>
                                <strong>3–4 BEDROOM</strong>
                            </div>

                        </div>

                        <span class="pja-collection-link">
                            GET PRICES
                            <span>→</span>
                        </span>

                    </div>

                </a>
            </article>

        </div>

    </div>

</section>



    <section class="pja-payment-plan pja-section" id="payment-plan">

    <div class="main-container pja-payment-plan-container">

        <div class="pja-payment-plan-content">

            <div class="section-eyebrow">
                PAYMENT PLAN TEASER
            </div>

            <h2 class="title">
                Bay Estate Payment Plan
            </h2>

            <p class="section-description">
                Secure Your Home With 20%
            </p>

        </div>

        <div class="pja-payment-plan-cards">

            <div class="pja-payment-plan-card">

                <div class="pja-payment-plan-card-label">
                    BAY ESTATE
                </div>

                <div class="pja-payment-plan-card-title">
                    20<span>/</span>40<span>/</span>40
                </div>

                <div class="pja-payment-plan-card-description">
                    Secure your home with 20% on booking,
                    followed by instalments during construction,
                    with 40% payable on handover in 2031.
                </div>

                <div class="pja-payment-plan-breakdown">

                    <div class="pja-payment-plan-item">
                        <strong>20%</strong>
                        <span>ON BOOKING</span>
                    </div>

                    <div class="pja-payment-plan-item">
                        <strong>40%</strong>
                        <span>DURING CONSTRUCTION</span>
                    </div>

                    <div class="pja-payment-plan-item">
                        <strong>40%</strong>
                        <span>ON HANDOVER<br>(2031)</span>
                    </div>

                </div>

            </div>

        </div>

        <div class="pja-payment-plan-note">

            <p>
                Spread over instalments between <strong>2027 and 2029</strong>.
                Request the full schedule to see every date.
            </p>

        </div>

        <div class="pja-payment-plan-buttons">

            <a href="#" class="pja-btn pja-btn-fill" data-open-enquiry>
                GET THE PAYMENT SCHEDULE
            </a>

        </div>

    </div>

</section>



<section class="pja-floor-plans pja-section" id="floor-plans">

    <div class="main-container">

        <div class="pja-floor-plans-header">

            <div class="section-eyebrow">
                FLOOR PLANS
            </div>

            <h2 class="title">
                Bay Estate Floor Plans
            </h2>

            <p class="section-description">
                Explore the layouts and spaces available across Bay Estate.
            </p>

        </div>

        <div class="pja-floor-plans-gallery">

            <div class="pja-floor-plan-card">
                <img
                    src="{{ asset('assets/img/landing/bay-estate/floor-plan-1.webp') }}"
                    alt="Bay Estate floor plan"
                    loading="lazy"
                >
            </div>

            <div class="pja-floor-plan-card">
                <img
                    src="{{ asset('assets/img/landing/bay-estate/floor-plan-2.webp') }}"
                    alt="Bay Estate floor plan"
                    loading="lazy"
                >
            </div>

            <div class="pja-floor-plan-card">
                <img
                    src="{{ asset('assets/img/landing/bay-estate/floor-plan-3.webp') }}"
                    alt="Bay Estate floor plan"
                    loading="lazy"
                >
            </div>

            <div class="pja-floor-plans-overlay">

                <div class="pja-floor-plans-overlay-content">
                    <span>
                        DETAILED FLOOR PLANS
                    </span>

                    <strong>
                        Get the full layouts,
                        dimensions and details
                    </strong>

                    <a href="#" class="pja-btn pja-btn-fill" data-open-enquiry>
                        GET FLOOR PLANS ON WHATSAPP
                    </a>
                </div>

            </div>

        </div>

    </div>

</section>

    <section class="pja-amenities pja-section">

    <div class="main-container">

        <div class="pja-amenities-header">

            <div class="section-eyebrow">
                AMENITIES
            </div>

            <h2 class="title">
                BAY ESTATE Amenities
            </h2>

            <p class="section-description">
                Resort living, every day
            </p>

        </div>


        <div class="pja-amenities-grid">

            <!-- AMENITY 1 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="beach" />
                </div>

                <h3>
                    beach lounge
                </h3>

                <p>
                    A relaxed beachfront setting for unwinding
                    beside the sea.
                </p>

            </div>


            <!-- AMENITY 2 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="pool" />
                </div>

                <h3>
                    beach volleyball
                </h3>

                <p>
                    An active beachfront space for casual games
                    and outdoor recreation.
                </p>

            </div>


            <!-- AMENITY 3 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="water" />
                </div>

                <h3>
                    Infinity pool
                </h3>

                <p>
                    A serene pool overlooking the waterfront,
                    designed for relaxing and refreshing.
                </p>

            </div>


            <!-- AMENITY 4 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="sports-court" />
                </div>

                <h3>
                    padel court
                </h3>

                <p>
                    A dedicated court for padel, bringing
                    an active sporting experience close to home.
                </p>

            </div>


            <!-- AMENITY 5 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="dumbbell" />
                </div>

                <h3>
                    fitness studio
                </h3>

                <p>
                    A dedicated space for everyday workouts,
                    movement and personal fitness.
                </p>

            </div>


            <!-- AMENITY 6 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="star" />
                </div>

                <h3>
                    clubhouse
                </h3>

                <p>
                    A welcoming social space for residents
                    to gather, relax and connect.
                </p>

            </div>


            <!-- AMENITY 7 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="world-class" />
                </div>

                <h3>
                    lobby lounge
                </h3>

                <p>
                    An elegant arrival space offering a relaxed
                    setting for residents and guests.
                </p>

            </div>


            <!-- AMENITY 8 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="game" />
                </div>

                <h3>
                    game room
                </h3>

                <p>
                    A dedicated indoor space for entertainment,
                    games and social time.
                </p>

            </div>


            <!-- AMENITY 9 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="garden" />
                </div>

                <h3>
                    event lawn
                </h3>

                <p>
                    An open landscaped setting for gatherings,
                    celebrations and outdoor events.
                </p>

            </div>


            <!-- AMENITY 10 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="dining" />
                </div>

                <h3>
                    outdoor BBQ
                </h3>

                <p>
                    An outdoor dining area designed for relaxed
                    meals and gatherings with family and friends.
                </p>

            </div>


            <!-- AMENITY 11 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="kids-play" />
                </div>

                <h3>
                    kids' play areas
                </h3>

                <p>
                    Dedicated play spaces where children can
                    enjoy active and imaginative outdoor time.
                </p>

            </div>


            <!-- AMENITY 12 -->
            <div class="pja-amenity-box">

                <div class="pja-amenity-icon">
                    <x-landing-icon name="sports-court" />
                </div>

                <h3>
                    sports area
                </h3>

                <p>
                    An outdoor recreation space for staying active,
                    playing and enjoying time outdoors.
                </p>

            </div>

        </div>

    </div>

</section>


    {{-- =========================================================
     PROJECT GALLERY
========================================================= --}}

   <section class="pja-gallery pja-section" id="gallery">

    <div class="main-container">

        {{-- SECTION HEADER --}}
        <div class="pja-gallery-header">

            <div class="section-eyebrow">
                PROJECT GALLERY
            </div>

            <h2 class="title">
               EXPLORE BAY ESTATE Collections
            </h2>

        </div>


        @if ($galleryImages->isNotEmpty())

            @php

                $galleryItems = [
                    'BEACH CLUB FRONT VIEW',
                    'BEACH CLUB POOL',
                    'COMMUNITY AERIAL VIEW',
                    'GYM',
                    'COMMUNITY POOL',
                    'MULTIPURPOSE ROOM',
                    'PRIVATE LAGOONS',
                    'POOL CLUB HOUSE',
                    'PROMENADE',
                    'SPORTS COURT',
              
                    
                ];

                $firstImage = $galleryImages->first();

                $firstImageUrl = \App\Support\MediaUrl::fromMedia(
                    $firstImage,
                    'gallery_avif'
                );

            @endphp


            {{-- =====================================================
                GALLERY
            ====================================================== --}}

            <div class="pja-gallery-visual">

                {{-- MAIN IMAGE --}}
                <div class="pja-gallery-image-wrap">

                    <img
                        src="{{ $firstImageUrl }}"
                        alt="{{ $property->project?->name ?? $property->title }} - Gallery image 1"
                        class="pja-gallery-image"
                        id="pjaGalleryImage"
                    >


                    {{-- LEFT GLASS NAVIGATION --}}
                    <div class="pja-gallery-overlay">

                        @foreach ($galleryImages as $image)

                            @php

                                $imageUrl = \App\Support\MediaUrl::fromMedia(
                                    $image,
                                    'gallery_avif'
                                );

                            @endphp


                            <button
                                type="button"
                                class="pja-gallery-item {{ $loop->first ? 'active' : '' }}"
                                data-gallery-index="{{ $loop->index }}"
                                data-gallery-src="{{ $imageUrl }}"
                            >

                                <span class="pja-gallery-number">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <span class="pja-gallery-title">
                                    {{ $galleryItems[$loop->index] ?? 'GALLERY IMAGE' }}
                                </span>

                            </button>

                        @endforeach

                    </div>

                </div>


                {{-- =====================================================
                    CONTROLS
                ====================================================== --}}

                <div class="pja-gallery-controls">

                    {{-- PREVIOUS --}}
                    <button
                        type="button"
                        class="pja-gallery-prev"
                        aria-label="Previous image">
                        ←
                    </button>


                    {{-- DOWNLOAD BROCHURE --}}
                    <div class="pja-gallery-button-wrapper">

                        <a
                            href="#"
                            class="pja-btn pja-btn-transparent"
                            data-open-enquiry>
                            GET BROCHURE
                        </a>

                    </div>


                    


                    {{-- NEXT --}}
                    <button
                        type="button"
                        class="pja-gallery-next"
                        aria-label="Next image">
                        →
                    </button>

                </div>

            </div>

        @endif

    </div>

</section>


    @php
    $locations = [
        [
            'type' => 'airport',
            'text' => '15 minutes from Dubai International Airport',
            'lat' => 25.0485,
            'lng' => 55.1180,
            'icon' => 'plane',
        ],
        [
            'type' => 'location',
            'text' => '10 minutes from Gold Souq',
            'lat' => 25.0442,
            'lng' => 55.1203,
            'icon' => 'location',
        ],
        [
            'type' => 'location',
            'text' => '25 minutes from Downtown Dubai',
            'lat' => 24.8962,
            'lng' => 55.1614,
            'icon' => 'location',
        ],
        [
            'type' => 'location',
            'text' => '20 minutes from Dubai Creek Harbour',
            'lat' => 24.9608,
            'lng' => 55.1523,
            'icon' => 'location',
        ],
        [
            'type' => 'boat',
            'text' => '35 minutes from Dubai Marina',
            'lat' => 25.0772,
            'lng' => 55.1332,
            'icon' => 'beach_side',
        ],
        [
            'type' => 'palm',
            'text' => '40 minutes from Palm Jumeirah',
            'lat' => 25.1124,
            'lng' => 55.1390,
            'icon' => 'location',
        ],
    ];
@endphp

<section class="pja-location pja-section" id="location">
    <div class="main-container">

        <div class="pja-gallery-header">

            <div class="section-eyebrow">
                LOCATIONS NEARBY
            </div>

            <h2 class="title">
                Bay Estate Location on Dubai Islands
            </h2>

            <p class="section-description">
                Bay Estate is positioned on Dubai Islands, offering residents
                convenient access to Dubai International Airport, Deira, Downtown
                Dubai, Dubai Creek Harbour and the city's major leisure destinations.
                The development combines a waterfront setting with easy connections
                to key areas across Dubai.
            </p>

        </div>

        @if(!empty($locations))

            <div class="pja-location-visual">

                <div class="pja-location-map">

                    <div
                        id="custom-map"
                        data-api-key="{{ config('services.google.maps_key') }}"
                        data-lat="25.299946"
                        data-lng="55.312385"
                        data-title="Bay Estate - Dubai Islands"
                        data-locations='@json($locations)'
                    ></div>

                    <div class="pja-location-overlay">

                        @foreach($locations as $item)

                            <button
                                type="button"
                                class="pja-location-item {{ $loop->first ? 'active' : '' }}"
                                data-location-index="{{ $loop->index }}"
                            >
                                <span class="pja-location-content">

                                    <span class="pja-location-icon">
                                        <x-landing-icon name="{{ $item['icon'] }}" />
                                    </span>

                                    <span class="pja-location-text">
                                        {{ $item['text'] }}
                                    </span>

                                </span>
                            </button>

                        @endforeach

                    </div>

                </div>

            </div>

            <div class="pja-gallery-button-wrapper">

                <a
                    href="#"
                    class="pja-btn pja-btn-transparent"
                    data-open-enquiry>
                    GET LOCATION GUIDE
                </a>

            </div>

        @endif

    </div>
</section>

<section class="golden-visa-section pja-section" id="golden-visa">

    <div class="main-container">

        <div class="pja-gallery-header">

            <div class="section-eyebrow">
                GOLDEN VISA
            </div>

            <h2 class="title">
                Golden Visa With Bay Estate
            </h2>

        </div>

        <div class="golden-visa-content">

            <div class="golden-visa-number">
                10
                <span>YEARS</span>
            </div>

            <div class="golden-visa-copy">

                <p>
                    Every home at Bay Estate is priced above the property value
                    that qualifies for the UAE's 10-year Golden Visa.
                    Our advisors can take you through the requirements.
                </p>

            </div>

        </div>

    </div>

</section>

<section class="pja-launch pja-section" id="why-buy">

    <div class="main-container">

        <div class="pja-launch-header">

            <div class="section-eyebrow">
                WHY BUY AT LAUNCH
            </div>

            <h2 class="title">
                Why Buy at Bay Estate Now
            </h2>

            <p class="section-description">
                Secure your preferred home early and benefit from launch-stage
                pricing, choice and a flexible payment timeline.
            </p>

        </div>

        <div class="pja-launch-reasons">

            <div class="pja-launch-reason">
          

                <div class="pja-launch-reason-content">
                    <h3>Early buyers choose first</h3>
                    <p>
                        The best positions go early, especially
                        waterfront-facing units.
                    </p>
                </div>
            </div>

            <div class="pja-launch-reason">
          

                <div class="pja-launch-reason-content">
                    <h3>Launch pricing</h3>
                    <p>
                        First-phase prices are typically the lowest
                        a project will see.
                    </p>
                </div>
            </div>

            <div class="pja-launch-reason">
     

                <div class="pja-launch-reason-content">
                    <h3>More time to pay</h3>
                    <p>
                        40% of the price isn't due until 2031.
                    </p>
                </div>
            </div>

        </div>

        <div class="pja-launch-process">

            <div class="section-eyebrow">
                HOW IT WORKS
            </div>

            <div class="pja-launch-steps">

                <div class="pja-launch-step">
                    <span class="pja-launch-step-number">01</span>

                    <div>
                        <h3>Request the details.</h3>
                        <p>Takes 30 seconds.</p>
                    </div>
                </div>

                <div class="pja-launch-step">
                    <span class="pja-launch-step-number">02</span>

                    <div>
                        <h3>Get prices, floor plans and availability on WhatsApp.</h3>
                    </div>
                </div>

                <div class="pja-launch-step">
                    <span class="pja-launch-step-number">03</span>

                    <div>
                        <h3>Choose your unit and reserve it with 20%.</h3>
                    </div>
                </div>

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
                FAQ
            </div>

            <h2 class="title">
                Bay Estate FAQs
            </h2>

            <p class="section-description">
                Explore answers to the most common questions
                about Bay Estate townhouses, villas and plots on Dubai Islands.
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
                        How much are homes at Bay Estate?
                    </span>

                    <span class="pja-faq-icon">+</span>

                </button>

                <div class="pja-faq-answer">
                    <p>
                        3-bedroom townhouses start from around AED 5.9M.
                        Villa and plot prices are shared on request.
                    </p>
                </div>

            </div>


            <div class="pja-faq-item">

                <button type="button"
                        class="pja-faq-question"
                        aria-expanded="false">

                    <span class="pja-faq-number">02</span>

                    <span class="pja-faq-title">
                        What's the payment plan?
                    </span>

                    <span class="pja-faq-icon">+</span>

                </button>

                <div class="pja-faq-answer">
                    <p>
                        20% on booking, 40% during construction and 40% on handover.
                        Request the schedule for exact dates.
                    </p>
                </div>

            </div>


            <div class="pja-faq-item">

                <button type="button"
                        class="pja-faq-question"
                        aria-expanded="false">

                    <span class="pja-faq-number">03</span>

                    <span class="pja-faq-title">
                        When is handover?
                    </span>

                    <span class="pja-faq-icon">+</span>

                </button>

                <div class="pja-faq-answer">
                    <p>
                        Construction completion is estimated for January 2031.
                    </p>
                </div>

            </div>


            <div class="pja-faq-item">

                <button type="button"
                        class="pja-faq-question"
                        aria-expanded="false">

                    <span class="pja-faq-number">04</span>

                    <span class="pja-faq-title">
                        Who is the developer?
                    </span>

                    <span class="pja-faq-icon">+</span>

                </button>

                <div class="pja-faq-answer">
                    <p>
                        Nakheel, the master developer behind Dubai Islands.
                    </p>
                </div>

            </div>


            <div class="pja-faq-item">

                <button type="button"
                        class="pja-faq-question"
                        aria-expanded="false">

                    <span class="pja-faq-number">05</span>

                    <span class="pja-faq-title">
                        Is Bay Estate the same as Bay Villas?
                    </span>

                    <span class="pja-faq-icon">+</span>

                </button>

                <div class="pja-faq-answer">
                    <p>
                        No. Bay Villas was an earlier Nakheel villa community on Dubai Islands,
                        and Bay Estate is Nakheel's new villa and townhouse launch there.
                    </p>
                </div>

            </div>


            <div class="pja-faq-item">

                <button type="button"
                        class="pja-faq-question"
                        aria-expanded="false">

                    <span class="pja-faq-number">06</span>

                    <span class="pja-faq-title">
                        Does Bay Estate qualify for the Golden Visa?
                    </span>

                    <span class="pja-faq-icon">+</span>

                </button>

                <div class="pja-faq-answer">
                    <p>
                        Yes. Every home is priced above the qualifying value
                        for the 10-year Golden Visa.
                    </p>
                </div>

            </div>


            <div class="pja-faq-item">

                <button type="button"
                        class="pja-faq-question"
                        aria-expanded="false">

                    <span class="pja-faq-number">07</span>

                    <span class="pja-faq-title">
                        Are plots available?
                    </span>

                    <span class="pja-faq-icon">+</span>

                </button>

                <div class="pja-faq-answer">
                    <p>
                        A limited number of waterfront and beach plots are available.
                        Ask us for current availability.
                    </p>
                </div>

            </div>

        </div>

    </div>

</section>

<section class="pja-plots pja-section" id="plots">

    <div class="main-container">

        <div class="pja-plots-header">

            <div class="section-eyebrow">
                WATERFRONT & BEACH PLOTS
            </div>

            <h2 class="title">
                Waterfront & Beach Plots on Dubai Islands
            </h2>

            <p class="section-description">
                Build Your Own on the Water
            </p>

        </div>

        <div class="pja-plots-content">

            <p class="pja-plots-description">
                A limited number of waterfront and beach villa plots are available.
                Each is around 8,000 sqft, with about 7,800 sqft of buildable area.
            </p>

            <div class="pja-plots-stats">

                <div class="pja-plots-stat">
                    <strong>8,000</strong>
                    <span>SQFT PLOT SIZE</span>
                </div>

                <div class="pja-plots-stat">
                    <strong>7,800</strong>
                    <span>SQFT BUILDABLE AREA</span>
                </div>

                <div class="pja-plots-stat">
                    <strong>LIMITED</strong>
                    <span>AVAILABILITY</span>
                </div>

            </div>

            <div class="pja-plots-cta">

                <a href="#" class="pja-btn pja-btn-fill" data-open-enquiry>
                    ASK ABOUT PLOT AVAILABILITY
                </a>

            </div>

        </div>

    </div>

</section>


    <section class="editorial-section pja-section" id="developer">
    <div class="editorial-container">
        <div class="editorial-grid">


        <div class="editorial-col col-left">
            <div>
                <div class="section-eyebrow">ABOUT THE DEVELOPER</div>
                <h2 class="main-heading">Nakheel Properties</h2>

                <p class="body-paragraph">
                    Nakheel is one of Dubai's leading master developers, known for creating
                    landmark waterfront destinations, residential communities and
                    transformative developments that have helped shape the city's coastline.
                </p>

                <p class="body-paragraph">
                    With Bay Estate on Dubai Islands, Nakheel continues its focus on
                    waterfront living, bringing an exclusive residential experience to one
                    of Dubai's emerging coastal destinations, surrounded by beaches,
                    promenades and views across the Arabian Gulf.
                </p>
            </div>

            <div class="mini-features-grid">

                <div class="mini-feature-item">
                    <div class="mini-feature-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                        </svg>
                    </div>
                    <div class="mini-feature-title">Waterfront</div>
                    <div class="mini-feature-sub">Master Developments</div>
                </div>

                <div class="mini-feature-item">
                    <div class="mini-feature-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                        </svg>
                    </div>
                    <div class="mini-feature-title">Proven</div>
                    <div class="mini-feature-sub">Development Experience</div>
                </div>

                <div class="mini-feature-item">
                    <div class="mini-feature-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6 0 3.375 3.375 0 016 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 01-5.25 0z"/>
                        </svg>
                    </div>
                    <div class="mini-feature-title">Premium</div>
                    <div class="mini-feature-sub">Residential Communities</div>
                </div>

                <div class="mini-feature-item">
                    <div class="mini-feature-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                        </svg>
                    </div>
                    <div class="mini-feature-title">20+ Years</div>
                    <div class="mini-feature-sub">of Development</div>
                </div>

            </div>
        </div>

    </div>
</div>


</section>


    </div>





<section class="pja-enquiry pja-section" id="contact">

    <div class="main-container">

        <div class="pja-enquiry-content">

            <div class="pja-enquiry-copy">

                <div class="section-eyebrow">
                    BE FIRST IN LINE
                </div>

                <h2 class="pja-enquiry-title">
                    Be First in Line<br>
                    at Bay Estate
                </h2>

                <p class="section-description">
                    Get launch prices, floor plans and availability
                    sent to your WhatsApp.
                </p>

                <a href="#" class="pja-enquiry-button" data-open-enquiry>
                    Send Me the Details
                </a>

            </div>

            <div class="pja-enquiry-form">

                @include('partials.lead-form-bay-estate')

            </div>

        </div>

    </div>

</section>




 <section class="pja-footer">

    <div class="main-container">

        <div class="pja-footer-disclaimer">

            <div class="section-eyebrow">
                DISCLAIMER
            </div>

            <p>
                This page is operated by Avanor Capital L.L.C, a licensed Dubai
                real estate brokerage, and is not the official website of the
                developer. Project names and trademarks belong to their
                respective owners.
            </p>

        </div>

        <div class="pja-footer-bottom">

            <span>
                © {{ date('Y') }} Avanor Capital. All Rights Reserved.
            </span>

            <div class="pja-footer-links">

                <a href="{{ route('landing.privacy-policy') }}">
                    Privacy Policy
                </a>

                <a href="{{ route('landing.terms-and-conditions') }}">
                    Terms &amp; Conditions
                </a>

            </div>

        </div>

    </div>

</section>

<div class="enquiry-popup" data-enquiry-popup aria-hidden="true">

        <div class="enquiry-popup-backdrop" data-close-enquiry></div>

        <div
            class="enquiry-popup-dialog"
            role="dialog"
            aria-modal="true"
            aria-labelledby="enquiry-popup-title">

            <button
                type="button"
                class="enquiry-popup-close"
                data-close-enquiry
                aria-label="Close enquiry form">

                <span></span>
                <span></span>

            </button>




                    @include('partials.lead-form-bay-estate')



        </div>

    </div>


<aside class="sticky-sidebar" aria-label="Registration Sidebar" id="side-form-lp">
        @include('partials.lead-form-bay-estate')
    </aside>

        <a
            href="https://wa.me/971555342535?text=Hi%2C%20I%E2%80%99m%20interested%20to%20know%20more%20about%20Bay%20Estate%20By%20Nakheel.%20Please%20share%20all%20relevant%20details.%0AThank%20you."
            class="landing-whatsapp-float whatsapp-track"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Chat on WhatsApp"
        >
            <svg width="44px" height="44px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"></path> <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"></path> <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"></path> <defs> <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse"> <stop stop-color="#5BD066"></stop> <stop offset="1" stop-color="#27B43E"></stop> </linearGradient> </defs> </g></svg>
        </a>





@endsection

@push('scripts')
    @vite('resources/js/landing/bay-estate.js')
    @vite('resources/js/map.js')

@endpush








    