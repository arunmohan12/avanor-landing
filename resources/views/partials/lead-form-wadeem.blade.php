
<div class="sticky-register-card">
    <div class="sticky-card-head">
        <span class="sticky-card-tag">Hudayriyat Island &bull; Abu Dhabi</span>
        <h3 class="sticky-card-title">Get Early Access</h3>
        <p class="sticky-card-sub">Get direct developer pricing, official floor plans &amp; priority launch updates.</p>
    </div>
    <form data-enquire     action="{{ route('landing.leads.store') }}" method="post" novalidate aria-label="Registration form">
        @csrf
        <input type="hidden" name="property_id" value="{{ $property->id }}">
        <input type="hidden" name="developer_id" value="{{ $property->developer_id }}">
        <input type="hidden" name="source" value="wadeem-gardens-landing">
        <input type="hidden" name="page_url" value="{{ url()->current() }}">

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
                <input id="sticky-Name" name="name" type="text" autocomplete="name" maxlength="400" placeholder="Jane Doe" required>
            </div>
            <div class="field">
                <label for="sticky-Email">Email Address*</label>
                <input id="sticky-Email" name="email" type="email" autocomplete="email" maxlength="400" placeholder="jane@example.com" required>
            </div>
            <div class="field">
                <label for="sticky-Phone">Mobile Phone*</label>
                <div class="phone-row">
                    <div class="phone-code" data-phone-code>
                        <button type="button" class="phone-code-trigger" data-phone-code-trigger aria-haspopup="listbox" aria-expanded="false">
                            <span data-phone-code-flag>🇦🇪</span>
                            <span data-phone-code-dial>+971</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                        <div class="phone-code-panel" data-phone-code-panel hidden>
                            <input type="text" class="phone-code-search" data-phone-code-search placeholder="Search country or code (+971)…" autocomplete="off">
                            <div class="phone-code-list" data-phone-code-list role="listbox"></div>
                        </div>
                    </div>
                    <input id="phone" name="phone" type="tel" inputmode="tel" autocomplete="tel-national" maxlength="40" placeholder="50 123 4567" required>
                </div>
                <input type="hidden" name="phone_country_code" value="+971">

            </div>
            <div class="field">
                <label for="sticky-Interest">I'm Interested In*</label>
                <select id="sticky-Interest" name="bedroom_type" required>
                    <option value="4 Bedroom Villa">4-Bedroom Villa (from AED 8.7M)</option>
                    <option value="5 Bedroom Villa">5-Bedroom Villa (from AED 10.2M)</option>
                    <option value="6 Bedroom Villa">6-Bedroom Villa (from AED 11.6M)</option>
                </select>
            </div>
            <button class="btn btn-champagne sticky-submit-btn" type="submit">Submit</button>
            <div class="form-status" role="status" aria-live="polite"></div>
            <div class="sticky-card-trust">
                <span>🔒 100% Freehold</span>
                <span>&bull;</span>
                <span>0% Commission</span>
                <span>&bull;</span>
                <span>Official Modon Updates</span>
            </div>
        </div>
    </form>
</div>
