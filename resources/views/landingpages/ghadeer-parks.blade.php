@extends('layouts.landing')


{{-- =====================================================
    SEO
===================================================== --}}

@if (!empty($propertyImageUrl))
@section('og_image', $propertyImageUrl)
@endif
@push('favicon')
<link rel="icon" type="image/png"
    href="{{ asset('assets/img/landing/yas-riva/apple-icon.png') }}">
@endpush
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

@section('canonical', 'https://ghadeer-parks.sales-centre.net')


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

'url' => 'https://ghadeer-parks.sales-centre.net',
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
'url' => 'https://ghadeer-parks.sales-centre.net',
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
@vite('resources/css/landing/ghadeer-parks.css')
@endpush

@section('content')

<header class="landing-header">
    <div class="landing-header-inner">



        <a href="#home" class="landing-logo">
            <img
                src="{{ asset('assets/img/landing/ghadeer-parks/al_ghadeer_park_logo.webp') }}"
                alt="{{ $property->title }}">
        </a>
        <nav class="landing-nav">


            <a href="#about">
                About
            </a>

            <a href="#properties">
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
            <a href="#" data-lead-popup-open>contact</a>

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

            <a href="#properties">
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

    <section class="avanor-property-hero">

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
                    NEW LAUNCH BY ALDAR · BETWEEN ABU DHABI & DUBAI
                </span>

                <h1 class="avanor-property-slide-title" id="dynamic-ad-h1">
                    {{ $property->title }}
                </h1>

                <p class="avanor-property-slide-description">
                    Family townhouses and villas from AED 1.9M. Secure yours with just 5% down,
                    around AED 95K.
                </p>


                @if ($property->project?->starting_price)

                <div class="yas-riva-price">
                    <span class="yas-riva-price-label">From</span>
                    <span class="yas-riva-price-value">AED 95K</span>
                </div>

                <div class="ghadeer-parks-highlights">

                    <div class="ghadeer-parks-highlights-heading">
                        <span>AVAILABLE UNITS & PAYMENT PLANS</span>
                    </div>

                    <div class="ghadeer-parks-highlights-items">

                        <div class="ghadeer-parks-highlight-item">
                            <strong>2 & 3-Bedroom</strong>
                            <span>Townhouses and 4-Bedroom Villas</span>
                        </div>

                        <div class="ghadeer-parks-highlight-divider"></div>

                        <div class="ghadeer-parks-highlight-item">
                            <strong>55 / 45</strong>
                            <span>Payment Plan with 45% on Handover</span>
                        </div>

                        <div class="ghadeer-parks-highlight-divider"></div>

                        <div class="ghadeer-parks-highlight-item">
                            <strong>16 Minutes</strong>
                            <span>To Al Maktoum International Airport</span>
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



        </div>

    </div>

    <div class="landing-content-with-form">

        <div class="landing-main-content">
            <section class="landing-mobile-form-section landing-about-v2">

                <div class="landing-gallery-container">

                    <div class="landing-side-form-inner">




                        @include('partials.lead-form-ghadeer-parks', [
                        'formId' => 'landing-about-form',
                        'heading' => 'GET EARLY ACCESS',
                        'source' => 'ghadeer_parks_mobile_form',
                        'buttonText' => 'SUBMIT',

                        ])



                    </div>

                </div>
            </section>

            <section class="landing-about-v2" id="about">

                <div class="landing-gallery-container">

                    <div class="landing-about-v2-content">

                        <span class="landing-about-v2-eyebrow">
                            Locked Details
                        </span>

                        <h2 class="landing-about-v2-title">
                            Al Ghadeer Parks Price List, Floor Plans & Availability
                        </h2>

                        <p class="landing-about-v2-description mb-lg">
                            Everything you need to choose your home. Request it and we'll send you:
                        </p>

                        <div class="ghadeer-details-grid">

                            <div class="ghadeer-detail-card" data-lead-popup-open>

                                <div class="ghadeer-detail-lock">
                                    🔒
                                </div>

                                <div class="ghadeer-detail-content">
                                    <h3>Full Price List</h3>

                                    <p>
                                        Middle and corner townhouses, and villas.
                                    </p>

                                    <a href="#enquiry" class="ghadeer-detail-button">
                                        Unlock Details
                                    </a>
                                </div>

                            </div>


                            <div class="ghadeer-detail-card" data-lead-popup-open>

                                <div class="ghadeer-detail-lock">
                                    🔒
                                </div>

                                <div class="ghadeer-detail-content">
                                    <h3>Payment Schedule</h3>

                                    <p>
                                        All 8 instalments with payment dates.
                                    </p>

                                    <a href="#enquiry" class="ghadeer-detail-button">
                                        Unlock Details
                                    </a>
                                </div>

                            </div>


                            <div class="ghadeer-detail-card" data-lead-popup-open>

                                <div class="ghadeer-detail-lock">
                                    🔒
                                </div>

                                <div class="ghadeer-detail-content">
                                    <h3>Floor Plans</h3>

                                    <p>
                                        Every layout, including the villa with pool option.
                                    </p>

                                    <a href="#enquiry" class="ghadeer-detail-button">
                                        Unlock Details
                                    </a>
                                </div>

                            </div>


                            <div class="ghadeer-detail-card" data-lead-popup-open>

                                <div class="ghadeer-detail-lock">
                                    🔒
                                </div>

                                <div class="ghadeer-detail-content">
                                    <h3>Interior Finishes</h3>

                                    <p>
                                        Light and dark interior finish schemes.
                                    </p>

                                    <a href="#enquiry" class="ghadeer-detail-button">
                                        Unlock Details
                                    </a>
                                </div>

                            </div>


                            <div class="ghadeer-detail-card" data-lead-popup-open>

                                <div class="ghadeer-detail-lock">
                                    🔒
                                </div>

                                <div class="ghadeer-detail-content">
                                    <h3>Live Availability</h3>

                                    <p>
                                        Which units and plots are still open.
                                    </p>

                                    <a href="#enquiry" class="ghadeer-detail-button">
                                        Unlock Details
                                    </a>
                                </div>

                            </div>


                            {{-- 6th CTA CARD --}}
                            <div class="ghadeer-detail-card ghadeer-detail-card-cta" data-lead-popup-open>

                                <div class="ghadeer-detail-lock">
                                    🔓
                                </div>

                                <div class="ghadeer-detail-content">

                                    <h3>Unlock the Details</h3>

                                    <p>
                                        Get the latest prices, floor plans, payment schedule and live availability for Al Ghadeer Parks.
                                    </p>

                                    <a href="#enquiry"
                                        class="ghadeer-detail-button"
                                        data-lead-popup-open>
                                        Request Full Details
                                    </a>

                                </div>

                            </div>

                        </div>

         

                    </div>

                </div>

            </section>



