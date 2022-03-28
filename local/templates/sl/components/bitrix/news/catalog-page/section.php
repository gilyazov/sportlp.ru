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

<?if($arParams["USE_RSS"]=="Y"):?>
	<?
	$rss_url = CComponentEngine::makePathFromTemplate($arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss_section"], array_map("urlencode", $arResult["VARIABLES"]));
	if(method_exists($APPLICATION, 'addheadstring'))
		$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$rss_url.'" href="'.$rss_url.'" />');
	?>
	<a href="<?=$rss_url?>" title="rss" target="_self"><img alt="RSS" src="<?=$templateFolder?>/images/gif-light/feed-icon-16x16.gif" border="0" align="right" /></a>
<?endif?>

<?if($arParams["USE_SEARCH"]=="Y"):?>
<?=GetMessage("SEARCH_LABEL")?><?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"flat",
	Array(
		"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
	),
	$component
);?>
<br />
<?endif?>


<section class="catalog-page">
    <div class="container">
        <div class="catalog-page__top-row">
            <div class="catalog-page__top-content">
                <h1 class="catalog-page__main-heading">
                    Каталог
                </h1>
                <div class="catalog-page__categories">
                    <ul class="catalog-page__categories-list">
                        <li class="catalog-page__categories-list-item active">
                            <a href="#" class="catalog-page__categories-link">
                                Всей техники
                            </a>
                        </li>
                        <li class="catalog-page__categories-list-item">
                            <a href="#" class="catalog-page__categories-link">
                                По брендам
                            </a>
                        </li>
                        <li class="catalog-page__categories-list-item">
                            <a href="#" class="catalog-page__categories-link">
                                По типам ледорвых арен
                            </a>
                        </li>
                        <li class="catalog-page__categories-list-item">
                            <a href="#" class="catalog-page__categories-link">
                                По типам привода
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="catalog-page__filters-nav-outside-wrapper">
                    <div class="catalog-page__filters-nav-wrapper js-sticky-nav-wrapper">
                        <div class="catalog-page__filters-nav js-filters-nav">
                            <div class="swiper-container">
                                <ul class="swiper-wrapper catalog-page__filters-nav-list">
                                    <li class="swiper-slide catalog-page__filters-nav-list-item">
                                        <a href="#filters-PROPERTY_69" class="catalog-page__filters-nav-link js-open-modal">
                                            Вид топлива
                                        </a>
                                    </li>
                                    <li class="swiper-slide catalog-page__filters-nav-list-item">
                                        <a href="#filters-PROPERTY_70" class="catalog-page__filters-nav-link js-open-modal">
                                            Площадь обработки, м²
                                        </a>
                                    </li>
                                    <li class="swiper-slide catalog-page__filters-nav-list-item">
                                        <a href="#filters-PROPERTY_82" class="catalog-page__filters-nav-link js-open-modal">
                                            Бренд
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="catalog-page__what-to-choose">
                <a href="#" class="what-to-choose">
                    <div class="what-to-choose__bg">
                        <img data-src="<?=STATIC_PATH?>img/what-to-choose.jpg" alt="" class="what-to-choose__bg-image lazyload">
                    </div>
                    <svg width="14" height="14" aria-hidden="true" class="icon-question">
                        <use xlink:href="#question"></use>
                    </svg>
                    <div class="what-to-choose__row">
                        <h3 class="what-to-choose__title">
                            Как подобрать подходящую модель?
                        </h3>
                        <div class="what-to-choose__read">
                            <span class="what-to-choose__read-text">
                                читать
                            </span>
                            <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                                <use xlink:href="#diagonal-arrow"></use>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="catalog-page__layout" id="catalogAjax">
            <?if($_REQUEST['set_filter'] === 'Y' && $_GET['ajax'] !== 'N') {
                $GLOBALS['APPLICATION']->RestartBuffer();
            } ?>

            <div class="catalog-page__sidebar js-catalog-sticky-sidebar">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "filters-categories",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "COMPONENT_TEMPLATE" => ".default",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "MENU_THEME" => "site",
                        "ROOT_MENU_TYPE" => "left",
                        "USE_EXT" => "Y"
                    ),
                    $component
                );?>

                <?if($arParams["USE_FILTER"]=="Y"):?>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:catalog.filter",
                        "",
                        Array(
                            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                            "FILTER_NAME" => $arParams["FILTER_NAME"],
                            "FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
                            "PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
                            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                            "CACHE_TIME" => $arParams["CACHE_TIME"],
                            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                            "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                        ),
                        $component
                    );
                    ?>
                <?endif?>
            </div>

            <div class="catalog-page__main">
                <div class="catalog-page__buttons">
                    <div class="catalog-page__sorting">
                        <button class="catalog-page__sorting-btn">
                            Сортировать
                            <svg width="14" height="14" aria-hidden="true" class="icon-sort">
                                <use xlink:href="#sort"></use>
                            </svg>
                        </button>
                        <h4 class="catalog-page__sorting-heading">
                            Сортировать:
                        </h4>
                        <div class="catalog-page__sorting-dropdown">
                            <div class="catalog-page__sorting-dropdown-inner">
                                <div class="catalog-page__sorting-links">
                                    <a href="#" class="catalog-page__sorting-link">
                                        по популярности
                                    </a>
                                    <a href="#" class="catalog-page__sorting-link active">
                                        по площади обработки
                                        <svg width="14" height="14" aria-hidden="true" class="icon-sort">
                                            <use xlink:href="#sort"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "",
                    Array(
                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                        "SORT_BY1" => $arParams["SORT_BY1"],
                        "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                        "SORT_BY2" => $arParams["SORT_BY2"],
                        "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                        "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
                        "SET_TITLE" => $arParams["SET_TITLE"],
                        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                        "MESSAGE_404" => $arParams["MESSAGE_404"],
                        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                        "SHOW_404" => $arParams["SHOW_404"],
                        "FILE_404" => $arParams["FILE_404"],
                        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                        "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                        "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                        "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                        "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                        "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                        "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                        "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                        "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                        "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                        "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                        "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                        "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                        "FILTER_NAME" => $arParams["FILTER_NAME"],
                        "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                        "CHECK_DATES" => $arParams["CHECK_DATES"],
                        "STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],

                        "PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
                        "PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
                        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                        "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
                    ),
                    $component
                );?>
            </div>

            <?if($_REQUEST['set_filter'] === 'Y' && $_GET['ajax'] !== 'N') {
                die();
            } ?>
        </div>
    </div>
</section>