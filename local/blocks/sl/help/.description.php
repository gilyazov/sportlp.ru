<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Поможем с выбором техники под ваши цели!',
        'section' => ['SL', 'form'],
		'dynamic' => false,
	),
	'cards' => [

    ],
	'nodes' => [
        '.small-heading' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],
        '.about__more-link' => [
            'name' => 'Ссылка',
            'type' => 'link',
            'skipContent' => true
        ],
    ],
    'style' => array(

    ),
);