
@php
    $source = $source ?? 'hayat_floating_side_form';
    $buttonText = $buttonText ?? 'Send Me the Details';
    $showTimeline = $showTimeline ?? true;
    $formId = $formId ?? 'hayat-lead-form';

    $propertyId = $propertyId ?? null;
    $developerId = $developerId ?? null;
@endphp
<form
    id="{{ $formId }}"
    data-lead-form
    action="{{ url('/landing-leads') }}"
    method="POST"
    novalidate
>
    @csrf

    <!-- Honeypot -->
    <input type="text" name="website_hp" tabindex="-1"
           autocomplete="off" style="display:none">
<input type="hidden" name="property_id" value="{{ $propertyId }}">
<input type="hidden" name="developer_id" value="{{ $developerId }}">
    <!-- Lead details -->
    <input type="hidden" name="source" value="{{ $source }}">
    <input type="hidden" name="page_url" value="">

    <!-- Campaign tracking -->
    @foreach (['utm_source', 'utm_medium', 'utm_campaign',
        'utm_content', 'utm_term', 'gclid', 'fbclid'] as $field)
        <input type="hidden" name="{{ $field }}" value="">
    @endforeach

    <div class="form-grid">

        <!-- Name -->
        <div class="form-group">
            <label class="form-label" for="{{ $formId }}-name">
                Full Name *
            </label>
            <input
                type="text"
                id="{{ $formId }}-name"
                name="name"
                class="form-input"
                placeholder="Your full name"
                required
            >
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label class="form-label" for="{{ $formId }}-phone">
                Phone / WhatsApp *
            </label>

            <div class="phone-input-group" data-phone-picker>

                <button
                    type="button"
                    class="country-code-btn"
                    data-phone-trigger
                    aria-haspopup="listbox"
                    aria-expanded="false"
                >
                    <span class="country-code-flag"
                          data-phone-flag data-cc="AE">🇦🇪</span>
                    <span data-phone-dial>+971</span>
                    <svg class="country-code-arrow" viewBox="0 0 10 6">
                        <path d="M1 1L5 5L9 1"
                              stroke="currentColor"
                              stroke-width="1.5"
                              fill="none"/>
                    </svg>
                </button>

                <div class="country-dropdown-panel"
                     data-phone-panel hidden>
                    <input
                        type="text"
                        class="country-search-input"
                        data-phone-search
                        placeholder="Search country (+971)..."
                    >
                    <div class="country-options-list"
                         data-phone-list role="listbox"></div>
                </div>

                <input
                    type="tel"
                    id="{{ $formId }}-phone"
                    name="phone_local"
                    class="form-input"
                    placeholder="50 123 4567"
                    required
                >

                <input type="hidden" name="phone">
            </div>
        </div>

        <!-- Email -->
        <div class="form-group">
    <label class="form-label" for="{{ $formId }}-email">Email Address *</label>

    <input type="email"
        id="{{ $formId }}-email"
        name="email"
        class="form-input"
        placeholder="name@example.com"
        value="{{ old('email') }}"
        required>

    @error('email')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>

        <!-- Villa Layout -->
        <div class="form-group">
            <label class="form-label" for="{{ $formId }}-villa">
                {{ $villaLabel ?? 'Villa Layout' }}
            </label>

            <select
                id="{{ $formId }}-villa"
                name="bedroom_type"
                class="form-select"
            >
                <option value="4 BR Villa">4 Bedroom Villa (4,842 sq ft)</option>
                <option value="5 BR Villa">5 Bedroom Villa (5,678 sq ft)</option>
                <option value="6 BR Villa">6 Bedroom Villa (6,305 sq ft)</option>
                <option value="Not sure yet" selected>Not sure yet</option>
            </select>
        </div>

        <!-- Timeline -->
        
            <div class="form-group">
                <label class="form-label" for="{{ $formId }}-timeline">
                    Purchase Timeline
                </label>

                <select
                    id="{{ $formId }}-timeline"
                    name="message"
                    class="form-select"
                >
                    <option value="Ready to Book">
                        Ready to Book
                    </option>
                    <option value="Within 3 months">
                        Within 3 months
                    </option>
                    <option value="Just exploring" selected>
                        Just exploring
                    </option>
                </select>
            </div>
  

        <!-- Submit -->
        <button type="submit" class="btn-submit">
            <span>{{ $buttonText }}</span>
        </button>

    </div>

    <p class="form-privacy-note">
        We'll only contact you about HAYAT 8.
        Your details are never shared.
    </p>
</form>
