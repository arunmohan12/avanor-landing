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
    @vite('resources/css/landing/yas-riva.css')
@endpush

@section('content')

    <header class="landing-header">
        <div class="landing-header-inner">



            <a href="#home" class="landing-logo">
                <img
                    src="{{ asset('assets/img/landing/yas-riva/yas-riva-logo.webp') }}"
                    alt="Avanor">
            </a>
            <nav class="landing-nav">


                <a href="#about">
                    About
                </a>

                <a href="#downloads">
                    Properties
                </a>

                <a href="#gallery">
                    Gallery
                </a>
                <a href="#amenities">
                    Amenities
                </a>
                <a href="#location">
                    Location
                </a>
                <a href="#" data-lead-popup-open >contact</a>

                <a
                    href="#"
                    class="landing-header-btn btn-champagne btn-nav" data-lead-popup-open>
                    GET LATEST PRICES
                </a>



            </nav>

            <div class="landing-header-actions">


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

                <a href="#about">
                    About
                </a>

                <a href="#downloads">
                    Properties
                </a>

                <a href="#gallery">
                    Gallery
                </a>
                <a href="#amenities">
                    Amenities
                </a>
                <a href="#location">
                    Location
                </a>
                <a href="#" data-lead-popup-open >contact</a>

                <a
                    href="#"
                    class="landing-mobile-contact " data-lead-popup-open>
                    GET LATEST PRICES


                </a>

            </nav>

        </div>

    </header>

    <main>
        <div class="landing-content-with-form">

            <div class="landing-main-content">
                @if ($coverMedia)

                    <section class="avanor-property-hero" >

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

                <span class="avanor-property-slide-eyebrow">
                    {{ $property->developer?->name }}
                </span>

                                <h1 class="avanor-property-slide-title">
                                    {{ $property->title }}
                                </h1>

                                <p class="avanor-property-slide-description">
                                    Discover Yas Riva by Aldar, an exclusive waterfront villa community on Yas Island, Abu Dhabi. Choose from spacious <span class="ext-bold">4, 5 and 6 bedroom  standalone villas </span> designed around waterfront living, with selected residences offering private mooring options.
                                </p>


                                @if ($property->project?->starting_price)

                                    <div class="yas-riva-price">
                                        <span class="yas-riva-price-label">From</span>
                                        <span class="yas-riva-price-value">AED 7.9M</span>
                                    </div>

                                    <div class="yas-riva-payment-plan">

                                        <div class="yas-riva-payment-heading">
                                            <span>Payment Benefits</span>
                                        </div>

                                        <div class="yas-riva-payment-items">

                                            <div class="yas-riva-payment-item">
                                                <strong>5%</strong>
                                                <span>Down Payment</span>
                                            </div>

                                            <div class="yas-riva-payment-divider"></div>

                                            <div class="yas-riva-payment-item">
                                                <strong>5%</strong>
                                                <span>ADM Waiver</span>
                                            </div>

                                            <div class="yas-riva-payment-divider"></div>

                                            <div class="yas-riva-payment-item">
                                                <strong>5 Years</strong>
                                                <span>Service Charge Waiver</span>
                                            </div>

                                        </div>
                                        <a href="#enquiry" class="landing-property-cta" data-lead-popup-open>
                                            GET EARLY ACCESS
                                        </a>
                                    </div>

                                @endif

                            </div>

                        </div>

                    </section>

                @endif


                <div
                    class="landing-property-bar"
                    id="landingPropertyBar">

                    <div class="landing-property-bar-inner">

                        <div class="landing-property-info">





                        </div>

{{--                        <div class="landing-property-actions">--}}


{{--                            <a--}}
{{--                                href="#"--}}
{{--                                class="btn btn-champagne" data-lead-popup-open>--}}
{{--                                DOWNLOAD BROCHURE--}}
{{--                            </a>--}}

