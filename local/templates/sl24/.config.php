<?php

$jsConfig = array(
    'landing_core_admin' => array(// изменили ключ, так как регистрируем свое расширение
        'css' => array(
            '/bitrix/css/main/font-awesome.min.css'
        ),
        'rel' => array('landing_core'),
    )
);

foreach ($jsConfig as $code => $ext)
{
    \CJSCore::registerExt($code, $ext);
}


return [
    'js_core_public' => [
        'landing_core'
    ],
    'js_core_edit' => [
        'landing_core_admin',
        'SL.build'
    ],
    'disable_namespace' => ['bitrix'],
    'enable_namespace' => '',
    'public_wrapper_block' => false,
    'google_font' => false
];