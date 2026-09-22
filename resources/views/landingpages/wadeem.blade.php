@extends('layouts.landing')


{{-- =====================================================
    SEO
===================================================== --}}

@if (!empty($propertyImageUrl))
    @section('og_image', $propertyImageUrl)
@endif

@section(
'title',
$property->meta_title ?: $property->title . ' | Avanor Capital'
)

@section(
'meta_description',
$property->meta_description
?: \Illuminate\Support\Str::limit(
strip_tags($property->description ?? ''),
155
)
)

@if (filled($property->meta_keywords))
    @section('meta_keywords', $property->meta_keywords)
@endif

@section('canonical', 'https://theheights.avanorcap.com')


@section('robots', 'index,follow')


{{-- =====================================================
    STRUCTURED DATA
===================================================== --}}

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

    'url' => 'https://theheights.avanorcap.com',
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
    'url' => 'https://theheights.avanorcap.com',
    ];
    }
@endphp


@push('structured-data')
    <script type="application/ld+json">
        {
            !!json_encode(
                $propertySchema,
                JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
            ) !!
        }
    </script>
@endpush

@push('styles')
    @vite('resources/css/landing/wadeem.css')
@endpush

@section('content')

    <header class="header">
        <div class="header-inner">
            <a class="brand" href="#" aria-label="Wadeem Gardens by Modon">
                <img src="{{ asset('assets/img/landing/wadeem-modon/logo-gardens.webp') }}" alt="Wadeem Gardens by Modon" width="2177" height="911" style="height:52px;width:auto">
            </a>
            <nav class="nav" aria-label="Primary">
                <div class="nav-links">
                    <a href="#about">About</a>
                    <a href="#properties">Villas</a>
                    <a href="#paymentplan">Payment Plan</a>
                    <a href="#amenities">Amenities</a>
                    <a href="#gallery">Gallery</a>
                    <a href="#location">Location</a>
                </div>
                <a class="btn btn-champagne btn-nav" href="#contact" data-open-enquiry>Register Interest</a>
                <button class="menu-btn" type="button" aria-expanded="false" aria-controls="mobile-nav" aria-label="Open menu">
                    <span></span><span></span><span></span>
                </button>
            </nav>
        </div>
    </header>

    <div class="mobile-nav" id="mobile-nav">
        <nav aria-label="Mobile">
            <a href="#about">About</a>
            <a href="#properties">Villas</a>
            <a href="#paymentplan">Payment Plan</a>
            <a href="#amenities">Amenities</a>
            <a href="#location">Location</a>
            <a class="btn btn-champagne" href="#contact" data-open-enquiry>Register Your Interest</a>
        </nav>
    </div>

