<?php

namespace Sl\Core\EventHandlers\Iblock;

use Bitrix\Main\Web\HttpClient;

class Element
{
    public function OnBeforeIBlockElementAddHandler(&$arFields)
    {
        /*if (in_array($arFields['IBLOCK_ID'], [9, 10, 11])) {
            global $APPLICATION;

            $arFields['PROPERTY_VALUES']['TITLE'] = $APPLICATION->GetProperty("title");
            $arFields['PROPERTY_VALUES']['LINK'] = $APPLICATION->GetCurPage();
        }*/
    }

    public function OnAfterIBlockElementAddHandler(&$arFields)
    {
        if ($arFields['IBLOCK_ID'] == 11) {
            global $APPLICATION;
            $APPLICATION->RestartBuffer();

            // Amo Crm непонятный код
            $paramsArray = array(
                'fields' => array(
                    'name_1' => ($arFields["PROPERTY_VALUES"][117] ? $arFields["PROPERTY_VALUES"][117] : "Не указано"),
                    '160483_1' => ($arFields["NAME"] ? $arFields["NAME"] : "Не указано"),
                ),
                'form_id' => '899547',
                'hash' => 'affd3b2326ce2e2f0bcdccc09822e75c'
            );

            // преобразуем массив в URL-кодированную строку
            $vars = http_build_query($paramsArray);
            // создаем параметры контекста
            $options = array(
                'http' => array(
                    'method' => 'POST',  // метод передачи данных
                    'header' => 'Content-type: application/x-www-form-urlencoded',  // заголовок
                    'content' => $vars  // переменные
                )
            );
            $context = stream_context_create($options);  // создаём контекст потока
            $result = file_get_contents('https://forms.amocrm.ru/queue/add', false, $context); //отправляем запрос
            // end

            echo \Bitrix\Main\Web\Json::encode(['ID' => $arFields['ID']]);
            die();
        }
    }
}