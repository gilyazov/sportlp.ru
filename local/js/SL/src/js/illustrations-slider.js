import { Swiper, Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

export default function illustrationsSlider() {
    const elements = Array.from(document.querySelectorAll('.js-product-illustrations-slider'));

    elements.forEach(element => {
        if (!window.matchMedia("(max-width: 640px)").matches) return;
        const container = element.querySelector('.swiper-container');

        new Swiper(container, {
            watchOverflow: true,
            slidesPerView: 'auto',
            spaceBetween: 10,
            pagination: {
                el: element.querySelector('.slider-pagination'),
                type: 'bullets',
                clickable: true
            }
        });
    });
}
