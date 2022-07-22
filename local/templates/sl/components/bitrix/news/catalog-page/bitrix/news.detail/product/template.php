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
/*echo "<pre>";
print_r($arResult);
echo "</pre>";*/
?>
<section class="product-advantages">
    <div class="container">
        <ul class="product-advantages__list">
            <?foreach ($arResult["PROPERTIES"]["BENEFITS"]["VALUE"] as $arBenefit):?>
                <li class="product-advantages__list-item">
                    <div class="product-advantages__card">
                        <img src="<?=STATIC_PATH?>img/product-advantages/<?=$arBenefit["SUB_VALUES"]["BENEFITS_ICO"]["VALUE_XML_ID"]?>.svg" alt="" class="product-advantages__card-icon">
                        <?=$arBenefit["SUB_VALUES"]["BENEFITS_TITLE"]["VALUE"]?>
                    </div>
                </li>
            <?endforeach;?>
        </ul>
    </div>
</section>

<section class="product-specs">
    <div class="container">
        <div class="product-specs__row">
            <?if($arVideo = $arResult["PROPERTIES"]["VIDEO"]["VALUE"]):?>
                <div class="product-specs__col">
                    <a href="<?=$arVideo["SUB_VALUES"]["VIDEO_LINK"]["VALUE"]?>" class="product-specs__video" data-fancybox="review">
                        <div class="product-specs__video-preview">
                            <img src="<?=Sl\Core\Tools::resizeImage($arVideo["SUB_VALUES"]["VIDEO_PREVIEW"]["VALUE"], 1750, 1080)?>" alt=""
                                 class="product-specs__video-preview-image">
                        </div>
                        <div class="product-specs__video-duration">
                            <?=$arVideo["SUB_VALUES"]["VIDEO_DURATION"]["VALUE"]?>
                        </div>
                        <h4 class="product-specs__video-title">
                            <span>
                                <?=$arVideo["SUB_VALUES"]["VIDEO_CAPTION"]["~VALUE"]?>
                            </span>
                        </h4>
                        <div class="product-specs__video-play">
                            <svg width="14" height="14" aria-hidden="true" class="icon-play">
                                <use xlink:href="#play"></use>
                            </svg>
                        </div>
                    </a>
                </div>
            <?endif;?>
            <div class="product-specs__col">
                <ul class="product-specs__list">
                    <li class="product-specs__list-item">
                        <div class="product-specs__card">
                            <div class="product-specs__amount">
                                <?=number_format($arResult["PROPERTIES"]["ATT_AREA_SURFACES"]["VALUE"], 0, ',', ' ' );?> м²
                            </div>
                            <div class="product-specs__text">
                                площадь заливки
                            </div>
                        </div>
                    </li>
                    <li class="product-specs__list-item">
                        <div class="product-specs__card">
                            <div class="product-specs__amount">
                                <?=$arResult["PROPERTIES"]["ATT_HOPPER_VOLUME"]["VALUE"]?>
                            </div>
                            <div class="product-specs__text">
                                ёмкость для снега
                            </div>
                        </div>
                    </li>
                    <li class="product-specs__list-item">
                        <div class="product-specs__card">
                            <div class="product-specs__amount">
                                <?=number_format($arResult["PROPERTIES"]["ATT_WATER_TANK"]["VALUE"], 0, ',', ' ' )?>
                            </div>
                            <div class="product-specs__text">
                                ёмкость для заливки льда
                            </div>
                        </div>
                    </li>
                    <?if($arResult["PROPERTIES"]["ATT_ICE_WASHING_WATER"]["VALUE"]):?>
                        <li class="product-specs__list-item">
                            <div class="product-specs__card">
                                <div class="product-specs__amount">
                                    <?=number_format($arResult["PROPERTIES"]["ATT_ICE_WASHING_WATER"]["VALUE"], 0, ',', ' ' )?> л
                                </div>
                                <div class="product-specs__text">
                                    ёмкость для мойки льда
                                </div>
                            </div>
                        </li>
                    <?endif;?>
                </ul>
                <div class="product-specs__description">
                    <p>
                        <?=$arResult["PROPERTIES"]["KEY_DESCRIPTION"]["VALUE"]?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-details js-product-tabs">
    <div class="container">
        <div class="product-details__tabs-nav">
            <ul class="product-details__tabs-nav-list">
                <li class="product-details__tabs-nav-list-item">
                    <a href="#" class="product-details__tabs-nav-link active">
                        <span>
                            Характеристики
                        </span>
                    </a>
                </li>
                <li class="product-details__tabs-nav-list-item">
                    <a href="#" class="product-details__tabs-nav-link">
                        <span>
                            Комплектация
                        </span>
                    </a>
                </li>
                <?if($arResult["REVIEWS"]):?>
                    <li class="product-details__tabs-nav-list-item">
                        <a href="#" class="product-details__tabs-nav-link">
                            <span>
                                Отзывы
                            </span>
                        </a>
                    </li>
                <?endif;?>
                <!--<li class="product-details__tabs-nav-list-item">
                    <a href="#" class="product-details__tabs-nav-link">
                        <span>
                            Вопрос-ответ
                        </span>
                    </a>
                </li>-->
            </ul>
        </div>
        <div class="product-details__tab-items">
            <div class="product-details__tab-item active">
                <div class="product-details__illustrations js-product-illustrations-slider">
                    <div class="swiper-container product-details__illustrations-slider">
                        <ul class="swiper-wrapper product-details__illustrations-list">
                            <?foreach ($arResult["PROPERTIES"]["FEATURES"]["VALUE"] as $feature):?>
                                <li class="swiper-slide product-details__illustrations-list-item">
                                    <img src="<?=Sl\Core\Tools::resizeImage($feature, 570, 568, true)?>" alt="" class="product-details__illustration">
                                </li>
                            <?endforeach;?>
                        </ul>
                    </div>
                    <div class="slider-pagination product-details__pagination">

                    </div>
                </div>
                <div class="product-details__specs">
                    <div class="product-details__specs-block">
                        <h4 class="product-details__specs-block-title">
                            <svg width="14" height="14" aria-hidden="true" class="icon-wheel">
                                <use xlink:href="#wheel"></use>
                            </svg>
                            Ходовые характеристики
                        </h4>
                        <table class="product-details__specs-table">
                            <tbody>
                                <tr>
                                    <th>
                                        Мощность, л.с.
                                    </th>
                                    <td>
                                        <?=$arResult["PROPERTIES"]["ATT_POWER"]["VALUE"]?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Тип привода
                                    </th>
                                    <td>
                                        <?=$arResult["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE"]?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product-details__specs-block">
                        <h4 class="product-details__specs-block-title">
                            <svg width="14" height="14" aria-hidden="true" class="icon-weight">
                                <use xlink:href="#weight"></use>
                            </svg>
                            Вес
                        </h4>
                        <table class="product-details__specs-table">
                            <tbody>
                                <tr>
                                    <th>
                                        Пустой машины, кг.
                                    </th>
                                    <td>
                                        <?=$arResult["PROPERTIES"]["ATT_EMPTY_CAR_WEIGHT"]["VALUE"]?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Полностью загруженной машины, кг.
                                    </th>
                                    <td>
                                        <?=$arResult["PROPERTIES"]["ATT_FULLY_MACHINE_WEIGHT"]["VALUE"]?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <?if($file = $arResult["PROPERTIES"]["ATT_LINK_CATALOG"]["VALUE"]):?>
                        <?$arFile = CFile::GetFileArray($file);?>
                        <a href="<?=$arFile["SRC"]?>" class="product-details__materials-card">
                            <h4 class="product-details__materials-card-title">
                                Презентационные материалы
                            </h4>
                            <div class="product-details__materials-card-year">
                                2022
                            </div>
                            <img src="<?=STATIC_PATH?>img/material-card-1.png" alt="" class="product-details__materials-card-image">
                            <div class="product-details__materials-card-text">
                                <span>
                                    Презентационные материалы
                                </span>
                            </div>
                            <div class="product-details__materials-card-size">
                                <?=pathinfo($arFile['ORIGINAL_NAME'], PATHINFO_EXTENSION)?>, <?=CFile::FormatSize($arFile['FILE_SIZE'])?>
                            </div>
                            <svg width="14" height="14" aria-hidden="true" class="icon-download">
                                <use xlink:href="#download"></use>
                            </svg>
                        </a>
                    <?endif;?>

                    <?if($file = $arResult["PROPERTIES"]["TECHNICAL_DOCUMENTATION"]["VALUE"]):?>
                        <?$arFile = CFile::GetFileArray($file);?>
                        <a href="<?=$arFile["SRC"]?>"
                           class="product-details__materials-card product-details__materials-card--orange" download="">
                            <h4 class="product-details__materials-card-title">
                                Презентационные материалы
                            </h4>
                            <div class="product-details__materials-card-year">
                                2022
                            </div>
                            <img src="<?=STATIC_PATH?>img/material-card-2.png" alt="" class="product-details__materials-card-image">
                            <div class="product-details__materials-card-text">
                                <span>
                                    Презентационные материалы
                                </span>
                            </div>
                            <div class="product-details__materials-card-size">
                                <?=pathinfo($arFile['ORIGINAL_NAME'], PATHINFO_EXTENSION)?>, <?=CFile::FormatSize($arFile['FILE_SIZE'])?>
                            </div>
                            <svg width="14" height="14" aria-hidden="true" class="icon-download">
                                <use xlink:href="#download"></use>
                            </svg>
                        </a>
                    <?endif;?>
                </div>
            </div>
            <div class="product-details__tab-item">
                <div class="product-details__complectation">
                    <div class="product-details__complectation-card">
                        <img src="<?=STATIC_PATH?>img/plane.svg" alt="" class="product-details__complectation-card-icon">
                        <h4 class="product-details__complectation-card-title">
                            Стандартная комплектация
                        </h4>
                        <div class="product-details__complectation-card-description">
                            <p>
                                Перечень оборудования входящий в стандартную комплектацию модели
                            </p>
                        </div>

                        <ul class="product-details__complectation-card-list">
                            <?foreach ($arResult["COMPLETE"] as $code):?>
                                <?
                                if ($arResult["PROPERTIES"][$code]["VALUE"] != "наличие")
                                    continue;
                                ?>
                                <li class="product-details__complectation-card-list-item">
                                    <div class="product-details__complectation-card-list-text">
                                        <?=$arResult["PROPERTIES"][$code]["NAME"]?>
                                        <?if($hint = $arResult["PROPERTIES"][$code]["HINT"]):?>
                                            <span class="product-details__complectation-card-info">
                                                <span class="product-details__complectation-card-info-icon">
                                                    <svg width="14" height="14" aria-hidden="true" class="icon-notice">
                                                        <use xlink:href="#notice"></use>
                                                    </svg>
                                                    <span class="product-details__complectation-card-info-dropdown">
                                                        <span class="product-details__complectation-card-info-dropdown-inner">
                                                            <?=$hint?>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        <?endif;?>
                                    </div>

                                    <svg width="14" height="14" aria-hidden="true" class="icon-list-checkmark">
                                        <use xlink:href="#list-checkmark"></use>
                                    </svg>
                                </li>
                            <?endforeach;?>
                        </ul>

                        <a href="#" class="arrow-btn product-details__complectation-card-show-all">
                            Показать весь список
                        </a>
                    </div>
                    <div class="product-details__complectation-card">
                        <img src="<?=STATIC_PATH?>img/rocket.svg" alt="" class="product-details__complectation-card-icon">
                        <h4 class="product-details__complectation-card-title">
                            Дополнительные опции
                        </h4>
                        <div class="product-details__complectation-card-description">
                            <p>
                                Вы можете расширить возможности вашей будущей ледозаливочной машины
                            </p>
                        </div>

                        <ul class="product-details__complectation-card-list">
                            <?foreach ($arResult["COMPLETE"] as $code):?>
                                <?
                                if ($arResult["PROPERTIES"][$code]["VALUE"] != "опция")
                                    continue;
                                ?>
                                <li class="product-details__complectation-card-list-item">
                                    <div class="product-details__complectation-card-list-text">
                                        <?=$arResult["PROPERTIES"][$code]["NAME"]?>
                                        <?if($hint = $arResult["PROPERTIES"][$code]["HINT"]):?>
                                            <span class="product-details__complectation-card-info">
                                                <span class="product-details__complectation-card-info-icon">
                                                    <svg width="14" height="14" aria-hidden="true" class="icon-notice">
                                                        <use xlink:href="#notice"></use>
                                                    </svg>
                                                    <span class="product-details__complectation-card-info-dropdown">
                                                        <span class="product-details__complectation-card-info-dropdown-inner">
                                                            <?=$hint?>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        <?endif;?>
                                    </div>

                                    <svg width="14" height="14" aria-hidden="true" class="icon-list-plus">
                                        <use xlink:href="#list-plus"></use>
                                    </svg>
                                </li>
                            <?endforeach;?>
                        </ul>

                        <a href="#callback-modal" class="blue-btn product-details__complectation-expert-btn js-open-modal">
                            Обсудить с экспертом
                        </a>
                    </div>
                    <div class="product-details__complectation-image-block">
                        <img src="<?=Sl\Core\Tools::resizeImage($arResult["PREVIEW_PICTURE"]["ID"], 1140, 700, true)?>" alt="" class="product-details__complectation-image">
                        <h4 class="product-details__complectation-image-block-title">
                            <?=$arResult["NAME"]?>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="product-details__tab-item">
                <div class="product-details__reviews">
                    <!--<div class="product-details__reviews-text">
                        <p>
                            Отзывы собраны на основе комментариев клиентов использующих данную модель
                        </p>
                    </div>-->
                    <ul class="product-details__reviews-list">
                        <?foreach ($arResult["REVIEWS"] as $arReview):?>
                            <li class="product-details__reviews-list-item">
                                <div class="product-details__reviews-card">
                                    <img src="<?=STATIC_PATH?>img/quote.svg" alt="" class="product-details__reviews-card-icon">
                                    <div class="product-details__reviews-card-rating">
                                        <svg width="14" height="14" aria-hidden="true" class="icon-star">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                        <?=$arReview["PROPERTY_RATING_VALUE"]?>
                                    </div>
                                    <div class="product-details__reviews-card-content">
                                        <h4 class="product-details__reviews-card-title">
                                            <?=$arReview["NAME"]?>
                                        </h4>
                                        <div class="product-details__reviews-card-text">
                                            <p>
                                                <?=$arReview["PREVIEW_TEXT"]?>
                                            </p>
                                        </div>
                                    </div>

                                    <?if($author = $arReview["PROPERTY_AUTHOR_VALUE"]["SUB_VALUES"]):?>
                                        <div class="product-details__reviews-card-author">
                                            <div class="product-details__reviews-card-author-content">
                                                <div class="product-details__reviews-card-author-name">
                                                    <?=$author["A_FIO"]["VALUE"]?>
                                                </div>
                                                <div class="product-details__reviews-card-author-role">
                                                    <?=$author["A_POSITION"]["VALUE"]?>
                                                </div>
                                            </div>
                                            <img src="<?=Sl\Core\Tools::resizeImage($author["A_LOGO"]["VALUE"], 200, 120, true)?>" alt="" class="product-details__reviews-card-logo">
                                        </div>
                                    <?endif;?>
                                </div>
                            </li>
                        <?endforeach;?>
                    </ul>
                    <!--<div class="product-details__reviews-buttons">
                        <a href="#" class="arrow-btn">Показать еще</a>
                        <a href="#review-modal" class="blue-btn js-open-modal">
                            Оставить отзыв
                        </a>
                    </div>-->
                </div>
            </div>
            <!--<div class="product-details__tab-item">
                <div class="product-details__faq">
                    <div class="product-details__faq-col">
                        <div class="product-details__faq-accordion js-accordion">
                            <div class="product-details__faq-accordion-btn js-accordion-btn">
                                <div class="product-details__faq-accordion-btn-text">
                                    Как происходит поставка?
                                </div>
                                <div class="product-details__faq-accordion-btn-icon">
                                    <svg width="14" height="14" aria-hidden="true" class="icon-plus">
                                        <use xlink:href="#plus"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="product-details__faq-accordion-content js-accordion-content">
                                <div class="product-details__faq-accordion-content-inner">
                                    <p>
                                        Контролируем поставку оборудования, предоставляя поэтапный фотоотчет с места
                                        производства до вашего объекта.
                                    </p>
                                    <p>
                                        При помощи GPS трекера покажем, где находится ваше оборудование в данный момент.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="product-details__faq-accordion js-accordion">
                            <div class="product-details__faq-accordion-btn js-accordion-btn">
                                <div class="product-details__faq-accordion-btn-text">
                                    Как ввести в эксплуатацию?
                                </div>
                                <div class="product-details__faq-accordion-btn-icon">
                                    <svg width="14" height="14" aria-hidden="true" class="icon-plus">
                                        <use xlink:href="#plus"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="product-details__faq-accordion-content js-accordion-content">
                                <div class="product-details__faq-accordion-content-inner">
                                    <p>
                                        Контролируем поставку оборудования, предоставляя поэтапный фотоотчет с места
                                        производства до вашего объекта.
                                    </p>
                                    <p>
                                        При помощи GPS трекера покажем, где находится ваше оборудование в данный момент.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details__faq-col">
                        <div class="product-details__faq-accordion js-accordion">
                            <div class="product-details__faq-accordion-btn js-accordion-btn">
                                <div class="product-details__faq-accordion-btn-text">
                                    Что входит в гарантийное обслуживание?
                                </div>
                                <div class="product-details__faq-accordion-btn-icon">
                                    <svg width="14" height="14" aria-hidden="true" class="icon-plus">
                                        <use xlink:href="#plus"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="product-details__faq-accordion-content js-accordion-content">
                                <div class="product-details__faq-accordion-content-inner">
                                    <p>
                                        Контролируем поставку оборудования, предоставляя поэтапный фотоотчет с места
                                        производства до вашего объекта.
                                    </p>
                                    <p>
                                        При помощи GPS трекера покажем, где находится ваше оборудование в данный момент.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="article__layout">
            <div class="article__main">
                <div class="article__main-content">
                    <?=$arResult["~DETAIL_TEXT"]?>
                </div>
            </div>
        </div>
    </div>
</section>