<?php

foreach($arResult["ITEMS"] as &$arItem){
    $res = CIBlockElement::GetByID($arItem["PROPERTIES"]["ARTICLE"]["VALUE"]);
    if($arArticle = $res->GetNext()){
        $arItem["DETAIL_PAGE_URL"] = $arArticle["DETAIL_PAGE_URL"];
    }
}