<section class="landing-about-v2" id="about">

    <div class="landing-gallery-container">

        <div>

            {{-- =====================================================
                ABOUT CONTENT
                ===================================================== --}}

            <div class="landing-about-v2-content">

                <span class="landing-about-v2-eyebrow">
                    Live Where Life Connects
                </span>

                <h2 class="landing-about-v2-title">
                    Al Ghadeer Parks: The Next Chapter of Aldar's Al Ghadeer
                </h2>

                <p class="landing-about-v2-description">
                    Al Ghadeer Parks is Aldar's new community of 2 and 3-bedroom
                    townhouses and 4-bedroom villas within Al Ghadeer, part of the
                    Seih Al Sedeirah masterplan between Abu Dhabi and Dubai. The homes
                    open onto private gardens and shaded terraces. Around them are
                    parks, tree-lined walkways and streets designed for pedestrians,
                    so families can live outdoors all year.
                </p>

                <div class="landing-reach">

                    <div class="landing-reach__features">

                        {{-- 1 --}}
                        <div class="landing-reach__feature">

                            <div class="landing-reach__feature-icon">
                                <x-landing-icon name="home" />
                            </div>

                            <h4>
                                2 & 3-Bedroom Townhouses
                            </h4>

                            <p>
                                Contemporary townhouses designed around comfortable family living.
                            </p>

                        </div>


                        {{-- 2 --}}
                        <div class="landing-reach__feature">

                            <div class="landing-reach__feature-icon">
                                <x-landing-icon name="home" />
                            </div>

                            <h4>
                                4-Bedroom Villas
                            </h4>

                            <p>
                                Spacious villas with private gardens and shaded terraces.
                            </p>

                        </div>


                        {{-- 3 --}}
                        <div class="landing-reach__feature">

                            <div class="landing-reach__feature-icon">
                                <x-landing-icon name="location" />
                            </div>

                            <h4>
                                Between Abu Dhabi & Dubai
                            </h4>

                            <p>
                                Located within the Seih Al Sedeirah masterplan at Al Ghadeer.
                            </p>

                        </div>


                        {{-- 4 --}}
                        <div class="landing-reach__feature">

                            <div class="landing-reach__feature-icon">
                                <x-landing-icon name="beach" />
                            </div>

                            <h4>
                                Private Outdoor Spaces
                            </h4>

                            <p>
                                Homes open onto private gardens and shaded terraces.
                            </p>

                        </div>


                        {{-- 5 --}}
                        <div class="landing-reach__feature">

                            <div class="landing-reach__feature-icon">
                                <x-landing-icon name="diamond" />
                            </div>

                            <h4>
                                Parks & Green Walkways
                            </h4>

                            <p>
                                Tree-lined walkways and landscaped parks create an outdoor-focused setting.
                            </p>

                        </div>


                        {{-- 6 --}}
                        <div class="landing-reach__feature">

                            <div class="landing-reach__feature-icon">
                                <x-landing-icon name="developer" />
                            </div>

                            <h4>
                                By Aldar
                            </h4>

                            <p>
                                A new residential chapter within Aldar's Al Ghadeer community.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


            
            <!-- <section class=" landing-about-v2" id="downloads">

                <div class="landing-gallery-container">

                    <div class="landing-plan-heading">

                        <span class="landing-about-v2-eyebrow">
                            PLANS
                        </span>

                        <h2 class="landing-about-v2-title">
                            Floor Plans
                        </h2>

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
                                    SHOW 4 BR FlOOR PLAN
                                </span>

                            </button>

                            <div class="landing-plan-card-footer">

                                <h3>
                                    4 Bedroom Villa
                                </h3>

                                <p>
                                    BUA: 437 Sq.M | Plot: 711 Sq.M

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
                                    SHOW 5 BR VILLA FlOOR PLAN
                                </span>

                            </button>

                            <div class="landing-plan-card-footer">

                                <h3>
                                    5 Bedroom Villa
                                </h3>

                                <p>
                                    BUA: 482 Sq.M | Plot: 828 Sq.M

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
                                    SHOW 6 BR VILLA FlOOR PLAN
                                </span>

                            </button>

                            <div class="landing-plan-card-footer">

                                <h3>
                                    6 Bedroom Villa
                                </h3>

                                <p>
                                    BUA: 538 Sq.M | Plot: 936 Sq.M

                                </p>



                            </div>

                        </article>
                    </div>

                </div>
            </section> -->

            <section class="section-villas-showcase landing-about-v2" id="properties">
    <div class="landing-gallery-container">

        <div class="showcase-header">
            <span class="landing-about-v2-eyebrow">RESIDENCE COLLECTION</span>

            <h2 class="landing-about-v2-title">
                Al Ghadeer Parks Townhouses & Villas
            </h2>

            <p class="showcase-description">
                453 homes, four ways to live.
            </p>
        </div>

        <div class="villas-grid">

            <div class="villa-card">
                <div class="villa-image-wrapper">
                    <img src="{{ asset('assets/img/landing/ghadeer-parks/2-br-townhouse.webp') }}"
                         alt=" Al Ghadeer Parks by Aldar 2 Bedroom Townhouse"
                         class="villa-image">
                    <span class="villa-tag">2 BEDROOM</span>
                </div>

                <div class="villa-content">
                    <h3 class="villa-name">2 BR Townhouse</h3>

                    <p class="villa-subtext">
                        1,340+ sqft
                    </p>

                    <div class="villa-specs-grid">
                        <div class="spec-box">
                            <span class="spec-label">SIZE</span>
                            <span class="spec-value">1,340+ sqft</span>
                        </div>

                        <div class="spec-box">
                            <span class="spec-label">PRICE</span>
                            <span class="spec-value">From AED 1.9M</span>
                        </div>
                    </div>

                    <div class="villa-actions">
                        <button type="button" class="btn-villa-secondary" data-lead-popup-open>
                            <span>Floor Plan</span>
                        </button>

                        <button type="button" class="btn-villa-primary" data-lead-popup-open>
                            <span>Enquire</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="villa-card">
                <div class="villa-image-wrapper">
                    <img src="{{ asset('assets/img/landing/ghadeer-parks/3-br-townhouse.webp') }}"
                         alt="Al Ghadeer Parks by Aldar 3 Bedroom Townhouse"
                         class="villa-image">
                    <span class="villa-tag">3 BEDROOM</span>
                </div>

                <div class="villa-content">
                    <h3 class="villa-name">3 BR Townhouse</h3>

                    <p class="villa-subtext">
                        1,540+ sqft
                    </p>

                    <div class="villa-specs-grid">
                        <div class="spec-box">
                            <span class="spec-label">SIZE</span>
                            <span class="spec-value">1,540+ sqft</span>
                        </div>

                        <div class="spec-box">
                            <span class="spec-label">PRICE</span>
                            <span class="spec-value">On request</span>
                        </div>
                    </div>

                    <div class="villa-actions">
                        <button type="button" class="btn-villa-secondary" data-lead-popup-open>
                            <span>Floor Plan</span>
                        </button>

                        <button type="button" class="btn-villa-primary" data-lead-popup-open>
                            <span>Enquire</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="villa-card">
                <div class="villa-image-wrapper">
                    <img src="{{ asset('assets/img/landing/ghadeer-parks/3-br-corner-townhouse.webp') }}"
                         alt="Al Ghadeer Parks by Aldar 3 Bedroom Corner Townhouse"
                         class="villa-image">
                    <span class="villa-tag">3 BEDROOM</span>
                </div>

                <div class="villa-content">
                    <h3 class="villa-name">3 BR Corner Townhouse</h3>

                    <p class="villa-subtext">
                        1,570+ sqft
                    </p>

                    <div class="villa-specs-grid">
                        <div class="spec-box">
                            <span class="spec-label">SIZE</span>
                            <span class="spec-value">1,570+ sqft</span>
                        </div>

                        <div class="spec-box">
                            <span class="spec-label">PRICE</span>
                            <span class="spec-value">On request</span>
                        </div>
                    </div>

                    <div class="villa-actions">
                        <button type="button" class="btn-villa-secondary" data-lead-popup-open>
                            <span>Floor Plan</span>
                        </button>

                        <button type="button" class="btn-villa-primary" data-lead-popup-open>
                            <span>Enquire</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="villa-card">
                <div class="villa-image-wrapper">
                    <img src="{{ asset('assets/img/landing/ghadeer-parks/4-br-villa.webp') }}"
                         alt="Al Ghadeer Parks by Aldar 4 Bedroom Villa"
                         class="villa-image">
                    <span class="villa-tag">4 BEDROOM</span>
                </div>

                <div class="villa-content">
                    <h3 class="villa-name">4 BR Villa</h3>

                    <p class="villa-subtext">
                        2,160+ sqft
                    </p>

                    <div class="villa-specs-grid">
                        <div class="spec-box">
                            <span class="spec-label">SIZE</span>
                            <span class="spec-value">2,160+ sqft</span>
                        </div>

                        <div class="spec-box">
                            <span class="spec-label">PRICE</span>
                            <span class="spec-value">From AED 3.3M</span>
                        </div>
                    </div>

                    <div class="villa-actions">
                        <button type="button" class="btn-villa-secondary" data-lead-popup-open>
                            <span>Floor Plan</span>
                        </button>

                        <button type="button" class="btn-villa-primary" data-lead-popup-open>
                            <span>Enquire</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <div class="ghadeer-properties-banner">
            <div class="ghadeer-properties-banner-content">
                <p>
                    Only 71 four-bedroom villas in this launch.
                </p>
            </div>

            <div class="ghadeer-properties-banner-action">
                <button type="button" class="btn-villa-secondary" data-lead-popup-open>
                    <span>Get Prices for All Home Types</span>
                </button>
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

            <h2 class="landing-about-v2-title text-white">
                Al Ghadeer Parks Payment Plan
            </h2>

            <p class="landing-about-v2-description mb-lg text-white">
                Secure your home with a flexible payment plan across booking, construction and handover.
            </p>

        </div>

        <div class="bg-white payment-plan-padding">

            <div class="strip-metrics">

                <div class="strip-col">
                    <div class="strip-number">5%</div>
                    <div class="strip-label">On Booking</div>
                </div>

                <div class="strip-col">
                    <div class="strip-number">50%</div>
                    <div class="strip-label">During Construction</div>
                </div>

                <div class="strip-col">
                    <div class="strip-number">45%</div>
                    <div class="strip-label">On Handover<br>(Q2 2031)</div>
                </div>

            </div>

            <div class="strip-divider">
                <span></span>
                <span></span>
            </div>

            <p class="landing-about-v2-description mb-lg">
                Construction instalments are spread from <strong>2027 to 2030.</strong>
                Request the full schedule to see every date.
            </p>

            <div class="landing-payment-actions">

                <button
                    type="button"
                    class="landing-payment-btn landing-payment-btn-outline"
                    data-lead-popup-open
                    data-request-type="payment-plan">

                    GET THE PAYMENT SCHEDULE

                </button>

            </div>

        </div>

    </div>

