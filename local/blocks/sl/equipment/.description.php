<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Комплексное оснащение',
        'section' => ['SL', 'content'],
		'dynamic' => false,
	),
	'cards' => [
        '.equipment__diagram-item' => [
            'name' => 'Оборудование',
            'label' => [
                '.equipment__diagram-item-text p'
            ],
            'additional' => [
                'attrs' => [
                    [
                        'name' => 'Позиция',
                        'type' => 'text',
                        'attribute' => 'style'
                    ]
                ]
            ]
        ]
    ],
	'nodes' => [
        '.equipment__large-heading' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],
        '.equipment__small-heading' => [
            'name' => 'Краткий заголовок',
            'type' => 'text'
        ],
        '.equipment__text' => [
            'name' => 'Описание',
            'type' => 'text',
        ],
        '.equipment__more-btn' => [
            'name' => 'Ссылка',
            'type' => 'link',
            'skipContent' => true
        ],

        '.equipment__diagram-item-text p' => [
            'name' => 'Заголовок',
            'type' => 'text',
        ],
        '.equipment__diagram-item-image' => array(
            'name' => 'Картинка',
            'type' => 'img',
            'dimensions' => array('maxWidth' => 300, 'maxHeight' => 300),
        ),
    ]
);