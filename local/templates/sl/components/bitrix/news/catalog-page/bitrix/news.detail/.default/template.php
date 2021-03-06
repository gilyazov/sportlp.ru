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
            <?if($arResult["PROPERTIES"]["BADGE"]["VALUE"] && ($arBadge = $arResult["PROPERTIES"]["BADGE"])):?>
                <div class="product-intro__categories">
                    <div class="product-intro__category product-intro__category--<?=$arBadge["VALUE_XML_ID"]?>">
                        <svg width="14" height="14" aria-hidden="true" class="icon-<?=$arBadge["VALUE_XML_ID"]?>">
                            <use xlink:href="#<?=$arBadge["VALUE_XML_ID"]?>"></use>
                        </svg>
                        <?=$arBadge["VALUE"]?>
                    </div>
                </div>
            <?endif;?>
            <div class="product-intro__rating">
                <?if($arResult["PROPERTIES"]["rating"]["VALUE"]):?>
                    <?$rating = ceil($arResult["PROPERTIES"]["rating"]["VALUE"]/0.5)*0.5;?>
                    <div class="product-intro__rating-stars">
                        <?for($i=1;$i<=$rating;$i++){?>
                            <svg width="14" height="14" aria-hidden="true" class="icon-star">
                                <use xlink:href="#star"></use>
                            </svg>
                        <?}?>

                        <?if(is_decimal($rating)):?>
                            <svg width="14" height="14" aria-hidden="true" class="icon-star">
                                <use xlink:href="#halfstar"></use>
                            </svg>
                        <?endif;?>
                    </div>
                <?endif;?>
                <?if(($count = count($arResult["PROPERTIES"]["vote_count"]["VALUE"])) && $arResult["PROPERTIES"]["vote_count"]["VALUE"]):?>
                    <div class="product-intro__rating-reviews">
                        <?=\Sl\Core\Tools::declOfNum($count, ["??????????", "????????????", "??????????????"])?>
                    </div>
                <?endif;?>
            </div>
        </div>
        <h1 class="product-intro__main-title">
            <?=$arResult["NAME"]?>
        </h1>
        <?if($price = $arResult["PROPERTIES"]["PRICE"]["VALUE"]):?>
            <span class="product-intro__price"><?=number_format($price, 0, ',', ' ' )?> ???</span>
        <?endif;?>
        <div class="product-intro__features">
            <div class="product-intro__feature">
                <svg width="14" height="14" aria-hidden="true" class="icon-<?=$arResult["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE_XML_ID"]?>">
                    <use xlink:href="#<?=$arResult["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE_XML_ID"]?>"></use>
                </svg>
                <?=$arResult["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE"]?>
            </div>
            <div class="product-intro__feature">
                <svg width="14" height="14" aria-hidden="true" class="icon-size">
                    <use xlink:href="#size"></use>
                </svg>
                <?=$arResult["PROPERTIES"]["ATT_APPOINTMENT"]["VALUE"]?>
            </div>
        </div>
        <div class="product-intro__description">
            <p>
                <?=$arResult["PROPERTIES"]["INTRO_DESCRIPTION"]["VALUE"]?>
            </p>
        </div>
        <div class="product-intro__buttons">
            <a href="#callback-modal" class="arrow-btn-filled js-open-modal">
                ???????????????? ????????????
                <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                    <use xlink:href="#diagonal-arrow"></use>
                </svg>
            </a>
            <!--<a href="#" class="outline-btn outline-btn--large">
                <svg width="14" height="14" aria-hidden="true" class="icon-heart">
                    <use xlink:href="#heart"></use>
                </svg>
            </a>-->
            <a href="#" class="outline-btn outline-btn--large js-comparison-btn" data-id="<?=$arResult["ID"]?>">
                <svg width="14" height="14" aria-hidden="true" class="icon-comparisons">
                    <use xlink:href="#comparisons"></use>
                </svg>
            </a>
        </div>
    </div>
</div>