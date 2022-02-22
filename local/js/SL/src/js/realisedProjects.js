import { Swiper, Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

export default function realisedProjects() {
    const elements = Array.from(document.querySelectorAll('.js-realised-projects'));

    elements.forEach(element => {
        if (window.matchMedia('(max-width: 640px)').matches) {
            const container = element.querySelector('.realised-projects__slider > .swiper-container');

            new Swiper(container, {
                watchOverflow: true,
                speed: 700,
                spaceBetween: 30,
                pagination: {
                    el: element.querySelector('.slider-pagination'),
                    type: 'bullets',
                    clickable: true
                }
            });
        } else {
            const cards = Array.from(element.querySelectorAll('.realised-projects__card'));

            cards.forEach(card => {
                const container = card.querySelector('.swiper-container');

                new Swiper(container, {
                    slidesPerView: 1,
                    watchOverflow: true,
                    speed: 500,
                    pagination: {
                        el: card.querySelector('.realised-projects__card-image-slider-pagination'),
                        type: 'fraction'
                    },
                    navigation: {
                        nextEl: card.querySelector('.realised-projects__card-image-slider-arrow--next'),
                        prevEl: card.querySelector('.realised-projects__card-image-slider-arrow--prev')
                    }
                });
            });
        }
    });
}
