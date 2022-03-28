<?php
foreach ($arResult["ITEMS"] as $arItem){
    $product1 = $arItem["PROPERTIES"]["PRODUCT_1"]["VALUE"];
    $arProducts[$product1] = $arItem["PROPERTIES"]["PRODUCT_1"]["VALUE"];

    $product2 = $arItem["PROPERTIES"]["PRODUCT_2"]["VALUE"];
    $arProducts[$product2] = $arItem["PROPERTIES"]["PRODUCT_2"]["VALUE"];
}

$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE");
$arFilter = Array("IBLOCK_ID"=>2, "ID"=>$arProducts, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();

    $arResult["PRODUCTS"][$arFields["ID"]] = $arFields;
}