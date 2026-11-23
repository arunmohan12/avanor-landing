<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HAYAT 8 by Dubai South | 4–6 BR Standalone Villas from AED 6.5M</title>

    <meta name="description" content="New standalone villas in HAYAT, Dubai South, from AED 6.5M. 5% down, 30% post-handover, 2% DLD waiver. Register for live availability, floor plans and price-list.">

    <link rel="canonical" href="https://hayat-dubai-south.sales-centre.net/">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="HAYAT 8 by Dubai South | 4–6 BR Standalone Villas from AED 6.5M">
    <meta property="og:description" content="New standalone villas in HAYAT, Dubai South, from AED 6.5M.">
    <meta property="og:url" content="https://hayat-dubai-south.sales-centre.net/">
    <meta property="og:image" content="{{ asset('assets/img/landing/hayat/hero-hayat.jpg') }}">

    <!-- Favicons -->
  <link rel="icon" href="{{ asset('assets/img/landing/hayat/favicon.ico') }}" sizes="any">
  <link rel="icon" href="{{ asset('assets/img/landing/hayat/favicon.ico') }}" sizes="32x32" type="image/png">
  <link rel="apple-touch-icon" href="{{ asset('assets/img/landing/hayat/favicon.ico') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vite CSS & JS -->
    @vite([
    'resources/css/landing/hayat.css',
    'resources/js/landing/hayat.js'
    ])

    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;
        f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NCXCP87F');
    </script>
    <!-- End Google Tag Manager -->

</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NCXCP87F"
            height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="site-wrapper">
        <header class="site-header" role="banner">
            <div class="header-inner">
                <div class="brand-wrapper">
                    <a href="#register" class="brand-logo-link" aria-label="Hayat 8 by Dubai South">
                        <img src="{{ asset('assets/img/landing/hayat/dubai-south-logo.svg') }}" alt="Dubai South" class="brand-logo-img" width="110" height="40">
                    </a>
                    <div class="brand-divider"></div>
                    <div class="project-tagline">
                        <img
                            src="{{ asset('assets/img/landing/hayat/hayat-logo.png') }}"
                            alt="HAYAT 8 – Standalone Villas"
                            class="project-logo">
                    </div>
                </div>

                <nav class="header-nav" aria-label="Main Navigation">
                    <a href="#villas" class="nav-link">The Villas</a>
                    <a href="#payment-plan" class="nav-link">Payment Plan</a>
                    <a href="#location" class="nav-link">Location</a>
                    <a href="#amenities" class="nav-link">Amenities</a>
                    <a href="#floor-plans" class="nav-link">Floor Plans</a>
                </nav>

                <div>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </header>


        <aside class="floating-sidebar-container" aria-label="Now Selling">

            <div class="floating-card" id="desktop-floating-card">

                <div class="floating-card-header">
                    <span class="floating-badge">Now Selling</span>
                    <h2 class="floating-title">HAYAT 8 by Dubai South</h2>
                    <p class="floating-sub">From AED 6.5M · 5% Down Payment</p>
                </div>

                @include('partials.lead-form-hayat', [
                'formId' => 'hayat-sidebar-form',
                'source' => 'hayat_floating_side_form',
                'buttonText' => 'Send Me the Details',
                'showTimeline' => true,

                    'propertyId' => $property->id,
    'developerId' => $property->developer_id,
                ])

            </div>

        </aside>

        <main class="content-stream" id="content">



            <section class="hero-section" id="register">
                <div class="section-wrap">
                    <div class="desktop-content-col">
                        <div class="hero-small-line" id="hero-small-line">
    {{ $heroContent['eyebrow'] }}
</div>

<h1 class="hero-headline" id="hero-headline">
    {{ $heroContent['headline'] }}
</h1>

<p class="hero-subheadline" id="hero-subheadline">
    {{ $heroContent['description'] }}
