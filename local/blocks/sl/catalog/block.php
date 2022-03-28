<section class="catalog js-catalog">
    <div class="container">
        <div class="catalog__top-row">
            <h2 class="small-heading catalog__small-heading js-block-to-reveal">
                Выбирайте и сравнивайте
            </h2>
            <h3 class="secondary-heading catalog__large-heading js-animated-header">
                Каталог техники
            </h3>
        </div>

        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "catalog__categories",
            Array(
                "IBLOCK_TYPE" => "products",
                "IBLOCK_ID" => 2,
                "NEWS_COUNT" => 999,
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "",
                "SORT_ORDER2" => "",
                "SET_TITLE" => "N",
                "PROPERTY_CODE" => [
                    "POPULAR"
                ]
            ),
            false
        );?>

        <div class="catalog__bottom-row js-block-to-reveal" data-intersection-ratio="0.2">
            <a href="/catalog/" class="arrow-btn-filled catalog__show-all">
                Смотреть весь каталог
                <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                    <use xlink:href="#diagonal-arrow"></use>
                </svg>
            </a>
        </div>
    </div>
</section>