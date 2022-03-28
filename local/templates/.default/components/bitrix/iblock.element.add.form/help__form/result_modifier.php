<?php

if (count($arResult["PROPERTY_LIST"]) > 1){
    if (($key = array_search(118, $arResult["PROPERTY_LIST"])) !== false) {
        unset($arResult["PROPERTY_LIST"][$key]);
    }
    if (($key = array_search(119, $arResult["PROPERTY_LIST"])) !== false) {
        unset($arResult["PROPERTY_LIST"][$key]);
    }

    array_splice($arResult["PROPERTY_LIST"],1,0,array_shift($arResult["PROPERTY_LIST"]));
}
