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
//$arProperties = $arParams["PARAMS"];
//unset($arResult["PARAMS"]);
//echo "<pre>";
//print_r($templateData);
//echo "</pre>";

$itemCount = count($arResult);
$needReload = (isset($_REQUEST["compare_list_reload"]) && $_REQUEST["compare_list_reload"] == "Y");
$idCompareCount = 'compareList'.$this->randString();
$obCompare = 'ob'.$idCompareCount;

$style = ($itemCount == 0 ? ' style="display: none;"' : '');
?>
<section id="<?=$idCompareCount; ?>" class="comparison-page" ">
<div class="container">
    <div class="comparison-page__top-row">
        <h1 class="comparison-page__heading">
            сравнение
        </h1>

        <a href="<?=$APPLICATION->GetCurPageParam("excel=Y", ["excel"]);?>" class="comparison-page__download" download=""<?=$style; ?>>
            <svg width="14" height="14" aria-hidden="true" class="icon-pdf">
                <use xlink:href="#pdf"></use>
            </svg>
            <div class="comparison-page__download-content">
                <div class="comparison-page__download-text">
                    <span>
                        Скачать сравнение <span class="hide-on-mobile">моделей</span>
                    </span>
                </div>
                <div class="comparison-page__download-format">
                    excel
                </div>
            </div>
        </a>
        <a href="#" class="comparison-page__add-simple">
            <svg width="14" height="14" aria-hidden="true" class="icon-add-simple">
                <use xlink:href="#add-simple"></use>
            </svg>
        </a>
    </div>
