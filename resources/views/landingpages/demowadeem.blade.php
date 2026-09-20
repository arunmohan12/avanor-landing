
@extends('layouts.landing')

@section('content')

    <main class="wadeem-page">

        {{-- Header --}}
        <header class="wadeem-header">
            <div class="wadeem-header-inner">

                <a href="#" class="wadeem-logo" aria-label="Wadeem">
                    <span>WADEEM</span>
                </a>

                <nav class="wadeem-nav" aria-label="Main navigation">
                    <a href="#about">About</a>
                    <a href="#villas">Villas</a>
                    <a href="#architecture">Architecture</a>
                    <a href="#amenities">Amenities</a>
                    <a href="#location">Location</a>
                </nav>

                <a href="#register" class="wadeem-header-cta">
                    <span>Register Interest</span>
                    <i class="wadeem-arrow">↗</i>
                </a>

                <button
                    type="button"
                    class="wadeem-menu-toggle"
                    aria-label="Open menu"
                    aria-expanded="false"
                >
                    <span></span>
                    <span></span>
                </button>

            </div>
        </header>


        {{-- Mobile Navigation --}}
        <div class="wadeem-mobile-menu">

            <div class="wadeem-mobile-menu-inner">

                <nav>
                    <a href="#about">About</a>
                    <a href="#villas">Villas</a>
                    <a href="#architecture">Architecture</a>
                    <a href="#amenities">Amenities</a>
                    <a href="#location">Location</a>
                </nav>

                <a href="#register" class="wadeem-mobile-cta">
                    Register Interest
                    <span>↗</span>
                </a>

            </div>

        </div>


        {{-- Hero --}}
        <section class="wadeem-hero">

            <div class="wadeem-hero-media">
                <img
                    src="{{ asset('assets/images/landing/wadeem/hero.jpg') }}"
                    alt="Wadeem"
                >
            </div>

            <div class="wadeem-hero-overlay"></div>

            <div class="wadeem-hero-content">

                <p class="wadeem-eyebrow">
                    MODON
                </p>

                <h1>
                    WADEEM
                </h1>

                <p class="wadeem-hero-description">
                    A new expression of contemporary living,
                    surrounded by nature and designed for
                    a life of distinction.
                </p>

                <a href="#register" class="wadeem-primary-btn">
                    <span>Register Interest</span>
                    <span class="wadeem-btn-arrow">↗</span>
                </a>

            </div>

            <div class="wadeem-hero-bottom">

                <span class="wadeem-scroll-label">
                    Scroll to explore
                </span>

                <span class="wadeem-scroll-line"></span>

            </div>

        </section>


        {{-- Temporary section so navigation can be tested --}}
        <section id="about" class="wadeem-placeholder-section">
            <span>01</span>
            <h2>About Wadeem</h2>
        </section>

    </main>

@endsection

@push('styles')
    @vite('resources/css/landing/wadeemv2.css')
@endpush

@push('scripts')
    @vite('resources/js/landing/wadeem.js')
@endpush

