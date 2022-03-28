<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Промо модель',
        'section' => ['SL', 'content'],
		'dynamic' => false,
	),
	'cards' => [
        '.promo__advantages-item' => [
            'name' => 'Преимущества',
            'label' => [
                '.promo__advantages-text'
            ]
        ]
    ],
	'nodes' => [
        '.promo__card-heading' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],

        '.promo__advantages-text' => [
            'name' => 'Преимущество',
            'type' => 'text',
        ],
        '.promo__advantages-remark' => [
            'name' => 'Опции',
            'type' => 'text',
        ],
        '.promo__advantages-icon' => array(
            'name' => 'Иконка',
            'type' => 'img',
            'dimensions' => array('maxWidth' => 400, 'maxHeight' => 400),
        ),


        '.promo__btn' => [
            'name' => 'Смотреть модель',
            'type' => 'link',
            'skipContent' => true
        ],
        '.promo__all-specs-btn' => [
            'name' => 'Все характеристики',
            'type' => 'link'
        ],
    ]
);