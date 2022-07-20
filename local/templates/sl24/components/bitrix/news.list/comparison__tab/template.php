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
foreach($arResult["ITEMS"] as $arItem){
    $arIds[] = $arItem["ID"];
}
?>
<div class="comparison__row" data-comparise="<?=implode(",", $arIds)?>">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="comparison__product-image-wrapper" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <img data-src="<?=Sl\Core\Tools::resizeImage($arItem["PREVIEW_PICTURE"]["ID"], 300, 100, true)?>" alt="" class="comparison__product-image lazyload">
        </a>
    <?endforeach;?>
</div>

<div class="comparison__row comparison__row--watch-models">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="comparison__watch-model">
            <span>
                Смотреть модель
            </span>
            <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                <use xlink:href="#diagonal-arrow"></use>
            </svg>
        </a>
    <?endforeach;?>
</div>

<div class="comparison__row">
    <?if($arItem = $arResult["ITEMS"][0]):?>
        <div class="comparison__product-select js-comparison-select">
            <div class="comparison__product-select-inner">
                <div class="comparison__product-select-btn js-comparison-select-btn">
                    <div
                            class="comparison__product-select-btn-text js-comparison-select-btn-text">
                        <?=$arItem["NAME"]?>
                    </div>
                    <div class="comparison__product-select-btn-icon">
                        <svg width="14" height="14" aria-hidden="true" class="icon-arrow-down">
                            <use xlink:href="#arrow-down"></use>
                        </svg>
                    </div>
                </div>
                <div class="comparison__product-select-dropdown">
                    <div class="comparison__product-select-dropdown-inner">
                        <div class="comparison__product-select-dropdown-scroll-wrapper">
                            <?if($arProduct = $arResult["PRODUCTS"][$arItem["ID"]]):?>
                                <label
                                        class="comparison__product-select-checkbox js-comparison-radio">
                                    <input type="radio"
                                           class="comparison__product-select-checkbox-input"
                                           value="<?=$arProduct["ID"]?>"
                                           name="comparison-a">
                                    <span class="comparison__product-select-checkbox-content">
                                            <img data-src="<?=Sl\Core\Tools::resizeImage($arProduct["PREVIEW_PICTURE"], 50, 50, true)?>" alt=""
                                                 class="comparison__product-select-checkbox-image lazyload">
                                            <span
                                                    class="comparison__product-select-checkbox-text js-comparison-radio-value">
                                                <?=$arProduct["NAME"]?>
                                            </span>
                                        </span>
                                </label>
                            <?endif;?>
                            <?foreach ($arResult["PRODUCTS"] as $arProduct):?>
                                <?
                                    if ($arItem["ID"] == $arProduct["ID"]){
                                        continue;
                                    }
                                ?>
                                <label
                                        class="comparison__product-select-checkbox js-comparison-radio">
                                    <input type="radio"
                                           class="comparison__product-select-checkbox-input"
                                           value="<?=$arProduct["ID"]?>"
                                           name="comparison-a">
                                    <span class="comparison__product-select-checkbox-content">
                                        <img data-src="<?=Sl\Core\Tools::resizeImage($arProduct["PREVIEW_PICTURE"], 50, 50, true)?>" alt=""
                                             class="comparison__product-select-checkbox-image lazyload">
                                        <span
                                                class="comparison__product-select-checkbox-text js-comparison-radio-value">
                                            <?=$arProduct["NAME"]?>
                                        </span>
                                    </span>
                                </label>
                            <?endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?endif;?>

    <div class="comparison__random-products">
        <button class="comparison__random-products-btn" type="button">
            <svg width="14" height="14" aria-hidden="true" class="icon-refresh">
                <use xlink:href="#refresh"></use>
            </svg>
            <span class="comparison__random-products-btn-text">
                Случайные<br>
                модели
            </span>
        </button>
    </div>

    <?if($arItem = $arResult["ITEMS"][1]):?>
        <div class="comparison__product-select js-comparison-select">
            <div class="comparison__product-select-inner">
                <div class="comparison__product-select-btn js-comparison-select-btn">
                    <div
                            class="comparison__product-select-btn-text js-comparison-select-btn-text">
                        <?=$arItem["NAME"]?>
                    </div>
                    <div class="comparison__product-select-btn-icon">
                        <svg width="14" height="14" aria-hidden="true" class="icon-arrow-down">
                            <use xlink:href="#arrow-down"></use>
                        </svg>
                    </div>

                </div>
                <div class="comparison__product-select-dropdown">
                    <div class="comparison__product-select-dropdown-inner">
                        <div class="comparison__product-select-dropdown-scroll-wrapper">
                            <?if($arProduct = $arResult["PRODUCTS"][$arItem["ID"]]):?>
                                <label
                                        class="comparison__product-select-checkbox js-comparison-radio">
                                    <input type="radio"
                                           class="comparison__product-select-checkbox-input"
                                           value="<?=$arProduct["ID"]?>"
                                           name="comparison-b">
                                    <span class="comparison__product-select-checkbox-content">
                                            <img data-src="<?=Sl\Core\Tools::resizeImage($arProduct["PREVIEW_PICTURE"], 50, 50, true)?>" alt=""
                                                 class="comparison__product-select-checkbox-image lazyload">
                                            <span
                                                    class="comparison__product-select-checkbox-text js-comparison-radio-value">
                                                <?=$arProduct["NAME"]?>
                                            </span>
                                        </span>
                                </label>
                            <?endif;?>
                            <?foreach ($arResult["PRODUCTS"] as $arProduct):?>
                                <?
                                if ($arItem["ID"] == $arProduct["ID"]){
                                    continue;
                                }
                                ?>
                                <label
                                        class="comparison__product-select-checkbox js-comparison-radio">
                                    <input type="radio"
                                           <?if ($arItem["ID"] == $arProduct["ID"]):?> checked<?endif;?>
                                           class="comparison__product-select-checkbox-input"
                                           value="<?=$arProduct["ID"]?>"
                                           name="comparison-b">
                                    <span class="comparison__product-select-checkbox-content">
                                        <img data-src="<?=Sl\Core\Tools::resizeImage($arProduct["PREVIEW_PICTURE"], 50, 50, true)?>" alt=""
                                             class="comparison__product-select-checkbox-image lazyload">
                                        <span
                                                class="comparison__product-select-checkbox-text js-comparison-radio-value">
                                            <?=$arProduct["NAME"]?>
                                        </span>
                                    </span>
                                </label>
                            <?endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        <?endif;?>
    </div>
