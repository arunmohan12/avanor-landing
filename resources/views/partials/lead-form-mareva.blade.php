@php
    $formId = $formId ?? 'lead-form-' . uniqid();

    $propertyId = $propertyId ?? null;
    $developerId = $developerId ?? null;

    $heading = $heading ?? 'Get Prices & Priority Access';

    $description = $description
        ?? '';

    $buttonText =  'Send Me the Details';

    $source = $source ?? 'mareva-popup';
@endphp


<div class="avanor-lead-form">

    <div class="avanor-lead-form-header">

        <div class="landing-about-v2-eyebrow">
            PROPERTY ENQUIRY
        </div>

        <h3 class="title">
            {{ $heading }}
        </h3>

        <p>
            {{ $description }}
        </p>

    </div>


    @if (session('lead_success'))
        <div class="avanor-lead-success">
            {{ session('lead_success') }}
        </div>
    @endif


    <form
        id="{{ $formId }}"
        method="POST"
        action="{{ $action ?? route('landing.leads.store') }}"
        class="avanor-lead-form-element"
    >

        @csrf


        {{-- Context --}}

        @if ($propertyId)
            <input
                type="hidden"
                name="property_id"
                value="{{ $propertyId }}"
            >
        @endif

        @if ($developerId)
            <input
                type="hidden"
                name="developer_id"
                value="{{ $developerId }}"
            >
        @endif


        <input
            type="hidden"
            name="source"
            value="{{ $source }}"
        >

        <input
            type="hidden"
            name="page_url"
            value="{{ url()->full() }}"
        >


        {{-- Campaign tracking --}}

        <input
            type="hidden"
            name="utm_source"
            value="{{ request('utm_source') }}"
        >

        <input
            type="hidden"
            name="utm_medium"
            value="{{ request('utm_medium') }}"
        >

        <input
            type="hidden"
            name="utm_campaign"
            value="{{ request('utm_campaign') }}"
        >

        <input
            type="hidden"
            name="utm_content"
            value="{{ request('utm_content') }}"
        >

        <input
            type="hidden"
            name="utm_term"
            value="{{ request('utm_term') }}"
        >

        <input
            type="hidden"
            name="gclid"
            value="{{ request('gclid') }}"
        >

        <input
            type="hidden"
            name="fbclid"
            value="{{ request('fbclid') }}"
        >


        {{-- Full Name --}}

        <div class="avanor-lead-field">

            <label for="{{ $formId }}-name">
                Full Name
            </label>

            <input
                type="text"
                id="{{ $formId }}-name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter your full name"
                autocomplete="name"
                required
            >

            @error('name')
            <span class="avanor-lead-error">
                    {{ $message }}
                </span>
            @enderror

        </div>


        {{-- Phone --}}

        <div class="avanor-lead-field">

            <label for="{{ $formId }}-phone">
                Phone / WhatsApp
            </label>

            <input
                type="tel"
                id="{{ $formId }}-phone"
                name="phone"
                value="{{ old('phone') }}"
                placeholder="Mobile Number"
                autocomplete="tel"
                required
            >

            @error('phone')
            <span class="avanor-lead-error">
                    {{ $message }}
                </span>
            @enderror

        </div>


        {{-- Email --}}

        <div class="avanor-lead-field">

            <label for="{{ $formId }}-email">
                Email Address
            </label>

            <input
                type="email"
                id="{{ $formId }}-email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email address"
                autocomplete="email"
            >

            @error('email')
            <span class="avanor-lead-error">
                    {{ $message }}
                </span>
            @enderror

        </div>




{{-- Interested In --}}

<div class="avanor-lead-field">

    <label for="{{ $formId }}-interested-in">
        Interested In
    </label>

    <select
        id="{{ $formId }}-interested-in"
        name="interested_in"
        required
    >
        <option
            value=""
            disabled
            {{ old('interested_in') ? '' : 'selected' }}
        >
            Select your preferred property
        </option>

        <option
            value="Address Tierra"
            {{ old('interested_in') === 'Address Tierra' ? 'selected' : '' }}
        >
            Address Tierra
        </option>

        <option
            value="Palace Ostra"
            {{ old('interested_in') === 'Palace Ostra' ? 'selected' : '' }}
        >
            Palace Ostra
        </option>

        <option
            value="Mareva"
            {{ old('interested_in') === 'Mareva' ? 'selected' : '' }}
        >
            Mareva
        </option>

        <option
            value="Not sure"
            {{ old('interested_in') === 'Not sure' ? 'selected' : '' }}
        >
            Not sure
        </option>
    </select>

    @error('interested_in')
        <span class="avanor-lead-error">
            {{ $message }}
        </span>
    @enderror

</div>



        {{-- Villa Type --}}

        <div class="avanor-lead-field">

            <label for="{{ $formId }}-bedroom-type">
                Villa Type
            </label>

            <select
                id="{{ $formId }}-bedroom-type"
                name="bedroom_type"
                required
            >
                <option value="" disabled {{ old('bedroom_type') ? '' : 'selected' }}>
                    Select Unit type
                </option>

                <option
                    value="4 Bedroom Villa"
                    {{ old('bedroom_type') === '4 Bedroom Villa' ? 'selected' : '' }}
                >
                    4 Bedroom Villa
                </option>

                <option
                    value="5 Bedroom Villa"
                    {{ old('bedroom_type') === '5 Bedroom Villa' ? 'selected' : '' }}
                >
                    5 Bedroom Villa
                </option>

                <option
                    value="6 Bedroom Villa"
                    {{ old('bedroom_type') === '6 Bedroom Villa' ? 'selected' : '' }}
                >
                    6 Bedroom Villa
                </option>
            </select>

            @error('bedroom_type')
            <span class="avanor-lead-error">
                    {{ $message }}
                </span>
            @enderror

        </div>


        {{-- Submit --}}

        <button
            type="submit"
            id="{{ $formId }}-submit"
            data-lead-popup-submit
            class="avanor-lead-submit"
        >

            {{ strtoupper($buttonText) }}

            <x-landing-icon name="arrow-right" />

        </button>


        <p class="avanor-lead-consent">

Prices for every home type, floor plans and the full payment schedule, sent
to your WhatsApp.
        </p>

    </form>

</div>
