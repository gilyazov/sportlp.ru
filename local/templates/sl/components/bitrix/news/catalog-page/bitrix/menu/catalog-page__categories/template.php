<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <div class="catalog-page__categories">
        <ul class="catalog-page__categories-list">
            <?
            foreach($arResult as $arItem):
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                ?>

                <li class="catalog-page__categories-list-item<?if($arItem["SELECTED"]):?> active<?endif?>">
                    <a href="<?=$arItem["LINK"]?>" class="catalog-page__categories-link">
                        <?=$arItem["TEXT"]?>
                    </a>
                </li>
            <?endforeach?>
        </ul>
    </div>
<?endif?>