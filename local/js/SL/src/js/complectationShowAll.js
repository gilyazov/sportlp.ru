export default function complectationShowAll() {
    const btns = Array.from(document.querySelectorAll('.product-details__complectation-card-show-all'));

    btns.forEach(btn => {
        const card = btn.closest('.product-details__complectation-card');
        btn.addEventListener('click', event => {
            event.preventDefault();
            card.classList.add('show-all');
            btn.remove();
        });
    });
}
