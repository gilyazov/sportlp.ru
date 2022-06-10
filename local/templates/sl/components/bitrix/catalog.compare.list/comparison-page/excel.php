<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
$APPLICATION->RestartBuffer();

if (\Bitrix\Main\Loader::includeModule('pai.phpoffice')) {
    $CURRENT_PAGE = (CMain::IsHTTPS()) ? "https://" : "http://";
    $CURRENT_PAGE .= $_SERVER["HTTP_HOST"];
    $sOutFile = 'out.xlsx';

    $oSpreadsheet_Out = new Spreadsheet();

    $oSpreadsheet_Out->getProperties()->setCreator('Name Password')
        ->setLastModifiedBy('Name Password')
        ->setTitle('Таблица Сравнение SL Поволжье')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

    // Add some data
    $sheet = $oSpreadsheet_Out->getActiveSheet();
    $alphabet = range('A', 'Z');

    $sheet->setCellValue('A2', '<b>text</b> some text');
    $sheet->mergeCells('A2:B2');

    $i=1;
    foreach($arResult as $key => $arElement){

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName($arElement["NAME"]);
        $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . Sl\Core\Tools::resizeImage($arElement["PREVIEW_PICTURE"], 150, 360, true)); // put your path and image here
        $drawing->setCoordinates($alphabet[$i].'4');
        $drawing->setHeight(150);
        $drawing->getShadow()->setVisible(true);
        $drawing->setWorksheet($sheet);
        $sheet->getRowDimension('4')->setRowHeight(130);


        $coordinate = $alphabet[$i].'5';
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 14
            ]
        ];
        $sheet->getStyle($coordinate)->applyFromArray($styleArray);
        $sheet->setCellValue($coordinate, $arElement["NAME"]);
        $i++;
    }

    $celsKey = 6;
    foreach ($arParams["PARAMS"] as $key => $arrParams){
        // заголовок опций
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 18
            ]
        ];
        $sheet->getStyle($alphabet[0].$celsKey)->applyFromArray($styleArray);
        $sheet->setCellValue($alphabet[0].$celsKey, $arrParams["NAME"]);
        $sheet->mergeCells('A'.$celsKey.':'.$alphabet[count($arResult)].$celsKey);

        // заливка
        $sheet->getStyle('A'.$celsKey.':'.$alphabet[count($arResult)].$celsKey)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('C9DAF8');

        foreach ($arrParams["PROPERTIES"] as $code => $arProp){
            // название опции
            $celsKey++;
            $coordinate = $alphabet[0].$celsKey;
            $sheet->setCellValue($coordinate, $arProp["NAME"]);
            $sheet->getStyle($coordinate)->getAlignment()->setWrapText(true);

            // значение опций
            $i=1;
            foreach ($arResult as $arItem){
                $value = $arItem["PROPERTIES"][$code]["VALUE"];
                $coordinate = $alphabet[$i].$celsKey;

                $sheet->setCellValue($coordinate, ($value ?: "–"));
                $i++;
            }
        }

        $celsKey++;
    }

    // ширина колонок
    $i=1;
    foreach($arResult as $key => $arElement){
        $sheet->getColumnDimension($alphabet[$i])->setAutoSize(true);
        $i++;
    }

    // итоговое сохранение
    $oWriter = IOFactory::createWriter($oSpreadsheet_Out, 'Xlsx');
    //$oWriter->save($sOutFile);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'. urlencode($sOutFile).'"');
    $oWriter->save('php://output');
}
die();
/*
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=compare_".date('Y-m-d').".xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
$CURRENT_PAGE = (CMain::IsHTTPS()) ? "https://" : "http://";
$CURRENT_PAGE .= $_SERVER["HTTP_HOST"];
?>
    <style>
        table tbody tr:nth-child(even) td {
            background: #f8fbff;
        }
        table td {
            font-style: normal;
            line-height: 100%;
            text-align: center;
        }
        table th {
            font-style: normal;
            font-weight: 600;
            font-size: 15px;
            line-height: 100%;
            color: #aab9c7;
            text-align: left;
            padding-left: 0;
            padding-left: 0.8rem;
        }
    </style>
    <table>
    <thead>
        <tr>
            <th align="left">Характеристика</th>
            <?foreach($arResult as $arElement):?>
                <th>
                    <?=$arElement["NAME"]?>
                </th>
            <?endforeach;?>
        </tr>
        <!--<tr>
            <th align="left">Фото</th>
            <?foreach($arResult as $arElement):?>
                <th>
                    <img src="<?=$CURRENT_PAGE?><?=Sl\Core\Tools::resizeImage($arElement["PREVIEW_PICTURE"], 150, 360, true)?>" alt="">
                </th>
            <?endforeach;?>
        </tr>-->
    </thead>
    <tbody>
<?
foreach ($arParams["PARAMS"] as $key => $arrParams):?>
    <tr>
        <th colspan="<?=(count($arResult)+1)?>" align="left"><?=$arrParams["NAME"]?></th>
    </tr>
    <?foreach ($arrParams["PROPERTIES"] as $code => $arProp):?>
        <tr>
            <th align="left">
                <?=$arProp["NAME"]?>
            </th>
            <?$different = false;?>
            <?foreach ($arResult as $arItem):?>
                <?
                $value = $arItem["PROPERTIES"][$code]["VALUE"];
                ?>
                <td class="<?if(!$value):?> grey<?endif;?>">
                    <?=($value ?: "–")?>
                </td>
            <?endforeach;?>
        </tr>
    <?endforeach;?>
<?
endforeach;
echo "</tbody></table>";
