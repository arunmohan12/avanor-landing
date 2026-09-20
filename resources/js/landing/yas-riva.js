
import intlTelInput from 'intl-tel-input';
import 'intl-tel-input/styles';

document.addEventListener('DOMContentLoaded', () => {

    const propertyBar = document.getElementById('landingPropertyBar');
    const footer = document.querySelector('.landing-enquiry-footer');

    if (!propertyBar || !footer) {
        return;
    }

    const observer = new IntersectionObserver(
        ([entry]) => {

            if (entry.isIntersecting) {
                propertyBar.classList.add('is-hidden');
            } else {
                propertyBar.classList.remove('is-hidden');
            }

        },
        {
            threshold: 0,
            rootMargin: '0px 0px 150px 0px',
        }
    );

    observer.observe(footer);

});

document.addEventListener('DOMContentLoaded', () => {

    const menuToggle = document.getElementById('landingMenuToggle');
    const mobileMenu = document.getElementById('landingMobileMenu');

    if (!menuToggle || !mobileMenu) {
        return;
    }

    const closeMenu = () => {
        mobileMenu.classList.remove('is-open');
        menuToggle.classList.remove('is-active');
        menuToggle.setAttribute('aria-expanded', 'false');
    };

    menuToggle.addEventListener('click', () => {

        const isOpen = mobileMenu.classList.toggle('is-open');

        menuToggle.classList.toggle('is-active', isOpen);

        menuToggle.setAttribute(
            'aria-expanded',
            isOpen ? 'true' : 'false'
        );

    });


    /* Close menu after clicking a link */

    mobileMenu.querySelectorAll('a').forEach((link) => {

        link.addEventListener('click', () => {
            closeMenu();
        });

    });

});

document.addEventListener('DOMContentLoaded', () => {

    const popup = document.getElementById('landingLeadPopup');

    if (!popup) {
        return;
    }

    const openButtons = document.querySelectorAll(
        '[data-lead-popup-open]'
    );

    const closeButtons = popup.querySelectorAll(
        '[data-lead-popup-close]'
    );

    const submitButton = popup.querySelector(
        '[data-lead-popup-submit]'
    );

    const openPopup = () => {

        popup.classList.add('is-open');

        popup.setAttribute(
            'aria-hidden',
            'false'
        );

        document.body.classList.add(
            'landing-popup-open'
        );
    };

    const closePopup = () => {

        popup.classList.remove('is-open');

        popup.setAttribute(
            'aria-hidden',
            'true'
        );

        document.body.classList.remove(
            'landing-popup-open'
        );
    };

    openButtons.forEach((button) => {

        button.addEventListener('click', (event) => {

            event.preventDefault();

            /*
             * Get the text from the button that opened
             * the popup.
             */
            const buttonText =
                button.dataset.buttonText || 'SUBMIT';

            /*
             * Change popup submit button text.
             */
            if (submitButton) {
                submitButton.textContent = buttonText;
            }

            openPopup();
        });
    });

    closeButtons.forEach((button) => {

        button.addEventListener('click', () => {
            closePopup();
        });
    });

    document.addEventListener('keydown', (event) => {

        if (
            event.key === 'Escape' &&
            popup.classList.contains('is-open')
        ) {
            closePopup();
        }
    });

});


function initPhoneInputs() {

    const phoneInputs = document.querySelectorAll(
        'input[type="tel"][name="phone"]'
    );

    phoneInputs.forEach((input) => {

        if (input.dataset.intlInitialized === 'true') {
            return;
        }

        intlTelInput(input, {
            initialCountry: 'ae',
            separateDialCode: true,
            preferredCountries: [
                'ae',
                'in',
                'sa',
                'qa',
                'kw',
                'om',
            ],
        });

        input.dataset.intlInitialized = 'true';

        const form = input.closest('form');

        if (!form) {
            return;
        }

        form.addEventListener('submit', () => {

            const wrapper = input.closest('.iti');

            const dialCode = wrapper
                ?.querySelector('.iti__selected-dial-code')
                ?.textContent
                ?.trim();

            let number = input.value
                .trim()
                .replace(/\D/g, '')
                .replace(/^0+/, '');

            if (!dialCode || !number) {
                return;
            }

            /*
             * +91 + 7902723790
             * becomes
             * +917902723790
             */
            input.value = `${dialCode}${number}`;

        }, true);

    });

}


if (document.readyState === 'loading') {

    document.addEventListener(
        'DOMContentLoaded',
        initPhoneInputs
    );

} else {

    initPhoneInputs();

}
/*
 * Works whether this JS executes before
 * or after DOMContentLoaded.
 */
if (document.readyState === 'loading') {

    document.addEventListener(
        'DOMContentLoaded',
        initPhoneInputs
    );

} else {

    initPhoneInputs();

}
/* =====================================================
   AUTO OPEN LEAD POPUP
   Opens once after 5 seconds
===================================================== */

let leadPopupOpened = false;

document
    .querySelectorAll('[data-lead-popup-open]')
    .forEach((button) => {
        button.addEventListener('click', () => {
            leadPopupOpened = true;
        });
    });

// setTimeout(() => {
//
//     if (leadPopupOpened) {
//         return;
//     }
//
//     const popupTrigger = document.querySelector(
//         '[data-lead-popup-open]'
//     );
//
//     if (!popupTrigger) {
//         return;
//     }
//
//     // First popup - 10 seconds
//     leadPopupOpened = true;
//     popupTrigger.click();
//
//
//     // Second popup - 25 seconds after first popup
//     setTimeout(() => {
//
//         popupTrigger.click();
//
//     }, 25000);
//
// }, 10000);


