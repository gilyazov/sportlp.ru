<?php
// бренды
$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "PROPERTY_BG", "PREVIEW_TEXT", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(["SORT" => "ASC"], $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $arFields["PROPERTIES"] = $ob->GetProperties();
    
    $arResult["BRANDS"][$arFields["ID"]] = $arFields;
}
// end

foreach ($arResult["ITEMS"] as &$arItem){
    if ($brandID = $arItem["PROPERTIES"]["BRAND"]["VALUE"]) {
        $arItem["PROPERTIES"]["BRAND"]["DETAIL"] = $arResult["BRANDS"][$brandID];
    }

    $arResult["BRANDS"][$arItem["PROPERTIES"]["BRAND"]["VALUE"]]["ITEMS"][] = $arItem;
}

if(!function_exists('declNum')){
    /**
     * Возврат окончания слова при склонении
     *
     * Функция возвращает окончание слова, в зависимости от примененного к ней числа
     * Например: 5 товаров, 1 товар, 3 товара
     *
     * @param int $value - число, к которому необходимо применить склонение
     * @param array $status - массив возможных окончаний
     * @return mixed
     */
    function declNum($value=1, $status= array('','а','ов'))
    {
        $array =array(2,0,1,1,1,2);
        return $status[($value%100>4 && $value%100<20)? 2 : $array[($value%10<5)?$value%10:5]];
    }
}