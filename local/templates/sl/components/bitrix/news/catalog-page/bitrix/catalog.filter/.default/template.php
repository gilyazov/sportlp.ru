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
        <?foreach($arResult["ITEMS"] as $arItem):?>
			<?if(!array_key_exists("HIDDEN", $arItem)):?>
                <div class="catalog-page__filters-block">
                    <h3 class="catalog-page__filters-block-heading"><?=$arItem["NAME"]?></h3>
                    <div class="catalog-page__filters-brands"><?=$arItem["INPUT"]?></div>
				</div>
			<?endif?>
		<?endforeach;?>
    </div>
    <input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" />
    <input type="hidden" name="set_filter" value="Y" />
    <input type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" />

</form>
