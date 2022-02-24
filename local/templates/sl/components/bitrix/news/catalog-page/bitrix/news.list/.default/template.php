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
<ul class="catalog-page__results-list">
    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <li class="catalog-page__results-list-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
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
                                <div class="swiper-slide">
                                    <div class="catalog-card__image-slider-card">
                                        <img data-src="<?=Sl\Core\Tools::resizeImage($arItem["PREVIEW_PICTURE"]["ID"], 150, 150)?>" alt=""
                                             class="catalog-card__image-slider-image lazyload">
                                    </div>
                                </div>
                                <?foreach ($arItem["PROPERTIES"]["ATT_PHOTO"]["VALUE"] as $photo):?>
                                    <div class="swiper-slide">
                                        <div class="catalog-card__image-slider-card">
                                            <img data-src="<?=Sl\Core\Tools::resizeImage($photo, 150, 150)?>" alt=""
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
                        Продолжительная служба батареи
                    </div>
                </div>
                <div class="catalog-card__stats">
                    <div class="catalog-card__stats-item">
                        <div class="catalog-card__stats-key">
                            <svg width="14" height="14" aria-hidden="true" class="icon-area">
                                <use xlink:href="#area"></use>
                            </svg>
                            Площадь заливки
                        </div>
                        <div class="catalog-card__stats-value">
                            <?=$arItem["PROPERTIES"]["ATT_AREA_SURFACES"]["VALUE"] ?> м²
                        </div>
                    </div>
                    <div class="catalog-card__stats-item">
                        <div class="catalog-card__stats-key">
                            <svg width="14" height="14" aria-hidden="true" class="icon-water">
                                <use xlink:href="#water"></use>
                            </svg>
                            Ёмкость для воды
                        </div>
                        <div class="catalog-card__stats-value">
                            <?=$arItem["PROPERTIES"]["ATT_WATER_TANK"]["VALUE"] ?>
                        </div>
                    </div>
                    <div class="catalog-card__stats-item">
                        <div class="catalog-card__stats-key">
                            <svg width="14" height="14" aria-hidden="true" class="icon-snow">
                                <use xlink:href="#snow"></use>
                            </svg>
                            Ёмкость для снега
                        </div>
                        <div class="catalog-card__stats-value">
                            <?=$arItem["PROPERTIES"]["ATT_HOPPER_VOLUME"]["VALUE"] ?>
                        </div>
                    </div>
                </div>
                <div class="catalog-card__btns">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="blue-small-btn catalog-card__details-btn">
                        Смотреть <span class="hide-on-mobile">модель</span>
                    </a>
                    <a href="#" class="catalog-card__like-btn">
                        <svg width="14" height="14" aria-hidden="true" class="icon-heart">
                            <use xlink:href="#heart"></use>
                        </svg>
                    </a>
                    <a href="#" class="catalog-card__fav-btn">
                        <svg width="14" height="14" aria-hidden="true" class="icon-comparisons">
                            <use xlink:href="#comparisons"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </li>

        <?if($key == 2):?>
            <li class="catalog-page__results-special-item">
                        <div class="catalog-page__help">
                            <h4 class="catalog-page__help-heading">
                                Поможем с выбором техники под ваши цели!
                            </h4>

                            <form action="#" class="catalog-page__help-form" data-need-validation="">
                                <div class="catalog-page__help-form-input-wrapper">
                                    <input type="text" name="name"
                                        class="text-input text-input--small text-input--white" required=""
                                        placeholder="Ваше имя">
                                </div>
                                <div class="catalog-page__help-form-input-wrapper">
                                    <input type="tel" name="phone"
                                        class="text-input text-input--small text-input--white js-phone-input"
                                        required="" data-parsley-phone="" placeholder="+7 000 000-00-00">
                                </div>
                                <button type="submit"
                                    class="blue-small-btn blue-small-btn--orange catalog-page__help-submit">
                                    Отправить
                                </button>
                            </form>
                        </div>
                    </li>
        <?endif;?>
    <?endforeach;?>

    <li class="catalog-page__results-special-item">
        <div class="promo__card promo__card--compact">
            <picture>
                <source data-srcset="<?=STATIC_PATH?>img/umka-mobile.jpg" media="(max-width: 640px)">
                <img data-src="<?=STATIC_PATH?>img/umka-compact.jpg" alt="" class="promo__card-image lazyload">
            </picture>
            <h2 class="promo__card-heading">
                УМКА — универсальная машина для обслуживания катков и решения коммунальных задач
            </h2>
            <ul class="promo__advantages-list">
                <li class="promo__advantages-item">
                    <img src="<?=STATIC_PATH?>img/promo/1.svg" alt="" class="promo__advantages-icon">
                    <div class="promo__advantages-content">
                        <div class="promo__advantages-text">
                            Привлекательная цена
                        </div>
                    </div>
                </li>
                <li class="promo__advantages-item">
                    <img src="<?=STATIC_PATH?>img/promo/2.svg" alt="" class="promo__advantages-icon">

                    <div class="promo__advantages-content">
                        <div class="promo__advantages-text">
                            Наличие кабины
                        </div>
                    </div>
                </li>
                <li class="promo__advantages-item">
                    <img src="<?=STATIC_PATH?>img/promo/3.svg" alt="" class="promo__advantages-icon">
                    <div class="promo__advantages-content">
                        <div class="promo__advantages-text">
                            3 года гарантии
                        </div>
                    </div>
                </li>

            </ul>
            <div class="promo__btns">


                <a href="#" class="small-arrow-btn-filled small-arrow-btn-filled--orange promo__btn">
                    Смотреть модель
                    <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                        <use xlink:href="#diagonal-arrow"></use>
                    </svg>
                </a>
                <a href="#" class="arrow-btn arrow-btn--white promo__all-specs-btn">
                    Все характеристики
                </a>
            </div>
        </div>
    </li>
</ul>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?>
<?endif;?>