<?
    unset($style, $mainClass);
    if ($needReload)
    {
        $APPLICATION->RestartBuffer();
    }
    $frame = $this->createFrame($idCompareCount)->begin('');
        ?>
        <div class="comparison-page__fixed-cards">
            <div class="container">
                <div class="comparison-page__fixed-cards-wrapper">
                    <div class="comparison-page__fixed-cards-inner<?if($itemCount > 2):?> comparison-page__fixed-cards-inner--fullwidth<?endif;?>" _data-block="item-list">
                        <?foreach($arResult as $arElement):?>
                            <div class="comparison-page__fixed-card">
                                <a href="<?=$arElement["DELETE_URL"]?>" class="comparison-page__fixed-card-delete" rel="nofollow" data-id="<?=$arElement['PARENT_ID']; ?>">
                                    <svg width="14" height="14" aria-hidden="true" class="icon-close">
                                        <use xlink:href="#close"></use>
                                    </svg>
                                </a>

                                <div class="comparison-page__fixed-card-top-row">
                                    <div class="comparison-page__fixed-card-image-container">
                                        <img src="<?=Sl\Core\Tools::resizeImage($arElement["PREVIEW_PICTURE"], 420, 360, true)?>" alt="" class="comparison-page__fixed-card-image">
                                    </div>
                                    <h3 class="comparison-page__fixed-card-title"><?=$arElement["NAME"]?></h3>
                                </div>
                                <a href="#callback-modal"
                                   class="arrow-btn-small arrow-btn-small--filled comparison-page__fixed-card-link js-open-modal">
                                    <span class="comparison-page__fixed-card-link-desktop-text">
                                        Оставить заявку
                                    </span>
                                    <span class="comparison-page__fixed-card-link-mobile-text">
                                        Заявка
                                    </span>
                                    <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                                        <use xlink:href="#diagonal-arrow"></use>
                                    </svg>
                                </a>
                                <div class="comparison-page__fixed-card-selector">
                                    <a href="#" class="comparison-page__fixed-card-selector-btn">
                                        <svg width="14" height="14" aria-hidden="true" class="icon-arrow-left">
                                            <use xlink:href="#arrow-left"></use>
                                        </svg>
                                    </a>
                                    <div class="comparison-page__fixed-card-selector-pagination">
                                        1 из 3
                                    </div>
                                    <a href="#" class="comparison-page__fixed-card-selector-btn">
                                        <svg width="14" height="14" aria-hidden="true" class="icon-arrow-left">
                                            <use xlink:href="#arrow-right"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="comparison-page__details">
            <div class="comparison-page__main-info">
                <?if ($itemCount > 0):?>
                    <div class="comparison-page__toggle">
                        <div class="comparison-page__toggle-text">
                            Показывать только различающиеся параметры
                        </div>
                        <label class="comparison-page__toggle-btn">
                            <input type="checkbox" name="difference" value="1" class="comparison-page__toggle-input">
                            <div class="comparison-page__toggle-selector">

                            </div>
                        </label>
                    </div>
                <?endif;?>
                <?foreach($arResult as $arElement):?>
                    <div class="comparison-page__card">
                        <a href="<?=$arElement["DELETE_URL"]?>" class="comparison-page__card-delete" data-id="<?=$arElement['PARENT_ID']; ?>">
                            <svg width="14" height="14" aria-hidden="true" class="icon-close">
                                <use xlink:href="#close"></use>
                            </svg>
                        </a>
                        <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                            <div class="comparison-page__card-image-container">
                                <img src="<?=Sl\Core\Tools::resizeImage($arElement["PREVIEW_PICTURE"], 420, 360, true)?>" alt="" class="comparison-page__card-image">
                            </div>
                            <h3 class="comparison-page__card-title">
                                <?=$arElement["NAME"]?>
                            </h3>
                        </a>
                        <div class="comparison-page__card-features">
                            <div class="comparison-page__card-features-item comparison-page__card-features-item--blue">
                                <svg width="14" height="14" aria-hidden="true" class="icon-<?=$arElement["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE_XML_ID"]?>">
                                    <use xlink:href="#<?=$arElement["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE_XML_ID"]?>"></use>
                                </svg>
                                <?=$arElement["PROPERTIES"]["ATT_TYPE_FUEL"]["VALUE"]?>
                            </div>
                            <div class="comparison-page__card-features-item">
                                <svg width="14" height="14" aria-hidden="true" class="icon-size">
                                    <use xlink:href="#size"></use>
                                </svg>
                                <?=$arElement["PROPERTIES"]["ATT_APPOINTMENT"]["VALUE"]?>
                            </div>
                        </div>
                        <a href="#callback-modal"
                           class="arrow-btn-small arrow-btn-small--filled comparison-page__card-link js-open-modal">
                            Оставить заявку
                            <svg width="14" height="14" aria-hidden="true" class="icon-diagonal-arrow">
                                <use xlink:href="#diagonal-arrow"></use>
                            </svg>
                        </a>
                    </div>
                <?endforeach;?>

                <?if($itemCount <= 2):?>
                    <a href="/catalog/" class="comparison-page__add-model">
                        <svg width="14" height="14" aria-hidden="true" class="icon-add">
                            <use xlink:href="#add"></use>
                        </svg>
                        <div class="comparison-page__add-model-text">
                            Добавьте модель к сравнению
                        </div>
                    </a>
                <?endif;?>
            </div>
            <?foreach ($arParams["PARAMS"] as $key => $arParams):?>
                <div class="comparison-page__params-block js-accordion">
                    <div class="comparison-page__params-block-btn-wrapper">
                        <a href="#" class="comparison-page__params-block-btn js-accordion-btn">
                            <svg width="14" height="14" aria-hidden="true" class="icon-<?=$arParams["ICO"]?><?if($key == 0):?> icon-blue<?endif;?>">
                                <use xlink:href="#<?=$arParams["ICO"]?>"></use>
                            </svg>
                            <?=$arParams["NAME"]?>
                            <svg width="14" height="14" aria-hidden="true" class="icon-arrow-down">
                                <use xlink:href="#arrow-down"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="comparison-page__params-block-content js-accordion-content">
                        <div class="comparison-page__params-block-content-inner">
                            <?if($key == 0):?>
                                <div class="comparison-page__key-params">
                                    <?foreach ($arParams["PROPERTIES"] as $code => $arProp):?>
                                        <div class="comparison-page__key-params-row">
                                        <div class="comparison-page__key-params-heading">
                                            <?if($arProp["ICO"]):?>
                                                <svg width="14" height="14" aria-hidden="true" class="icon-<?=$arProp["ICO"]?>">
                                                    <use xlink:href="#<?=$arProp["ICO"]?>"></use>
                                                </svg>
                                            <?endif;?>
                                            <?=$arProp["NAME"]?>
                                        </div>
                                        <?$different = false;?>
                                        <?foreach ($arResult as $arItem):?>
                                            <?
                                            if (isset($value) && $arItem["PROPERTIES"][$code]["VALUE"] != $value){
                                                $different = true;
                                            }
                                            $value = $arItem["PROPERTIES"][$code]["VALUE"];
                                            ?>
                                            <div class="comparison-page__key-params-cell<?if($different):?> js-different<?endif;?>">
                                                <?=($value ?: "–")?>
                                            </div>
                                        <?endforeach;?>
                                    </div>
                                    <?endforeach;?>
                                </div>
                            <?else:?>
                                <div class="comparison-page__params-table">
                                    <table>
                                        <tbody>
                                            <?foreach ($arParams["PROPERTIES"] as $code => $arProp):?>
                                                <tr>
                                                    <th>
                                                        <?=$arProp["NAME"]?>
                                                    </th>
                                                    <?$different = false;?>
                                                    <?foreach ($arResult as $arItem):?>
                                                        <?
                                                            if (isset($value) && $arItem["PROPERTIES"][$code]["VALUE"] != $value){
                                                                $different = true;
                                                            }
                                                            $value = $arItem["PROPERTIES"][$code]["VALUE"];
                                                        ?>
                                                        <td class="<?if($different):?>js-different<?endif;?><?if(!$value):?> grey<?endif;?>">
                                                            <?=($value ?: "–")?>
                                                        </td>
                                                    <?endforeach;?>
                                                </tr>
                                            <?endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            <?endif;?>
                        </div>
                    </div>
                </div>
            <?endforeach;?>
        </div>

        <?if ($itemCount > 0):?>
            <a href="<?=$APPLICATION->GetCurPageParam("excel=Y", ["excel"]);?>" class="comparison-page__download comparison-page__bottom-download-link" download="">
                <svg width="14" height="14" aria-hidden="true" class="icon-pdf">
                    <use xlink:href="#pdf"></use>
                </svg>
                <div class="comparison-page__download-content">
                    <div class="comparison-page__download-text">
                        <span>
                            Скачать сравнение моделей
                        </span>
                    </div>
                    <div class="comparison-page__download-format">
                        excel
                    </div>
                </div>
            </a>
        <?endif;?>

        <!--<table class="compare-items" data-block="item-list">
            <thead><tr><td align="center" colspan="2"><?/*=GetMessage("CATALOG_COMPARE_ELEMENTS")*/?></td></tr></thead>
            <tbody><?/*
            foreach($arResult as $arElement)
            {
                */?><tr data-block="item-row" data-row-id="row<?/*=$arElement['PARENT_ID']; */?>">
                <td><a href="<?/*=$arElement["DETAIL_PAGE_URL"]*/?>"><?/*=$arElement["NAME"]*/?></a></td>
                <td><noindex><a href="javascript:void(0);" data-id="<?/*=$arElement['PARENT_ID']; */?>" rel="nofollow"><?/*=GetMessage("CATALOG_DELETE")*/?></a></noindex></td>
                </tr><?/*
            }
            */?>
            </tbody>
        </table>-->
        <?

    $frame->end();
    if ($needReload)
    {
        die();
    }
    $currentPath = CHTTP::urlDeleteParams(
        $APPLICATION->GetCurPageParam(),
        array(
            $arParams['PRODUCT_ID_VARIABLE'],
            $arParams['ACTION_VARIABLE'],
            'ajax_action'
        ),
        array("delete_system_params" => true)
    );

    $jsParams = array(
        'VISUAL' => array(
            'ID' => $idCompareCount,
        ),
        'AJAX' => array(
            'url' => $currentPath,
            'params' => array(
                'ajax_action' => 'Y'
            ),
            'reload' => array(
                'compare_list_reload' => 'Y'
            ),
            'templates' => array(
                'delete' => (mb_strpos($currentPath, '?') === false ? '?' : '&').$arParams['ACTION_VARIABLE'].'=DELETE_FROM_COMPARE_LIST&'.$arParams['PRODUCT_ID_VARIABLE'].'='
            )
        ),
        'POSITION' => array(
            'fixed' => $arParams['POSITION_FIXED'] == 'Y',
            'align' => array(
                'vertical' => $arParams['POSITION'][0],
                'horizontal' => $arParams['POSITION'][1]
            )
        )
    );
    ?>
</div>
</section>
<script type="text/javascript">
var <?=$obCompare; ?> = new JCCatalogCompareList(<? echo CUtil::PhpToJSObject($jsParams, false, true); ?>)
</script>