
/**
 * HAYAT 8: Standalone Villas by Dubai South — Main JavaScript
 * Dynamic Hero Copy Switcher, Country Dial Codes, Form Submissions,
 * GTM dataLayer Integration, Timed Popups, and Interactive Components.
 */

(() => {
    'use strict';

    // Utility helpers
    const $ = (selector, context = document) =>
        context.querySelector(selector);

    const $$ = (selector, context = document) =>
        [...context.querySelectorAll(selector)];


   


    /* ==========================================================================
       2. CAPTURE UTM PARAMETERS & GCLID INTO ALL FORMS
       ========================================================================== */

    const initUtmCapture = () => {

        const params = new URLSearchParams(window.location.search);

        const trackingKeys = [
            'gclid',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content'
        ];

        // Save campaign parameters in session storage.
        trackingKeys.forEach(key => {

            const value = params.get(key) || '';

            if (value) {
                sessionStorage.setItem('ds_' + key, value);
            }

        });

        // Populate tracking fields in every form.
        $$('form').forEach(form => {

            trackingKeys.forEach(key => {

                let input = form.querySelector(
                    `input[name="${key}"]`
                );

                if (!input) {
                    input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key;
                    form.appendChild(input);
                }

                input.value =
                    params.get(key) ||
                    sessionStorage.getItem('ds_' + key) ||
                    '';

            });

        });

    };


    /* ==========================================================================
       3. COUNTRY DIAL CODES & SEARCHABLE SELECTOR
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


    const flagEmoji = (cc) =>
        cc.toUpperCase().replace(/./g, c =>
            String.fromCodePoint(127397 + c.charCodeAt(0))
        );


    const initPhonePickers = () => {

        $$('[data-phone-picker]').forEach(wrapper => {

            const trigger = $('[data-phone-trigger]', wrapper);
            const flagEl = $('[data-phone-flag]', wrapper);
            const dialEl = $('[data-phone-dial]', wrapper);
            const panel = $('[data-phone-panel]', wrapper);
            const search = $('[data-phone-search]', wrapper);
            const list = $('[data-phone-list]', wrapper);

            if (
                !trigger ||
                !flagEl ||
                !dialEl ||
                !panel ||
                !search ||
                !list
            ) {
                console.warn('Incomplete phone picker markup.', wrapper);
                return;
            }

            const closePanel = () => {

                panel.hidden = true;

                trigger.setAttribute(
                    'aria-expanded',
                    'false'
                );

            };


            const selectCode = (cc, dial) => {

                flagEl.textContent = flagEmoji(cc);
                flagEl.dataset.cc = cc;

                dialEl.textContent = dial;

                closePanel();

            };


            const renderList = (filterText = '') => {

                const q = filterText.trim().toLowerCase();

                list.innerHTML = '';

                dialCodes
                    .filter(c =>
                        !q ||
                        c.name.toLowerCase().includes(q) ||
                        c.dial.includes(q) ||
                        c.cc.toLowerCase().includes(q)
                    )
                    .forEach(c => {

                        const btn = document.createElement('button');

                        btn.type = 'button';
                        btn.className = 'country-option-item';

                        if (c.cc === (flagEl.dataset.cc || 'AE')) {
                            btn.classList.add('is-selected');
                        }

                        btn.innerHTML = `
                            <div class="country-option-left">
                                <span>${flagEmoji(c.cc)}</span>
                                <span>${c.name}</span>
                            </div>
                            <span class="country-option-dial">${c.dial}</span>
                        `;

                        btn.addEventListener('click', e => {

                            e.preventDefault();

                            selectCode(c.cc, c.dial);

                        });

                        list.appendChild(btn);

                    });

            };


            const openPanel = () => {

                panel.hidden = false;

                trigger.setAttribute(
                    'aria-expanded',
                    'true'
                );

                search.value = '';

                renderList();

                search.focus();

            };


            trigger.addEventListener('click', e => {

                e.stopPropagation();

                if (panel.hidden) {
                    openPanel();
                } else {
                    closePanel();
                }

            });


            search.addEventListener('input', () => {
                renderList(search.value);
            });


            search.addEventListener('click', e => {
                e.stopPropagation();
            });


            document.addEventListener('click', e => {

                if (!wrapper.contains(e.target)) {
                    closePanel();
                }

            });


            document.addEventListener('keydown', e => {

                if (e.key === 'Escape') {
                    closePanel();
                }

            });


            // Default country: UAE
            selectCode('AE', '+971');

        });

    };


    /* ==========================================================================
       4. FORM SUBMISSION, DATALAYER PUSH & LARAVEL REDIRECT
       ========================================================================== */

    const initFormHandlers = () => {

        $$('form[data-lead-form]').forEach(form => {

            form.addEventListener('submit', e => {

                e.preventDefault();

                // Honeypot spam protection.
                const hp = form.querySelector(
                    'input[name="website_hp"]'
                );

                if (hp && hp.value.trim() !== '') {

                    console.warn('Bot detected via honeypot.');

                    return;

                }


                // Laravel field names.
                const nameInput = form.querySelector(
                    'input[name="name"]'
                );

                const phoneInput = form.querySelector(
                    'input[name="phone_local"]'
                );

                const emailInput = form.querySelector(
                    'input[name="email"]'
                );

                const hiddenPhoneInput = form.querySelector(
                    'input[name="phone"]'
                );

                const villaInput = form.querySelector(
                    'select[name="bedroom_type"]'
                );

                const timelineInput = form.querySelector(
                    'select[name="message"]'
                );

                const sourceInput = form.querySelector(
                    'input[name="source"]'
                );

                const pageUrlInput = form.querySelector(
                    'input[name="page_url"]'
                );

                const submitBtn = form.querySelector(
                    'button[type="submit"]'
                );


                // Read values.
                const name = nameInput?.value.trim() || '';

                const localPhone = phoneInput?.value.trim() || '';

                const email = emailInput?.value.trim() || '';


                // Validate required fields.
                if (!name || !localPhone || !email) {

                    alert(
                        'Please fill in your name, mobile phone, and email address.'
                    );

                    if (!name) {
                        nameInput?.focus();
                    } else if (!localPhone) {
                        phoneInput?.focus();
                    } else {
                        emailInput?.focus();
                    }

                    return;

                }


                // Validate email.
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {

                    alert('Please enter a valid email address.');

                    emailInput?.focus();

                    return;

                }


                // Get selected country dial code.
                const phoneWrapper = phoneInput.closest(
                    '[data-phone-picker]'
                );

                const dial = phoneWrapper
                    ?.querySelector('[data-phone-dial]')
                    ?.textContent.trim() || '+971';


                // Build international phone number.
                let phoneDigits = localPhone.replace(/\D/g, '');

                const dialDigits = dial.replace(/\D/g, '');

                // Remove an already-entered country code.
                if (
                    phoneDigits.startsWith(dialDigits) &&
                    phoneDigits.length > dialDigits.length
                ) {
                    phoneDigits = phoneDigits.slice(dialDigits.length);
                }

                // Remove local trunk prefix.
                if (phoneDigits.startsWith('0')) {
                    phoneDigits = phoneDigits.slice(1);
                }

                const fullPhone = dial + phoneDigits;


                // Match Laravel phone validation.
                if (!/^\+\d{6,29}$/.test(fullPhone)) {

                    alert('Please enter a valid mobile phone number.');

                    phoneInput?.focus();

                    return;

                }


                // Make sure hidden phone input exists.
                if (!hiddenPhoneInput) {

                    console.error('Hidden phone input not found.');

                    alert(
                        'Unable to process your phone number. Please refresh and try again.'
                    );

                    return;

                }


                // Populate Laravel hidden phone field.
                hiddenPhoneInput.value = fullPhone;


                // Populate current page URL.
                if (pageUrlInput) {
                    pageUrlInput.value = window.location.href;
                }


                // Other form values.
                const villaType =
                    villaInput?.value || 'Not sure yet';

                const timeline =
                    timelineInput?.value || '';

                const source =
                    sourceInput?.value || 'hayat_floating_side_form';


                // Google Tag Manager / dataLayer.
                window.dataLayer = window.dataLayer || [];

                window.dataLayer.push({

                    event: 'lead_submission',

                    lead_name: name,

                    lead_email: email,

                    lead_phone: fullPhone,

                    villa_type: villaType,

                    timeline: timeline,

                    source: source,

                    project: 'Hayat 8 | Dubai South Properties'

                });


                // Save lead details for the thank-you page.
                sessionStorage.setItem('ds_lead_name', name);

                sessionStorage.setItem('ds_lead_phone', fullPhone);

                sessionStorage.setItem('ds_lead_villa', villaType);


                // Disable submit button.
                if (submitBtn) {

                    submitBtn.disabled = true;

                    submitBtn.dataset.origText = submitBtn.innerHTML;

                    submitBtn.innerHTML = 'Sending details...';

                }


                // Submit directly to Laravel.
                // Native form navigation preserves Laravel session flash data.
                HTMLFormElement.prototype.submit.call(form);

            });

        });

    };


    /* ==========================================================================
       5. CTA TRIGGERS — OPEN ENQUIRY POPUP
       ========================================================================== */

    const initCtaTriggers = () => {

        const modal = $('#enquiry-modal');


        const openEnquiryPopup = btn => {

            if (!modal) {

                console.error(
                    'Enquiry modal not found: #enquiry-modal'
                );

                return;

            }


            const preferredVilla = btn?.dataset?.villa || '';

            const buttonText = (
                btn?.textContent || ''
            ).trim();


            // Set selected villa if supplied.
            if (preferredVilla) {

                const villaSelect = modal.querySelector(
                    'select[name="bedroom_type"]'
                );

                if (villaSelect) {
                    villaSelect.value = preferredVilla;
                }

            }


            // Update modal title and lead source.
            const modalTitle = modal.querySelector(
                '#enquiry-modal-title'
            );

            const modalSource = modal.querySelector(
                'input[name="source"]'
            );


            if (buttonText.includes('Floor Plan')) {

                if (modalTitle) {
                    modalTitle.textContent = 'Get Floor Plans';
                }

                if (modalSource) {
                    modalSource.value = 'hayat_floor_plans';
                }

            } else if (buttonText.includes('Payment Schedule')) {

                if (modalTitle) {
                    modalTitle.textContent =
                        'Get the Full Payment Schedule';
                }

                if (modalSource) {
                    modalSource.value = 'hayat_payment_plan';
                }

            } else if (buttonText.includes('Priority EOI')) {

                if (modalTitle) {
                    modalTitle.textContent =
                        'Register for Priority EOI';
                }

                if (modalSource) {
                    modalSource.value = 'hayat_eoi';
                }

            } else {

                if (modalTitle) {
                    modalTitle.textContent =
                        'Get the Price List & EOI Details';
                }

                if (modalSource) {
                    modalSource.value = 'hayat_price_list';
                }

            }


            // Open popup.
            openModal(modal);

        };


        $$('[data-open-form], [data-open-enquiry]').forEach(btn => {

            btn.addEventListener('click', e => {

                e.preventDefault();

                openEnquiryPopup(btn);

            });

        });

    };


    /* ==========================================================================
       6. MODAL UTILITIES
       ========================================================================== */

    const openModal = modalEl => {

        if (!modalEl) return;

        modalEl.classList.add('is-open');

        document.body.style.overflow = 'hidden';

        const firstInput = modalEl.querySelector(
            'input[name="name"]'
        );

        if (firstInput) {

            setTimeout(() => {
                firstInput.focus();
            }, 150);

        }

    };


    const closeModal = modalEl => {

        if (!modalEl) return;

        modalEl.classList.remove('is-open');

        document.body.style.overflow = '';

    };


    const initModals = () => {

        $$('.modal-backdrop').forEach(modal => {

            const closeBtn = modal.querySelector(
                '[data-close-modal]'
            );

            if (closeBtn) {

                closeBtn.addEventListener('click', () => {
                    closeModal(modal);
                });

            }


            modal.addEventListener('click', e => {

                if (e.target === modal) {
                    closeModal(modal);
                }

            });

        });


        document.addEventListener('keydown', e => {

            if (e.key === 'Escape') {

                $$('.modal-backdrop.is-open').forEach(modal => {
                    closeModal(modal);
                });

            }

        });

    };


    /* ==========================================================================
       7. TIMED POPUP (10s and 35s)
       ========================================================================== */

    const initTimedPopup = () => {

        const popup = $('#timed-popup');

        if (!popup) return;

        let popupShownCount = 0;

        const maxShows = 2;


        const showTimedPopup = () => {

            // Don't show if lead was submitted successfully.
            if (
                sessionStorage.getItem('ds_lead_submitted') === 'true'
            ) {
                return;
            }

            // Don't open if another modal is already open.
            if ($('.modal-backdrop.is-open')) {
                return;
            }

            openModal(popup);

            popupShownCount++;

        };


        // First trigger after 10 seconds.
        setTimeout(() => {

            if (popupShownCount < maxShows) {
                showTimedPopup();
            }

        }, 10000);


        // Second trigger after 35 seconds.
        setTimeout(() => {

            if (
                popupShownCount < maxShows &&
                !popup.classList.contains('is-open')
            ) {
                showTimedPopup();
            }

        }, 35000);

    };


    /* ==========================================================================
       8. FAQ ACCORDION INTERACTION
       ========================================================================== */

    const initFaq = () => {

        $$('.faq-item').forEach(item => {

            const trigger = item.querySelector('.faq-trigger');

            const answer = item.querySelector('.faq-answer');

            if (!trigger || !answer) return;


            trigger.addEventListener('click', () => {

                const isOpen = item.classList.contains('is-open');


                // Close all sibling FAQ items.
                $$('.faq-item').forEach(other => {

                    if (other !== item) {

                        other.classList.remove('is-open');

                        const otherAns = other.querySelector(
                            '.faq-answer'
                        );

                        if (otherAns) {
                            otherAns.style.maxHeight = null;
                        }

                        other.querySelector(
                            '.faq-trigger'
                        )?.setAttribute('aria-expanded', 'false');

                    }

                });


                if (isOpen) {

                    item.classList.remove('is-open');

                    answer.style.maxHeight = null;

                    trigger.setAttribute(
                        'aria-expanded',
                        'false'
                    );

                } else {

                    item.classList.add('is-open');

                    answer.style.maxHeight =
                        answer.scrollHeight + 'px';

                    trigger.setAttribute(
                        'aria-expanded',
                        'true'
                    );

                }

            });

        });

    };


    /* ==========================================================================
       9. INTERIOR CAROUSEL
       ========================================================================== */

    const initCarousel = () => {

        const stage = $('#interior-carousel');

        if (!stage) return;

        const slides = $$('.carousel-slide', stage);

        const prevBtn = $('#carousel-prev');

        const nextBtn = $('#carousel-next');

        if (!slides.length) return;

        let currentIndex = 0;


        const showSlide = idx => {

            slides.forEach((slide, i) => {

                slide.classList.toggle(
                    'is-active',
                    i === idx
                );

            });

            currentIndex = idx;

        };


        prevBtn?.addEventListener('click', () => {

            const newIdx =
                (currentIndex - 1 + slides.length) % slides.length;

            showSlide(newIdx);

        });


        nextBtn?.addEventListener('click', () => {

            const newIdx =
                (currentIndex + 1) % slides.length;

            showSlide(newIdx);

        });


        // Auto rotate every 5.5 seconds.
        if (slides.length > 1) {

            setInterval(() => {

                const newIdx =
                    (currentIndex + 1) % slides.length;

                showSlide(newIdx);

            }, 5500);

        }

    };


    /* ==========================================================================
       10. HEADER SCROLL EFFECT
       ========================================================================== */

    const initHeaderScroll = () => {

        const header = $('.site-header');

        if (!header) return;

        window.addEventListener('scroll', () => {

            header.classList.toggle(
                'is-scrolled',
                window.scrollY > 20
            );

        }, {
            passive: true
        });

    };




/* ==========================================================================
   11. FLOATING SIDEBAR — HIDE NEAR DEVELOPER / BOOKING SECTION
   ========================================================================== */

/* ==========================================================================
   11. FLOATING SIDEBAR — HIDE NEAR DEVELOPER / BOOKING SECTION
   ========================================================================== */

const initSidebarFade = () => {

    const sidebar = $('.floating-sidebar-container');

    const hideSections = [
        $('#developer'),
        $('#book-now')
    ].filter(Boolean);

    if (!sidebar) {
        console.warn('Floating sidebar not found.');
        return;
    }

    if (!hideSections.length) {
        console.warn('Developer and Book Now sections not found.');
        return;
    }

    let ticking = false;

    const checkSidebarVisibility = () => {

        const triggerPoint = window.innerHeight * 0.65;

        const shouldHide = hideSections.some(section => {

            const rect = section.getBoundingClientRect();

            // Hide when the section reaches the trigger point
            // and remains visible in the viewport.
            return rect.top < triggerPoint && rect.bottom > 0;

        });

        sidebar.classList.toggle('sidebar-hidden', shouldHide);

        ticking = false;
    };

    const requestCheck = () => {

        if (ticking) return;

        ticking = true;

        requestAnimationFrame(checkSidebarVisibility);
    };

    window.addEventListener('scroll', requestCheck, {
        passive: true
    });

    window.addEventListener('resize', requestCheck);

    // Check immediately on page load.
    checkSidebarVisibility();

};

    /* ==========================================================================
       INITIALIZE ALL FEATURES
       ========================================================================== */

    document.addEventListener('DOMContentLoaded', () => {

   

        initUtmCapture();

        initPhonePickers();

        initFormHandlers();

        initCtaTriggers();

        initModals();

        initTimedPopup();

        initFaq();

        initCarousel();

        initHeaderScroll();

        initSidebarFade();

    });

})();


/* ==========================================================================
   12. MAP LIGHTBOX
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {

    const expandBtn = document.getElementById('mapExpandBtn');

    const lightbox = document.getElementById('mapLightbox');

    const closeBtn = document.getElementById('mapLightboxClose');


    if (!expandBtn || !lightbox || !closeBtn) return;


    function openMap() {

        lightbox.classList.add('active');

        document.body.style.overflow = 'hidden';

    }


    function closeMap() {

        lightbox.classList.remove('active');

        document.body.style.overflow = '';

    }


    expandBtn.addEventListener('click', openMap);

    closeBtn.addEventListener('click', closeMap);


    lightbox.addEventListener('click', e => {

        if (e.target === lightbox) {
            closeMap();
        }

    });


    document.addEventListener('keydown', e => {

        if (e.key === 'Escape') {
            closeMap();
        }

    });

});
