@extends('layouts.landing')


{{-- =====================================================
    SEO
===================================================== --}}

@if (!empty($propertyImageUrl))
@section('og_image', $propertyImageUrl)
@endif
@push('favicon')
<link rel="icon" type="image/png"
    href="{{ asset('assets/img/landing/riverside/favicon.png') }}">
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

@section('canonical', 'https://riverside.sales-centre.net')


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

'url' => 'https://riverside.sales-centre.net',
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
'url' => 'https://riverside.sales-centre.net',
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
@vite('resources/css/landing/riverside.css')
@endpush

@section('content')

<header class="landing-header">
    <div class="landing-header-inner">



        <a href="#home" class="landing-logo landing-logo-white">
            <img
                src="{{ asset('assets/img/landing/riverside/Riverside_Logo_White.svg') }}"
                alt="{{ $property->title }}">
        </a>

        <a href="#home" class="landing-logo landing-logo-black">
            <img
                src="{{ asset('assets/img/landing/riverside/Riverside_Logo_Black.svg') }}"
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





        </nav>
        <div class="landing-button">
            <a
                href="#"
                class="landing-header-btn btn-champagne btn-nav" data-lead-popup-open>
                GET LATEST PRICES
            </a>
        </div>
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
                src="{{ \App\Support\MediaUrl::fromMedia($coverMedia, 'cover_avif') }}"
                srcset="
                {{ \App\Support\MediaUrl::fromMedia($coverMedia, 'cover_mobile_avif') }} 768w,
                {{ \App\Support\MediaUrl::fromMedia($coverMedia, 'cover_tablet_avif') }} 1280w,
                {{ \App\Support\MediaUrl::fromMedia($coverMedia, 'cover_avif') }} 1920w
            "
                sizes="100vw"
                alt="{{ $property->project?->name ?? $property->title }}"
                class="rv-hero__image"
                fetchpriority="high"
                decoding="async">

            <div class="rv-hero__overlay"></div>

            <div class="rv-hero__content">

                <p class="rv-hero__offer">
                    Limited offer · 4% DLD waiver + 4% off, or a flat 8% discount
                </p>

                <h1 class="rv-hero__title" id="dynamic-ad-h1">
                    DAMAC Riverside Views


                </h1>

                <p class="rv-hero__sub">
                    Waterfront 1 &amp; 2-bedroom apartments in Dubai Investments Park, from AED 1.35M.
                </p>

                <ul class="rv-hero__points">
                    <li>Save up to 8% with the current offer</li>
                    <li>Pay up to 50% on completion</li>
                    <li>A swimming lagoon, floating cinema and boat-access restaurant in the community</li>
                </ul>

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




                        @include('partials.lead-form-riverside', [
                        'formId' => 'landing-about-form',
                        'heading' => 'GET EARLY ACCESS',
                        'source' => 'riverside_mobile_form',
                        'buttonText' => 'SUBMIT',
                        'propertyId' => $property->id,
                        'developerId' => $property->developer_id,
                        ])



                    </div>

                </div>
            </section>



            <section class="landing-developer-community landing-about-v2 footer-section rv-offer-section" id="about-dev" style="background-image: url('{{ asset('assets/img/landing/riverside/DAMAC_riverside-Project_BG_Image_16x9.jpg') }}')">
                <div class="landing-gallery-container">

                    <div class="rv-offer">

                        <h2 class="rv-offer__title">DAMAC Riverside Views Offer</h2>
                        <p class="rv-offer__sub">Choose the saving that suits you</p>

                        <div class="rv-offer__options">

                            <div class="rv-offer__card">
                                <span class="rv-offer__label">Option 1</span>
                                <h3 class="rv-offer__heading">4% DLD waiver + 4% off the price</h3>
                                <p class="rv-offer__text">Save on the Dubai Land Department fee and the price</p>
                            </div>

                            <span class="rv-offer__or">or</span>

                            <div class="rv-offer__card">
                                <span class="rv-offer__label">Option 2</span>
                                <h3 class="rv-offer__heading">8% off the price</h3>
                                <p class="rv-offer__text">The biggest cut to the purchase price</p>
                            </div>

                        </div>

                        <p class="rv-offer__note">
                            Not sure which saves you more? Our advisors will work out both options for the unit you choose.
                        </p>

                        <a href="#enquiry" class="float-bar__cta" data-lead-popup-open>
                            Calculate My Savings
                        </a>

                    </div>

                </div>
            </section>