</p>

                        <!-- Fact Strip (3 boxes) -->
                        <div class="fact-strip">
                            <div class="fact-box">
                                <div class="fact-label">Starting Price</div>
                                <div class="fact-val">From AED 6.5M</div>
                            </div>
                            <div class="fact-box">
                                <div class="fact-label">Down Payment</div>
                                <div class="fact-val">5% Down Payment</div>
                            </div>
                            <div class="fact-box">
                                <div class="fact-label">Status</div>
                                <div class="fact-val">Now Selling</div>
                            </div>
                        </div>

                        <!-- Ticks List -->
                        <div class="ticks-list">
                            <div class="tick-item">
                                <svg class="tick-icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>All 4, 5 and 6-bedroom types available</span>
                            </div>
                            <div class="tick-item">
                                <svg class="tick-icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Price list and floor plans on WhatsApp</span>
                            </div>
                            <div class="tick-item">
                                <svg class="tick-icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>No obligation</span>
                            </div>
                        </div>

                        <!-- Hero Render Media -->
                        <div class="hero-media-wrapper">

                            <img
                                src="{{ \App\Support\MediaUrl::fromMedia($coverMedia, 'cover_avif') }}"
                                srcset="
            {{ \App\Support\MediaUrl::fromMedia($coverMedia, 'cover_mobile_avif') }} 768w,
            {{ \App\Support\MediaUrl::fromMedia($coverMedia, 'cover_tablet_avif') }} 1280w,
            {{ \App\Support\MediaUrl::fromMedia($coverMedia, 'cover_avif') }} 1920w
        "
                                sizes="100vw"
                                alt="HAYAT 8 Standalone Villas by Dubai South, architectural render"
                                width="1920"
                                height="1080"
                                fetchpriority="high"
                                decoding="async"
                                class="hero-media-image">

                            <div class="hero-media-badge">
                                HAYAT 8 · Golf District, Dubai South
                            </div>

                        </div>

                        <!-- Mobile Inline Form (rendered directly in hero for mobile/tablet users) -->
                        <div class="hero-form-mobile">

                            <div class="floating-card">

                                <div class="floating-card-header">
                                    <span class="floating-badge">
                                        Get the Price List & Availability
                                    </span>

                                    <h2 class="floating-title">
                                        Check Availability
                                    </h2>

                                    <p class="floating-sub">
                                        From AED 6.5M · 5% Down · 2% DLD Fee Waiver
                                    </p>
                                </div>

                                @include('partials.lead-form-hayat', [
                                'formId' => 'hayat-mobile-hero-form',
                                'source' => 'hayat_hero_form',
                                'buttonText' => 'Send Me the Details',
                                'showTimeline' => true,
                                'propertyId' => $property->id,
    'developerId' => $property->developer_id,
                                ])

                            </div>

                        </div>

                    </div>
                </div>
            </section>

