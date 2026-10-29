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
@section('canonical', 'https://palm-springs.sales-centre.net')
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

    'url' => 'https://palm-springs.sales-centre.net',
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
    'url' => 'https://palm-springs.sales-centre.net',
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
    @vite('resources/css/landing/palm-springs.css')
@endpush

@section('content')

    {{-- Header --}}
    <header class="pja-header">

    <div class="pja-header-inner">

        <div class="pja-logo-group">

            <a href="#" class="pja-logo">
                <img
                    src="{{ asset('assets/img/landing/palm-springs/Palm_Spring.png') }}"
                    alt="{{ $property->project?->name ?? $property->title }}"
                >
            </a>

        </div>

        {{-- Desktop Navigation --}}
        <nav class="pja-navigation">
             <a href="#register">Register</a>
                 <a href="#homes">Properties</a>

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
        <a href="#register">Register</a>
        <a href="#homes">Properties</a>

        <a href="#gallery">Gallery</a>
        <a href="#location">Location</a>
        <a href="#contact">Contact</a>
    </nav>

</header>


    {{-- Hero --}}
    <section class="pja-hero" id="register">

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

                <div class="pja-hero-eyebrow" id="dynamic-ad-eyebrow">
    UPCOMING NAKHEEL LAUNCH · NEXT TO PALM JEBEL ALI
</div>

<h1 class="pja-hero-title" id="dynamic-ad-h1">
    Palm Springs by Nakheel
</h1>

<p class="pja-hero-description" id="dynamic-ad-description">
    3–4 bedroom townhouses and 4–5 bedroom villas on Sheikh Zayed Road,
    beside a Metro station. Indicative prices from AED 3.8M.
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

                <div class="pja-hero-buttons">

                    <a href="#" data-open-enquiry class="pja-btn pja-btn-primary"  data-open-enquiry data-lead-source="get_early_access">
                        GET EARLY ACCESS
                    </a>

                    

                </div>

            </div>

        </div>

    </section>
<div class="content-stream">



<section class="pja-project-info pja-section" id="show-mob-form">

    <div class="main-container">

       

         @include('partials.lead-form-palm-spring', [
            'source' => 'palm_spring_mobile_form',
            'propertyId' => $property->id,
            'developerId' => $property->developer_id,
         ])

             

    </div>

</section>



<section class="pja-collections pja-section" id="homes">

    <div class="main-container">

        <div class="pja-collections-header">

            <div class="section-eyebrow">
                THE HOMES
            </div>

            <h2 class="title">
                Townhouses and villas by Nakheel
            </h2>

        

        </div>

        <div class="pja-collections-grid">

            <article class="pja-collection-card">
                <a href="#" data-open-enquiry data-lead-source="Townhouse_at_palm_spring">

                    <div class="pja-collection-image">
                        <img
                            src="{{ asset('assets/img/landing/bay-estate/3-br-townhouse.webp') }}"
                            alt="3 Bedroom Townhouse at Palm Springs"
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
                                <span>Sizes releases soon...</span>
                                
                            </div>

                         

                        </div>

                    </div>

                </a>
            </article>


            <article class="pja-collection-card">
                <a href="#" data-open-enquiry data-lead-source="villa_at_palm_spring">

                    <div class="pja-collection-image">
                        <img
                            src="{{ asset('assets/img/landing/bay-estate/4-br-townhouse.webp') }}"
                            alt="4 Bedroom Townhouse at Palm Springs"
                        >
                    </div>

                    <div class="pja-collection-content">

                        <div class="pja-collection-label">
                            VILLA
                        </div>

                        <h3>
                            4 & 5 BEDROOM<br>
                            VILLAS
                        </h3>

                        <div class="pja-collection-meta">

                            <div>
                                <span>Sizes releases soon...</span>
                      
                            </div>

                         

                        </div>

                    </div>

                </a>
            </article> 

        </div>

         <div class="pja-gallery-button-wrapper" bis_skin_checked="1">

                <a href="#" class="pja-btn pja-btn-transparent" data-open-enquiry data-lead-source="get_floor_plan_first">
               
                    GET FLOOR PLANS FIRST
                </a>

            </div>

    </div>

