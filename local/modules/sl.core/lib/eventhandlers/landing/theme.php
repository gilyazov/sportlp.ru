<?php


namespace Iteko\Core\EventHandlers\Landing;

class Theme
{
    public function onGetThemeColors(\Bitrix\Main\Event $event)
    {
        $result = new \Bitrix\Main\Entity\EventResult;
        $colors = $event->getParameter('colors');

        $colors = [];

        $colors['mytheme'] = array(
            'name' => 'Моя тема',
            'color' => '',
            'base' => true
        );

        $result->modifyFields(array(
            'colors' => $colors
        ));

        return $result;
    }
}