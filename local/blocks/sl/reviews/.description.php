<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Обзоры техники',
        'section' => ['SL', 'content'],
		'dynamic' => false,
	),
	'cards' => [

    ],
	'nodes' => [
        '.reviews__small-heading' => [
            'name' => 'Маленький заголовок',
            'type' => 'text'
        ],
        '.reviews__large-heading' => [
            'name' => 'Заголовок',
            'type' => 'text',
        ],

        '.reviews__consultation-heading' => [
            'name' => 'Заголовок',
            'type' => 'text',
        ],
    ]
);