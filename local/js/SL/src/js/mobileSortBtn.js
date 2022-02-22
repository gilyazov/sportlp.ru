export default function mobileSortBtn() {
    const elements = Array.from(document.querySelectorAll('.catalog-page__sorting'));

    elements.forEach(element => {
        const btn = element.querySelector('.catalog-page__sorting-btn');

        btn.addEventListener('click', event => {
            event.preventDefault();
            element.classList.toggle('sorting-shown');
        });

        document.addEventListener('click', event => {
            if (!(event.target.matches('.catalog-page__sorting') || event.target.closest('.catalog-page__sorting'))) {
                element.classList.remove('sorting-shown');
            }
        });
    });
}
