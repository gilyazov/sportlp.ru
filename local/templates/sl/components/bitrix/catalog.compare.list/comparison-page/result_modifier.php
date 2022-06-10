<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Web\Uri;

// фикс количества в счетчике при удалении
if ($_REQUEST["action"] == "DELETE_FROM_COMPARE_LIST"){
    LocalRedirect($APPLICATION->GetCurPage());
}

if (count($arResult)){
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE");
    $arFilter = Array("IBLOCK_ID"=>2, "ID"=>array_keys($arResult), "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arFields["PROPERTIES"] = $ob->GetProperties();

        //    $arResult["ITEMS"][$arFields["ID"]] = array_merge($arResult["ITEMS"][$arFields["ID"]], $arFields);
        $arResult[$arFields["ID"]] = array_merge($arResult[$arFields["ID"]], $arFields);
    }

    $arParams["PARAMS"] = [
        [
            "NAME" => "Ключевые параметры",
            "ICO" => "star",
            "PROPERTIES" => [
                "ATT_AREA_SURFACES" => [
                    "ICO" => "params-area",
                    "NAME" => "Площадь заливки, м²"
                ],
                "ATT_ICE_POURING_WATER" => [
                    "ICO" => "params-water",
                    "NAME" => "Ёмкость для воды, л",
                ],
                "ATT_HOPPER_SNOW" => [
                    "ICO" => "params-snow",
                    "NAME" => "Ёмкость для снега, м³",
                ],
                "ATT_POWER" => [
                    "ICO" => "params-power",
                    "NAME" => "Мощность, л.с.",
                ],
                "ATT_BATTERY_CAPACITY" => [
                    "ICO" => "",
                    "NAME" => "Ёмкость аккумулятора, ампер-часов",
                ],
                "ATT_TYPE_FUEL" => [
                    "ICO" => "",
                    "NAME" => "Вид топлива",
                ],
            ]
        ],
        [
            "NAME" => "Размеры",
            "ICO" => "dimensions",
            "PROPERTIES" => [
                "ATT_LENGTH_OPEN_HOPPER" => [
                    "NAME" => "Длина с открытым бункером, cм",
                ],
                "ATT_LENGTH_CLOSED_HOPPER" => [
                    "NAME" => "Длина с закрытым бункером, cм",
                ],
                "ATT_HEIGHT_OPEN_HOPPER" => [
                    "NAME" => "Высота с открытым бункером, cм",
                ],
                "ATT_HEIGHT_CLOSED_HOPPER" => [
                    "NAME" => "Высота с закрытым бункером, cм",
                ],
                "ATT_HEIGHT_CAB" => [
                    "NAME" => "Высота с кабиной, см",
                ],
                "ATT_FULL_WIDTH" => [
                    "NAME" => "Полная ширина, cм",
                ],
                "ATT_KNIFE_WIDTH" => [
                    "NAME" => "Ширина ножа, cм",
                ],
                "ATT_TURNING_RADIUS" => [
                    "NAME" => "Радиус разворота, cм",
                ],
                "ATT_CONDITIONER_WIDTH" => [
                    "NAME" => "Ширина кондиционера, cм",
                ],
                "ATT_AREA_SURFACES" => [
                    "NAME" => "Площадь обрабатываемых поверхностей, м²",
                ],
            ]
        ],
        [
            "NAME" => "Вместительность баков",
            "ICO" => "tank",
            "PROPERTIES" => [
                "ATT_HOPPER_SNOW" => [
                    "NAME" => "Емкость бункера для снега / сжатого снега, м³",
                ],
                "ATT_ICE_POURING_WATER" => [
                    "NAME" => "Емкость водяного бака для заливки льда, л",
                ],
                "ATT_ICE_WASHING_WATER" => [
                    "NAME" => "Емкость водяного бака для мойки льда, л",
                ],
                "ATT_HYDRAULIC_OIL_TANK" => [
                    "NAME" => "Бак гидравлического масла (х2), л",
                ],
            ]
        ],
        [
            "NAME" => "Вес",
            "ICO" => "weight",
            "PROPERTIES" => [
                "ATT_EMPTY_CAR_WEIGHT" => [
                    "NAME" => "Вес пустой машины, кг",
                ],
                "ATT_FULLY_MACHINE_WEIGHT" => [
                    "NAME" => "Вес полностью загруженной машины, кг",
                ],
            ]
        ],
        [
            "NAME" => "Ходовые характеристики",
            "ICO" => "wheel",
            "PROPERTIES" => [
                "ATT_POWER" => [
                    "NAME" => "Мощность, л.с.",
                ],
                "ATT_PETROL" => [
                    "NAME" => "Бензин",
                ],
                "ATT_DIESEL" => [
                    "NAME" => "Дизель",
                ],
                "ATT_PROPANE" => [
                    "NAME" => "Пропан",
                ],
                "ATT_ELECTRO" => [
                    "NAME" => "Электро",
                ],
                "ATT_BATTERY_CAPACITY" => [
                    "NAME" => "Ёмкость аккумулятора, ампер-часов",
                ]
            ]
        ],
        [
            "NAME" => "Комплектация",
            "ICO" => "ok",
            "PROPERTIES" => [
                "ATT_FOUR_WHEEL_DRIVE" => [
                    "NAME" => "Полный привод",
                ],
                "ATT_STEEL_HYDRAULIC_TUBES" => [
                    "NAME" => "Гидравлические трубки из нержавеющей стали",
                ],
                "ATT_EXHAUST_CONTROL_SYSTEM" => [
                    "NAME" => "Система контроля выхлопа",
                ],
                "ATT_STEEL_FRAME" => [
                    "NAME" => "Стальная рама",
                ],
                "ATT_FRONT_UNLOADING" => [
                    "NAME" => "ATT_FRONT_UNLOADING",
                ],
                "ATT_ALUMINUM_TANKS" => [
                    "NAME" => "Алюминиевые водяные баки",
                ],
                "ATT_PE_HD_TANKS" => [
                    "NAME" => "Баки из PE HD",
                ],
                "ATT_ALUMINUM_ALLOY_RIMS" => [
                    "NAME" => "Диски колёс из алюминиевого сплава",
                ],
                "ATT_SIDE_BRUSH" => [
                    "NAME" => "Бортовая щётка",
                ],
                "ATT_AUTO_SNOW_GRINDER" => [
                    "NAME" => "Автоматический снегоизмельчитель",
                ],
                "ATT_AUTO_TOWEL_LIFTER" => [
                    "NAME" => "Автоматический подъёмник полотенца",
                ],
                "ATT_COMPLETE_PACKAGE_LIGHTING" => [
                    "NAME" => "Полный световой пакет с освещением бункера",
                ],
                "ATT_PARKING_BRAKE" => [
                    "NAME" => "Стояночный тормоз",
                ],
                "ATT_DYNAMIC_BRAKING" => [
                    "NAME" => "Динамическое торможение 4-х колес",
                ],
                "ATT_AUTO_PARKING" => [
                    "NAME" => "Автоматический парковочный тормоз",
                ],
                "ATT_REVERSE_BUZZER" => [
                    "NAME" => "Звуковой сигнал заднего хода",
                ],
                "ATT_TOOL_KIT" => [
                    "NAME" => "Комплект инструментов",
                ],
                "ATT_WATER_LVL_INDICATOR" => [
                    "NAME" => "Указатель уровня воды в емкостях",
                ],
                "ATT_OPERATING_INSTRUCTIONS" => [
                    "NAME" => "Сборник инструкций по управлению на русском языке",
                ],
                "ATT_WHEEL_WASH" => [
                    "NAME" => "Мойка колес",
                ],
                "ATT_ICE_WASHING_SYSTEM" => [
                    "NAME" => "Система мойки льда",
                ],
                "ATT_LASER_LVL_SETTING" => [
                    "NAME" => "Автоматический лазерный уровень установки и регулировки ножа",
                ],
                "ATT_AUTO_FILLING_SYSTEM" => [
                    "NAME" => "Автоматическая система наполнения водой",
                ],
                "ATT_STAINLESS_WATER_TANKS" => [
                    "NAME" => "Водяные баки из нержавеющей стали",
                ],
                "ATT_CABIN" => [
                    "NAME" => "Кабина",
                ],
                "ATT_SIDE_DISCHARGE" => [
                    "NAME" => "Боковая выгрузка",
                ],
                "ATT_LARGE_ICE_CUTTER" => [
                    "NAME" => "Нож для подрезки льда увеличенный",
                ],
                "ATT_MAGNETIC_COVER" => [
                    "NAME" => "Чехол магнитный для установки ножа",
                ],
                "ATT_WARM_CABIN" => [
                    "NAME" => "Теплая кабина",
                ],
                "ATT_AUGER_WASHING_SYSTEM" => [
                    "NAME" => "Система промывки шнеков",
                ],
                "ATT_LCD_DISPLAY" => [
                    "NAME" => "ЖК дисплей",
                ],
            ]
        ],
        [
            "NAME" => "Дополнительно",
            "ICO" => "additional",
            "PROPERTIES" => [
                "ATT_WARRANTY" => [
                    "NAME" => "Гарантия, мес",
                ],
                "ATT_DELIVERY_TIME" => [
                    "NAME" => "Срок поставки, мес",
                ]
            ]
        ],
    ];


    foreach ($arResult as &$arItem){
        /*$uri = new Uri($arItem["DELETE_URL"]);
        $uri->deleteParams(array("ajax_action"));
        $uri->addParams(array("ajax_action" => "N"));*/
        $arItem["DELETE_URL"] = "/compare/?action=DELETE_FROM_COMPARE_LIST&id=".$arItem["ID"]."&ajax_action=N";
    }

}
