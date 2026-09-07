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
