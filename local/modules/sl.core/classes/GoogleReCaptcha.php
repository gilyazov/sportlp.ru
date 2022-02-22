<?php
use Bitrix\Main\Web\HttpClient;

class GoogleReCaptcha
{
    public static function getPublicKey() { return '6LfMQx4eAAAAAOOHMGr_O548h-f4JDDwc8V_Gvwo';}
    public static function getSecretKey() { return '6LfMQx4eAAAAAOYWpAelNlWC-M9zkyCWx8U_991Z';}

    /**
     * @return array - if validation is failed, returns an array with errors, otherwise - empty array. This format is expected by component.
     */
    public static function checkClientResponse()
    {
        $context = \Bitrix\Main\Application::getInstance()->getContext();

        $request = $context->getRequest();
        $captchaResponse = $request->getPost("g-recaptcha-response");
        if($captchaResponse)
        {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array('secret' => static::getSecretKey(), 'response'=> $captchaResponse, 'remoteip' => $_SERVER['REMOTE_ADDR']);

            $httpClient = new HttpClient();
            $response = $httpClient->post($url, $data);
            if ($response)
                $response = \Bitrix\Main\Web\Json::decode($response, true);


            if(!$response['success']) {
                return $response['error-codes'];
            }

            if($response['score'] >= 0.5) {
                return [];
            }
            else {
                return ['Вы бот?'];
            }
        }

        return ['no captcha response'];

    }
}