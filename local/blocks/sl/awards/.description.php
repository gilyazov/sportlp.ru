<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Награды',
        'section' => ['SL', 'content'],
		'dynamic' => false,
	),
	'cards' => [
        '.awards__list-item' => [
            'name' => 'Награда',
            'label' => [
                '.awards__card-text'
            ]
        ]
    ],
	'nodes' => [
        '.awards__card-text' => [
            'name' => 'Награда',
            'type' => 'text'
        ],
        '.awards__card-image' => array(
            'name' => 'Лого',
            'type' => 'img',
            'dimensions' => array('maxWidth' => 100, 'maxHeight' => 100),
        ),

        '.awards__quote-text p' => [
            'name' => 'Цитата',
            'type' => 'text',
            'group' => 'quote',
        ],
        '.awards__quote-author-name' => [
            'name' => 'ФИО',
            'type' => 'text',
            'group' => 'quote',
        ],
        '.awards__quote-author-role' => [
            'name' => 'Должность',
            'type' => 'text',
            'group' => 'quote',
        ],
    ],
    'groups' => [
        'quote' => 'Цитата'
    ],
);