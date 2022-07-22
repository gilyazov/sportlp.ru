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
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="catalog-page__filters">
	<?foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;?>

    <button class="catalog-page__reset-btn" type="reset">
        <svg width="14" height="14" aria-hidden="true" class="icon-close">
            <use xlink:href="#close"></use>
        </svg>
        Сбросить все фильтры
    </button>
    <div class="catalog-page__filters-blocks">
        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
			<?if(!array_key_exists("HIDDEN", $arItem)):?>
                <div class="catalog-page__filters-block js-modal" id="filters-<?=$key?>">
                    <div class="catalog-page__filters-block-inner">

                        <button class="catalog-page__filters-block-close js-close-modal" type="button">
                            <svg width="14" height="14" aria-hidden="true" class="icon-close">
                                <use xlink:href="#close"></use>
                            </svg>
                        </button>

                        <h3 class="catalog-page__filters-block-heading"><?=$arItem["NAME"]?></h3>
                        <div class="catalog-page__filters-brands">
                            <?foreach ($arItem['LIST'] as $value => $arOption):?>
                                <label class="catalog-page__filters-checkbox">
                                    <input type="radio"
                                           value="<?=$value?>"
                                            name="<?=$arItem["INPUT_NAME"]?>" class="catalog-page__filters-checkbox-input"
                                            <?=($arItem["INPUT_VALUE"] == $value ? "checked" : "")?>>
                                    <span class="catalog-page__filters-checkbox-content">
                                        <?if ($arItem['LIST_FULL'][$value]['EXTERNAL_ID']):?>
                                            <svg width="14" height="14" aria-hidden="true" class="<?=$arItem['LIST_FULL'][$value]["EXTERNAL_ID"]?>">
                                                <use xlink:href="#<?=$arItem['LIST_FULL'][$value]["EXTERNAL_ID"]?>"></use>
                                            </svg>
                                        <?endif;?>
                                        <?
                                        /*echo "<pre>";
                                        print_r($arOption);
                                        echo "</pre>";*/
                                        ?>
                                        <?echo (is_array($arOption) ? $arOption["NAME"] : $arOption)?>

                                        <?if (is_array($arOption)):?>
                                            <span class="catalog-page__filters-checkbox-info">
                                            <?=$arOption["TITLE"]?>
                                            <span class="catalog-page__filters-checkbox-info-icon">
                                                <svg width="14" height="14" aria-hidden="true" class="icon-notice">
                                                    <use xlink:href="#notice"></use>
                                                </svg>
                                                <span class="catalog-page__filters-checkbox-info-dropdown">
                                                    <span
                                                            class="catalog-page__filters-checkbox-info-dropdown-inner">
                                                        <?=$arOption["DESCRIPTION"]?>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                        <?endif;?>
                                    </span>
                                </label>

                            <?endforeach;?>
                        </div>
                        <button class="catalog-page__filters-block-submit js-close-modal" type="button">
                            Отлично
                        </button>
                    </div>
				</div>
			<?endif?>
		<?endforeach;?>
    </div>
    <!--<input type="submit" name="set_filter" value="<?/*=GetMessage("IBLOCK_SET_FILTER")*/?>" />-->
    <input type="hidden" name="set_filter" value="Y" />
    <!--<input type="submit" name="del_filter" value="<?/*=GetMessage("IBLOCK_DEL_FILTER")*/?>" />-->

</form>
