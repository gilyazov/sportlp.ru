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

                <form action="/" method="POST" class="contacts__form" data-need-validation="">
                    <h4 class="contacts__form-heading">
                        Обратный звонок
                    </h4>
                    <div class="contacts__form-row">
                        <input type="tel" class="text-input contacts__form-input js-phone-input" name="phone"
                               required="" data-parsley-phone="" placeholder="+7 000 000-00-00">
                        <button type="submit" class="blue-btn contacts__form-submit">
                            Отправить
                        </button>
                    </div>
                </form>
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