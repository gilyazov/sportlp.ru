<section class="realised-projects js-realised-projects">
    <div class="container">
        <div class="realised-projects__top-row">
            <h2 class="small-heading realised-projects__small-heading">
                Наш опыт
            </h2>
            <h3 class="secondary-heading realised-projects__large-heading">
                Реализованные проекты
            </h3>
            <div class="realised-projects__count">
                <div class="realised-projects__count-number">
                    20
                </div>
                <div class="realised-projects__count-text">
                    <p>
                        единиц техники<br>
                        за последний год
                    </p>
                </div>
            </div>
        </div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "realised-projects__slider",
            Array(
                "IBLOCK_TYPE" => "products",
                "IBLOCK_ID" => 6,
                "NEWS_COUNT" => 5,
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "",
                "SORT_ORDER2" => "",
                "SET_TITLE" => "N",
                "PROPERTY_CODE" => [
                    "ATT_DOP_PHOTO"
                ],
                "PAGER_TEMPLATE" => "arrow-btn"
            ),
            false
        );?>
    </div>
</section>