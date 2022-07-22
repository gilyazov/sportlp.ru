<?php
// бренды
$arSelect = Array("ID", "NAME", "IBLOCK_ID");
$arFilter = Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $arFields["PROPERTIES"] = $ob->GetProperties();

    $arResult["BRAND"][$arFields["ID"]] = $arFields;
}

// отзывы
$arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PROPERTY_RATING", "PROPERTY_PRODUCT");
$arFilter = Array("IBLOCK_ID"=>8, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();

    $arReview[$arFields["PROPERTY_PRODUCT_VALUE"]][] = $arFields["PROPERTY_RATING_VALUE"];

    /*$arResult["RATING"] += $arFields["PROPERTY_RATING_VALUE"];
    $arResult["REVIEWS"][] = $arFields;*/
}

foreach ($arResult["ITEMS"] as &$arItem){
    if ($brandID = $arItem["PROPERTIES"]["BRAND"]["VALUE"]) {
        /*echo "<pre>";
        print_r($arResult["BRAND"][$brandID]);
        echo "</pre>";*/
        $arItem["PROPERTIES"]["BRAND"]["DETAIL"] = $arResult["BRAND"][$brandID];
    }

    $arItem["REVIEWS"] = $arReview[$arItem["ID"]];
}

// SEO текст
if ($section = $arResult['SECTION']['PATH'][0]['ID']){
    $arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ID'=>$section);
    $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, false, ["UF_SEO_1", "UF_SEO_2"]);
    if($arSection = $db_list->GetNext())
    {
        $arResult["SEO_1"] = $arSection["UF_SEO_1"];
        $arResult["SEO_2"] = $arSection["UF_SEO_2"];
    }
}
