<section class="reviews">
    <div class="container">
        <div class="reviews__top-row">
            <h2 class="small-heading reviews__small-heading">
                Видеообзоры экспертов
            </h2>
            <h3 class="secondary-heading reviews__large-heading">
                Обзоры техники
            </h3>
        </div>
        <div class="reviews__content">
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "reviews",
                Array(
                    "IBLOCK_TYPE" => "products",
                    "IBLOCK_ID" => 9,
                    "NEWS_COUNT" => 999,
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "",
                    "SORT_ORDER2" => "",
                    "SET_TITLE" => "N",
                    "PROPERTY_CODE" => [
                        "LINK"
                    ]
                ),
                false
            );?>

            <div class="reviews__consultation">
                <h3 class="reviews__consultation-heading">
                    Получите консультацию<br>
                    эксперта сейчас
                </h3>
                <?$APPLICATION->IncludeComponent("bitrix:iblock.element.add.form", "reviews__consultation-form", Array(
                    "CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",	// * дата начала *
                    "CUSTOM_TITLE_DATE_ACTIVE_TO" => "",	// * дата завершения *
                    "CUSTOM_TITLE_DETAIL_PICTURE" => "",	// * подробная картинка *
                    "CUSTOM_TITLE_DETAIL_TEXT" => "",	// * подробный текст *
                    "CUSTOM_TITLE_IBLOCK_SECTION" => "",	// * раздел инфоблока *
                    "CUSTOM_TITLE_NAME" => "+7 000 000-00-00",	// * наименование *
                    "CUSTOM_TITLE_PREVIEW_PICTURE" => "",	// * картинка анонса *
                    "CUSTOM_TITLE_PREVIEW_TEXT" => "",	// * текст анонса *
                    "CUSTOM_TITLE_TAGS" => "",	// * теги *
                    "DEFAULT_INPUT_SIZE" => "30",	// Размер полей ввода
                    "DETAIL_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования подробного текста
                    "ELEMENT_ASSOC" => "CREATED_BY",	// Привязка к пользователю
                    "GROUPS" => array(	// Группы пользователей, имеющие право на добавление/редактирование
                        0 => "2",
                    ),
                    "IBLOCK_ID" => "11",	// Инфоблок
                    "IBLOCK_TYPE" => "forms",	// Тип инфоблока
                    "LEVEL_LAST" => "Y",	// Разрешить добавление только на последний уровень рубрикатора
                    "LIST_URL" => "",	// Страница со списком своих элементов
                    "MAX_FILE_SIZE" => "0",	// Максимальный размер загружаемых файлов, байт (0 - не ограничивать)
                    "MAX_LEVELS" => "100000",	// Ограничить кол-во рубрик, в которые можно добавлять элемент
                    "MAX_USER_ENTRIES" => "100000",	// Ограничить кол-во элементов для одного пользователя
                    "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования текста анонса
                    "PROPERTY_CODES" => array(	// Свойства, выводимые на редактирование
                        0 => "117",
                        1 => "NAME",
                    ),
                    "PROPERTY_CODES_REQUIRED" => array(	// Свойства, обязательные для заполнения
                        0 => "NAME",
                        1 => "117",
                    ),
                    "RESIZE_IMAGES" => "N",	// Использовать настройки инфоблока для обработки изображений
                    "SEF_MODE" => "N",	// Включить поддержку ЧПУ
                    "STATUS" => "ANY",	// Редактирование возможно
                    "STATUS_NEW" => "N",	// Деактивировать элемент
                    "USER_MESSAGE_ADD" => "",	// Сообщение об успешном добавлении
                    "USER_MESSAGE_EDIT" => "",	// Сообщение об успешном сохранении
                    "USE_CAPTCHA" => "N",	// Использовать CAPTCHA
                ),
                    false
                );?>
            </div>
        </div>
    </div>
</section>