</section>



            




            <section class="landing-amenities-v2 landing-about-v2" id="amenities">

    <div class="landing-gallery-container">

        <div class="landing-amenities-v2-heading">
            <span class="landing-dark-eyebrow text-white">
                COMMUNITY AMENITIES
            </span>

            <h2 class="landing-about-v2-title text-white">
                Al Ghadeer Parks Amenities
            </h2>

            <p class="landing-about-v2-description mb-lg text-white">
                Everything a family needs, outside your door.
            </p>
        </div>

        <div class="amenities-filter-bar">

            <button class="filter-btn active" data-filter="family">
                Family &amp; Recreation
            </button>

            <button class="filter-btn" data-filter="community">
                Community &amp; Outdoor Living
            </button>

        </div>

        <div class="bento-amenities-grid">

            <div class="bento-card" data-category="family">
                <div class="bento-icon-wrapper">
                    <x-landing-icon name="swimming" />
                </div>
                <div class="bento-content">
                    <h3>Swimming Pool</h3>
                    <p>
                        A refreshing space for residents to swim, relax and enjoy time outdoors.
                    </p>
                </div>
            </div>

            <div class="bento-card" data-category="family">
                <div class="bento-icon-wrapper">
                    <x-landing-icon name="water" />
                </div>
                <div class="bento-content">
                    <h3>Splash Pad</h3>
                    <p>
                        A playful water area designed for younger residents to cool off and enjoy outdoor play.
                    </p>
                </div>
            </div>

            <div class="bento-card" data-category="family">
                <div class="bento-icon-wrapper">
                    <x-landing-icon name="kids-play" />
                </div>
                <div class="bento-content">
                    <h3>Kids' Play Areas</h3>
                    <p>
                        Dedicated spaces where children can play, explore and stay active outdoors.
                    </p>
                </div>
            </div>

            <div class="bento-card" data-category="family">
                <div class="bento-icon-wrapper">
                    <x-landing-icon name="sports-court" />
                </div>
                <div class="bento-content">
                    <h3>Multi-Sports Area</h3>
                    <p>
                        A flexible sports space for games, recreation and everyday active living.
                    </p>
                </div>
            </div>

            <div class="bento-card is-hidden" data-category="community">
                <div class="bento-icon-wrapper">
                    <x-landing-icon name="building-2" />
                </div>
                <div class="bento-content">
                    <h3>Community Centre</h3>
                    <p>
                        A central destination for residents to connect, gather and participate in community activities.
                    </p>
                </div>
            </div>

            <div class="bento-card is-hidden" data-category="community">
                <div class="bento-icon-wrapper">
                    <x-landing-icon name="calendar" />
                </div>
                <div class="bento-content">
                    <h3>Events Lawn</h3>
                    <p>
                        An open landscaped setting for community events, celebrations and gatherings.
                    </p>
                </div>
            </div>

            <div class="bento-card is-hidden" data-category="community">
                <div class="bento-icon-wrapper">
                    <x-landing-icon name="star" />
                </div>
                <div class="bento-content">
                    <h3>Desert Stargazing Lawns</h3>
                    <p>
                        Open lawns offering a peaceful setting to enjoy the desert landscape and night sky.
                    </p>
                </div>
            </div>

            <div class="bento-card is-hidden" data-category="community">
                <div class="bento-icon-wrapper">
                    <x-landing-icon name="leaf" />
                </div>
                <div class="bento-content">
                    <h3>Shaded Walkways</h3>
                    <p>
                        Comfortable shaded routes connecting homes, parks and community spaces.
                    </p>
                </div>
            </div>

            <div class="bento-card is-hidden" data-category="community">
                <div class="bento-icon-wrapper">
                    <x-landing-icon name="jogging" />
                </div>
                <div class="bento-content">
                    <h3>Pedestrian-Friendly Streets</h3>
                    <p>
                        Streets designed to make walking and everyday outdoor movement part of community life.
                    </p>
                </div>
            </div>

            <div class="bento-card is-hidden" data-category="community">
                <div class="bento-icon-wrapper">
                    <x-landing-icon name="child" />
                </div>
                <div class="bento-content">
                    <h3>Al Ghadeer British School</h3>
                    <p>
                        Al Ghadeer British School is located within the wider Al Ghadeer community.
                    </p>
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

                            EXPLORE GALLERY BROCHURE

                        </button>



                    </div>

                </div>
            </section>

           