<section class="section section-alt" id="villas">
        <div class="section-wrap">
          <div class="desktop-content-col">
            <span class="eyebrow">Standalone Villa Collection</span>
            <h2 class="section-title">Three standalone villa layouts</h2>
            <p class="section-intro">
              A limited collection of standalone villas, each with a private garden, set in gated, walkable neighbourhoods with green views.
            </p>

            <div class="villa-grid">
              <!-- 4-bedroom villa -->
              <article class="villa-card">
                <div class="villa-media">
                  <img src="{{ asset('assets/img/landing/hayat/4-bedroom-villas.webp') }}" alt="4-bedroom standalone villa exterior at HAYAT 8" loading="lazy">
                  <span class="villa-badge">Standalone Villa</span>
                </div>
                <div class="villa-body">
                  <h3 class="villa-title">4-Bedroom Villa</h3>
                  <div class="villa-size">4,842 sq ft built-up</div>
                  <p class="villa-desc">
                    Standalone villa with a private garden and 4,842 sq ft of built-up space, designed for family living.
                  </p>
                  <div class="villa-action-row">
                    <div>
                      <div class="villa-price-label">Price &amp; Layout</div>
                      <div class="villa-price-val">On Request</div>
                    </div>
                    <button type="button" class="btn-primary" data-open-form data-villa="4 BR">Get Floor Plans</button>
                  </div>
                </div>
              </article>

              <!-- 5-bedroom villa -->
              <article class="villa-card">
                <div class="villa-media">
                  <img src="{{ asset('assets/img/landing/hayat/5-bedroom-villas.webp') }}" alt="5-bedroom standalone villa exterior at HAYAT 8" loading="lazy">
                  <span class="villa-badge">Standalone Villa</span>
                </div>
                <div class="villa-body">
                  <h3 class="villa-title">5-Bedroom Villa</h3>
                  <div class="villa-size">5,678 sq ft built-up</div>
                  <p class="villa-desc">
                    Standalone villa with a private garden and 5,678 sq ft of built-up space, with room for a growing family.
                  </p>
                  <div class="villa-action-row">
                    <div>
                      <div class="villa-price-label">Price &amp; Layout</div>
                      <div class="villa-price-val">On Request</div>
                    </div>
                    <button type="button" class="btn-primary" data-open-form data-villa="5 BR">Get Floor Plans</button>
                  </div>
                </div>
              </article>

              <!-- 6-bedroom villa -->
              <article class="villa-card">
                <div class="villa-media">
                  <img src="{{ asset('assets/img/landing/hayat/6-bedroom-villas.webp') }}" alt="6-bedroom standalone villa exterior at HAYAT 8" loading="lazy">
                  <span class="villa-badge">Flagship Residence</span>
                </div>
                <div class="villa-body">
                  <h3 class="villa-title">6-Bedroom Villa</h3>
                  <div class="villa-size">6,305 sq ft built-up</div>
                  <p class="villa-desc">
                    The largest layout in HAYAT 8, a standalone villa with a private garden and 6,305 sq ft of built-up space.
                  </p>
                  <div class="villa-action-row">
                    <div>
                      <div class="villa-price-label">Price &amp; Layout</div>
                      <div class="villa-price-val">On Request</div>
                    </div>
                    <button type="button" class="btn-primary" data-open-form data-villa="6 BR">Get Floor Plans</button>
                  </div>
                </div>
              </article>
            </div>

            <!-- Under the list banner -->
            <div class="villas-footer-banner">
              <div>
                <div class="vfb-text">Villas from AED 6.5M. Get the price for each layout on WhatsApp.</div>
                <div class="vfb-sub">Receive the brochure, live availability and prices directly on your phone.</div>
              </div>
              <button type="button" class="btn-primary" data-open-form>
                <span>Get Floor Plans (Opens Form)</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>

            <!-- Interior Carousel Stage -->
            @if ($galleryImages->isNotEmpty())

    @php
        $galleryItems = [
            'VILLA EXTERIOR & PRIVATE GARDEN',
            'VILLA LIVING ROOM & FAMILY SPACE',
            'COMMUNITY OUTDOOR AMENITIES & GREEN SPACES',
            'COMMUNITY AERIAL VIEW ',
        ];

        $firstImage = $galleryImages->first();

        $firstImageUrl = \App\Support\MediaUrl::fromMedia(
            $firstImage,
            'gallery_avif'
        );
    @endphp

    <div class="interior-stage">

        <span class="eyebrow">Refined Living Spaces</span>

        <h3 style="font-size:1.35rem;font-weight:800;color:var(--navy);margin-bottom:0.75rem;">
            Project Gallery
        </h3>

        <div class="carousel-container" id="interior-carousel">

            @foreach ($galleryImages as $image)

                @php
                    $imageUrl = \App\Support\MediaUrl::fromMedia(
                        $image,
                        'gallery_avif'
                    );
                @endphp

                <div class="carousel-slide {{ $loop->first ? 'is-active' : '' }}">

                    <img
                        src="{{ $imageUrl }}"
                        alt="{{ $property->project?->name ?? $property->title }} - {{ $galleryItems[$loop->index] ?? 'Gallery Image' }}"
                        loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                        decoding="async"
                    >

                    <div class="carousel-caption">
                        <div>
                            <div class="carousel-caption-title">
                                {{ $galleryItems[$loop->index] ?? 'GALLERY IMAGE' }}
                            </div>
                        </div>
                    </div>

                </div>

            @endforeach

            @if ($galleryImages->count() > 1)
                <div class="carousel-ctrls"
                     style="position:absolute;bottom:1.25rem;right:1.25rem;z-index:10;">

                    <button type="button" class="carousel-btn"
                            id="carousel-prev" aria-label="Previous image">‹</button>

                    <button type="button" class="carousel-btn"
                            id="carousel-next" aria-label="Next image">›</button>

                </div>
            @endif

        </div>

    </div>