</section>



<section class="pja-project-info pja-section" id="#prices">

        <div class="main-container ">

            <!-- LEFT CONTENT -->
            <div class="pja-project-info-content">

                <div class="section-eyebrow">
                     PRICES
                </div>

                <h2 class="title">
                     Indicative prices from AED 3.8M
                </h2>

                <p class="section-description">
            Prices are expected to range from about AED 3.8M for townhouses to AED 9M for the
largest villas. Nakheel will release the full price list and payment plan at launch, and
registered clients receive them first.
                </p>


                <!-- PRICE & PAYMENT -->
                <div class="pja-project-highlights">

                    <!-- STARTING PRICE -->
                    <div class="pja-project-highlight">

                        <div class="pja-project-highlight-icon">
                            <x-landing-icon name="aed" />
                        </div>

                        <div class="pja-project-highlight-content">

                            <span>    Townhouses FROM</span>

                            <strong>AED 3.8M</strong>

                        </div>

                    </div>


                    <!-- PAYMENT PLAN -->
               

                </div>

            </div>


             <div class="pja-gallery-button-wrapper" bis_skin_checked="1">

                <a href="#" class="pja-btn pja-btn-transparent" data-open-enquiry data-lead-source="UNLOCK_THE_PRICE_LIST">
                    UNLOCK THE PRICE LIST
                </a>

            </div>



        </div>

    </section>






@php
    $locations = [
        [
            'type' => 'airport',
            'text' => '15 minutes from Al Maktoum International Airport (DWC)',
            'lat' => 24.8967,
            'lng' => 55.1614,
            'icon' => 'plane',
        ],
        [
            'type' => 'location',
            'text' => '17 minutes from Palm Jebel Ali',
            'lat' => 24.7800,
            'lng' => 54.9800,
            'icon' => 'location',
        ],
        [
            'type' => 'location',
            'text' => '20 minutes from Bluewaters Island',
            'lat' => 25.0800,
            'lng' => 55.1220,
            'icon' => 'location',
        ],
        [
            'type' => 'palm',
            'text' => '25 minutes from Palm Jumeirah',
            'lat' => 25.1124,
            'lng' => 55.1390,
            'icon' => 'location',
        ],
        [
            'type' => 'location',
            'text' => '30 minutes from Burj Al Arab',
            'lat' => 25.1413,
            'lng' => 55.1853,
            'icon' => 'location',
        ],
    ];
@endphp

<section class="pja-location pja-section" id="location">
    <div class="main-container">

        <div class="pja-gallery-header">

            <div class="section-eyebrow">
                LOCATION
            </div>

            <h2 class="title">
               Next to Palm Jebel Ali, on Sheikh Zayed Road
            </h2>

            <p class="section-description">
                A new Nakheel masterplan beside a Metro station, with direct access to Sheikh Zayed
Road.
            </p>

        </div>

        @if(!empty($locations))

            <div class="pja-location-visual">

                <div class="pja-location-map">

                    <div
                        id="custom-map"
                        data-api-key="{{ config('services.google.maps_key') }}"
                       data-lat="24.95210335822424"
                        data-lng="55.037290891458426"
                 
                        data-title="Palm Jebel Ali - Dubai"
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
                    data-open-enquiry data-lead-source="get_location_guide">
                    GET LOCATION GUIDE
                </a>

            </div>

        @endif

    </div>