<main id="content">

    <section class="hero" aria-label="Hero">
        <div class="hero-media" aria-hidden="true">

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


                width="1912" height="1080"
                alt="{{ $property->project?->name ?? $property->title }}"

                class="avanor-property-hero-image"

                fetchpriority="high"
                decoding="async">

        </div>
        <div class="hero-veil" aria-hidden="true"></div>
        <div class="hero-content">
            <h1> {{ $property->title }} </h1>
            <p class="hero-description reveal"><strong>4–6 Bedroom Villas on Hudayriyat Island</strong></p>
            <p class="hero-copy">Discover Wadeem Gardens by Modon, a collection of 4, 5 and 6-bedroom villas located on
                Hudayriyat Island, Abu Dhabi.
                Choose from contemporary villa designs across three gated villa clusters, with a range of
                layouts designed around modern family living.</p>

            <div class="hero-highlights bg-white/5 border border-white/10 rounded-xl p-4 sm:p-5
            grid grid-cols-[1fr_auto_1fr_auto_1fr] items-center text-center reveal">

                <!-- Price -->
                <div class="px-2 sm:px-4">
        <span class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">
            From
        </span>
                    <span class="font-serif text-base sm:text-xl font-bold text-champagne-400">
            AED 8.7M
        </span>
                </div>

                <!-- Divider -->
                <div class="h-10 sm:h-12 w-px bg-white/10 mx-2 sm:mx-3"></div>

                <!-- Payment Plan -->
                <div class="px-2 sm:px-4">
        <span class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">
            Payment Plan
        </span>
                    <span class="font-serif text-base sm:text-xl font-bold text-white">
            25/75
        </span>
                </div>

                <!-- Divider -->
                <div class="h-10 sm:h-12 w-px bg-white/10 mx-2 sm:mx-3"></div>

                <!-- Down Payment -->
                <div class="px-2 sm:px-4">
        <span class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">
            Down Payment
        </span>
                    <span class="font-serif text-base sm:text-xl font-bold text-champagne-400">
            5%
        </span>
                </div>

            </div>
            <div class="hero-actions">
                <a class="btn btn-champagne" href="#contact" data-open-enquiry>Enquire now</a>
            </div>
        </div>
        <div class="scroll-cue" aria-hidden="true"><span>Scroll</span><span class="line"></span></div>
    </section>

    <div class="content-stream">


        <section class="section mobile-enquiry-section" id="mobile-register">

            <div class="mobile-enquiry-inner">






                    {{-- Your reusable form --}}
                @include('partials.lead-form-wadeem')



            </div>

        </section>
        <section class="section about-section" id="about">


            <div class="wrap">

                <!-- Header -->
                <div class="about-header">

                    <p class="eyebrow-flanked reveal">
                        <span class="eyebrow-line"></span>
                        ABOUT WADEEM
                        <span class="eyebrow-line"></span>
                    </p>

                    <h2 class="title reveal reveal-d1">
                        Wadeem Gardens by Modon
                    </h2>

                    <p class="about-location reveal reveal-d2">
                        Hudayriyat Island · Abu Dhabi
                    </p>

                    <p class="about-intro reveal reveal-d2">
                        Where architecture, nature and community come together
                        to create a distinctive way of living.
                    </p>

                </div>


                <!-- Feature Grid -->
                <div class="about-grid">

                    <!-- Card 01 -->
                    <article class="about-card reveal reveal-d1">


                        <div class="about-card-body">
                            <div class="about-card-heading">
                                <h3>
                                    Three Gated<br>
                                    Villa Clusters
                                </h3>

                                <span class="about-card-icon">✦</span>
                            </div>
                            <p>
                                Wadeem Gardens comprises three distinctive
                                gated villa clusters designed around privacy,
                                connection and everyday living.
                            </p>

                        </div>

                        <span class="about-card-line"></span>

                    </article>


                    <!-- Card 02 -->
                    <article class="about-card reveal reveal-d2">



                        <div class="about-card-body">
                            <div class="about-card-heading">
                            <h3>
                                Turnkey<br>
                                Villas
                            </h3>
                                <span class="about-card-icon">◇</span>

                            </div>
                            <p>
                                Fully designed turnkey homes by Modon, offering
                                a choice of Contemporary Arabic and Modernist
                                façades with varied layouts.
                            </p>

                        </div>

                        <span class="about-card-line"></span>

                    </article>


                    <!-- Card 03 -->
                    <article class="about-card reveal reveal-d3">



                        <div class="about-card-body">
                            <div class="about-card-heading">

                            <h3>
                                Freehold<br>
                                Ownership
                            </h3>
                                <span class="about-card-icon">◎</span>

                            </div>
                            <p>
                                Every villa carries full freehold title,
                                offering permanent ownership to buyers
                                of any nationality.
                            </p>

                        </div>

                        <span class="about-card-line"></span>

                    </article>


                    <!-- Card 04 -->
                    <article class="about-card reveal reveal-d4">


                        <div class="about-card-body">
                            <div class="about-card-heading">
                            <h3>
                                Hudayriyat<br>
                                Island Living
                            </h3>
                                <span class="about-card-icon">⌂</span>

                            </div>
                            <p>
                                An exceptional island setting where nature,
                                culture and modern living meet within one
                                connected destination.
                            </p>

                        </div>

                        <span class="about-card-line"></span>

                    </article>

                </div>


                <!-- Project Highlights -->

                <div class="wrap about-highlights">

                    <!-- Highlight 01 -->
                    <div class="about-highlight reveal reveal-d1">

                        <div class="about-highlight-icon">
                            <svg viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M8 21.5 24 10l16 11.5" />
                                <path d="M11 20.5V38h26V20.5" />
                                <path d="M18 38V26h12v12" />
                                <path d="M8 38h32" />
                            </svg>
                        </div>

                        <h3>Gated Communities</h3>

                    </div>


                    <!-- Highlight 02 -->
                    <div class="about-highlight reveal reveal-d2">

                        <div class="about-highlight-icon">
                            <svg viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M8 38h32" />
                                <path d="M12 38V18l12-8 12 8v20" />
                                <path d="M17 38V25h14v13" />
                                <path d="M18 20h12" />
                                <path d="M24 10v8" />
                            </svg>
                        </div>

                        <h3>Contemporary Architecture</h3>

                    </div>


                    <!-- Highlight 03 -->
                    <div class="about-highlight reveal reveal-d3">

                        <div class="about-highlight-icon">
                            <svg viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M8 34c4-3 7-3 11 0s7 3 11 0 7-3 10 0" />
                                <path d="M8 39c4-3 7-3 11 0s7 3 11 0 7-3 10 0" />
                                <path d="M24 29V12" />
                                <path d="M24 12c-5 1-8 4-10 8 4-1 7-1 10 1" />
                                <path d="M24 17c5-1 8 1 10 4-4 0-7 1-10 3" />
                            </svg>
                        </div>

                        <h3>Hudayriyat Island Living</h3>

                    </div>

                </div>


            </div>


        </section>

        <section class="section villas-island-section" id="villas-hudayriyat">

            <div class="wrap">

                <div class="villas-island-header reveal">

                    <p class="eyebrow-flanked">
                        <span class="eyebrow-line"></span>
                        Looking for a  Hudayriyat Island villa?
                        <span class="eyebrow-line"></span>
                    </p>

                    <h2>

                         Villas On Hudayriyat Island
                    </h2>

                    <p class="villas-island-intro">
                        Wadeem Gardens offers spacious
                        <strong>4–6 bedroom villas</strong> on Hudayriyat Island,
                        with a choice of Contemporary Arabic and Modernist façades
                        and varied layouts. The community comprises
                        <strong>three gated villa clusters.</strong>
                    </p>

                </div>


                <div class="villas-island-facts reveal reveal-d2">

                    <div class="villas-island-fact">

                        <strong>4–6</strong>
                        <small>Bedrooms</small>
                    </div>

                    <div class="villas-island-fact">

                        <strong>03</strong>
                        <small>Gated Clusters</small>
                    </div>

                    <div class="villas-island-fact">

                        <strong>02</strong>
                        <small>Façade Styles</small>
                    </div>

                </div>

            </div>

        </section>


        <section class="section" id="properties">

            {{-- Section Heading --}}
            <div class="wrap" style="max-width:900px;">

                <p class="eyebrow-flanked reveal">
                    <span class="eyebrow-line"></span>
                    Floor Plans
                    <span class="eyebrow-line"></span>
                </p>

                <h2 class="title reveal reveal-d1">
                    Wadeem Gardens Villas by Modon
                </h2>

            </div>


            {{-- Section Description --}}
            <div class="wrap">

                <div
                    class="prose reveal reveal-d2"
                    style="margin-top:1.4rem;max-width:760px;margin-inline:auto;text-align:center"
                >

                    <p
                        class="about-lead"
                        style="text-align:left"
                    >
                        Explore thoughtfully designed floor plans at Wadeem Gardens,
                        offering spacious villas with refined layouts designed for
                        contemporary family living. Discover the ideal residence for
                        your lifestyle and request the detailed floor plan for your
                        preferred villa.
                    </p>

                </div>

            </div>


            {{-- Floor Plan Cards --}}
            <div class="wrap-wide">

                <div class="residence-cards reveal reveal-d3">


                    {{-- =====================================================
                         4 BEDROOM VILLA
                         ===================================================== --}}
                    <article class="residence-card">

                        <button
                            type="button"
                            class="residence-card-media residence-floorplan-trigger"
                            data-open-enquiry
                            data-request-type="4_bedroom_villa"
                            data-bedroom-type="4 Bedroom Villa"
                            aria-label="Get 4 Bedroom Villa floor plan"
                        >

                            <img
                                src="{{ asset('assets/img/landing/br-plans.webp') }}"
                                alt="4 Bedroom Villa floor plan - {{ $property->title }}"
                                class="landing-plan-image"
                            >

                            <span class="residence-floorplan-overlay"></span>

                            <span class="residence-floorplan-cta">
                        Get 4 BR Villa Floor Plan
                    </span>

                        </button>


                        <div class="residence-card-body">

                            <div class="residence-card-heading">

                        <span class="residence-card-number">
                            01
                        </span>

                                <h3>
                                    4-Bedroom Villa
                                </h3>

                            </div>

                            <span class="residence-card-line"></span>

                            <div class="residence-card-specs">

                        <span>
                            430 sqm Unit
                        </span>

                                <span class="residence-card-dot"></span>

                                <span>
                            532 sqm Plot
                        </span>

                            </div>

                        </div>

                    </article>


                    {{-- =====================================================
                         5 BEDROOM VILLA
                         ===================================================== --}}
                    <article class="residence-card">

                        <button
                            type="button"
                            class="residence-card-media residence-floorplan-trigger"
                            data-open-enquiry
                            data-request-type="5_bedroom_villa"
                            data-bedroom-type="5 Bedroom Villa"
                            aria-label="Get 5 Bedroom Villa floor plan"
                        >

                            <img
                                src="{{ asset('assets/img/landing/br-plans.webp') }}"
                                alt="5 Bedroom Villa floor plan - {{ $property->title }}"
                                class="landing-plan-image"
                            >

                            <span class="residence-floorplan-overlay"></span>

                            <span class="residence-floorplan-cta">
                        Get 5 BR Villa Floor Plan
                    </span>

                        </button>


                        <div class="residence-card-body">

                            <div class="residence-card-heading">

                        <span class="residence-card-number">
                            02
                        </span>

                                <h3>
                                    5-Bedroom Villa
                                </h3>

                            </div>

                            <span class="residence-card-line"></span>

                            <div class="residence-card-specs">

                        <span>
                            510 sqm Unit
                        </span>

                                <span class="residence-card-dot"></span>

                                <span>
                            630 sqm Plot
                        </span>

                            </div>

                        </div>

                    </article>


                    {{-- =====================================================
                         6 BEDROOM VILLA
                         ===================================================== --}}
                    <article class="residence-card">

                        <button
                            type="button"
                            class="residence-card-media residence-floorplan-trigger"
                            data-open-enquiry
                            data-request-type="6_bedroom_villa"
                            data-bedroom-type="6 Bedroom Villa"
                            aria-label="Get 6 Bedroom Villa floor plan"
                        >

                            <img
                                src="{{ asset('assets/img/landing/br-plans.webp') }}"
                                alt="6 Bedroom Villa floor plan - {{ $property->title }}"
                                class="landing-plan-image"
                            >

                            <span class="residence-floorplan-overlay"></span>

                            <span class="residence-floorplan-cta">
                        Get 6 BR Villa Floor Plan
                    </span>

                        </button>


                        <div class="residence-card-body">

                            <div class="residence-card-heading">

                        <span class="residence-card-number">
                            03
                        </span>

                                <h3>
                                    6-Bedroom Villa
                                </h3>

                            </div>

                            <span class="residence-card-line"></span>

                            <div class="residence-card-specs">

                        <span>
                            591 sqm Unit
                        </span>

                                <span class="residence-card-dot"></span>

                                <span>
                            720 sqm Plot
                        </span>

                            </div>

                        </div>

                    </article>

                </div>


                {{-- Bottom CTA --}}


            </div>

        </section>

        <section class="section" id="properties" >
            <div class="wrap" style="max-width:900px;">
                <p class="eyebrow-flanked reveal"><span class="eyebrow-line"></span>Villas<span class="eyebrow-line"></span></p>
                <h2 class="title reveal reveal-d1">Hudayriyat Islands Villas by Modon</h2>
            </div>
            <div class="wrap">
                <div class="prose reveal reveal-d2" style="margin-top:1.4rem;max-width:760px;margin-inline:auto;text-align:center">
                    <p class="about-lead" style="text-align:left">Wadeem Gardens comprises three gated villa clusters, offering a choice of Contemporary Arabic and Modernist façades, with varied layouts that allow each home to reflect its residents' individual taste.For buyers searching for Hudayriyat Islands villas, Wadeem Gardens offers a choice of:</p>

                </div>

            </div>
            <div class="wrap-wide">

                <div class="residence-cards reveal reveal-d3">

                    <!-- Residence 01 -->
                    <article class="residence-card">

                        <div class="residence-card-media">
                            <img
                                src="{{ asset('assets/img/landing/wadeem-modon/m6.jpg') }}"
                                alt="4-bedroom villa at Wadeem Gardens, official Modon render"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>

                        <div class="residence-card-body">

                            <div class="residence-card-heading">
                                <span class="residence-card-number">01</span>

                                <h3>4-Bedroom Villa</h3>
                            </div>

                            <span class="residence-card-line"></span>

                            <div class="residence-card-specs">
                                <span>430 sqm Unit</span>
                                <span class="residence-card-dot"></span>
                                <span>532 sqm Plot</span>
                            </div>

                            <div class="residence-card-price">
                                <span>Starting From</span>
                                <strong>AED 8.7M</strong>
                            </div>

                        </div>

                    </article>


                    <!-- Residence 02 -->
                    <article class="residence-card">

                        <div class="residence-card-media">
                            <img
                                src="{{ asset('assets/img/landing/wadeem-modon/m10.jpg') }}"
                                alt="5-bedroom villa at Wadeem Gardens, official Modon render"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>

                        <div class="residence-card-body">

                            <div class="residence-card-heading">
                                <span class="residence-card-number">02</span>

                                <h3>5-Bedroom Villa</h3>
                            </div>

                            <span class="residence-card-line"></span>

                            <div class="residence-card-specs">
                                <span>510 sqm Unit</span>
                                <span class="residence-card-dot"></span>
                                <span>630 sqm Plot</span>
                            </div>

                            <div class="residence-card-price">
                                <span>Starting From</span>
                                <strong>AED 10.2M</strong>
                            </div>

                        </div>

                    </article>


                    <!-- Residence 03 -->
                    <article class="residence-card">

                        <div class="residence-card-media">
                            <img
                                src="{{ asset('assets/img/landing/wadeem-modon/m11.jpg') }}"
                                alt="6-bedroom villa at Wadeem Gardens, official Modon render"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>

                        <div class="residence-card-body">

                            <div class="residence-card-heading">
                                <span class="residence-card-number">03</span>

                                <h3>6-Bedroom Villa</h3>
                            </div>

                            <span class="residence-card-line"></span>

                            <div class="residence-card-specs">
                                <span>591 sqm Unit</span>
                                <span class="residence-card-dot"></span>
                                <span>720 sqm Plot</span>
                            </div>

                            <div class="residence-card-price">
                                <span>Starting From</span>
                                <strong>AED 11.6M</strong>
                            </div>

                        </div>

                    </article>

                </div>

                <div class="residence-cta reveal reveal-d4">
                    <a class="btn btn-champagne" href="#contact" data-open-enquiry=""> View Available Villas</a>
                </div>

            </div>
        </section>

        <section class="section" id="paymentplan" style="background:#fff" id="paymentplan">

            <div class="wrap" style="max-width:900px;">
                <p class="eyebrow-flanked reveal"><span class="eyebrow-line"></span>Payment Plan<span class="eyebrow-line"></span></p>
                <h2 class="title reveal reveal-d1">Official 25/75 Payment Plan</h2>
            </div>
            <div class="wrap">
                <div class="prose reveal reveal-d2" style="margin-top:1.4rem;max-width:760px;margin-inline:auto;text-align:center">
                    <p class="about-lead" style="text-align:left">Wadeem Gardens follows Modon's official 25%/75% payment plan: staged 5% instalments through October 2030, and up to 75% bank mortgage subject to off plan mortgage approval.</p>

                </div>

            </div>

            <div class="wrap" style="max-width:1000px;text-align:center ;   padding-right: 2.5rem;">

                <div class="pp-cards">
                    <div class="pp-card reveal reveal-d1">
                        <div class="pp-pct">5<sup>%</sup></div>
                        <h3>On Reservation</h3>
                        <p>Down payment </p>
                        <span class="pp-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
                    </div>
                    <div class="pp-card reveal reveal-d2">
                        <div class="pp-pct">20<sup>%</sup></div>
                        <h3>Staged Instalments</h3>
                        <p>5% at Month 8 (Jun 2027), 5% at Month 14 (Dec 2027), 5% at Month 20 (Jun 2028), 5% at Month 48 (Oct 2030).</p>
                        <span class="pp-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
                    </div>
                    <div class="pp-card reveal reveal-d3">
                        <div class="pp-pct">75<sup>%</sup></div>
                        <h3>Month 54 (Apr 2031)</h3>
                        <p>Final balance due, subject to off-plan mortgage approval.</p>
                    </div>
                </div>

                <div class="residence-cta reveal reveal-d4">
                    <a class="btn btn-champagne" href="#contact" data-open-enquiry=""> Get Detailed Payment Plan</a>
                </div>
            </div>
        </section>

        <section class="section" id="amenities" style="background-image:linear-gradient(to top, rgba(245,237,223,1), rgba(245,237,223,0)), linear-gradient(rgba(245,237,223,1), rgba(245,237,223,0) 50%), linear-gradient(rgba(245,237,223,0.9), rgba(245,237,223,0.9)), url('assets/img/jali-pattern-bg.webp'); background-size:auto,auto,auto,cover; background-position:0 0,0 0,0 0,center; background-repeat:no-repeat;" id="amenities">


            <div class="wrap" style="max-width:900px;">
                <p class="eyebrow-flanked reveal"><span class="eyebrow-line"></span>WADEEM GARDENS AMENITIES<span class="eyebrow-line"></span></p>
                <h2 class="title reveal reveal-d1">Wadeem Gardens Amenities on Hudayriyat Island</h2>
            </div>
            <div class="wrap">
                <div class="prose reveal reveal-d2" style="margin-top:1.4rem;max-width:760px;margin-inline:auto;text-align:center">
                    <p class="about-lead" style="text-align:left">Discover the amenities at Wadeem Gardens on Hudayriyat Island, Abu Dhabi, featuring thoughtfully designed spaces for recreation, wellness, leisure and everyday community living.</p>

                </div>

            </div>
            <div class="wrap" style="max-width:820px;text-align:center">

                <div class="amenity-icons reveal reveal-d1">
                    <div class="amenity-icon-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v2M18.5 5.5l-1.4 1.4M20.5 12h-2M5.5 5.5l1.4 1.4M3.5 12h2"/><path d="M4 20c2-6 6-9 8-9s6 3 8 9"/><path d="M12 11v9M9 20h6"/></svg>
                        <span>2.3km Central Spine</span>
                    </div>
                    <div class="amenity-icon-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3v14M6 17a2 2 0 0 0 4 0v-3H6M17 6h3v6h-3z"/><path d="M2 21c1.4-1.2 2.8-1.2 4.2 0 1.4 1.2 2.8 1.2 4.2 0 1.4-1.2 2.8-1.2 4.2 0 1.4 1.2 2.8 1.2 4.2 0"/></svg>
                        <span>6 Clubhouses</span>
                    </div>
                    <div class="amenity-icon-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8 12h8M12 8v8"/></svg>
                        <span>Office Park</span>
                    </div>
                    <div class="amenity-icon-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5V6a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v13.5"/><path d="M4 19.5h13M7 8h6M7 11h6"/></svg>
                        <span>Healthcare Centres</span>
                    </div>
                    <div class="amenity-icon-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="6" width="18" height="12" rx="1"/><path d="M12 6v12M3 12h18"/></svg>
                        <span>Arena</span>
                    </div>
                    <div class="amenity-icon-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-6 9 6v11a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z"/></svg>
                        <span>Retail &amp; Dining</span>
                    </div>
                    <div class="amenity-icon-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5V6a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v13.5"/><path d="M4 19.5h13M7 8h6M7 11h6"/></svg>
                        <span>2 International Schools</span>
                    </div>
                    <div class="amenity-icon-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="5.5" cy="17.5" r="2.5"/><circle cx="18.5" cy="17.5" r="2.5"/><path d="M5.5 17.5 10 8l4 6h3M10 8h3l2 4"/></svg>
                        <span>Waterfront Promenade</span>
                    </div>
                    <div class="amenity-icon-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="3"/><path d="M12 11v9M8 15l4-2 4 2M8 19l4-2 4 2"/></svg>
                        <span>Cinemas</span>
                    </div>
                </div>
                <div class="residence-cta reveal reveal-d4">
                    <a class="btn btn-champagne" href="#contact" data-open-enquiry=""> Get All Amenities</a>
                </div>
            </div>
        </section>



        <section class="section" id="gallery" data-gallery>





            <div class="wrap-wide">

                <div class="gallery-head">



                    <div class="wrap" style="max-width:900px;">
                        <p class="eyebrow-flanked reveal"><span class="eyebrow-line"></span>WADEEM GARDENS GALLERY<span class="eyebrow-line"></span></p>
                        <h2 class="title reveal reveal-d1">A Glimpse of Island Living</h2>
                    </div>

                    <div class="prose reveal reveal-d2" style="max-width:760px;margin-inline:auto;text-align:center">
                        <p class="about-lead" style="text-align:left">Discover the architecture, landscapes and lifestyle envisioned for Wadeem Gardens on Hudayriyat Island, through official Modon renders showcasing its villas, amenities and carefully planned community spaces.</p>

                    </div>
                    @if ($galleryImages->isNotEmpty())

                        <div
                            class="gallery-tabs reveal"
                            role="tablist"
                            aria-label="Gallery categories">

                            <button
                                type="button"
                                role="tab"
                                data-gallery-tab="exterior"
                                aria-selected="true">

                                Villas

                            </button>

                            <button
                                type="button"
                                role="tab"
                                data-gallery-tab="interior"
                                aria-selected="false">

                                Island Life

                            </button>

                        </div>

                    @endif

                </div>


                @if ($galleryImages->isNotEmpty())

                    <div
                        class="gallery-stage reveal"
                        role="region"
                        aria-label="Wadeem Gardens gallery">

                        @foreach ($galleryImages as $image)

                            @php

                                /*
                                 * First 6 images = Villas
                                 * Remaining images = Island Life
                                 */
                                $category = $loop->index < 6
                                    ? 'exterior'
                                    : 'interior';

                                $thumbnailUrl = \App\Support\MediaUrl::fromMedia(
                                    $image,
                                    'gallery_tablet_avif'
                                );

                                $mobileUrl = \App\Support\MediaUrl::fromMedia(
                                    $image,
                                    'gallery_mobile_avif'
                                );

                                $fullImageUrl = \App\Support\MediaUrl::fromMedia(
                                    $image,
                                    'gallery_avif'
                                );

                            @endphp


                            <img
                                src="{{ $thumbnailUrl }}"

                                srcset="
                            {{ $mobileUrl }} 768w,
                            {{ $thumbnailUrl }} 1280w
                        "

                                sizes="
                            (max-width: 767px) 100vw,
                            (max-width: 991px) 100vw,
                            100vw
                        "

                                alt="{{ $property->project?->name ?? $property->title }} - Gallery image {{ $loop->iteration }}"

                                loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                                decoding="async"

                                data-category="{{ $category }}"
                                data-full-src="{{ $fullImageUrl }}"

                                class="{{ $loop->first ? 'is-active' : '' }}">

                        @endforeach

                    </div>


                    <div class="gallery-controls">

                        <div
                            class="gallery-counter"
                            data-gallery-counter>
                            01 / 06
                        </div>


                        <div class="gallery-nav">

                            <button
                                class="icon-btn"
                                type="button"
                                data-gallery-prev
                                aria-label="Previous">

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    aria-hidden="true">

                                    <path d="M15 5l-7 7 7 7"/>

                                </svg>

                            </button>


                            <button
                                class="icon-btn"
                                type="button"
                                data-gallery-next
                                aria-label="Next">

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    aria-hidden="true">

                                    <path d="M9 5l7 7-7 7"/>

                                </svg>

                            </button>

                        </div>

                    </div>




                @else

                    <div class="gallery-empty">
                        Gallery images are currently unavailable.
                    </div>

                @endif
                <div class="residence-cta reveal reveal-d4">
                    <a class="btn btn-champagne" href="#contact" data-open-enquiry=""> Get Brochure</a>
                </div>
            </div>

        </section>


        <section class="section " id="location">

            <div class="wrap" style="max-width:900px;">
                <p class="eyebrow-flanked reveal"><span class="eyebrow-line"></span> LOCATION & CONNECTIVITY<span class="eyebrow-line"></span></p>
                <h2 class="title reveal reveal-d1"> Wadeem Gardens on Hudayriyat Island</h2>
            </div>
            <div class="wrap">
                <div class="prose reveal reveal-d2" style="margin-top:1.4rem;max-width:760px;margin-inline:auto;text-align:center">
                    <p class="about-lead" style="text-align:left">   Located on Hudayriyat Island, Wadeem Gardens is designed around a range of lifestyle and
                        everyday amenities, including clubhouses, retail and dining, healthcare centres, international
                        schools, cinemas and a waterfront promenade.</p>

                </div>

            </div>

            <div class="wrap-wide">

                @php
                    $masterplanUrl = asset(
                        'assets/img/landing/wadeem-modon/wadeem-gardens-masterplan.svg'
                    );
                @endphp


                <div class="location-map-wrap reveal reveal-d2">

                    <div class="location-map">

                        <img
                            src="{{ $masterplanUrl }}"
                            alt="Wadeem Gardens masterplan and location map on Hudayriyat Island, Abu Dhabi"
                            loading="lazy"
                            decoding="async"
                            data-location-map-image>


                        <button
                            type="button"
                            class="location-map-enlarge"
                            data-location-map-open
                            aria-label="Enlarge Wadeem Gardens masterplan">

                    <span class="location-map-lens">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.35"
                            aria-hidden="true">

                            <circle cx="10.8" cy="10.8" r="5.7"/>
                            <path d="M15.1 15.1 20 20"/>

                        </svg>

                    </span>

                            <span class="location-map-enlarge-text">
                        Enlarge
                    </span>

                        </button>

                    </div>


                    <div class="location-map-caption">

                        <span class="location-caption-line"></span>

                        <p>
                            Location masterplan by Modon. Drive times are the
                            developer's own published figures and exclude traffic.
                        </p>

                    </div>

                </div>

                <div class="wrap-wide" style="margin-top:3rem">

                    <div class="drive-grid reveal reveal-d1" style="margin-top:2.5rem">
                        <div class="drive-card">
                            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13l1.5-5A2 2 0 0 1 6.4 6.5h11.2A2 2 0 0 1 19.5 8l1.5 5"/><rect x="2.5" y="13" width="19" height="5" rx="1.5"/><circle cx="7" cy="18.5" r="1.3"/><circle cx="17" cy="18.5" r="1.3"/></svg></div>
                            <div><h3>Zayed International Airport</h3><span>~15 min</span></div>
                        </div>
                        <div class="drive-card">
                            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13l1.5-5A2 2 0 0 1 6.4 6.5h11.2A2 2 0 0 1 19.5 8l1.5 5"/><rect x="2.5" y="13" width="19" height="5" rx="1.5"/><circle cx="7" cy="18.5" r="1.3"/><circle cx="17" cy="18.5" r="1.3"/></svg></div>
                            <div><h3>Abu Dhabi Global Market (ADGM)</h3><span>~20 min</span></div>
                        </div>
                        <div class="drive-card">
                            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13l1.5-5A2 2 0 0 1 6.4 6.5h11.2A2 2 0 0 1 19.5 8l1.5 5"/><rect x="2.5" y="13" width="19" height="5" rx="1.5"/><circle cx="7" cy="18.5" r="1.3"/><circle cx="17" cy="18.5" r="1.3"/></svg></div>
                            <div><h3>Louvre Museum</h3><span>~23 min</span></div>
                        </div>
                        <div class="drive-card">
                            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13l1.5-5A2 2 0 0 1 6.4 6.5h11.2A2 2 0 0 1 19.5 8l1.5 5"/><rect x="2.5" y="13" width="19" height="5" rx="1.5"/><circle cx="7" cy="18.5" r="1.3"/><circle cx="17" cy="18.5" r="1.3"/></svg></div>
                            <div><h3>Disneyland (Yas Island)</h3><span>~25 min</span></div>
                        </div>
                        <div class="drive-card">
                            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13l1.5-5A2 2 0 0 1 6.4 6.5h11.2A2 2 0 0 1 19.5 8l1.5 5"/><rect x="2.5" y="13" width="19" height="5" rx="1.5"/><circle cx="7" cy="18.5" r="1.3"/><circle cx="17" cy="18.5" r="1.3"/></svg></div>
                            <div><h3>Sheikh Zayed Grand Mosque</h3><span>~23 min</span></div>
                        </div>
                        <div class="drive-card">
                            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13l1.5-5A2 2 0 0 1 6.4 6.5h11.2A2 2 0 0 1 19.5 8l1.5 5"/><rect x="2.5" y="13" width="19" height="5" rx="1.5"/><circle cx="7" cy="18.5" r="1.3"/><circle cx="17" cy="18.5" r="1.3"/></svg></div>
                            <div><h3>Al Bateen</h3><span>Directly opposite</span></div>
                        </div>
                    </div>
                    <div class="residence-cta reveal reveal-d4">
                        <a class="btn btn-champagne" href="#contact" data-open-enquiry=""> Get Location & Brochure</a>
                    </div>
                </div>

            </div>

        </section>


        <section class="section developer-section" id="developer">
            <div class="wrap" style="max-width:900px;">
                <p class="eyebrow-flanked reveal"><span class="eyebrow-line"></span>  THE DEVELOPER<span class="eyebrow-line"></span></p>
                <h2 class="title reveal reveal-d1">   A Vision Shaping
                    Abu Dhabi's Future</h2>
            </div>
            <div class="wrap">
                <div class="prose reveal reveal-d2" style="margin-top:1.4rem;max-width:760px;margin-inline:auto;text-align:center">
                    <p class="about-lead c-white" style="text-align:left">    Modon is developing a portfolio of destinations across Abu Dhabi,
                        bringing together residential communities, leisure, sport and
                        waterfront experiences as part of the emirate's evolving
                        urban landscape.</p>

                </div>

            </div>

            <div class="wrap-wide">

                {{-- Header --}}



                {{-- Features --}}
                <div class="developer-features">

                    {{-- 01 --}}
                    <article class="developer-feature reveal reveal-d1">

                        <div class="developer-feature-top">

                    <span class="developer-feature-number">
                        01
                    </span>

                            <span class="developer-feature-line"></span>

                        </div>

                        <h3>
                            Government-Backed
                        </h3>

                        <p>
                            Listed on the Abu Dhabi Securities Exchange and supported
                            by ADQ, Modon operates within Abu Dhabi's wider long-term
                            development vision.
                        </p>

                    </article>


                    {{-- 02 --}}
                    <article class="developer-feature reveal reveal-d2">

                        <div class="developer-feature-top">

                    <span class="developer-feature-number">
                        02
                    </span>

                            <span class="developer-feature-line"></span>

                        </div>

                        <h3>
                            Hudayriyat Portfolio
                        </h3>

                        <p>
                            Modon's Hudayriyat Island portfolio includes destinations
                            such as Bashayer, Nawayef, Al Naseem and Hudayriyat Golf
                            Estates, contributing to the island's growing residential
                            offering.
                        </p>

                    </article>


                    {{-- 03 --}}
                    <article class="developer-feature reveal reveal-d3">

                        <div class="developer-feature-top">

                    <span class="developer-feature-number">
                        03
                    </span>

                            <span class="developer-feature-line"></span>

                        </div>

                        <h3>
                            Strong Market Response
                        </h3>

                        <p>
                            The initial Wadeem Gardens release attracted significant
                            buyer demand, with the launch reported to have generated
                            AED 5.5 billion in sales within its first 72 hours in
                            July 2025.
                        </p>

                    </article>


                    {{-- 04 --}}
                    <article class="developer-feature reveal reveal-d4">

                        <div class="developer-feature-top">

                    <span class="developer-feature-number">
                        04
                    </span>

                            <span class="developer-feature-line"></span>

                        </div>

                        <h3>
                            A Complete Island Destination
                        </h3>

                        <p>
                            From expansive parks and sporting facilities to beaches,
                            leisure destinations and residential communities, Modon's
                            vision extends across the wider Hudayriyat Island
                            masterplan.
                        </p>

                    </article>

                </div>

            </div>

        </section>

        {{-- =====================================================
             LOCATION MASTERPLAN LIGHTBOX
        ===================================================== --}}

        <div
            class="location-lightbox"
            data-location-map-lightbox
            aria-hidden="true">

            <div
                class="location-lightbox-backdrop"
                data-location-map-close>
            </div>


            <div
                class="location-lightbox-inner"
                role="dialog"
                aria-modal="true"
                aria-label="Wadeem Gardens masterplan">

                <button
                    type="button"
                    class="location-lightbox-close"
                    data-location-map-close
                    aria-label="Close masterplan">

                    <span></span>
                    <span></span>

                </button>


                <div class="location-lightbox-image">

                    <img
                        src="{{ $masterplanUrl }}"
                        alt="Wadeem Gardens masterplan and location map"
                        data-location-map-full>

                </div>

            </div>

        </div>

    </div>








    <section class="section villa-enquiry-section" id="register">

        <div class="wrap-wide">

            <div class="villa-enquiry-layout">

                {{-- Left --}}
                <div class="villa-enquiry-content reveal">

                    <p class="eyebrow-flanked reveal">
                        <span class="eyebrow-line"></span>
                        FIND YOUR VILLA
                    </p>

                    <h2 class="villa-enquiry-title">
                        Find Your Villa on<br>
                        <em>Hudayriyat Island</em>
                    </h2>

                    <p class="villa-enquiry-description">
                        Explore available Hudayriyat Island villas at Wadeem Gardens
                        and receive current pricing, floor plans, available units
                        and payment-plan details.
                    </p>
                    <div class="footer-cta reveal reveal-d4">
                        <a class="btn btn-champagne" href="#contact" data-open-enquiry=""> Enquire About Wadeem Gardens</a>
                    </div>
                </div>


                {{-- Right --}}
                @include('partials.lead-form-wadeem')

            </div>

        </div>

    </section>






    <section class="section footer-section" >

        <div style="width:1350px;">


        <div class="landing-footer-disclaimer">

            <strong>
                DISCLAIMER
            </strong>

            <p>
                This page is operated by Avanor Capital L.L.C, a licensed Dubai real estate brokerage, and is not the official website of the developer. Project names and trademarks belong to their respective owners.
            </p>

        </div>

        <div class="landing-footer-bottom">

                <span>
                 © {{ date('Y') }} Avanor Capital. All Rights Reserved.
                </span>

            <div>
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
    <aside class="sticky-sidebar" aria-label="Registration Sidebar" id="side-form-lp">
        @include('partials.lead-form-wadeem')
    </aside>

        <a
            href="https://wa.me/971555342535?text=Hi%2C%20I%E2%80%99m%20interested%20to%20know%20more%20about%20Wadeem%20Gardens%20By%20%Aldar.%20Please%20share%20all%20relevant%20details.%0AThank%20you."
            class="landing-whatsapp-float whatsapp-track"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Chat on WhatsApp"
        >
            <svg width="44px" height="44px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"></path> <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"></path> <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"></path> <defs> <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse"> <stop stop-color="#5BD066"></stop> <stop offset="1" stop-color="#27B43E"></stop> </linearGradient> </defs> </g></svg>
        </a>





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


{{--            <div class="enquiry-popup-content">--}}




{{--                <div class="enquiry-popup-form enquiry-popup-dialog">--}}

                    @include('partials.lead-form-wadeem')

{{--                </div>--}}

{{--            </div>--}}

        </div>

    </div>

</main>

@endsection
@push('scripts')
    @vite('resources/js/landing/wadeem.js')

@endpush
