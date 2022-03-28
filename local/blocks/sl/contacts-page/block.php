<script src="https://api-maps.yandex.ru/2.1/?apikey=1330531b-8eb9-4dbf-a7d7-c184fbaca2bb&lang=ru_RU"
        type="text/javascript">
</script>
<section class="contacts-page">
    <div class="container">
        <h1 class="contacts-page__main-heading">
            Контакты
        </h1>
        <div class="contacts-page__row">
            <div class="contacts-page__col">
                <div class="contacts__specialist">
                    <div class="contacts__specialist-photo-container">
                        <img data-src="/local/js/SL/build/img/specialist.jpg" alt="" class="contacts__specialist-photo lazyload">
                    </div>
                    <div class="contacts__specialist-col">
                        <div class="contacts__specialist-name">
                            Алёна Аношина
                        </div>
                        <div class="contacts__specialist-text">
                            <p>
                                Позвоните для консультации
                                эксперту компании
                            </p>
                        </div>
                        <a href="tel:88000008888"
                           class="contacts__specialist-link contacts__specialist-link--phone"><span>8 800
                                000-88-88</span></a>
                    </div>
                    <div class="contacts__specialist-col">
                        <div class="contacts__specialist-online">
                            Работаем сейчас
                        </div>
                        <a href="mailto:nms@sportlp.ru"
                           class="contacts__specialist-link contacts__specialist-link--email"><span>nms@sportlp.ru</span></a>
                    </div>
                </div>
                <a href="#" class="contacts__go-to-office">
                    <span>Пишите прямо сейчас, мы онлайн</span>
                    <img src="/local/js/SL/build/img/whatsapp.svg" alt="" class="contacts__go-to-office-icon">
                </a>
                <div class="contacts__address">
                    Казань, Оренбургский<br> тракт, д. 160, офис 304
                </div>

                <?$APPLICATION->IncludeComponent("bitrix:iblock.element.add.form", "contacts__form", Array(
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
                        0 => "NAME",
                        1 => "",
                    ),
                    "PROPERTY_CODES_REQUIRED" => array(	// Свойства, обязательные для заполнения
                        0 => "NAME",
                        1 => "",
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
                <div class="contacts__requisites">
                    <div class="contacts__requisites-item">
                        ООО «Спорт Лайн Поволжье»
                    </div>
                    <div class="contacts__requisites-item">
                        ИНН: 5260422236
                    </div>
                    <div class="contacts__requisites-item">
                        ОГРН: 1165260051835
                    </div>
                    <a href="#" class="contacts__requisites-download">
                        <span>
                            Скачать реквизиты
                        </span>
                        <svg width="14" height="14" aria-hidden="true" class="icon-download">
                            <use xlink:href="#download"></use>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="contacts-page__col">
                <div class="contacts__map-wrapper">
                    <div class="contacts__map js-contacts-map" data-location="55.725823, 49.189266"
                         data-pin="/local/js/SL/build/img/pin.svg">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>