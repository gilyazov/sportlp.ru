import { Swiper, Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

export default function brandBlock() {
    const elements = Array.from(document.querySelectorAll('.js-brand-block'));

    elements.forEach(element => {
        const container = element.querySelector('.swiper-container');

        new Swiper(container, {
            watchOverflow: true,
            slidesPerView: 'auto',
            spaceBetween: 10,
            navigation: {
                nextEl: element.querySelector('.brand-block__slider-arrow--next'),
                prevEl: element.querySelector('.brand-block__slider-arrow--prev')
            },
            pagination: {
                el: element.querySelector('.slider-pagination'),
                type: 'bullets',
                clickable: true,
             
            },
            breakpoints: {
                641: {
                    spaceBetween: 20
                }
            }
        });
    });
}
