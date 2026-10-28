@php
$source = $source ?? 'palm-springs-popup';
@endphp


<div class="sticky-register-card">
    <div class="sticky-card-head">
        <span class="sticky-card-tag">Palm Spring &bull; PALM JEBEL ALI</span>
        <h3 class="sticky-card-title">
            {{ $title ?? 'Get the Price List First' }}
        </h3>
        <p class="sticky-card-sub">{{ $subtitle ?? 'We’ll only contact you about this launch. Your details are never shared'}}</p>
    </div>
    <form data-enquire action="{{ route('landing.leads.store') }}" method="post" novalidate aria-label="Registration form">
        @csrf
        <input type="hidden" name="property_id" value="{{ $property->id }}">
        <input type="hidden" name="developer_id" value="{{ $property->developer_id }}">
        <input type="hidden" name="source" value="{{ $source }}" autocomplete="off">
        <input type="hidden" name="page_url" value="{{ url()->full() }}">

        <input type="hidden" name="utm_source">
        <input type="hidden" name="utm_medium">
        <input type="hidden" name="utm_campaign">
        <input type="hidden" name="utm_content">
        <input type="hidden" name="utm_term">

        <input type="hidden" name="gclid">
        <input type="hidden" name="fbclid">
        <input type="hidden" name="country_code" class="country-code-input">
        <div class="sticky-fields">

            <div class="field">
                <label for="sticky-Name">Full Name*</label>
                <input
                    id="sticky-Name"
                    name="name"
                    type="text"
                    autocomplete="name"
                    maxlength="400"
                    placeholder="Jane Doe"
                    required>
                <small class="field-error" data-error-for="name"></small>
            </div>

            <div class="field">
                <label for="sticky-Email">Email Address*</label>
                <input
                    id="sticky-Email"
                    name="email"
                    type="email"
                    autocomplete="email"
                    maxlength="400"
                    placeholder="jane@example.com"
                    required>
                <small class="field-error" data-error-for="email"></small>
            </div>

            <div class="field">
                <label for="sticky-Phone">Mobile Phone*</label>

                <div class="phone-row">
                    <div class="phone-code" data-phone-code>
                        <button
                            type="button"
                            class="phone-code-trigger"
                            data-phone-code-trigger
                            aria-haspopup="listbox"
                            aria-expanded="false">
                            <span data-phone-code-flag>🇦🇪</span>
                            <span data-phone-code-dial>+971</span>
                            <svg viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </button>

                        <div class="phone-code-panel" data-phone-code-panel hidden>
                            <input
                                type="text"
                                class="phone-code-search"
                                data-phone-code-search
                                placeholder="Search country or code (+971)…"
                                autocomplete="off">
                            <div class="phone-code-list"
                                data-phone-code-list role="listbox"></div>
                        </div>
                    </div>

                    <input
                        id="phone"
                        name="phone"
                        type="tel"
                        inputmode="tel"
                        autocomplete="tel-national"
                        maxlength="40"
                        placeholder="50 123 4567"
                        required>
                </div>

                <input type="hidden" name="phone_country_code" value="+971">
                <small class="field-error" data-error-for="phone"></small>
            </div>

            <div class="field">
                <label for="sticky-Interest">I'm Interested In*</label>

                <select id="sticky-Interest" name="interested_in" required>
                    <option value="" selected disabled>Select Unit Type</option>
                    <option value="Townhouse">Townhouse</option>
                    <option value="Villa">Villa</option>
                    <option value="Not sure yet">Not sure yet</option>
                </select>

                <small class="field-error" data-error-for="interested_in"></small>
            </div>

            <div class="field">
                <label for="sticky-Bedrooms">Preferred Bedrooms*</label>

                <select id="sticky-Bedrooms" name="bedroom_type" required>
                    <option value="" selected disabled>Select Bedrooms</option>
                    <option value="3 Bedroom">3 Bedrooms</option>
                    <option value="4 Bedroom">4 Bedrooms</option>
                    <option value="5 Bedroom">5 Bedrooms</option>
                </select>

                <small class="field-error" data-error-for="bedroom_type"></small>
            </div>

            <button class="btn btn-champagne sticky-submit-btn" type="submit">
                {{ $buttontext ?? 'Send Me the Details' }}
            </button>

            <div class="form-status" role="status" aria-live="polite"></div>

            <div class="sticky-card-trust">
                <span>🔒 100% Freehold</span>
                <span>&bull;</span>
                <span>0% Commission</span>
                <span>&bull;</span>
                <span>Official Nakheel Updates</span>
            </div>

        </div>
    </form>
</div>