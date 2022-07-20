<?
$page = $APPLICATION->GetCurPage();
?>
<header class="page-header<? if ($page == "/about/"): ?> page-header--white<? endif; ?>">

    <div class="container">
        <div class="page-header__row">
            <div class="page-header__burger-menu">
                <nav class="page-header__burger-menu-nav">
                    <ul class="page-header__burger-menu-nav-list">
                        <li class="page-header__burger-menu-nav-list-item">
                            <a href="/catalog/" class="page-header__burger-menu-nav-link">
                                Каталог
                            </a>
                        </li>
                        <li class="page-header__burger-menu-nav-list-item">
                            <a href="/compare/" class="page-header__burger-menu-nav-link">
                                Сравнение
                                <span class="page-header__burger-menu-nav-link-notifications">
                                    <svg width="14" height="14" aria-hidden="true" class="icon-comparisons">
                                        <use xlink:href="#comparisons"></use>
                                    </svg>
                                    <span class="page-header__burger-menu-nav-link-notifications-count js-header-comparison-count">
                                        <?=count($_SESSION['COMPARE_LIST'][2]['ITEMS']);?>
                                    </span>
                                </span>
                            </a>
                        </li>
                        <? $APPLICATION->IncludeComponent("bitrix:menu", "page-header__burger-menu", array(
                            "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                            "DELAY" => "N",    // Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "1",    // Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                            "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "N",    // Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                            "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                            "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                            "COMPONENT_TEMPLATE" => ""
                        ),
                            false
                        ); ?>
                    </ul>
                </nav>
                <ul class="page-header__burger-menu-social-list">
                    <li class="page-header__burger-menu-social-list-item">
                        <a href="#" class="page-header__burger-menu-social-link" target="_blank">
                            <svg width="14" height="14" aria-hidden="true" class="icon-whatsapp">
                                <use xlink:href="#whatsapp"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="page-header__burger-menu-social-list-item">
                        <a href="#" class="page-header__burger-menu-social-link" target="_blank">
                            <svg width="14" height="14" aria-hidden="true" class="icon-vk">
                                <use xlink:href="#vk"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="page-header__burger-menu-social-list-item">
                        <a href="#" class="page-header__burger-menu-social-link" target="_blank">
                            <svg width="14" height="14" aria-hidden="true" class="icon-fb">
                                <use xlink:href="#fb"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="page-header__burger-menu-social-list-item">
                        <a href="#" class="page-header__burger-menu-social-link" target="_blank">
                            <svg width="14" height="14" aria-hidden="true" class="icon-youtube">
                                <use xlink:href="#youtube"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
                <a href="<?= \Bitrix\Main\Config\Option::get("sl.core", "phone_link"); ?>"
                   class="page-header__burger-menu-contact-link">
                    <?= \Bitrix\Main\Config\Option::get("sl.core", "phone"); ?>
                </a>
                <a href="mailto:nms@sportlp.ru" class="page-header__burger-menu-contact-link">
                    nms@sportlp.ru
                </a>
                <div class="page-header__burger-menu-address">
                    <p>
                        Казань, Оренбургский тракт,<br>
                        д. 160, офис 304
                    </p>
                </div>
                <div class="page-header__burger-menu-buttons">
                    <a href="#callback-modal" class="blue-small-btn js-open-modal">
                        Консультация
                    </a>
                    <a href="whatsapp://send/?phone=79178942676&amp;text=Здравствуйте! Хочу получить консультацию по покупке ледозаливочной машины&amp;app_absent=1" class="arrow-btn-small arrow-btn-small--filled arrow-btn-small--green" target="_blank">
                        Написать в whatsapp
                        <svg width="14" height="14" aria-hidden="true" class="icon-whatsapp-large">
                            <use xlink:href="#whatsapp-large"></use>
                        </svg>
                    </a>
                </div>
            </div>
            <a href="<?= SITE_DIR ?>" class="page-header__logo">
                <img src="<?= STATIC_PATH ?>img/logo.svg" alt="" class="page-header__logo-image">
                <img src="<?= STATIC_PATH ?>img/white-logo.svg" alt="" class="page-header__logo-image">
            </a>
            <div class="page-header__catalog">
                <a href="/catalog/" class="page-header__catalog-link">
                    <svg width="14" height="14" aria-hidden="true" class="icon-vk">
                        <use xlink:href="#catalog-burger"></use>
                    </svg>
                    <span>
                        Каталог
                    </span>
                </a>
                <div class="page-header__catalog-dropdown">
                    <div class="page-header__catalog-dropdown-inner">
                        <!--<div class="page-header__catalog-dropdown-row">
                            <div class="page-header__catalog-dropdown-col">
                                <div class="page-header__catalog-dropdown-nav">
                                    <ul class="page-header__catalog-dropdown-nav-list">
                                        <li class="page-header__catalog-dropdown-nav-list-item active">
                                            <a href="#" class="page-header__catalog-dropdown-nav-link">
                                                По брендам
                                                <svg width="14" height="14" aria-hidden="true" class="icon-arrow-right">
                                                    <use xlink:href="#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="page-header__catalog-dropdown-nav-list-item">
                                            <a href="#" class="page-header__catalog-dropdown-nav-link">
                                                По типам ледовых арен
                                                <svg width="14" height="14" aria-hidden="true" class="icon-arrow-right">
                                                    <use xlink:href="#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="page-header__catalog-dropdown-nav-list-item">
                                            <a href="#" class="page-header__catalog-dropdown-nav-link">
                                                По типам привода
                                                <svg width="14" height="14" aria-hidden="true" class="icon-arrow-right">
                                                    <use xlink:href="#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="page-header__catalog-dropdown-nav-list-item">
                                            <a href="#" class="page-header__catalog-dropdown-nav-link">
                                                Всей техники
                                                <svg width="14" height="14" aria-hidden="true" class="icon-arrow-right">
                                                    <use xlink:href="#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="page-header__catalog-dropdown-col">
                                <div class="page-header__catalog-dropdown-results">


                                    <div class="page-header__catalog-dropdown-tabs">
                                        <div class="page-header__catalog-dropdown-tabs-item active">
                                            <ul class="page-header__catalog-dropdown-results-list">
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/1.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Zamboni
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/2.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            ENGO
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/3.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Olympia
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/4.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            WM
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/5.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Форвард
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/6.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            N-Ice
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="page-header__catalog-dropdown-tabs-item active">
                                            <ul class="page-header__catalog-dropdown-results-list">
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/1.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Zamboni
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/2.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            ENGO
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/3.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Olympia
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/4.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            WM
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/5.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Форвард
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/6.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            N-Ice
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="page-header__catalog-dropdown-tabs-item active">
                                            <ul class="page-header__catalog-dropdown-results-list">
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/1.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Zamboni
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/2.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            ENGO
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/3.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Olympia
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/4.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            WM
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/5.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Форвард
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/6.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            N-Ice
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="page-header__catalog-dropdown-tabs-item active">
                                            <ul class="page-header__catalog-dropdown-results-list">
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/1.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Zamboni
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/2.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            ENGO
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/3.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Olympia
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/4.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            WM
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/5.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            Форвард
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="page-header__catalog-dropdown-results-list-item">
                                                    <a href="#" class="page-header__catalog-dropdown-results-link">
                                                        <div class="page-header__catalog-dropdown-results-link-bg">
                                                            <img data-src="<? /*=STATIC_PATH*/ ?>img/catalog-menu/6.jpg" alt=""
                                                                 class="page-header__catalog-dropdown-results-link-bg-image lazyload">
                                                        </div>
                                                        <h4 class="page-header__catalog-dropdown-results-link-title">
                                                            N-Ice
                                                        </h4>
                                                        <svg width="14" height="14" aria-hidden="true"
                                                             class="icon-diagonal-arrow">
                                                            <use xlink:href="#diagonal-arrow"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>

            <? $APPLICATION->IncludeComponent("bitrix:menu", "page-header__nav", array(
                "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                "DELAY" => "N",    // Откладывать выполнение шаблона меню
                "MAX_LEVEL" => "1",    // Уровень вложенности меню
                "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                "MENU_CACHE_TYPE" => "N",    // Тип кеширования
                "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                "COMPONENT_TEMPLATE" => ""
            ),
                false
            ); ?>

            <a href="tel:<?= \Bitrix\Main\Config\Option::get("sl.core", "phone"); ?>" class="page-header__phone">
                <span>
                    <?= \Bitrix\Main\Config\Option::get("sl.core", "phone"); ?>
                </span>
            </a>
            <a href="<?= \Bitrix\Main\Config\Option::get("sl.core", "phone_link"); ?>" class="page-header__whats-app">
                <img src="<?= STATIC_PATH ?>img/whatsapp.svg" alt="" class="page-header__whats-app-logo">
            </a>
            <?/*if ($USER->IsAdmin()):*/?>
                <a href="/compare/" class="page-header__comparisons">
                    <svg width="14" height="14" aria-hidden="true" class="icon-comparisons">
                        <use xlink:href="#comparisons"></use>
                    </svg>
                    <div class="page-header__comparisons-notifications js-header-comparison-count">
                        <?=count($_SESSION['COMPARE_LIST'][2]['ITEMS']);?>
                    </div>
                </a>
            <?/*endif;*/?>
            <a href="tel:<?= \Bitrix\Main\Config\Option::get("sl.core", "phone"); ?>" class="page-header__mobile-phone-link">
                <svg width="14" height="14" aria-hidden="true" class="icon-phone">
                    <use xlink:href="#phone"></use>
                </svg>
            </a>
            <a href="#callback-modal" class="arrow-btn page-header__contact-btn js-open-modal">
                Консультация
            </a>
            <button class="page-header__burger">
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>