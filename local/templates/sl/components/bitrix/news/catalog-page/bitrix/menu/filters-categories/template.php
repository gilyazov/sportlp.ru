<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <div class="catalog-page__filters-categories js-modal" id="filters-categories">
        <div class="catalog-page__filters-categories-inner">
            <button class="catalog-page__filters-block-close js-close-modal" type="button">
                <svg width="14" height="14" aria-hidden="true" class="icon-close">
                    <use xlink:href="#close"></use>
                </svg>
            </button>
            <h3 class="catalog-page__filters-block-heading show-on-mobile">
                Категория товара
            </h3>
            <ul class="catalog-page__filters-categories-list">

                <?
                foreach($arResult as $arItem):
                    if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                        continue;
                    ?>

                    <li class="catalog-page__filters-categories-list-item<?if($arItem["SELECTED"]):?> active<?endif?>">
                        <a href="<?=$arItem["LINK"]?>" class="catalog-page__filters-categories-link">
                            <?=$arItem["TEXT"]?>
                            <span class="catalog-page__filters-categories-count">
                                <?=$arItem["PARAMS"]["ELEMENT_CNT"]?>
                            </span>
                        </a>
                    </li>

                <?endforeach?>
            </ul>
            <button class="catalog-page__filters-block-submit js-close-modal" type="submit">
                Отлично
            </button>
        </div>
    </div>
<?endif?>