@endif

          </div>
        </div>
      </section>

       <!-- ==========================================================================
           3. PAYMENT PLAN (id: payment-plan)
           ========================================================================== -->
      <section class="section" id="payment-plan">
        <div class="section-wrap">
          <div class="desktop-content-col">
            <div class="pp-header-row">
              <div>
                <span class="eyebrow">Investment Framework</span>
                <h2 class="section-title">5% down, 30% after handover</h2>
                <p class="section-intro" style="margin-bottom:0;">
                  Dubai South's premier investor-friendly payment milestone schedule with 30% spread across 2 years post-handover.
                </p>
              </div>
              <div class="dld-badge">
                <svg width="14" height="14" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span>2% DLD fee waiver</span>
              </div>
            </div>

            <!-- Four Blocks -->
            <div class="pp-grid">
              <div class="pp-card">
                <div class="pp-step-num">Step 01</div>
                <div class="pp-percent">5%</div>
                <div class="pp-title">Down Payment</div>
                <div class="pp-desc">On reservation / booking to secure your standalone villa allocation</div>
              </div>

              <div class="pp-card">
                <div class="pp-step-num">Step 02</div>
                <div class="pp-percent">35%</div>
                <div class="pp-title">During Construction</div>
                <div class="pp-desc">Linked to construction milestones across the build schedule</div>
              </div>

              <div class="pp-card">
                <div class="pp-step-num">Step 03</div>
                <div class="pp-percent">30%</div>
                <div class="pp-title">On Handover</div>
                <div class="pp-desc">Handover in Q3 2029 with key handover and title deed registration</div>
              </div>

              <div class="pp-card">
                <div class="pp-step-num">Step 04</div>
                <div class="pp-percent">30%</div>
                <div class="pp-title">Post-Handover</div>
                <div class="pp-desc">Conveniently spread over 2 years (24 months) after completion</div>
              </div>
            </div>

            <div style="display:flex;align-items:center;gap:1rem;flex-wrap:wrap;">
              <button type="button" class="btn-primary" data-open-form>Get the Full Payment Schedule</button>
              <span style="font-size:0.75rem;color:var(--text-muted);">*Full instalment schedule sent on WhatsApp.</span>
            </div>

          </div>
        </div>
      </section>

      <!-- ==========================================================================
           4. PRIORITY EOI (id: eoi)
           ========================================================================== -->
      <section class="section section-alt" id="eoi">
        <div class="section-wrap">
          <div class="desktop-content-col">
            <div class="eoi-banner">
              <div class="eoi-content">
                <span class="eyebrow eoi-eyebrow">Now Selling</span>
                <h2 class="eoi-title">Choose your villa and plot while every type is still available </h2>
                <p class="eoi-text">
                  HAYAT 8 launched on 21 November and all villa types are available. Register and an Avanor Capital advisor will send you live availability, prices and the best villas and plots for your budget.
                </p>
                <button type="button" class="btn-primary" style="background:#ffffff;color:var(--navy);border-color:#ffffff;" data-open-form>
                  <span>Get the Price List</span>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- ==========================================================================
           5. LOCATION (id: location)
           ========================================================================== -->
      <section class="section" id="location">
        <div class="section-wrap">
          <div class="desktop-content-col">
            <span class="eyebrow">Strategic Gateway</span>
            <h2 class="section-title">Next to the Golf District of Dubai South</h2>
            <p class="section-intro">
              Direct access to Emirates Road and Sheikh Mohammed bin Zayed Road, minutes from Al Maktoum International Airport, Jebel Ali Free Zone and Dubai South Free Zone.
            </p>

            <div class="location-layout">
              <div>
                <div class="drive-times-grid">
                  <div class="drive-card">
                    <div class="drive-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                      <div class="drive-dest">Expo City Dubai</div>
                      <div class="drive-duration">15 min drive</div>
                    </div>
                  </div>

                  <div class="drive-card">
                    <div class="drive-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                      <div class="drive-dest">Dubai Marina</div>
                      <div class="drive-duration">30 min drive</div>
                    </div>
                  </div>

                  <div class="drive-card">
                    <div class="drive-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                      <div class="drive-dest">Palm Jumeirah</div>
                      <div class="drive-duration">35 min drive</div>
                    </div>
                  </div>

                  <div class="drive-card">
                    <div class="drive-icon">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                      <div class="drive-dest">Downtown Dubai</div>
                      <div class="drive-duration">40 min drive</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Simple Map Representation with HAYAT marked -->
              <div class="map-card">
    <div class="map-svg-container">

        <img
            src="{{ asset('assets/img/landing/hayat/hayat8-location-map.webp') }}"
            alt="HAYAT 8 location map showing Dubai South, Expo City and Al Maktoum International Airport"
            class="hayat-location-image"
            id="hayatLocationImage"
            loading="lazy"
        >

        <!-- ENLARGE BUTTON -->
<button
    type="button"
    class="map-expand-btn"
    id="mapExpandBtn"
    aria-label="View location map fullscreen"
>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        width="19"
        height="19"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
    >
        <path d="M8 3H5a2 2 0 0 0-2 2v3"/>
        <path d="M16 3h3a2 2 0 0 1 2 2v3"/>
        <path d="M21 16v3a2 2 0 0 1-2 2h-3"/>
        <path d="M3 16v3a2 2 0 0 0 2 2h3"/>
    </svg>
</button>

        

    </div>
</div>

<!-- FULLSCREEN MAP POPUP -->
<div class="map-lightbox" id="mapLightbox">

    <button
        type="button"
        class="map-lightbox-close"
        id="mapLightboxClose"
        aria-label="Close map"
    >
        <i class="fas fa-times"></i>
    </button>

    <img
        src="{{ asset('assets/img/landing/hayat/hayat8-location-map.webp') }}"
        alt="HAYAT 8 full location map"
        class="map-lightbox-image"
    >

