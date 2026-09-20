@props([
    'name',
    'size' => 18,
])

@switch($name)

    @case('whatsapp')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="currentColor"
            aria-hidden="true">
            <path d="M12.04 2a9.84 9.84 0 0 0-8.47 14.83L2 22l5.3-1.52A9.98 9.98 0 1 0 12.04 2Zm0 17.98a8.05 8.05 0 0 1-4.1-1.12l-.29-.17-3.14.9.92-3.05-.19-.31a8.03 8.03 0 1 1 6.8 3.75Zm4.41-6.03c-.24-.12-1.43-.7-1.65-.78-.22-.08-.38-.12-.54.12-.16.24-.62.78-.76.94-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.94-1.2-.72-.64-1.2-1.43-1.34-1.67-.14-.24-.02-.37.1-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.47-.4-.4-.54-.41h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.69 2.58 4.1 3.62.57.25 1.02.4 1.37.51.58.18 1.1.16 1.52.1.46-.07 1.43-.59 1.63-1.15.2-.56.2-1.04.14-1.15-.06-.1-.22-.16-.46-.28Z"/>
        </svg>
        @break

    @case('water')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M2 8c2 0 2 2 4 2s2-2 4-2 2 2 4 2 2-2 4-2 2 2 4 2" />
            <path d="M2 13c2 0 2 2 4 2s2-2 4-2 2 2 4 2 2-2 4-2 2 2 4 2" />
            <path d="M2 18c2 0 2 2 4 2s2-2 4-2 2 2 4 2 2-2 4-2 2 2 4 2" />

        </svg>
        @break
    @case('phone')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.9.33 1.78.62 2.63a2 2 0 0 1-.45 2.11L8 9.73a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.85.29 1.73.5 2.63.62A2 2 0 0 1 22 16.92Z"/>
        </svg>
        @break


    @case('arrow-right')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">
            <path d="M5 12h14"/>
            <path d="m13 6 6 6-6 6"/>
        </svg>
        @break


    @case('chevron-left')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            aria-hidden="true">
            <path d="m15 18-6-6 6-6"/>
        </svg>
        @break


    @case('chevron-right')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            aria-hidden="true">
            <path d="m9 18 6-6-6-6"/>
        </svg>
        @break


    @case('check')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">
            <path d="m5 12 4 4L19 6"/>
        </svg>
        @break


    @case('child')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <circle cx="12" cy="5" r="2.5"/>

            <path d="M12 8v6"/>

            <path d="M7 11l5 3 5-3"/>

            <path d="M12 14l-4 7"/>

            <path d="M12 14l4 7"/>

        </svg>
        @break


    @case('swimming')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <circle cx="17" cy="5" r="2"/>

            <path d="M9 10l4-3 4 3"/>

            <path d="M13 7l-3 6"/>

            <path d="M2 16c2 0 2 2 4 2s2-2 4-2 2 2 4 2 2-2 4-2 2 2 4 2"/>

            <path d="M2 21c2 0 2 1 4 1s2-1 4-1 2 1 4 1 2-1 4-1 2 1 4 1"/>

        </svg>
        @break


    @case('dumbbell')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M6 8v8"/>
            <path d="M3 10v4"/>

            <path d="M18 8v8"/>
            <path d="M21 10v4"/>

            <path d="M6 12h12"/>

        </svg>
        @break


    @case('utensils')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M7 3v8"/>
            <path d="M4 3v5a3 3 0 0 0 6 0V3"/>
            <path d="M7 11v10"/>

            <path d="M17 3v18"/>
            <path d="M17 3c3 2 3 6 0 8"/>

        </svg>
        @break

    @case('spa')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M12 21c4-2.5 6-6 6-10-3.5 0-5.5 1.8-6 4.5"/>
            <path d="M12 21c-4-2.5-6-6-6-10 3.5 0 5.5 1.8 6 4.5"/>
            <path d="M12 15V7"/>
            <path d="M12 7c-2-1.2-3-3-3-5 2.2 0 3 1.3 3 3.2C12 3.3 12.8 2 15 2c0 2-1 3.8-3 5Z"/>

        </svg>
        @break

    @case('leaf')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M20 4C12 4 6 6.5 6 13a6 6 0 0 0 6 6c6.5 0 8-7 8-15Z"/>
            <path d="M4 21c4-6 8-9 14-12"/>

        </svg>
        @break

    @case('beach')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M3 12a9 9 0 0 1 18 0Z"/>
            <path d="M12 12v8"/>
            <path d="M7 21h10"/>
            <path d="M12 3v2"/>

        </svg>
        @break

    @case('pool')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M7 4v10"/>
            <path d="M12 4v10"/>
            <path d="M7 7h5"/>
            <path d="M2 16c2 0 2 2 4 2s2-2 4-2 2 2 4 2 2-2 4-2 2 2 4 2"/>
            <path d="M2 21c2 0 2 1 4 1s2-1 4-1 2 1 4 1 2-1 4-1 2 1 4 1"/>

        </svg>
        @break

    @case('users')
        <svg
            {{ $attributes }}
            width="{{ $size }}"
            height="{{ $size }}"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <circle cx="9" cy="7" r="3"/>
            <path d="M3 21v-2a6 6 0 0 1 12 0v2"/>
            <path d="M16 4a3 3 0 0 1 0 6"/>
            <path d="M17 15a5 5 0 0 1 4 5"/>

        </svg>
        @break

    @case('location')
        <svg
            width="55"
            height="55"
            viewBox="0 0 64 64"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
        >
            <path
                d="M32,0C18.745,0,8,10.745,8,24c0,5.678,2.502,10.671,5.271,15l17.097,24.156C30.743,63.686,31.352,64,32,64
            s1.257-.314,1.632-.844L50.729,39C53.375,35.438,56,29.678,56,24
            C56,10.745,45.255,0,32,0z M32,38c-7.732,0-14-6.268-14-14
            s6.268-14,14-14s14,6.268,14,14S39.732,38,32,38z"
            />

            <path
                d="M32,12c-6.627,0-12,5.373-12,12s5.373,12,12,12
            s12-5.373,12-12S38.627,12,32,12z M32,34c-5.523,0-10-4.478-10-10
            s4.477-10,10-10s10,4.477,10,10S37.523,34,32,34z"
            />
        </svg>
        @break


    @case('kids-play')
        <svg viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.6"
             stroke-linecap="round"
             stroke-linejoin="round">

            <circle cx="7" cy="5" r="2"/>
            <path d="M7 7v6"/>
            <path d="M4 10l3 3 3-3"/>
            <path d="M14 5h5v15"/>
            <path d="M14 5v5h5"/>
            <path d="M14 10l-4 10"/>

        </svg>
        @break


    @case('dining')
        <svg viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.6"
             stroke-linecap="round"
             stroke-linejoin="round">

            <path d="M7 3v8"/>
            <path d="M4 3v5c0 2 6 2 6 0V3"/>
            <path d="M7 11v10"/>
            <path d="M17 3v18"/>
            <path d="M17 3c-3 3-3 8 0 9"/>

        </svg>
        @break


    @case('cycling')
        <svg viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.6"
             stroke-linecap="round"
             stroke-linejoin="round">

            <circle cx="6" cy="17" r="4"/>
            <circle cx="18" cy="17" r="4"/>

            <path d="M6 17l4-8 4 8"/>
            <path d="M10 9h5"/>
            <path d="M14 17h4"/>
            <path d="M9 6h3"/>

        </svg>
        @break


    @case('jogging')


        <svg width="64px" height="64px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="18.5" cy="4.5" r="2.5" stroke="currentColor" stroke-width="1.44"></circle> <path d="M14.4 21.9998V21.1948C14.4 21.117 14.4 21.0781 14.3996 21.0411C14.377 18.9018 13.3773 16.8903 11.6857 15.5804C11.6565 15.5578 11.6255 15.5343 11.5635 15.4873C11.5235 15.457 11.5035 15.4419 11.4877 15.4294C10.5309 14.6738 10.467 13.2453 11.3524 12.4073C11.367 12.3935 11.3857 12.3765 11.4227 12.3428L12.4628 11.3973C14.0898 9.91821 13.5945 7.24444 11.5457 6.4462C10.8122 6.16044 9.99522 6.17841 9.27504 6.49613L8.75335 6.72629C8.21393 6.96427 7.94422 7.08326 7.68074 7.21404C7.24267 7.43148 6.81722 7.67347 6.40642 7.93886C6.15935 8.09847 5.91922 8.26947 5.43897 8.61147L4 9.63619" stroke="currentColor" stroke-width="1.44" stroke-linecap="round"></path> <path d="M9 17L8.74064 17.3112C7.32089 19.0149 5.21773 20 3 20" stroke="currentColor" stroke-width="1.44" stroke-linecap="round"></path> <path d="M16 12C17.3131 12.3283 18.6869 12.3283 20 12" stroke="currentColor" stroke-width="1.44" stroke-linecap="round"></path> </g></svg>
        @break
    @case('park')
        <svg viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.6"
             stroke-linecap="round"
             stroke-linejoin="round">

            <path d="M12 3c-4 0-7 3-7 6 0 3 3 5 7 5s7-2 7-5c0-3-3-6-7-6Z"/>

            <path d="M12 14v7"/>

            <path d="M4 18h16"/>

            <path d="M16 16h5"/>
            <path d="M17 19v-3"/>
            <path d="M20 19v-3"/>

        </svg>
        @break


    @case('shield')
        <svg viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.6"
             stroke-linecap="round"
             stroke-linejoin="round">

            <path d="M12 3 20 6v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6l8-3Z"/>

            <path d="m9 12 2 2 4-4"/>

        </svg>
        @break


    @case('star')
        <svg viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.6"
             stroke-linecap="round"
             stroke-linejoin="round">

            <path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-2.9-5.6 2.9 1.1-6.2L3 9.6l6.2-.9L12 3Z"/>

        </svg>
        @break


    @case('calendar')
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <rect x="3" y="5" width="18" height="16" rx="2"/>
            <path d="M7 3v4"/>
            <path d="M17 3v4"/>
            <path d="M3 10h18"/>
            <path d="M8 14h2"/>
            <path d="M14 14h2"/>
            <path d="M8 18h2"/>
            <path d="M14 18h2"/>

        </svg>
        @break


    @case('construction')
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M4 21V7"/>
            <path d="M4 7h13"/>
            <path d="M8 4h9"/>
            <path d="M17 4v17"/>
            <path d="M17 7l4 3"/>
            <path d="M21 10v5"/>
            <path d="M19 15h4"/>
            <path d="M8 21v-7h5v7"/>
            <path d="M3 21h16"/>

        </svg>
        @break


    @case('home')
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M3 11 12 3l9 8"/>
            <path d="M5 10v11h14V10"/>
            <path d="M9 21v-6h6v6"/>

        </svg>
        @break

    @case('farm-cafe')
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M4 11h12v2a6 6 0 0 1-6 6 6 6 0 0 1-6-6v-2Z"/>
            <path d="M16 12h2a2.5 2.5 0 0 1 0 5h-2"/>
            <path d="M7 7c0-2 2-2 2-4"/>
            <path d="M11 7c0-2 2-2 2-4"/>
            <path d="M6 21h12"/>

        </svg>
        @break


    @case('hospital')
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M4 21V6h16v15"/>
            <path d="M9 6V3h6v3"/>
            <path d="M12 9v7"/>
            <path d="M8.5 12.5h7"/>
            <path d="M8 21v-3h8v3"/>
            <path d="M2 21h20"/>

        </svg>
        @break


    @case('retail')
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M4 9h16l-1-5H5L4 9Z"/>
            <path d="M5 9v11h14V9"/>
            <path d="M9 20v-6h6v6"/>
            <path d="M4 9c0 1.5 1 2.5 2.5 2.5S9 10.5 9 9"/>
            <path d="M9 9c0 1.5 1 2.5 3 2.5S15 10.5 15 9"/>
            <path d="M15 9c0 1.5 1 2.5 2.5 2.5S20 10.5 20 9"/>

        </svg>
        @break


    @case('sports-court')
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <rect x="3" y="5" width="18" height="14" rx="1"/>
            <path d="M12 5v14"/>
            <circle cx="12" cy="12" r="3"/>
            <path d="M3 9h3"/>
            <path d="M3 15h3"/>
            <path d="M18 9h3"/>
            <path d="M18 15h3"/>

        </svg>
        @break


    @case('garden')
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M12 21V10"/>
            <path d="M12 13c-4 0-7-2.5-7-6 4 0 7 2.5 7 6Z"/>
            <path d="M12 16c4 0 7-2.5 7-6-4 0-7 2.5-7 6Z"/>
            <path d="M4 21h16"/>

        </svg>
        @break

    @case('masterplan')
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M5 19V8l5-4 4 3 5-1v12l-5 2-4-3-5 2Z"/>
            <path d="M10 4v13"/>
            <path d="M14 7v13"/>

        </svg>
        @break


    @case('coins')
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <ellipse cx="8" cy="6" rx="5" ry="2.5"/>
            <path d="M3 6v4c0 1.4 2.2 2.5 5 2.5s5-1.1 5-2.5V6"/>
            <path d="M3 10v4c0 1.4 2.2 2.5 5 2.5"/>

            <ellipse cx="16" cy="14" rx="5" ry="2.5"/>
            <path d="M11 14v4c0 1.4 2.2 2.5 5 2.5s5-1.1 5-2.5v-4"/>

        </svg>
        @break


    @case('diamond')
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true">

            <path d="M4 8 7 4h10l3 4-8 12L4 8Z"/>
            <path d="M4 8h16"/>
            <path d="m8 4 4 16 4-16"/>

        </svg>
        @break

    @case('aed')
        <svg viewBox="0 0 24 24" fill="none"
             stroke="currentColor"
             stroke-width="1.5">

            <path d="M3 7h15a2 2 0 0 1 2 2v10H5a2 2 0 0 1-2-2V7Z" />
            <path d="M3 7l3-3h11" />
            <path d="M16 12h6v4h-6a2 2 0 0 1 0-4Z" />

        </svg>
    @break

    @case('developer')
        <svg
            viewBox="0 0 1024 1024"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            aria-hidden="true"
        >
            <path
                d="M863.963429 136.045714h-185.051429v-61.732571a61.732571 61.732571 0 0 0-61.805714-61.732572H370.322286a61.732571 61.732571 0 0 0-61.732572 61.732572v61.732571H123.465143C55.296 136.045714 0 191.268571 0 259.437714v555.446857c0 68.169143 55.296 123.392 123.465143 123.392h740.498286c68.169143 0 123.465142-55.222857 123.465142-123.392V259.437714a123.392 123.392 0 0 0-123.465142-123.392z
            m-493.714286-30.866285c0-17.042286 13.824-30.866286 30.939428-30.866286h185.051429c17.042286 0 30.866286 13.897143 30.866286 30.866286v30.866285H370.322286v-30.866285z
            m555.446857 709.705142a61.805714 61.805714 0 0 1-61.805714 61.659429H123.465143a61.659429 61.659429 0 0 1-61.732572-61.659429V475.428571h312.905143c-2.779429 10.020571-4.169143 20.406857-4.388571 30.793143a123.465143 123.465143 0 0 0 246.857143 0 122.88 122.88 0 0 0-4.388572-30.866285h313.051429v339.382857h-0.073143z
            m-493.714286-308.589714c0-11.264 3.291429-21.723429 8.557715-30.866286h106.349714a60.928 60.928 0 0 1 8.557714 30.866286 61.732571 61.732571 0 0 1-123.465143 0z
            m493.714286-92.525714H61.659429v-154.331429c0-34.084571 27.574857-61.659428 61.732571-61.659428h740.498286c34.084571 0 61.805714 27.574857 61.805714 61.659428v154.331429z"
            />
        </svg>
        @break

    @case('payment')
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
        >
            <rect x="3" y="5" width="18" height="14" rx="2"/>
            <path d="M3 10h18"/>
            <path d="M7 15h4"/>
            <path d="M15 15h2"/>
        </svg>
        @break

    @case('metro')
        <svg fill="#00263A" width="24px" height="24px" viewBox="0 0 122.88 122.88" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 88.72 122.88" xml:space="preserve" stroke="#00263A" stroke-width="0.0012288"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.24575999999999998"></g><g id="SVGRepo_iconCarrier"> <style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style> <g> <path class="st0" d="M26.06,0h35.66c5.85,0,13.01,7.56,14.14,13.28l12.75,64.33c1.14,5.73-6.25,13.98-12.09,13.98H19.26 c-13.85,0-21.72-2.78-18.56-19.5l11-58.25C12.78,8.08,20.2,0,26.06,0L26.06,0z M8.97,122.88l9.88-22.91h12.19l-3.26,7.36h32.68 l-3.36-7.57h11.98l9.77,22.7H67.08l-3.47-7.57h-39.4l-3.26,7.99H8.97L8.97,122.88z M28.55,68.71c4.36,0,7.89,3.53,7.89,7.89 c0,4.36-3.53,7.89-7.89,7.89c-4.36,0-7.89-3.53-7.89-7.89C20.66,72.24,24.19,68.71,28.55,68.71L28.55,68.71z M36.93,7.43h14.22 c0.36,0,0.66,0.3,0.66,0.66v6.68c0,0.36-0.3,0.66-0.66,0.66H36.93c-0.36,0-0.66-0.3-0.66-0.66V8.09 C36.27,7.73,36.57,7.43,36.93,7.43L36.93,7.43z M10.27,61.36l7.79-38.39h52.48l7.28,38.39H10.27L10.27,61.36z M59.53,68.71 c4.36,0,7.89,3.53,7.89,7.89c0,4.36-3.53,7.89-7.89,7.89c-4.36,0-7.89-3.53-7.89-7.89C51.64,72.24,55.17,68.71,59.53,68.71 L59.53,68.71z"></path> </g> </g></svg>
    @break
    @case('mall')
        <svg width="24px" height="24px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#00263A" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5285 6C16.5098 5.9193 16.4904 5.83842 16.4701 5.75746C16.2061 4.70138 15.7904 3.55383 15.1125 2.65C14.4135 1.71802 13.3929 1 12 1C10.6071 1 9.58648 1.71802 8.88749 2.65C8.20962 3.55383 7.79387 4.70138 7.52985 5.75747C7.50961 5.83842 7.49016 5.9193 7.47145 6H5.8711C4.29171 6 2.98281 7.22455 2.87775 8.80044L2.14441 19.8004C2.02898 21.532 3.40238 23 5.13777 23H18.8622C20.5976 23 21.971 21.532 21.8556 19.8004L21.1222 8.80044C21.0172 7.22455 19.7083 6 18.1289 6H16.5285ZM8 11C8.57298 11 8.99806 10.5684 9.00001 9.99817C9.00016 9.97438 9.00044 9.9506 9.00084 9.92682C9.00172 9.87413 9.00351 9.79455 9.00718 9.69194C9.01451 9.48652 9.0293 9.18999 9.05905 8.83304C9.08015 8.57976 9.10858 8.29862 9.14674 8H14.8533C14.8914 8.29862 14.9198 8.57976 14.941 8.83305C14.9707 9.18999 14.9855 9.48652 14.9928 9.69194C14.9965 9.79455 14.9983 9.87413 14.9992 9.92682C14.9996 9.95134 14.9999 9.97587 15 10.0004C15 10.0004 15 11 16 11C17 11 17 9.99866 17 9.99866C16.9999 9.9636 16.9995 9.92854 16.9989 9.89349C16.9978 9.829 16.9957 9.7367 16.9915 9.62056C16.9833 9.38848 16.9668 9.06001 16.934 8.66695C16.917 8.46202 16.8953 8.23812 16.8679 8H18.1289C18.6554 8 19.0917 8.40818 19.1267 8.93348L19.86 19.9335C19.8985 20.5107 19.4407 21 18.8622 21H5.13777C4.55931 21 4.10151 20.5107 4.13998 19.9335L4.87332 8.93348C4.90834 8.40818 5.34464 8 5.8711 8H7.13208C7.10465 8.23812 7.08303 8.46202 7.06595 8.66696C7.0332 9.06001 7.01674 9.38848 7.00845 9.62056C7.0043 9.7367 7.00219 9.829 7.00112 9.89349C7.00054 9.92785 7.00011 9.96221 7 9.99658C6.99924 10.5672 7.42833 11 8 11ZM9.53352 6H14.4665C14.2353 5.15322 13.921 4.39466 13.5125 3.85C13.0865 3.28198 12.6071 3 12 3C11.3929 3 10.9135 3.28198 10.4875 3.85C10.079 4.39466 9.76472 5.15322 9.53352 6Z" fill="currentcolor"></path> </g></svg>
    @break
    @case('plane')
        <svg  width="24px" height="24px" viewBox="0 0 14.00 14.00" id="svg2" fill="#00263A" transform="rotate(45)" stroke="#00263A" stroke-width="0.00014"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <metadata id="metadata8"> <rdf:rdf> <cc:work rdf:about=""> <dc:format>image/svg+xml</dc:format> <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type> <dc:title></dc:title> </cc:work> </rdf:rdf> </metadata> <defs id="defs6"></defs> <rect width="14" height="14" x="0" y="0" id="canvas" style="fill:none;stroke:none;visibility:hidden"></rect> <path d="m 14,8 0,1 -6,-1 0,3 2,2 0,1 L 7,13 4,14 4,13 6,11 6,8 0,9 0,8 6,5 6,2 C 6,1 6.22222,0 7,0 7.77777,0 8,1 8,2 l 0,3 z" id="airport" style="fill:#00263A;fill-opacity:1;stroke:none"></path> </g></svg>
    @break
    @case('beach_side')
        <svg fill="#00263A" width="30px" height="30px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" id="chair_x5F_umbrella" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#00263A" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M474.407,170.574c-0.449-1.188-0.912-2.368-1.389-3.541c-0.119-0.292-0.246-0.579-0.366-0.87 c-0.363-0.877-0.725-1.754-1.104-2.622c-0.293-0.674-0.6-1.339-0.902-2.007c-0.216-0.479-0.425-0.961-0.646-1.437 c-0.303-0.654-0.621-1.3-0.934-1.949c-0.232-0.481-0.457-0.968-0.694-1.447c-0.362-0.732-0.738-1.455-1.112-2.181 c-0.198-0.387-0.391-0.778-0.593-1.163c-0.419-0.797-0.852-1.585-1.284-2.373c-0.167-0.307-0.328-0.616-0.498-0.921 c-0.466-0.837-0.946-1.664-1.428-2.49c-0.145-0.249-0.283-0.503-0.43-0.751c-0.581-0.984-1.175-1.96-1.776-2.93 c-0.053-0.084-0.103-0.172-0.155-0.256c-0.614-0.986-1.242-1.962-1.878-2.933c-0.044-0.066-0.086-0.135-0.129-0.202 c-0.562-0.853-1.137-1.695-1.715-2.536c-0.124-0.181-0.243-0.365-0.367-0.544c-0.594-0.856-1.201-1.703-1.813-2.546 c-0.114-0.158-0.224-0.319-0.339-0.477c-0.729-0.996-1.469-1.983-2.221-2.961c0,0,0,0-0.001-0.001 c-0.741-0.964-1.494-1.918-2.258-2.862c-0.012-0.015-0.023-0.03-0.035-0.045c-0.761-0.939-1.532-1.869-2.314-2.79 c-0.017-0.019-0.032-0.038-0.048-0.058c-13.045-15.335-29.131-27.977-47.551-37.216l3.092-6.744 c1.491-3.25,0.063-7.093-3.188-8.582c-3.248-1.49-7.092-0.064-8.582,3.188l-3.123,6.813 c-35.482-14.248-74.438-14.676-110.421-1.066c-38.021,14.383-68.167,42.713-84.882,79.771c-1.471,3.259-0.021,7.093,3.239,8.563 l126.013,56.842l-36.287,79.172H180.994l-27.631-54.71c-1.102-2.182-3.336-3.556-5.778-3.556H108.03 c-2.235,0-4.313,1.153-5.495,3.051c-1.183,1.898-1.301,4.271-0.314,6.278l43.896,89.341c1.088,2.215,3.342,3.619,5.811,3.619h3.988 l-11.457,25.863c-0.888,2.002-0.701,4.317,0.493,6.153c1.194,1.835,3.236,2.942,5.426,2.942h29.729c2.477,0,4.735-1.412,5.82-3.638 l15.264-31.321h64.921l-10.647,23.229c-0.104,0.226-0.159,0.459-0.235,0.688c-43.954,0.947-79.755,14.972-103.513,27.799 c-30.866,16.665-48.293,34.572-49.02,35.327c-2.603,2.7-2.523,6.996,0.176,9.602c2.695,2.605,6.997,2.529,9.605-0.166 c0.167-0.172,16.982-17.381,46.134-33.039c26.713-14.348,69.623-30.324,122.347-24.916 c101.232,10.373,140.068,57.023,140.436,57.476c1.342,1.681,3.318,2.556,5.314,2.556c1.486,0,2.983-0.485,4.236-1.485 c2.933-2.342,3.412-6.618,1.07-9.552c-1.676-2.098-42.266-51.51-149.67-62.516c-4.411-0.452-8.748-0.748-13.024-0.931 l11.032-24.071h43.301l15.264,31.321c1.084,2.226,3.344,3.638,5.82,3.638h29.729c2.19,0,4.232-1.107,5.426-2.942 c1.194-1.836,1.381-4.151,0.493-6.153l-11.457-25.863h2.823c3.575,0,6.474-2.898,6.474-6.475v-31.075 c0-3.575-2.898-6.474-6.474-6.474h-71.222l33.848-73.848l127.85,57.669c0.844,0.382,1.752,0.573,2.661,0.573 c0.775,0,1.552-0.14,2.292-0.419c1.605-0.608,2.904-1.828,3.609-3.394C487.507,249.945,488.792,208.597,474.407,170.574z M176.061,372.457h-15.734l9.752-22.012h16.709L176.061,372.457z M364.52,372.457h-15.734l-10.727-22.012h16.709L364.52,372.457z M365.279,337.497h-6.299h-31.278H197.144h-31.278h-9.906l-37.535-76.394h25.178l27.631,54.711 c1.102,2.181,3.336,3.556,5.779,3.556h188.268V337.497z M395.338,245.866l-55.564-25.063l-11.801-5.324l-53.941-24.331 c16.947-39.323,41.465-66.88,72.942-81.962c13.902-6.661,26.294-9.34,34.491-10.417c3.173-0.417,5.737-0.602,7.488-0.673 c1.068,1.371,2.565,3.419,4.281,6.067c4.486,6.925,10.512,18.093,14.613,33.022C417.107,170.879,412.896,207.415,395.338,245.866z"></path> <path d="M80.349,181.725c23.21,0,42.094-18.884,42.094-42.094s-18.884-42.094-42.094-42.094s-42.093,18.884-42.093,42.094 S57.139,181.725,80.349,181.725z M80.349,110.485c16.071,0,29.146,13.074,29.146,29.146s-13.074,29.146-29.146,29.146 s-29.146-13.074-29.146-29.146S64.277,110.485,80.349,110.485z"></path> <path d="M80.424,91.485c3.576,0,6.474-2.897,6.474-6.474V69.474C86.897,65.898,84,63,80.424,63s-6.475,2.898-6.475,6.474v15.538 C73.949,88.588,76.848,91.485,80.424,91.485z"></path> <path d="M80.424,188.596c-3.576,0-6.475,2.897-6.475,6.474v14.243c0,3.575,2.898,6.474,6.475,6.474s6.474-2.898,6.474-6.474 v-14.243C86.897,191.493,84,188.596,80.424,188.596z"></path> <path d="M128.331,140.688c0,3.576,2.898,6.475,6.474,6.475h14.243c3.576,0,6.474-2.898,6.474-6.475 c0-3.575-2.897-6.474-6.474-6.474h-14.243C131.229,134.214,128.331,137.112,128.331,140.688z"></path> <path d="M9.209,147.162h15.538c3.576,0,6.474-2.898,6.474-6.475c0-3.575-2.897-6.474-6.474-6.474H9.209 c-3.575,0-6.474,2.898-6.474,6.474C2.735,144.264,5.634,147.162,9.209,147.162z"></path> <path d="M123.433,174.782c-2.529-2.528-6.627-2.53-9.155-0.001c-2.529,2.527-2.529,6.627-0.002,9.156l10.401,10.403 c1.265,1.265,2.921,1.896,4.579,1.896c1.656,0,3.313-0.632,4.577-1.896c2.528-2.527,2.528-6.627,0.001-9.155L123.433,174.782z"></path> <path d="M35.977,105.639c1.265,1.263,2.921,1.896,4.578,1.896c1.656,0,3.313-0.633,4.578-1.897 c2.527-2.528,2.527-6.628-0.001-9.155L34.728,86.08c-2.528-2.526-6.627-2.527-9.156,0.001c-2.527,2.529-2.527,6.628,0.002,9.156 L35.977,105.639z"></path> <path d="M118.854,107.534c1.656,0,3.314-0.633,4.578-1.897l10.401-10.4c2.528-2.528,2.528-6.627,0-9.155 c-2.526-2.528-6.629-2.528-9.155,0l-10.4,10.401c-2.529,2.527-2.529,6.627,0,9.154C115.54,106.901,117.197,107.534,118.854,107.534 z"></path> <path d="M34.728,194.341l10.404-10.403c2.528-2.528,2.528-6.627,0-9.155c-2.526-2.528-6.629-2.528-9.155,0l-10.403,10.404 c-2.529,2.527-2.529,6.627,0,9.154c1.263,1.265,2.921,1.896,4.577,1.896S33.465,195.605,34.728,194.341z"></path> <path d="M500.504,183.038c-3.535,0.535-5.969,3.833-5.436,7.368c0.23,1.523,0.408,2.568,0.555,3.434 c0.311,1.825,0.452,2.657,0.713,6.09c0.256,3.399,3.094,5.986,6.448,5.986c0.163,0,0.329-0.007,0.494-0.02 c3.564-0.27,6.236-3.377,5.968-6.942c-0.291-3.862-0.484-5.089-0.857-7.285c-0.137-0.806-0.303-1.777-0.517-3.195 C507.339,184.938,504.047,182.501,500.504,183.038z"></path> <path d="M478.446,139.386c2.089,3.797,4.037,7.803,5.788,11.905c2.001,4.687,3.799,9.624,5.346,14.676 c0.854,2.788,3.417,4.581,6.188,4.581c0.628,0,1.266-0.091,1.896-0.284c3.42-1.047,5.343-4.666,4.297-8.085 c-1.681-5.49-3.638-10.863-5.818-15.971c-1.92-4.497-4.057-8.893-6.352-13.063c-6.176-11.227-13.708-21.279-22.389-29.883 c-2.538-2.518-6.637-2.5-9.154,0.04c-2.518,2.539-2.5,6.639,0.04,9.154C466.086,120.186,472.868,129.247,478.446,139.386z"></path> </g> </g></svg>
    @break
    @case('resort')
        <svg fill="#00263A" width="24px" height="24px" viewBox="0 0 50.00 50.00" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#00263A" stroke-width="0.0005"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.2"></g><g id="SVGRepo_iconCarrier"><path d="M12.691406 0L11.564453 2.3320312L9 2.6386719L10.949219 4.3613281L10.435547 7L12.691406 5.6816406L14.949219 7L14.435547 4.3613281L16.384766 2.6386719L13.820312 2.3320312L12.691406 0 z M 14.949219 7L10.435547 7L9.3007812 7C6.3730036 7 4 9.3730039 4 12.300781L4 45 A 1.0001 1.0001 0 0 0 5 46L45 46 A 1.0001 1.0001 0 0 0 46 45L46 12.300781C46 9.3730039 43.626997 7 40.699219 7L39.564453 7L35.050781 7L31.359375 7L26.845703 7L23.154297 7L18.640625 7L14.949219 7 z M 18.640625 7L20.896484 5.6816406L23.154297 7L22.640625 4.3613281L24.589844 2.6386719L22.025391 2.3320312L20.896484 0L19.769531 2.3320312L17.205078 2.6386719L19.154297 4.3613281L18.640625 7 z M 26.845703 7L29.103516 5.6816406L31.359375 7L30.845703 4.3613281L32.794922 2.6386719L30.230469 2.3320312L29.103516 0L27.974609 2.3320312L25.410156 2.6386719L27.359375 4.3613281L26.845703 7 z M 35.050781 7L37.308594 5.6816406L39.564453 7L39.050781 4.3613281L41 2.6386719L38.435547 2.3320312L37.308594 0L36.179688 2.3320312L33.615234 2.6386719L35.564453 4.3613281L35.050781 7 z M 9.3007812 9L40.699219 9C42.571441 9 44 10.428559 44 12.300781L44 44L29 44L29 36 A 1.0001 1.0001 0 0 0 28 35L22 35 A 1.0001 1.0001 0 0 0 21 36L21 44L6 44L6 12.300781C6 10.428559 7.4285592 9 9.3007812 9 z M 10 11 A 1.0001 1.0001 0 0 0 9 12L9 16 A 1.0001 1.0001 0 0 0 10 17L16 17 A 1.0001 1.0001 0 0 0 17 16L17 12 A 1.0001 1.0001 0 0 0 16 11L10 11 z M 22 11 A 1.0001 1.0001 0 0 0 21 12L21 16 A 1.0001 1.0001 0 0 0 22 17L28 17 A 1.0001 1.0001 0 0 0 29 16L29 12 A 1.0001 1.0001 0 0 0 28 11L22 11 z M 34 11 A 1.0001 1.0001 0 0 0 33 12L33 16 A 1.0001 1.0001 0 0 0 34 17L40 17 A 1.0001 1.0001 0 0 0 41 16L41 12 A 1.0001 1.0001 0 0 0 40 11L34 11 z M 11 13L15 13L15 15L11 15L11 13 z M 23 13L27 13L27 15L23 15L23 13 z M 35 13L39 13L39 15L35 15L35 13 z M 10 19 A 1.0001 1.0001 0 0 0 9 20L9 24 A 1.0001 1.0001 0 0 0 10 25L16 25 A 1.0001 1.0001 0 0 0 17 24L17 20 A 1.0001 1.0001 0 0 0 16 19L10 19 z M 22 19 A 1.0001 1.0001 0 0 0 21 20L21 24 A 1.0001 1.0001 0 0 0 22 25L28 25 A 1.0001 1.0001 0 0 0 29 24L29 20 A 1.0001 1.0001 0 0 0 28 19L22 19 z M 34 19 A 1.0001 1.0001 0 0 0 33 20L33 24 A 1.0001 1.0001 0 0 0 34 25L40 25 A 1.0001 1.0001 0 0 0 41 24L41 20 A 1.0001 1.0001 0 0 0 40 19L34 19 z M 11 21L15 21L15 23L11 23L11 21 z M 23 21L27 21L27 23L23 23L23 21 z M 35 21L39 21L39 23L35 23L35 21 z M 10 27 A 1.0001 1.0001 0 0 0 9 28L9 32 A 1.0001 1.0001 0 0 0 10 33L16 33 A 1.0001 1.0001 0 0 0 17 32L17 28 A 1.0001 1.0001 0 0 0 16 27L10 27 z M 22 27 A 1.0001 1.0001 0 0 0 21 28L21 32 A 1.0001 1.0001 0 0 0 22 33L28 33 A 1.0001 1.0001 0 0 0 29 32L29 28 A 1.0001 1.0001 0 0 0 28 27L22 27 z M 34 27 A 1.0001 1.0001 0 0 0 33 28L33 32 A 1.0001 1.0001 0 0 0 34 33L40 33 A 1.0001 1.0001 0 0 0 41 32L41 28 A 1.0001 1.0001 0 0 0 40 27L34 27 z M 11 29L15 29L15 31L11 31L11 29 z M 23 29L27 29L27 31L23 31L23 29 z M 35 29L39 29L39 31L35 31L35 29 z M 10 35 A 1.0001 1.0001 0 0 0 9 36L9 40 A 1.0001 1.0001 0 0 0 10 41L16 41 A 1.0001 1.0001 0 0 0 17 40L17 36 A 1.0001 1.0001 0 0 0 16 35L10 35 z M 34 35 A 1.0001 1.0001 0 0 0 33 36L33 40 A 1.0001 1.0001 0 0 0 34 41L40 41 A 1.0001 1.0001 0 0 0 41 40L41 36 A 1.0001 1.0001 0 0 0 40 35L34 35 z M 11 37L15 37L15 39L11 39L11 37 z M 23 37L27 37L27 44L23 44L23 37 z M 35 37L39 37L39 39L35 39L35 37 z"></path></g></svg>
    @break

    @case('flower-2')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2a10 10 0 0 1 10 10c0 5.523-4.477 10-10 10S2 17.523 2 12A10 10 0 0 1 12 2z"/>
            <path d="M12 6a6 6 0 0 1 6 6c0 3.314-2.686 6-6 6s-6-2.686-6-6a6 6 0 0 1 6-6z"/>
            <circle cx="12" cy="12" r="2"/>
        </svg>
    @break

    @case('flame')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/>
        </svg>

        @break
    @case('cloud-fog')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/>
            <path d="M8 19h8"/>
            <path d="M6 22h12"/>
        </svg>
