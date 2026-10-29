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

@section('canonical', 'https://aldar-dubai.sales-centre.net')


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

'url' => 'https://aldar-dubai.sales-centre.net',
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
'url' => 'https://aldar-dubai.sales-centre.net',
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
@vite('resources/css/landing/aldar-new.css')
@endpush

@section('content')

<header class="landing-header">
    <div class="landing-header-inner">



        <a href="#home" class="landing-logo">
            <img
                src="{{ asset('assets/img/landing/aldar-new/ALDAR_logo.svg') }}"
                alt="{{ $property->title }}">
        </a>
        <nav class="landing-nav">


            <a href="#register">
                Register
            </a>

            <a href="#overview">
                Overview
            </a>

            <a href="#location">
                Location
            </a>
            <a href="#aldar-dubai">
                About
            </a>
 
            <a href="#" data-lead-popup-open>contact</a>

            <a
                href="#"
                class="landing-header-btn btn-champagne btn-nav" data-lead-popup-open>
                GET EARLY ACCESS
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

                 <a href="#register">
                Register
            </a>

            <a href="#overview">
                Overview
            </a>

            <a href="#location">
                Location
            </a>
            <a href="#aldar-dubai">
                About
            </a>
 
            <a href="#" data-lead-popup-open>contact</a>

            <a
                href="#"
                class="landing-mobile-contact " data-lead-popup-open data-lead-source="get_latest_prices">
                GET EARLY ACCESS


            </a>

        </nav>

    </div>

</header>

<main>

    @if ($coverMedia)

    <section class="avanor-property-hero" id="register">

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

                <span class="avanor-property-slide-eyebrow" id="dynamic-ad-eyebrow">
    UPCOMING LAUNCH NEAR · DUBAI SILICON OASIS
</span>

<h1 class="avanor-property-slide-title" id="dynamic-ad-h1">
    {{ $property->title }}
</h1>

<p class="avanor-property-slide-description" id="dynamic-ad-description">
    Villas and townhouses by Aldar and Dubai Holding, expected to launch
    before the end of 2026. Register now and get prices, floor plans and the payment plan
    first.
</p>


           



                <fieldset class="ghadeer-parks-highlights">

    <legend class="ghadeer-parks-highlights-heading">
        PRIORITY REGISTRATION
    </legend>

    <div class="ghadeer-parks-highlights-items">
        <ul class="rv-hero__points">
            <li>Priority list for launch day</li>
            <li>Launch details sent to your WhatsApp</li>
            <li>No obligation</li>
        </ul>
    </div>

</fieldset>
 <a href="#enquiry" class="landing-property-cta" data-lead-popup-open data-lead-source="get_early_access">
                        GET EARLY ACCESS
                    </a>
          

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




                        @include('partials.lead-form-aldar-new', [
                        'formId' => 'landing-about-form',
                        'heading' => 'Register for Launch Details',
                        'source' => 'mobile_form',
                        'buttonText' => 'Register My Interest',
                        'propertyId' => $property->id,
                        'developerId' => $property->developer_id,
                        ])



                    </div>

                </div>
            </section>






            <section class="landing-about-v2" id="overview">
                <div class="landing-gallery-container">

                    <div class="landing-about-v2-content">
                        <span class="landing-about-v2-eyebrow">Overview</span>

                        <h2 class="landing-about-v2-title">
                            What we know so far
                        </h2>

                        <p class="landing-about-v2-description">
                            Aldar has confirmed plans for a large villa and townhouse community near Dubai Silicon Oasis.
