<?php
// бренды
$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "PROPERTY_ADVANTAGE", "PREVIEW_TEXT", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>$arParams["SECTION_IB"], "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(["SORT" => "ASC"], $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();

    $arResult["SECTIONS"][$arFields["ID"]] = $arFields;
}
// end

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

$code = $arParams["PROPERTY_CODE"][0];
foreach ($arResult["ITEMS"] as &$arItem){
    if ($brandID = $arItem["PROPERTIES"]["BRAND"]["VALUE"]) {
        $arItem["PROPERTIES"]["BRAND"]["DETAIL"] = $arResult["BRAND"][$brandID];
    }

    $arResult["SECTIONS"][$arItem["PROPERTIES"][$code]["VALUE"]]["ITEMS"][] = $arItem;
}