<section class="section-location landing-about-v2" id="location">

    <div class="landing-gallery-container">

        <div class="location-header">

            <span class="landing-about-v2-eyebrow">
                PRIME LOCATION
            </span>

            <h2 class="landing-about-v2-title">
                Al Ghadeer Parks Location
            </h2>

            <p class="location-description">
                <strong>Between Abu Dhabi &amp; Dubai</strong>, Al Ghadeer Parks offers convenient access to both cities, international airports and key destinations across the UAE.
                                Close to <strong>Dubai South, Expo City, Jebel Ali and KIZAD</strong>. With two international airports nearby, residents can reach <strong>265+ destinations worldwide</strong>.

            </p>

        </div>

        <div class="location-grid">

            <div class="map-wrapper">

                <iframe
                    class="map-iframe"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d155935.60765187876!2d54.97819988975646!3d24.89132806269854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f09754e4d3cbb%3A0x81b50bd176704f91!2sAl%20Ghadeer%20Village%20-%20Abu%20Dhabi%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sin!4v1790857356939!5m2!1sen!2sin"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

                <div class="map-overlay-badge">
                    <span class="badge-dot"></span>
                    <span>Al Ghadeer, Abu Dhabi</span>
                </div>

            </div>

            <div class="location-highlights">

                <h3 class="highlights-title">
                    Key Connectivity
                </h3>

                <ul class="highlights-list">

                    <li>
                        <div class="time-badge">16 MIN</div>
                        <div class="highlight-info">
                            <strong>Al Maktoum International Airport</strong>
                            <span>International air connectivity from DWC</span>
                        </div>
                    </li>

                    <li>
                        <div class="time-badge">30 MIN</div>
                        <div class="highlight-info">
                            <strong>Zayed International Airport</strong>
                            <span>Convenient access to Abu Dhabi's international airport</span>
                        </div>
                    </li>

                    <li>
                        <div class="time-badge">40 MIN</div>
                        <div class="highlight-info">
                            <strong>Abu Dhabi</strong>
                            <span>Direct access to the UAE capital</span>
                        </div>
                    </li>

                    <li>
                        <div class="time-badge">45 MIN</div>
                        <div class="highlight-info">
                            <strong>Dubai International Airport</strong>
                            <span>Global travel connectivity from DXB</span>
                        </div>
                    </li>

                </ul>

                <div class="location-action">

                    <button
                        type="button"
                        class="btn-get-directions"
                        onclick="window.open('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d155935.60765187876!2d54.97819988975646!3d24.89132806269854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f09754e4d3cbb%3A0x81b50bd176704f91!2sAl%20Ghadeer%20Village%20-%20Abu%20Dhabi%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sin!4v1790857356939!5m2!1sen!2sin', '_blank')">

                        <x-landing-icon name="location" />

                        <span>Open in Google Maps</span>

                    </button>

                </div>

            </div>

        </div>


    </div>

