<section class="comparison js-comparison">
    <div class="container">
        <div class="comparison__top-row">
            <h2 class="small-heading comparison__small-heading">

                Сравните и выберите
            </h2>
            <div class="secondary-heading comparison__large-heading">
                Сравнение моделей
            </div>
            <div class="comparison__prepared">
                <svg width="14" height="14" aria-hidden="true" class="icon-info">
                    <use xlink:href="#info"></use>
                </svg>
                Мы подготовили сравнение самых востребованных на российском рынке моделей
            </div>
        </div>
        <div class="comparison__layout">
            <div class="comparison__sidebar">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "comparison__categories-select",
                    Array(
                        "IBLOCK_TYPE" => "products",
                        "IBLOCK_ID" => 10,
                        "NEWS_COUNT" => 999,
                        "SORT_BY1" => "SORT",
                        "SORT_ORDER1" => "ASC",
                        "SORT_BY2" => "",
                        "SORT_ORDER2" => "",
                        "SET_TITLE" => "N",
                        "PROPERTY_CODE" => [
                            "PRODUCT_1", "PRODUCT_2"
                        ]
                    ),
                    false
                );?>

                <?
                global $arrFilterArticle;
                $arrFilterArticle = Array(
                    "PROPERTY_LOCATION" => 182
                );
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "article__comparison",
                    Array(
                        "IBLOCK_TYPE" => "news",
                        "IBLOCK_ID" => 12,
                        "NEWS_COUNT" => 1,
                        "SORT_BY1" => "SORT",
                        "SORT_ORDER1" => "ASC",
                        "SET_TITLE" => "N",
                        "FILTER_NAME" => "arrFilterArticle",
                        "PROPERTY_CODE" => [
                            "ARTICLE"
                        ]
                    ),
                    false
                );?>
            </div>
            <div class="comparison__main">
                <div class="comparison__content">
                    <div class="comparison__tabs">
                        <div class="comparison__tab" id="catalogAjax">
                            <?
                            if(is_array($_REQUEST['products'])){
                                $GLOBALS['APPLICATION']->RestartBuffer();

                                global $arrFilter;
                                $arrFilter = [
                                    "ID" => $_REQUEST['products']
                                ];

                                $APPLICATION->IncludeComponent(
                                    "bitrix:news.list",
                                    "comparison__tab",
                                    Array(
                                        "IBLOCK_TYPE" => "products",
                                        "IBLOCK_ID" => 2,
                                        "NEWS_COUNT" => 2,
                                        "SORT_BY1" => ($_REQUEST['rand'] == true ? "RAND" : "SORT"),
                                        "SORT_ORDER1" => ($_REQUEST['rand'] == true ? "RAND" : "ASC"),
                                        "SORT_BY2" => "",
                                        "SORT_ORDER2" => "",
                                        "SET_TITLE" => "N",
                                        "FILTER_NAME" => "arrFilter",
                                        "DISPLAY_BOTTOM_PAGER" => "N",
                                        "PROPERTY_CODE" => [
                                            "ATT_POWER"
                                        ]
                                    ),
                                    false
                                );

                                die();
                            }
                            ?>
                        </div>
                    </div>
                    <div class="comparison__buttons">
                        <a href="#" class="arrow-btn js-full-comparison">
                            Полное сравнение
                            <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                                <use xlink:href="#diagonal-arrow"></use>
                            </svg>
                        </a>
                        <a href="#callback-modal" class="blue-btn js-open-modal">
                            Обсудить с экспертом
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>