













/////////new///////////////////


(() => {
    const $ = (sel, root = document) => root.querySelector(sel);
    const $$ = (sel, root = document) => [...root.querySelectorAll(sel)];
    const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    /* Header scroll + progress */
    const header = $(".header");
    const progress = $(".progress");
    const sticky = $(".sticky-cta");
    const hero = $(".hero");
    const menuBtn = $(".menu-btn");
    const mobileNav = $(".mobile-nav");

    const onScroll = () => {
        const y = window.scrollY || 0;
        header?.classList.toggle("is-on", y > 40);
        const doc = document.documentElement;
        const max = doc.scrollHeight - window.innerHeight;
        if (progress && max > 0) progress.style.width = `${(y / max) * 100}%`;
        const pastHero = hero ? y > hero.offsetHeight * 0.55 : y > 500;
        const contact = document.getElementById("contact");
        let nearContact = false;
        if (contact) {
            const cr = contact.getBoundingClientRect();
            nearContact = cr.top < window.innerHeight + 120 && cr.bottom > 80;
        }
        const menuOpen = menuBtn?.getAttribute("aria-expanded") === "true";
        sticky?.classList.toggle("is-on", pastHero && !nearContact && !menuOpen);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });

    /* Mobile menu */
    const unlockBody = () => {
        const locked =
            $("[data-enquiry]")?.classList.contains("is-open") ||
            $("[data-thanks]")?.classList.contains("is-open") ||
            $(".lightbox")?.classList.contains("is-open");
        if (!locked) document.body.style.overflow = "";
    };
    const closeMobile = () => {
        menuBtn?.setAttribute("aria-expanded", "false");
        mobileNav?.classList.remove("is-open");
        unlockBody();
    };
    menuBtn?.addEventListener("click", () => {
        const open = menuBtn.getAttribute("aria-expanded") === "true";
        menuBtn.setAttribute("aria-expanded", String(!open));
        mobileNav?.classList.toggle("is-open", !open);
        document.body.style.overflow = open ? "" : "hidden";
        onScroll();
    });
    $$(".mobile-nav a").forEach((a) => a.addEventListener("click", () => {
        closeMobile();
        onScroll();
    }));

    /* Active section highlighting */
    const navLinks = $$(".nav-links a[href^='#'], .mobile-nav a[href^='#']");
    const sectionIds = [...new Set(navLinks.map((a) => a.getAttribute("href")?.slice(1)).filter(Boolean))];
    const sections = sectionIds.map((id) => document.getElementById(id)).filter(Boolean);

    const setCurrent = (id) => {
        navLinks.forEach((a) => {
            const match = a.getAttribute("href") === `#${id}`;
            if (match) a.setAttribute("aria-current", "true");
            else a.removeAttribute("aria-current");
        });
    };

    if (sections.length && "IntersectionObserver" in window) {
        const io = new IntersectionObserver(
            (entries) => {
                const visible = entries
                    .filter((e) => e.isIntersecting)
                    .sort((a, b) => b.intersectionRatio - a.intersectionRatio)[0];
                if (visible?.target?.id) setCurrent(visible.target.id);
            },
            { rootMargin: "-30% 0px -55% 0px", threshold: [0.1, 0.25, 0.5] }
        );
        sections.forEach((s) => io.observe(s));
    }

    /* Reveal on view */
    if (!reduce && "IntersectionObserver" in window) {
        const rev = new IntersectionObserver(
            (entries) => {
                entries.forEach((e) => {
                    if (e.isIntersecting) {
                        e.target.classList.add("is-in");
                        rev.unobserve(e.target);
                    }
                });
            },
            { threshold: 0.15, rootMargin: "0px 0px -8% 0px" }
        );
        $$(".reveal, .timeline").forEach((el) => rev.observe(el));
    } else {
        $$(".reveal, .timeline").forEach((el) => el.classList.add("is-in"));
    }

    /* Gallery */
    const gallery = $("[data-gallery]");
    if (gallery) {
        const stage = $(".gallery-stage", gallery);
        const imgs = $$("img", stage);
        const tabs = $$("[data-gallery-tab]", gallery);
        const counter = $("[data-gallery-counter]", gallery);
        const prev = $("[data-gallery-prev]", gallery);
        const next = $("[data-gallery-next]", gallery);
        let filter = "exterior";
        let index = 0;

        const visible = () => imgs.filter((img) => img.dataset.category === filter);

        const render = () => {
            const list = visible();
            if (!list.length) return;
            index = ((index % list.length) + list.length) % list.length;
            imgs.forEach((img) => img.classList.remove("is-active"));
            list[index].classList.add("is-active");
            if (counter) counter.textContent = `${String(index + 1).padStart(2, "0")} / ${String(list.length).padStart(2, "0")}`;
        };

        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                filter = tab.dataset.galleryTab;
                tabs.forEach((t) => t.setAttribute("aria-selected", String(t === tab)));
                index = 0;
                render();
            });
        });
        prev?.addEventListener("click", () => { index -= 1; render(); });
        next?.addEventListener("click", () => { index += 1; render(); });

        /* Swipe */
        let sx = 0;
        stage?.addEventListener("touchstart", (e) => { sx = e.changedTouches[0].screenX; }, { passive: true });
        stage?.addEventListener("touchend", (e) => {
            const dx = e.changedTouches[0].screenX - sx;
            if (Math.abs(dx) < 40) return;
            index += dx < 0 ? 1 : -1;
            render();
        }, { passive: true });

        stage?.addEventListener("click", () => {
            const active = $(".gallery-stage img.is-active", gallery);
            if (active) openLightbox(active.src, active.alt);
        });

        render();
    }

    /* Floor plans */
    const fp = $("[data-floorplans]");
    if (fp) {
        const buttons = $$("[data-fp-level]", fp);
        const image = $("[data-fp-image]", fp);
        const title = $("[data-fp-title]", fp);
        const interiorEl = $("[data-fp-interior]", fp);
        const totalEl = $("[data-fp-total]", fp);
        const floorsEl = $("[data-fp-floors]", fp);
        const scroller = $("[data-fp-scroller]", fp);
        const wrap = scroller?.closest(".fp-levels-wrap");
        const activate = (btn, { scroll = false } = {}) => {
            buttons.forEach((b) => b.setAttribute("aria-selected", String(b === btn)));
            if (image) {
                image.src = btn.dataset.src;
                image.alt = btn.dataset.alt || btn.dataset.label || "";
            }
            if (title) title.textContent = btn.dataset.label || btn.textContent.trim();
            if (interiorEl && btn.dataset.interior) interiorEl.textContent = btn.dataset.interior;
            if (totalEl && btn.dataset.total) totalEl.textContent = btn.dataset.total;
            if (floorsEl && btn.dataset.floors) floorsEl.textContent = btn.dataset.floors;
            if (scroll) btn.scrollIntoView({ inline: "nearest", block: "nearest", behavior: "smooth" });
        };
        buttons.forEach((btn) => btn.addEventListener("click", () => activate(btn, { scroll: true })));
        image?.addEventListener("click", () => openLightbox(image.src, image.alt));
        if (buttons[0]) activate(buttons[0]);

        const syncFpHint = () => {
            if (!scroller || !wrap) return;
            const max = scroller.scrollWidth - scroller.clientWidth;
            const atEnd = max <= 8 || scroller.scrollLeft >= max - 8;
            wrap.classList.toggle("is-end", atEnd);
            wrap.classList.toggle("is-scrollable", max > 8);
        };
        scroller?.addEventListener("scroll", syncFpHint, { passive: true });
        window.addEventListener("resize", syncFpHint);
        syncFpHint();
    }

    /* FAQ accordion — content stays in DOM */
    $$("[data-faq] .faq-item").forEach((item) => {
        const btn = $("button", item);
        btn?.addEventListener("click", () => {
            const open = item.classList.contains("is-open");
            $$("[data-faq] .faq-item").forEach((other) => {
                other.classList.remove("is-open");
                $("button", other)?.setAttribute("aria-expanded", "false");
            });
            if (!open) {
                item.classList.add("is-open");
                btn.setAttribute("aria-expanded", "true");
            }
        });
    });

    /* Lightbox */
    const lightbox = $(".lightbox");
    const lbImg = $(".lightbox img");
    const openLightbox = (src, alt = "") => {
        if (!lightbox || !lbImg) return;
        lbImg.src = src;
        lbImg.alt = alt;
        lightbox.classList.add("is-open");
        document.body.style.overflow = "hidden";
    };
    const closeLightbox = () => {
        lightbox?.classList.remove("is-open");
        document.body.style.overflow = "";
    };
    $(".lightbox-close")?.addEventListener("click", closeLightbox);
    lightbox?.addEventListener("click", (e) => { if (e.target === lightbox) closeLightbox(); });
    window.addEventListener("keydown", (e) => {
        if (e.key === "Escape") { closeLightbox(); closeEnquiry(); closeMobile(); }
    });




    const dialCodes = [
        { name: "United Arab Emirates", cc: "AE", dial: "+971" },
        { name: "Afghanistan", cc: "AF", dial: "+93" },
        { name: "Albania", cc: "AL", dial: "+355" },
        { name: "Algeria", cc: "DZ", dial: "+213" },
        { name: "American Samoa", cc: "AS", dial: "+1" },
        { name: "Andorra", cc: "AD", dial: "+376" },
        { name: "Angola", cc: "AO", dial: "+244" },
        { name: "Anguilla", cc: "AI", dial: "+1" },
        { name: "Antigua and Barbuda", cc: "AG", dial: "+1" },
        { name: "Argentina", cc: "AR", dial: "+54" },
        { name: "Armenia", cc: "AM", dial: "+374" },
        { name: "Aruba", cc: "AW", dial: "+297" },
        { name: "Australia", cc: "AU", dial: "+61" },
        { name: "Austria", cc: "AT", dial: "+43" },
        { name: "Azerbaijan", cc: "AZ", dial: "+994" },
        { name: "Bahamas", cc: "BS", dial: "+1" },
        { name: "Bahrain", cc: "BH", dial: "+973" },
        { name: "Bangladesh", cc: "BD", dial: "+880" },
        { name: "Barbados", cc: "BB", dial: "+1" },
        { name: "Belarus", cc: "BY", dial: "+375" },
        { name: "Belgium", cc: "BE", dial: "+32" },
        { name: "Belize", cc: "BZ", dial: "+501" },
        { name: "Benin", cc: "BJ", dial: "+229" },
        { name: "Bermuda", cc: "BM", dial: "+1" },
        { name: "Bhutan", cc: "BT", dial: "+975" },
        { name: "Bolivia", cc: "BO", dial: "+591" },
        { name: "Bosnia and Herzegovina", cc: "BA", dial: "+387" },
        { name: "Botswana", cc: "BW", dial: "+267" },
        { name: "Brazil", cc: "BR", dial: "+55" },
        { name: "British Virgin Islands", cc: "VG", dial: "+1" },
        { name: "Brunei", cc: "BN", dial: "+673" },
        { name: "Bulgaria", cc: "BG", dial: "+359" },
        { name: "Burkina Faso", cc: "BF", dial: "+226" },
        { name: "Burundi", cc: "BI", dial: "+257" },
        { name: "Cambodia", cc: "KH", dial: "+855" },
        { name: "Cameroon", cc: "CM", dial: "+237" },
        { name: "Canada", cc: "CA", dial: "+1" },
        { name: "Cape Verde", cc: "CV", dial: "+238" },
        { name: "Cayman Islands", cc: "KY", dial: "+1" },
        { name: "Central African Republic", cc: "CF", dial: "+236" },
        { name: "Chad", cc: "TD", dial: "+235" },
        { name: "Chile", cc: "CL", dial: "+56" },
        { name: "China", cc: "CN", dial: "+86" },
        { name: "Colombia", cc: "CO", dial: "+57" },
        { name: "Comoros", cc: "KM", dial: "+269" },
        { name: "Congo", cc: "CG", dial: "+242" },
        { name: "Cook Islands", cc: "CK", dial: "+682" },
        { name: "Costa Rica", cc: "CR", dial: "+506" },
        { name: "Croatia", cc: "HR", dial: "+385" },
        { name: "Cuba", cc: "CU", dial: "+53" },
        { name: "Curaçao", cc: "CW", dial: "+599" },
        { name: "Cyprus", cc: "CY", dial: "+357" },
        { name: "Czech Republic", cc: "CZ", dial: "+420" },
        { name: "Democratic Republic of the Congo", cc: "CD", dial: "+243" },
        { name: "Denmark", cc: "DK", dial: "+45" },
        { name: "Djibouti", cc: "DJ", dial: "+253" },
        { name: "Dominica", cc: "DM", dial: "+1" },
        { name: "Dominican Republic", cc: "DO", dial: "+1" },
        { name: "Ecuador", cc: "EC", dial: "+593" },
        { name: "Egypt", cc: "EG", dial: "+20" },
        { name: "El Salvador", cc: "SV", dial: "+503" },
        { name: "Equatorial Guinea", cc: "GQ", dial: "+240" },
        { name: "Eritrea", cc: "ER", dial: "+291" },
        { name: "Estonia", cc: "EE", dial: "+372" },
        { name: "Eswatini", cc: "SZ", dial: "+268" },
        { name: "Ethiopia", cc: "ET", dial: "+251" },
        { name: "Falkland Islands", cc: "FK", dial: "+500" },
        { name: "Faroe Islands", cc: "FO", dial: "+298" },
        { name: "Fiji", cc: "FJ", dial: "+679" },
        { name: "Finland", cc: "FI", dial: "+358" },
        { name: "France", cc: "FR", dial: "+33" },
        { name: "French Guiana", cc: "GF", dial: "+594" },
        { name: "French Polynesia", cc: "PF", dial: "+689" },
        { name: "Gabon", cc: "GA", dial: "+241" },
        { name: "Gambia", cc: "GM", dial: "+220" },
        { name: "Georgia", cc: "GE", dial: "+995" },
        { name: "Germany", cc: "DE", dial: "+49" },
        { name: "Ghana", cc: "GH", dial: "+233" },
        { name: "Gibraltar", cc: "GI", dial: "+350" },
        { name: "Greece", cc: "GR", dial: "+30" },
        { name: "Greenland", cc: "GL", dial: "+299" },
        { name: "Grenada", cc: "GD", dial: "+1" },
        { name: "Guadeloupe", cc: "GP", dial: "+590" },
        { name: "Guam", cc: "GU", dial: "+1" },
        { name: "Guatemala", cc: "GT", dial: "+502" },
        { name: "Guernsey", cc: "GG", dial: "+44" },
        { name: "Guinea", cc: "GN", dial: "+224" },
        { name: "Guinea-Bissau", cc: "GW", dial: "+245" },
        { name: "Guyana", cc: "GY", dial: "+592" },
        { name: "Haiti", cc: "HT", dial: "+509" },
        { name: "Honduras", cc: "HN", dial: "+504" },
        { name: "Hong Kong", cc: "HK", dial: "+852" },
        { name: "Hungary", cc: "HU", dial: "+36" },
        { name: "Iceland", cc: "IS", dial: "+354" },
        { name: "India", cc: "IN", dial: "+91" },
        { name: "Indonesia", cc: "ID", dial: "+62" },
        { name: "Iran", cc: "IR", dial: "+98" },
        { name: "Iraq", cc: "IQ", dial: "+964" },
        { name: "Ireland", cc: "IE", dial: "+353" },
        { name: "Isle of Man", cc: "IM", dial: "+44" },
        { name: "Israel", cc: "IL", dial: "+972" },
        { name: "Italy", cc: "IT", dial: "+39" },
        { name: "Ivory Coast", cc: "CI", dial: "+225" },
        { name: "Jamaica", cc: "JM", dial: "+1" },
        { name: "Japan", cc: "JP", dial: "+81" },
        { name: "Jersey", cc: "JE", dial: "+44" },
        { name: "Jordan", cc: "JO", dial: "+962" },
        { name: "Kazakhstan", cc: "KZ", dial: "+7" },
        { name: "Kenya", cc: "KE", dial: "+254" },
        { name: "Kiribati", cc: "KI", dial: "+686" },
        { name: "Kosovo", cc: "XK", dial: "+383" },
        { name: "Kuwait", cc: "KW", dial: "+965" },
        { name: "Kyrgyzstan", cc: "KG", dial: "+996" },
        { name: "Laos", cc: "LA", dial: "+856" },
        { name: "Latvia", cc: "LV", dial: "+371" },
        { name: "Lebanon", cc: "LB", dial: "+961" },
        { name: "Lesotho", cc: "LS", dial: "+266" },
        { name: "Liberia", cc: "LR", dial: "+231" },
        { name: "Libya", cc: "LY", dial: "+218" },
        { name: "Liechtenstein", cc: "LI", dial: "+423" },
        { name: "Lithuania", cc: "LT", dial: "+370" },
        { name: "Luxembourg", cc: "LU", dial: "+352" },
        { name: "Macau", cc: "MO", dial: "+853" },
        { name: "Madagascar", cc: "MG", dial: "+261" },
        { name: "Malawi", cc: "MW", dial: "+265" },
        { name: "Malaysia", cc: "MY", dial: "+60" },
        { name: "Maldives", cc: "MV", dial: "+960" },
        { name: "Mali", cc: "ML", dial: "+223" },
        { name: "Malta", cc: "MT", dial: "+356" },
        { name: "Marshall Islands", cc: "MH", dial: "+692" },
        { name: "Martinique", cc: "MQ", dial: "+596" },
        { name: "Mauritania", cc: "MR", dial: "+222" },
        { name: "Mauritius", cc: "MU", dial: "+230" },
        { name: "Mexico", cc: "MX", dial: "+52" },
        { name: "Micronesia", cc: "FM", dial: "+691" },
        { name: "Moldova", cc: "MD", dial: "+373" },
        { name: "Monaco", cc: "MC", dial: "+377" },
        { name: "Mongolia", cc: "MN", dial: "+976" },
        { name: "Montenegro", cc: "ME", dial: "+382" },
        { name: "Montserrat", cc: "MS", dial: "+1" },
        { name: "Morocco", cc: "MA", dial: "+212" },
        { name: "Mozambique", cc: "MZ", dial: "+258" },
        { name: "Myanmar", cc: "MM", dial: "+95" },
        { name: "Namibia", cc: "NA", dial: "+264" },
        { name: "Nauru", cc: "NR", dial: "+674" },
        { name: "Nepal", cc: "NP", dial: "+977" },
        { name: "Netherlands", cc: "NL", dial: "+31" },
        { name: "New Caledonia", cc: "NC", dial: "+687" },
        { name: "New Zealand", cc: "NZ", dial: "+64" },
        { name: "Nicaragua", cc: "NI", dial: "+505" },
        { name: "Niger", cc: "NE", dial: "+227" },
        { name: "Nigeria", cc: "NG", dial: "+234" },
        { name: "Niue", cc: "NU", dial: "+683" },
        { name: "North Korea", cc: "KP", dial: "+850" },
        { name: "North Macedonia", cc: "MK", dial: "+389" },
        { name: "Northern Mariana Islands", cc: "MP", dial: "+1" },
        { name: "Norway", cc: "NO", dial: "+47" },
        { name: "Oman", cc: "OM", dial: "+968" },
        { name: "Pakistan", cc: "PK", dial: "+92" },
        { name: "Palau", cc: "PW", dial: "+680" },
        { name: "Palestine", cc: "PS", dial: "+970" },
        { name: "Panama", cc: "PA", dial: "+507" },
        { name: "Papua New Guinea", cc: "PG", dial: "+675" },
        { name: "Paraguay", cc: "PY", dial: "+595" },
        { name: "Peru", cc: "PE", dial: "+51" },
        { name: "Philippines", cc: "PH", dial: "+63" },
        { name: "Poland", cc: "PL", dial: "+48" },
        { name: "Portugal", cc: "PT", dial: "+351" },
        { name: "Puerto Rico", cc: "PR", dial: "+1" },
        { name: "Qatar", cc: "QA", dial: "+974" },
        { name: "Romania", cc: "RO", dial: "+40" },
        { name: "Russia", cc: "RU", dial: "+7" },
        { name: "Rwanda", cc: "RW", dial: "+250" },
        { name: "Réunion", cc: "RE", dial: "+262" },
        { name: "Saint Kitts and Nevis", cc: "KN", dial: "+1" },
        { name: "Saint Lucia", cc: "LC", dial: "+1" },
        { name: "Saint Vincent and the Grenadines", cc: "VC", dial: "+1" },
        { name: "Samoa", cc: "WS", dial: "+685" },
        { name: "San Marino", cc: "SM", dial: "+378" },
        { name: "Sao Tome and Principe", cc: "ST", dial: "+239" },
        { name: "Saudi Arabia", cc: "SA", dial: "+966" },
        { name: "Senegal", cc: "SN", dial: "+221" },
        { name: "Serbia", cc: "RS", dial: "+381" },
        { name: "Seychelles", cc: "SC", dial: "+248" },
        { name: "Sierra Leone", cc: "SL", dial: "+232" },
        { name: "Singapore", cc: "SG", dial: "+65" },
        { name: "Sint Maarten", cc: "SX", dial: "+1" },
        { name: "Slovakia", cc: "SK", dial: "+421" },
        { name: "Slovenia", cc: "SI", dial: "+386" },
        { name: "Solomon Islands", cc: "SB", dial: "+677" },
        { name: "Somalia", cc: "SO", dial: "+252" },
        { name: "South Africa", cc: "ZA", dial: "+27" },
        { name: "South Korea", cc: "KR", dial: "+82" },
        { name: "South Sudan", cc: "SS", dial: "+211" },
        { name: "Spain", cc: "ES", dial: "+34" },
        { name: "Sri Lanka", cc: "LK", dial: "+94" },
        { name: "Sudan", cc: "SD", dial: "+249" },
        { name: "Suriname", cc: "SR", dial: "+597" },
        { name: "Sweden", cc: "SE", dial: "+46" },
        { name: "Switzerland", cc: "CH", dial: "+41" },
        { name: "Syria", cc: "SY", dial: "+963" },
        { name: "Taiwan", cc: "TW", dial: "+886" },
        { name: "Tajikistan", cc: "TJ", dial: "+992" },
        { name: "Tanzania", cc: "TZ", dial: "+255" },
        { name: "Thailand", cc: "TH", dial: "+66" },
        { name: "Timor-Leste", cc: "TL", dial: "+670" },
        { name: "Togo", cc: "TG", dial: "+228" },
        { name: "Tonga", cc: "TO", dial: "+676" },
        { name: "Trinidad and Tobago", cc: "TT", dial: "+1" },
        { name: "Tunisia", cc: "TN", dial: "+216" },
        { name: "Turkey", cc: "TR", dial: "+90" },
        { name: "Turkmenistan", cc: "TM", dial: "+993" },
        { name: "Turks and Caicos Islands", cc: "TC", dial: "+1" },
        { name: "Tuvalu", cc: "TV", dial: "+688" },
        { name: "US Virgin Islands", cc: "VI", dial: "+1" },
        { name: "Uganda", cc: "UG", dial: "+256" },
        { name: "Ukraine", cc: "UA", dial: "+380" },
        { name: "United Kingdom", cc: "GB", dial: "+44" },
        { name: "United States", cc: "US", dial: "+1" },
        { name: "Uruguay", cc: "UY", dial: "+598" },
        { name: "Uzbekistan", cc: "UZ", dial: "+998" },
        { name: "Vanuatu", cc: "VU", dial: "+678" },
        { name: "Vatican City", cc: "VA", dial: "+39" },
        { name: "Venezuela", cc: "VE", dial: "+58" },
        { name: "Vietnam", cc: "VN", dial: "+84" },
        { name: "Yemen", cc: "YE", dial: "+967" },
        { name: "Zambia", cc: "ZM", dial: "+260" },
        { name: "Zimbabwe", cc: "ZW", dial: "+263" },
    ];

    const fillCountrySelects = () => {
        $$("[data-country-select]").forEach((sel) => {
            if (sel.dataset.filled === "1") return;
            sel.innerHTML = "";
            dialCodes.forEach(({ name, cc, dial }) => {
                const opt = document.createElement("option");
                opt.value = dial;
                opt.textContent = `${cc} ${dial}`;
                opt.title = `${name} (${dial})`;
                opt.dataset.cc = cc;
                if (cc === "AE") opt.selected = true;
                sel.appendChild(opt);
            });
            sel.dataset.filled = "1";
            const sync = () => {
                const hidden = sel.closest("form")?.querySelector('input[name="Phone-country-code"]');
                if (hidden) hidden.value = sel.value;
            };
            sel.addEventListener("change", sync);
            sync();
        });
    };
    fillCountrySelects();

    /* Searchable phone-code picker with flags */
    const flagEmoji = (cc) =>
        cc.toUpperCase().replace(/./g, (c) => String.fromCodePoint(127397 + c.charCodeAt(0)));

    const initPhoneCodePickers = () => {
        $$("[data-phone-code]").forEach((wrap) => {
            if (wrap.dataset.filled === "1") return;
            wrap.dataset.filled = "1";

            const trigger = $("[data-phone-code-trigger]", wrap);
            const flagEl = $("[data-phone-code-flag]", wrap);
            const dialEl = $("[data-phone-code-dial]", wrap);
            const panel = $("[data-phone-code-panel]", wrap);
            const search = $("[data-phone-code-search]", wrap);
            const list = $("[data-phone-code-list]", wrap);

            const form = wrap.closest("form");
            const phoneInput = form?.querySelector('input[name="phone"]');
            const emailInput = form?.querySelector('input[name="email"]');

            if (
                !trigger ||
                !flagEl ||
                !dialEl ||
                !panel ||
                !search ||
                !list ||
                !form ||
                !phoneInput
            ) {
                return;
            }

            let selectedDial = dialEl.textContent.trim() || "+971";
            let previousDial = selectedDial;

            flagEl.dataset.cc = "AE";

            /*
             * PHONE ERROR
             */
            const showPhoneError = (message) => {
                let error = form.querySelector("[data-phone-error]");

                if (!error) {
                    error = document.createElement("div");
                    error.dataset.phoneError = "";
                    error.className = "form-field-error";

                    phoneInput.parentElement.appendChild(error);
                }

                error.textContent = message;
                error.hidden = false;

                phoneInput.classList.add("is-invalid");
            };

            const clearPhoneError = () => {
                const error = form.querySelector("[data-phone-error]");

                if (error) {
                    error.hidden = true;
                    error.textContent = "";
                }

                phoneInput.classList.remove("is-invalid");
            };

            /*
             * EMAIL ERROR
             */
            const showEmailError = (message) => {
                if (!emailInput) return;

                let error = form.querySelector("[data-email-error]");

                if (!error) {
                    error = document.createElement("div");
                    error.dataset.emailError = "";
                    error.className = "form-field-error";

                    emailInput.parentElement.appendChild(error);
                }

                error.textContent = message;
                error.hidden = false;

                emailInput.classList.add("is-invalid");
            };

            const clearEmailError = () => {
                if (!emailInput) return;

                const error = form.querySelector("[data-email-error]");

                if (error) {
                    error.hidden = true;
                    error.textContent = "";
                }

                emailInput.classList.remove("is-invalid");
            };

            /*
             * Clear errors while typing
             */
            phoneInput.addEventListener("input", () => {
                clearPhoneError();
            });

            if (emailInput) {
                emailInput.addEventListener("input", () => {
                    clearEmailError();
                });
            }

            /*
             * COUNTRY LIST
             */
            const renderList = (filter = "") => {
                const q = filter.trim().toLowerCase();

                list.innerHTML = "";

                dialCodes
                    .filter(({ name, dial, cc }) =>
                        !q ||
                        name.toLowerCase().includes(q) ||
                        dial.includes(q) ||
                        cc.toLowerCase().includes(q)
                    )
                    .forEach(({ name, cc, dial }) => {
                        const row = document.createElement("button");

                        row.type = "button";
                        row.className = "phone-code-option";

                        if (flagEl.dataset.cc === cc) {
                            row.classList.add("is-selected");
                        }

                        row.innerHTML = `
                        <span class="pco-flag">${flagEmoji(cc)}</span>
                        <span class="pco-name">${name}</span>
                        <span class="pco-dial">${dial}</span>
                    `;

                        row.addEventListener("click", () => {
                            let number = phoneInput.value.trim();

                            /*
                             * Remove previously selected country code
                             * if it exists in the input.
                             */
                            if (
                                previousDial &&
                                number.startsWith(previousDial)
                            ) {
                                number = number
                                    .substring(previousDial.length)
                                    .trim();
                            }

                            selectedDial = dial;
                            previousDial = dial;

                            flagEl.textContent = flagEmoji(cc);
                            flagEl.dataset.cc = cc;
                            dialEl.textContent = dial;

                            /*
                             * Keep ONLY the local number in the input.
                             */
                            phoneInput.value = number;

                            clearPhoneError();
                            close();
                        });

                        list.appendChild(row);
                    });
            };

            const open = () => {
                panel.hidden = false;
                trigger.setAttribute("aria-expanded", "true");

                search.value = "";
                renderList();

                search.focus();
            };

            const close = () => {
                panel.hidden = true;
                trigger.setAttribute("aria-expanded", "false");
            };

            trigger.addEventListener("click", (e) => {
                e.stopPropagation();

                if (panel.hidden) {
                    open();
                } else {
                    close();
                }
            });

            search.addEventListener("input", () => {
                renderList(search.value);
            });

            search.addEventListener("click", (e) => {
                e.stopPropagation();
            });

            document.addEventListener("click", (e) => {
                if (!wrap.contains(e.target)) {
                    close();
                }
            });

            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape") {
                    close();
                }
            });

            /*
             * ==========================================
             * FORM VALIDATION
             * ==========================================
             */
            if (form.dataset.phoneValidationBound !== "1") {
                form.dataset.phoneValidationBound = "1";

                form.addEventListener("submit", (e) => {
                    let valid = true;

                    clearPhoneError();
                    clearEmailError();

                    /*
                     * PHONE
                     */
                    let phone = phoneInput.value.trim();

                    /*
                     * Remove country code if it somehow already exists.
                     */
                    if (
                        previousDial &&
                        phone.startsWith(previousDial)
                    ) {
                        phone = phone
                            .substring(previousDial.length)
                            .trim();
                    }

                    /*
                     * Remove spaces, brackets and hyphens.
                     */
                    phone = phone.replace(/[\s\-()]/g, "");

                    /*
                     * Remove leading zeros.
                     */
                    phone = phone.replace(/^0+/, "");

                    /*
                     * EMPTY PHONE
                     */
                    if (!phone) {
                        e.preventDefault();

                        showPhoneError(
                            "Please enter your mobile number."
                        );

                        phoneInput.focus();

                        valid = false;
                    }

                    /*
                     * PHONE MUST CONTAIN DIGITS
                     */
                    else if (!/^\d+$/.test(phone)) {
                        e.preventDefault();

                        showPhoneError(
                            "Please enter a valid mobile number."
                        );

                        phoneInput.focus();

                        valid = false;
                    }

                    /*
                     * PHONE LENGTH
                     */
                    else if (phone.length < 6) {
                        e.preventDefault();

                        showPhoneError(
                            "Please enter a valid mobile number."
                        );

                        phoneInput.focus();

                        valid = false;
                    }

                    /*
                     * EMAIL
                     */
                    if (emailInput) {
                        const email = emailInput.value.trim();

                        if (!email) {
                            e.preventDefault();

                            showEmailError(
                                "Please enter your email address."
                            );

                            if (valid) {
                                emailInput.focus();
                            }

                            valid = false;
                        } else {
                            const emailPattern =
                                /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                            if (!emailPattern.test(email)) {
                                e.preventDefault();

                                showEmailError(
                                    "Please enter a valid email address."
                                );

                                if (valid) {
                                    emailInput.focus();
                                }

                                valid = false;
                            }
                        }
                    }

                    /*
                     * STOP HERE IF INVALID
                     */
                    if (!valid) {
                        return;
                    }

                    /*
                     * ==========================================
                     * ONLY NOW ADD COUNTRY CODE
                     * ==========================================
                     */
                    phoneInput.value =
                        `${selectedDial}${phone}`;
                });
            }
        });
    };

    initPhoneCodePickers();






    /* Enquiry popup */
    const enquiry = $("[data-enquiry]");
    const openEnquiry = (e) => {
        // On desktop, if the sticky registration card is visible, highlight and focus the sticky card
        const stickyName = document.getElementById("sticky-Name");
        const stickyCard = document.querySelector(".sticky-register-card");
        if (window.innerWidth >= 1025 && stickyName && stickyCard) {
            if (e && typeof e.preventDefault === "function") e.preventDefault();
            stickyCard.classList.add("is-highlighted");
            stickyName.focus({ preventScroll: true });
            stickyCard.scrollIntoView({ behavior: "smooth", block: "center" });
            setTimeout(() => stickyCard.classList.remove("is-highlighted"), 1800);
            return;
        }

        fillCountrySelects();
        closeMobile();
        if (enquiry) enquiry.hidden = false;
        void enquiry?.offsetWidth; // force reflow so the opacity transition actually runs
        enquiry?.classList.add("is-open");
        enquiry?.setAttribute("aria-hidden", "false");
        document.body.style.overflow = "hidden";
        const first = enquiry?.querySelector("input[name='Name']");
        if (first) setTimeout(() => first.focus(), 80);
    };
    const closeEnquiry = () => {
        enquiry?.classList.remove("is-open");
        enquiry?.setAttribute("aria-hidden", "true");
        setTimeout(() => { if (enquiry) enquiry.hidden = true; }, 400);
        unlockBody();
    };
    $$("[data-open-enquiry]").forEach((el) => {
        el.addEventListener("click", (e) => {
            e.preventDefault();
            openEnquiry(e);
        });
    });
    $$("[data-enquiry-close]").forEach((el) => el.addEventListener("click", closeEnquiry));
    enquiry?.addEventListener("click", (e) => {
        if (e.target === enquiry) closeEnquiry();
    });
    if (location.hash === "#enquiry") {
        openEnquiry();
    }

    $$("[data-thanks-close]").forEach((btn) => {
        btn.addEventListener("click", () => {
            $("[data-thanks]")?.classList.remove("is-open");
            unlockBody();
        });
    });

    /* Play hero video on all screen sizes when motion is allowed (skip on Data Saver) */
    const heroVideo = $(".hero-media video");
    if (heroVideo) {
        const source = heroVideo.querySelector("source");
        const videoSrc = source?.getAttribute("src") || "";
        const saveData = navigator.connection?.saveData === true;
        const allow = !reduce && !saveData;
        if (allow) {
            if (source && !source.getAttribute("src") && videoSrc) source.setAttribute("src", videoSrc);
            if (!heroVideo.getAttribute("src") && !source) heroVideo.src = videoSrc;
            heroVideo.load();
            heroVideo.play().catch(() => {});
        }
    }
})();
/* =====================================================
   LOCATION MAP LIGHTBOX
===================================================== */

