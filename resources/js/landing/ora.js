/**
 * Y VIEWS AT BAYN — ORA DEVELOPERS
 * Main JavaScript: Dynamic Hero, UTM Tracking, Floating Sidebar Fade-Out,
 * Comprehensive Modal Triggers on EVERY Button, FAQ Accordion, and Lead Handling
 */

(() => {
  'use strict';

  const $ = (selector, context = document) => context.querySelector(selector);
  const $$ = (selector, context = document) => [...context.querySelectorAll(selector)];

  

  /* ==========================================================================
     2. CAPTURE UTM PARAMETERS & GCLID INTO ALL FORMS
     ========================================================================== */
  /* ==========================================================================
   2. CAPTURE UTM PARAMETERS, GCLID, FBCLID & AD GROUP INTO ALL FORMS
   ========================================================================== */

const initUtmCapture = () => {
    const params = new URLSearchParams(window.location.search);

    const trackingKeys = [
        'gclid',
        'fbclid',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
        'ag'
    ];

    const storagePrefix = 'bayn_';

    // Store incoming tracking parameters for the current session
    trackingKeys.forEach(key => {
        const val = params.get(key);

        if (val) {
            sessionStorage.setItem(storagePrefix + key, val);
        }
    });

    // Populate tracking fields in all forms
    $$('form').forEach(form => {

        trackingKeys.forEach(key => {
            let input = form.querySelector(`input[name="${key}"]`);

            if (!input) {
                input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                form.appendChild(input);
            }

            input.value =
                params.get(key) ||
                sessionStorage.getItem(storagePrefix + key) ||
                '';
        });

        // Capture the actual landing page URL
        let pageUrlInput = form.querySelector('input[name="page_url"]');

        if (!pageUrlInput) {
            pageUrlInput = document.createElement('input');
            pageUrlInput.type = 'hidden';
            pageUrlInput.name = 'page_url';
            form.appendChild(pageUrlInput);
        }

        pageUrlInput.value = window.location.href;
    });
};

  /* ==========================================================================
   3. COMPREHENSIVE COUNTRY DIAL CODES
   ========================================================================== */

const dialCodes = [
    { name: "United Arab Emirates", cc: "AE", dial: "+971" },
    { name: "Saudi Arabia", cc: "SA", dial: "+966" },
    { name: "Qatar", cc: "QA", dial: "+974" },
    { name: "Kuwait", cc: "KW", dial: "+965" },
    { name: "Oman", cc: "OM", dial: "+968" },
    { name: "Bahrain", cc: "BH", dial: "+973" },
    { name: "United Kingdom", cc: "GB", dial: "+44" },
    { name: "United States", cc: "US", dial: "+1" },
    { name: "Canada", cc: "CA", dial: "+1" },
    { name: "India", cc: "IN", dial: "+91" },
    { name: "Pakistan", cc: "PK", dial: "+92" },
    { name: "Russia", cc: "RU", dial: "+7" },
    { name: "Germany", cc: "DE", dial: "+49" },
    { name: "France", cc: "FR", dial: "+33" },
    { name: "Italy", cc: "IT", dial: "+39" },
    { name: "Spain", cc: "ES", dial: "+34" },
    { name: "Switzerland", cc: "CH", dial: "+41" },
    { name: "Netherlands", cc: "NL", dial: "+31" },
    { name: "Australia", cc: "AU", dial: "+61" },
    { name: "China", cc: "CN", dial: "+86" },
    { name: "Egypt", cc: "EG", dial: "+20" },
    { name: "Jordan", cc: "JO", dial: "+962" },
    { name: "Lebanon", cc: "LB", dial: "+961" },
    { name: "Turkey", cc: "TR", dial: "+90" },
    { name: "Singapore", cc: "SG", dial: "+65" },
    { name: "Hong Kong", cc: "HK", dial: "+852" },
    { name: "South Africa", cc: "ZA", dial: "+27" },
    { name: "Nigeria", cc: "NG", dial: "+234" },
    { name: "Sweden", cc: "SE", dial: "+46" },
    { name: "Norway", cc: "NO", dial: "+47" },
    { name: "Denmark", cc: "DK", dial: "+45" },
    { name: "Belgium", cc: "BE", dial: "+32" },
    { name: "Austria", cc: "AT", dial: "+43" },
    { name: "Ireland", cc: "IE", dial: "+353" },
    { name: "New Zealand", cc: "NZ", dial: "+64" },
    { name: "Kazakhstan", cc: "KZ", dial: "+7" },
    { name: "Uzbekistan", cc: "UZ", dial: "+998" },
    { name: "Azerbaijan", cc: "AZ", dial: "+994" },
    { name: "Malaysia", cc: "MY", dial: "+60" },
    { name: "Indonesia", cc: "ID", dial: "+62" },
    { name: "Philippines", cc: "PH", dial: "+63" },
    { name: "Brazil", cc: "BR", dial: "+55" },
    { name: "Mexico", cc: "MX", dial: "+52" },
    { name: "Morocco", cc: "MA", dial: "+212" },
    { name: "Algeria", cc: "DZ", dial: "+213" },
    { name: "Tunisia", cc: "TN", dial: "+216" },
    { name: "Iraq", cc: "IQ", dial: "+964" }
];


/* ==========================================================================
   4. INITIALIZE COUNTRY PHONE PICKERS
   ========================================================================== */

const initPhonePickers = () => {
    $$('select.country-select').forEach(select => {

        select.innerHTML = '';

        dialCodes.forEach(item => {
            const opt = document.createElement('option');

            opt.value = item.dial;
            opt.textContent = `${item.cc} (${item.dial})`;

            if (item.cc === 'AE') {
                opt.selected = true;
            }

            select.appendChild(opt);
        });
    });
};

  /* ==========================================================================
   4. MODAL POPUPS & BUTTON TRIGGERS ON EVERY CTA
   ========================================================================== */

const getModal = () => document.getElementById('lead-modal');


/* --------------------------------------------------------------------------
   OPEN MODAL
   -------------------------------------------------------------------------- */

const openModal = (interestValue = '') => {

    const modal = getModal();
    if (!modal) return;

    // Set lead source using data-interest value
    const sourceInput = modal.querySelector(
        'form[data-lead-form] input[name="source"]'
    );

    if (sourceInput) {
        sourceInput.value = interestValue || 'y_views_modal_popup';
    }


    // Ensure phone picker inside modal is populated
    const selectCountry = modal.querySelector('select.country-select');

    if (selectCountry && selectCountry.children.length === 0) {
        initPhonePickers();
    }


    // Pre-select unit interest in dropdown
    if (interestValue) {

        const selectInterest = modal.querySelector('select[name="Interest"]');

        if (selectInterest) {

            const val = interestValue.trim().toLowerCase();
            const options = [...selectInterest.options];

            let targetMatch = null;


            // 4BR / CORE
            if (val.includes('4br') || val.includes('core')) {

                targetMatch = options.find(o =>
                    o.value.toLowerCase().includes('4br') ||
                    o.textContent.toLowerCase().includes('4br')
                );


            // 5BR / SUNRAY
            } else if (val.includes('5br') || val.includes('sunray')) {

                targetMatch = options.find(o =>
                    o.value.toLowerCase().includes('5br') ||
                    o.textContent.toLowerCase().includes('5br')
                );


            // 6BR / SUNWARD / EVER / SEAWARD
            } else if (
                val.includes('6br') ||
                val.includes('sunward') ||
                val.includes('ever') ||
                val.includes('seaward')
            ) {

                targetMatch = options.find(o =>
                    o.value.toLowerCase().includes('6br') ||
                    o.textContent.toLowerCase().includes('6br')
                );


            // PLOTS
            } else if (val.includes('plot')) {

                targetMatch = options.find(o =>
                    o.value.toLowerCase().includes('plot') ||
                    o.textContent.toLowerCase().includes('plot')
                );


            // PAYMENT PLAN / BROCHURE / OTHER VALUES
            } else {

                targetMatch = options.find(o =>
                    o.value.toLowerCase().includes(val) ||
                    o.textContent.toLowerCase().includes(val)
                );
            }


            // Apply matched interest
            if (targetMatch) {

                selectInterest.value = targetMatch.value;

                selectInterest.dispatchEvent(
                    new Event('change', { bubbles: true })
                );
            }
        }


        // Contextual subtitle on popup header
        const formDesc = modal.querySelector('.floating-form-desc');

        if (formDesc) {

            const val = interestValue.toLowerCase();

            if (val.includes('brochure')) {

                formDesc.textContent = 'Download VIP Brochure & Floor Plans';

            } else if (val.includes('payment')) {

                formDesc.textContent = 'Request 60/40 Payment Plan Schedule';

            } else if (val.includes('plot')) {

                formDesc.textContent = 'Enquire on Custom Beachfront & Hillside Plots';

            } else if (
                val.includes('core') ||
                val.includes('mansion') ||
                val.includes('floor')
            ) {

                formDesc.textContent = 'Get Architectural Floor Plans & Pricing';

            } else {

                formDesc.textContent = 'Get Price List & Live Availability';
            }
        }
    }


    // Display modal
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';


    // Focus first input field
    setTimeout(() => {

        const firstInput = modal.querySelector('input[name="Name"]');

        if (firstInput) {
            firstInput.focus();
        }

    }, 60);
};


/* --------------------------------------------------------------------------
   CLOSE MODAL
   -------------------------------------------------------------------------- */

const closeModal = () => {

    const modal = getModal();
    if (!modal) return;

    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';

    // Suppress auto-popup after user closes modal
    sessionStorage.setItem('yviews_auto_modal_shown', 'true');
};


/* --------------------------------------------------------------------------
   EXPOSE GLOBALLY FOR INLINE TRIGGERS & EXTERNAL CALLERS
   -------------------------------------------------------------------------- */

window.openModal = openModal;
window.openLeadModal = openModal;
window.closeModal = closeModal;
window.closeLeadModal = closeModal;


/* --------------------------------------------------------------------------
   CTA DETECTION
   -------------------------------------------------------------------------- */

const getCtaTrigger = (el) => {

    if (!el || !(el instanceof Element)) return null;


    // Exclude non-CTA elements
    if (
        el.closest('button[type="submit"]') ||
        el.closest('[data-modal-close]') ||
        el.closest('.faq-trigger') ||
        el.closest('.mobile-menu-toggle') ||
        el.closest('.btn-whatsapp-icon') ||
        el.closest('.btn-whatsapp-hero') ||
        el.closest('a[href^="tel:"]') ||
        el.closest('a[href^="https://ora-uae.com"]')
    ) {
        return null;
    }


    // Detect CTA
    return el.closest(
        '[data-open-modal], ' +
        '.btn-card-cta, ' +
        '.btn-unlock-fp, ' +
        '.btn-header-cta, ' +
        '.btn-hero-cta, ' +
        '.btn-plots-cta, ' +
        '.trigger-modal-cta, ' +
        'button[data-interest], ' +
        'a[data-open-modal], ' +
        'button.btn-primary:not([type="submit"]), ' +
        'button.btn-secondary:not([type="submit"])'
    );
};


/* --------------------------------------------------------------------------
   INITIALIZE MODAL & CTA EVENTS
   -------------------------------------------------------------------------- */

const initModalsAndButtons = () => {

    // Single delegated handler for all CTA buttons
    // Supports dynamically added elements and prevents duplicate bindings

    document.addEventListener('click', (e) => {


        // CLOSE BUTTON
        if (e.target.closest('[data-modal-close]')) {

            e.preventDefault();
            closeModal();
            return;
        }


        // BACKDROP CLICK
        const modal = getModal();

        if (modal && e.target === modal) {

            e.preventDefault();
            closeModal();
            return;
        }


        // CTA CLICK
        const trigger = getCtaTrigger(e.target);

        if (trigger) {

            e.preventDefault();

            const interest = trigger.getAttribute('data-interest') || '';

            // Use data-interest as the lead source
            openModal(interest);
        }

    }, true);


    // ESC KEY TO CLOSE MODAL
    document.addEventListener('keydown', (e) => {

        const modal = getModal();

        if (
            e.key === 'Escape' &&
            modal &&
            modal.classList.contains('is-open')
        ) {
            closeModal();
        }

    });

};

  /* ==========================================================================
     5. AUTOMATIC POPUP (30 SECONDS OR 50% SCROLL)
     ========================================================================== */
  const initAutomaticPopup = () => {
    let triggered = false;

    const maybeTrigger = () => {
      if (triggered) return;
      if (sessionStorage.getItem('yviews_lead_submitted') === 'true') return;
      if (sessionStorage.getItem('yviews_auto_modal_shown') === 'true') return;
      const modal = getModal();
      if (modal && modal.classList.contains('is-open')) return;

      triggered = true;
      sessionStorage.setItem('yviews_auto_modal_shown', 'true');
      openModal();
    };

    // 30 seconds timer
    setTimeout(() => {
      maybeTrigger();
    }, 30000);

    // 50% scroll trigger
    const onScroll = () => {
      const scrollPos = window.scrollY + window.innerHeight;
      const totalHeight = document.documentElement.scrollHeight;
      if (scrollPos / totalHeight >= 0.5) {
        maybeTrigger();
        window.removeEventListener('scroll', onScroll);
      }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
  };

  /* ==========================================================================
     6. FLOATING FORM FADE-OUT NEAR DEVELOPER / BOOKING SECTION
     ========================================================================== */
  const initFloatingFormFade = () => {
    const floatingSidebar = $('.floating-sidebar-container');
    const targetSection = $('#book-now') || $('#developer');
    if (!floatingSidebar || !targetSection) return;

    const checkFade = () => {
      const rect = targetSection.getBoundingClientRect();
      // Fade out when the target section approaches into view
      const threshold = window.innerHeight * 0.75;
      const shouldHide = rect.top <= threshold;
      floatingSidebar.classList.toggle('is-hidden', shouldHide);
    };

    window.addEventListener('scroll', checkFade, { passive: true });
    checkFade();
  };


  
/* ==========================================================================
   7. FORM SUBMISSIONS, LARAVEL VALIDATION & GTM INTEGRATION
   ========================================================================== */

const initFormHandlers = () => {

    $$('form[data-lead-form]').forEach(form => {

        if (form.dataset.handlerInitialized === 'true') return;

        form.dataset.handlerInitialized = 'true';

        /**
         * Find a field by its Laravel name.
         */
        const getField = (field) => {
            return form.querySelector(`[name="${field}"]`);
        };

        /**
         * Clear one field's validation error.
         */
        const clearError = (field) => {

            const input = getField(field);

            if (input) {
                input.classList.remove('is-invalid');
                input.removeAttribute('aria-invalid');
            }

            form.querySelectorAll(`[data-error-for="${field}"]`)
                .forEach(el => el.remove());

        };

        /**
         * Clear all field errors.
         */
        const clearAllErrors = () => {

            form.querySelectorAll('.field-error')
                .forEach(el => el.remove());

            form.querySelectorAll('.is-invalid')
                .forEach(input => {
                    input.classList.remove('is-invalid');
                    input.removeAttribute('aria-invalid');
                });

        };

        /**
         * Display a validation error below its field.
         */
        const showError = (field, message) => {

            const input = getField(field);

            if (!input) {
                console.warn(`[Lead Form] Field not found: ${field}`);
                return;
            }

            clearError(field);

            input.classList.add('is-invalid');
            input.setAttribute('aria-invalid', 'true');

            const error = document.createElement('div');

            error.className = 'field-error';
            error.dataset.errorFor = field;
            error.textContent = message;

            // Your fields use .form-group wrappers.
            const wrapper = input.closest('.form-group');

            if (wrapper) {
                wrapper.appendChild(error);
            } else {
                input.insertAdjacentElement('afterend', error);
            }

        };

        /**
         * Clear general form messages.
         */
        const clearFormMessage = () => {

            form.querySelector('.form-server-error')?.remove();
            form.querySelector('.form-server-success')?.remove();

        };

        /**
         * Display general form messages.
         */
        const showFormMessage = (message, type = 'error') => {

            clearFormMessage();

            const box = document.createElement('div');

            box.className = type === 'success'
                ? 'form-server-success'
                : 'form-server-error';

            box.setAttribute(
                'role',
                type === 'success' ? 'status' : 'alert'
            );

            box.textContent = message;

            const header = form.querySelector('.floating-form-header');

            if (header) {
                header.insertAdjacentElement('afterend', box);
            } else {
                form.prepend(box);
            }

        };

        /**
         * Clear a field error when the user edits that field.
         */
        [
            'name',
            'phone',
            'email',
            'bedroom_type',
            'budget',
            'message'
        ].forEach(field => {

            const input = getField(field);

            if (!input) return;

            input.addEventListener('input', () => clearError(field));
            input.addEventListener('change', () => clearError(field));

        });

        /**
         * Normalize phone number using the selected country code.
         */
        const normalizePhone = (rawPhone, dialCode) => {

            let phone = rawPhone.replace(/[^\d+]/g, '');

            // Already entered as an international number.
            if (phone.startsWith('+')) {
                return '+' + phone.replace(/\D/g, '');
            }

            const countryDigits = dialCode.replace(/\D/g, '');

            // Remove leading zero from local phone number.
            phone = phone.replace(/^0+/, '');

            // Avoid duplicating country code when entered without +.
            if (
                countryDigits &&
                phone.startsWith(countryDigits)
            ) {
                return '+' + phone;
            }

            return '+' + countryDigits + phone;

        };

        /**
         * Track successful lead submission.
         */
        const trackLeadSubmission = (nameVal, formData) => {

            sessionStorage.setItem(
                'yviews_lead_submitted',
                'true'
            );

            window.dataLayer = window.dataLayer || [];

            window.dataLayer.push({

                event: 'lead_submitted',

                project: 'Y Views at BAYN | ORA',

                lead_name: nameVal,

                interest: formData.get('bedroom_type') || 'General',

                budget: formData.get('budget') || 'Not specified'

            });

        };

        /**
         * Submit form.
         */
        form.addEventListener('submit', async (e) => {

            e.preventDefault();

            clearFormMessage();
            clearAllErrors();

            const nameInput = getField('name');
            const phoneInput = getField('phone');
            const emailInput = getField('email');

            const countrySelect = form.querySelector('.country-select');

            // Confirm required inputs exist.
            if (!nameInput || !phoneInput || !emailInput) {

                showFormMessage(
                    'The form is missing required fields. Please contact us.'
                );

                return;

            }

            const nameVal = nameInput.value.trim();

            const rawPhone = phoneInput.value.trim();

            const emailVal = emailInput.value.trim();

            const dialCode = countrySelect?.value || '+971';

            // Client-side required validation.
            if (!nameVal) {

                showError('name', 'Please enter your full name.');

                nameInput.focus();

                return;

            }

            if (!rawPhone) {

                showError('phone', 'Please enter your mobile number.');

                phoneInput.focus();

                return;

            }

            if (!emailVal) {

                showError('email', 'Please enter your email address.');

                emailInput.focus();

                return;

            }

            // Validate email.
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {

                showError('email', 'Please enter a valid email address.');

                emailInput.focus();

                return;

            }

            // Normalize phone number.
            const fullPhone = normalizePhone(rawPhone, dialCode);

            // Match Laravel phone validation.
            if (!/^\+\d{6,29}$/.test(fullPhone)) {

                showError(
                    'phone',
                    'Please enter a valid mobile number.'
                );

                phoneInput.focus();

                return;

            }

            const submitBtn = form.querySelector(
                'button[type="submit"], input[type="submit"]'
            );

            const originalText = submitBtn
                ? (submitBtn.tagName === 'INPUT'
                    ? submitBtn.value
                    : submitBtn.innerHTML)
                : 'Submit';

            // Disable button during submission.
            if (submitBtn) {

                submitBtn.disabled = true;

                if (submitBtn.tagName === 'INPUT') {
                    submitBtn.value = 'Submitting...';
                } else {
                    submitBtn.innerHTML = 'Submitting...';
                }

            }

            const formData = new FormData(form);

            // Laravel expects lowercase field names.
            formData.set('name', nameVal);

            formData.set('phone', fullPhone);

            formData.set('email', emailVal);

            // Populate current page URL if field exists.
            if (formData.has('page_url')) {
                formData.set('page_url', window.location.href);
            }

            try {

                // Submit directly to Laravel using AJAX.
                const response = await fetch(form.action, {

                    method: 'POST',

                    body: formData,

                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }

                });

                const contentType =
                    response.headers.get('content-type') || '';

                let result = {};

                if (contentType.includes('application/json')) {
                    result = await response.json();
                }

                console.log(
                    '[Lead Form] HTTP Status:',
                    response.status,
                    'Response:',
                    result
                );

                // Laravel validation errors.
                if (response.status === 422) {

                    const errors = result?.errors || {};

                    Object.entries(errors).forEach(([field, messages]) => {

                        const message = Array.isArray(messages)
                            ? messages[0]
                            : messages;

                        showError(field, message);

                    });

                    if (Object.keys(errors).length === 0) {

                        showFormMessage(
                            result?.message ||
                            'Please check your details and try again.'
                        );

                    }

                    const firstInvalid = form.querySelector('.is-invalid');

                    if (firstInvalid) {
                        firstInvalid.focus();
                    }

                    return;

                }

                // Other unsuccessful responses.
                if (!response.ok) {

                    throw new Error(
                        result?.message ||
                        'Unable to submit your enquiry. Please try again.'
                    );

                }

                // Laravel JSON redirect.
                if (result?.redirect) {

                    trackLeadSubmission(nameVal, formData);

                    window.location.href = result.redirect;

                    return;

                }

                // Unexpected response format.
                if (!contentType.includes('application/json')) {

                    throw new Error(
                        'Unexpected server response. Please try again.'
                    );

                }

                // Successful response without redirect.
                trackLeadSubmission(nameVal, formData);

                showFormMessage(
                    result?.message ||
                    'Your enquiry has been submitted successfully.',
                    'success'
                );

                form.reset();

            } catch (error) {

                console.error(
                    '[Lead Form] Submission error:',
                    error
                );

                showFormMessage(
                    error.message ||
                    'Something went wrong. Please try again.'
                );

            } finally {

                if (submitBtn) {

                    submitBtn.disabled = false;

                    if (submitBtn.tagName === 'INPUT') {
                        submitBtn.value = originalText;
                    } else {
                        submitBtn.innerHTML = originalText;
                    }

                }

            }

        });

    });

};




  /* ==========================================================================
     8. FAQ ACCORDION INTERACTION
     ========================================================================== */
  const initFaqAccordion = () => {
    $$('.faq-item').forEach(item => {
      const trigger = item.querySelector('.faq-trigger');
      const answer = item.querySelector('.faq-answer');
      if (!trigger || !answer) return;

      trigger.addEventListener('click', () => {
        const isOpen = item.classList.contains('is-open');

        // Close others
        $$('.faq-item').forEach(other => {
          if (other !== item) {
            other.classList.remove('is-open');
            const otherAns = other.querySelector('.faq-answer');
            if (otherAns) otherAns.style.maxHeight = null;
            other.querySelector('.faq-trigger')?.setAttribute('aria-expanded', 'false');
          }
        });

        if (isOpen) {
          item.classList.remove('is-open');
          answer.style.maxHeight = null;
          trigger.setAttribute('aria-expanded', 'false');
        } else {
          item.classList.add('is-open');
          answer.style.maxHeight = answer.scrollHeight + 'px';
          trigger.setAttribute('aria-expanded', 'true');
        }
      });
    });
  };

  /* ==========================================================================
     9. HEADER SCROLL EFFECT
     ========================================================================== */
  const initHeaderScroll = () => {
    const header = $('.site-header');
    if (!header) return;

    window.addEventListener('scroll', () => {
      header.classList.toggle('is-scrolled', window.scrollY > 30);
    }, { passive: true });
  };

  /* ==========================================================================
     10. MOBILE MENU TOGGLE
     ========================================================================== */
  const initMobileMenu = () => {
    const toggle = $('.mobile-menu-toggle');
    const nav = $('.nav-links');
    if (!toggle || !nav) return;

    toggle.addEventListener('click', () => {
      const isVisible = nav.style.display === 'flex';
      nav.style.display = isVisible ? 'none' : 'flex';
      if (!isVisible) {
        nav.style.flexDirection = 'column';
        nav.style.position = 'absolute';
        nav.style.top = '78px';
        nav.style.left = '20px';
        nav.style.right = '20px';
        nav.style.width = 'calc(100% - 40px)';
        nav.style.background = 'rgba(14, 20, 26, 0.98)';
        nav.style.backdropFilter = 'blur(16px)';
        nav.style.padding = '22px';
        nav.style.borderRadius = '16px';
        nav.style.border = '1px solid rgba(181, 148, 106, 0.35)';
        nav.style.boxShadow = '0 12px 35px rgba(0,0,0,0.5)';
      }
    });

    // Close when clicking nav links on mobile
    $$('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        if (window.innerWidth < 992) {
          nav.style.display = 'none';
        }
      });
    });
  };

  // Run on DOM Ready or immediately if already loaded
  const startApp = () => {

    initUtmCapture();
    initPhonePickers();
    initModalsAndButtons();
    initAutomaticPopup();
    initFloatingFormFade();
    initFormHandlers();
    initFaqAccordion();
    initHeaderScroll();
    initMobileMenu();
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', startApp);
  } else {
    startApp();
  }
})();