It’s being developed with Dubai Holding and is expected to launch before the end of 2026.
                        </p>
                    </div>

                    <div class="launch-info-grid">

                        <!-- Developer -->
                        <article class="launch-info-card">
                            <div class="launch-info-card-top">
                                <span class="launch-info-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M3 21h18M5 21V7l7-4 7 4v14M9 10h2m2 0h2M9 14h2m2 0h2M10 21v-3h4v3"
                                            stroke="currentColor" stroke-width="1.7"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span class="launch-info-badge confirmed">
                                    CONFIRMED
                                </span>
                            </div>

                            <h3>Developer</h3>
                            <p>Aldar Properties, with Dubai Holding.</p>
                        </article>

                        <!-- Location -->
                        <article class="launch-info-card">
                            <div class="launch-info-card-top">
                                <span class="launch-info-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"
                                            stroke="currentColor" stroke-width="1.7"
                                            stroke-linejoin="round" />
                                        <circle cx="12" cy="10" r="2.5"
                                            stroke="currentColor" stroke-width="1.7" />
                                    </svg>
                                </span>
                                <span class="launch-info-badge confirmed">
                                    CONFIRMED
                                </span>
                            </div>

                            <h3>Location</h3>
                            <p>Near Dubai Silicon Oasis, Dubai.</p>
                        </article>

                        <!-- Home types -->
                        <article class="launch-info-card">
                            <div class="launch-info-card-top">
                                <span class="launch-info-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="m3 11 9-7 9 7M5 10v10h14V10M9 20v-6h6v6"
                                            stroke="currentColor" stroke-width="1.7"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span class="launch-info-badge expected">
                                    EXPECTED
                                </span>
                            </div>

                            <h3>Home types</h3>
                            <p>Villas and townhouses, with details to be confirmed.</p>
                        </article>

                        <!-- Launch timing -->
                        <article class="launch-info-card">
                            <div class="launch-info-card-top">
                                <span class="launch-info-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <rect x="3.5" y="5.5" width="17" height="15"
                                            rx="1.5" stroke="currentColor" stroke-width="1.7" />
                                        <path d="M7.5 3v5M16.5 3v5M4 10h16m-10 5 2 2 4-4"
                                            stroke="currentColor" stroke-width="1.7"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span class="launch-info-badge expected">
                                    EXPECTED
                                </span>
                            </div>

                            <h3>Launch timing</h3>
                            <p>Expected before the end of 2026.</p>
                        </article>

                        <!-- Prices and payment plan -->
                        <article class="launch-info-card">
                            <div class="launch-info-card-top">
                                <span class="launch-info-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M20 13 11 22 2 13l11-11h7v11Z"
                                            stroke="currentColor" stroke-width="1.7"
                                            stroke-linejoin="round" />
                                        <circle cx="16" cy="7" r="1.3"
                                            stroke="currentColor" stroke-width="1.7" />
                                    </svg>
                                </span>
                                <span class="launch-info-badge at-launch">
                                    AT LAUNCH
                                </span>
                            </div>

                            <h3>Prices &amp; payment plan</h3>
                            <p>
                                To be announced. Registered clients receive
                                the details first.
                            </p>
                        </article>

                        <!-- Floor plans -->
                        <article class="launch-info-card bg-dark">
                            <div class="ghadeer-detail-card ghadeer-detail-card-cta" data-lead-popup-open data-lead-source="request_full_details">



                                <div class="ghadeer-detail-content">

                                    <h3>Get Launch Prices First</h3>

                                    <p>
                                        Get the latest prices, floor plans, payment schedule and live availability of New launch.
                                    </p>

                                    <a href="#enquiry"
                                        class="ghadeer-detail-button"
                                        data-lead-popup-open data-lead-source="get_full_details">
                                        Get Full Details
                                    </a>

                                </div>

                            </div>
                        </article>

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
                            Near Dubai Silicon Oasis
                        </h2>

                        <p class="location-description">
                            Dubai Silicon Oasis is an established community with
                            schools, retail, parks and quick road links. It sits along
                            <strong>Sheikh Mohammed bin Zayed Road (E311)</strong>
                            and <strong>Al Ain Road (E66)</strong>, with Downtown
                            Dubai and Dubai International Airport roughly
                            <strong>20–25 minutes’ drive away</strong>.
                            Aldar will confirm the exact site at launch.
                            Registered clients will receive the location map first.
                        </p>

                    </div>

                    <div class="location-grid">

                        <div class="map-wrapper">

                            <iframe
                                class="map-iframe"
                                src="https://www.google.com/maps?q=Dubai+Silicon+Oasis,+Dubai,+UAE&output=embed"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Dubai Silicon Oasis location map">
                            </iframe>

                            <div class="map-overlay-badge">
                                <span class="badge-dot"></span>
                                <span>Near Dubai Silicon Oasis, Dubai</span>
                            </div>

                        </div>

                        <div class="location-highlights">

                            <h3 class="highlights-title">
                                Key Connectivity
                            </h3>

                            <ul class="highlights-list">

                                <li>
                                    <div class="time-badge">20–25 MIN</div>
                                    <div class="highlight-info">
                                        <strong>Downtown Dubai</strong>
                                        <span>Access to central Dubai, shopping and entertainment.</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="time-badge">20–25 MIN</div>
                                    <div class="highlight-info">
                                        <strong>Dubai International Airport</strong>
                                        <span>Convenient access to DXB for international travel.</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="time-badge">E311</div>
                                    <div class="highlight-info">
                                        <strong>Sheikh Mohammed bin Zayed Road</strong>
                                        <span>Major road connection across Dubai and the UAE.</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="time-badge">E66</div>
                                    <div class="highlight-info">
                                        <strong>Al Ain Road</strong>
                                        <span>Road connectivity towards inland Dubai and Al Ain.</span>
                                    </div>
                                </li>

                            </ul>

                            <div class="location-action">

                                <button
                                    type="button"
                                    class="btn-get-directions"
                                    onclick="window.open('https://www.google.com/maps/search/?api=1&query=Dubai+Silicon+Oasis%2C+Dubai%2C+UAE', '_blank', 'noopener,noreferrer')">

                                    <x-landing-icon name="location" />

                                    <span>Explore Dubai Silicon Oasis</span>

                                </button>

                            </div>

                            <p class="location-disclaimer">
                                The exact community location will be confirmed by
                                Aldar at launch. Map shown for the general area only.
                                Registered clients will receive the location map first.
                            </p>

                        </div>

                    </div>

                </div>

            </section>





 
