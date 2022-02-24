<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Контакты',
        'section' => ['SL', 'page'],
		'dynamic' => false,
	),
	'cards' => [
    ],
	'nodes' => [
        '.contacts-page__main-heading' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],

        '.contacts__specialist-name' => [
            'name' => 'ФИО',
            'type' => 'text',
            'group' => 'specialist',
        ],
        '.contacts__specialist-text p' => [
            'name' => 'Текст',
            'type' => 'text',
            'textOnly' => true,
            'group' => 'specialist',
        ],
        '.contacts__specialist-link--phone' => [
            'name' => 'Телефон',
            'type' => 'link',
            'skipContent' => true,
            'group' => 'specialist',
        ],
        '.contacts__specialist-link--email' => [
            'name' => 'E-mail',
            'type' => 'link',
            'skipContent' => true,
            'group' => 'specialist',
        ],

        '.contacts__go-to-office' => [
            'name' => 'Whatsapp',
            'type' => 'link',
            'skipContent' => true,
            'group' => 'whatsapp',
        ],
        '.contacts__go-to-office span' => [
            'name' => 'Описание',
            'type' => 'text',
            'textOnly' => true,
            'group' => 'whatsapp',
        ],

        '.contacts__address' => [
            'name' => 'Адрес',
            'type' => 'text'
        ],
        '.contacts__requisites-download' => [
            'name' => 'Скачать реквизиты',
            'type' => 'link',
            'skipContent' => true
        ],
    ],
    'groups' => [
        'specialist' => 'Специалист',
        'whatsapp' => 'Whats App',
    ],
);