const locationMapOpen = document.querySelector(
    '[data-location-map-open]'
);

const locationLightbox = document.querySelector(
    '[data-location-map-lightbox]'
);

const locationMapCloseButtons = document.querySelectorAll(
    '[data-location-map-close]'
);


if (locationMapOpen && locationLightbox) {

    const openLocationMap = () => {

        locationLightbox.classList.add('is-open');

        locationLightbox.setAttribute(
            'aria-hidden',
            'false'
        );

        document.body.classList.add(
            'location-lightbox-open'
        );

    };


    const closeLocationMap = () => {

        locationLightbox.classList.remove('is-open');

        locationLightbox.setAttribute(
            'aria-hidden',
            'true'
        );

        document.body.classList.remove(
            'location-lightbox-open'
        );

    };


    locationMapOpen.addEventListener(
        'click',
        openLocationMap
    );


    locationMapCloseButtons.forEach((button) => {

        button.addEventListener(
            'click',
            closeLocationMap
        );

    });


    document.addEventListener('keydown', (event) => {

        if (
            event.key === 'Escape' &&
            locationLightbox.classList.contains('is-open')
        ) {
            closeLocationMap();
        }

    });

}



const sideForm = document.getElementById('side-form-lp');
const developerSection = document.getElementById('developer');

