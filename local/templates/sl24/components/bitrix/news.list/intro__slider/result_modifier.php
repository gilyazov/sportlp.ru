<?php
foreach($arResult["ITEMS"] as &$arItem){
    if ($id = $arItem["PROPERTIES"]["CATALOG"]["VALUE"]){
        $res = \CIBlockElement::GetByID($id);
        if($arElement = $res->GetNext()){
            $arItem["PROPERTIES"]["CATALOG"]["URL"] = $arElement["DETAIL_PAGE_URL"];
        }
    }
}