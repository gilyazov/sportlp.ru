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
<div class="comparison__categories-select js-comparison-select">
    <div class="comparison__categories-select-btn js-comparison-select-btn">
        <div class="comparison__categories-select-btn-text js-comparison-select-btn-text">
            <?=$arResult["ITEMS"][0]["NAME"]?>
        </div>
        <svg width="14" height="14" aria-hidden="true" class="icon-arrow-down">
            <use xlink:href="#arrow-down"></use>
        </svg>
    </div>
    <div class="comparison__categories-select-dropdown">
        <div class="comparison__categories-select-dropdown-inner">
            <div class="comparison__categories">
                <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <label class="comparison__categories-checkbox js-comparison-radio" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <input type="radio" name="comparison-category"
                               value="<?=$arItem["ID"]?>"
                               data-product_1="<?=$arItem["PROPERTIES"]["PRODUCT_1"]["VALUE"]?>"
                               data-product_2="<?=$arItem["PROPERTIES"]["PRODUCT_2"]["VALUE"]?>"
                               class="comparison__categories-checkbox-input"<?if($key == 0):?> checked=""<?endif;?>>
                        <span class="comparison__categories-checkbox-content">
                            <span class="comparison__categories-checkbox-title js-comparison-radio-value">
                                <?=$arItem["NAME"]?>
                            </span>
                            <span class="comparison__categories-checkbox-items">
                                <?if($product = $arItem["PROPERTIES"]["PRODUCT_1"]["VALUE"]):?>
                                    <span class="comparison__categories-checkbox-item">
                                        <img data-src="<?=Sl\Core\Tools::resizeImage($arResult["PRODUCTS"][$product]["PREVIEW_PICTURE"], 220, 100, true)?>" alt=""
                                             class="comparison__categories-checkbox-image lazyload">
                                        <span class="comparison__categories-checkbox-item-title">
                                            <?=$arResult["PRODUCTS"][$product]["NAME"]?>
                                        </span>
                                    </span>
                                <?endif;?>
                                <svg width="14" height="14" aria-hidden="true" class="icon-versus">
                                    <use xlink:href="#versus"></use>
                                </svg>
                                <?if($product = $arItem["PROPERTIES"]["PRODUCT_2"]["VALUE"]):?>
                                    <span class="comparison__categories-checkbox-item">
                                        <img data-src="<?=Sl\Core\Tools::resizeImage($arResult["PRODUCTS"][$product]["PREVIEW_PICTURE"], 220, 100, true)?>" alt=""
                                             class="comparison__categories-checkbox-image lazyload">
                                        <span class="comparison__categories-checkbox-item-title">
                                            <?=$arResult["PRODUCTS"][$product]["NAME"]?>
                                        </span>
                                    </span>
                                <?endif;?>
                            </span>
                        </span>
                    </label>
                <?endforeach;?>
            </div>
        </div>
    </div>
</div>