<section
    class="aldar-dubai-hero"
    id="aldar-dubai"
    style="--aldar-hero-bg: url('{{ asset('assets/img/landing/aldar-new/section-img.webp') }}');"
>
    <div class="aldar-dubai-hero__overlay"></div>

    <div class="aldar-dubai-hero__container">
        <div class="aldar-dubai-hero__content">

            <span class="aldar-dubai-hero__eyebrow">
     
                ALDAR IN DUBAI
            </span>

            <h2 class="aldar-dubai-hero__title">
                Aldar’s fourth<br>
                Dubai community
            </h2>

            <p class="aldar-dubai-hero__description">
                Aldar, the developer behind many of Abu Dhabi’s best-known
                communities, has already launched three Dubai projects:
                Haven, Athlon and The Wilds. This new community near Dubai
                Silicon Oasis will be its fourth.
            </p>


            <a href="#enquiry" class="landing-property-cta" data-lead-popup-open="" data-lead-source="join_the_priority_list">
                        Join the Priority List
                          <x-landing-icon name="arrow-right" />
                    </a>

        </div>
    </div>
</section>



            <section class="section-why-yas-riva landing-about-v2" id="why-register">

                <div class="landing-gallery-container">

                    <div class="why-header">
                        <span class="landing-about-v2-eyebrow">
                            WHY REGISTER NOW
                        </span>

                        <h2 class="landing-about-v2-title">
                            Why Register Now
                        </h2>

                        <p class="why-description">
                            Register your interest in Aldar’s upcoming Dubai community
                            near Dubai Silicon Oasis and be among the first to receive
                            launch details when they are announced.
                        </p>
                    </div>

                    <div class="why-attractions-box">

                        <div class="attractions-heading">
                            <span class="attractions-label">
                                YOUR REGISTRATION BENEFITS
                            </span>

                            <p>
                                Three reasons to join the priority list before launch
                            </p>
                        </div>

                        <div class="attractions-grid">

                            <div class="attraction-pill">
                                <x-landing-icon name="developer" />

                                <span>
                                    <strong>Launch-day access</strong>
                                    <small>
                                        New launches can move quickly. Registered buyers
                                        receive launch information first.
                                    </small>
                                </span>
                            </div>

                            <div class="attraction-pill">
                                <x-landing-icon name="coins" />

                                <span>
                                    <strong>Prices first</strong>
                                    <small>
                                        Receive the price list, floor plans and payment
                                        plan as soon as they are released.
                                    </small>
                                </span>
                            </div>

                            <div class="attraction-pill">
                                <x-landing-icon name="location" />

                                <span>
                                    <strong>Expert guidance</strong>
                                    <small>
                                        A licensed Avanor Capital advisor can help you
                                        compare unit types and make an informed decision
                                        when availability is announced.
                                    </small>
                                </span>
                            </div>

                        </div>

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
                            Aldar’s New Dubai Community FAQs
                        </h2>
                    </div>

                    <div class="faq-list">

                        <details class="faq-item" open>
                            <summary class="faq-question">
                                <span>When will it launch?</span>
                                <span class="faq-icon"></span>
                            </summary>

                            <div class="faq-answer">
                                <p>
                                    Aldar has said it plans to launch the community
                                    before the end of 2026. We’ll message registered
                                    clients as soon as a launch date is confirmed.
                                </p>
                            </div>
                        </details>

                        <details class="faq-item">
                            <summary class="faq-question">
                                <span>What will prices be?</span>
                                <span class="faq-icon"></span>
                            </summary>

                            <div class="faq-answer">
                                <p>
                                    Prices haven’t been announced yet. Register your
                                    interest and we’ll send you the price list and
                                    payment plan as soon as they’re released.
                                </p>
                            </div>
                        </details>

                        <details class="faq-item">
                            <summary class="faq-question">
                                <span>Is it called Greenwood?</span>
                                <span class="faq-icon"></span>
                            </summary>

                            <div class="faq-answer">
                                <p>
                                    Aldar hasn’t announced the official name yet.
                                    Some market reports refer to the project as
                                    <strong>“Greenwood”</strong>. We’ll confirm the
                                    name once Aldar makes an official announcement.
                                </p>
                            </div>
                        </details>

                        <details class="faq-item">
                            <summary class="faq-question">
                                <span>What types of homes will there be?</span>
                                <span class="faq-icon"></span>
                            </summary>

                            <div class="faq-answer">
                                <p>
                                    The planned community will offer
                                    <strong>villas and townhouses</strong>.
                                    Bedroom options and further property details
                                    will be confirmed at launch.
                                </p>
                            </div>
                        </details>

                        <details class="faq-item">
                            <summary class="faq-question">
                                <span>Where exactly is it?</span>
                                <span class="faq-icon"></span>
                            </summary>

                            <div class="faq-answer">
                                <p>
                                    The upcoming community is expected to be near
                                    <strong>Dubai Silicon Oasis, Dubai</strong>.
                                    Aldar will confirm the exact development site
                                    at launch. Registered clients will receive the
                                    location map first.
                                </p>
                            </div>
                        </details>

                        <details class="faq-item">
                            <summary class="faq-question">
                                <span>Is registering a commitment?</span>
                                <span class="faq-icon"></span>
                            </summary>

                            <div class="faq-answer">
                                <p>
                                    No. Registering your interest simply puts you
                                    on the priority list to receive launch details,
                                    prices, floor plans and the payment plan first.
                                    There is no obligation to purchase.
                                </p>
                            </div>
                        </details>

                    </div>

                </div>
            </section>











            <section class="section-developer landing-about-v2" id="developer">
                <div class="landing-gallery-container">

                    <div class="developer-header">
                        <span class="landing-about-v2-eyebrow">
                            THE DEVELOPER
                        </span>

                        <h2 class="landing-about-v2-title">
                            About Aldar Properties
                        </h2>

                        <p class="developer-lead">
                            <strong>Aldar Properties</strong> is one of the UAE’s
                            leading real estate developers, known for creating
                            residential communities and destinations across Abu Dhabi.
                            With existing projects in Dubai, Aldar is expanding its
                            presence with a fourth community near Dubai Silicon Oasis.
                        </p>
                    </div>

                    <div class="developer-stats-grid">

                        <div class="stat-box">
                            <span class="stat-value">ABU DHABI</span>
                            <span class="stat-label">
                                HOME TO ALDAR’S FLAGSHIP COMMUNITIES
                            </span>
                        </div>

                        <div class="stat-box">
                            <span class="stat-value">3 PROJECTS</span>
                            <span class="stat-label">
                                EXISTING DUBAI DEVELOPMENTS
                            </span>
                        </div>

                        <div class="stat-box">
                            <span class="stat-value">4TH COMMUNITY</span>
                            <span class="stat-label">
                                UPCOMING DUBAI DEVELOPMENT
                            </span>
                        </div>

                    </div>

                    <div class="developer-body">
                        <p>
                            Aldar has developed some of Abu Dhabi’s best-known
                            residential communities and destinations, including
                            Yas Island, Saadiyat Island and Al Reem Island.
                        </p>

                        <p>
                            In Dubai, its projects include <strong>Haven, Athlon
                                and The Wilds</strong>. The upcoming community near
                            Dubai Silicon Oasis is expected to be Aldar’s fourth
                            Dubai project, offering villas and townhouses.
                            The official project name, property details, prices
                            and payment plan are yet to be announced.
                        </p>
                    </div>

                    <div class="developer-pillars">

                        <div class="pillar-item">
                            <div class="pillar-icon">
                                <x-landing-icon name="world-class" />
                            </div>

                            <div>
                                <strong>Established Developer</strong>
                                <span>
                                    Aldar has built a portfolio of residential
                                    communities and major destinations across
                                    the UAE.
                                </span>
                            </div>
                        </div>

                        <div class="pillar-item">
                            <div class="pillar-icon">
                                <x-landing-icon name="investment" />
                            </div>

                            <div>
                                <strong>Expanding in Dubai</strong>
                                <span>
                                    Following Haven, Athlon and The Wilds,
                                    Aldar’s upcoming community near Dubai Silicon
                                    Oasis marks its next planned Dubai development.
                                </span>
                            </div>
                        </div>

                    </div>

                </div>
            </section>



        </div>





        <aside class="landing-side-form" id="landingSideForm">

            <div class="landing-side-form-inner">

                @include('partials.lead-form-aldar-new', [
                'formId' => 'landing-about-form',
                'heading' => 'Register for Launch Details',
                'source' => 'aldar_dubai_floating_side_form',
                'buttonText' => 'Register My Interest',
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

            @include('partials.lead-form-aldar-new', [
            'formId' => 'landing-popup-form',
            'heading' => 'Be first when Aldar launches in Dubai',

            'buttonText' => 'Register My Interest',

            'propertyId' => $property->id,
            'developerId' => $property->developer_id,
            'action' => route('landing.leads.store'),
            ])

        </div>

    </div>


    {{-- =====================================================
    DEVELOPER + COMMUNITY
===================================================== --}}

    <section>
        <div class="landing-gallery-container ghadeer-enquiry-section">

            <div class="ghadeer-enquiry-left"        style="--aldar-bg-image: url('{{ asset('assets/img/landing/aldar-new/aldar-new-footer-img.webp') }}');">
                <span class="footer-eyebrow">ALDAR’S NEW DUBAI COMMUNITY</span>

                <h2 class="footer-heading">Be First in Line for Aldar’s New Dubai Community</h2>

                <p class="footer-description">
                    Join the priority list to receive launch prices, floor plans,
                    the payment plan and location details on WhatsApp as soon as
                    they are announced.
                </p>

                <button
                    type="button"
                    data-lead-popup-open
                    data-lead-source="aldar_dubai_footer_priority_list">
                    Join the Priority List
                </button>
            </div>


            <div class="ghadeer-enquiry-right">
                <div class="landing-side-form-inner form-width-80">
                    @include('partials.lead-form-aldar-new', [
                    'formId' => 'landing-image-form',
                    'heading' => 'Register for Launch Details',
                    'source' => 'footer_form',

                    'propertyId' => $property->id,
                    'developerId' => $property->developer_id,
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
                    This page is operated by Avanor Capital L.L.C, a licensed Dubai real estate brokerage (RERA : 63012
                    ORN: 63296 ), and is not the official website of Aldar Properties or Dubai Holding.
                    Information is based on public reports and may change. The project name, prices, payment

                    plans and availability have not yet been announced and are subject to the developer’s terms.
                    Project names and trademarks belong to their respective owners.
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
    {{-- =====================================================
            MAIN FOOTER
        ===================================================== --}}



    <a
        href="https://wa.me/971555342535?text=Hi%2C%20I%E2%80%99m%20interested%20to%20know%20more%20about%20Aldar%20New%20Project%20At%20Dubai%20Silicon%20Oasis.%20Please%20share%20all%20relevant%20details.%20Thank%20you."
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
@vite('resources/js/landing/aldar-new.js')

@endpush