{{--                        </div>--}}

                    </div>

                </div>


                <section class="landing-mobile-form-section landing-about-v2" >

                    <div class="landing-gallery-container">

                        <div class="landing-side-form-inner">




                            @include('partials.lead-form', [
                           'formId' => 'landing-about-form',
                           'heading' => 'GET EARLY ACCESS',
                           'buttonText' => 'SUBMIT',
                       ])



                        </div>

                    </div>
                </section>

                <section class="landing-about-v2" id="about">

                    <div class="landing-gallery-container">

                        <div >


                            {{-- =====================================================
                            ABOUT CONTENT
                            ===================================================== --}}

                            <div class="landing-about-v2-content">

                <span class="landing-about-v2-eyebrow">
                    key highlights
                </span>

                                <h2 class="landing-about-v2-title">
                                     {{ $property->title }} at a Glance
                                </h2>







                                @if (filled($property->description))
                                    <p class="landing-about-v2-description">
                                        {!! $property->description !!}
                                    </p>
                                @endif





                                <div class="landing-reach">

                                    {{-- Heading --}}



                                    {{-- =====================================================
                                    6 PROJECT HIGHLIGHTS
                                    ===================================================== --}}

                                    <div class="landing-reach__features">


                                        {{-- 1 --}}
                                        <div class="landing-reach__feature">

                                            <div class="landing-reach__feature-icon">
                                                <x-landing-icon name="home" />
                                            </div>

                                            <h4>
                                                4–6 Bedroom Villas
                                            </h4>

                                            <p>
                                                Spacious standalone villas designed for refined family living.
                                            </p>

                                        </div>


                                        {{-- 2 --}}
                                        <div class="landing-reach__feature">

                                            <div class="landing-reach__feature-icon">
                                                <x-landing-icon name="diamond" />
                                            </div>

                                            <h4>
                                                From AED 7.9M
                                            </h4>

                                            <p>
                                                Explore available Yas Riva villas based on current inventory.
                                            </p>

                                        </div>


                                        {{-- 3 --}}
                                        <div class="landing-reach__feature">

                                            <div class="landing-reach__feature-icon">
                                                <x-landing-icon name="payment" />
                                            </div>

                                            <h4>
                                                5% Down Payment
                                            </h4>

                                            <p>
                                                Secure your Yas Riva villa with an initial 5% down payment.
                                            </p>

                                        </div>


                                        {{-- 4 --}}
                                        <div class="landing-reach__feature">

                                            <div class="landing-reach__feature-icon">
                                                <x-landing-icon name="beach" />
                                            </div>

                                            <h4>
                                                Waterfront Living
                                            </h4>

                                            <p>
                                                Selected villas offer canal-front living and private mooring options.
                                            </p>

                                        </div>


                                        {{-- 5 --}}
                                        <div class="landing-reach__feature">

                                            <div class="landing-reach__feature-icon">
                                                <x-landing-icon name="developer" />
                                            </div>

                                            <h4>
                                                Aldar Properties
                                            </h4>

                                            <p>
                                                Developed by Aldar, one of the UAE's established real estate developers.
                                            </p>

                                        </div>


                                        {{-- 6 --}}
                                        <div class="landing-reach__feature">

                                            <div class="landing-reach__feature-icon">
                                                <x-landing-icon name="location" />
                                            </div>

                                            <h4>
                                                Yas Island Location
                                            </h4>

                                            <p>
                                                Live close to Yas Island's entertainment, dining, leisure and lifestyle destinations.
                                            </p>

                                        </div>


                                    </div>


                                    {{-- =====================================================
                                    LOCATION BOXES
                                    ===================================================== --}}

{{--                                    <div class="landing-reach__locations">--}}


{{--                                        --}}{{-- Expo --}}
{{--                                        <div class="landing-reach__location">--}}

{{--                                            <div class="landing-reach__location-time">--}}
{{--                                                <strong>10</strong>--}}
{{--                                                <span>MINS</span>--}}
{{--                                            </div>--}}

{{--                                            <div class="landing-reach__location-place">--}}


{{--                                                <strong>--}}
{{--                                                    Expo City Dubai--}}
{{--                                                </strong>--}}

{{--                                            </div>--}}

{{--                                        </div>--}}


{{--                                        --}}{{-- Airport --}}
{{--                                        <div class="landing-reach__location">--}}

{{--                                            <div class="landing-reach__location-time">--}}
{{--                                                <strong>10</strong>--}}
{{--                                                <span>MINS</span>--}}
{{--                                            </div>--}}

{{--                                            <div class="landing-reach__location-place">--}}


{{--                                                <strong>--}}
{{--                                                    Al Maktoum Int’l Airport--}}
{{--                                                </strong>--}}

{{--                                            </div>--}}

{{--                                        </div>--}}


{{--                                        --}}{{-- Dubai Hills --}}
{{--                                        <div class="landing-reach__location">--}}

{{--                                            <div class="landing-reach__location-time">--}}
{{--                                                <strong>20</strong>--}}
{{--                                                <span>MINS</span>--}}
{{--                                            </div>--}}

{{--                                            <div class="landing-reach__location-place">--}}



{{--                                                <strong>--}}
{{--                                                    Dubai Hills Estate--}}
{{--                                                </strong>--}}

{{--                                            </div>--}}

{{--                                        </div>--}}


{{--                                        --}}{{-- Downtown --}}
{{--                                        <div class="landing-reach__location">--}}

{{--                                            <div class="landing-reach__location-time">--}}
{{--                                                <strong>30</strong>--}}
{{--                                                <span>MINS</span>--}}
{{--                                            </div>--}}

{{--                                            <div class="landing-reach__location-place">--}}


{{--                                                <strong>--}}
{{--                                                    Downtown Dubai--}}
{{--                                                </strong>--}}

{{--                                            </div>--}}

{{--                                        </div>--}}

