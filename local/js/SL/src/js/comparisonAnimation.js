import gsap from 'gsap';

export default function comparisonAnimation() {
    document.addEventListener('click', event => {
        if (event.target.matches('.js-comparison-btn') || event.target.closest('.js-comparison-btn')) {
            event.preventDefault();
            const btn = event.target.matches('.js-comparison-btn') ? event.target : event.target.closest('.js-comparison-btn');

            const btnClone = btn.cloneNode(true);

            document.body.appendChild(btnClone);

            const comparisons = document.querySelector('.page-header__comparisons');

            if (!comparisons) return;

            gsap.set(btnClone, {
                position: 'fixed',
                left: btn.getBoundingClientRect().left,
                top: btn.getBoundingClientRect().top,
                zIndex: 500
            });

            gsap.to(btnClone, {
                duration: 1,
                x: comparisons.getBoundingClientRect().left + comparisons.offsetWidth / 2 - (btn.getBoundingClientRect().left + btn.offsetWidth / 2),
                y: comparisons.getBoundingClientRect().top + comparisons.offsetHeight / 2 - (btn.getBoundingClientRect().top + btn.offsetHeight / 2),
                autoAlpha: 0,
                onComplete: () => btnClone.remove(),
            });
        }
    });
}
