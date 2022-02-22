export default function fixedHeader() {
    const pageHeader = document.querySelector('.page-header');

    function fixHeader() {
        if (window.pageYOffset > 0) {
            pageHeader.classList.add('fixed');
        } else {
            pageHeader.classList.remove('fixed');
        }
    }

    fixHeader();

    window.addEventListener('scroll', () => {
        fixHeader();
    });
}
