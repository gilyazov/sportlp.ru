<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Сравнение моделей',
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

        '.comparison__what-to-choose' => [
            'name' => 'Ссылка',
            'type' => 'link',
            'skipContent' => true,
            'group' => 'banner',
        ],
        '.what-to-choose__title' => [
            'name' => 'Заголовок Банера',
            'type' => 'text',
            'group' => 'banner',
        ],
    ],
    'groups' => [
        'banner' => 'Банер'
    ],
);