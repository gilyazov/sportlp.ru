<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);

if (!empty($arResult["ERRORS"])):?>
	<?ShowError(implode("<br />", $arResult["ERRORS"]))?>
<?endif;
if ($arResult["MESSAGE"] <> ''):?>
	<?ShowNote($arResult["MESSAGE"])?>
<?endif?>
<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>"
      class="help__form" data-need-validation=""
      method="post" enctype="multipart/form-data">
	<?=bitrix_sessid_post()?>
	<?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>

    <?foreach ([118, 119] as $propertyID):?>
        <div class="help__form-block">
            <h4 class="help__form-block-heading">
                <?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"]?>
            </h4>

            <?
            $arItem = current($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"]);
            $arValue = explode("|", $arItem["VALUE"]);
            ?>
            <div class="help__form-mobile-select">
                <div class="help__form-mobile-select-content">
                    <div class="help__form-mobile-select-value">
                        <?=$arValue[0]?>
                    </div>
                    <div class="help__form-mobile-select-value-description">
                        <?=$arValue[1]?>
                    </div>
                </div>
                <svg width="14" height="14" aria-hidden="true" class="icon-arrow-down">
                    <use xlink:href="#arrow-down"></use>
                </svg>
            </div>
            <div class="help__form-mobile-select-dropdown">
                <div class="help__form-checkboxes-group<?if(count($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"]) == 3):?> help__form-checkboxes-group--three-col<?endif;?>">
                    <?
                    if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["LIST_TYPE"] == "C")
                        $type = $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y" ? "checkbox" : "radio";
                    else
                        $type = $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y" ? "multiselect" : "dropdown";

                    switch ($type):
                        case "checkbox":
                        case "radio":
                            foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum)
                            {
                                $checked = false;
                                if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                {
                                    if (is_array($arResult["ELEMENT_PROPERTIES"][$propertyID]))
                                    {
                                        foreach ($arResult["ELEMENT_PROPERTIES"][$propertyID] as $arElEnum)
                                        {
                                            if ($arElEnum["VALUE"] == $key)
                                            {
                                                $checked = true;
                                                break;
                                            }
                                        }
                                    }
                                }
                                else
                                {
                                    if ($arEnum["DEF"] == "Y") $checked = true;
                                }

                                ?>
                                <label class="help__form-checkbox" for="property_<?=$key?>">
                                    <input type="<?=$type?>"
                                           class="help__form-checkbox-input"
                                           name="PROPERTY[<?=$propertyID?>]<?=$type == "checkbox" ? "[".$key."]" : ""?>"
                                           value="<?=$key?>"
                                           id="property_<?=$key?>"
                                           <?=$checked ? " checked=\"checked\"" : ""?>/>
                                    <?$arValue = explode("|", $arEnum["VALUE"]);?>
                                    <span class="help__form-checkbox-content-wrapper">
                                        <span class="help__form-checkbox-content">
                                            <span class="help__form-checkbox-value">
                                                <?=$arValue[0]?>
                                            </span>
                                            <span class="help__form-checkbox-description">
                                                <?=$arValue[1]?>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                                <?
                            }
                            break;

                        case "dropdown":
                        case "multiselect":
                            ?>
                            <select name="PROPERTY[<?=$propertyID?>]<?=$type=="multiselect" ? "[]\" size=\"".$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"]."\" multiple=\"multiple" : ""?>">
                                <option value=""><?echo GetMessage("CT_BIEAF_PROPERTY_VALUE_NA")?></option>
                                <?
                                if (intval($propertyID) > 0) $sKey = "ELEMENT_PROPERTIES";
                                else $sKey = "ELEMENT";

                                foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum)
                                {
                                    $checked = false;
                                    if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                    {
                                        foreach ($arResult[$sKey][$propertyID] as $elKey => $arElEnum)
                                        {
                                            if ($key == $arElEnum["VALUE"])
                                            {
                                                $checked = true;
                                                break;
                                            }
                                        }
                                    }
                                    else
                                    {
                                        if ($arEnum["DEF"] == "Y") $checked = true;
                                    }
                                    ?>
                                    <option value="<?=$key?>" <?=$checked ? " selected=\"selected\"" : ""?>><?=$arEnum["VALUE"]?></option>
                                    <?
                                }
                                ?>
                            </select>
                            <?
                            break;
                    endswitch;
                    ?>
                </div>
            </div>
        </div>
    <?endforeach;?>

    <?if (is_array($arResult["PROPERTY_LIST"]) && !empty($arResult["PROPERTY_LIST"])):?>
        <div class="help__form-block">
            <h4 class="help__form-block-heading">
                Контакты для связи
            </h4>
            <div class="help__form-contacts">
            <?foreach ($arResult["PROPERTY_LIST"] as $propertyID):?>
                <div class="help__form-contacts-field" id="help-<?=$propertyID?>-errors">
                    <label class="help__form-contacts-label">
                        <?if (intval($propertyID) > 0):?>
                            <?$placeholder = $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"]?>
                        <?else:?>
                            <?$placeholder = !empty($arParams["CUSTOM_TITLE_".$propertyID]) ? $arParams["CUSTOM_TITLE_".$propertyID] : GetMessage("IBLOCK_FIELD_".$propertyID)?>
                        <?endif?>
                        <span class="help__form-contacts-label-text">
                            <?=$placeholder?>
                        </span>
                        <?
                        if (intval($propertyID) > 0)
                        {
                            if (
                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "T"
                                &&
                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] == "1"
                            )
                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "S";
                            elseif (
                                (
                                    $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "S"
                                    ||
                                    $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "N"
                                )
                                &&
                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] > "1"
                            )
                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "T";
                        }
                        elseif (($propertyID == "TAGS") && CModule::IncludeModule('search'))
                            $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "TAGS";

                        if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y")
                        {
                            $inputNum = ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) ? count($arResult["ELEMENT_PROPERTIES"][$propertyID]) : 0;
                            $inputNum += $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE_CNT"];
                        }
                        else
                        {
                            $inputNum = 1;
                        }

                        if($arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"])
                            $INPUT_TYPE = "USER_TYPE";
                        else
                            $INPUT_TYPE = $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"];

                        switch ($INPUT_TYPE):
                            case "USER_TYPE":
                                for ($i = 0; $i<$inputNum; $i++)
                                {
                                    if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                    {
                                        $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["~VALUE"] : $arResult["ELEMENT"][$propertyID];
                                        $description = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["DESCRIPTION"] : "";
                                    }
                                    elseif ($i == 0)
                                    {
                                        $value = intval($propertyID) <= 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
                                        $description = "";
                                    }
                                    else
                                    {
                                        $value = "";
                                        $description = "";
                                    }
                                    echo call_user_func_array($arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"],
                                        array(
                                            $arResult["PROPERTY_LIST_FULL"][$propertyID],
                                            array(
                                                "VALUE" => $value,
                                                "DESCRIPTION" => $description,
                                            ),
                                            array(
                                                "VALUE" => "PROPERTY[".$propertyID."][".$i."][VALUE]",
                                                "DESCRIPTION" => "PROPERTY[".$propertyID."][".$i."][DESCRIPTION]",
                                                "FORM_NAME"=>"iblock_add",
                                            ),
                                        ));
                                ?><br /><?
                                }
                            break;
                            case "TAGS":
                                $APPLICATION->IncludeComponent(
                                    "bitrix:search.tags.input",
                                    "",
                                    array(
                                        "VALUE" => $arResult["ELEMENT"][$propertyID],
                                        "NAME" => "PROPERTY[".$propertyID."][0]",
                                        "TEXT" => 'size="'.$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"].'"',
                                    ), null, array("HIDE_ICONS"=>"Y")
                                );
                                break;
                            case "HTML":
                                $LHE = new CHTMLEditor;
                                $LHE->Show(array(
                                    'name' => "PROPERTY[".$propertyID."][0]",
                                    'id' => preg_replace("/[^a-z0-9]/i", '', "PROPERTY[".$propertyID."][0]"),
                                    'inputName' => "PROPERTY[".$propertyID."][0]",
                                    'content' => $arResult["ELEMENT"][$propertyID],
                                    'width' => '100%',
                                    'minBodyWidth' => 350,
                                    'normalBodyWidth' => 555,
                                    'height' => '200',
                                    'bAllowPhp' => false,
                                    'limitPhpAccess' => false,
                                    'autoResize' => true,
                                    'autoResizeOffset' => 40,
                                    'useFileDialogs' => false,
                                    'saveOnBlur' => true,
                                    'showTaskbars' => false,
                                    'showNodeNavi' => false,
                                    'askBeforeUnloadPage' => true,
                                    'bbCode' => false,
                                    'siteId' => SITE_ID,
                                    'controlsMap' => array(
                                        array('id' => 'Bold', 'compact' => true, 'sort' => 80),
                                        array('id' => 'Italic', 'compact' => true, 'sort' => 90),
                                        array('id' => 'Underline', 'compact' => true, 'sort' => 100),
                                        array('id' => 'Strikeout', 'compact' => true, 'sort' => 110),
                                        array('id' => 'RemoveFormat', 'compact' => true, 'sort' => 120),
                                        array('id' => 'Color', 'compact' => true, 'sort' => 130),
                                        array('id' => 'FontSelector', 'compact' => false, 'sort' => 135),
                                        array('id' => 'FontSize', 'compact' => false, 'sort' => 140),
                                        array('separator' => true, 'compact' => false, 'sort' => 145),
                                        array('id' => 'OrderedList', 'compact' => true, 'sort' => 150),
                                        array('id' => 'UnorderedList', 'compact' => true, 'sort' => 160),
                                        array('id' => 'AlignList', 'compact' => false, 'sort' => 190),
                                        array('separator' => true, 'compact' => false, 'sort' => 200),
                                        array('id' => 'InsertLink', 'compact' => true, 'sort' => 210),
                                        array('id' => 'InsertImage', 'compact' => false, 'sort' => 220),
                                        array('id' => 'InsertVideo', 'compact' => true, 'sort' => 230),
                                        array('id' => 'InsertTable', 'compact' => false, 'sort' => 250),
                                        array('separator' => true, 'compact' => false, 'sort' => 290),
                                        array('id' => 'Fullscreen', 'compact' => false, 'sort' => 310),
                                        array('id' => 'More', 'compact' => true, 'sort' => 400)
                                    ),
                                ));
                                break;
                            case "T":
                                for ($i = 0; $i<$inputNum; $i++)
                                {

                                    if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                    {
                                        $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
                                    }
                                    elseif ($i == 0)
                                    {
                                        $value = intval($propertyID) > 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
                                    }
                                    else
                                    {
                                        $value = "";
                                    }
                                ?>
                                <textarea cols="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]?>" rows="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"]?>" name="PROPERTY[<?=$propertyID?>][<?=$i?>]"><?=$value?></textarea>
                                <?
                                }
                            break;

                            case "S":
                            case "N":
                                for ($i = 0; $i<$inputNum; $i++)
                                {
                                    if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                    {
                                        $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
                                    }
                                    elseif ($i == 0)
                                    {
                                        $value = intval($propertyID) <= 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];

                                    }
                                    else
                                    {
                                        $value = "";
                                    }
                                    $code = $arResult["PROPERTY_LIST_FULL"][$propertyID]["CODE"];
                                ?>
                                <input type="<?=($propertyID == "NAME" ? "tel" : "text")?>"
                                       name="PROPERTY[<?=$propertyID?>][<?=$i?>]"
                                       placeholder="<?=$placeholder?>"
                                       data-parsley-errors-container="#help-<?=$propertyID?>-errors"
                                        <?if($propertyID == "NAME"):?>data-parsley-phone=""<?endif;?>
                                        <?if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])):?>required=""<?endif?>
                                       class="text-input help__form-contacts-field-input<?if($propertyID == "NAME"):?> js-phone-input<?endif;?>"
                                       size="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]; ?>"
                                       value="<?=$value?>" /><?
                                if($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"] == "DateTime"):?><?
                                    $APPLICATION->IncludeComponent(
                                        'bitrix:main.calendar',
                                        '',
                                        array(
                                            'FORM_NAME' => 'iblock_add',
                                            'INPUT_NAME' => "PROPERTY[".$propertyID."][".$i."]",
                                            'INPUT_VALUE' => $value,
                                        ),
                                        null,
                                        array('HIDE_ICONS' => 'Y')
                                    );
                                    ?><br /><small><?=GetMessage("IBLOCK_FORM_DATE_FORMAT")?><?=FORMAT_DATETIME?></small><?
                                endif
                                ?><?
                                }
                            break;

                            case "F":
                                for ($i = 0; $i<$inputNum; $i++)
                                {
                                    $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
                                    ?>
                                    <input type="hidden" name="PROPERTY[<?=$propertyID?>][<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>]" value="<?=$value?>" />
                                    <input type="file" size="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]?>"  name="PROPERTY_FILE_<?=$propertyID?>_<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>" /><br />
                                    <?

                                    if (!empty($value) && is_array($arResult["ELEMENT_FILES"][$value]))
                                    {
                                        ?>
                                        <input type="checkbox" name="DELETE_FILE[<?=$propertyID?>][<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>]" id="file_delete_<?=$propertyID?>_<?=$i?>" value="Y" /><label for="file_delete_<?=$propertyID?>_<?=$i?>"><?=GetMessage("IBLOCK_FORM_FILE_DELETE")?></label><br />
                                        <?

                                        if ($arResult["ELEMENT_FILES"][$value]["IS_IMAGE"])
                                        {
                                            ?>
                                            <img src="<?=$arResult["ELEMENT_FILES"][$value]["SRC"]?>" height="<?=$arResult["ELEMENT_FILES"][$value]["HEIGHT"]?>" width="<?=$arResult["ELEMENT_FILES"][$value]["WIDTH"]?>" border="0" /><br />
                                            <?
                                        }
                                        else
                                        {
                                            ?>
                                            <?=GetMessage("IBLOCK_FORM_FILE_NAME")?>: <?=$arResult["ELEMENT_FILES"][$value]["ORIGINAL_NAME"]?><br />
                                            <?=GetMessage("IBLOCK_FORM_FILE_SIZE")?>: <?=$arResult["ELEMENT_FILES"][$value]["FILE_SIZE"]?> b<br />
                                            [<a href="<?=$arResult["ELEMENT_FILES"][$value]["SRC"]?>"><?=GetMessage("IBLOCK_FORM_FILE_DOWNLOAD")?></a>]<br />
                                            <?
                                        }
                                    }
                                }

                            break;
                            case "L":

                                if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["LIST_TYPE"] == "C")
                                    $type = $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y" ? "checkbox" : "radio";
                                else
                                    $type = $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y" ? "multiselect" : "dropdown";

                                switch ($type):
                                    case "checkbox":
                                    case "radio":
                                        foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum)
                                        {
                                            $checked = false;
                                            if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                            {
                                                if (is_array($arResult["ELEMENT_PROPERTIES"][$propertyID]))
                                                {
                                                    foreach ($arResult["ELEMENT_PROPERTIES"][$propertyID] as $arElEnum)
                                                    {
                                                        if ($arElEnum["VALUE"] == $key)
                                                        {
                                                            $checked = true;
                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                if ($arEnum["DEF"] == "Y") $checked = true;
                                            }

                                            ?>
                            <input type="<?=$type?>" name="PROPERTY[<?=$propertyID?>]<?=$type == "checkbox" ? "[".$key."]" : ""?>" value="<?=$key?>" id="property_<?=$key?>"<?=$checked ? " checked=\"checked\"" : ""?> /><label for="property_<?=$key?>"><?=$arEnum["VALUE"]?></label><br />
                                            <?
                                        }
                                    break;

                                    case "dropdown":
                                    case "multiselect":
                                    ?>
                            <select name="PROPERTY[<?=$propertyID?>]<?=$type=="multiselect" ? "[]\" size=\"".$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"]."\" multiple=\"multiple" : ""?>">
                                <option value=""><?echo GetMessage("CT_BIEAF_PROPERTY_VALUE_NA")?></option>
                                    <?
                                        if (intval($propertyID) > 0) $sKey = "ELEMENT_PROPERTIES";
                                        else $sKey = "ELEMENT";

                                        foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum)
                                        {
                                            $checked = false;
                                            if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                            {
                                                foreach ($arResult[$sKey][$propertyID] as $elKey => $arElEnum)
                                                {
                                                    if ($key == $arElEnum["VALUE"])
                                                    {
                                                        $checked = true;
                                                        break;
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                if ($arEnum["DEF"] == "Y") $checked = true;
                                            }
                                            ?>
                                <option value="<?=$key?>" <?=$checked ? " selected=\"selected\"" : ""?>><?=$arEnum["VALUE"]?></option>
                                            <?
                                        }
                                    ?>
                            </select>
                                    <?
                                    break;

                                endswitch;
                            break;
                        endswitch;?>
                    </label>
                </div>
            <?endforeach;?>
            <?if($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0):?>
                <tr>
                    <td><?=GetMessage("IBLOCK_FORM_CAPTCHA_TITLE")?></td>
                    <td>
                        <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
                        <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
                    </td>
                </tr>
                <tr>
                    <td><?=GetMessage("IBLOCK_FORM_CAPTCHA_PROMPT")?><span class="starrequired">*</span>:</td>
                    <td><input type="text" name="captcha_word" maxlength="50" value=""></td>
                </tr>
            <?endif?>
            </div>
        </div>
    <?endif?>

    <input type="hidden" name="iblock_submit_<?=$templateName?>" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />
    <div class="help__form-buttons">
        <button type="submit" class="blue-btn blue-btn--orange help__form-submit">
            Отправить заявку
        </button>
        <div class="help__form-policy">
            *
            <div class="help__form-policy-text">
                <p>
                    Нажимая кнопку вы соглашаетесь с <a href="#"><span>политикой
                                            конфиденциальности</span></a>
                </p>
            </div>

        </div>
    </div>
    <?if ($arParams["LIST_URL"] <> ''):?>
        <input type="submit" name="iblock_apply" value="<?=GetMessage("IBLOCK_FORM_APPLY")?>" />
        <input
            type="button"
            name="iblock_cancel"
            value="<? echo GetMessage('IBLOCK_FORM_CANCEL'); ?>"
            onclick="location.href='<? echo CUtil::JSEscape($arParams["LIST_URL"])?>';"
        >
    <?endif?>

</form>