<?php
use Bitrix\Main\EventManager;

CModule::AddAutoloadClasses(
    'sl.core',
    [
        //'GoogleReCaptcha' => 'classes/GoogleReCaptcha.php',
        //'Sl\Core\Tools' => 'lib/tools.php',
    ]
);
//define("LANDING_DEVELOPER_MODE", true);
define ("STATIC_PATH", '/local/js/SL/build/');
define ("DEFAULT_PATH", $_SERVER['DOCUMENT_ROOT'] . '/local/templates/.default/');
$eventManager = EventManager::getInstance();

$eventManager->addEventHandler('landing', 'onHookExec', ['\Sl\Core\EventHandlers\Landing\Hook', 'onHookExecHandler']);
$eventManager->addEventHandler('iblock', 'OnAfterIBlockElementAdd', ['\Sl\Core\EventHandlers\Iblock\Element', 'OnAfterIBlockElementAddHandler']);
/*$eventManager->addEventHandler('landing', 'onDemosGetRepository', ['\Sl\Core\EventHandlers\Landing\Template', 'onDemosGetRepositoryHandler']);
$eventManager->addEventHandler('landing', 'onGetThemeColors', ['\Sl\Core\EventHandlers\Landing\Theme', 'onGetThemeColors']);
$eventManager->addEventHandler('main', 'OnBeforeProlog', ['\Iteko\Core\EventHandlers\Landing\Main', 'OnBeforePrologAddHandler']);

$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementAdd', ['\Iteko\Core\EventHandlers\Iblock\Element', 'OnBeforeIBlockElementAddHandler']);
*/

/*$arClasses = array(

);
CModule::AddAutoloadClasses("iteko.core", $arClasses);*/