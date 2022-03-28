<section class="help">
    <div class="container">
        <div class="help__content">
            <div class="help__bg">

                <picture>
                    <source data-srcset="/local/js/SL/build/img/help-mobile-bg.jpg" media="(max-width: 640px)">
                    <img data-src="/local/js/SL/build/img/help-bg.jpg" alt="" class="help__bg-image lazyload">
                </picture>
            </div>
            <div class="help__col">
                <h2 class="help__heading">
                    Поможем с выбором техники под ваши цели!
                </h2>
                <div class="help__text">
                    <p>
                        Заполните форму обратной связи и получите консультацию эксперта в ближайшее время!
                    </p>
                </div>
                <div class="help__contact">
                    <h3 class="help__contact-heading">
                        Или свяжитесь с нами по телефону:
                    </h3>
                    <a href="tel:+78000008888" class="help__phone-link"><span>8 800 000-88-88</span></a>
                </div>
            </div>
            <div class="help__col">
                <?$APPLICATION->IncludeComponent("bitrix:iblock.element.add.form", "help__form", Array(
                    "CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",	// * дата начала *
                    "CUSTOM_TITLE_DATE_ACTIVE_TO" => "",	// * дата завершения *
                    "CUSTOM_TITLE_DETAIL_PICTURE" => "",	// * подробная картинка *
                    "CUSTOM_TITLE_DETAIL_TEXT" => "",	// * подробный текст *
                    "CUSTOM_TITLE_IBLOCK_SECTION" => "",	// * раздел инфоблока *
                    "CUSTOM_TITLE_NAME" => "Телефон",	// * наименование *
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
                        2 => "118",
                        3 => "119",
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