</section>



    <section class="pja-launch pja-section" id="why-buy">
    <div class="main-container">

        <div class="pja-launch-header">
            <div class="section-eyebrow">
                SECTION 5 · WHY REGISTER NOW
            </div>

            <h2 class="title">
                Why Register for Palm Springs by Nakheel?
            </h2>

            <p class="section-description">
                Get early access to launch information, compare your options
                and receive guidance from an Avanor Capital advisor before
                availability becomes limited.
            </p>
        </div>

        <div class="pja-launch-reasons">

            <div class="pja-launch-reason">
                <div class="pja-launch-reason-content">
                    <h3>More Affordable Entry</h3>
                    <p>
                        Townhouses on Palm Jebel Ali itself start around
                        AED 14.9M, while Palm Springs starts from about
                        AED 3.8M.
                    </p>
                </div>
            </div>

            <div class="pja-launch-reason">
                <div class="pja-launch-reason-content">
                    <h3>Launch-Day Access</h3>
                    <p>
                        Nakheel launches move fast, and registered buyers
                        hear first.
                    </p>
                </div>
            </div>

            <div class="pja-launch-reason">
                <div class="pja-launch-reason-content">
                    <h3>Expert Guidance</h3>
                    <p>
                        A licensed Avanor Capital advisor helps you compare
                        unit types and choose before inventory goes.
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
                        <h3>Choose your preferred unit and review the reservation terms.</h3>
                    </div>
                </div>

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
        PALM SPRINGS BY NAKHEEL
    </div>

    <h2 class="title">
        Discover Life at Palm Springs, Near Palm Jebel Ali
    </h2>

    <p class="section-description">
        Explore the coastal lifestyle, waterfront surroundings and island
        setting that make Palm Springs an exciting new opportunity near
        Palm Jebel Ali.
    </p>

