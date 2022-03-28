<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'block' => array(
		'name' => 'Реализованные проекты',
        'section' => ['SL', 'content'],
		'dynamic' => false,
	),
	'cards' => [

    ],
	'nodes' => [
        '.realised-projects__small-heading' => [
            'name' => 'Серый заголовок',
            'type' => 'text'
        ],
        '.realised-projects__large-heading' => [
            'name' => 'Заголовок',
            'type' => 'text'
        ],
    ],
);