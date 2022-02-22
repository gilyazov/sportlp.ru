<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => '404',
        'section' => ['SL', 'page'],
		'dynamic' => false,
	),
	'cards' => [
    ],
	'nodes' => [
        '.not-found__code' => [
            'name' => 'Фон',
            'type' => 'text'
        ],
        '.small-heading' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],
        '.arrow-btn-filled' => [
            'name' => 'Ссылка',
            'type' => 'link',
            'skipContent' => true
        ],
    ],
    'style' => array(

    ),
);