</div>
            </div>

          </div>
        </div>
      </section>
    
    
    
    <section class="section" id="floor-plans">
        <div class="section-wrap">
          <div class="desktop-content-col">
            <span class="eyebrow">Architectural Blueprints</span>
            <h2 class="section-title">Floor Plans</h2>
            <p class="section-intro">
              Detailed architectural blueprints with room dimensions, master suites, and garden layouts .Register to get the full high-resolution floor plans on WhatsApp, with room dimensions and garden layouts.
            </p>

            <div class="floorplans-grid">
              <!-- 4-BR Floorplan Preview -->
              <div class="floorplan-card">
                <div class="floorplan-thumbnail-wrap">
                  <img src="{{ asset('assets/img/landing/hayat/4-br-fp.webp') }}" alt="4 Bedroom Villa Floor Plan preview" class="floorplan-blurred-img">
                  <div class="floorplan-lock-overlay">
                    <div class="lock-icon-circle">
                      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <span style="font-size:0.75rem;font-weight:700;">Floor Plan – Register to View</span>
                  </div>
                </div>
                <div class="floorplan-body">
                  <div class="fp-title">4-Bedroom Standalone Layout</div>
                  <div class="fp-size">4,842 sq ft built-up area</div>
                  <button type="button" class="btn-primary" style="margin-top:0.5rem;" data-open-form data-villa="4 BR">
                    Get Floor Plans on WhatsApp
                  </button>
                </div>
              </div>

              <!-- 5-BR Floorplan Preview -->
              <div class="floorplan-card">
                <div class="floorplan-thumbnail-wrap">
                  <img src="{{ asset('assets/img/landing/hayat/5-br-fp.webp') }}" alt="5 Bedroom Villa Floor Plan preview" class="floorplan-blurred-img">
                  <div class="floorplan-lock-overlay">
                    <div class="lock-icon-circle">
                      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <span style="font-size:0.75rem;font-weight:700;">Floor Plan – Register to View</span>
                  </div>
                </div>
                <div class="floorplan-body">
                  <div class="fp-title">5-Bedroom Standalone Layout</div>
                  <div class="fp-size">5,678 sq ft built-up area</div>
                  <button type="button" class="btn-primary" style="margin-top:0.5rem;" data-open-form data-villa="5 BR">
                    Get Floor Plans on WhatsApp
                  </button>
                </div>
              </div>

              <!-- 6-BR Floorplan Preview -->
              <div class="floorplan-card">
                <div class="floorplan-thumbnail-wrap">
                  <img src="{{ asset('assets/img/landing/hayat/6-br-fp.webp') }}" alt="6 Bedroom Villa Floor Plan preview" class="floorplan-blurred-img">
                  <div class="floorplan-lock-overlay">
                    <div class="lock-icon-circle">
                      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <span style="font-size:0.75rem;font-weight:700;">Floor Plan – Register to View</span>
                  </div>
                </div>
                <div class="floorplan-body">
                  <div class="fp-title">6-Bedroom Standalone Layout</div>
                  <div class="fp-size">6,305 sq ft built-up area</div>
                  <button type="button" class="btn-primary" style="margin-top:0.5rem;" data-open-form data-villa="6 BR">
                    Get Floor Plans on WhatsApp
                  </button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
    
    
    <section class="section section-alt" id="amenities">
        <div class="section-wrap">
          <div class="desktop-content-col">
            <span class="eyebrow">Community Lifestyle</span>
            <h2 class="section-title">A wellness-focused community</h2>
            <p class="section-intro">
              Designed for harmonious family living with vast green belts, active wellness hubs, and immediate access to day-to-day retail and recreation.
            </p>

            <div class="amenities-grid">
              <div class="amenity-card">
                <div class="amenity-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div>
                  <h3 class="amenity-title">Parks &amp; Walking Trails</h3>
                  <p class="amenity-text">Parks and shaded walking trails: green space for strolls and quiet time</p>
                </div>
              </div>

              <div class="amenity-card">
                <div class="amenity-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <div>
                  <h3 class="amenity-title">Family Play Zones</h3>
                  <p class="amenity-text">Family play zones: active spaces for all ages with shaded equipment</p>
                </div>
              </div>

              <div class="amenity-card">
                <div class="amenity-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8h1a4 4 0 0 1 0 8h-1M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg>
                </div>
                <div>
                  <h3 class="amenity-title">Fitness &amp; Wellness</h3>
                  <p class="amenity-text">Fitness and wellness facilities: state-of-the-art gym close to home</p>
                </div>
              </div>

              <div class="amenity-card">
                <div class="amenity-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12h20M2 17h20M2 7h20"/></svg>
                </div>
                <div>
                  <h3 class="amenity-title">Shared Pools &amp; Gardens</h3>
                  <p class="amenity-text">Shared pools and landscaped gardens: resort-style swimming steps from your door</p>
                </div>
              </div>

              <div class="amenity-card">
                <div class="amenity-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18M16 10a4 4 0 0 1-8 0"/></svg>
                </div>
                <div>
                  <h3 class="amenity-title">Community Mall &amp; Retail</h3>
                  <p class="amenity-text">Community mall and retail boulevard: shops and cafés within walking distance</p>
                </div>
              </div>

              <div class="amenity-card">
                <div class="amenity-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
                <div>
                  <h3 class="amenity-title">Gated Neighbourhoods</h3>
                  <p class="amenity-text">Gated, walkable neighbourhoods: privacy with a strong community feel</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>


      <section class="section" id="why-hayat">
        <div class="section-wrap">
          <div class="desktop-content-col">
            <span class="eyebrow">Strategic Value</span>
            <h2 class="section-title">Why HAYAT 8</h2>
            <p class="section-intro">
              The flagship standalone villa release in Dubai South, engineered for discerning homebuyers and capital growth investors.
            </p>

            <div class="why-grid">
              <div class="why-card">
                <div class="why-num">01</div>
                <div>
                  <h3 class="why-title">Standalone, not townhouses</h3>
                  <p class="why-desc">HAYAT’s standalone villa collection, 4,842–6,305 sq ft built-up area offering exceptional plot sizes and complete individual privacy.</p>
                </div>
              </div>

              <div class="why-card">
                <div class="why-num">02</div>
                <div>
                  <h3 class="why-title">Easy payment plan</h3>
                  <p class="why-desc">Only 5% to start, and 30% spread over the 2 years after handover with an exclusive 2% DLD fee waiver.</p>
                </div>
              </div>

              <div class="why-card">
                <div class="why-num">03</div>
                <div>
                  <h3 class="why-title">Proven demand</h3>
                  <p class="why-desc">Earlier HAYAT phases sold out within hours of launch, establishing Dubai South as one of the fastest appreciating corridors in Dubai.</p>
                </div>
              </div>

              <div class="why-card">
                <div class="why-num">04</div>
                <div>
                  <h3 class="why-title">Expert guidance</h3>
                  <p class="why-desc">A licensed Avanor Capital advisor handles your booking and helps you choose the right villa and plot with direct developer coordination.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>


      <section class="section section-alt" id="faq">
        <div class="section-wrap">
          <div class="desktop-content-col">
            <span class="eyebrow">Questions &amp; Answers</span>
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-intro">
              Everything you need to know about HAYAT 8: availability, payment plan, villa sizes and booking.
            </p>

            <div class="faq-list">
              <div class="faq-item">
                <button type="button" class="faq-trigger" aria-expanded="false">
                  <span class="faq-q">Is HAYAT 8 still available?</span>
                  <svg class="faq-chevron" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>
                </button>
                <div class="faq-answer">
                  <div class="faq-answer-inner">
                    Yes. HAYAT 8 launched on 21 November 2026 and all 4, 5 and 6-bedroom villa types are available.
                  </div>
                </div>
              </div>

              <div class="faq-item">
                <button type="button" class="faq-trigger" aria-expanded="false">
                  <span class="faq-q">What’s the payment plan?</span>
                  <svg class="faq-chevron" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>
                </button>
                <div class="faq-answer">
                  <div class="faq-answer-inner">
                    5% down payment, 35% during construction, 30% on completion and 30% over 24 months after completion. There’s also a 2% DLD fee waiver.
                  </div>
                </div>
              </div>

              <div class="faq-item">
                <button type="button" class="faq-trigger" aria-expanded="false">
                  <span class="faq-q">What are the villa sizes?</span>
                  <svg class="faq-chevron" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>
                </button>
                <div class="faq-answer">
                  <div class="faq-answer-inner">
                    4,842 sq ft (4-bedroom), 5,678 sq ft (5-bedroom) and 6,305 sq ft (6-bedroom), built-up area.
                  </div>
                </div>
              </div>

              <div class="faq-item">
                <button type="button" class="faq-trigger" aria-expanded="false">
                  <span class="faq-q">When is completion?</span>
                  <svg class="faq-chevron" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>
                </button>
                <div class="faq-answer">
                  <div class="faq-answer-inner">
                    Completion is scheduled for Q3 2029.
                  </div>
                </div>
              </div>

              <div class="faq-item">
                <button type="button" class="faq-trigger" aria-expanded="false">
                  <span class="faq-q">How do I book?</span>
                  <svg class="faq-chevron" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>
                </button>
                <div class="faq-answer">
                  <div class="faq-answer-inner">
                    Register or message us on WhatsApp. An advisor sends you live availability and the price for each villa, helps you choose your villa and plot, and walks you through the booking.
                  </div>
                </div>
              </div>

              <div class="faq-item">
                <button type="button" class="faq-trigger" aria-expanded="false">
                  <span class="faq-q">Is registering a commitment?</span>
                  <svg class="faq-chevron" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>
                </button>
                <div class="faq-answer">
                  <div class="faq-answer-inner">
                    No. Registering only gets you the details. Booking is a separate step, and you decide.
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

      <section class="section developer-section" id="developer">
        <div class="section-wrap">
          <div class="developer-card-hero">
            <div class="developer-header-row">
              <div class="developer-title-group">
                <span class="eyebrow">Master Developer</span>
                <h2>Dubai South Properties</h2>
              </div>
              <div class="header-broker-badge" style="background:#f1f5f9;">
                <span class="broker-dot"></span>
                <span>Government of Dubai Master Development</span>
              </div>
            </div>

            <p class="developer-lead-p">
              Dubai South is the Government of Dubai’s flagship 145-square-kilometre master-planned city — an integrated urban ecosystem conceived to sustain 1 million residents and generate 500,000 jobs. Positioned as Dubai’s premier southern growth corridor, it serves as the strategic home to Expo City Dubai and the ongoing expansion of Al Maktoum International Airport (DWC), set to become the world’s largest airport with an annual capacity exceeding 260 million passengers.
            </p>
            <p class="developer-lead-p">
              Within this forward-looking metropolis, Dubai South Properties delivers HAYAT 8 as its signature standalone villa community in the Golf District. Purposefully designed around nature and family wellness, each residence balances serene suburban privacy with direct multi-lane arterial connectivity across the UAE.
            </p>

            <div class="developer-stats-grid">
              <div class="dev-stat-card">
                <div class="dev-stat-badge">Master Plan</div>
                <div class="dev-stat-val">145 km²</div>
                <div class="dev-stat-desc">The UAE’s largest single urban development, designed for a sustainable future.</div>
              </div>
              <div class="dev-stat-card">
                <div class="dev-stat-badge">Aviation Hub</div>
                <div class="dev-stat-val">DWC Airport</div>
                <div class="dev-stat-desc">Minutes from the mega-expansion of Al Maktoum International Airport.</div>
              </div>
              <div class="dev-stat-card">
                <div class="dev-stat-badge">Security</div>
                <div class="dev-stat-val">Government Backed</div>
                <div class="dev-stat-desc">Government of Dubai master developer. Completion expected Q3 2029.</div>
              </div>
              <div class="dev-stat-card">
                <div class="dev-stat-badge">Track Record</div>
                <div class="dev-stat-val">Earlier Phases Sold Out</div>
                <div class="dev-stat-desc">Strong demand: earlier HAYAT phases sold out within hours of launch.</div>
              </div>
            </div>
          </div>
        </div>
      </section>

