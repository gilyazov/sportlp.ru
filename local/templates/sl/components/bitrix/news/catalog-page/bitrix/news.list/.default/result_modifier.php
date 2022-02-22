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
foreach ($arResult["ITEMS"] as &$arItem){
    if ($brandID = $arItem["PROPERTIES"]["BRAND"]["VALUE"]) {
        /*echo "<pre>";
        print_r($arResult["BRAND"][$brandID]);
        echo "</pre>";*/
        $arItem["PROPERTIES"]["BRAND"]["DETAIL"] = $arResult["BRAND"][$brandID];
    }
}