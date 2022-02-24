<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Наши преимущества',
        'section' => ['SL', 'content'],
		'dynamic' => false,
	),
	'cards' => [
        '.advantages__list-item' => [
            'name' => 'Преимущества',
            'label' => [
                '.advantages__card-title'
            ]
        ]
    ],
	'nodes' => [
        '.advantages__heading' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],

        '.advantages__card-title' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],
        '.advantages__card-text p' => [
            'name' => 'Описание',
            'type' => 'text'
        ],
    ],
);