<section class="section booking-section" id="book-now">
        <div class="section-wrap">
          <div class="booking-layout-grid">
            
            <!-- Left Side: Main Heading, Subheading & Assurances -->
            <div class="booking-left-col">
              <span class="eyebrow">Now Selling</span>
              <h2 class="booking-main-title">Book Your Standalone Villa Now</h2>
              <p class="booking-sub-title">Choose your villa and plot while every type is still available </p>
              
              <p class="booking-lede">
                All 4, 5 and 6-bedroom villa types are available now. Register to get live availability and choose your preferred layout and plot.
              </p>

              <div class="booking-features-list">
                <div class="booking-feature-item">
                  <div class="booking-feature-check">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                  </div>
                  <div class="booking-feature-text">
                    <strong>5% Down Payment &amp; 30% Post-Handover</strong>
                    <span>Spread 30% over 24 months after Q3 2029 completion.</span>
                  </div>
                </div>

                <div class="booking-feature-item">
                  <div class="booking-feature-check">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                  </div>
                 <strong>Exclusive 2% DLD Fee Waiver</strong>
<span>Enjoy exclusive savings when securing your dream villa.</span>
                </div>

                <div class="booking-feature-item">
                  <div class="booking-feature-check">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                  </div>
                  <div class="booking-feature-text">
                    <strong>Full Price List &amp; Floor Plans</strong>
                    <span>Delivered confidentially via WhatsApp with zero obligation.</span>
                  </div>
                </div>
              </div>

              
            </div>

            <!-- Right Side: Embedded Form -->
            <div class="booking-right-col">
    <div class="booking-form-card">

        <div class="booking-form-header">
            <span class="floating-badge">Check Availability</span>

            <h3 class="booking-form-title">
                Get the Price List & Availability
            </h3>

            <p class="booking-form-sub">
                Standalone Villas from AED 6.5M · 5% Down
            </p>
        </div>

        <div class="booking-form-body">
            @include('partials.lead-form-hayat', [
                'formId' => 'hayat-book-now-form',
                'source' => 'hayat_book_now_form',
                'buttonText' => 'Send Me the Details',
                'showTimeline' => true,
                'propertyId' => $property->id ?? null,
                'developerId' => $property->developer_id ?? null,
            ])
        </div>

        <div class="form-trust-points">
            <span class="trust-item">✓ All Villa Types Available</span>
            <span class="trust-item">✓ 0% Commission</span>
        </div>

    </div>