@break

    @case('heart')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
        </svg>
    @break

    @case('zap')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
        </svg>
    @break
    @case('waves')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2 6c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/>
            <path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/>
            <path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/>
        </svg>
    @break

    @case('building-2')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="16" height="20" x="4" y="2" rx="2" ry="2"/>
            <path d="M9 22v-4h6v4"/>
            <path d="M8 6h.01"/>
            <path d="M16 6h.01"/>
            <path d="M12 6h.01"/>
            <path d="M12 10h.01"/>
            <path d="M12 14h.01"/>
            <path d="M16 10h.01"/>
            <path d="M16 14h.01"/>
            <path d="M8 10h.01"/>
            <path d="M8 14h.01"/>
        </svg>
    @break

    @case('coffee')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M10 2v2"/>
            <path d="M14 2v2"/>
            <path d="M6 2v2"/>
            <path d="M16 8a1 1 0 0 1 1 1v8a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V9a1 1 0 0 1 1-1h12Z"/>
            <path d="M16 11h3a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-3"/>
        </svg>
    @break

    @case('ticket')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/>
            <path d="M13 5v2"/>
            <path d="M13 11v2"/>
            <path d="M13 17v2"/>
        </svg>
    @break

    @case('world-class')
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="8" r="6"/>
            <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>
        </svg>
    @break

    @case('investment')
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
            <path d="m9 12 2 2 4-4"/>
        </svg>
    @break
@endswitch
