import { Swiper, Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

export default function catalogBrandsSlider() {
    const elements = Array.from(document.querySelectorAll('.js-catalog-brands-slider'));

    elements.forEach(element => {
        const container = element.querySelector('.swiper-container');
        new Swiper(container, {
            slidesPerView: 'auto',
            watchOverflow: true,
            speed: 700,
            spaceBetween: 30,
            threshold: 10,
            watchSlidesProgress: true,
            pagination: {
                el: element.querySelector('.slider-pagination'),
                type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: element.querySelector('.catalog__brand-slider-arrow--next'),
                prevEl: element.querySelector('.catalog__brand-slider-arrow--prev')
            },
            on: {
                slideChange: function(swiper) {
                    swiper.slides.forEach((slide, slideIndex) => {
                        if (slideIndex < swiper.activeIndex) {
                            slide.classList.add('previous-slide');
                        } else {
                            slide.classList.remove('previous-slide');
                        }
                    });
                }
            }
        });
    });
}
