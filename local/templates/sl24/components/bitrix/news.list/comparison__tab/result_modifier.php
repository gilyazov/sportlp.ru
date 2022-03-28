<?php
$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE");
$arFilter = Array("IBLOCK_ID"=>2, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();

    $arResult["PRODUCTS"][$arFields["ID"]] = $arFields;
}

$arResult["FEATURES"] = [
   [
       "CODE" => "ATT_AREA_SURFACES",
       "ICO" => "area",
       "NAME" => "Площадь заливки, м²"
   ],
    [
        "CODE" => "ATT_WATER_TANK",
        "ICO" => "water",
        "NAME" => "Ёмкость для воды, л"
    ],
    [
        "CODE" => "ATT_HOPPER_VOLUME",
        "ICO" => "snow",
        "NAME" => "Ёмкость для снега, м³"
    ],
    [
        "CODE" => "ATT_WARRANTY",
        "ICO" => "warranty",
        "NAME" => "Гарантия, мес"
    ]
];