</section>
 <section class="section-why-yas-riva landing-about-v2" id="why-yas-riva">
    <div class="landing-gallery-container">

        <div class="why-header">
            <span class="landing-about-v2-eyebrow">
                WHY BUY AT LAUNCH
            </span>

            <h2 class="landing-about-v2-title">
                Why Buy at Al Ghadeer Parks Now
            </h2>

            <p class="why-description">
                Al Ghadeer Parks offers a new opportunity within Aldar's established Al Ghadeer community, combining a low entry point with a strategic location between Abu Dhabi and Dubai.
            </p>
        </div>

        <div class="why-attractions-box">

            <div class="attractions-heading">
                <span class="attractions-label">
                    KEY REASONS TO BUY
                </span>

                <p>
                    Three key considerations for the Al Ghadeer Parks launch
                </p>
            </div>

            <div class="attractions-grid">

                <div class="attraction-pill">
                    <x-landing-icon name="developer" />
                    <span>
                        <strong>A proven community</strong>
                        <small>
                            Aldar reports that earlier Al Ghadeer phases sold out ahead of each new launch. This is Aldar's own claim, so it's worded as "Aldar reports".
                        </small>
                    </span>
                </div>

                <div class="attraction-pill">
                    <x-landing-icon name="coins" />
                    <span>
                        <strong>Low entry point</strong>
                        <small>
                            5% down, and 45% isn't due until handover.
                        </small>
                    </span>
                </div>

                <div class="attraction-pill">
                    <x-landing-icon name="location" />
                    <span>
                        <strong>A growth corridor</strong>
                        <small>
                            The area is between the two emirates, near the expanding Al Maktoum International Airport.
                        </small>
                    </span>
                </div>

            </div>

        </div>

    </div>
