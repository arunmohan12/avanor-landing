<div class="floating-form-header">
  <h3 class="floating-form-title">{{ $title ?? 'Priority Availability' }}</h3>
  <p class="floating-form-desc">{{ $desc ?? 'Get Price List & Live Allocations' }}</p>
</div>


<form data-lead-form action="{{ url('/landing-leads') }}" method="POST" novalidate>
    @csrf

    <input type="hidden" name="source" value="{{ $source ?? 'bayn_floating_sidebar' }}">
    <input type="hidden" name="ag" value="{{ request('ag', 'bayn') }}">

    <input type="hidden" name="property_id" value="{{ $property->id ?? 25 }}">

    <input type="hidden" name="page_url" value="{{ url()->full() }}">

    {{-- Campaign tracking --}}
    <input type="hidden" name="utm_source" value="{{ request('utm_source') }}">
    <input type="hidden" name="utm_medium" value="{{ request('utm_medium') }}">
    <input type="hidden" name="utm_campaign" value="{{ request('utm_campaign') }}">
    <input type="hidden" name="utm_content" value="{{ request('utm_content') }}">
    <input type="hidden" name="utm_term" value="{{ request('utm_term') }}">
    <input type="hidden" name="gclid" value="{{ request('gclid') }}">
    <input type="hidden" name="fbclid" value="{{ request('fbclid') }}">

    {{-- Honeypot --}}
    <input type="text"
           name="website_hp"
           style="display:none !important;"
           tabindex="-1"
           autocomplete="off">

    <div class="form-group">
        <label class="form-label">Full Name *</label>
        <input type="text"
               name="name"
               class="form-input"
               placeholder="Your full name"
               value="{{ old('name') }}"
               required>
    </div>

    <div class="form-group">
        <label class="form-label">Phone Number *</label>

        <div class="phone-field-group">
            <select class="country-select" aria-label="Country Code"></select>

            <input type="tel"
                   name="phone"
                   class="form-input phone-input"
                   placeholder="+971 50 123 4567"
                   value="{{ old('phone') }}"
                   required>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Email Address *</label>
        <input type="email"
               name="email"
               class="form-input"
               placeholder="name@domain.com"
               value="{{ old('email') }}"
               required>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label">Interest</label>

            <select name="bedroom_type" class="form-select" required>
                <option value="4BR Core Villa">4BR Core Villa</option>
                <option value="5BR Mansion">5BR Mansion</option>
                <option value="6BR Mansion">6BR Mansion</option>
                <option value="Custom Plot">Custom Plot</option>
                <option value="Not sure yet">Not sure yet</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Budget</label>

            <select name="budget" class="form-select">
                <option value="7–10M">AED 7M – 10M</option>
                <option value="10–25M">AED 10M – 25M</option>
                <option value="25–50M">AED 25M – 50M</option>
                <option value="50M+">AED 50M+</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Purchasing Timeline</label>

        <select name="message" class="form-select">
            <option value="Ready to reserve">Ready to reserve</option>
            <option value="Within 3 months">Within 3 months</option>
            <option value="Just exploring">Just exploring</option>
        </select>
    </div>

    <button type="submit" class="btn-submit-form">
        {{ $button_text ?? 'Get Live Price List' }}
    </button>

    <p class="form-privacy-note">
        {{ $privacy_note ?? 'Official Avanor Capital Registered ORA Broker' }}
    </p>
</form>