const header = document.querySelector('.landing-header');

window.addEventListener('scroll', () => {
    header.classList.toggle('scrolled', window.scrollY > 50);
});
/* =====================================================
   PROJECT GALLERY LIGHTBOX
===================================================== */

const galleryItems = Array.from(
    document.querySelectorAll('.landing-project-gallery-item')
);

const galleryLightbox = document.getElementById(
    'landingGalleryLightbox'
);

const galleryLightboxImage = document.getElementById(
    'landingGalleryLightboxImage'
);

const galleryLightboxCounter = document.getElementById(
    'landingGalleryLightboxCounter'
);

const galleryLightboxClose = document.getElementById(
    'landingGalleryLightboxClose'
);

const galleryLightboxPrev = document.getElementById(
    'landingGalleryLightboxPrev'
);

const galleryLightboxNext = document.getElementById(
    'landingGalleryLightboxNext'
);

let currentGalleryIndex = 0;


function showGalleryImage(index) {

    if (!galleryItems.length) {
        return;
    }

    if (index < 0) {
        index = galleryItems.length - 1;
    }

    if (index >= galleryItems.length) {
        index = 0;
    }

    currentGalleryIndex = index;

    const item = galleryItems[index];
    const image = item.querySelector('img');

    galleryLightboxImage.src = item.dataset.gallerySrc;

    galleryLightboxImage.alt =
        image?.alt || 'Project gallery image';

    if (galleryLightboxCounter) {
        galleryLightboxCounter.textContent =
            `${index + 1} / ${galleryItems.length}`;
    }

}


function openGallery(index) {

    if (!galleryLightbox) {
        return;
    }

    showGalleryImage(index);

    galleryLightbox.classList.add('is-open');

    galleryLightbox.setAttribute(
        'aria-hidden',
        'false'
    );

    document.body.classList.add(
        'landing-gallery-lightbox-open'
    );

}


function closeGallery() {

    if (!galleryLightbox) {
        return;
    }

    galleryLightbox.classList.remove('is-open');

    galleryLightbox.setAttribute(
        'aria-hidden',
        'true'
    );

    document.body.classList.remove(
        'landing-gallery-lightbox-open'
    );

}


galleryItems.forEach((item, index) => {

    item.addEventListener('click', () => {

        openGallery(index);

    });

});


galleryLightboxPrev?.addEventListener('click', () => {

    showGalleryImage(
        currentGalleryIndex - 1
    );

});


galleryLightboxNext?.addEventListener('click', () => {

    showGalleryImage(
        currentGalleryIndex + 1
    );

});


galleryLightboxClose?.addEventListener('click', () => {

    closeGallery();

});


galleryLightbox?.addEventListener('click', (event) => {

    if (event.target === galleryLightbox) {
        closeGallery();
    }

});


document.addEventListener('keydown', (event) => {

    if (
        !galleryLightbox?.classList.contains('is-open')
    ) {
        return;
    }

    if (event.key === 'Escape') {

        closeGallery();

    }

    if (event.key === 'ArrowLeft') {

        showGalleryImage(
            currentGalleryIndex - 1
        );

    }

    if (event.key === 'ArrowRight') {

        showGalleryImage(
            currentGalleryIndex + 1
        );

    }

});


    document.addEventListener('DOMContentLoaded', function () {

    const aboutSection = document.getElementById('about');
    const propertyBar = document.querySelector('.landing-property-bar');

    if (!aboutSection || !propertyBar) return;

    function checkScroll() {

    const rect = aboutSection.getBoundingClientRect();
    const sectionHeight = aboutSection.offsetHeight;

    // 50% of the About section
    const triggerPoint = sectionHeight * 0.1;

    // Distance scrolled into the About section
    const scrolled = -rect.top;

    if (scrolled >= triggerPoint) {
    propertyBar.classList.add('is-visible');
} else {
    propertyBar.classList.remove('is-visible');
}
}

    window.addEventListener('scroll', checkScroll, {
    passive: true
});

    checkScroll();

});








document.addEventListener('DOMContentLoaded', function () {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const bentoCards = document.querySelectorAll('.bento-card');

    function filterAndAnimate(selectedFilter) {
        let visibleIndex = 0;

        bentoCards.forEach(card => {
            if (card.getAttribute('data-category') === selectedFilter) {
                card.classList.remove('is-hidden');

                // Reset animation state to re-trigger smooth transition
                card.style.animation = 'none';
                void card.offsetWidth; // Force DOM reflow

                // Staggered animation delay for cascade effect (60ms between cards)
                card.style.animation = `bentoFadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards ${visibleIndex * 0.06}s`;
                visibleIndex++;
            } else {
                card.classList.add('is-hidden');
                card.style.animation = 'none';
            }
        });
    }

    // Animate initial active tab on page load
    const initialActiveBtn = document.querySelector('.filter-btn.active');
    if (initialActiveBtn) {
        filterAndAnimate(initialActiveBtn.getAttribute('data-filter'));
    }

    // Tab click listeners
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            if (this.classList.contains('active')) return;

            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const selectedFilter = this.getAttribute('data-filter');
            filterAndAnimate(selectedFilter);
        });
    });
});