@php
    $locked = [
        ['Offer price list',  'Prices after the discount for each apartment'],
        ['Payment plans',     'Both schedules, installment by installment'],
        ['Floor plans',       'Every 1 & 2 BR layout by building'],
        ['Building guide',    'The 8 clusters, from Marine and Capri to Royal and Azure'],
        ['Live availability', 'Which units and floors are open, and which qualify for the offer'],
    ];
@endphp

<section class="landing-about-v2 rv-lock-section" id="locked-details">
    <div class="landing-gallery-container">

        <h2 class="landing-about-v2-title rv-lock__title">
            Riverside Views Prices, Floor Plans &amp; Availability
        </h2>

        <div class="rv-lock__grid">
            @foreach ($locked as [$heading, $text])
                <article class="rv-lock__card">

    <div class="rv-lock__head">
        <span class="rv-lock__badge" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                <rect x="4" y="11" width="16" height="10" rx="2"/>
                <path d="M8 11V8a4 4 0 0 1 8 0v3"/>
            </svg>
        </span>

        <h3 class="rv-lock__heading">{{ $heading }}</h3>
    </div>

    <p class="rv-lock__text">{{ $text }}</p>

    {{-- blurred preview lines, purely decorative --}}
    <div class="rv-lock__preview" aria-hidden="true">
        <span></span><span></span><span></span>
    </div>

    <a href="#enquiry" class="float-bar__cta rv-lock__btn" data-lead-popup-open>
        Unlock the Details
    </a>

</article>
            @endforeach
        </div>

    </div>
</section>

<section class="landing-about-v2 rv-intro" id="about"
         style="background-image: url('{{ asset('assets/img/landing/riverside/damac-riverside-night-view.webp') }}')">
    <div class="landing-gallery-container">
        <div class="rv-intro__content">

            <h2 class="landing-about-v2-title rv-intro__title">
                DAMAC Riverside Views: Waterfront Apartments in Dubai Investments Park
            </h2>

            <p class="rv-intro__sub">Urban living elevated by the river</p>

            <p class="rv-intro__copy">
                The design takes its cue from the world's great river cities.
            </p>

            <ul class="rv-intro__cities" aria-label="Design inspiration">
                @foreach (['London', 'New York', 'Paris', 'Amsterdam', 'Rome'] as $city)
                    <li>{{ $city }}</li>
                @endforeach
            </ul>

            <p class="rv-intro__copy">
                DAMAC Riverside Views brings apartment towers to both banks of DAMAC Riverside's
                river, following the success of the community's townhouses. Eight clusters, named
                after shades of blue, pair city energy with open waterfront views, in what DAMAC
                calls Dubai's first riverside community.
            </p>

            <div class="rv-intro__badge">
                <strong>8</strong>
                <span>clusters named after<br>shades of blue</span>
            </div>

        </div>
    </div>
