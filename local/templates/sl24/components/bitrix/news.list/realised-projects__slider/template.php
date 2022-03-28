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
<div class="realised-projects__slider">
    <div class="swiper-container">
        <ul class="swiper-wrapper realised-projects__list">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                $photoCount = (count($arItem["PROPERTIES"]["ATT_DOP_PHOTO"]["VALUE"]) + 1);
                ?>
                <li class="swiper-slide realised-projects__list-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="realised-projects__card">
                        <div class="realised-projects__card-image-slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="realised-projects__card-image-slider-card">
                                            <img data-src="<?=Sl\Core\Tools::resizeImage($arItem["PREVIEW_PICTURE"]["ID"], 1780, 1000)?>" alt=""
                                                 class="realised-projects__card-image-slider-card-image lazyload">
                                        </div>
                                    </div>
                                    <?foreach ($arItem["PROPERTIES"]["ATT_DOP_PHOTO"]["VALUE"] as $photo):?>
                                        <div class="swiper-slide">
                                        <div class="realised-projects__card-image-slider-card">
                                            <img data-src="<?=Sl\Core\Tools::resizeImage($photo, 1780, 100, true)?>" alt=""
                                                 class="realised-projects__card-image-slider-card-image lazyload">
                                        </div>
                                    </div>
                                    <?endforeach;?>
                                </div>
                            </div>
                            <div class="realised-projects__card-image-slider-arrows">
                                <button
                                        class="realised-projects__card-image-slider-arrow realised-projects__card-image-slider-arrow--prev">
                                    <svg width="14" height="14" aria-hidden="true" class="icon-arrow-left">
                                        <use xlink:href="#arrow-left"></use>
                                    </svg>
                                </button>
                                <div class="realised-projects__card-image-slider-pagination">
                                    1 / <?=$photoCount?>
                                </div>
                                <button
                                        class="realised-projects__card-image-slider-arrow realised-projects__card-image-slider-arrow--next">
                                    <svg width="14" height="14" aria-hidden="true" class="icon-arrow-right">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="realised-projects__card-image-slider-count">
                                <?=$photoCount?> фотографии
                            </div>
                        </div>

                        <div class="realised-projects__card-link-wrapper">
                            <div class="realised-projects__card-content">
                                <div class="realised-projects__card-content-top-row">
                                    <h3 class="realised-projects__card-client-name">
                                        <?=$arItem["PROPERTIES"]["ATT_CUSTOMER"]["VALUE"]?>
                                    </h3>

                                    <?if($arItem["PROPERTIES"]["LOGO_CUSTOMER"]["VALUE"]):?>
                                        <img data-src="<?=Sl\Core\Tools::resizeImage($arItem["PROPERTIES"]["LOGO_CUSTOMER"]["VALUE"], 200, 100, true)?>" alt=""
                                             class="realised-projects__card-client-logo lazyload">
                                    <?endif;?>
                                </div>
                                <div class="realised-projects__card-content-info">
                                    <div class="realised-projects__card-date">
                                        <svg width="14" height="14" aria-hidden="true" class="icon-calendar">
                                            <use xlink:href="#calendar"></use>
                                        </svg>
                                        <?=$arItem["PROPERTIES"]["ATT_DATE"]["VALUE"]?>
                                    </div>
                                    <h3 class="realised-projects__card-title">
                                        <?=$arItem["NAME"]?>
                                    </h3>
                                    <div class="realised-projects__card-text">
                                        <p>
                                            <?=$arItem["PROPERTIES"]["DESCRIPTION"]["VALUE"]?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?endforeach;?>
        </ul>
    </div>
    <div class="slider-pagination realised-projects__slider-pagination"></div>
</div>
<div class="realised-projects__bottom-row">
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?>
    <?endif;?>

    <a href="#callback-modal" class="blue-btn js-open-modal">
        Заказать оборудование
    </a>
</div>