</div>

<div class="comparison__row">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <div class="comparison__features">
            <div class="comparison__features-items">
                <div class="comparison__features-item comparison__features-item--blue">
                    <svg width="14" height="14" aria-hidden="true" class="icon-<?=$arItem["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE_XML_ID"]?>">
                        <use xlink:href="#<?=$arItem["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE_XML_ID"]?>"></use>
                    </svg>
                    <?=$arItem["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE"]?>
                </div>

                <div class="comparison__features-item">
                    <svg width="14" height="14" aria-hidden="true" class="icon-size">
                        <use xlink:href="#size"></use>
                    </svg>
                    <?=$arItem["PROPERTIES"]["ATT_APPOINTMENT"]["VALUE"]?>
                </div>
            </div>
        </div>
    <?endforeach;?>
</div>

<div class="comparison__specs">
    <?foreach ($arResult["FEATURES"] as $arFeature):?>
        <?
        $value1 = $arResult["ITEMS"][0]["PROPERTIES"][$arFeature["CODE"]]["VALUE"];
        $value2 = $arResult["ITEMS"][1]["PROPERTIES"][$arFeature["CODE"]]["VALUE"];
        ?>
        <div class="comparison__features-specs-row">
            <div class="comparison__features-specs-item <?if($value1 != $value2):?>comparison__features-specs-item--<?=($value1>$value2 ? "blue" : "grey")?><?endif;?>">
                <?=$value1?>
            </div>
            <div class="comparison__features-specs-legend">
                <svg width="14" height="14" aria-hidden="true" class="icon-area">
                    <use xlink:href="#<?=$arFeature["ICO"]?>"></use>
                </svg>
                <span class="comparison__features-specs-legend-text">
                    <?=$arFeature["NAME"]?>
                </span>
            </div>
            <div class="comparison__features-specs-item <?if($value1 != $value2):?>comparison__features-specs-item--<?=($value1>$value2 ? "grey" : "blue")?><?endif;?>">
                <?=$value2?>
            </div>
        </div>
    <?endforeach;?>
</div>