</section>


<section class="section-villas-sale-white landing-about-v2" id="how-it-works">
    <div class="landing-gallery-container">

        <div class="sale-header">
            <span class="landing-about-v2-eyebrow">
                HOW IT WORKS
            </span>

            <h2 class="landing-about-v2-title">
                How It Works
            </h2>

            <p class="sale-description">
                Get the information you need about Al Ghadeer Parks in three simple steps.
            </p>
        </div>

        <div class="registration-block">

            <p class="register-lead">
                Your next steps:
            </p>

            <ul class="registration-list">

                <li>
                    

                    <span>
                        <strong>1. Request the details.</strong>
                        Takes 30 seconds.
                    </span>
                </li>

                <li>
                   

                    <span>
                        <strong>2. Get prices, floor plans and availability on WhatsApp.</strong>
                    </span>
                </li>

                <li>
                    

                    <span>
                        <strong>3. Choose your home and reserve it with 5%.</strong>
                    </span>
                </li>

            </ul>

        </div>

        <div class="sale-cta-wrapper">
            <button type="button" class="btn-enquire-now" data-lead-popup-open>
                <span>Get Al Ghadeer Parks Details</span>
                <x-landing-icon name="arrow-right" />
            </button>
        </div>

    </div>
</section>

            <section class="section-faq landing-about-v2" id="faq">
    <div class="landing-gallery-container">

        <div class="faq-header">
            <span class="landing-about-v2-eyebrow">
                FREQUENTLY ASKED QUESTIONS
            </span>

            <h2 class="landing-about-v2-title">
                Al Ghadeer Parks FAQs
            </h2>
        </div>

        <div class="faq-list">

            <details class="faq-item" open>
                <summary class="faq-question">
                    <span>What is the starting price at Al Ghadeer Parks?</span>
                    <span class="faq-icon"></span>
                </summary>

                <div class="faq-answer">
                    <p>
                        Townhouses start from <strong>AED 1.9M</strong> and 4-bedroom villas from <strong>AED 3.3M</strong>.
                    </p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-question">
                    <span>What is the payment plan?</span>
                    <span class="faq-icon"></span>
                </summary>

                <div class="faq-answer">
                    <p>
                        The payment plan is <strong>5% on booking, 50% during construction and 45% on handover</strong>.
                    </p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-question">
                    <span>When is handover?</span>
                    <span class="faq-icon"></span>
                </summary>

                <div class="faq-answer">
                    <p>
                        Handover is estimated for <strong>Q2 2031</strong>.
                    </p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-question">
                    <span>Who is the developer?</span>
                    <span class="faq-icon"></span>
                </summary>

                <div class="faq-answer">
                    <p>
                        <strong>Aldar</strong>, the developer behind Yas Island, Saadiyat and Al Ghadeer.
                    </p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-question">
                    <span>Where is Al Ghadeer Parks?</span>
                    <span class="faq-icon"></span>
                </summary>

                <div class="faq-answer">
                    <p>
                        Al Ghadeer Parks is located in <strong>Al Ghadeer, between Abu Dhabi and Dubai</strong>, approximately 16 minutes from Al Maktoum International Airport.
                    </p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-question">
                    <span>Does it qualify for the Golden Visa?</span>
                    <span class="faq-icon"></span>
                </summary>

                <div class="faq-answer">
                    <p>
                        <strong>3-bedroom townhouses and 4-bedroom villas</strong> are priced above the qualifying value.
                    </p>
                </div>
            </details>

        </div>

    </div>
