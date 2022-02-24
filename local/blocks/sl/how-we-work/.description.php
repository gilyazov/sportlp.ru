<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Как мы работаем?',
        'section' => ['SL', 'content'],
		'dynamic' => false,
	),
	'cards' => [
        '.how-we-work__list-item' => [
            'name' => 'Этапы',
            'label' => [
                '.how-we-work__card-text p'
            ]
        ]
    ],
	'nodes' => [
        '.how-we-work__heading' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],

        '.how-we-work__card-text p' => [
            'name' => 'Шаг',
            'type' => 'text'
        ],
    ],
);