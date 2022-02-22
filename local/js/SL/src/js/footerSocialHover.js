export default function footerSocialHover() {
    const links = Array.from(document.querySelectorAll('.page-footer__social-link'));

    links.forEach((link) => {
        link.addEventListener('mouseenter', () => {
            links.forEach((otherLink) => {
                if (otherLink !== link) {
                    otherLink.classList.add('muted');
                }
            });
        });

        link.addEventListener('mouseleave', () => {
            links.forEach((otherLink) => {
                otherLink.classList.remove('muted');
            });
        });
    });
}
