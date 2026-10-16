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
@push('favicon')
    <link rel="icon" type="image/png"
          href="{{ asset('assets/img/landing/mareva/favicon.svg') }}">
@endpush

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

@section('canonical', 'https://mareva.sales-centre.net')


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

'url' => 'https://the-oasis.sales-centre.net',
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
'url' => 'https://the-oasis.sales-centre.net',
];
}
@endphp


@push('structured-data')

<script type="application/ld+json">
    {!! json_encode(
        $propertySchema,
        JSON_UNESCAPED_SLASHES
        | JSON_UNESCAPED_UNICODE
        | JSON_PRETTY_PRINT
    ) !!}
</script>

@endpush
@push('styles')
@vite('resources/css/landing/mareva.css')
@endpush

@section('content')

<div class="oasis-release-banner" id="oasisReleaseBanner">
    <div class="oasis-release-banner__content">
        <span class="oasis-release-banner__label" id="oasisReleaseLabel">
            EXCLUSIVE RELEASE
        </span>

        <span class="oasis-release-banner__divider">·</span>

        <span class="oasis-release-banner__description" id="oasisReleaseDescription">
            Address Tierra & Palace Ostra villas
        </span>

        <span class="oasis-release-banner__divider oasis-release-banner__date-divider">·</span>

        <span class="oasis-release-banner__date" id="oasisReleaseDate">
            BOOKINGS OPENS 19 OCTOBER
        </span>

        <a
            href="#"
            class="oasis-release-banner__cta"
            data-lead-popup-open>
            Register for Priority Access
            <span aria-hidden="true">→</span>
        </a>
    </div>
</div>

<header class="landing-header">
    <div class="landing-header-inner">


        <a href="#home" class="landing-logo">
            <img
                src="{{ asset('assets/img/landing/mareva/mareva-logo.svg') }}"
                alt="Avanor">
        </a>
        <nav class="landing-nav">


            <a href="#about">
                Property Details
            </a>

            <a href="#amenities">
                Amenities
            </a>

            <a href="#gallery">
                Gallery
            </a>

            <a href="#location">
                Location
            </a>
            <a href="#" data-lead-popup-open>contact</a>
        </nav>
        <div class="landing-header-actions">



            <a
                href="#"
                class="landing-header-btn " data-lead-popup-open>
                GET LATEST PRICES
            </a>
            <button
                type="button"
                class="landing-menu-toggle"
                id="landingMenuToggle"
                aria-label="Open menu"
                aria-expanded="false">

                <span></span>
                <span></span>
                <span></span>

            </button>

        </div>

    </div>

    <div
        class="landing-mobile-menu"
        id="landingMobileMenu">

        <nav class="landing-mobile-nav">

            <a href="#home">Home</a>

            <a href="#about">
                Property Details
            </a>





            <a href="#location">Location</a>

            <a href="#amenities">
                Amenities
            </a>

            <a href="#gallery">
                Gallery
            </a>

            <a href="#" data-lead-popup-open>contact</a>

            <a
                href="#"
                class="landing-mobile-contact " data-lead-popup-open>
                GET LATEST PRICES


            </a>

        </nav>

    </div>

</header>

