@extends('layouts.landing')

@section('title', 'Thank You | Avanor')

@section('content')

@if (session('lead_email') || session('lead_phone'))
    <script>
        window.dataLayer = window.dataLayer || [];

        window.dataLayer.push({
            event: 'lead_conversion_user_data',
            user_data: {
                email: @json(session('lead_email')),
                phone_number: @json(session('lead_phone'))
            }
        });
    </script>
@endif

<section class="landing-thankyou">

    <div class="landing-thankyou-content">

        <span class="landing-thankyou-eyebrow">
            ENQUIRY RECEIVED
        </span>

        <h1>
            Thank You
        </h1>

        <div class="landing-thankyou-line"></div>

        <p>
            Thank you for registering your interest.
            Our property advisor will contact you shortly with further details.
        </p>

        <div class="landing-thankyou-actions">

            <a
                href="{{ url()->previous() }}"
                class="landing-thankyou-btn">
                BACK TO PROPERTY
            </a>

            <a
                href="https://wa.me/+971555342535"
                class="landing-thankyou-whatsapp"
                target="_blank"
                rel="noopener">
                <img
                    src="{{ asset('assets/img/whatsapp.svg') }}"
                    alt="">
                CHAT ON WHATSAPP
            </a>

        </div>

    </div>

</section>

@endsection
