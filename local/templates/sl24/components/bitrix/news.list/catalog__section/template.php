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
<div class="catalog__brand-slider js-catalog-brands-slider">
    <button class="catalog__brand-slider-arrow catalog__brand-slider-arrow--prev">
        <svg width="14" height="14" aria-hidden="true" class="icon-arrow-left">
            <use xlink:href="#arrow-left"></use>
        </svg>
    </button>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="catalog__brand-slider-card">
                        <div class="catalog__brand-slider-card-top-row">
                            <div class="catalog__brand-slider-card-info">
                                <h4 class="catalog__brand-slider-card-title">
                                    <?=$arItem["NAME"]?>
                                </h4>
                                <div class="catalog__brand-slider-card-description">
                                    <?=$arItem["PROPERTIES"]["ATT_APPOINTMENT"]["VALUE"]?>
                                </div>
                            </div>
                            <img data-src="<?=Sl\Core\Tools::resizeImage($arItem["PREVIEW_PICTURE"]["ID"], 150, 150, true)?>" alt=""
                                 class="catalog__brand-slider-card-image lazyload">
                        </div>
                        <div class="catalog__brand-slider-card-specs">
                            <div class="catalog__brand-slider-card-specs-item">
                                <div class="catalog__brand-slider-card-specs-key">
                                    <svg width="14" height="14" aria-hidden="true" class="icon-area">
                                        <use xlink:href="#area"></use>
                                    </svg>
                                    Площадь заливки
                                </div>
                                <div class="catalog__brand-slider-card-specs-value">
                                    <?=$arItem["PROPERTIES"]["ATT_AREA_SURFACES"]["VALUE"] ?> м²
                                </div>
                            </div>
                            <div class="catalog__brand-slider-card-specs-item">
                                <div class="catalog__brand-slider-card-specs-key">
                                    <svg width="14" height="14" aria-hidden="true" class="icon-water">
                                        <use xlink:href="#water"></use>
                                    </svg>
                                    Ёмкость для воды
                                </div>
                                <div class="catalog__brand-slider-card-specs-value">
                                    <?=$arItem["PROPERTIES"]["ATT_WATER_TANK"]["VALUE"] ?>
                                </div>
                            </div>
                            <div class="catalog__brand-slider-card-specs-item">
                                <div class="catalog__brand-slider-card-specs-key">
                                    <svg width="14" height="14" aria-hidden="true" class="icon-snow">
                                        <use xlink:href="#snow"></use>
                                    </svg>
                                    Ёмкость для снега
                                </div>
                                <div class="catalog__brand-slider-card-specs-value">
                                    <?=$arItem["PROPERTIES"]["ATT_HOPPER_VOLUME"]["VALUE"] ?>
                                </div>
                            </div>
                        </div>

                        <?if($price = $arItem["PROPERTIES"]["PRICE"]["VALUE"]):?>
                            <span class="catalog__brand-slider-card-price"><?=number_format($price, 0, ',', ' ' )?> ₽</span>
                        <?endif;?>

                        <div class="catalog__brand-slider-card-buttons">
                            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="blue-small-btn">
                                Смотреть <span class="hide-on-mobile">модель</span>
                            </a>
                            <!--<a href="#" class="outline-btn">
                                <svg width="14" height="14" aria-hidden="true" class="icon-heart">
                                    <use xlink:href="#heart"></use>
                                </svg>
                            </a>-->
                            <a href="#" class="outline-btn js-comparison-btn" data-id="<?=$arItem["ID"]?>">
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
    <button class="catalog__brand-slider-arrow catalog__brand-slider-arrow--next">
        <svg width="14" height="14" aria-hidden="true" class="icon-arrow-right">
            <use xlink:href="#arrow-right"></use>
        </svg>
    </button>
    <div class="slider-pagination catalog__brands-slider-pagination">

    </div>
</div>