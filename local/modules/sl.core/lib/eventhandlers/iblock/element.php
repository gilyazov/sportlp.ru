<?php


namespace Iteko\Core\EventHandlers\Iblock;

use Bitrix\Main\Web\HttpClient;
use Bitrix\Main\Loader;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

class Element
{
    public function OnBeforeIBlockElementAddHandler(&$arFields)
    {
        if (in_array($arFields['IBLOCK_ID'], [9, 10, 11])) {
            global $APPLICATION;

            $arFields['PROPERTY_VALUES']['TITLE'] = $APPLICATION->GetProperty("title");
            $arFields['PROPERTY_VALUES']['LINK'] = $APPLICATION->GetCurPage();
        }
    }

    public function OnAfterIBlockElementAddHandler(&$arFields)
    {
        if (in_array($arFields['IBLOCK_ID'], [9, 10, 11])) {
            global $APPLICATION;
            $APPLICATION->RestartBuffer();

            $arSelect = array("ID", "IBLOCK_ID", "NAME", "IBLOCK_NAME");
            $arFilter = array("IBLOCK_ID" => $arFields["IBLOCK_ID"], "ID" => $arFields["ID"], "ACTIVE" => "Y");
            $res = \CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
            if ($ob = $res->GetNextElement()) {
                $arFieldsBx = $ob->GetFields();
                $arProps = $ob->GetProperties();

                if ($arProps["THEME"]["VALUE"]){
                    $arStatus = self::getStatus($arProps["THEME"]["VALUE"]);
                    $sendFields["UF_MAIL_TO"] = $arStatus["UF_MAIL_TO"];
                    $sendFields["UF_MAIL_TO_COPY"] = $arStatus["UF_MAIL_TO_COPY"];
                }

                $sendFields['THEME'] = self::getTheme($arFieldsBx, $arFields, $arStatus["UF_NAME"]);
                $sendFields['NAME'] = $arFieldsBx['NAME'];

                foreach ($arProps as $prop) {
                    if (!$prop["VALUE"]) {
                        continue;
                    }

                    if ($prop['PROPERTY_TYPE'] == 'F') {
                        $sendFields['FIELDS'] .= "<tr><td>$prop[NAME]</td><td><a href='" . \CFile::GetPath($prop["VALUE"]) . "'>Скачать</a></td></tr>";
                    } elseif ($prop['CODE'] == 'LINK') {
                        $link = "https://www.i-teco.ru" . $prop[VALUE];
                        $sendFields['FIELDS'] .= "<tr><td>$prop[NAME]</td><td><a href='" . $link . "'>" . $link . "</a></td></tr>";
                    } elseif ($prop['USER_TYPE'] == 'directory') {
                        $sendFields['FIELDS'] .= "<tr><td>$prop[NAME]</td><td>" . $arStatus["UF_NAME"] . "</td></tr>";
                    } else {
                        $sendFields['FIELDS'] .= "<tr><td>$prop[NAME]</td><td>$prop[VALUE]</td></tr>";
                    }
                }
            }

            $result = \Bitrix\Main\Mail\Event::send(array(
                "EVENT_NAME" => "FEEDBACK_FORM",
                "LANGUAGE_ID" => LANGUAGE_ID,
                "MESSAGE_ID" => self::getMessageId($arFieldsBx["IBLOCK_ID"]),
                "LID" => SITE_ID,
                "DUPLICATE" => "N",
                "C_FIELDS" => $sendFields
            ));

            if ($arFieldsBx["IBLOCK_ID"] == 11 && $result->isSuccess()) {
                $context = \Bitrix\Main\Application::getInstance()->getContext();
                $request = $context->getRequest();
                $date = $request->getPost("event-date");

                \Bitrix\Main\Mail\Event::send(array(
                    "EVENT_NAME" => "FEEDBACK_FORM",
                    "LANGUAGE_ID" => LANGUAGE_ID,
                    "MESSAGE_ID" => 14,
                    "LID" => SITE_ID,
                    "DUPLICATE" => "N",
                    "C_FIELDS" => [
                        "EMAIL_TO" => $arProps["EMAIL"]["VALUE"],
                        "NAME" => $arFieldsBx["NAME"],
                        "EVENT" => $arFields["PROPERTY_VALUES"]["TITLE"],
                        "DATE" => \FormatDate("j F", \strtotime($date)),
                        "TIME" => \FormatDate("H:i", \strtotime($date))
                    ]
                ));
            }

            echo \Bitrix\Main\Web\Json::encode(['ID' => $arFields['ID'], 'TITLE' => $arFields["PROPERTY_VALUES"]["TITLE"]]);
            die();
        }
    }

    protected static function getTheme($fieldBx, $arFields, $status = ""): string
    {
        $theme = $fieldBx['IBLOCK_NAME'];

        if ($fieldBx['IBLOCK_ID'] == 10) {
            $theme .= ": " . $arFields["PROPERTY_VALUES"]["TITLE"];
        } elseif ($fieldBx['IBLOCK_ID'] == 11) {
            $theme = "Регистрация на " . $arFields["PROPERTY_VALUES"]["TITLE"];
        } elseif ($fieldBx['IBLOCK_ID'] == 9) {
            $theme = "Запрос с сайта по теме: " . $status;
        }

        return $theme;
    }

    protected static function getMessageId($iblockId): int
    {
        $messageId = 7;

        if ($iblockId == 10) {
            $messageId = 12;
        } elseif ($iblockId == 11) {
            $messageId = 13;
        }

        return $messageId;
    }

    protected static function getStatus($id){
        Loader::includeModule("highloadblock");

        $hlbl = 3; // Указываем ID нашего highloadblock блока к которому будет делать запросы.
        $hlblock = HL\HighloadBlockTable::getById($hlbl)->fetch();

        $entity = HL\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();

        $rsData = $entity_data_class::getList(array(
            "select" => array("*"),
            "order" => array("ID" => "ASC"),
            "filter" => [
                "UF_XML_ID" => $id
            ]
        ));

        if($arData = $rsData->Fetch()){
            return $arData;
        }
    }
}