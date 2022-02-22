<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="product-intro__row">
    <div class="product-intro__col">
        <div class="product-intro__gallery js-product-gallery-slider">
            <div class="product-intro__gallery-main">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?foreach ($arResult["PROPERTIES"]["ATT_PHOTO"]["VALUE"] as $photo):?>
                            <div class="swiper-slide">
                                <div class="product-intro__gallery-main-card">
                                    <img src="<?=Sl\Core\Tools::resizeImage($photo, 800, 500, true)?>" alt=""
                                         class="product-intro__gallery-main-card-image">
                                </div>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
            <div class="product-intro__gallery-thumbs">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?foreach ($arResult["PROPERTIES"]["ATT_PHOTO"]["VALUE"] as $photo):?>
                            <div class="swiper-slide">
                                <div class="product-intro__gallery-thumbs-card">
                                    <img src="<?=Sl\Core\Tools::resizeImage($photo, 100, 100)?>" alt=""
                                         class="product-intro__gallery-thumbs-card-image">
                                </div>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
            <div class="product-intro__gallery-arrows">
                <button class="product-intro__gallery-arrow product-intro__gallery-arrow--prev">
                    <svg width="14" height="14" aria-hidden="true" class="icon-arrow-left">
                        <use xlink:href="#arrow-left"></use>
                    </svg>
                </button>
                <button class="product-intro__gallery-arrow product-intro__gallery-arrow--next">
                    <svg width="14" height="14" aria-hidden="true" class="icon-arrow-right">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </button>
            </div>
            <div class="slider-pagination product-intro__gallery-pagination">

            </div>
        </div>
    </div>
    
    <div class="product-intro__col">
        <div class="product-intro__info">
            <div class="product-intro__categories">
                <div class="product-intro__category product-intro__category--bestseller">
                    <svg width="14" height="14" aria-hidden="true" class="icon-cup">
                        <use xlink:href="#cup"></use>
                    </svg>
                    хит-продаж
                </div>
            </div>
            <div class="product-intro__rating">

                <div class="product-intro__rating-stars">
                    <svg width="14" height="14" aria-hidden="true" class="icon-star">
                        <use xlink:href="#star"></use>
                    </svg>
                    <svg width="14" height="14" aria-hidden="true" class="icon-star">
                        <use xlink:href="#star"></use>
                    </svg>
                    <svg width="14" height="14" aria-hidden="true" class="icon-star">
                        <use xlink:href="#star"></use>
                    </svg>
                    <svg width="14" height="14" aria-hidden="true" class="icon-star">
                        <use xlink:href="#star"></use>
                    </svg>
                    <svg width="14" height="14" aria-hidden="true" class="icon-star">
                        <use xlink:href="#star"></use>
                    </svg>
                </div>
                <div class="product-intro__rating-reviews">
                    10 отзывов
                </div>

            </div>
        </div>
        <h1 class="product-intro__main-title">
            <?=$arResult["NAME"]?>
        </h1>
        <div class="product-intro__features">
            <div class="product-intro__feature">
                <svg width="14" height="14" aria-hidden="true" class="icon-fuel">
                    <use xlink:href="#fuel"></use>
                </svg>
                Бензин
            </div>
            <div class="product-intro__feature">
                <svg width="14" height="14" aria-hidden="true" class="icon-size">
                    <use xlink:href="#size"></use>
                </svg>
                Для стандартных катков
            </div>
        </div>
        <div class="product-intro__description">
            <p>
                Предназначена для использования в более жестких условиях эксплуатации.
            </p>
        </div>
        <div class="product-intro__buttons">
            <a href="#" class="arrow-btn-filled">
                Оставить заявку
                <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                    <use xlink:href="#diagonal-arrow"></use>
                </svg>
            </a>
            <a href="#" class="outline-btn outline-btn--large">
                <svg width="14" height="14" aria-hidden="true" class="icon-heart">
                    <use xlink:href="#heart"></use>
                </svg>
            </a>
            <a href="#" class="outline-btn outline-btn--large js-comparison-btn">
                <svg width="14" height="14" aria-hidden="true" class="icon-comparisons">
                    <use xlink:href="#comparisons"></use>
                </svg>
            </a>
        </div>
    </div>
</div>