</section>


            




            <section class="section-developer landing-about-v2" id="developer">
    <div class="landing-gallery-container">

        <div class="developer-header">
            <span class="landing-about-v2-eyebrow">THE DEVELOPER</span>
            <h2 class="landing-about-v2-title">About Aldar Properties</h2>
            <p class="developer-lead">
                <strong>Aldar Properties</strong> is the developer behind Al Ghadeer Parks, continuing the development of one of Abu Dhabi's established residential communities between Abu Dhabi and Dubai.
            </p>
        </div>

        <div class="developer-stats-grid">
            <div class="stat-box">
                <span class="stat-value">20+ YRS</span>
                <span class="stat-label">OF DEVELOPMENT EXPERIENCE</span>
            </div>
            <div class="stat-box">
                <span class="stat-value">ABU DHABI</span>
                <span class="stat-label">HEADQUARTERED DEVELOPER</span>
            </div>
            <div class="stat-box">
                <span class="stat-value">AL GHadeer</span>
                <span class="stat-label">ESTABLISHED COMMUNITY</span>
            </div>
        </div>

        <div class="developer-body">
            <p>
                Aldar has developed communities and destinations across Abu Dhabi, including Yas Island, Saadiyat Island, Al Reem Island and Al Ghadeer.
            </p>
            <p>
                Al Ghadeer Parks represents the next chapter of the Al Ghadeer community, introducing 2 and 3-bedroom townhouses and 4-bedroom villas within a landscaped, family-focused setting.
            </p>
        </div>

        <div class="developer-pillars">
            <div class="pillar-item">
                <div class="pillar-icon">
                    <x-landing-icon name="world-class" />
                </div>
                <div>
                    <strong>Established Developer</strong>
                    <span>Aldar has delivered residential communities and major destinations across Abu Dhabi and the UAE.</span>
                </div>
            </div>

            <div class="pillar-item">
                <div class="pillar-icon">
                    <x-landing-icon name="investment" />
                </div>
                <div>
                    <strong>Al Ghadeer Community</strong>
                    <span>Al Ghadeer Parks adds a new collection of townhouses and villas to Aldar's established community.</span>
                </div>
            </div>
        </div>

    </div>