</div>

          </div>
        </div>
      </section>
      
    
    
    </main>
<footer class="site-footer" role="contentinfo">
      <div class="footer-inner">
        <div class="footer-top">
          <div class="footer-brand">
            <div class="footer-logo-text">HAYAT 8 BY DUBAI SOUTH</div>
            <div class="footer-tagline">4, 5 &amp; 6-Bedroom Standalone Villas · Golf District, Dubai South</div>
          </div>
        
        </div>

        <div class="footer-disclaimer-text">
          This page is operated by Avanor Capital L.L.C, a licensed Dubai real estate brokerage (RERA: 63012, ORN: 63296), and is not the official website of Dubai South Properties. Prices, sizes, payment plan and offers are as released by the developer in November 2026 and may change. Availability and allocation are subject to the developer’s terms. Images are artist’s impressions. Project names and trademarks belong to their respective owners.
        </div>

        <div class="footer-bottom-row">
          <div>© 2026 Avanor Capital · All rights reserved.</div>
          <div class="footer-legal-links">
            <a href="{{ route('landing.privacy-policy') }}">Privacy Policy</a>
            <span>·</span>
            <a href="{{ route('landing.terms-and-conditions') }}">Terms &amp; Conditions</a>
          </div>
        </div>
      </div>
    </footer>


        <div class="mobile-cta-bar">
      <div>
        <div style="font-size:0.84rem;font-weight:800;color:var(--navy);">HAYAT 8 Villas</div>
        <div style="font-size:0.72rem;color:var(--teal);font-weight:700;">From AED 6.5M · 5% Down</div>
      </div>
      <button type="button" class="btn-primary" data-open-form>Register Interest</button>
    </div>


    <!-- TIMED POPUP MODAL -->
