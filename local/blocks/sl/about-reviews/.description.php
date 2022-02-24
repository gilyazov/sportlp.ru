<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Отзывы наших клиентов',
        'section' => ['SL', 'content'],
		'dynamic' => false,
	),
	'cards' => [
        '.about__numbers-list-item' => [
            'name' => 'Цифра',
            'label' => [
                '.about__numbers-card-number-inner'
            ]
        ]
    ],
	'nodes' => [
        '.small-heading' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],
        '.about__text' => [
            'name' => 'Текст',
            'type' => 'text'
        ],
        '.about__more-link' => [
            'name' => 'Ссылка',
            'type' => 'link',
            'skipContent' => true
        ],

        '.about__numbers-card-number-inner' => [
            'name' => 'Цифра',
            'type' => 'text'
        ],
        '.about__numbers-card-text-inner' => [
            'name' => 'Описание',
            'type' => 'text'
        ],
    ],
    'style' => array(

    ),
);