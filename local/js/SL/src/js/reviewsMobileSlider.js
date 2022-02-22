import { Swiper, Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

export default function reviewsMobileSlider() {

    if (!window.matchMedia("(max-width: 640px)").matches) return;
    
    const elements = Array.from(document.querySelectorAll('.js-reviews-mobile-slider'));

    elements.forEach(element => {
        const container = element.querySelector('.swiper-container');

        new Swiper(container, {
            watchOverflow: true,
            speed: 500,
            pagination: {
                el: element.querySelector('.slider-pagination'),
                type: 'bullets',
                clickable: true
            }
        });
    });
}
