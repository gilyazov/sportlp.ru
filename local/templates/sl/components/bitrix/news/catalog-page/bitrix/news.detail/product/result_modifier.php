<?php
$arResult["COMPLETE"] = [
    "ATT_FOUR_WHEEL_DRIVE", "ATT_STEEL_HYDRAULIC_TUBES", "ATT_EXHAUST_CONTROL_SYSTEM",
    "ATT_STEEL_FRAME", "ATT_FRONT_UNLOADING", "ATT_ALUMINUM_TANKS", "ATT_PE_HD_TANKS",
    "ATT_ALUMINUM_ALLOY_RIMS", "ATT_SIDE_BRUSH", "ATT_AUTO_SNOW_GRINDER", "ATT_AUTO_TOWEL_LIFTER",
    "ATT_COMPLETE_PACKAGE_LIGHTING", "ATT_PARKING_BRAKE", "ATT_DYNAMIC_BRAKING", "ATT_AUTO_PARKING",
    "ATT_REVERSE_BUZZER", "ATT_TOOL_KIT", "ATT_WATER_LVL_INDICATOR", "ATT_OPERATING_INSTRUCTIONS",
    "ATT_WHEEL_WASH", "ATT_ICE_WASHING_SYSTEM", "ATT_LASER_LVL_SETTING", "ATT_AUTO_FILLING_SYSTEM",
    "ATT_STAINLESS_WATER_TANKS", "ATT_CABIN", "ATT_SIDE_DISCHARGE", "ATT_LARGE_ICE_CUTTER",
    "ATT_MAGNETIC_COVER", "ATT_WARM_CABIN", "ATT_AUGER_WASHING_SYSTEM", "ATT_LCD_DISPLAY",
    "ATT_PROPANE", "ATT_DIESEL", "ATT_PETROL", "ATT_ELECTRO"
];

// отзывы
$arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PROPERTY_RATING", "PROPERTY_AUTHOR");
$arFilter = Array("IBLOCK_ID"=>8, "PROPERTY_PRODUCT"=>$arResult["ID"], "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();

    $arResult["REVIEWS"][] = $arFields;
}