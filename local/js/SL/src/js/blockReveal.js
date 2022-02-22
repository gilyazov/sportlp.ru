export default function blocksReveal() {
    const options = {
        threshold: [0, 0.25, 0.5, 0.75, 1]
    };
    const callback = function(entries, observer) {
        entries.forEach(entry => {
            if (entry.intersectionRatio > (entry.target.hasAttribute('data-intersection-ratio') ? Number(entry.target.getAttribute('data-intersection-ratio')) : 0.5)) {
                entry.target.classList.add('revealed');
            }

            // console.log('Entry', entry.target);

            // console.log('Intersection ratio', entry.intersectionRatio);
        });
    };
    const observer = new IntersectionObserver(callback, options);

    const blocks = Array.from(document.querySelectorAll('.js-block-to-reveal'));

    blocks.forEach(block => observer.observe(block));
}
