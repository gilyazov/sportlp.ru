import { Swiper, Navigation, Parallax, Pagination, Controller, EffectFade } from 'swiper';

Swiper.use([Navigation, Parallax, Pagination, Controller, EffectFade]);

export default function introSlider() {
    const elements = Array.from(document.querySelectorAll('.js-intro-slider'));

    elements.forEach(element => {
        const paginationContainer = element.querySelector('.intro__slider-fraction-pagination > .swiper-container');

        const paginationSlider = new Swiper(paginationContainer, {
            speed: 300,
            allowTouchMove: false,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            }
        });

        const videoContainer = element.querySelector('.intro__video-slider > .swiper-container');

        const playVideo = (slides, activeIndex) => {
            Array.from(slides).forEach((slide, slideIndex) => {
                const video = slide.querySelector('video');
                if (slideIndex === activeIndex) {
                    video.play();
                } else {
                    video.pause();
                }
            });
        };

        const videoSlider = new Swiper(videoContainer, {
            watchOverflow: true,
            speed: 600,
            // init: false,
            allowTouchMove: false,
            on: {
                init: swiper => {
                    playVideo(swiper.slides, swiper.activeIndex);
                },
                slideChange: swiper => {
                    playVideo(swiper.slides, swiper.activeIndex);
                }
            }
        });

        const linkLayers = Array.from(element.querySelectorAll('.intro__details-links-layer'));

        const setActiveLinkLayer = index => {
            linkLayers.forEach(layer => layer.classList.remove('active'));

            linkLayers[index].classList.add('active');
        };

        const mainContainer = element.querySelector('.intro__slider-inner > .swiper-container');

        const mainSlider = new Swiper(mainContainer, {
            slidesPerView: 'auto',
            watchOverflow: true,
            speed: 1000,
            threshold: 10,
            longSwipesRatio: 0.3,
            slideToClickedSlide: true,
        
            pagination: {
                el: element.querySelector('.slider-pagination'),
                type: 'bullets',
                clickable: true
            },
            parallax: true,
            navigation: {
                nextEl: element.querySelector('.intro__slider-arrow--next'),
                prevEl: element.querySelector('.intro__slider-arrow--prev')
            },
            init: false,
            on: {
                init: swiper => {
                    setActiveLinkLayer(swiper.realIndex);
                    paginationSlider.slideTo(swiper.realIndex);
                    videoSlider.slideTo(swiper.realIndex);

                    console.log('Real index', swiper.realIndex);
                },
                slideChange: swiper => {
                    setActiveLinkLayer(swiper.realIndex);
                    paginationSlider.slideTo(swiper.realIndex);
                    videoSlider.slideTo(swiper.realIndex);

                    console.log('Real index', swiper.realIndex);
                },
                slideNextTransitionStart: swiper => {},
                slidePrevTransitionStart: swiper => {
                    // paginationSlider.slideTo(swiper.realIndex);
                    // videoSlider.slideTo(swiper.realIndex);
                }
            }
        });

        mainSlider.init();

        if (element.hasAttribute('data-initial-slide')) {
            const initialSlide = Number(element.getAttribute('data-initial-slide'));

            mainSlider.slideTo(initialSlide, 0);
        }

        // videoSlider.init();

        // mainSlider.controller.control = [videoSlider];
    });
}
