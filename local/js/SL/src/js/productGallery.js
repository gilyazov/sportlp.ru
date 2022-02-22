import { Swiper, Thumbs, Navigation, Pagination } from 'swiper';

Swiper.use([Thumbs, Navigation, Pagination]);

export default function productGallery() {
    const elements = Array.from(document.querySelectorAll('.js-product-gallery-slider'));

    elements.forEach(element => {
        const mainContainer = element.querySelector('.product-intro__gallery-main .swiper-container');
        const thumbsContainer = element.querySelector('.product-intro__gallery-thumbs .swiper-container');
        const mainSliderOptions = {
            watchOverflow: true,
            spaceBetween: 0,
            thumbs: {},
            speed: 700,
            pagination: {
                el: element.querySelector('.slider-pagination'),
                type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: element.querySelector('.product-intro__gallery-arrow--next'),
                prevEl: element.querySelector('.product-intro__gallery-arrow--prev')
            }
        };

        mainSliderOptions.thumbs.swiper = new Swiper(thumbsContainer, {
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            slidesPerView: 'auto',
            threshold: 10,
            speed: 700,
            slideToClickedSlide: true,
            spaceBetween: 15,
            direction: 'vertical'
        });

        new Swiper(mainContainer, mainSliderOptions);
    });
}
