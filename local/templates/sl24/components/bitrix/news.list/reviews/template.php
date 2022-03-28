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
<div class="reviews__content-row">
    <?if($arItem = $arResult["BIG"]):?>
        <a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"
           class="reviews__selected-review" data-fancybox="review">
            <div class="reviews__selected-review-bg">
                <img data-src="<?=Sl\Core\Tools::resizeImage($arItem["PREVIEW_PICTURE"]["ID"], 900, 500, true)?>" alt=""
                     class="reviews__selected-review-bg-image lazyload">

            </div>
            <div class="reviews__selected-review-play">
                <svg width="14" height="14" aria-hidden="true" class="icon-play">
                    <use xlink:href="#play"></use>
                </svg>
            </div>
            <div class="reviews__selected-review-content">
                <div class="reviews__selected-review-duration">
                    <?=$arItem["PROPERTIES"]["DURATION"]["VALUE"]?>
                </div>
                <h4 class="reviews__selected-review-title">
                    <?foreach ($arItem["PROPERTIES"]["TITLE"]["VALUE"] as $key => $title):?>
                        <span><?=$title?></span><?if(($key+1) != count($arItem["PROPERTIES"]["TITLE"]["VALUE"])):?><br><?endif;?>
                    <?endforeach;?>
                </h4>
                <div class="reviews__selected-review-text">
                    <p>
                        <?=$arItem["NAME"]?>
                    </p>
                </div>
            </div>

        </a>
    <?endif;?>

    <div class="reviews__other-reviews">
        <div class="reviews__other-reviews-gradient-wrapper">
            <div class="reviews__other-reviews-scroll-wrapper">
                <ul class="reviews__other-reviews-list">
                    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <li class="reviews__other-reviews-list-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"
                               class="reviews__other-reviews-card" data-fancybox="review">
                                <div class="reviews__other-reviews-card-image-container">
                                    <img data-src="<?=Sl\Core\Tools::resizeImage($arItem["PREVIEW_PICTURE"]["ID"], 400, 220)?>" alt=""
                                         class="reviews__other-reviews-card-image lazyload">

                                    <div class="reviews__other-reviews-card-play">
                                        <svg width="14" height="14" aria-hidden="true" class="icon-play">
                                            <use xlink:href="#play"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="reviews__other-reviews-card-content">
                                    <h4 class="reviews__other-reviews-card-title">
                                        <?=$arItem["NAME"]?>
                                    </h4>
                                    <div class="reviews__other-reviews-card-time">
                                        <?=$arItem["PROPERTIES"]["DURATION"]["VALUE"]?>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?endforeach;?>
                </ul>
            </div>
        </div>
    </div>

    <div class="reviews__mobile-slider js-reviews-mobile-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="swiper-slide">
                        <a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"
                           class="reviews__mobile-slider-card" data-fancybox="review" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <div class="reviews__mobile-slider-card-image-container">
                                <img data-src="<?=Sl\Core\Tools::resizeImage($arItem["PREVIEW_PICTURE"]["ID"], 400, 220)?>" alt=""
                                     class="reviews__mobile-slider-card-image lazyload">
                            </div>

                            <div class="reviews__mobile-slider-card-play">
                                <svg width="14" height="14" aria-hidden="true" class="icon-play">
                                    <use xlink:href="#play"></use>
                                </svg>
                            </div>
                            <div class="reviews__mobile-slider-card-content">
                                <div class="reviews__mobile-slider-card-duration">
                                    <?=$arItem["PROPERTIES"]["DURATION"]["VALUE"]?>
                                </div>
                                <h4 class="reviews__mobile-slider-card-title">
                                    <?foreach ($arItem["PROPERTIES"]["TITLE"]["VALUE"] as $key => $title):?>
                                        <span><?=$title?></span><?if(($key+1) != count($arItem["PROPERTIES"]["TITLE"]["VALUE"])):?><br><?endif;?>
                                    <?endforeach;?>
                                </h4>
                            </div>
                        </a>
                    </div>
                <?endforeach;?>
            </div>
        </div>
        <div class="slider-pagination reviews__mobile-slider-pagination">

        </div>
    </div>
</div>
