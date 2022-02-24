<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'О компании',
        'section' => ['SL', 'intro'],
		'dynamic' => false,
	),
	'cards' => array(

	),
	'nodes' => [
        '.about-header__main-heading' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],
        '.about-header__secondary-heading' => [
            'name' => 'Подзаголовок',
            'type' => 'text'
        ],
        '.about-header__text p' => [
            'name' => 'Описание',
            'type' => 'text'
        ],
        '.about-header__bg-image' => array(
            'name' => 'Фон',
            'type' => 'img',
            'dimensions' => array('maxWidth' => 1900, 'maxHeight' => 1200),
        ),
    ],
    'style' => array(

    ),
);