{{--                                    </div>--}}

                                </div>

                            </div>




                        </div>

                    </div>

                </section>






                <section class="landing-about-v2" >

                    <div class="landing-gallery-container">

                        <div class="landing-plan-heading " >

                                                             <span class=" landing-about-v2-eyebrow">
                                                                   THE COLLECTION
                                                                         </span>

                            <h2 class="area-hardcoded landing-about-v2-title">
                                Discover  Villa Clusters
                            </h2>



                            <h3 class="fs-4" >
                                A collection of waterfront villas designed for refined island living, where contemporary architecture, natural surroundings and everyday leisure come together at Yas Riva on Yas Island.                            </h3>


                        </div>

                        <div class="row gx-30">


                            @if (
                            $activeSections->isNotEmpty() ||
                            $hasProjectDescription ||
                            $galleryImages->isNotEmpty() ||
                            $amenities->isNotEmpty() ||
                            filled($property->map_url)
                            )

                                <div class="col-xxl-12">

                                    <div class="overflow-hidden" id="about-sec">



                                        <div class="about-page-wrap">

                                            <div class="row gy-40 property-detail-row justify-content-between align-items-center landing-collection-desktop">

                                                @foreach ($activeSections as $section)

                                                    @php
                                                        $sectionImage = $section->getFirstMedia('section_image');

                                                        $sectionImageUrl = $sectionImage
                                                            ? \App\Support\MediaUrl::fromMedia(
                                                                $sectionImage,
                                                                'section_image_avif'
                                                            )
                                                            : null;
                                                    @endphp


                                                    {{-- IMAGE LEFT / TEXT RIGHT --}}
                                                    @if ($section->layout === 'image_left')

                                                        @if ($sectionImageUrl)

                                                            <div class="col-lg-6">

                                                                <div class="img-box3">

                                                                    <div class="img1">

                                                                        <img
                                                                            src="{{ $sectionImageUrl }}"
                                                                            alt="{{ $property->project?->name ?? $property->title }}"
                                                                            loading="lazy"
                                                                            decoding="async">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        @endif


                                                        @if (filled($section->title) || filled($section->content))

                                                            <div class="{{ $sectionImageUrl ? 'col-lg-6' : 'col-lg-12' }}">

                                                                <div class="title-area mb-0">

                                                                    @if (filled($section->title))

                                                                        <div>
                                                                                <h2 class="sub-title-dark">
                                                                                        {{ $section->title }}
                                                                                </h2>
                                                                        </div>

                                                                    @endif


                                                                    @if (filled($section->content))

                                                                        <div class="text-theme">
                                                                            {!! $section->content !!}
                                                                        </div>

                                                                    @endif

                                                                </div>


                                                                <div class="landing-section-cta cta-browse-project">

                                                                    <button
                                                                        type="button"
                                                                        class="landing-plan-button"
                                                                        data-lead-popup-open
                                                                        data-request-type="location-details">

                                                                        DOWNLOAD FLOOR PLAN & BROCHURE

                                                                    </button>

                                                                </div>

                                                            </div>

                                                        @endif


                                                        {{-- TEXT LEFT / IMAGE RIGHT --}}
                                                    @elseif ($section->layout === 'image_right')

                                                        @if (filled($section->title) || filled($section->content))

                                                            <div class="{{ $sectionImageUrl ? 'col-lg-6' : 'col-lg-12' }}">

                                                                <div class="title-area mb-0">

                                                                    @if (filled($section->title))

                                                                        <div>
                                <span class="sub-title-dark">
                                    {{ $section->title }}
                                </span>
                                                                        </div>

                                                                    @endif


                                                                    @if (filled($section->content))

                                                                        <div class="text-theme">
                                                                            {!! $section->content !!}
                                                                        </div>

                                                                    @endif

                                                                </div>


                                                                <div class="landing-section-cta cta-browse-project">

                                                                    <button
                                                                        type="button"
                                                                        class="landing-plan-button"
                                                                        data-lead-popup-open
                                                                        data-request-type="location-details">

                                                                        GET EARLY ACCESS

                                                                    </button>

                                                                </div>

                                                            </div>

                                                        @endif


                                                        @if ($sectionImageUrl)

                                                            <div class="col-lg-6">

                                                                <div class="img-box3">

                                                                    <div class="img1">

                                                                        <img
                                                                            src="{{ $sectionImageUrl }}"
                                                                            alt="{{ $property->project?->name ?? $property->title }}"
                                                                            loading="lazy"
                                                                            decoding="async">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        @endif


                                                        {{-- FULL WIDTH --}}
                                                    @elseif ($section->layout === 'full_width')

                                                        @if (filled($section->title) || filled($section->content))

                                                            <div class="col-lg-12">

                                                                <div class="title-area mb-0">

                                                                    @if (filled($section->title))

                                                                        <div>
                                <span class="sub-title-dark project-about-heading">
                                    {{ $section->title }}
                                </span>
                                                                        </div>

                                                                    @endif


                                                                    @if (filled($section->content))

                                                                        <div class="text-theme">
                                                                            {!! $section->content !!}
                                                                        </div>

                                                                    @endif

                                                                </div>

                                                            </div>

                                                        @endif

                                                    @endif

                                                @endforeach

                                            </div>



                                            <div class="landing-collection-mobile">

                                                @foreach ($activeSections as $section)

                                                    @php
                                                        $sectionImage = $section->getFirstMedia('section_image');

                                                        $sectionImageUrl = $sectionImage
                                                            ? \App\Support\MediaUrl::fromMedia(
                                                                $sectionImage,
                                                                'section_image_avif'
                                                            )
                                                            : null;
                                                    @endphp

                                                    <div class="landing-mobile-collection-item">

                                                        {{-- IMAGE --}}
                                                        @if ($sectionImageUrl)

                                                            <div class="landing-mobile-collection-image">

                                                                <img
                                                                    src="{{ $sectionImageUrl }}"
                                                                    alt="{{ $property->project?->name ?? $property->title }}"
                                                                    loading="lazy"
                                                                    decoding="async">

                                                            </div>

                                                        @endif


                                                        {{-- HEADING --}}
                                                        @if (filled($section->title))

                                                            <div class="landing-mobile-collection-heading">

                    <span class="sub-title-dark">
                        {{ $section->title }}
                    </span>

                                                            </div>

                                                        @endif


                                                        {{-- CONTENT --}}
                                                        @if (filled($section->content))

                                                            <div class="landing-mobile-collection-content">
                                                                {!! $section->content !!}
                                                            </div>

                                                        @endif


                                                        {{-- BUTTON --}}
                                                        @if ($section->layout !== 'full_width')

                                                            <div class="landing-mobile-collection-cta">

                                                                <button
                                                                    type="button"
                                                                    class="landing-plan-button"
                                                                    data-lead-popup-open
                                                                    data-request-type="location-details">

                                                                    GET EARLY ACCESS

                                                                </button>

                                                            </div>

                                                        @endif

                                                    </div>

                                                @endforeach

                                            </div>

                                        </div>



                                    </div>

                                </div>

                            @endif

                        </div>

                    </div>

                </section>


                    <section class="section-villas-showcase landing-about-v2" id="downloads">
                        <div class="landing-gallery-container">

                            {{-- Section Header --}}
                            <div class="showcase-header">
                                <span class="landing-about-v2-eyebrow">RESIDENCE COLLECTION</span>
                                <h2 class=" landing-about-v2-title">4, 5, and 6 Bedroom Villas</h2>
                                <p class="showcase-description">
                                    Discover thoughtfully designed architectural layouts featuring expansive living spaces, private gardens, and waterfront views.
                                </p>
                            </div>

                            {{-- Villa Grid --}}
                            <div class="villas-grid">

                                {{-- 4 Bedroom Villa Card --}}
                                <div class="villa-card">
                                    <div class="villa-image-wrapper">

                                        <img src="{{ asset('assets/img/landing/yas-riva/villa1.webp') }}" alt="4 Bedroom Villa Yas Riva" class="villa-image">
                                        <span class="villa-tag">4BR MODEL</span>
                                    </div>
                                    <div class="villa-content">
                                        <h3 class="villa-name">4 Bedroom Villa</h3>
                                        <p class="villa-subtext">Ideal for growing families seeking modern luxury, quiet outdoor space, and refined living.</p>

                                        {{-- Exact Specs from Image --}}
                                        <div class="villa-specs-grid">
                                            <div class="spec-box">
                                                <span class="spec-label">AVG AREA</span>
                                                <span class="spec-value">437 SQM</span>
                                            </div>
                                            <div class="spec-box">
                                                <span class="spec-label">AVG PLOT AREA</span>
                                                <span class="spec-value">711 SQM</span>
                                            </div>
                                        </div>

                                        <div class="villa-actions">
                                            <button type="button" class="btn-villa-secondary" data-lead-popup-open>
                                                <x-landing-icon name="file-text" />
                                                <span>Floor Plan</span>
                                            </button>
                                            <button type="button" class="btn-villa-primary" data-lead-popup-open>
                                                <span>Enquire</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{-- 5 Bedroom Villa Card --}}
                                <div class="villa-card">
                                    <div class="villa-image-wrapper">
                                        <img src="{{ asset('assets/img/landing/yas-riva/villa2.webp') }}" alt="5 Bedroom Villa Yas Riva" class="villa-image">
                                        <span class="villa-tag">5BR MODEL</span>
                                    </div>
                                    <div class="villa-content">
                                        <h3 class="villa-name">5 Bedroom Villa</h3>
                                        <p class="villa-subtext">Expansive layout featuring dual living halls, direct pool access, and staff quarters.</p>

                                        {{-- Exact Specs from Image --}}
                                        <div class="villa-specs-grid">
                                            <div class="spec-box">
                                                <span class="spec-label">AVG AREA</span>
                                                <span class="spec-value">482 SQM</span>
                                            </div>
                                            <div class="spec-box">
                                                <span class="spec-label">AVG PLOT AREA</span>
                                                <span class="spec-value">828 SQM</span>
                                            </div>
                                        </div>

                                        <div class="villa-actions">
                                            <button type="button" class="btn-villa-secondary" data-lead-popup-open>
                                                <x-landing-icon name="file-text" />
                                                <span>Floor Plan</span>
                                            </button>
                                            <button type="button" class="btn-villa-primary" data-lead-popup-open>
                                                <span>Enquire</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{-- 6 Bedroom Villa Card --}}
                                <div class="villa-card">
                                    <div class="villa-image-wrapper">
                                        <img src="{{ asset('assets/img/landing/yas-riva/villa3.webp') }}" alt="6 Bedroom Villa Yas Riva" class="villa-image">
                                        <span class="villa-tag">6BR MODEL</span>
                                    </div>
                                    <div class="villa-content">
                                        <h3 class="villa-name">6 Bedroom Waterfront Villa</h3>
                                        <p class="villa-subtext">The pinnacle of luxury with direct canal frontage, private dock option, and panoramic views.</p>

                                        {{-- Exact Specs from Image --}}
                                        <div class="villa-specs-grid">
                                            <div class="spec-box">
                                                <span class="spec-label">AVG AREA</span>
                                                <span class="spec-value">538 SQM</span>
                                            </div>
                                            <div class="spec-box">
                                                <span class="spec-label">AVG PLOT AREA</span>
                                                <span class="spec-value">936 SQM</span>
                                            </div>
                                        </div>

                                        <div class="villa-actions">
                                            <button type="button" class="btn-villa-secondary" data-lead-popup-open>
                                                <x-landing-icon name="file-text" />
                                                <span>Floor Plan</span>
                                            </button>
                                            <button type="button" class="btn-villa-primary" data-lead-popup-open>
                                                <span>Enquire</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>




                <section class="landing-payment-plan landing-about-v2" id="payment-plan">

                    <div class="landing-gallery-container">

                        <div class="landing-payment-heading">

                <span class="landing-dark-eyebrow">
                    PAYMENT PLAN
                </span>



                            <h2 class=" landing-about-v2-title text-white">
                                Yas Riva Payment Plan & Buyer Offer
                            </h2>


                            <p class="landing-about-v2-description mb-lg text-white">
                                Secure your Yas Riva villa with a 5% down payment.
                                Current buyer incentives include:

                            </p>

                        </div>
                <div class="bg-white payment-plan-padding">
                        <div class="strip-metrics">
                            <div class="strip-col">
                                <div class="strip-number">5%</div>
                                <div class="strip-label">Down Payment</div>
                            </div>
                            <div class="strip-col">
                                <div class="strip-number">5%</div>
                                <div class="strip-label">ADM Fee Waiver</div>
                            </div>
                            <div class="strip-col">
                                <div class="strip-number">5-Year</div>
                                <div class="strip-label">Service Charge Waiver</div>
                            </div>
                        </div>

                        <!-- Divider Line -->
                        <div class="strip-divider">
                            <span></span>

                            <span></span>
                        </div>
                        <p class="landing-about-v2-description mb-lg">
                            Speak with our property specialists for the latest <strong>Yas Riva prices, available villas, floor plans and payment details.</strong>

                        </p>

                        <!-- CTA Content -->   <div class="landing-payment-actions">



                            <button
                                type="button"
                                class="landing-payment-btn landing-payment-btn-outline"
                                data-lead-popup-open
                                data-request-type="payment-plan">

                                GET YAS RIVA AVAILABILITY

                            </button>




                        </div>
                    </div>


                    </div>

                </section>



                    <section class="section-why-yas-riva landing-about-v2" id="why-yas-riva">
                        <div class="landing-gallery-container">

                            {{-- Section Header --}}
                            <div class="why-header">
                                <span class=" landing-about-v2-eyebrow">ALDAR DEVELOPMENTS</span>
                                <h2 class=" landing-about-v2-title">Why Yas Riva by Aldar?</h2>
                                <p class="why-description">
                                    <strong>Yas Riva</strong> brings together <strong>luxury villas</strong>, <strong>waterfront living</strong>, and the coveted <strong>Yas Island lifestyle</strong>. The community is positioned close to major Yas Island attractions including Yas Mall, Yas Marina Circuit, Ferrari World, Warner Bros. World, and Yas Waterworld.
                                </p>
                            </div>

                            {{-- Core Pillars Grid --}}


                            {{-- Major Yas Island Attractions Bar --}}
                            <div class="why-attractions-box">
                                <div class="attractions-heading">
                                    <span class="attractions-label">PROXIMITY TO YAS ISLAND ATTRACTIONS</span>
                                    <p>Minutes away from world-famous entertainment destinations</p>
                                </div>

                                <div class="attractions-grid">
                                    <div class="attraction-pill">
                                        <x-landing-icon name="mall" />
                                        <span>Yas Mall</span>
                                    </div>
                                    <div class="attraction-pill">
                                        <x-landing-icon name="location" />
                                        <span>Yas Marina Circuit</span>
                                    </div>
                                    <div class="attraction-pill">
                                        <x-landing-icon name="zap" />
                                        <span>Ferrari World</span>
                                    </div>
                                    <div class="attraction-pill">
                                        <x-landing-icon name="ticket" />
                                        <span>Warner Bros. World</span>
                                    </div>
                                    <div class="attraction-pill">
                                        <x-landing-icon name="pool" />
                                        <span>Yas Waterworld</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>




                    <section class="landing-amenities-v2 landing-about-v2" id="amenities">

                        <div class="landing-gallery-container">

                            {{-- Heading --}}
                            <div class="landing-amenities-v2-heading">
            <span class="landing-dark-eyebrow  text-white">
                CURATED LIFESTYLE
            </span>

                                <h2 class="landing-about-v2-title text-white">
                                    World-Class Yas Riva Amenities
                                </h2>

                                <p class="landing-about-v2-description mb-lg text-white">
                                    Filter through wellness, athletic, and social sanctuaries designed exclusively for Yas Riva residents.                                </p>
                            </div>


                            {{-- Category Tabs (No "All" Filter) --}}
                            <div class="amenities-filter-bar">
                                <button class="filter-btn active" data-filter="wellness">Wellness &amp; Rejuvenation (5)</button>
                                <button class="filter-btn" data-filter="sports">Sports &amp; Athletics (6)</button>
                                <button class="filter-btn" data-filter="social">Social &amp; Gathering (5)</button>
                                <button class="filter-btn" data-filter="family">Family &amp; Outdoor (3)</button>
                            </div>


                            {{-- Bento Grid --}}
                            <div class="bento-amenities-grid">

                                {{-- 1. WELLNESS & REJUVENATION --}}
                                <div class="bento-card" data-category="wellness">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="flower-2" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Meditation Area</h3>
                                        <p>Serene open-air sanctuary designed for mindfulness, reflection, and quiet moments.</p>
                                    </div>
                                </div>

                                <div class="bento-card" data-category="wellness">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="flame" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Sauna</h3>
                                        <p>Dry thermal sauna suite tailored for deep muscle recovery and detoxification.</p>
                                    </div>
                                </div>

                                <div class="bento-card" data-category="wellness">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="cloud-fog" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Steam Room</h3>
                                        <p>Eucalyptus-infused steam facility designed to soothe skin and relieve stress.</p>
                                    </div>
                                </div>

                                <div class="bento-card" data-category="wellness">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="heart" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Yoga Studio</h3>
                                        <p>Tranquil indoor studio dedicated to yoga, pilates, and body alignment sessions.</p>
                                    </div>
                                </div>

                                <div class="bento-card" data-category="wellness">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="spa" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Spa</h3>
                                        <p>Holistic health retreat offering specialized wellness and massage therapies.</p>
                                    </div>
                                </div>


                                {{-- 2. SPORTS & ATHLETICS --}}
                                <div class="bento-card is-hidden" data-category="sports">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="dumbbell" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Orte Fitness Center</h3>
                                        <p>Fully equipped indoor gym featuring modern strength and cardio training equipment.</p>
                                    </div>
                                </div>

                                <div class="bento-card is-hidden" data-category="sports">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="zap" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Outdoor Gym &amp; Workout Area</h3>
                                        <p>Calisthenics stations and outdoor fitness gear surrounded by fresh air.</p>
                                    </div>
                                </div>

                                <div class="bento-card is-hidden" data-category="sports">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="waves" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Swimming Pools (Adults &amp; Kids)</h3>
                                        <p>Resort-style adult lap pool alongside a dedicated shallow wading pool for kids.</p>
                                    </div>
                                </div>

                                <div class="bento-card is-hidden" data-category="sports">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="sports-court" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>2 Padel Courts &amp; Table Tennis</h3>
                                        <p>Professional glass-walled padel tennis courts and outdoor table tennis arenas.</p>
                                    </div>
                                </div>

                                <div class="bento-card is-hidden" data-category="sports">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="jogging" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Jogging Tracks</h3>
                                        <p>Rubberized walking and jogging pathways looping through green landscapes.</p>
                                    </div>
                                </div>

                                <div class="bento-card is-hidden" data-category="sports">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="cycling" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Community-Wide Cycle Track</h3>
                                        <p>Dedicated cycle paths connecting key destinations across the entire master plan.</p>
                                    </div>
                                </div>


                                {{-- 3. SOCIAL & GATHERING --}}
                                <div class="bento-card is-hidden" data-category="social">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="building-2" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>The View Clubhouse</h3>
                                        <p>An exclusive central gathering hub with elevated panoramic views and lounge spaces.</p>
                                    </div>
                                </div>

                                <div class="bento-card is-hidden" data-category="social">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="mall" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Community Market</h3>
                                        <p>Convenient retail spaces offering daily essential shopping close to home.</p>
                                    </div>
                                </div>

                                <div class="bento-card is-hidden" data-category="social">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="users" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Community Pavilion</h3>
                                        <p>Shaded architectural pavilion for social gatherings and community events.</p>
                                    </div>
                                </div>

                                <div class="bento-card is-hidden" data-category="social">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="coffee" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>F&amp;B Seating</h3>
                                        <p>Al fresco dining and lounge seating areas for social coffee and meals outdoor.</p>
                                    </div>
                                </div>

                                <div class="bento-card is-hidden" data-category="social">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="ticket" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Outdoor Amphitheater</h3>
                                        <p>Open-air seating arena for cultural performances, movie nights, and gatherings.</p>
                                    </div>
                                </div>


                                {{-- 4. FAMILY & RECREATION --}}
                                <div class="bento-card is-hidden" data-category="family">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="pool" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Water Play (Interactive Pond)</h3>
                                        <p>Refreshing interactive water features and decorative splash pond area.</p>
                                    </div>
                                </div>

                                <div class="bento-card is-hidden" data-category="family">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="utensils" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>BBQ &amp; Picnic Area</h3>
                                        <p>Dedicated grilling stations and picnic seating set amidst landscaped gardens.</p>
                                    </div>
                                </div>

                                <div class="bento-card is-hidden" data-category="family">
                                    <div class="bento-icon-wrapper">
                                        <x-landing-icon name="kids-play" />
                                    </div>
                                    <div class="bento-content">
                                        <h3>Kids’ Play Areas</h3>
                                        <p>Safe, soft-surfaced playground equipped with creative play structures for children.</p>
                                    </div>
                                </div>

                            </div>


                            {{-- Bottom Highlights --}}


                        </div>

                    </section>



                <section class="landing-gallery-section landing-about-v2" id="gallery">

                    <div class="landing-gallery-container">



                        @if ($galleryImages->isNotEmpty())

                            <section class="landing-project-gallery " id="gallery">

                                <div class="landing-project-gallery-heading">

                    <span class="landing-about-v2-eyebrow">
                        COMMUNITY RENDERS
                    </span>

                                    <h2 class="landing-about-v2-title">
                                        Project Gallery
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

                                DOWNLOAD GALLERY

                            </button>



                        </div>

                    </div>
                </section>

                    <section class="section-villas-sale-white landing-about-v2" id="villas-for-sale">
                        <div class="landing-gallery-container ">


                                {{-- Content Header --}}
                                <div class="sale-header">
                                      <span class="landing-about-v2-eyebrow">
                        Villa For Sale
                    </span>
                                    <h2 class=" landing-about-v2-title">Yas Riva Villas for Sale</h2>
                                    <p class="sale-description">
                                        Looking for a <strong>Yas Riva villa for sale</strong>? Explore available 4, 5 and 6 bedroom villas, including waterfront and canal-accessible residences.
                                    </p>
                                </div>

                                {{-- Registration Checklist --}}
                                <div class="registration-block">
                                    <p class="register-lead">Register to receive:</p>

                                    <ul class="registration-list">
                                        <li>
                                            <div class="check-icon">
                                                <x-landing-icon name="check" />
                                            </div>
                                            <span><strong>Yas Riva Prices</strong></span>
                                        </li>
                                        <li>
                                            <div class="check-icon">
                                                <x-landing-icon name="check" />
                                            </div>
                                            <span><strong>Available Villas</strong></span>
                                        </li>
                                        <li>
                                            <div class="check-icon">
                                                <x-landing-icon name="check" />
                                            </div>
                                            <span><strong>Floor Plans</strong></span>
                                        </li>
                                        <li>
                                            <div class="check-icon">
                                                <x-landing-icon name="check" />
                                            </div>
                                            <span><strong>Payment Plan</strong></span>
                                        </li>
                                        <li>
                                            <div class="check-icon">
                                                <x-landing-icon name="check" />
                                            </div>
                                            <span><strong>Latest Buyer Offers</strong></span>
                                        </li>
                                    </ul>
                                </div>

                                {{-- CTA Button --}}
                                <div class="sale-cta-wrapper">
                                    <button type="button" class="btn-enquire-now" data-lead-popup-open>
                                        <span>Enquire Now</span>
                                        <x-landing-icon name="arrow-right" />
                                    </button>
                                </div>


                        </div>
                    </section>




                    <section class="section-faq landing-about-v2" id="faq">
                        <div class="landing-gallery-container">

                            {{-- Section Header --}}
                            <div class="faq-header">
                                <span class="landing-about-v2-eyebrow">FREQUENTLY ASKED QUESTIONS</span>
                                <h2 class=" landing-about-v2-title">Yas Riva FAQs</h2>
                            </div>

                            {{-- FAQ Accordion List --}}
                            <div class="faq-list">

                                {{-- Q1 --}}
                                <details class="faq-item" open>
                                    <summary class="faq-question">
                                        <span>What is Yas Riva?</span>
                                        <span class="faq-icon"></span>
                                    </summary>
                                    <div class="faq-answer">
                                        <p>Yas Riva is a waterfront villa community by Aldar on Yas Island, Abu Dhabi, offering 4, 5 and 6 bedroom villas.</p>
                                    </div>
                                </details>

                                {{-- Q2 --}}
                                <details class="faq-item">
                                    <summary class="faq-question">
                                        <span>How much are Yas Riva villas?</span>
                                        <span class="faq-icon"></span>
                                    </summary>
                                    <div class="faq-answer">
                                        <p>Current campaign pricing starts from <strong>AED 7.9M</strong>, subject to availability and the specific villa. Verify the live price with the sales team before publishing.</p>
                                    </div>
                                </details>

                                {{-- Q3 --}}
                                <details class="faq-item">
                                    <summary class="faq-question">
                                        <span>What bedroom options are available at Yas Riva?</span>
                                        <span class="faq-icon"></span>
                                    </summary>
                                    <div class="faq-answer">
                                        <p>Yas Riva offers <strong>4, 5 and 6 bedroom villas</strong>.</p>
                                    </div>
                                </details>

                                {{-- Q4 --}}
                                <details class="faq-item">
                                    <summary class="faq-question">
                                        <span>What is the Yas Riva down payment?</span>
                                        <span class="faq-icon"></span>
                                    </summary>
                                    <div class="faq-answer">
                                        <p>The campaign offer provides a <strong>5% down payment</strong>.</p>
                                    </div>
                                </details>

                                {{-- Q5 --}}
                                <details class="faq-item">
                                    <summary class="faq-question">
                                        <span>Where is Yas Riva located?</span>
                                        <span class="faq-icon"></span>
                                    </summary>
                                    <div class="faq-answer">
                                        <p>Yas Riva is located on <strong>Yas Island in Abu Dhabi</strong>.</p>
                                    </div>
                                </details>

                                {{-- Q6 --}}
                                <details class="faq-item">
                                    <summary class="faq-question">
                                        <span>Who is the developer of Yas Riva?</span>
                                        <span class="faq-icon"></span>
                                    </summary>
                                    <div class="faq-answer">
                                        <p>Yas Riva is developed by <strong>Aldar Properties</strong>.</p>
                                    </div>
                                </details>

                            </div>

                        </div>
                    </section>


                    <section class="section-location landing-about-v2" id="location">
                        <div class="landing-gallery-container">

                            {{-- Section Header --}}
                            <div class="location-header">
                                <span class="landing-about-v2-eyebrow">PRIME LOCATION</span>
                                <h2 class=" landing-about-v2-title">Where is Yas Riva Located?</h2>
                                <p class="location-description">
                                    Yas Riva is prime-positioned on <strong>Yas Island, Abu Dhabi</strong>, offering seamless connectivity to world-class entertainment, luxury retail, and key transportation hubs.
                                </p>
                            </div>

                            {{-- Map & Details Grid --}}
                            <div class="location-grid">

                                {{-- Map Display Box --}}
                                <div class="map-wrapper">
                                    {{-- Replace iframe src with your actual Google Maps Embed API / Custom Silver Map URL --}}
                                    <iframe
                                        class="map-iframe"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14519.82498263539!2d54.5986872!3d24.4883584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e45a278d6b8ad%3A0x8849b28f7311100!2sYas%20Island%2C%20Abu%20Dhabi%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sae!4v1700000000000!5m2!1sen!2sae"
                                        width="100%"
                                        height="100%"
                                        style="border:0;"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>

                                    <div class="map-overlay-badge">
                                        <span class="badge-dot"></span>
                                        <span>Yas Island, Abu Dhabi</span>
                                    </div>
                                </div>

                                {{-- Nearby Highlights Sidebar --}}
                                <div class="location-highlights">
                                    <h3 class="highlights-title">Key Connectivity</h3>

                                    <ul class="highlights-list">
                                        <li>
                                            <div class="time-badge">05 MIN</div>
                                            <div class="highlight-info">
                                                <strong>Yas Mall & Yas Bay Waterfront</strong>
                                                <span>Premium retail, dining & nightlife</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time-badge">07 MIN</div>
                                            <div class="highlight-info">
                                                <strong>Ferrari World & Warner Bros. World</strong>
                                                <span>World-renowned theme parks</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time-badge">10 MIN</div>
                                            <div class="highlight-info">
                                                <strong>Yas Marina Circuit</strong>
                                                <span>Home of the Abu Dhabi Grand Prix</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time-badge">15 MIN</div>
                                            <div class="highlight-info">
                                                <strong>Abu Dhabi International Airport</strong>
                                                <span>Global travel connectivity</span>
                                            </div>
                                        </li>
                                    </ul>

                                    <div class="location-action">
                                        <button type="button" class="btn-get-directions" onclick="window.open('https://maps.google.com/?q=Yas+Island+Abu+Dhabi', '_blank')">
                                            <x-landing-icon name="map-pin" />
                                            <span>Open in Google Maps</span>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>




                    <section class="section-developer landing-about-v2" id="developer">
                        <div class="landing-gallery-container">


                                {{-- Header & Subtitle --}}
                                <div class="developer-header">
                                    <span class="landing-about-v2-eyebrow">THE DEVELOPER</span>
                                    <h2 class=" landing-about-v2-title">About Aldar Properties</h2>
                                    <p class="developer-lead">
                                        <strong>Aldar Properties</strong> is the leading real estate developer and manager in Abu Dhabi, renowned for creating iconic, sustainable communities across the UAE.
                                    </p>
                                </div>

                                {{-- Stat Callouts Grid --}}
                                <div class="developer-stats-grid">
                                    <div class="stat-box">
                                        <span class="stat-value">AED 30B+</span>
                                        <span class="stat-label">DEVELOPMENT PIPELINE</span>
                                    </div>
                                    <div class="stat-box">
                                        <span class="stat-value">20+ YRS</span>
                                        <span class="stat-label">OF EXCELLENCE</span>
                                    </div>
                                    <div class="stat-box">
                                        <span class="stat-value">PREMIER</span>
                                        <span class="stat-label">MASTER DEVELOPER</span>
                                    </div>
                                </div>

                                {{-- Description Paragraphs --}}
                                <div class="developer-body">
                                    <p>
                                        With a master-planned portfolio spanning Abu Dhabi’s most desirable destinations—including Yas Island, Saadiyat Island, and Al Reem Island—Aldar shapes the future of modern urban living in the region.
                                    </p>
                                    <p>
                                        From landmark commercial towers and luxury residential enclaves to world-class hospitality and entertainment hubs, Aldar’s commitment to quality craftsmanship and sustainable innovation sets the benchmark for real estate in Abu Dhabi.
                                    </p>
                                </div>

                                {{-- Developer Highlights / Badges --}}
                                <div class="developer-pillars">
                                    <div class="pillar-item">
                                        <div class="pillar-icon">
                                            <x-landing-icon name="world-class" />
                                        </div>
                                        <div>
                                            <strong>World-Class Quality</strong>
                                            <span>Architectural excellence and uncompromised build standards</span>
                                        </div>
                                    </div>
                                    <div class="pillar-item">
                                        <div class="pillar-icon">
                                            <x-landing-icon name="investment" />
                                        </div>
                                        <div>
                                            <strong>Trusted Investment</strong>
                                            <span>Abu Dhabi’s leading publicly listed developer</span>
                                        </div>
                                    </div>
                                </div>


                        </div>
                    </section>


            </div>



            <div
                class="landing-right-section"
                style="background-image: url('{{ asset('assets/img/landing/wadeem-modon/side-bg.webp') }}');"
            >

                <aside class="landing-side-form">

                    <div class="landing-side-form-inner">

                        @include('partials.lead-form-v2', [
                            'formId' => 'landing-about-form',
                            'heading' => 'GET EARLY ACCESS',
                            'buttonText' => 'SUBMIT',
                        ])

                    </div>

                </aside>

            </div>
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

                @include('partials.lead-form', [
                'formId' => 'landing-popup-form',
                'heading' => 'GET PROJECT DETAILS',
                'buttonText' => 'SUBMIT',
                'source' => 'the_heights_popup',
                'propertyId' => $property->id,
                'developerId' => $property->developer_id,
                'action' => route('landing.leads.store'),
                ])

            </div>

        </div>


        {{-- =====================================================
    DEVELOPER + COMMUNITY
===================================================== --}}

        <section class=" landing-about-v2 landing-image-form-section landing-enquiry-footer">

            <div class="landing-gallery-container ">

                <div
                    class="landing-image-form-box"
                    style="background-image:
    linear-gradient(
        90deg,
        rgba(20, 42, 58, 0.35) 0%,
        rgba(20, 42, 58, 0.10) 100%
    ),
    url('{{ asset('assets/img/landing/yas-riva/Yas-Riva.jpeg') }}');"
                >

                    <div class="landing-image-form-left">

                        @include('partials.lead-form', [
                            'formId' => 'landing-image-form',
                            'heading' => 'GET EARLY ACCESS',
                        ])

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
            href="https://wa.me/971555342535?text=Hi%2C%20I%E2%80%99m%20interested%20to%20know%20more%20about%20this%20project.%20Please%20share%20all%20relevant%20details.%0AThank%20you."
            class="landing-whatsapp-float whatsapp-track"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Chat on WhatsApp"
        >
            <svg width="44px" height="44px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"></path> <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"></path> <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"></path> <defs> <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse"> <stop stop-color="#5BD066"></stop> <stop offset="1" stop-color="#27B43E"></stop> </linearGradient> </defs> </g></svg>
        </a>

    </main>

@endsection
@push('scripts')
    @vite('resources/js/landing/yas-riva.js')

@endpush
