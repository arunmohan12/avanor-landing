import intlTelInput from 'intl-tel-input';
import 'intl-tel-input/styles';

document.addEventListener('DOMContentLoaded', () => {

    const phoneInput = document.querySelector('input[name="phone"]');

    if (phoneInput) {

        const iti = intlTelInput(phoneInput, {
            initialCountry: 'ae',
            separateDialCode: true,
            countrySearch: true,
        });

    }

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



document.addEventListener('DOMContentLoaded', () => {

    const galleryImage = document.getElementById('pjaGalleryImage');
    const galleryCurrent = document.getElementById('pjaGalleryCurrent');

    const galleryItems = document.querySelectorAll('.pja-gallery-item');

    const previousButton = document.querySelector('.pja-gallery-prev');
    const nextButton = document.querySelector('.pja-gallery-next');


    if (!galleryImage || !galleryCurrent || !galleryItems.length) {
        return;
    }


    /* =====================================================
       GALLERY DATA
    ===================================================== */

    const galleryImages = [

        {
            image: '/assets/images/landing/palm-jebel-ali/gallery-01.jpg',
            alt: 'Villa exterior at Palm Jebel Ali'
        },

        {
            image: '/assets/images/landing/palm-jebel-ali/gallery-02.jpg',
            alt: 'Waterfront views at Palm Jebel Ali'
        },

        {
            image: '/assets/images/landing/palm-jebel-ali/gallery-03.jpg',
            alt: 'Living spaces at Palm Jebel Ali'
        },

        {
            image: '/assets/images/landing/palm-jebel-ali/gallery-04.jpg',
            alt: 'Beachfront at Palm Jebel Ali'
        },

        {
            image: '/assets/images/landing/palm-jebel-ali/gallery-05.jpg',
            alt: 'Private pool at Palm Jebel Ali'
        },

        {
            image: '/assets/images/landing/palm-jebel-ali/gallery-06.jpg',
            alt: 'Palm Jebel Ali surroundings'
        }

    ];


    let currentIndex = 0;


    /* =====================================================
       CHANGE IMAGE
    ===================================================== */

    function changeGalleryImage(index) {

        if (index < 0) {
            index = galleryImages.length - 1;
        }

        if (index >= galleryImages.length) {
            index = 0;
        }


        currentIndex = index;


        /* Fade out */

        galleryImage.style.opacity = '0';


        setTimeout(() => {

            galleryImage.src = galleryImages[index].image;
            galleryImage.alt = galleryImages[index].alt;

            galleryCurrent.textContent =
                String(index + 1).padStart(2, '0');


            /* Fade in */

            galleryImage.style.opacity = '1';

        }, 180);


        /* Update active navigation */

        galleryItems.forEach((item, itemIndex) => {

            item.classList.toggle(
                'active',
                itemIndex === index
            );

        });

    }


    /* =====================================================
       LEFT NAVIGATION
    ===================================================== */

    galleryItems.forEach((item, index) => {

        item.addEventListener('click', () => {

            changeGalleryImage(index);

        });

    });


    /* =====================================================
       PREVIOUS
    ===================================================== */

    if (previousButton) {

        previousButton.addEventListener('click', () => {

            changeGalleryImage(currentIndex - 1);

        });

    }


    /* =====================================================
       NEXT
    ===================================================== */

    if (nextButton) {

        nextButton.addEventListener('click', () => {

            changeGalleryImage(currentIndex + 1);

        });

    }


});




/* =========================================================
   FAQ ACCORDION
========================================================= */

document.addEventListener('DOMContentLoaded', () => {

    const faqItems = document.querySelectorAll('.pja-faq-item');

    if (!faqItems.length) {
        return;
    }

    faqItems.forEach((item) => {

        const question = item.querySelector('.pja-faq-question');

        if (!question) {
            return;
        }

        question.addEventListener('click', () => {

            const isActive = item.classList.contains('active');

            // Close all FAQ items
            faqItems.forEach((faqItem) => {

                faqItem.classList.remove('active');

                const faqQuestion =
                    faqItem.querySelector('.pja-faq-question');

                if (faqQuestion) {
                    faqQuestion.setAttribute(
                        'aria-expanded',
                        'false'
                    );
                }

            });

            // Open clicked item if it was closed
            if (!isActive) {

                item.classList.add('active');

                question.setAttribute(
                    'aria-expanded',
                    'true'
                );

            }

        });

    });

});
