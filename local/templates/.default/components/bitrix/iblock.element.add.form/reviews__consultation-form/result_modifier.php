<?php

if (count($arResult["PROPERTY_LIST"]) > 1){
    array_splice($arResult["PROPERTY_LIST"],1,0,array_shift($arResult["PROPERTY_LIST"]));
}
