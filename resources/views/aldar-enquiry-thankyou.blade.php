
@extends('layouts.landing')

@section('title', 'Thank You | Aldar | Avanor')

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

<section class="aldar-thank-you">
    <div class="aldar-thank-you-content">

        <h1>Thank you, you’re on the priority list</h1>

        <p>
            We’ll send the price list, floor plans and payment plan to your
            WhatsApp as soon as Aldar releases them.
        </p>

        <p>
            Want to talk now? Chat with an advisor on WhatsApp.
        </p>

        <a
            href="https://wa.me/971555342535"
            class="aldar-whatsapp-btn"
            target="_blank"
            rel="noopener noreferrer"
        >
            Chat on WhatsApp
        </a>

    </div>
</section>

@endsection