</section>

            <section class="landing-about-v2" id="properties">
                <div class="landing-gallery-container">
                    <div class="landing-about-v2-content">

                        <h2 class="landing-about-v2-title">
                            DAMAC Riverside Views 1 &amp; 2 Bedroom Apartments
                        </h2>

                        <div class="rv-apt__grid">

                            @php
                            $apartments = [
                            ['1 Bedroom', '~800–1,060 sqft', 'From AED 1.35M', 'Save up to 8%', asset('assets/img/landing/riverside/DAMAC-Riverside-1-BR.webp')],
                            ['2 Bedroom', '~1,200–1,500 sqft', 'From AED 1.9M', 'Save up to 8%', asset('assets/img/landing/riverside/DAMAC-Riverside-2-BR.webp')],
                            ];
                            @endphp

                            @foreach ($apartments as [$type, $size, $price, $offer, $image])
                            <div class="rv-apt__card">

                                <div class="rv-apt__media">
                                    <img src="{{ $image }}" alt="DAMAC Riverside Views {{ $type }} apartment" loading="lazy" decoding="async">
                                </div>

                                <div class="rv-apt__body">

                                    <h3 class="rv-apt__type">{{ $type }}</h3>

                                    <dl class="rv-apt__rows">
                                        <div class="rv-apt__row">
                                            <dt>Size</dt>
                                            <dd>{{ $size }}</dd>
                                        </div>
                                        <div class="rv-apt__row">
                                            <dt>List price</dt>
                                            <dd>{{ $price }}</dd>
                                        </div>
                                        <div class="rv-apt__row">
                                            <dt>With the offer</dt>
                                            <dd class="rv-apt__offer">{{ $offer }}</dd>
                                        </div>
                                    </dl>

                                </div>

                            </div>
                            @endforeach

                        </div>

                        <div class="rv-apt__action">
                            <a href="#enquiry" class="float-bar__cta" data-lead-popup-open>
                                Get My Offer Price
                            </a>
                        </div>

                    </div>
                </div>
            </section>

            <section class="landing-about-v2" id="payment-plan">
                <div class="landing-gallery-container">
                    <div class="landing-about-v2-content">

                        <h2 class="landing-about-v2-title">
                            DAMAC Riverside Views Payment Plan
                        </h2>

                        <p class="rv-pay__sub">Pay up to 50% on completion</p>

                        <p class="landing-about-v2-description">
                            Choose between plans with 50% or 40% due on completion. The rest is spread across
                            small monthly installments while the project is built.
                        </p>

                        <div class="rv-pay__plans">

                            @php
                            $plans = [
                            ['Plan 1', 50, 50],
                            ['Plan 2', 60, 40],
                            ];
                            @endphp

                            @foreach ($plans as [$name, $monthly, $completion])
                            <div class="rv-pay__plan">

                                <div class="rv-pay__plan-head">
                                    <span class="rv-pay__plan-name">{{ $name }}</span>
                                    <span class="rv-pay__plan-key">{{ $completion }}% on completion</span>
                                </div>

                                <div class="rv-pay__bar" role="img"
                                    aria-label="{{ $monthly }}% in monthly installments, {{ $completion }}% on completion">
                                    <span class="rv-pay__seg rv-pay__seg--monthly" style="width: {{ $monthly }}%">
                                        {{ $monthly }}%
                                    </span>
                                    <span class="rv-pay__seg rv-pay__seg--completion" style="width: {{ $completion }}%">
                                        {{ $completion }}%
                                    </span>
                                </div>

                                <div class="rv-pay__legend">
                                    <span>Monthly installments</span>
                                    <span>On completion</span>
                                </div>

                            </div>
                            @endforeach

                        </div>

                        <div class="rv-pay__action">
                            <a href="#enquiry" class="float-bar__cta" data-lead-popup-open>
                                Get the Payment Schedule
                            </a>
                        </div>

                    </div>
                </div>
            </section>



            <section class="landing-amenities-v2 landing-about-v2" id="amenities">

                <div class="landing-gallery-container">

                    <div class="landing-amenities-v2-heading">
                        <h2 class="landing-about-v2-title text-white">
                            DAMAC Riverside Views Amenities
                        </h2>

                        <p class="landing-about-v2-description mb-lg text-white">
                            A resort on the river
                        </p>
                    </div>

                    @php

    $amenityGroups = [

        'water' => [
            'label' => 'On the Water',
            'items' => [
                ['swimming', 'Malibu Cove', 'Swimming lagoon and private beach access'],
                ['water', 'Portofino', 'Waterfront restaurant reached by boat'],
                ['water', 'Floating Cinema', 'Open-air cinema experience on the water'],
                ['star', 'Floating Opera Stage', 'Live performances set against the sea'],
                ['leaf', 'Island Restaurant', 'Relaxed dining surrounded by water'],
            ],
        ],

        'wellness' => [
            'label' => 'Wellness',
            'items' => [
                ['leaf', 'Spa', 'Relaxing treatments and restorative therapies'],
                ['star', 'Peace Room', 'A quiet space for rest and reflection'],
                ['water', 'Essential-Oil Therapy Lakes', 'Calming waters designed for sensory wellness'],
                ['sports-court', 'Climbing Wall', 'Active recreation for strength and adventure'],
                ['jogging', 'Calisthenics Stations', 'Outdoor spaces for functional fitness'],
            ],
        ],

        'family' => [
            'label' => 'Family & Community',
            'items' => [
                ['kids-play', 'Kidz Adventure Land', 'An engaging outdoor space for children'],
                ['sports-court', 'Games Zone', 'Spaces for sports, games and friendly competition'],
                ['building-2', 'Amphitheatre', 'A vibrant setting for events and performances'],
                ['building-2', 'Clubhouse', 'A welcoming hub for residents and gatherings'],
                ['leaf', 'Hydroponic Farm', 'Grow fresh produce with hands-on cooking classes'],
                ['calendar', 'BBQ Lawns', 'Outdoor spaces for relaxed gatherings and dining'],
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

                        <div class="landing-project-gallery-heading">

                    

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

@php
    // [time, name, lat, lng]. First row is the starting point.
    $stops = [
        ['DAMAC Riverside', 'Dubai Investments Park', 24.9330, 55.2000], // verify exact pin
        ['12 min', 'Expo City',                    24.9646, 55.1518],
        ['15 min', 'Al Maktoum Airport',           24.8960, 55.1610],
        ['25 min', 'Burj Al Arab',                 25.1412, 55.1853],
        ['30 min', 'Dubai International Airport',  25.2528, 55.3644],
    ];

    $mapConfig = [
        'key'     => config('services.google.maps_key'),
        'project' => ['lat' => $stops[0][2], 'lng' => $stops[0][3]],
        'stops'   => collect($stops)->map(fn ($s) => ['name' => $s[1], 'lat' => $s[2], 'lng' => $s[3]])->all(),
    ];
@endphp

<section class="rv-map " id="location" data-rv-map data-config="{{ json_encode($mapConfig) }}">
    <div class="rv-map__sticky">

        <div class="rv-map__head">
            <div class="landing-gallery-container">

                <h2 class="landing-about-v2-title rv-map__title">DAMAC Riverside Views Location</h2>
                <p class="rv-map__sub">Quietly central in Dubai Investments Park</p>
<p class="rv-map__sub">About 12 minutes to Expo City, 15 to Al Maktoum International Airport, 25 to Burj Al Arab and 30
to Dubai International Airport. There's easy access to Sheikh Mohammed Bin Zayed Road and
Emirates Road.</p>
                <div class="rv-map__track">
                    @foreach ($stops as [$time, $place])
                        <div class="rv-map__stop" data-rv-stop>
                            <span class="rv-map__stop-time">{{ $time }}</span>
                            <!-- <span class="rv-map__stop-label">{{ $place }}</span> -->
                            <span class="rv-map__dot" aria-hidden="true"></span>
                        </div>
                    @endforeach

                    <span class="rv-map__car" aria-hidden="true">
                        <svg viewBox="0 0 64 30" width="64" height="30">
                            <rect x="2" y="3" width="60" height="24" rx="12" fill="#e9e9e9" stroke="#bdbdbd"/>
                            <rect x="16" y="7" width="26" height="16" rx="6" fill="#2b2b2b"/>
                            <rect x="44" y="9" width="10" height="12" rx="4" fill="#5a5a5a"/>
                        </svg>
                    </span>
                </div>

            </div>
        </div>

        <div class="rv-map__canvas">
            <div class="rv-map__gmap" data-rv-gmap></div>
        </div>

    </div>
</section>

            
            <section class="landing-about-v2" id="why-now">
    <div class="landing-gallery-container">
        <div class="landing-about-v2-content">

            <h2 class="landing-about-v2-title rv-why2__title">
                Why Buy at Riverside Views Now
            </h2>

            @php
                // [label, prefix, figure, text]
                $reasons = [
                    ['The offer',         'Up to', '8%',        'Save up to 8% while it lasts.'],
                    ['Lower entry price', 'From',  'AED 1.35M', 'DAMAC waterfront living from AED 1.35M.'],
                    ['More time to pay',  'Up to', '50%',       "Up to 50% isn't due until completion."],
                ];
            @endphp

            <div class="rv-why2__row">
                @foreach ($reasons as [$label, $prefix, $figure, $text])
                    <div class="rv-why2__item">
                        <span class="rv-why2__label">{{ $label }}</span>
                        <span class="rv-why2__prefix">{{ $prefix }}</span>
                        <span class="rv-why2__figure">{{ $figure }}</span>
                        <p class="rv-why2__text">{{ $text }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>


            

            @php
    $faqs = [
        ["What's the current offer?",   'A 4% DLD waiver plus 4% off the price, or a flat 8% discount.'],
        ["What's the starting price?",  '1-bedroom apartments from AED 1.35M and 2-bedroom from AED 1.9M, before the offer.'],
        ["What's the payment plan?",    'Plans with 40% or 50% due on completion. Ask for the full schedule.'],
        ['Where is it?',                'In Dubai Investments Park, near Expo City and Al Maktoum International Airport.'],
        ['When is completion?',         'Anticipated from 2029, depending on the building.'],
        ['Are there townhouses?',       'This launch is 1 & 2-bedroom apartments. The DAMAC Riverside townhouses are a separate phase.'],
    ];
@endphp

<section class="landing-about-v2 rv-faq-section" id="faq">
    <div class="landing-gallery-container">
        <div class="rv-faq">

            <h2 class="landing-about-v2-title rv-faq__title">DAMAC Riverside Views FAQs</h2>

            <div class="rv-faq__list">
                @foreach ($faqs as [$question, $answer])
                    <details class="rv-faq__item" name="rv-faq">
                        <summary class="rv-faq__question">
                            <span>{{ $question }}</span>
                            <svg class="rv-faq__chevron" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M5 9l7 7 7-7"/>
                            </svg>
                        </summary>
                        <p class="rv-faq__answer">{{ $answer }}</p>
                    </details>
                @endforeach
            </div>

        </div>
    </div>
</section>







            <section class="landing-about-v2 rv-dev" id="developer" aria-labelledby="rv-dev-title">
    <div class="landing-gallery-container">

        {{-- Replace with your developer logo mark (gold/transparent SVG works best) --}}


        <h2 class="rv-dev__title" id="rv-dev-title">About the Developer: DAMAC Properties</h2>

        <div class="rv-dev__copy">
            <p>
                DAMAC Properties is a Dubai-based developer that has been building residential
                communities in the UAE and abroad since 2002. Its portfolio spans master
                communities such as DAMAC Hills and DAMAC Lagoons, high-rise towers and branded
                residences, each planned around shared amenities and long-term community living.
            </p>
            <p>
                Riverside Views is part of DAMAC Riverside, the developer's sixth master
                development, and follows the same approach of planning the surroundings together
                with the homes. Buying from an established developer also gives you a record of
                delivered projects to review before you commit.
            </p>
        </div>

        <dl class="rv-dev__stats">

            <div class="rv-dev__stat">
                <svg class="rv-dev__icon" viewBox="0 0 64 64" aria-hidden="true">
                    <circle cx="24" cy="20" r="8"/>
                    <circle cx="24" cy="20" r="2.5"/>
                    <path d="M32 20h24M48 20v8M56 20v6"/>
                    <path d="M6 42c6-2 12-2 18 2l10 2c3 1 3 5 0 5H22"/>
                    <path d="M34 50l14-6c3-1 6 2 4 5L40 60H18c-4 0-8-2-12-6"/>
                </svg>
                <dt class="rv-dev__number">50,000+</dt>
                <dd class="rv-dev__caption">Homes delivered</dd>
            </div>

            <div class="rv-dev__stat">
                <svg class="rv-dev__icon" viewBox="0 0 64 64" aria-hidden="true">
                    <path d="M8 60V14M20 60V14M8 14h12M8 22l12 8M8 30l12 8M8 38l12 8M8 46l12 8"/>
                    <path d="M4 14l22-8 34 8M26 6v8M52 14v10M52 24l-5 6h10z"/>
                    <rect x="34" y="38" width="22" height="22"/>
                    <path d="M40 44h4v4h-4zM46 44h4v4h-4zM40 52h4v4h-4zM46 52h4v4h-4z"/>
                </svg>
                <dt class="rv-dev__number">54,000+</dt>
                <dd class="rv-dev__caption">Homes in progress and planning</dd>
            </div>

            <div class="rv-dev__stat">
                <svg class="rv-dev__icon" viewBox="0 0 64 64" aria-hidden="true">
                    <path d="M12 8h30v10M12 8c-4 0-6 4-6 8v34c0 4 3 6 6 6h30"/>
                    <path d="M12 56c4 0 6-3 6-6V14"/>
                    <path d="M26 40l22-26 6 5-22 26-8 3z"/>
                    <path d="M44 18l6 5"/>
                    <path d="M42 60V44l16 16z"/>
                </svg>
                <dt class="rv-dev__number">100+ M</dt>
                <dd class="rv-dev__caption">Sq.ft. of project area in planning and progress</dd>
            </div>

        </dl>

    </div>
</section>


        </div>





        <aside class="landing-side-form" id="landingSideForm">

            <div class="landing-side-form-inner">

                @include('partials.lead-form-riverside', [
                'formId' => 'landing-about-form',
                'heading' => 'Get Launch Prices & Availability',
                'source' => 'riverside_floating_form',
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

            @include('partials.lead-form-riverside', [
            'formId' => 'landing-popup-form',
            'heading' => 'Get Launch Prices & Availability',


            'source' => 'riverside_popup',
            'propertyId' => $property->id,
            'developerId' => $property->developer_id,
            'action' => route('landing.leads.store'),
            ])

        </div>

    </div>


    {{-- =====================================================
    DEVELOPER + COMMUNITY
===================================================== --}}

    <section id ="developer-section">
        <div class="landing-gallery-container ghadeer-enquiry-section">
            <div class="ghadeer-enquiry-left">
                <span>DAMC RIVERSIDE</span>

                <h2>Claim Your Riverside Views Offer</h2>

                <p>
                    Get prices after the discount, floor plans and availability sent to your WhatsApp.
                </p>

                <button type="button" data-lead-popup-open>
                     Show Me the Offer Prices
                </button>
            </div>

            <div class="ghadeer-enquiry-right">
                <div class="landing-side-form-inner form-width-80">
                    @include('partials.lead-form-riverside', [
                    'formId' => 'landing-image-form',
                    'heading' => 'Get Launch Prices & Availability',
                    'source' => 'riverside_footer_form',
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
    {{-- =====================================================
            MAIN FOOTER
        ===================================================== --}}

    <div class="float-bar">
        <div class="float-bar__brand ">
            <!-- Replace src with your logo (white/light version works best on blur) -->
            <img class="float-bar__logo" src="{{ asset('assets/img/landing/riverside/Riverside_Logo_Black.svg') }}" alt="{{ $property->title }}">
            <p class="float-bar__price "><span class="float-bar__unit">1 & 2 BR Apartments </span><strong>FROM AED 1.7M</strong></p>
        </div>
        <a class="float-bar__cta" href="#enquire" data-lead-popup-open>Enquire now</a>
    </div>

    <a
        href="https://wa.me/971555342535?text=Hi%2C%20I%E2%80%99m%20interested%20to%20know%20more%20about%20DAMAC%20Riverside%20Views%20Please%20share%20all%20relevant%20details.%20Thank%20you."
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


<input
    type="hidden"
    name="project_name"
    value="{{ $property->project?->name ?? '' }}"
>

<input
    type="hidden"
    name="developer_name"
    value="{{ $property->developer?->name ?? '' }}"
>
<input
    type="hidden"
    name="property_id"
    value="{{ $property->id ?? '' }}"
>

<input
    type="hidden"
    name="project_id"
    value="{{ $property->project?->id ?? '' }}"
>

<input
    type="hidden"
    name="developer_id"
    value="{{ $property->developer?->id ?? '' }}"
>
</main>

@endsection
@push('scripts')
@vite('resources/js/landing/riverside.js')

@endpush