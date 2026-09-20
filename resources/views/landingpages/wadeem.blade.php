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

    <header class="landing-header">
        <div class="landing-header-inner">



             <a href="#home" class="landing-logo">
             <img
             src="{{ asset('assets/img/landing/wadeem-modon/logo-gardens.webp') }}"
             alt="Avanor">
             </a>
            <nav class="landing-nav">


                <a href="#about">
                    About
                </a>

                <a href="#downloads">
                    Villas
                </a>

                <a href="#gallery">
                    Gallery
                </a>
                <a href="#gallery">
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

                <a href="#home">Home</a>

                <a href="#about">
                    Property Details
                </a>





                <a href="#location">Location</a>

                <a href="#downloads">
                    Downloads
                </a>

                <a href="#gallery">
                    Gallery
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

                <span class="avanor-property-slide-eyebrow">
                    EMAAR PROPERTIES
                </span>

                        <h1 class="avanor-property-slide-title">
                            {{ $property->title }} - New Launch Villas for Sale in Dubai
                        </h1>

                        <p class="avanor-property-slide-description">
                            Luxury <span class="ext-bold">3, 4 & 5 Bedroom Villas </span>at The Heights Country Club & Wellness by Emaar. Explore latest prices, payment plans, floor plans and available units.

                        </p>


                        @if ($property->project?->starting_price)

                            <fieldset class="landing-hero-offer-card">

                                <legend class="landing-hero-offer-label">
                                    3, 4 &amp; 5 BED STANDALONE VILLAS
                                </legend>


                                <div class="landing-hero-offer-details">

                                    {{-- Starting Price --}}
                                    <div class="landing-hero-offer-price">

                            <span>
                                STARTING FROM
                            </span>

                                        <strong>
                                            {{ \App\Support\PriceFormatter::aed(
                                                                        $property->project->starting_price
                                                                    ) }}
                                        </strong>

                                    </div>


                                    {{-- Separator --}}
                                    <span class="landing-hero-offer-divider"></span>


                                    {{-- Payment Plan --}}
                                    <div class="landing-hero-offer-payment">
                            <span>
                                PAYMENT PLAN
                            </span>
                                        <strong>
                                            80/20
                                        </strong>



                                    </div>

                                </div>


                                {{-- CTA BUTTONS --}}
                                <div class="landing-hero-offer-actions">




                                    <a
                                        href="tel:+971589798257"
                                        class="landing-hero-offer-btn call-track">

                                        <span>CALL</span>

                                        <x-landing-icon name="phone" />

                                    </a>

                                </div>

                            </fieldset>

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

                <div class="landing-property-actions">


                    <a
                        href="#"
                        class="btn btn-champagne" data-lead-popup-open>
                        DOWNLOAD BROCHURE
                    </a>

                </div>

            </div>

        </div>


            <section class="landing-mobile-form-section landing-about-v2">

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
                    DISCOVER THE COMMUNITY
                </span>

                            <h2 class="landing-about-v2-title">
                                About {{ $property->title }}
                            </h2>

                            <span class="landing-about-v2-line"></span>






                            @if (filled($property->description))
                                <p class="landing-about-v2-description">
                                    {!! $property->description !!}
                                </p>
                            @endif

                            {{-- PRICE + HANDOVER --}}
                            <div class="landing-about-v2-property-info">

                                <div class="landing-about-v2-info-card">

                                    <div class="landing-about-v2-info-icon">

                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">

                                            <path d="M3 7h15a2 2 0 0 1 2 2v10H5a2 2 0 0 1-2-2V7Z" />
                                            <path d="M3 7l3-3h11" />
                                            <path d="M16 12h6v4h-6a2 2 0 0 1 0-4Z" />

                                        </svg>

                                    </div>

                                    <div>

                            <span>
                                PROPERTY PRICE
                            </span>

                                        <strong>
                                            {{ \App\Support\PriceFormatter::aed(
                                            $property->project->starting_price
                                            ) }}
                                        </strong>

                                    </div>

                                </div>


                                <div class="landing-about-v2-info-card">

                                    <div class="landing-about-v2-info-icon">

                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">

                                            <rect x="3" y="5" width="18" height="16" rx="1" />
                                            <path d="M7 3v4M17 3v4M3 10h18" />
                                            <path d="M8 14h2M14 14h2M8 18h2M14 18h2" />

                                        </svg>

                                    </div>

                                    <div>

                            <span>
                                HANDOVER DATE
                            </span>

                                        <strong>
                                            Q3 2029
                                        </strong>

                                    </div>

                                </div>

                            </div>

                            {{-- =====================================================
                            PRIME CONNECTIVITY / PROJECT HIGHLIGHTS
                            ===================================================== --}}

                            <div class="landing-reach">

                                {{-- Heading --}}
                                <div class="landing-reach__heading">

                        <span class="landing-reach__eyebrow">
                            WHY THE HEIGHTS
                        </span>

                                    <h3 class="landing-reach__title">
                                        A Community Designed Around You
                                    </h3>

                                </div>


                                {{-- =====================================================
                                6 PROJECT HIGHLIGHTS
                                ===================================================== --}}

                                <div class="landing-reach__features">


                                    {{-- 1 --}}
                                    <div class="landing-reach__feature">

                                        <div class="landing-reach__feature-icon">
                                            <x-landing-icon name="masterplan" />
                                        </div>

                                        <h4>
                                            AED 55 Billion Masterplan
                                        </h4>

                                        <p>
                                            A landmark 81 million sq. ft. Emaar community shaped
                                            around wellness, nature and refined living.
                                        </p>

                                    </div>


                                    {{-- 2 --}}
                                    <div class="landing-reach__feature">

                                        <div class="landing-reach__feature-icon">
                                            <x-landing-icon name="beach" />
                                        </div>

                                        <h4>
                                            Private Beach &amp; Country Club Lifestyle
                                        </h4>

                                        <p>
                                            Exclusive wellness, leisure, fitness and social
                                            amenities within the community.
                                        </p>

                                    </div>


                                    {{-- 3 --}}
                                    <div class="landing-reach__feature">

                                        <div class="landing-reach__feature-icon">
                                            <x-landing-icon name="home" />
                                        </div>

                                        <h4>
                                            3, 4, &amp; 5 Bedroom Luxury Villas
                                        </h4>

                                        <p>
                                            Large plot sizes and contemporary independent villas
                                            designed for premium family living.
                                        </p>

                                    </div>


                                    {{-- 4 --}}
                                    <div class="landing-reach__feature">

                                        <div class="landing-reach__feature-icon">
                                            <x-landing-icon name="garden" />
                                        </div>

                                        <h4>
                                            Nature-First Community
                                        </h4>

                                        <p>
                                            14 million sq. ft. of open space featuring extensive
                                            parks, a beachside clubhouse, landscaped greenways,
                                            lakes, cycling and jogging tracks.
                                        </p>

                                    </div>


                                    {{-- 5 --}}
                                    <div class="landing-reach__feature">

                                        <div class="landing-reach__feature-icon">
                                            <x-landing-icon name="location" />
                                        </div>

                                        <h4>
                                            Prime Dubai Location
                                        </h4>

                                        <p>
                                            Direct access to Al Maktoum International Airport,
                                            Expo City and key destinations across Dubai.
                                        </p>

                                    </div>


                                    {{-- 6 --}}
                                    <div class="landing-reach__feature">

                                        <div class="landing-reach__feature-icon">
                                            <x-landing-icon name="diamond" />
                                        </div>

                                        <h4>
                                            Attractive Price per Sq. Ft.
                                        </h4>

                                        <p>
                                            A highly attractive entry point into a premium
                                            Emaar villa community.
                                        </p>

                                    </div>

                                </div>


                                {{-- =====================================================
                                LOCATION BOXES
                                ===================================================== --}}

                                <div class="landing-reach__locations">


                                    {{-- Expo --}}
                                    <div class="landing-reach__location">

                                        <div class="landing-reach__location-time">
                                            <strong>10</strong>
                                            <span>MINS</span>
                                        </div>

                                        <div class="landing-reach__location-place">


                                            <strong>
                                                Expo City Dubai
                                            </strong>

                                        </div>

                                    </div>


                                    {{-- Airport --}}
                                    <div class="landing-reach__location">

                                        <div class="landing-reach__location-time">
                                            <strong>10</strong>
                                            <span>MINS</span>
                                        </div>

                                        <div class="landing-reach__location-place">


                                            <strong>
                                                Al Maktoum Int’l Airport
                                            </strong>

                                        </div>

                                    </div>


                                    {{-- Dubai Hills --}}
                                    <div class="landing-reach__location">

                                        <div class="landing-reach__location-time">
                                            <strong>20</strong>
                                            <span>MINS</span>
                                        </div>

                                        <div class="landing-reach__location-place">



                                            <strong>
                                                Dubai Hills Estate
                                            </strong>

                                        </div>

                                    </div>


                                    {{-- Downtown --}}
                                    <div class="landing-reach__location">

                                        <div class="landing-reach__location-time">
                                            <strong>30</strong>
                                            <span>MINS</span>
                                        </div>

                                        <div class="landing-reach__location-place">


                                            <strong>
                                                Downtown Dubai
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>




                    </div>

                </div>

            </section>






        <section class="landing-about-v2">

            <div class="landing-gallery-container">

                <div class="landing-plan-heading " >

                                                             <span class=" landing-about-v2-eyebrow">
                                                                   THE COLLECTION
                                                                         </span>

                    <h2 class="area-hardcoded landing-about-v2-title">
                        Discover Three Elegant Villa Clusters
                    </h2>
                    <span class="landing-about-v2-line"></span>
                    <p class="landing-about-v2-description">

                    <h3 class="fs-4" >
                        A visionary master community inspired by holistic luxury living, where nature, wellness and thoughtful design come together in perfect harmony at The Heights Country Club & Wellness.
                    </h3>


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


        <section class="landing-payment-plan landing-about-v2" id="downloads" >

            <div class="landing-gallery-container">

                <div class="landing-plan-heading" >

                    <span class="landing-reach__eyebrow">
                        PLANS
                    </span>

                    <h2 class="landing-about-v2-title">
                        FLOOR PLANS
                    </h2>
                    <span class="landing-about-v2-line"></span>
                    <p class="landing-about-v2-description mb-lg">
                        Request detailed project layouts and unit plans for
                        {{ $property->title }}.
                    </p>

                </div>


                <div class="landing-plan-grid-br">

                    {{-- MASTER PLAN --}}
                    <article class="landing-plan-card">

                        <button
                            type="button"
                            class="landing-plan-image-wrap"
                            data-lead-popup-open
                            data-request-type="master_plan">

                            <img
                                src="{{ asset('assets/img/landing/br-plans.webp') }}"
                                alt=" {{ $property->project?->name ?? $property->title }}"
                                class="landing-plan-image">

                            <span class="landing-plan-overlay"></span>

                            <span class="landing-plan-overlay-text">
                                SHOW 3BR FlOOR PLAN
                            </span>

                        </button>

                        <div class="landing-plan-card-footer">

                            <h3>
                                3 Bedroom Villa
                            </h3>

                            <p>
                                BUA: 3463.07 Sq.ft | Plot: 4,500 Sq.ft

                            </p>



                        </div>

                    </article>


                    {{-- UNIT PLAN --}}
                    <article class="landing-plan-card">

                        <button
                            type="button"
                            class="landing-plan-image-wrap"
                            data-lead-popup-open
                            data-request-type="unit_plan">

                            <img
                                src="{{ asset('assets/img/landing/br-plans.webp') }}"
                                alt=" {{ $property->project?->name ?? $property->title }}"
                                class="landing-plan-image">

                            <span class="landing-plan-overlay"></span>

                            <span class="landing-plan-overlay-text">
                                SHOW 4BR VILLA FlOOR PLAN
                            </span>

                        </button>

                        <div class="landing-plan-card-footer">

                            <h3>
                                4 Bedroom Villa
                            </h3>

                            <p>
                                BUA: 4,312.45 Sq.ft | Plot: 4,500 Sq.ft

                            </p>



                        </div>

                    </article>

                    <article class="landing-plan-card">

                        <button
                            type="button"
                            class="landing-plan-image-wrap"
                            data-lead-popup-open
                            data-request-type="unit_plan">

                            <img
                                src="{{ asset('assets/img/landing/br-plans.webp') }}"
                                alt=" {{ $property->project?->name ?? $property->title }}"
                                class="landing-plan-image">

                            <span class="landing-plan-overlay"></span>

                            <span class="landing-plan-overlay-text">
                                SHOW 5 BR VILLA FlOOR PLAN
                            </span>

                        </button>

                        <div class="landing-plan-card-footer">

                            <h3>
                                5 Bedroom Villa
                            </h3>

                            <p>
                                BUA: 5,884.30 Sq.ft | Plot: 5,500 Sq.ft

                            </p>



                        </div>

                    </article>
                </div>

            </div>
        </section>

        <section class="landing-payment-plan landing-about-v2" id="payment-plan">

            <div class="landing-gallery-container">

                <div class="landing-payment-heading">

                <span class=" landing-about-v2-eyebrow">
                    PAYMENT PLAN
                </span>



                    <h2 class=" landing-about-v2-title">
                        Flexible Payment Plan
                    </h2>
                    <span class="landing-about-v2-line"></span>

                    <p class="landing-about-v2-description mb-lg">
                        Seamless payment plan for a smooth investment journey.
                    </p>

                </div>





                {{-- SUMMARY --}}
                <div class="landing-payment-summary">

                <span>
                    <strong>10%</strong>
                    For Booking
                </span>

                    <span>
                    <strong>70%</strong>
                    During Construction
                </span>

                    <span>
                    <strong>20%</strong>
                    On Handover
                </span>

                </div>


                {{-- CTA --}}
                <div class="landing-payment-actions">

                    <button
                        type="button"
                        class="landing-payment-btn landing-payment-btn-outline"
                        data-lead-popup-open
                        data-request-type="payment-plan">

                        GET PAYMENT PLAN

                    </button>



                </div>

            </div>

        </section>
        <section class="landing-amenities-v2 landing-about-v2" id="amenities">

            <div class="landing-gallery-container">

                {{-- Heading --}}
                <div class="landing-amenities-v2-heading">

                <span class="  landing-about-v2-eyebrow">
                    AMENITIES
                </span>



                    <h2 class=" landing-about-v2-title">
                        Designed for a life of well-being
                    </h2>
                    <span class="landing-about-v2-line"></span>

                    <p class="landing-about-v2-description mb-lg">
                        From active living to family time, every amenity enhances comfort and convenience.
                    </p>

                </div>


                {{-- Amenities Grid --}}
                <div class="landing-amenities-v2-grid">


                    <div class="landing-amenities-v2-card">

                        <div class="landing-amenities-v2-icon">
                            <x-landing-icon name="beach" />
                        </div>

                        <h3>Beach Clubhouse</h3>

                        <span class="landing-amenities-v2-card-line"></span>

                        <p>
                            An exclusive beachfront clubhouse designed for leisure,
                            relaxation and social experiences.
                        </p>

                    </div>


                    <div class="landing-amenities-v2-card">

                        <div class="landing-amenities-v2-icon">
                            <x-landing-icon name="farm-cafe" />
                        </div>

                        <h3>Farm-to-Table Café</h3>

                        <span class="landing-amenities-v2-card-line"></span>

                        <p>
                            Fresh dining experiences inspired by locally sourced
                            ingredients and healthy living.
                        </p>

                    </div>


                    <div class="landing-amenities-v2-card">

                        <div class="landing-amenities-v2-icon">
                            <x-landing-icon name="hospital" />
                        </div>

                        <h3>Hospital and Clinics</h3>

                        <span class="landing-amenities-v2-card-line"></span>

                        <p>
                            Convenient access to healthcare facilities within
                            the community.
                        </p>

                    </div>


                    <div class="landing-amenities-v2-card">

                        <div class="landing-amenities-v2-icon">
                            <x-landing-icon name="retail" />
                        </div>

                        <h3>Shopping Malls</h3>

                        <span class="landing-amenities-v2-card-line"></span>

                        <p>
                            Everyday shopping and lifestyle conveniences
                            located close to home.
                        </p>

                    </div>


                    <div class="landing-amenities-v2-card">

                        <div class="landing-amenities-v2-icon">
                            <x-landing-icon name="sports-court" />
                        </div>

                        <h3>Sports Courts</h3>

                        <span class="landing-amenities-v2-card-line"></span>

                        <p>
                            Dedicated courts for recreational activities,
                            fitness and active community living.
                        </p>

                    </div>


                    <div class="landing-amenities-v2-card">

                        <div class="landing-amenities-v2-icon">
                            <x-landing-icon name="garden" />
                        </div>

                        <h3>Landscaped Gardens</h3>

                        <span class="landing-amenities-v2-card-line"></span>

                        <p>
                            Beautifully landscaped green spaces for relaxation,
                            walking and outdoor moments.
                        </p>

                    </div>


                    <div class="landing-amenities-v2-card">

                        <div class="landing-amenities-v2-icon">
                            <x-landing-icon name="cycling" />
                        </div>

                        <h3>Cycling Tracks</h3>

                        <span class="landing-amenities-v2-card-line"></span>

                        <p>
                            Dedicated cycling routes designed for an active
                            and healthy lifestyle.
                        </p>

                    </div>


                    <div class="landing-amenities-v2-card">

                        <div class="landing-amenities-v2-icon">
                            <x-landing-icon name="water" />
                        </div>

                        <h3>Lakes &amp; Water Features</h3>

                        <span class="landing-amenities-v2-card-line"></span>

                        <p>
                            Scenic lakes and water features creating a calm
                            and refreshing community environment.
                        </p>

                    </div>

                </div>


                {{-- Bottom Highlights --}}
                <div class="landing-amenities-v2-highlights">


                    <div class="landing-amenities-v2-highlight">

                        <div class="landing-amenities-v2-highlight-icon">
                            <x-landing-icon name="shield" />
                        </div>

                        <div>
                            <strong>SAFE &amp; SECURE</strong>

                            <span>
                            Gated community living
                        </span>
                        </div>

                    </div>


                    <div class="landing-amenities-v2-highlight">

                        <div class="landing-amenities-v2-highlight-icon">
                            <x-landing-icon name="leaf" />
                        </div>

                        <div>
                            <strong>SUSTAINABLE LIVING</strong>

                            <span>
                            Green spaces &amp; wellness
                        </span>
                        </div>

                    </div>


                    <div class="landing-amenities-v2-highlight">

                        <div class="landing-amenities-v2-highlight-icon">
                            <x-landing-icon name="users" />
                        </div>

                        <div>
                            <strong>COMMUNITY LIVING</strong>

                            <span>
                            Spaces that bring people together
                        </span>
                        </div>

                    </div>


                    <div class="landing-amenities-v2-highlight">

                        <div class="landing-amenities-v2-highlight-icon">
                            <x-landing-icon name="star" />
                        </div>

                        <div>
                            <strong>PREMIUM LIFESTYLE</strong>

                            <span>
                            World-class community amenities
                        </span>
                        </div>

                    </div>

                </div>

            </div>

        </section>

        <section class="landing-gallery-section landing-about-v2" id="gallery">

            <div class="landing-gallery-container">



                @if ($galleryImages->isNotEmpty())

                    <section class="landing-project-gallery " id="gallery">

                        <div class="landing-project-gallery-heading">

                    <span class="landing-project-gallery-eyebrow">
                        COMMUNITY RENDERS
                    </span>

                            <h2 class="landing-about-v2-title">
                                Project Gallery
                            </h2>

                            <span class="landing-project-gallery-line"></span>

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



        {{-- =====================================================
                    FAQ SECTION
                ===================================================== --}}

        <section class="landing-faq-section landing-about-v2" id="location">

            <div class="landing-gallery-container">

                <div class="row g-5 align-items-stretch">

                    {{-- =====================================================
                        LEFT — FAQ
                    ===================================================== --}}

                    <div class="col-lg-6 d-flex">

                        <div class="landing-faq-intro">

                    <span class="   landing-about-v2-title">
                        FAQ
                    </span>
                            <span class="landing-about-v2-line mb-lg"></span>

                            <details class="landing-faq-item">

                                <summary>
                            <span>
                                What is The Heights by Emaar?
                            </span>

                                    <span
                                        class="landing-faq-toggle"
                                        aria-hidden="true">
                            </span>
                                </summary>

                                <div class="landing-faq-answer">

                                    <p>
                                        The Heights by Emaar is a premium villa
                                        community focused on wellness, nature, and
                                        family living, offering spacious 3, 4 and
                                        5-bedroom villas with world-class amenities.
                                    </p>

                                </div>

                            </details>


                            <details class="landing-faq-item">

                                <summary>
                            <span>
                                What is the payment plan for The Heights by Emaar?
                            </span>

                                    <span
                                        class="landing-faq-toggle"
                                        aria-hidden="true">
                            </span>
                                </summary>

                                <div class="landing-faq-answer">

                                    <p>
                                        The Heights offers an 80/20 payment plan,
                                        with payments structured throughout
                                        construction and the remaining 20% due
                                        upon handover.
                                    </p>

                                </div>

                            </details>


                            <details class="landing-faq-item">

                                <summary>
                            <span>
                                How large is the Emaar Heights community?
                            </span>

                                    <span
                                        class="landing-faq-toggle"
                                        aria-hidden="true">
                            </span>
                                </summary>

                                <div class="landing-faq-answer">

                                    <p>
                                        The Heights spans approximately 81 million
                                        sq. ft., featuring expansive green spaces,
                                        parks, wellness facilities, and community
                                        amenities.
                                    </p>

                                </div>

                            </details>


                            <details class="landing-faq-item">

                                <summary>
                            <span>
                                Is The Heights by Emaar a good investment?
                            </span>

                                    <span
                                        class="landing-faq-toggle"
                                        aria-hidden="true">
                            </span>
                                </summary>

                                <div class="landing-faq-answer">

                                    <p>
                                        The Heights offers strong long-term potential
                                        due to its Emaar brand, strategic location,
                                        premium villas, and wellness-focused community
                                        concept.
                                    </p>

                                </div>

                            </details>


                            <details class="landing-faq-item">

                                <summary>
                            <span>
                                When is The Heights expected to be handed over?
                            </span>

                                    <span
                                        class="landing-faq-toggle"
                                        aria-hidden="true">
                            </span>
                                </summary>

                                <div class="landing-faq-answer">

                                    <p>
                                        The Heights by Emaar is currently an off-plan
                                        project, with expected handover in 2030.
                                    </p>

                                </div>

                            </details>

                        </div>

                    </div>


                    {{-- =====================================================
                        RIGHT — LOCATION
                    ===================================================== --}}

                    <div class="col-lg-6 d-flex">

                        <div class="landing-location-map-column">

                    <span class="landing-about-v2-title">
                        LOCATION
                    </span>
                            <span class="landing-about-v2-line mb-lg"></span>


                            <div class="location-map">

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


                            <div class="landing-location-map-footer">

                                <button
                                    type="button"
                                    class="landing-plan-button"
                                    data-lead-popup-open
                                    data-request-type="location-details">

                                    GET LOCATION DETAILS

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


            <section class="landing-developer-community landing-about-v2 " id="about-dev">

                <div class="landing-gallery-container">



                    <div class="landing-developer-panel">

                        <span class="  landing-about-v2-eyebrow">
                    ABOUT THE DEVELOPER
                         </span>

                        <h2 class=" landing-about-v2-title">
                            Emaar Properties
                        </h2>
                        <span class="landing-about-v2-line"></span>
                        <div class="landing-developer-copy">

                            <p>
                                Emaar Properties is one of Dubai’s leading real estate
                                developers, known for creating master-planned communities,
                                premium residences and landmark destinations across the UAE.

                                The Heights Country Club &amp; Wellness is an Emaar
                                development in Dubai focused on wellness-led living,
                                luxury villas, landscaped green spaces and an exclusive
                                country club lifestyle.
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
    url('{{ asset('assets/img/landing/bannercontact.webp') }}');"
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
            href="https://wa.me/971589798257?text=Hi%2C%20I%E2%80%99m%20interested%20to%20know%20more%20about%20this%20project.%20Please%20share%20all%20relevant%20details.%0AThank%20you."
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
    @vite('resources/js/landing/wadeem.js')

@endpush
