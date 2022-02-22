export default function otherReviews() {
    const elements = Array.from(document.querySelectorAll('.reviews__other-reviews'));

    elements.forEach(element => {
        const scrollWrapper = element.querySelector('.reviews__other-reviews-scroll-wrapper');

        const checkScroll = () => {
            // console.log('Scroll height', scrollWrapper.scrollHeight);
            // console.log('Scroll top', scrollWrapper.scrollTop);
            // console.log('Offset height', scrollWrapper.offsetHeight);
            // console.log('Offset height + scroll top', scrollWrapper.offsetHeight + scrollWrapper.scrollTop);

            if (scrollWrapper.scrollHeight > scrollWrapper.offsetHeight) {
                if (scrollWrapper.scrollTop == 0) {
                    element.classList.add('remove-top-gradient');
                } else {
                    element.classList.remove('remove-top-gradient');
                }
    
                if (scrollWrapper.offsetHeight + scrollWrapper.scrollTop >= scrollWrapper.scrollHeight) {
                    element.classList.add('remove-bottom-gradient');
                } else {
                    element.classList.remove('remove-bottom-gradient');
                }
            } else {
                element.classList.add('remove-bottom-gradient');
                element.classList.add('remove-top-gradient');
            }
        };

        checkScroll();

        window.addEventListener('resize', () => {
            checkScroll();
        })

        scrollWrapper.addEventListener('scroll', () => {
            checkScroll();
        });
    });
}
