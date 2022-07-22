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
<?
//echo "<pre>";
//print_r($arItem["PROPERTIES"]["ATT_TYPE_FUEL"]);
//echo "</pre>";
?>
<div class="catalog-page__main">
    <ul class="catalog-page__brand-list">
        <?foreach($arResult["SECTIONS"] as $key => $arBrand):?>
            <li class="catalog-page__brand-list-item">
                <div class="brand-block js-brand-block">
                    <div class="brand-block__info">
                        <div class="brand-block__info-bg">
                            <img src="<?=Sl\Core\Tools::resizeImage($arBrand["PREVIEW_PICTURE"], 1920, 550)?>" alt="" class="brand-block__info-bg-image">
                        </div>
                        <div class="brand-block__info-content">
                            <h3 class="brand-block__heading">
                                <?=$arBrand["NAME"]?>
                            </h3>
                            <div class="brand-block__text">
                                <p>
                                    <?=$arBrand["PREVIEW_TEXT"]?>
                                </p>
                            </div>
                        </div>
                        <div class="brand-block__info-category">
                            <?=$arBrand["PROPERTY_ADVANTAGE_VALUE"]?>
                        </div>
                    </div>
                    <div class="brand-block__slider">
                        <button class="brand-block__slider-arrow brand-block__slider-arrow--prev">
                            <svg width="14" height="14" aria-hidden="true" class="icon-arrow-left">
                                <use xlink:href="#arrow-left"></use>
                            </svg>
                        </button>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?foreach($arBrand["ITEMS"] as $arItem):?>
                                    <?
                                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                    ?>
                                    <div class="swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                        <div class="catalog-card">
                                            <?if($arItem["PROPERTIES"]["BADGE"]["VALUE"] && ($arBadge = $arItem["PROPERTIES"]["BADGE"])):?>
                                                <div class="catalog-card__label catalog-card__label--<?=$arBadge["VALUE_XML_ID"]?>">
                                                    <svg width="14" height="14" aria-hidden="true" class="icon-<?=$arBadge["VALUE_XML_ID"]?>">
                                                        <use xlink:href="#<?=$arBadge["VALUE_XML_ID"]?>"></use>
                                                    </svg>
                                                    <?=$arBadge["VALUE"]?>
                                                </div>
                                            <?endif;?>

                                            <div class="catalog-card__top-row">
                                                <div class="catalog-card__image-slider">
                                                    <div class="swiper-container">
                                                        <div class="swiper-wrapper">
                                                            <?if($arItem["PREVIEW_PICTURE"]):?>
                                                                <div class="swiper-slide">
                                                                    <div class="catalog-card__image-slider-card">
                                                                        <img data-src="<?=Sl\Core\Tools::resizeImage($arItem["PREVIEW_PICTURE"]["ID"], 150, 150, true)?>" alt=""
                                                                             class="catalog-card__image-slider-image lazyload">
                                                                    </div>
                                                                </div>
                                                            <?endif;?>
                                                            <?foreach ($arItem["PROPERTIES"]["ATT_PHOTO"]["VALUE"] as $photo):?>
                                                                <div class="swiper-slide">
                                                                    <div class="catalog-card__image-slider-card">
                                                                        <img data-src="<?=Sl\Core\Tools::resizeImage($photo, 150, 150, true)?>" alt=""
                                                                             class="catalog-card__image-slider-image lazyload">
                                                                    </div>
                                                                </div>
                                                            <?endforeach;?>
                                                        </div>
                                                    </div>
                                                    <div class="catalog-card__image-slider-pagination">

                                                    </div>
                                                </div>
                                                <div class="catalog-card__info">
                                                    <?if($arItem["PROPERTIES"]["BRAND"]["VALUE"]):?>
                                                        <div class="catalog-card__country">
                                                            <?=$arItem["PROPERTIES"]["BRAND"]["DETAIL"]["PROPERTIES"]["COUNTRY"]["VALUE"]?>
                                                            <img data-src="<?=STATIC_PATH?>img/flags/<?=$arItem["PROPERTIES"]["BRAND"]["DETAIL"]["PROPERTIES"]["COUNTRY"]["VALUE_XML_ID"]?>.svg" alt=""
                                                                 class="catalog-card__country-flag lazyload">
                                                        </div>
                                                    <?endif;?>
                                                    <div class="catalog-card__rating">
                                                        <svg width="14" height="14" aria-hidden="true" class="icon-star">
                                                            <use xlink:href="#star"></use>
                                                        </svg>
                                                        5
                                                    </div>
                                                    <div class="catalog-card__reviews">
                                                        10 отзывов
                                                    </div>


                                                    <div class="catalog-card__tags">
                                                        <div class="catalog-card__tag">
                                                            <svg width="14" height="14" aria-hidden="true" class="icon-<?=$arItem["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE_XML_ID"]?>">
                                                                <use xlink:href="#<?=$arItem["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE_XML_ID"]?>"></use>
                                                            </svg>
                                                            <?=$arItem["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE"]?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="catalog-card__main-content">
                                                <h4 class="catalog-card__title">
                                                    <?=$arItem["NAME"]?>
                                                </h4>
                                                <div class="catalog-card__description">
                                                    <?=$arItem["PROPERTIES"]["DESTINATION"]["VALUE"]?>
                                                </div>
                                            </div>
                                            <div class="catalog-card__stats">
                                                <?if($arItem["PROPERTIES"]["ATT_AREA_SURFACES"]["VALUE"]):?>
                                                    <div class="catalog-card__stats-item">
                                                        <div class="catalog-card__stats-key">
                                                            <svg width="14" height="14" aria-hidden="true" class="icon-area">
                                                                <use xlink:href="#area"></use>
                                                            </svg>
                                                            <span class="catalog-card__stats-key-text">
                                    Площадь заливки
                                </span>
                                                        </div>
                                                        <div class="catalog-card__stats-value">
                                                            <?=number_format($arItem["PROPERTIES"]["ATT_AREA_SURFACES"]["VALUE"], 0, ',', ' ' );?> м²
                                                        </div>
                                                    </div>
                                                <?endif;?>
                                                <?if($arItem["PROPERTIES"]["ATT_WATER_TANK"]["VALUE"]):?>
                                                    <div class="catalog-card__stats-item">
                                                        <div class="catalog-card__stats-key">
                                                            <svg width="14" height="14" aria-hidden="true" class="icon-water">
                                                                <use xlink:href="#water"></use>
                                                            </svg>
                                                            <span class="catalog-card__stats-key-text">
                                    Ёмкость для воды
                                </span>
                                                        </div>
                                                        <div class="catalog-card__stats-value">
                                                            <?=number_format($arItem["PROPERTIES"]["ATT_WATER_TANK"]["VALUE"], 0, ',', ' ' );?> л.
                                                        </div>
                                                    </div>
                                                <?endif;?>
                                                <?if($arItem["PROPERTIES"]["ATT_HOPPER_VOLUME"]["VALUE"]):?>
                                                    <div class="catalog-card__stats-item">
                                                        <div class="catalog-card__stats-key">
                                                            <svg width="14" height="14" aria-hidden="true" class="icon-snow">
                                                                <use xlink:href="#snow"></use>
                                                            </svg>
                                                            <span class="catalog-card__stats-key-text">
                                    Ёмкость для снега
                                </span>
                                                        </div>
                                                        <div class="catalog-card__stats-value">
                                                            <?=$arItem["PROPERTIES"]["ATT_HOPPER_VOLUME"]["VALUE"]?> м³
                                                        </div>
                                                    </div>
                                                <?endif;?>
                                            </div>
                                            <?if($price = $arItem["PROPERTIES"]["PRICE"]["VALUE"]):?>
                                                <span class="catalog-card__price"><?=number_format($price, 0, ',', ' ' )?> ₽</span>
                                            <?endif;?>
                                            <div class="catalog-card__btns">
                                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="blue-small-btn catalog-card__details-btn">
                                                    Смотреть <span class="hide-on-mobile">модель</span>
                                                </a>
                                                <!--<a href="#" class="catalog-card__like-btn">
                                                    <svg width="14" height="14" aria-hidden="true" class="icon-heart">
                                                        <use xlink:href="#heart"></use>
                                                    </svg>
                                                </a>-->
                                                <a href="#" class="catalog-card__fav-btn js-comparison-btn" data-id="<?=$arItem["ID"]?>">
                                                    <svg width="14" height="14" aria-hidden="true" class="icon-comparisons">
                                                        <use xlink:href="#comparisons"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?endforeach;?>
                            </div>
                        </div>
                        <button class="brand-block__slider-arrow brand-block__slider-arrow--next">
                            <svg width="14" height="14" aria-hidden="true" class="icon-arrow-right">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="slider-pagination brand-block__pagination">

                    </div>
                </div>
            </li>
        <?endforeach;?>
    </ul>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?>
<?endif;?>