</section>


        </div>





        <aside class="landing-side-form" id="landingSideForm">

            <div class="landing-side-form-inner">

                @include('partials.lead-form-ghadeer-parks', [
                'formId' => 'landing-about-form',
                'heading' => 'Get Launch Prices & Availability',
                'source' => 'ghadeer_parks_floating_form',
                'buttonText' => 'SUBMIT',

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

            @include('partials.lead-form-ghadeer-parks', [
            'formId' => 'landing-popup-form',
            'heading' => 'Get Launch Prices & Availability',


            'source' => 'ghadeer_parks_popup',
            'propertyId' => $property->id,
            'developerId' => $property->developer_id,
            'action' => route('landing.leads.store'),
            ])

        </div>

    </div>


    {{-- =====================================================
    DEVELOPER + COMMUNITY
===================================================== --}}

    <section >
            <div class="landing-gallery-container ghadeer-enquiry-section">
    <div class="ghadeer-enquiry-left">
        <span>AL GHADEER PARKS</span>

        <h2>Be First in Line at Al Ghadeer Parks</h2>

        <p>
            Get launch prices, floor plans and availability sent to your WhatsApp.
        </p>

        <button type="button" data-lead-popup-open>
            Send Me the Details
        </button>
    </div>

    <div class="ghadeer-enquiry-right">
         <div class="landing-side-form-inner form-width-80">
        @include('partials.lead-form-ghadeer-parks', [
            'formId' => 'landing-image-form',
            'heading' => 'Get Launch Prices & Availability',
            'source' => 'ghadeer_parks_footer_form',
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
        href="https://wa.me/971555342535?text=Hi%2C%20I%E2%80%99m%20interested%20to%20know%20more%20about%20Ghadeer%20Parks%20by%20Aldar.%20Please%20share%20all%20relevant%20details.%20Thank%20you."
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
@vite('resources/js/landing/ghadeer-parks.js')

@endpush