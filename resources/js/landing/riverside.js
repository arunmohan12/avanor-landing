
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

// let leadPopupOpened = false;

// document
//     .querySelectorAll('[data-lead-popup-open]')
//     .forEach((button) => {
//         button.addEventListener('click', () => {
//             leadPopupOpened = true;
//         });
//     });

// setTimeout(() => {

//     if (leadPopupOpened) {
//         return;
//     }

//     const popupTrigger = document.querySelector(
//         '[data-lead-popup-open]'
//     );

//     if (!popupTrigger) {
//         return;
//     }

//     leadPopupOpened = true;
//     popupTrigger.click();


  
//     setTimeout(() => {

//         popupTrigger.click();

//     }, 25000);

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



document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('landingSideForm');
    const developer = document.getElementById('developer');

    if (!form || !developer) {
        return;
    }

    function checkFormVisibility() {

        const rect = developer.getBoundingClientRect();
        const sectionHeight = developer.offsetHeight;
        const viewportHeight = window.innerHeight;

        const sectionTop = rect.top;
        const scrolledIntoSection = viewportHeight - sectionTop;

        const percentage = (scrolledIntoSection / sectionHeight) * 100;

        if (percentage >= 90) {
            form.classList.add('is-hidden');
        } 
        else {
            form.classList.remove('is-hidden');
        }
    }

    window.addEventListener('scroll', checkFormVisibility, {
        passive: true
    });

    window.addEventListener('resize', checkFormVisibility);

    checkFormVisibility();

});




const adGroupH1 = document.getElementById('dynamic-ad-h1');

if (adGroupH1) {
    const params = new URLSearchParams(window.location.search);

    const adGroup = params.get('ag');

    const headlines = {
        brand: 'Al Ghadeer Parks by Aldar',
        homes: 'New Al Ghadeer Townhouses & Villas by Aldar',
    };

    if (adGroup && headlines[adGroup]) {
        adGroupH1.textContent = headlines[adGroup];
    }
}



const START_ZOOM = 16;