if (sideForm && developerSection) {

    const checkDeveloperProgress = () => {

        const rect = developerSection.getBoundingClientRect();
        const sectionHeight = developerSection.offsetHeight;
        const viewportHeight = window.innerHeight;

        const sectionTop = window.scrollY + rect.top;
        const sectionStart = sectionTop;
        const sectionEnd = sectionTop + sectionHeight;

        const scrollPosition = window.scrollY + viewportHeight;

        const progress =
            (scrollPosition - sectionStart) /
            (sectionEnd - sectionStart);

        if (progress >= 1.1) {
            sideForm.classList.add('is-hidden');
        } else {
            sideForm.classList.remove('is-hidden');
        }
    };

    window.addEventListener('scroll', checkDeveloperProgress, {
        passive: true
    });

    window.addEventListener('resize', checkDeveloperProgress);

    checkDeveloperProgress();
}
const enquiryPopup = document.querySelector('[data-enquiry-popup]');
const enquiryOpenButtons = document.querySelectorAll('[data-open-enquiry]');
const enquiryCloseButtons = document.querySelectorAll('[data-close-enquiry]');

if (enquiryPopup) {

    const openEnquiryPopup = () => {
        enquiryPopup.classList.add('is-open');
        enquiryPopup.setAttribute('aria-hidden', 'false');

        // Disable background scrolling
        document.body.classList.add('enquiry-popup-open');
    };

    const closeEnquiryPopup = () => {
        enquiryPopup.classList.remove('is-open');
        enquiryPopup.setAttribute('aria-hidden', 'true');

        // Enable background scrolling
        document.body.classList.remove('enquiry-popup-open');
    };

    // Manual open buttons
    enquiryOpenButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            openEnquiryPopup();
        });
    });

    // Close buttons
    enquiryCloseButtons.forEach((button) => {
        button.addEventListener('click', closeEnquiryPopup);
    });

    // ESC key
    document.addEventListener('keydown', (event) => {
        if (
            event.key === 'Escape' &&
            enquiryPopup.classList.contains('is-open')
        ) {
            closeEnquiryPopup();
        }
    });

    // First popup — after 10 seconds
    setTimeout(() => {
        openEnquiryPopup();
    }, 10000);

    // Second popup — after 25 seconds
    setTimeout(() => {
        openEnquiryPopup();
    }, 25000);
}



