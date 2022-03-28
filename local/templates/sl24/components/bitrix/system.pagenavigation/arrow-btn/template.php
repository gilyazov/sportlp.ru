<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->createFrame()->begin("Загрузка навигации");
?>

<?if($arResult["NavPageCount"] > 1):?>

    <?if ($arResult["NavPageNomer"]+1 <= $arResult["nEndPage"]):?>
        <?
        $plus = $arResult["NavPageNomer"]+1;
        $url = $arResult["sUrlPathParams"] . "PAGEN_".$arResult["NavNum"]."=".$plus;

        ?>
        <a href="#" class="arrow-btn js-load_more" data-url="<?=$url?>">
            смотреть все проекты
            <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                <use xlink:href="#diagonal-arrow"></use>
            </svg>
        </a>

    <?else:?>

        <div class="load_more">
            Загружено все
        </div>

    <?endif?>

<?endif?>