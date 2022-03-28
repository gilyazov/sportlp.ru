<?php
foreach ($arResult['ITEMS'] as $key => &$arItem){
    if ($arItem['TYPE'] === 'SELECT'){
        $property_enums = CIBlockPropertyEnum::GetList(
            Array("SORT"=>"ASC"), [
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "PROPERTY_ID" => str_replace("PROPERTY_", "", $key)
        ]);
        while($enum = $property_enums->GetNext())
        {
            $arItem['LIST_FULL'][$enum["ID"]] = $enum;
        }
    }
    elseif ($arItem["INPUT_NAME"] == "arrFilter_pf[BRAND]"){
        $arItem["LIST"][''] = "Все";
        $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, ["ID", "NAME"]);
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $arItem["LIST"][$arFields["ID"]] = $arFields["NAME"];
        }
    }
}