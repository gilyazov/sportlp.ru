<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Каталог техники',
        'section' => ['SL', 'content'],
		'dynamic' => false,
	),
	'cards' => [

    ],
	'nodes' => [
        '.catalog__small-heading' => [
            'name' => 'Маленький заголовок',
            'type' => 'text'
        ],
        '.catalog__large-heading' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],

        '.catalog__show-all' => [
            'name' => 'Ссылка',
            'type' => 'link',
            'skipContent' => true
        ],
    ],
    'style' => array(

    ),
);