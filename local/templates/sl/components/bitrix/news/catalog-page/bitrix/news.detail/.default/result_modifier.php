<?php
/*// отзывы
$arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PROPERTY_RATING", "PROPERTY_AUTHOR");
$arFilter = Array("IBLOCK_ID"=>8, "PROPERTY_PRODUCT"=>$arResult["ID"], "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();

    $arResult["RATING"] += $arFields["PROPERTY_RATING_VALUE"];

    $arResult["REVIEWS"][] = $arFields;
}

$arResult["RATING"] = $arResult["RATING"] / count($arResult["REVIEWS"]);
$arResult["RATING"] = ceil($arResult["RATING"]/0.5)*0.5;*/

if(!function_exists('is_decimal')){
    function is_decimal( $val )
    {
        return is_numeric( $val ) && floor( $val ) != $val;
    }
}