</div>


        @if ($galleryImages->isNotEmpty())

            @php

                $galleryItems = [
                    'COMMUNITY POOL',
                    'VILLA COMMUNITY',
                    'SUNSET VIEW FROM VILLA',
                    'TOWNHOUSE EXTERIOR',
                    'TOWNHOUSE COMMUNITY',
             
              
                    
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
                Palm Springs FAQs
            </h2>

            <p class="section-description">
                Find answers to common questions about Palm Springs by Nakheel,
                including the launch date, payment plan and registration process.
            </p>

        </div>

        {{-- RIGHT FAQ --}}
        <div class="pja-faq-list">

            <div class="pja-faq-item">
                <button type="button" class="pja-faq-question" aria-expanded="false">
                    <span class="pja-faq-number">01</span>
                    <span class="pja-faq-title">When does it launch?</span>
                    <span class="pja-faq-icon">+</span>
                </button>

                <div class="pja-faq-answer">
                    <p>
                        Nakheel will confirm the launch date shortly.
                        Registered clients are messaged first.
                    </p>
                </div>
            </div>

            <div class="pja-faq-item">
                <button type="button" class="pja-faq-question" aria-expanded="false">
                    <span class="pja-faq-number">02</span>
                    <span class="pja-faq-title">What’s the payment plan?</span>
                    <span class="pja-faq-icon">+</span>
                </button>

                <div class="pja-faq-answer">
                    <p>
                        It hasn’t been released yet. We’ll send it to registered
                        clients as soon as Nakheel announces it.
                    </p>
                </div>
            </div>

            <div class="pja-faq-item">
                <button type="button" class="pja-faq-question" aria-expanded="false">
                    <span class="pja-faq-number">03</span>
                    <span class="pja-faq-title">What sizes are the homes?</span>
                    <span class="pja-faq-icon">+</span>
                </button>

                <div class="pja-faq-answer">
                    <p>
                        Unit sizes will be released at launch with the floor plans.
                    </p>
                </div>
            </div>

            <div class="pja-faq-item">
                <button type="button" class="pja-faq-question" aria-expanded="false">
                    <span class="pja-faq-number">04</span>
                    <span class="pja-faq-title">
                        Is this the Palm Springs villas in Umm Suqeim?
                    </span>
                    <span class="pja-faq-icon">+</span>
                </button>

                <div class="pja-faq-answer">
                    <p>
                        No. This is a new Nakheel community next to Palm Jebel Ali,
                        on Sheikh Zayed Road.
                    </p>
                </div>
            </div>

            <div class="pja-faq-item">
                <button type="button" class="pja-faq-question" aria-expanded="false">
                    <span class="pja-faq-number">05</span>
                    <span class="pja-faq-title">Is registering a commitment?</span>
                    <span class="pja-faq-icon">+</span>
                </button>

                <div class="pja-faq-answer">
                    <p>
                        No. Registering simply puts you on the list to receive
                        launch details first.
                    </p>
                </div>
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
                        Nakheel is a leading Dubai-based master developer known for
                        shaping the city's coastline through landmark waterfront
                        destinations, residential communities and iconic developments.
                        Its portfolio includes Palm Jumeirah and other major
                        master-planned destinations across Dubai.
                    </p>

                    <p class="body-paragraph">
                        With Palm Springs, Nakheel is introducing a new residential
                        opportunity near Palm Jebel Ali, offering buyers an opportunity
                        to explore townhouse and villa living in this emerging coastal
                        area. Register your interest to receive launch announcements,
                        indicative prices, floor plans and payment plan details when
                        they become available.
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
                        <div class="mini-feature-title">Established</div>
                        <div class="mini-feature-sub">Dubai Developer</div>
                    </div>

                    <div class="mini-feature-item">
                        <div class="mini-feature-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6 0 3.375 3.375 0 016 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 01-5.25 0z"/>
                            </svg>
                        </div>
                        <div class="mini-feature-title">Residential</div>
                        <div class="mini-feature-sub">Master Communities</div>
                    </div>

                    <div class="mini-feature-item">
                        <div class="mini-feature-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                            </svg>
                        </div>
                        <div class="mini-feature-title">Palm Springs</div>
                        <div class="mini-feature-sub">Upcoming Launch</div>
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
                    at Palm Springs
                </h2>

                <p class="section-description">
                    Get launch prices, floor plans and availability
                    sent to your WhatsApp.
                </p>

                <a href="#" class="pja-enquiry-button" data-open-enquiry data-lead-source="footer_send_me_the_details">
                    Send Me the Details
                </a>

            </div>

            <div class="pja-enquiry-form">

                         @include('partials.lead-form-palm-spring', [
            'source' => 'footer_form',
            'propertyId' => $property->id,
            'developerId' => $property->developer_id,
         ])

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
                 This page is operated by Avanor Capital L.L.C, a licensed Dubai real estate brokerage (RERA : 63012
                    ORN: 63296 ), and is not the official website of Nakheel.
                    Information is based on public reports and may change. The project name, prices, payment

                    plans and availability have not yet been announced and are subject to the developer’s terms.
                    Project names and trademarks belong to their respective owners.
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




                            @include('partials.lead-form-palm-spring', [
            'source' => 'Enquiry Popup',
            'propertyId' => $property->id,
            'developerId' => $property->developer_id,
            'title' => 'Palm Springs by Nakheel: Get Prices First',
            'subtitle' => 'Townhouses and villas next to Palm Jebel Ali from AED 3.8M. Get the price list and
floor plans on WhatsApp as soon as they’re released.',
'buttontext' => 'Register My Interest',
         ])



        </div>

    </div>


<aside class="sticky-sidebar" aria-label="Registration Sidebar" id="side-form-lp">
                 @include('partials.lead-form-palm-spring', [
            'source' => 'palm_springs_floating_side_form',
            'propertyId' => $property->id,
            'developerId' => $property->developer_id,
            'title' => 'Palm Springs by Nakheel',
            'subtitle' => 'From AED 3.8M. Price list sent first',
            'buttontext' => 'Register'
         ])
    </aside>

        <a
            href="https://wa.me/971555342535?text=Hi%2C%20I%E2%80%99m%20interested%20to%20know%20more%20about%20Palm%20Springs%20By%20Nakheel.%20Please%20share%20all%20relevant%20details.%0AThank%20you."
            class="landing-whatsapp-float whatsapp-track"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Chat on WhatsApp"
        >
            <svg width="44px" height="44px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"></path> <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"></path> <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"></path> <defs> <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse"> <stop stop-color="#5BD066"></stop> <stop offset="1" stop-color="#27B43E"></stop> </linearGradient> </defs> </g></svg>
        </a>





@endsection

@push('scripts')
    @vite('resources/js/landing/palm-springs.js')
    @vite('resources/js/palm-springs-map.js')

@endpush








    