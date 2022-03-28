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
<div class="intro__slider js-intro-slider" data-initial-slide="<?=count($arResult["ITEMS"])?>">
    <img src="<?=STATIC_PATH?>img/intro-back.webp" alt="" class="intro__slider-back-bg">

    <div class="intro__slider-inner">

        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?for($i=1; $i<=2; $i++):?>
                    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                        <div class="swiper-slide">
                            <div class="intro__slider-card" style="--brand-color: #<?=$arItem["PROPERTIES"]["COLOR"]["VALUE_XML_ID"]?>;">
                                <h4 class="intro__slider-card-large-heading" data-swiper-parallax="-23%"
                                    data-swiper-parallax-opacity="0">
                                    <div class="intro__slider-card-large-heading-inner">
                                        <?=$arItem["NAME"]?>
                                    </div>
                                </h4>

                                <div class="intro__slider-card-heading-text" data-swiper-parallax-opacity="0">
                                    <div class="intro__slider-card-heading-text-inner">
                                        <?=$arItem["PREVIEW_TEXT"]?>
                                    </div>

                                </div>

                                <div class="intro__slider-card-illustration">
                                    <div class="intro__slider-card-illustration-wrapper">


                                        <img src="<?=Sl\Core\Tools::resizeImage($arItem["PREVIEW_PICTURE"]["ID"], 1200, 700, true)?>" alt=""
                                             class="intro__slider-card-illustration-image">

                                        <?if($arItem["PROPERTIES"]["OPTIONS"]["VALUE"]):?>
                                            <div class="intro__slider-card-illustration-items">
                                                <div class="intro__slider-card-illustration-item intro__slider-card-illustration-item--mobile"
                                                     style="left: 24%; top: 77%;">
                                                    <div class="intro__slider-card-illustration-item-dropdown">
                                                        <div
                                                                class="intro__slider-card-illustration-item-dropdown-inner">
                                                            <div class="intro__slider-card-illustration-item-specs">
                                                                <?foreach ($arItem["PROPERTIES"]["OPTIONS"]["VALUE"] as $arOption):?>
                                                                    <div
                                                                        class="intro__slider-card-illustration-item-specs-card">
                                                                    <div
                                                                            class="intro__slider-card-illustration-item-specs-card-value">
                                                                        <?=$arOption["SUB_VALUES"]["OPTIONS_AMOUNT"]["VALUE"]?>
                                                                    </div>
                                                                    <div
                                                                            class="intro__slider-card-illustration-item-specs-card-key">
                                                                        <?=$arOption["SUB_VALUES"]["OPTIONS_TEXT"]["VALUE"]?>
                                                                    </div>
                                                                </div>
                                                                <?endforeach;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="intro__slider-card-illustration-item-marker">
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-plus">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </div>
                                                </div>

                                                <?foreach ($arItem["PROPERTIES"]["OPTIONS"]["VALUE"] as $arOption):?>
                                                    <div class="intro__slider-card-illustration-item"
                                                     style="left: <?=$arOption["SUB_VALUES"]["OPTIONS_LEFT"]["VALUE"]?>%; top: <?=$arOption["SUB_VALUES"]["OPTIONS_TOP"]["VALUE"]?>%;">
                                                        <div class="intro__slider-card-illustration-item-desktop-dropdown">
                                                            <div
                                                                    class="intro__slider-card-illustration-item-desktop-dropdown-inner">
                                                                <div
                                                                        class="intro__slider-card-illustration-item-desktop-dropdown-amount">
                                                                    <?=$arOption["SUB_VALUES"]["OPTIONS_AMOUNT"]["VALUE"]?>
                                                                </div>
                                                                <div
                                                                        class="intro__slider-card-illustration-item-desktop-dropdown-text">
                                                                    <?=$arOption["SUB_VALUES"]["OPTIONS_TEXT"]["VALUE"]?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="intro__slider-card-illustration-item-marker">
                                                            <svg width="14" height="14" aria-hidden="true"
                                                                 class="icon-plus">
                                                                <use xlink:href="#plus"></use>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                <?endforeach;?>
                                            </div>
                                        <?endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?endforeach;?>
                <?endfor;?>
            </div>
        </div>

        <div class="intro__slider-details">
            <div class="intro__video-slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?for($i=1; $i<=2; $i++):?>
                            <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                                <div class="swiper-slide">
                                    <?if($arVideo = $arItem["PROPERTIES"]["VIDEO"]["VALUE"]):?>
                                        <a href="<?=$arVideo["SUB_VALUES"]["VIDEO_LINK"]["VALUE"]?>" class="intro__video-review"
                                           data-fancybox="">
                                            <div class="intro__video-review-image-container">
                                                <img src="<?=Sl\Core\Tools::resizeImage($arVideo["SUB_VALUES"]["VIDEO_PREVIEW_IMG"]["VALUE"], 600, 350)?>" alt="" class="intro__video-review-image">
                                                <?if($arVideo["SUB_VALUES"]["VIDEO_PREVIEW_MP4"]["VALUE"]):?>
                                                    <video preload="none" loop playsinline muted>
                                                        <source src="<?=CFile::GetPath($arVideo["SUB_VALUES"]["VIDEO_PREVIEW_MP4"]["VALUE"]);?>" type="video/mp4">
                                                    </video>
                                                <?endif;?>
                                            </div>
                                            <h4 class="intro__video-review-title">
                                                <?=$arVideo["SUB_VALUES"]["VIDEO_PREVIEW_DESCRIPTION"]["~VALUE"]["TEXT"]?>
                                            </h4>
                                            <div class="intro__video-review-play">
                                                <svg width="14" height="14" aria-hidden="true" class="icon-play">
                                                    <use xlink:href="#play"></use>
                                                </svg>
                                            </div>
                                        </a>
                                    <?endif;?>
                                </div>
                            <?endforeach;?>
                        <?endfor;?>
                    </div>
                </div>
            </div>
            <div class="intro__details-links">
                <div class="intro__details-links-layers">
                    <?for($i=1; $i<=2; $i++):?>
                        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                            <div class="intro__details-links-layer">
                                <a href="<?=$arItem["PROPERTIES"]["CATALOG"]["URL"]?>" class="intro__details-link">
                                    <span class="intro__details-link-content">
                                        <span>
                                            Подробнее<br>
                                            о модели
                                        </span>
                                    </span>
                                    <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                                        <use xlink:href="#diagonal-arrow"></use>
                                    </svg>
                                </a>
                            </div>
                        <?endforeach;?>
                    <?endfor;?>
                </div>

            </div>
        </div>

        <div class="intro__slider-fraction-pagination">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?for($i=1; $i<=2; $i++):?>
                        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                            <div class="swiper-slide">
                                <div class="intro__slider-fraction-pagination-card">
                                    <span style="color: #<?=$arItem["PROPERTIES"]["COLOR"]["VALUE_XML_ID"]?>;"><?=($key+1)?></span> / <span><?=count($arResult["ITEMS"])?></span>
                                </div>
                            </div>
                        <?endforeach;?>
                    <?endfor;?>
                </div>
            </div>
        </div>
    </div>

    <button class="intro__slider-arrow intro__slider-arrow--prev">
        <svg width="14" height="14" aria-hidden="true" class="icon-arrow-left">
            <use xlink:href="#arrow-left"></use>
        </svg>
    </button>
    <button class="intro__slider-arrow intro__slider-arrow--next">
        <svg width="14" height="14" aria-hidden="true" class="icon-arrow-right">
            <use xlink:href="#arrow-right"></use>
        </svg>
    </button>

    <div class="slider-pagination intro__slider-pagination">

    </div>
    <div class="intro__consultation-btn-wrapper">


        <a href="#" class="blue-btn intro__consultation-btn">
            Заявка на консультацию
        </a>
    </div>
</div>