<main>

    @if ($coverMedia)

    <section class="avanor-property-hero" id="home">

        <div class="avanor-property-hero-single">

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

                class="avanor-property-hero-image"

                fetchpriority="high"
                decoding="async">

            {{-- DARK OVERLAY --}}
            <div class="avanor-property-hero-overlay"></div>


            {{-- HERO CONTENT --}}
            <div class="avanor-property-slide-content-landing">


                <h1 class="avanor-property-slide-title" id="dynamic-ad-h1">
                    Mareva at The Oasis by Emaar
                </h1>

                <p class="avanor-property-slide-description" id="dynamic-ad-p">

                </p>




                <div class="landing-hero-highlights">

                    <div class="landing-hero-highlight-item">
                        <span class="landing-hero-highlight-icon" aria-hidden="true">✓</span>
                        <span>4, 5 &amp; 6-bedroom villas, plus a limited branded 5-bedroom collection</span>
                    </div>

                    <div class="landing-hero-highlight-item">
                        <span class="landing-hero-highlight-icon" aria-hidden="true">✓</span>
                        <span>Swimmable lagoon, beaches and resort pools</span>
                    </div>

                    <div class="landing-hero-highlight-item">
                        <span class="landing-hero-highlight-icon" aria-hidden="true">✓</span>
                        <span>Golden Visa eligible</span>
                    </div>

                    <div class="landing-hero-highlight-actions">
                        <a href="#" class="landing-hero-btn c-white" data-lead-popup-open>
                            REGISTER YOUR INTEREST
                        </a>
                    </div>

                </div>



            </div>

        </div>

    </section>

    @endif


    <!-- <div
        class="landing-property-bar"
        id="landingPropertyBar">

        <div class="landing-property-bar-inner">

            <div class="landing-property-info">

                <span class="landing-property-developer">
                    {{ $property->developer?->name }}
                </span>

                <h1 class="landing-property-name">
                    {{ $property->title }}
                </h1>

            </div>

            <div class="landing-property-actions">
                <a
                    href="#"
                    class="landing-property-btn landing-property-btn-outline" data-lead-popup-open data-button-text="GET BROCHURE">
                    GET BROCHURE
                </a>

                <a
                    href="#"
                    class="landing-property-btn landing-property-btn-primary" data-lead-popup-open>
                    GET PAYMENT PLAN
                </a>

            </div>

        </div>

    </div> -->


    <section class="landing-mobile-form-section landing-about-v2">

        <div class="landing-gallery-container">

            <div class="landing-side-form-inner">




                @include('partials.lead-form-mareva', [

                'propertyId' => $property->id,
                'developerId' => $property->developer_id,
                'source' => 'mareva-mobile-form',
                ])



            </div>

        </div>
    </section>
    <div class="landing-content-with-form">

        <div class="landing-main-content">



            <section class="section-villas-showcase landing-about-v2" id="villa-comparison">
                <div class="landing-gallery-container">

                    <div class="showcase-header">
                        <span class="landing-about-v2-eyebrow">Two ways to live at The Oasis</span>

                        <h2 class="landing-about-v2-title">
                            Find Your Villa at The Oasis
                        </h2>
                    </div>

                    <div class="villa-comparison-grid">

                        <!-- Mareva -->
                        <div class="villa-comparison-card">
                            <h3>Mareva</h3>

                            <p class="villa-comparison-subtitle">
                                4, 5 and 6-Bedroom Villas
                            </p>

                            <div class="villa-comparison-row">
                                <span>Bedrooms</span>
                                <strong>4, 5 and 6</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Built-up area</span>
                                <strong>~7,250 to ~13,000 sq ft</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Plot area</span>
                                <strong>On request</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Starting price</span>
                                <strong>From AED 13.47M</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Payment plan</span>
                                <strong>On request</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Highlights</span>
                                <strong>Three architectural styles, basement and rooftop options</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Status</span>
                                <strong>Available now</strong>
                            </div>

                            <button
                                type="button"
                                class="avanor-lead-submit"
                                data-lead-popup-open
                                data-lead-source="mareva-prices-cta">
                                Get Mareva Prices
                            </button>
                        </div>

                        <!-- Address Tierra & Palace Ostra -->
                        <div class="villa-comparison-card">
                            <span class="villa-tag">NEW RELEASE</span>

                            <h3>Address Tierra &amp; Palace Ostra</h3>

                            <p class="villa-comparison-subtitle">
                                5-Bedroom Branded Villas
                            </p>

                            <div class="villa-comparison-row">
                                <span>Bedrooms</span>
                                <strong>5 + basement</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Built-up area</span>
                                <strong>7,922–10,394 sq ft</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Plot area</span>
                                <strong>8,281–17,113 sq ft</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Starting price</span>
                                <strong>From AED 17.6M</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Payment plan</span>
                                <strong>4 years, from 10% in 2026</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Highlights</span>
                                <strong>Address or Palace branded living, World Class Living</strong>
                            </div>

                            <div class="villa-comparison-row">
                                <span>Status</span>
                                <strong>Booking opens 19 October</strong>
                            </div>

                            <button
                                type="button"
                                class="avanor-lead-submit"
                                data-lead-popup-open
                                data-lead-source="oasis-branded-villas-priority-access">
                                Register for Priority Access
                            </button>
                        </div>

                    </div>

                    <p class="villa-comparison-note">
                        Looking for 5 bedrooms with a basement? Both collections offer it. Our
                        advisors will compare them side by side: brand, space, plot and price.
                    </p>

                </div>
            </section>




            <section class="section-villas-showcase landing-about-v2" id="about">
                <div class="landing-gallery-container">

                    <div class="showcase-header">
                        <span class="landing-about-v2-eyebrow">
                            LIMITED COLLECTION AT THE OASIS
                        </span>

                        <h2 class="landing-about-v2-title">
                            Address &amp; Palace Branded Villas at The Oasis
                        </h2>

                        <p class="branded-release-subtitle">
                            An exclusive collection of limited branded villas
                        </p>
                    </div>

                    <div class="branded-release-layout">


                        <div class="branded-release-description">
                            <p>
                                Emaar opens bookings on 19 October for a limited collection of
                                Address Tierra and Palace Ostra villas at The Oasis: 5-bedroom
                                homes with basements, built-up areas of 7,922–10,394 sq ft, and
                                plots of up to 17,113 sq ft. They bring the design and service
                                standards of two of Emaar’s signature hospitality brands to
                                resort-style villa living.
                            </p>

                            <div class="branded-release-key-facts">
                                <h3>Key Facts</h3>

                                <div class="branded-release-fact">
                                    <span>Villas</span>
                                    <strong>5 bedrooms + basement</strong>
                                </div>

                                <div class="branded-release-fact">
                                    <span>Built-up area</span>
                                    <strong>7,922–10,394 sq ft</strong>
                                </div>

                                <div class="branded-release-fact">
                                    <span>Plot area</span>
                                    <strong>8,281–17,113 sq ft</strong>
                                </div>

                                <div class="branded-release-fact">
                                    <span>Prices</span>
                                    <strong>From AED 17.6M</strong>
                                </div>

                                <div class="branded-release-fact">
                                    <span>Payment plan</span>
                                    <strong>4 years, starting with 10% in 2026</strong>
                                </div>
                            </div>
                        </div>



                        <div class="branded-release-details">

                            <!-- Price list -->
                            <div class="branded-release-item">
                                <span class="branded-release-lock" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="20" height="20"
                                        fill="none" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="5" y="10" width="14" height="11" rx="2"></rect>
                                        <path d="M8 10V7a4 4 0 0 1 8 0v3"></path>
                                    </svg>
                                </span>

                                <div>
                                    <h3>Price list</h3>
                                    <p>Every villa and plot, from AED 17.6M to AED 24.7M</p>
                                </div>
                            </div>

                            <!-- Floor plans -->
                            <div class="branded-release-item">
                                <span class="branded-release-lock" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="20" height="20"
                                        fill="none" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="5" y="10" width="14" height="11" rx="2"></rect>
                                        <path d="M8 10V7a4 4 0 0 1 8 0v3"></path>
                                    </svg>
                                </span>

                                <div>
                                    <h3>Floor plans</h3>
                                    <p>Address Tierra and Palace Ostra layouts</p>
                                </div>
                            </div>

                            <!-- Payment schedule -->
                            <div class="branded-release-item">
                                <span class="branded-release-lock" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="20" height="20"
                                        fill="none" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="5" y="10" width="14" height="11" rx="2"></rect>
                                        <path d="M8 10V7a4 4 0 0 1 8 0v3"></path>
                                    </svg>
                                </span>

                                <div>
                                    <h3>Payment schedule</h3>
                                    <p>The complete payment plan, broken down year by year</p>
                                </div>
                            </div>

                            <!-- Plot availability -->
                            <div class="branded-release-item">
                                <span class="branded-release-lock" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="20" height="20"
                                        fill="none" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="5" y="10" width="14" height="11" rx="2"></rect>
                                        <path d="M8 10V7a4 4 0 0 1 8 0v3"></path>
                                    </svg>
                                </span>

                                <div>
                                    <h3>Plot availability</h3>
                                    <p>Available villas and their individual plot sizes</p>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="branded-release-action">
                        <button
                            type="button"
                            class="btn-villa-primary"
                            data-lead-popup-open
                            data-lead-source="oasis-branded-villas-priority-access">

                            Register for Priority Access

                            <span aria-hidden="true">→</span>
                        </button>
                    </div>

                </div>
            </section>




            <section class="section-villas-showcase landing-about-v2" id="properties">
                <div class="landing-gallery-container">

                    {{-- Section Header --}}
                    <div class="showcase-header">
                        <span class="landing-about-v2-eyebrow">THE OASIS · MAREVA</span>

                        <h2 class="landing-about-v2-title">
                            Mareva: Your Secluded Lagoon Escape
                        </h2>

                        <p class="showcase-description">
                            Resort-inspired pools, calm bays and palm-lined paths.
                            Mareva is The Oasis’s lagoon-front villa community, with
                            homes in three architectural styles: Chamfer, Contemporary
                            and Classic.
                        </p>
                    </div>

                    {{-- Villa Collection --}}
                    <h3 class="mareva-section-title">
                        Mareva 4, 5 &amp; 6-Bedroom Villas
                    </h3>

                    <div class="villas-grid">

                        {{-- 4 Bedroom Villa --}}
                        <div class="villa-card">
                            <div class="villa-image-wrapper">
                                <img
                                    src="{{ asset('assets/img/landing/mareva/MAREVA_OASIS_BR4.webp') }}"
                                    alt="4 Bedroom Mareva Villa"
                                    class="villa-image"
                                    loading="lazy">

                                <span class="villa-tag">4 BEDROOMS</span>
                            </div>

                            <div class="villa-content">
                                <h3 class="villa-name">4 Bedroom Villa</h3>

                                <p class="villa-subtext">
                                    A spacious lagoon-front residence.
                                </p>

                                <div class="villa-specs-grid">
                                    <div class="spec-box">
                                        <span class="spec-label">VILLA SIZE</span>
                                        <span class="spec-value">~7,250 sq ft</span>
                                    </div>

                                    <div class="spec-box">
                                        <span class="spec-label">HIGHLIGHT</span>
                                        <span class="spec-value">Basement level</span>
                                    </div>
                                </div>

                                <div class="villa-actions">
                                    <button
                                        type="button"
                                        class="btn-villa-primary"
                                        data-lead-popup-open
                                        data-lead-source="mareva-4-bedroom-villa">
                                        Get Price
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- 5 Bedroom Villa --}}
                        <div class="villa-card">
                            <div class="villa-image-wrapper">
                                <img
                                    src="{{ asset('assets/img/landing/mareva/MAREVA_OASIS_BR5.webp') }}"
                                    alt="5 Bedroom Mareva Villa"
                                    class="villa-image"
                                    loading="lazy">

                                <span class="villa-tag">5 BEDROOMS</span>
                            </div>

                            <div class="villa-content">
                                <h3 class="villa-name">5 Bedroom Villa</h3>

                                <p class="villa-subtext">
                                    Generous living spaces with a rooftop terrace.
                                </p>

                                <div class="villa-specs-grid">
                                    <div class="spec-box">
                                        <span class="spec-label">VILLA SIZE</span>
                                        <span class="spec-value">~7,970–8,100 sq ft</span>
                                    </div>

                                    <div class="spec-box">
                                        <span class="spec-label">HIGHLIGHT</span>
                                        <span class="spec-value">Rooftop terrace</span>
                                    </div>
                                </div>

                                <div class="villa-actions">
                                    <button
                                        type="button"
                                        class="btn-villa-primary"
                                        data-lead-popup-open
                                        data-lead-source="mareva-5-bedroom-villa">
                                        Get Price
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- 5 Bedroom Villa with Basement --}}
                        <div class="villa-card">
                            <div class="villa-image-wrapper">
                                <img
                                    src="{{ asset('assets/img/landing/mareva/MAREVA_OASIS_BR5Basement.webp') }}"
                                    alt="5 Bedroom Mareva Villa with Basement"
                                    class="villa-image"
                                    loading="lazy">

                                <span class="villa-tag">5 BEDROOMS + BASEMENT</span>
                            </div>

                            <div class="villa-content">
                                <h3 class="villa-name">5 Bedroom with Basement</h3>

                                <p class="villa-subtext">
                                    Additional space with basement and rooftop.
                                </p>

                                <div class="villa-specs-grid">
                                    <div class="spec-box">
                                        <span class="spec-label">VILLA SIZE</span>
                                        <span class="spec-value">~10,300–10,400 sq ft</span>
                                    </div>

                                    <div class="spec-box">
                                        <span class="spec-label">HIGHLIGHT</span>
                                        <span class="spec-value">Basement + rooftop</span>
                                    </div>
                                </div>

                                <div class="villa-actions">
                                    <button
                                        type="button"
                                        class="btn-villa-primary"
                                        data-lead-popup-open
                                        data-lead-source="mareva-5-bedroom-basement-villa">
                                        Get Price
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- 6 Bedroom Villa --}}
                        <div class="villa-card">
                            <div class="villa-image-wrapper">
                                <img
                                    src="{{ asset('assets/img/landing/mareva/MAREVA_OASIS_BR6.webp') }}"
                                    alt="6 Bedroom Mareva Villa"
                                    class="villa-image"
                                    loading="lazy">

                                <span class="villa-tag">6 BEDROOMS</span>
                            </div>

                            <div class="villa-content">
                                <h3 class="villa-name">6 Bedroom Villa</h3>

                                <p class="villa-subtext">
                                    An expansive residence with basement and rooftop.
                                </p>

                                <div class="villa-specs-grid">
                                    <div class="spec-box">
                                        <span class="spec-label">VILLA SIZE</span>
                                        <span class="spec-value">~12,800–13,000 sq ft</span>
                                    </div>

                                    <div class="spec-box">
                                        <span class="spec-label">HIGHLIGHT</span>
                                        <span class="spec-value">Basement + rooftop</span>
                                    </div>
                                </div>

                                <div class="villa-actions">
                                    <button
                                        type="button"
                                        class="btn-villa-primary"
                                        data-lead-popup-open
                                        data-lead-source="mareva-6-bedroom-villa">
                                        Get Price
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Collection Pricing CTA --}}
                    <div class="mareva-pricing-cta">
                        <div class="mareva-pricing-copy">
                            <span class="landing-about-v2-eyebrow eyebrow-white">
                                THE MAREVA COLLECTION
                            </span>

                            <h3>Find Your Ideal Villa</h3>

                            <p>
                                From <strong>AED 13.47M</strong>.
                                Get the price for each layout.
                            </p>
                        </div>

                        <a
                            href="#"
                            class="landing-header-btn c-white"
                            data-lead-popup-open
                            data-lead-source="mareva-prices-cta">
                            GET MAREVA PRICES
                            <span aria-hidden="true">→</span>
                        </a>
                    </div>

                </div>
            </section>


            @php
            $locked = [
            ['Address Tierra & Palace Ostra price list', 'Every layout and style'],
            ['Mareva price list', 'Exclusive launch pricing for branded villas'],
            ['Floor plans', 'All villa types and layouts'],
            ['Payment plans', 'Full payment schedules'],
            ['Live availability', 'Current unit and floor availability'],
            ];
            @endphp

            <section class="landing-about-v2 rv-lock-section" id="locked-details">
                <div class="landing-gallery-container">

                    <div class="showcase-header">
                        <span class="landing-about-v2-eyebrow">UNLOCK · MAREVA</span>

                        <h2 class="landing-about-v2-title">
                            Prices, Floor Plans & Payment Plans
                        </h2>


                    </div>

                    <div class="rv-lock__grid">
                        @foreach ($locked as [$heading, $text])
                        <article class="rv-lock__card">

                            <div class="rv-lock__head">
                                <span class="rv-lock__badge" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="22" height="22"
                                        fill="none" stroke="currentColor" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="4" y="11" width="16" height="10" rx="2" />
                                        <path d="M8 11V8a4 4 0 0 1 8 0v3" />
                                    </svg>
                                </span>

                                <h3 class="rv-lock__heading">{{ $heading }}</h3>
                            </div>

                            <p class="rv-lock__text">{{ $text }}</p>

                            <div class="rv-lock__preview" aria-hidden="true">
                                <span></span><span></span><span></span>
                            </div>

                        </article>
                        @endforeach

                        {{-- Sixth card: Unlock details --}}
                        <a href="#"
                            class="rv-lock__card rv-lock__card--unlock rv-lock__card--clickable"
                            data-lead-popup-open
                            data-lead-source="mareva_unlock_details"
                            aria-label="Unlock the Details">

                            <span class="rv-lock__unlock-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" width="34" height="34"
                                    fill="none" stroke="currentColor" stroke-width="1.6"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="4" y="11" width="16" height="10" rx="2" />
                                    <path d="M8 11V8a4 4 0 0 1 8 0" />
                                    <circle cx="12" cy="16" r="1" />
                                    <path d="M12 17v1" />
                                </svg>
                            </span>

                            <h3 class="rv-lock__unlock-title">Unlock the Details</h3>

                        </a>
                    </div>

                </div>
            </section>



            <section class="landing-amenities-v2 landing-about-v2" id="amenities">

                <div class="landing-gallery-container">

                    <div class="showcase-header">
                        <span class="landing-about-v2-eyebrow eyebrow-white">AMENITIES · MAREVA</span>

                        <h2 class="landing-about-v2-title fwhite">
                            Resort Living at The Oasis
                        </h2>


                    </div>

                    @php


                    $amenityGroups = [

                    'water' => [
                    'label' => 'Water & Beach Lifestyle',
                    'items' => [
                    ['water', 'Swimmable Lagoon', 'A stunning lagoon designed for swimming and waterfront leisure'],
                    ['beach', 'Beaches', 'Relax along beautiful sandy beaches and enjoy coastal living'],
                    ['swimming', 'Swimming Pools', 'Enjoy refreshing swims and relaxed moments by the pool'],
                    ],
                    ],

                    'wellness' => [
                    'label' => 'Wellness & Sport',
                    'items' => [
                    ['leaf', 'Spa & Wellness', 'Spaces dedicated to relaxation, rejuvenation and well-being'],
                    ['sports-court', 'Sports Courts', 'Facilities for active recreation and friendly competition'],
                    ['dumbbell', 'Fitness Facilities', 'Stay active with dedicated fitness and exercise spaces'],
                    ['jogging', 'Jogging Tracks', 'Scenic routes for daily runs and outdoor exercise'],
                    ['bicycle', 'Cycling Tracks', 'Dedicated routes for cycling and active outdoor living'],
                    ],
                    ],

                    'family' => [
                    'label' => 'Family & Community',
                    'items' => [
                    ['kids-play', 'Parks & Playgrounds', 'Open green spaces and play areas for families and children'],
                    ['school', 'Schools', 'Convenient access to educational facilities'],
                    ['building-2', 'Community Centre', 'A welcoming hub for activities and resident connections'],
                    ['home', 'Clubhouse', 'A shared space for leisure, socialising and community gatherings'],
                    ['shopping-bag', 'Retail', 'Everyday shopping and convenient retail destinations'],
                    ],
                    ],

                    ];


                    @endphp

                    <div class="amenities-filter-bar">
                        @foreach ($amenityGroups as $key => $group)
                        <button class="filter-btn {{ $loop->first ? 'active' : '' }}" data-filter="{{ $key }}">
                            {{ $group['label'] }}
                        </button>
                        @endforeach
                    </div>

                    <div class="bento-amenities-grid">
                        @foreach ($amenityGroups as $key => $group)
                        @foreach ($group['items'] as [$icon, $name, $desc])
                        <div class="bento-card {{ $loop->parent->first ? '' : 'is-hidden' }}" data-category="{{ $key }}">
                            <div class="bento-icon-wrapper">
                                <x-landing-icon name="{{ $icon }}" />
                            </div>
                            <div class="bento-content">
                                <h3>{{ $name }}</h3>
                                @if ($desc)
                                <p>{{ $desc }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>

                </div>

            </section>











            <section class="landing-gallery-section landing-about-v2" id="gallery">

                <div class="landing-gallery-container">



                    @if ($galleryImages->isNotEmpty())

                    <section class="landing-project-gallery " id="gallery">

                        <div class="landing-payment-heading">

                            <span class="landing-about-v2-eyebrow">
                                EXPLORE THE OASIS
                            </span>

                            <h2 class="landing-about-v2-title">
                                A Closer Look at The Oasis
                            </h2>

                        </div>


                        <div
                            class="landing-project-gallery-grid"
                            id="landingProjectGallery">

                            @foreach ($galleryImages as $image)

                            @php
                            $thumbnailUrl = \App\Support\MediaUrl::fromMedia(
                            $image,
                            'gallery_tablet_avif'
                            );

                            $fullImageUrl = \App\Support\MediaUrl::fromMedia(
                            $image,
                            'gallery_avif'
                            );
                            @endphp

                            <button
                                type="button"
                                class="landing-project-gallery-item"
                                data-gallery-index="{{ $loop->index }}"
                                data-gallery-src="{{ $fullImageUrl }}"
                                aria-label="Open gallery image {{ $loop->iteration }}">

                                <img
                                    src="{{ $thumbnailUrl }}"
                                    srcset="
                            {{ \App\Support\MediaUrl::fromMedia($image, 'gallery_mobile_avif') }} 768w,
                            {{ \App\Support\MediaUrl::fromMedia($image, 'gallery_tablet_avif') }} 1280w
                        "
                                    sizes="
                            (max-width: 767px) 100vw,
                            (max-width: 991px) 50vw,
                            33vw
                        "
                                    alt="{{ $property->project?->name ?? $property->title }} - Gallery image {{ $loop->iteration }}"
                                    loading="lazy"
                                    decoding="async">

                                <span class="landing-project-gallery-overlay"></span>

                            </button>

                            @endforeach

                        </div>

                    </section>


                    {{-- =====================================================
                                        GALLERY LIGHTBOX
                                    ===================================================== --}}

                    <div
                        class="landing-gallery-lightbox"
                        id="landingGalleryLightbox"
                        role="dialog"
                        aria-modal="true"
                        aria-label="Project gallery"
                        aria-hidden="true">

                        <button
                            type="button"
                            class="landing-gallery-lightbox-close"
                            id="landingGalleryLightboxClose"
                            aria-label="Close gallery">
                            ×
                        </button>


                        @if ($galleryImages->count() > 1)

                        <button
                            type="button"
                            class="landing-gallery-lightbox-arrow landing-gallery-lightbox-prev"
                            id="landingGalleryLightboxPrev"
                            aria-label="Previous image">

                            <x-landing-icon name="chevron-left" />

                        </button>

                        @endif


                        <div class="landing-gallery-lightbox-content">

                            <img
                                src=""
                                alt=""
                                id="landingGalleryLightboxImage">

                            <div
                                class="landing-gallery-lightbox-counter"
                                id="landingGalleryLightboxCounter">
                            </div>

                        </div>


                        @if ($galleryImages->count() > 1)

                        <button
                            type="button"
                            class="landing-gallery-lightbox-arrow landing-gallery-lightbox-next"
                            id="landingGalleryLightboxNext"
                            aria-label="Next image">

                            <x-landing-icon name="chevron-right" />

                        </button>

                        @endif

                    </div>

                    @endif


                    <div class="landing-payment-actions">

                        <button
                            type="button"
                            class="landing-payment-btn landing-payment-btn-outline"
                            data-lead-popup-open
                            data-request-type="payment-plan">

                            GET GALLERY BROCHURE

                        </button>



                    </div>

                </div>
            </section>


            <section class="landing-payment-plan landing-about-v2" id="location">

                <div class="landing-gallery-container">

                    <div class="landing-payment-heading">

                        <span class="landing-about-v2-eyebrow">
                            LOCATION & CONNECTIVITY
                        </span>

                        <h2 class="landing-about-v2-title">
                            The Oasis Location
                        </h2>

                        <p class="landing-about-v2-description mb-lg">
                            Strategically located off Emirates Road and Sheikh Zayed
                            Bin Hamdan Al Nahyan Street, The Oasis offers convenient
                            access to key destinations across Dubai.
                        </p>

                    </div>

                    {{-- Drive Times --}}
                    <div class="landing-reach__locations">

                        {{-- Al Maktoum Airport --}}
                        <div class="landing-reach__location">
                            <div class="landing-reach__location-time">
                                <strong>18</strong>
                                <span>MINS</span>
                            </div>

                            <div class="landing-reach__location-place">
                                <strong>Al Maktoum International Airport</strong>
                            </div>
                        </div>

                        {{-- Dubai Hills --}}
                        <div class="landing-reach__location">
                            <div class="landing-reach__location-time">
                                <strong>20</strong>
                                <span>MINS</span>
                            </div>

                            <div class="landing-reach__location-place">
                                <strong>Dubai Hills Estate</strong>
                            </div>
                        </div>

                        {{-- Dubai Marina --}}
                        <div class="landing-reach__location">
                            <div class="landing-reach__location-time">
                                <strong>28</strong>
                                <span>MINS</span>
                            </div>

                            <div class="landing-reach__location-place">
                                <strong>Dubai Marina</strong>
                            </div>
                        </div>

                        {{-- Downtown Dubai --}}
                        <div class="landing-reach__location">
                            <div class="landing-reach__location-time">
                                <strong>35</strong>
                                <span>MINS</span>
                            </div>

                            <div class="landing-reach__location-place">
                                <strong>Downtown Dubai</strong>
                            </div>
                        </div>

                    </div>

                    <p class="landing-about-v2-description mt-3">
                        *Drive times are approximate and may vary depending on traffic
                        conditions and the route taken.
                    </p>


                    <div class="contact-map">

                        <iframe
                            src="{{ $property->map_url }}"
                            title="Map showing The Heights location in Dubai South"
                            allowfullscreen
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>
                </div>

            </section>
            {{-- =====================================================
                    FAQ SECTION
                ===================================================== --}}

            <section class="landing-faq-section landing-about-v2" id="faq">

                <div class="landing-gallery-container">

                    <div class="row g-5 align-items-stretch">

                        <div class="col-lg-12 d-flex">


                            <div class="landing-payment-heading">

                                <span class="landing-about-v2-eyebrow">
                                    QUESTIONS ABOUT THE OASIS
                                </span>

                                <h2 class="landing-about-v2-title">
                                    Frequently Asked Questions
                                </h2>


                            </div>

                            {{-- FAQ 1 --}}
                            <details class="landing-faq-item">
                                <summary>
                                    <span>What is being released at The Oasis?</span>
                                    <span class="landing-faq-toggle" aria-hidden="true"></span>
                                </summary>

                                <div class="landing-faq-answer">
                                    <p>
                                        A limited collection of
                                        <strong>5-bedroom villas with basements</strong>
                                        under the <strong>Address Tierra</strong> and
                                        <strong>Palace Ostra</strong> brands. Booking opens
                                        on <strong>19 October</strong>.
                                    </p>
                                </div>
                            </details>

                            {{-- FAQ 2 --}}
                            <details class="landing-faq-item">
                                <summary>
                                    <span>How much do the branded villas cost?</span>
                                    <span class="landing-faq-toggle" aria-hidden="true"></span>
                                </summary>

                                <div class="landing-faq-answer">
                                    <p>
                                        Prices range from
                                        <strong>AED 17.6 million to AED 24.7 million</strong>,
                                        depending on the villa type and plot.
                                        Register with us for the latest price list and availability.
                                    </p>
                                </div>
                            </details>

                            {{-- FAQ 3 --}}
                            <details class="landing-faq-item">
                                <summary>
                                    <span>What is the payment plan for the branded villas?</span>
                                    <span class="landing-faq-toggle" aria-hidden="true"></span>
                                </summary>

                                <div class="landing-faq-answer">
                                    <p>
                                        The payment schedule is spread over
                                        <strong>four years</strong>, starting with a
                                        <strong>10% payment in 2026</strong>.
                                        Register to receive the complete installment schedule.
                                    </p>
                                </div>
                            </details>

                            {{-- FAQ 4 --}}
                            <details class="landing-faq-item">
                                <summary>
                                    <span>What is the starting price of Mareva?</span>
                                    <span class="landing-faq-toggle" aria-hidden="true"></span>
                                </summary>

                                <div class="landing-faq-answer">
                                    <p>
                                        <strong>Mareva villas start from AED 13.47 million.</strong>
                                        Prices vary depending on the villa type, layout and plot.
                                    </p>
                                </div>
                            </details>

                            {{-- FAQ 5 --}}
                            <details class="landing-faq-item">
                                <summary>
                                    <span>Should I choose a branded villa or Mareva?</span>
                                    <span class="landing-faq-toggle" aria-hidden="true"></span>
                                </summary>

                                <div class="landing-faq-answer">
                                    <p>
                                        Both offer <strong>5-bedroom villas with basements</strong>.
                                        Address Tierra and Palace Ostra offer branded hospitality-inspired
                                        living and larger plots, while Mareva has a lower entry price
                                        and additional <strong>4- and 6-bedroom options</strong>.
                                    </p>
                                </div>
                            </details>

                            {{-- FAQ 6 --}}
                            <details class="landing-faq-item">
                                <summary>
                                    <span>Do these villas qualify for the UAE Golden Visa?</span>
                                    <span class="landing-faq-toggle" aria-hidden="true"></span>
                                </summary>

                                <div class="landing-faq-answer">
                                    <p>
                                        The advertised villas are presented as Golden Visa-eligible.
                                        Eligibility depends on the applicable UAE requirements,
                                        qualifying property value and ownership documentation.
                                        Please confirm your individual eligibility before purchasing.
                                    </p>
                                </div>
                            </details>

                            {{-- FAQ 7 --}}
                            <details class="landing-faq-item">
                                <summary>
                                    <span>When is the handover?</span>
                                    <span class="landing-faq-toggle" aria-hidden="true"></span>
                                </summary>

                                <div class="landing-faq-answer">
                                    <p>
                                        <strong>Mareva is expected to be handed over in 2030.</strong>
                                        For the expected handover date of Address Tierra and Palace Ostra,
                                        contact our team for the latest confirmed details.
                                    </p>
                                </div>
                            </details>

                        </div>

                    </div>

                </div>

            </section>



            <section class="landing-payment-plan landing-about-v2" id="payment-plan">

                <div class="landing-gallery-container">

                    <div class="landing-payment-heading">

                        <span class="landing-about-v2-eyebrow">
                            EXCLUSIVE OPPORTUNITY
                        </span>

                        <h2 class="landing-about-v2-title">
                            Why Register Now
                        </h2>



                        <p class="landing-about-v2-description mb-lg">
                            Get priority access to exclusive branded villas, flexible
                            payment options, available residences and eligibility details
                            for the UAE Golden Visa.
                        </p>

                    </div>

                    {{-- REGISTRATION BENEFITS --}}
                    <div class="landing-amenities-v2-highlights">

                        <div class="landing-amenities-v2-highlight">

                            <div class="landing-amenities-v2-highlight-icon">
                                <x-landing-icon name="star" />
                            </div>

                            <div>
                                <strong>Limited Inventory</strong>

                                <span>
                                    Address Tierra and Palace Ostra are a limited collection.
                                    Registered buyers hear first.
                                </span>
                            </div>

                        </div>

                        <div class="landing-amenities-v2-highlight">

                            <div class="landing-amenities-v2-highlight-icon">
                                <x-landing-icon name="payment" />
                            </div>

                            <div>
                                <strong>An Easy Start</strong>

                                <span>
                                    Start with just 10% in 2026, with the remaining payments
                                    spread over the following three years.
                                </span>
                            </div>

                        </div>

                        <div class="landing-amenities-v2-highlight">

                            <div class="landing-amenities-v2-highlight-icon">
                                <x-landing-icon name="retail" />
                            </div>

                            <div>
                                <strong>A Choice of Villas</strong>

                                <span>
                                    Explore Mareva’s 4–6 bedroom villas, available now
                                    from AED 13.47M.
                                </span>
                            </div>

                        </div>

                        <div class="landing-amenities-v2-highlight">

                            <div class="landing-amenities-v2-highlight-icon">
                                <x-landing-icon name="masterplan" />
                            </div>

                            <div>
                                <strong>Golden Visa Eligibility</strong>

                                <span>
                                    Every villa qualifies for 10-year UAE residency,
                                    subject to applicable eligibility requirements.
                                </span>
                            </div>

                        </div>

                    </div>

                    <div class="landing-payment-actions">

                        <button
                            type="button"
                            class="landing-payment-btn landing-payment-btn-outline"
                            data-lead-popup-open
                            data-request-type="payment-plan">

                            REGISTER FOR PRIORITY ACCESS

                        </button>

                    </div>

                </div>

            </section>
            <section class="landing-developer-community landing-about-v2 " id="developer">

                <div class="landing-gallery-container">



                    <div class="landing-developer-panel">

                        <span class="  landing-about-v2-eyebrow">
                            ABOUT THE DEVELOPER
                        </span>

                        <h2 class=" landing-about-v2-title">
                            Emaar Properties
                        </h2>

                        <div class="landing-developer-copy">

                      
                            <p>
                                Mareva at The Oasis by Emaar Properties offers an exclusive
                                collection of luxury villas in Dubai, designed for refined
                                living with spacious layouts, elegant architecture and
                                beautifully landscaped surroundings.

                                Featuring 4–6 bedroom villas, Mareva combines contemporary
                                design, tranquil waterfront surroundings and resort-inspired
                                amenities within one of Dubai’s most sought-after villa
                                communities.
                            </p>
                            

                        </div>


                        {{-- Developer Highlights --}}
                        <div class="landing-developer-highlights">

                            <div class="landing-developer-highlight">

                                <div class="landing-developer-highlight-icon">
                                    <x-landing-icon name="home" />
                                </div>

                                <strong>Global Leader</strong>

                                <span>in Real Estate</span>

                            </div>


                            <div class="landing-developer-highlight">

                                <div class="landing-developer-highlight-icon">
                                    <x-landing-icon name="shield" />
                                </div>

                                <strong>Proven</strong>

                                <span>Track Record</span>

                            </div>


                            <div class="landing-developer-highlight">

                                <div class="landing-developer-highlight-icon">
                                    <x-landing-icon name="users" />
                                </div>

                                <strong>Premium</strong>

                                <span>Communities</span>

                            </div>


                            <div class="landing-developer-highlight">

                                <div class="landing-developer-highlight-icon">
                                    <x-landing-icon name="calendar" />
                                </div>

                                <strong>40+ Years</strong>

                                <span>of Excellence</span>

                            </div>

                        </div>

                    </div>


                    {{-- =====================================================
                        RIGHT — COMMUNITY
                    ===================================================== --}}




                </div>






            </section>


        </div>





        <aside class="landing-side-form" id="landingSideForm">

            <div class="landing-side-form-inner">

                @include('partials.lead-form-mareva', [
                'formId' => 'mareva-floating-form',
                'heading' => 'Get Launch Prices & Availability',
                'source' => 'mareva_floating_side_form',
                'buttonText' => 'SUBMIT',
                'propertyId' => $property->id,
                'developerId' => $property->developer_id,
                ])

            </div>

        </aside>

    </div>

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

            @include('partials.lead-form-mareva', [
            'formId' => 'landing-popup-form',
            'heading' => 'GET PROJECT DETAILS',
            'buttonText' => 'SUBMIT',

            'propertyId' => $property->id,
            'developerId' => $property->developer_id,
            'action' => route('landing.leads.store'),
            ])

        </div>

    </div>


    {{-- =====================================================
    DEVELOPER + COMMUNITY
===================================================== --}}


    <section class="landing-about-v2 oasis-priority-section" id="priority-access">
        <div class="landing-gallery-container">
            <div class="oasis-priority-container">

                {{-- Left Content --}}

                <div class="oasis-priority-content">



                    <span class="oasis-priority-eyebrow landing-about-v2-eyebrow eyebrow-white">
                        EXCLUSIVE LAUNCH ACCESS
                    </span>

                    <h2>Get Priority Access to The Oasis</h2>

                    <p class="oasis-priority-description ">
                        Price lists, floor plans and payment plans for Address Tierra, <br>Palace Ostra and Mareva, sent to your WhatsApp.
                    </p>

                    <a href="#priority-access-form" class="oasis-priority-cta">
                        Send Me the Details
                        <span aria-hidden="true">→</span>
                    </a>



                    <p class="oasis-priority-disclaimer">
                        Operated by Avanor Capital L.L.C, a licensed Dubai real estate
                        brokerage, and not the official website of the developer.
                        Project names and trademarks belong to their respective owners.
                        Prices and payment plans are subject to availability and developer terms.
                    </p>

                    <a href="{{ route('landing.privacy-policy') }}" class="oasis-priority-privacy">
                        Privacy Policy
                    </a>
                </div>

                {{-- Right Lead Form --}}
                <div class="oasis-priority-form" id="priority-access-form">
                    <div class="landing-side-form-inner">
                        @include('partials.lead-form-mareva', [
                        'formId' => 'mareva-footer-form',
                        'heading' => 'Get Launch Prices & Availability',
                        'source' => 'mareva_footer_form',
   
                        'propertyId' => $property->id,
                        'developerId' => $property->developer_id,
                        ])
                    </div>
                </div>

            </div>
        </div>
    </section>





    <section class="landing-developer-community landing-about-v2 footer-section" id="about-dev">

        <div class="landing-gallery-container">


            <div class="landing-footer-disclaimer">

                <strong>
                    DISCLAIMER
                </strong>

                <p>
                    This page is operated by Avanor Capital L.L.C, a licensed Dubai real estate brokerage, and is not the official website of the developer. Project names and trademarks belong to their respective owners.
                </p>
                <span class="keywords">emaar heights, emaar luxury villas, salva by emaar, serro by emaar, the heights country club, serro the heights, the heights country club and wellness, the heights emaar, the heights country club and wellness by emaar, salva the heights, serro the heights, the heights by emaar
                </span>
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
    {{-- =====================================================
            MAIN FOOTER
        ===================================================== --}}


    <a
        href="https://wa.me/971555342535?text=Hi%2C%20I%E2%80%99m%20interested%20to%20know%20more%20about%20Villas%20At%20The%20Oasis%20By%20Emaar.%20Please%20share%20all%20relevant%20details.%0AThank%20you."
        class="landing-whatsapp-float whatsapp-track"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Chat on WhatsApp">
        <svg width="44px" height="44px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"></path>
                <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"></path>
                <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"></path>
                <defs>
                    <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#5BD066"></stop>
                        <stop offset="1" stop-color="#27B43E"></stop>
                    </linearGradient>
                </defs>
            </g>
        </svg>
    </a>

</main>

@endsection
@push('scripts')
@vite('resources/js/landing/mareva.js')

@endpush