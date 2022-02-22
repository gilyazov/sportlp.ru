import { Swiper, Pagination, EffectFade } from 'swiper';
import { primaryInput } from 'detect-it';
Swiper.use([Pagination, EffectFade]);

export default function catalogCardsSliders() {
    const initializeCatalogCardsSliders = () => {
        const elements = Array.from(document.querySelectorAll('.catalog-card'));

        elements.forEach(element => {
            const container = element.querySelector('.swiper-container');

            const DEBUG = false;
            if (!container) {
                console.error('No swiper container in card', card);
                return;
            }

            let trackingCursor = false;
            let currentSlideIndex;

            const instance = new Swiper(container, {
                watchOverflow: true,

                speed: 500,
                longSwipesRatio: 0.25,
                allowTouchMove: primaryInput === 'touch' ? true : false,
                effect: 'fade',
                fadeEffect: {
                    crossFade: false
                },
                pagination: {
                    el: element.querySelector('.catalog-card__image-slider-pagination'),
                    type: 'bullets',
                    clickable: true
                }
            });

            const slidesCount = instance.slides.length;

            container.addEventListener('mouseenter', () => {
                trackingCursor = true;
            });
            container.addEventListener('mouseleave', () => {
                trackingCursor = false;
                instance.slideTo(0);
            });

            container.addEventListener('mousemove', e => {
                if (!trackingCursor) return;
                e.stopPropagation();

                const rect = e.currentTarget.getBoundingClientRect();
                const offsetX = parseInt(e.clientX - rect.left, 10);

                const width = e.currentTarget.offsetWidth;

                const progress = Math.ceil((offsetX / width) * slidesCount);
                let activeSlideIndex = progress - 1;

                if (DEBUG) {
                    console.log({
                        activeSlideIndex,
                        progress,
                        offsetX
                    });
                }

                if (activeSlideIndex !== currentSlideIndex) {
                    instance.slideTo(activeSlideIndex);
                }
            });
        });
    };

    window.initializeCatalogCardsSliders = initializeCatalogCardsSliders;

    initializeCatalogCardsSliders();
}
