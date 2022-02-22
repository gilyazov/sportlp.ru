export default function helpMobileSelect() {
    const elements = Array.from(document.querySelectorAll('.js-help-mobile-select'));

    elements.forEach(element => {
        const btn = element.querySelector('.help__form-mobile-select');
        const btnValue = btn.querySelector('.help__form-mobile-select-value');
        const btnDesc = btn.querySelector('.help__form-mobile-select-value-description');

        const radio = Array.from(element.querySelectorAll('.help__form-checkbox'));

        const setSelectValue = () => {
            let checkedRadio = radio.find(item => {
                const input = item.querySelector('input[type="radio"]');

                return input.checked;
            });

            if (!checkedRadio) {
                if (radio.length) {
                    checkedRadio = radio[0];
                    checkedRadio.querySelector('input[type="radio"]').checked = true;

                    console.log('Checked first radio')
                } else {
                    return;
                }
            };

            const radioValue = checkedRadio.querySelector('.help__form-checkbox-value').textContent;
            const radioDesc = checkedRadio.querySelector('.help__form-checkbox-description').textContent;

            btnValue.textContent = radioValue;
            btnDesc.textContent = radioDesc;
        };

        setSelectValue();

        radio.forEach(item => {
            const input = item.querySelector('input[type="radio"]');

            input.addEventListener('change', () => {
                setSelectValue();

                element.classList.remove('mobile-select-open');
            });
        });

        btn.addEventListener('click', event => {
            event.preventDefault();
            elements.forEach(otherElement => {
                if (otherElement !== element) {
                    otherElement.classList.remove('mobile-select-open')
                }
            })
            element.classList.toggle('mobile-select-open');
        });

        document.addEventListener('click', event => {
            if (!(event.target.matches('.js-help-mobile-select') || event.target.closest('.js-help-mobile-select'))) {
                element.classList.remove('mobile-select-open');
            }
        });
    });
}
