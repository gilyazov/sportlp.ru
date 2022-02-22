<?php


namespace Iteko\Core\EventHandlers\Landing;

class Main
{
    public function OnBeforePrologAddHandler()
    {
        global $USER, $APPLICATION;

        if ($USER->IsAdmin() && $_SERVER["SCRIPT_NAME"] == '/bitrix/admin/landing_view.php') {
            $class = 'no-touch is-admin';
        }
        else{
            $class = 'no-touch';
        }
        $APPLICATION->SetPageProperty("BodyClass", $class);

        $request = \Bitrix\Main\Context::getCurrent()->getRequest();
        if(!$request->isAdminSection())
        {
            \Bitrix\Main\Page\Asset::getInstance()->addString('<script src=\'https://www.google.com/recaptcha/api.js?render='.\GoogleReCaptcha::getPublicKey().'\'></script>');
        }
    }
}