<?php

namespace Sl\Core\Ajax;

use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Web\HttpClient;

class FullCompare extends Controller
{
    /**
     * @return array
     */
    public function configureActions()
    {
        return [
            'clear' => [
                'prefilters' => []
            ]
        ];
    }

    /**
     * @return array
     */
    public static function clearAction($arId)
    {
        unset($_SESSION['COMPARE_LIST'][2]['ITEMS']);

        /*$arId = explode(",", $id);
        $httpClient = new HttpClient();
        foreach ($arId as $item){
            $url = "https://sportlp.ru/compare/?action=ADD_TO_COMPARE_LIST&ajax_action=Y&id=". $item;
            $res = $httpClient->get($url);

            //print_r($url);
            //print_r($res);
        }*/
        //die();

        //return true;
    }
}