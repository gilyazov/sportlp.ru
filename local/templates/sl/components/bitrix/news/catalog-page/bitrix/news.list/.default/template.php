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
<?
//echo "<pre>";
//print_r($arResult);
//echo "</pre>";
?>
<ul class="catalog-page__results-list">
    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <li class="catalog-page__results-list-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="catalog-card catalog-card--compact">
                <?if($arItem["PROPERTIES"]["BADGE"]["VALUE"] && ($arBadge = $arItem["PROPERTIES"]["BADGE"])):?>
                    <div class="catalog-card__label catalog-card__label--<?=$arBadge["VALUE_XML_ID"]?>">
                        <svg width="14" height="14" aria-hidden="true" class="icon-<?=$arBadge["VALUE_XML_ID"]?>">
                            <use xlink:href="#<?=$arBadge["VALUE_XML_ID"]?>"></use>
                        </svg>
                        <?=$arBadge["VALUE"]?>
                    </div>
                <?endif;?>
                <div class="catalog-card__top-row">
                    <div class="catalog-card__image-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?if($arItem["PREVIEW_PICTURE"]):?>
                                    <div class="swiper-slide">
                                        <div class="catalog-card__image-slider-card">
                                            <img data-src="<?=Sl\Core\Tools::resizeImage($arItem["PREVIEW_PICTURE"]["ID"], 150, 150, true)?>" alt=""
                                                 class="catalog-card__image-slider-image lazyload">
                                        </div>
                                    </div>
                                <?endif;?>
                                <?foreach ($arItem["PROPERTIES"]["ATT_PHOTO"]["VALUE"] as $photo):?>
                                    <div class="swiper-slide">
                                        <div class="catalog-card__image-slider-card">
                                            <img data-src="<?=Sl\Core\Tools::resizeImage($photo, 150, 150, true)?>" alt=""
                                                 class="catalog-card__image-slider-image lazyload">
                                        </div>
                                    </div>
                                <?endforeach;?>
                            </div>
                        </div>
                        <div class="catalog-card__image-slider-pagination">

                        </div>
                    </div>
                    <div class="catalog-card__info">
                        <?if($arItem["PROPERTIES"]["BRAND"]["VALUE"]):?>
                            <div class="catalog-card__country">
                                <?=$arItem["PROPERTIES"]["BRAND"]["DETAIL"]["PROPERTIES"]["COUNTRY"]["VALUE"]?>
                                <img data-src="<?=STATIC_PATH?>img/flags/<?=$arItem["PROPERTIES"]["BRAND"]["DETAIL"]["PROPERTIES"]["COUNTRY"]["VALUE_XML_ID"]?>.svg" alt=""
                                     class="catalog-card__country-flag lazyload">
                            </div>
                        <?endif;?>
                        <?if($arItem["PROPERTIES"]["rating"]["VALUE"]):?>
                            <div class="catalog-card__rating">
                                <svg width="14" height="14" aria-hidden="true" class="icon-star">
                                    <use xlink:href="#star"></use>
                                </svg>
                                <?=round($arItem["PROPERTIES"]["rating"]["VALUE"])?>
                            </div>
                            <div class="catalog-card__reviews">
                                <?$count = count($arItem["PROPERTIES"]["vote_count"]["VALUE"])?>
                                <?=\Sl\Core\Tools::declOfNum($count, ["отзыв", "отзыва", "отзывов"])?>
                            </div>
                        <?endif;?>

                        <div class="catalog-card__tags">
                            <div class="catalog-card__tag">
                                <svg width="14" height="14" aria-hidden="true" class="icon-<?=$arItem["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE_XML_ID"]?>">
                                    <use xlink:href="#<?=$arItem["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE_XML_ID"]?>"></use>
                                </svg>
                                <?=$arItem["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE"]?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="catalog-card__main-content">
                    <h4 class="catalog-card__title">
                        <?=$arItem["NAME"]?>
                    </h4>
                    <div class="catalog-card__description">
                        <?=$arItem["PROPERTIES"]["DESTINATION"]["VALUE"]?>
                    </div>
                </div>
                <div class="catalog-card__stats">
                    <?if($arItem["PROPERTIES"]["ATT_AREA_SURFACES"]["VALUE"]):?>
                        <div class="catalog-card__stats-item">
                            <div class="catalog-card__stats-key">
                                <svg width="14" height="14" aria-hidden="true" class="icon-area">
                                    <use xlink:href="#area"></use>
                                </svg>
                                <span class="catalog-card__stats-key-text">
                                    Площадь заливки
                                </span>
                            </div>
                            <div class="catalog-card__stats-value">
                                <?=number_format($arItem["PROPERTIES"]["ATT_AREA_SURFACES"]["VALUE"], 0, ',', ' ' );?> м²
                            </div>
                        </div>
                    <?endif;?>
                    <?if($arItem["PROPERTIES"]["ATT_WATER_TANK"]["VALUE"]):?>
                        <div class="catalog-card__stats-item">
                            <div class="catalog-card__stats-key">
                                <svg width="14" height="14" aria-hidden="true" class="icon-water">
                                    <use xlink:href="#water"></use>
                                </svg>
                                <span class="catalog-card__stats-key-text">
                                    Ёмкость для воды
                                </span>
                            </div>
                            <div class="catalog-card__stats-value">
                                <?=number_format($arItem["PROPERTIES"]["ATT_WATER_TANK"]["VALUE"], 0, ',', ' ' );?> л.
                            </div>
                        </div>
                    <?endif;?>
                    <?if($arItem["PROPERTIES"]["ATT_HOPPER_VOLUME"]["VALUE"]):?>
                        <div class="catalog-card__stats-item">
                            <div class="catalog-card__stats-key">
                                <svg width="14" height="14" aria-hidden="true" class="icon-snow">
                                    <use xlink:href="#snow"></use>
                                </svg>
                                <span class="catalog-card__stats-key-text">
                                    Ёмкость для снега
                                </span>
                            </div>
                            <div class="catalog-card__stats-value">
                                <?=$arItem["PROPERTIES"]["ATT_HOPPER_VOLUME"]["VALUE"]?> м³
                            </div>
                        </div>
                    <?endif;?>
                </div>
                <?if($price = $arItem["PROPERTIES"]["PRICE"]["VALUE"]):?>
                    <span class="catalog-card__price"><?=number_format($price, 0, ',', ' ' )?> ₽</span>
                <?endif;?>
                <div class="catalog-card__btns">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="blue-small-btn catalog-card__details-btn">
                        Смотреть <span class="hide-on-mobile">модель</span>
                    </a>
                    <!--<a href="#" class="catalog-card__like-btn js-like-btn">
                        <svg width="14" height="14" aria-hidden="true" class="icon-heart">
                            <use xlink:href="#heart"></use>
                        </svg>
                    </a>-->
                    <a href="#" class="catalog-card__fav-btn js-comparison-btn" data-id="<?=$arItem["ID"]?>">
                        <svg width="14" height="14" aria-hidden="true" class="icon-comparisons">
                            <use xlink:href="#comparisons"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </li>

        <?if($key == 2):?>
            <?if($seo = $arResult["SEO_1"]):?>
                <li class="catalog-page__results-special-item">
                    <p class="catalog-page__results-special-text"><?=$seo?></p>
                </li>
            <?endif;?>
            <li class="catalog-page__results-special-item">
                <div class="catalog-page__help">
                    <h4 class="catalog-page__help-heading">
                        Поможем с выбором техники под ваши цели!
                    </h4>

                    <?$APPLICATION->IncludeComponent("bitrix:iblock.element.add.form", "catalog-page__help-form", Array(
                        "CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",	// * дата начала *
                        "CUSTOM_TITLE_DATE_ACTIVE_TO" => "",	// * дата завершения *
                        "CUSTOM_TITLE_DETAIL_PICTURE" => "",	// * подробная картинка *
                        "CUSTOM_TITLE_DETAIL_TEXT" => "",	// * подробный текст *
                        "CUSTOM_TITLE_IBLOCK_SECTION" => "",	// * раздел инфоблока *
                        "CUSTOM_TITLE_NAME" => "+7 000 000-00-00",	// * наименование *
                        "CUSTOM_TITLE_PREVIEW_PICTURE" => "",	// * картинка анонса *
                        "CUSTOM_TITLE_PREVIEW_TEXT" => "",	// * текст анонса *
                        "CUSTOM_TITLE_TAGS" => "",	// * теги *
                        "DEFAULT_INPUT_SIZE" => "30",	// Размер полей ввода
                        "DETAIL_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования подробного текста
                        "ELEMENT_ASSOC" => "CREATED_BY",	// Привязка к пользователю
                        "GROUPS" => array(	// Группы пользователей, имеющие право на добавление/редактирование
                            0 => "2",
                        ),
                        "IBLOCK_ID" => "11",	// Инфоблок
                        "IBLOCK_TYPE" => "forms",	// Тип инфоблока
                        "LEVEL_LAST" => "Y",	// Разрешить добавление только на последний уровень рубрикатора
                        "LIST_URL" => "",	// Страница со списком своих элементов
                        "MAX_FILE_SIZE" => "0",	// Максимальный размер загружаемых файлов, байт (0 - не ограничивать)
                        "MAX_LEVELS" => "100000",	// Ограничить кол-во рубрик, в которые можно добавлять элемент
                        "MAX_USER_ENTRIES" => "100000",	// Ограничить кол-во элементов для одного пользователя
                        "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования текста анонса
                        "PROPERTY_CODES" => array(	// Свойства, выводимые на редактирование
                            0 => "117",
                            1 => "NAME",
                        ),
                        "PROPERTY_CODES_REQUIRED" => array(	// Свойства, обязательные для заполнения
                            0 => "NAME",
                            1 => "117",
                        ),
                        "RESIZE_IMAGES" => "N",	// Использовать настройки инфоблока для обработки изображений
                        "SEF_MODE" => "N",	// Включить поддержку ЧПУ
                        "STATUS" => "ANY",	// Редактирование возможно
                        "STATUS_NEW" => "N",	// Деактивировать элемент
                        "USER_MESSAGE_ADD" => "",	// Сообщение об успешном добавлении
                        "USER_MESSAGE_EDIT" => "",	// Сообщение об успешном сохранении
                        "USE_CAPTCHA" => "N",	// Использовать CAPTCHA
                    ),
                        false
                    );?>
                </div>
            </li>
        <?endif;?>
    <?endforeach;?>

    <li class="catalog-page__results-special-item">
        <div class="promo__card promo__card--compact">
            <picture>
                <source data-srcset="<?=STATIC_PATH?>img/umka-mobile.jpg" media="(max-width: 640px)">
                <img data-src="<?=STATIC_PATH?>img/umka-compact.jpg" alt="" class="promo__card-image lazyload">
            </picture>
            <h2 class="promo__card-heading">
                УМКА — универсальная машина для обслуживания катков и решения коммунальных задач
            </h2>
            <ul class="promo__advantages-list">
                <li class="promo__advantages-item">
                    <img data-src="<?=STATIC_PATH?>img/promo/1.svg" alt="" class="promo__advantages-icon lazyload">
                    <div class="promo__advantages-content">
                        <div class="promo__advantages-text">
                            Привлекательная цена
                        </div>
                    </div>
                </li>
                <li class="promo__advantages-item">
                    <img data-src="<?=STATIC_PATH?>img/promo/2.svg" alt="" class="promo__advantages-icon lazyload">

                    <div class="promo__advantages-content">
                        <div class="promo__advantages-text">
                            Наличие кабины
                        </div>
                    </div>
                </li>
                <li class="promo__advantages-item">
                    <img data-src="<?=STATIC_PATH?>img/promo/3.svg" alt="" class="promo__advantages-icon lazyload">
                    <div class="promo__advantages-content">
                        <div class="promo__advantages-text">
                            3 года гарантии
                        </div>
                    </div>
                </li>

            </ul>
            <div class="promo__btns">


                <a href="/catalog/ldozalivochnye-mashiny/umka/" class="small-arrow-btn-filled small-arrow-btn-filled--orange promo__btn">
                    Смотреть модель
                    <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                        <use xlink:href="#diagonal-arrow"></use>
                    </svg>
                </a>
                <a href="/catalog/ldozalivochnye-mashiny/umka/" class="arrow-btn arrow-btn--white promo__all-specs-btn">
                    Все характеристики
                </a>
            </div>
        </div>
    </li>

    <?if($seo = $arResult["SEO_2"]):?>
        <li class="catalog-page__results-special-item">
            <p class="catalog-page__results-special-text"><?=$seo?></p>
        </li>
    <?endif;?>
</ul>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?>
<?endif;?>

