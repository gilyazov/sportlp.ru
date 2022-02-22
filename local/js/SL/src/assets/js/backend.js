document.addEventListener('DOMContentLoaded', () => {
    const contactModals = Array.from(document.querySelectorAll('form[data-need-validation]'));

    contactModals.forEach(element => {
        const form = element;
       

        form.addEventListener('submit', event => {
            event.preventDefault();
            if (
                $(form)
                    .parsley()
                    .isValid()
            ) {
                form.reset();
                $(form)
                    .parsley()
                    .reset();
               window.openModal('#success-modal');
            }
        });
    });
});
