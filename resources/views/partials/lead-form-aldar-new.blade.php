@php
    $formId = $formId ?? 'lead-form-' . uniqid();

    $propertyId = $propertyId ?? null;
    $developerId = $developerId ?? null;

    $heading = $heading ?? 'Register for Launch Details';

    $description = $description
        ?? '';

    $buttonText =  'Register My Interest';

    $source = $source ?? 'auto_popup';
@endphp


<div class="avanor-lead-form">

    <div class="avanor-lead-form-header">

        <div class="landing-about-v2-eyebrow">
             ENQUIRY
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
        action="{{ route('landing.aldar-enquiry.store') }}"
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
                <option value="" disabled {{ old('interested_in') ? '' : 'selected' }}>
                    Select property type
                </option>

                <option value="Villa" {{ old('interested_in') === 'Villa' ? 'selected' : '' }}>
                    Villa
                </option>

                <option value="Townhouse" {{ old('interested_in') === 'Townhouse' ? 'selected' : '' }}>
                    Townhouse
                </option>

                <option value="Not sure yet" {{ old('interested_in') === 'Not sure yet' ? 'selected' : '' }}>
                    Not sure yet
                </option>
            </select>

            @error('interested_in')
                <span class="avanor-lead-error">{{ $message }}</span>
            @enderror
        </div>

        {{-- Bedrooms --}}

        <div class="avanor-lead-field">
            <label for="{{ $formId }}-bedroom-type">
                Bedrooms
            </label>

            <select
                id="{{ $formId }}-bedroom-type"
                name="bedroom_type"
                required
            >
                <option value="" disabled {{ old('bedroom_type') ? '' : 'selected' }}>
                    Select bedrooms
                </option>

                <option value="3 Bedrooms" {{ old('bedroom_type') === '3 Bedrooms' ? 'selected' : '' }}>
                    3 Bedrooms
                </option>

                <option value="4 Bedrooms" {{ old('bedroom_type') === '4 Bedrooms' ? 'selected' : '' }}>
                    4 Bedrooms
                </option>

                <option value="5+" {{ old('bedroom_type') === '5+' ? 'selected' : '' }}>
                    5+
                </option>

                <option value="Not sure yet" {{ old('bedroom_type') === 'Not sure yet' ? 'selected' : '' }}>
                    Not sure yet
                </option>
            </select>

            @error('bedroom_type')
                <span class="avanor-lead-error">{{ $message }}</span>
            @enderror
        </div>

        {{-- Budget --}}

        <div class="avanor-lead-field">
            <label for="{{ $formId }}-budget">
                Budget
            </label>

            <select
                id="{{ $formId }}-budget"
                name="budget"
                required
            >
                <option value="" disabled {{ old('budget') ? '' : 'selected' }}>
                    Select your budget
                </option>

                <option value="Under AED 3M" {{ old('budget') === 'Under AED 3M' ? 'selected' : '' }}>
                    Under AED 3M
                </option>

                <option value="AED 3–5M" {{ old('budget') === 'AED 3–5M' ? 'selected' : '' }}>
                    AED 3–5M
                </option>

                <option value="AED 5–8M" {{ old('budget') === 'AED 5–8M' ? 'selected' : '' }}>
                    AED 5–8M
                </option>

                <option value="AED 8M+" {{ old('budget') === 'AED 8M+' ? 'selected' : '' }}>
                    AED 8M+
                </option>
            </select>

            @error('budget')
                <span class="avanor-lead-error">{{ $message }}</span>
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

We’ll only contact you about this launch. Your details are never
shared.
        </p>

    </form>

</div>
