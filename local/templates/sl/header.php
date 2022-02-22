<?php
if (!defined ('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
    die();
}

/** @var \CMain $APPLICATION */

if (!\Bitrix\Main\Loader::includeModule('landing'))
{
    return;
}

\Bitrix\Landing\Connector\Mobile::prologMobileHit();
$language= \Bitrix\Landing\Manager::getLangISO();
?><!DOCTYPE html>
<html xml:lang="<?= $language;?>" lang="<?= $language;?>" class="<?$APPLICATION->ShowProperty('HtmlClass');?>">
<head>
    <?$APPLICATION->ShowProperty('AfterHeadOpen');?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="HandheldFriendly" content="true" >
    <meta name="MobileOptimized" content="width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title><?$APPLICATION->ShowTitle();?></title>
    <?
    $APPLICATION->ShowHead();
    $APPLICATION->ShowProperty('MetaOG');
    $APPLICATION->ShowProperty('BeforeHeadClose');
    \Bitrix\Main\UI\Extension::load('SL.build');
    ?>
</head>
<body class="no-touch  no-animated-header <?$APPLICATION->ShowProperty('BodyClass');?>" ontouchstart="" <?$APPLICATION->ShowProperty('BodyTag');?>>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?$APPLICATION->ShowProperty('Noscript');?>
<?$APPLICATION->ShowProperty('AfterBodyOpen');?>
<div class="sprite" aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;">
    <? include_once (DEFAULT_PATH .'include/sprite.xml'); ?>    </div>
<div class="page-content <?$APPLICATION->ShowProperty('MainClass');?>" <?$APPLICATION->ShowProperty('MainTag');?>>
    <div class="loader">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 63.4 50" class="loader__logo" width="63" height="50">
            <path d="M39.43 43h24v6.75H30.92V1.09h8.51Z" style="isolation:isolate" opacity=".3" fill="#148eff" />
            <path
                    d="M28.1 36.8a5.84 5.84 0 0 0-2.29-4.95q-2.25-1.74-8.18-3.51a39.51 39.51 0 0 1-9.42-3.94q-6.69-4.18-6.7-10.9a11.84 11.84 0 0 1 4.82-9.69Q11.18 0 18.88 0A21.27 21.27 0 0 1 28 1.87a14.92 14.92 0 0 1 6.29 5.35 13.49 13.49 0 0 1 2.29 7.65H28.1a7.54 7.54 0 0 0-2.42-5.95c-1.6-1.44-3.89-2.17-6.87-2.17a10.48 10.48 0 0 0-6.49 1.77 5.89 5.89 0 0 0-2.29 5A5.38 5.38 0 0 0 12.52 18a29.35 29.35 0 0 0 8.21 3.47 37.44 37.44 0 0 1 9.19 3.85A14.35 14.35 0 0 1 35 30.21a12.81 12.81 0 0 1 1.61 6.52 11.57 11.57 0 0 1-4.71 9.69Q27.22 50 19.18 50a24.41 24.41 0 0 1-9.79-1.94 16.66 16.66 0 0 1-6.93-5.41 13.45 13.45 0 0 1-2.46-8h8.51A7.83 7.83 0 0 0 11.27 41q2.76 2.28 7.91 2.28c3 0 5.18-.6 6.66-1.78a5.76 5.76 0 0 0 2.26-4.7Z"
                    fill="#148eff" />
        </svg>
    </div>
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 600;
            display: flex;
            flex-direction: column;
            background-color: #fff;

        }




        .loader__logo {
            margin: auto;
            width: 10rem;
            height: auto;
            transition: opacity .4s, transform .4s;
        }


        .animatable .loader {
            opacity: 0;
            visibility: hidden;
            transition: opacity .4s ease .4s, visibility 0s linear .8s;

        }

        .animatable .loader__logo {
            transform: scale(1.5);
            opacity: 0;
        }


        @media screen and (max-width: 640px) {
            .loader__logo {
                width: 5rem;
            }
        }
    </style>

    <? include_once(DEFAULT_PATH . 'include/header.php');?>
    <main class="page-main">