<div
    class="modal-backdrop"
    id="timed-popup"
    role="dialog"
    aria-modal="true"
    aria-labelledby="timed-popup-title"
>
    <div class="modal-card">

        <button
            type="button"
            class="modal-close-btn"
            data-close-modal
            aria-label="Close popup"
        >
            &times;
        </button>

        <span class="floating-badge">
            Launched on 21 November
        </span>

        <h3 class="modal-title" id="timed-popup-title">
            HAYAT 8 Launched on 21 November
        </h3>

        <p class="modal-text">
            Standalone villas from AED 6.5M with 5% down.
            Get the price list and live availability on WhatsApp.
        </p>

        @include('partials.lead-form-hayat', [
            'formId' => 'hayat-timed-popup-form',
            'source' => 'hayat_popup',
            'buttonText' => 'Send Me the Details',
            'showTimeline' => false,
                'propertyId' => $property->id ?? null,
    'developerId' => $property->developer_id ?? null,
        ])

    </div>
</div>

<!-- GENERAL ENQUIRY MODAL -->
<div
    class="modal-backdrop"
    id="enquiry-modal"
    role="dialog"
    aria-modal="true"
    aria-labelledby="enquiry-modal-title"
>
    <div class="modal-card">

        <button
            type="button"
            class="modal-close-btn"
            data-close-modal
            aria-label="Close modal"
        >
            &times;
        </button>

        <span class="floating-badge">
            Now Selling
        </span>

        <h3 class="modal-title" id="enquiry-modal-title">
            Get the Price List & Availability
        </h3>

        <p class="modal-text">
            Enter your details to receive the brochure, floor plans and live availability.
        </p>

        @include('partials.lead-form-hayat', [
            'formId' => 'hayat-enquiry-modal-form',
            'source' => 'hayat_price_list',
            'buttonText' => 'Send Me the Details',
            'showTimeline' => true,
                'propertyId' => $property->id ?? null,
    'developerId' => $property->developer_id ?? null,
        ])

    </div>
</div>


<a
    href="https://wa.me/971555342535?text=Hi%2C%20I%E2%80%99m%20interested%20in%20HAYAT%208%20by%20Dubai%20South.%20Please%20share%20the%20brochure%2C%20prices%2C%20payment%20plan%20and%20availability.%20Thank%20you."
    class="landing-whatsapp-float whatsapp-track"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Chat on WhatsApp about HAYAT 8">

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
    </div>







</body>

</html>