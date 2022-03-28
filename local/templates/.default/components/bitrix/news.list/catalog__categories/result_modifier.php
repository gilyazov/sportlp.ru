<?php
// бренды
$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PICTURE", "PREVIEW_TEXT", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(["SORT" => "ASC"], $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();

    $arResult["BRANDS"][$arFields["ID"]] = $arFields;
}
// end

foreach ($arResult["ITEMS"] as &$arItem){
    if ($arItem["PROPERTIES"]["POPULAR"]["VALUE"]){
        $arResult["POPULAR_ITEMS"][] = $arItem;
    }

    $arResult["BRANDS"][$arItem["PROPERTIES"]["BRAND"]["VALUE"]]["ITEMS"][] = $arItem;
}