(function () {
  const section = document.querySelector('[data-rv-map]');
  if (!section) return;

  const cfg    = JSON.parse(section.dataset.config);
  const track  = section.querySelector('.rv-map__track');
  const stopEls = section.querySelectorAll('[data-rv-stop]');
  const mapEl  = section.querySelector('[data-rv-gmap]');

  const n = cfg.stops.length;                 // 5 (start + 4 destinations)
  const project = cfg.project;
  let map, circle, mainPin, dests = [], radii = [], lastCam = -1, ready = false, ticking = false;

  /* ---------- helpers ---------- */
  function distanceM(a, b) {                  // haversine, metres
    const R = 6371000, rad = Math.PI / 180;
    const dLat = (b.lat - a.lat) * rad, dLng = (b.lng - a.lng) * rad;
    const h = Math.sin(dLat / 2) ** 2 +
              Math.cos(a.lat * rad) * Math.cos(b.lat * rad) * Math.sin(dLng / 2) ** 2;
    return 2 * R * Math.asin(Math.sqrt(h));
  }

  function makePinEl(cls, html) {
    const el = document.createElement('span');
    el.className = 'rv-map__pin ' + cls;
    el.innerHTML = html;
    return el;
  }

  const placeIcon =
    '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s7-6.2 7-11.5A7 7 0 0 0 5 9.5C5 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg>';

  /* ---------- map init (called by Google script) ---------- */
  window.rvMapInit = function () {

    // Custom HTML pin pinned to a lat/lng
    class HtmlPin extends google.maps.OverlayView {
      constructor(pos, el) { super(); this.pos = new google.maps.LatLng(pos.lat, pos.lng); this.el = el; this.setMap(map); }
      onAdd()    { this.getPanes().floatPane.appendChild(this.el); }
      draw()     {
        const pt = this.getProjection().fromLatLngToDivPixel(this.pos);
        if (pt) { this.el.style.left = pt.x + 'px'; this.el.style.top = pt.y + 'px'; }
      }
      onRemove() { this.el.remove(); }
    }

    map = new google.maps.Map(mapEl, {
  center: project,
  zoom: START_ZOOM,                 // was 14
  disableDefaultUI: true,
  gestureHandling: 'none',
  keyboardShortcuts: false,
  clickableIcons: false,
  styles: [
    { stylers: [{ saturation: -100 }, { gamma: 1.1 }] },
    { featureType: 'poi', stylers: [{ visibility: 'off' }] },
    { featureType: 'transit', stylers: [{ visibility: 'off' }] },
  ],
});

circle = new google.maps.Circle({
  map, center: project, radius: 250,   // was 450
  fillColor: '#000', fillOpacity: 0.14,
  strokeColor: '#000', strokeOpacity: 0.25, strokeWeight: 2,
  clickable: false,
});

    // Main pin (always visible)
    mainPin = new HtmlPin(project, makePinEl('rv-map__pin--main is-visible', 'DAMAC Riverside'));

    // Circle radius at each stop (always growing)
    radii[0] = 250;
    for (let i = 1; i < n; i++) {
      radii[i] = Math.max(radii[i - 1] * 1.15, distanceM(project, cfg.stops[i]));
    }

    // Destination pins + route lines (hidden until the car arrives)
for (let i = 1; i < n; i++) {
  const s  = cfg.stops[i];
  const el = makePinEl('rv-map__pin--place', placeIcon + s.name);
  new HtmlPin(s, el);
  dests.push({ el });
}

    ready = true;
    update();
  };

  /* ---------- camera ---------- */
function moveCamera(i) {
  if (i === 0) { map.setCenter(project); map.setZoom(START_ZOOM); return; }
  const b = new google.maps.LatLngBounds(project);
  for (let j = 1; j <= i; j++) b.extend(cfg.stops[j]);
  map.fitBounds(b, { top: 110, bottom: 50, left: 70, right: 70 });
}

  /* ---------- scroll ---------- */
  function update() {
    ticking = false;

    const rect  = section.getBoundingClientRect();
    const total = rect.height - window.innerHeight;
    const p = total > 0 ? Math.min(Math.max(-rect.top / total, 0), 1) : 1;

    track.style.setProperty('--rv-p', p.toFixed(4));
    const seg = p * (n - 1);                               // 0 … 4
    stopEls.forEach((s, i) => s.classList.toggle('is-active', seg >= i - 0.001));

    if (!ready) return;

    // circle grows between stops
    const idx = Math.min(Math.floor(seg), n - 2), t = seg - idx;
    circle.setRadius(radii[idx] + (radii[idx + 1] - radii[idx]) * t);

    // pins + lines appear when the car arrives
dests.forEach((d, i) => {
  d.el.classList.toggle('is-visible', seg >= i + 1 - 0.001);
});

    // camera zooms out toward the stop the car is heading to
    const cam = Math.min(Math.max(Math.ceil(seg - 0.001), 0), n - 1);
    if (cam !== lastCam) { lastCam = cam; moveCamera(cam); }
  }

  function onScroll() {
    if (!ticking) { ticking = true; requestAnimationFrame(update); }
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', () => { lastCam = -1; onScroll(); });
  onScroll();

  /* ---------- load Google Maps ---------- */
  if (!cfg.key) { console.warn('Google Maps key missing'); return; }
  const s = document.createElement('script');
  s.src = 'https://maps.googleapis.com/maps/api/js?key=' + encodeURIComponent(cfg.key) +
          '&callback=rvMapInit&loading=async&v=weekly';
  s.async = true;
  document.head.appendChild(s);
})();



document.addEventListener('DOMContentLoaded', function () {
    const floatBar = document.querySelector('.float-bar');
    const developerSection = document.querySelector('#developer-section');

    if (!floatBar || !developerSection) return;

    const observer = new IntersectionObserver(
        ([entry]) => {
            if (entry.isIntersecting) {
                floatBar.classList.add('is-hidden');
            } else {
                floatBar.classList.remove('is-hidden');
            }
        },
        {
            threshold: 0.1
        }
    );

    observer.observe(developerSection);
});
