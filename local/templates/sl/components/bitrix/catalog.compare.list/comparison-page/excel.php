<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\RichText;

$APPLICATION->RestartBuffer();

if (\Bitrix\Main\Loader::includeModule('pai.phpoffice')) {
    $CURRENT_PAGE = (CMain::IsHTTPS()) ? "https://" : "http://";
    $CURRENT_PAGE .= $_SERVER["HTTP_HOST"];
    $sOutFile = 'sravnenie-mashin-SLP.xlsx';

    $oSpreadsheet_Out = new Spreadsheet();
    $oSpreadsheet_Out->getProperties()->setCreator('aydargilyazov.ru')
        ->setTitle('Таблица Сравнение SL Поволжье');
    $sheet = $oSpreadsheet_Out->getActiveSheet();
    $alphabet = range('A', 'Z');

    // logo
    $drawing = new Drawing();
    $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . "/upload/medialibrary/6d5/woxaqthzgrg50w9qq5y3glvhpntcodw9/logo.png");
    $drawing->setWorksheet($sheet);
    $drawing->setCoordinates('A1');
    $drawing->setWidth(650);
    $drawing->setResizeProportional(true);
    $drawing->setOffsetY(20);
    $sheet->getRowDimension('1')->setRowHeight(75);
    $sheet->mergeCells('A1:H1');

    // вступительные контакты
    $richText = new RichText();
    $site = $richText->createTextRun('Сайт:');
    $site->getFont()->setBold(true);
    $richText->createTextRun(" http://sportlp.ru/\n");
    $phone = $richText->createTextRun('Тел. офиса:');
    $phone->getFont()->setBold(true);
    $richText->createTextRun(' +7 (843) 528 28 96');
    $sheet->getCell('A2')->setValue($richText);
    $sheet->getStyle('A2')
        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
    $sheet->getStyle('A2')
        ->getAlignment()->setWrapText(true);
    // телефон
    $richTextPhone = new RichText();
    $email = $richTextPhone->createTextRun('E-mail:');
    $email->getFont()->setBold(true);
    $richTextPhone->createTextRun(" nms@sportlp.ru \n");
    $boss = $richTextPhone->createTextRun('Нуриев Мансур Саматович:');
    $boss->getFont()->setBold(true);
    $richTextPhone->createTextRun(' +7 917 894 26 76');
    $sheet->getCell('C2')->setValue($richTextPhone);
    $sheet->getStyle('C2')
        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
    $sheet->getStyle('C2')
        ->getAlignment()->setWrapText(true);
    $sheet->getRowDimension('2')->setRowHeight(33);
    $sheet->mergeCells('A2:B2');
    $sheet->mergeCells('C2:F2');
    // дата составления
    $richTextDate = new RichText();
    $richTextDate->createText('Сравнение базовых характеристик ледозаливочных машин от ООО "СЛП". ');
    $date = $richTextDate->createTextRun('Дата составления:');
    $date->getFont()->setBold(true);
    $richTextDate->createTextRun(' ' . date('d.m.Y'));
    $sheet->getCell('A3')->setValue($richTextDate);
    $sheet->mergeCells('A3:H3');

    $sheet->getColumnDimension('A')->setWidth(30);
    $i = 1;
    foreach ($arResult as $key => $arElement) {
        // картинки
        if ($photo = $arElement["PROPERTIES"]["COMPARE_TABLE_PHOTO"]["VALUE"]){
            $drawing = new Drawing();
            $arFileTmp = \CFile::ResizeImageGet($photo,  array("width" => 138, "height" => 138),  BX_RESIZE_IMAGE_EXACT, true);
            $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . $arFileTmp['src']); // put your path and image here
            $drawing->setName($arElement["NAME"]);
            $drawing->setWorksheet($sheet);
            $drawing->setCoordinates($alphabet[$i] . '4');

            $drawing->setResizeProportional(true);

            $sheet->getColumnDimension($alphabet[$i])->setWidth(20);
            $sheet->getRowDimension('4')->setRowHeight(115);
            $drawing->setOffsetX(5);
            $drawing->setOffsetY(5);
        }

        // заголовок
        $coordinate = $alphabet[$i] . '5';
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

    // параметры
    $celsKey = 6;
    foreach ($arParams["PARAMS"] as $key => $arrParams) {
        // заголовок опций
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 18
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
        ];
        $sheet->getStyle($alphabet[0] . $celsKey)->applyFromArray($styleArray);
        $sheet->setCellValue($alphabet[0] . $celsKey, $arrParams["NAME"]);
        $sheet->mergeCells('A' . $celsKey . ':' . $alphabet[count($arResult)] . $celsKey);

        // заливка
        $sheet->getStyle('A' . $celsKey . ':' . $alphabet[count($arResult)] . $celsKey)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('C9DAF8');

        foreach ($arrParams["PROPERTIES"] as $code => $arProp) {
            // название опции
            $celsKey++;
            $coordinate = $alphabet[0] . $celsKey;
            $sheet->setCellValue($coordinate, $arProp["NAME"]);
            $sheet->getStyle($coordinate)->getAlignment()->setWrapText(true);

            // значение опций
            $i = 1;
            foreach ($arResult as $arItem) {
                $value = $arItem["PROPERTIES"][$code]["VALUE"];
                $coordinate = $alphabet[$i] . $celsKey;

                // стилизация
                $styleArray = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]
                ];
                $sheet->getStyle($coordinate)->applyFromArray($styleArray);

                $sheet->setCellValue($coordinate, ($value ?: "–"));
                $i++;
            }
        }

        $celsKey++;
    }

    // СТА
    $celsKey = $celsKey + 2;
    $styleArray = [
        'font' => [
            'bold' => true,
            'color' => ['argb' => 'FFFFFF'],
            'size' => 13
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
    ];
    $sheet->getStyle("A" . $celsKey)->applyFromArray($styleArray);
    $sheet->getStyle("A" . $celsKey)
        ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C78D8');
    $sheet->setCellValue("A" . $celsKey, "Cвяжитесь с нами, чтобы узнать стоимость ледозаливочной техники:");
    $sheet->mergeCells('A' . $celsKey . ':E' . $celsKey);
    // контакты СТА
    $celsKey++;
    $styleArray = [
        'font' => [
            'size' => 18
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
    ];
    $sheet->getStyle("A" . $celsKey)->applyFromArray($styleArray);
    $sheet->setCellValue("A" . $celsKey, "8 800 101-92-28");
    $sheet->mergeCells('A' . $celsKey . ':B' . $celsKey);
    $sheet->getStyle("C" . $celsKey)->applyFromArray($styleArray);
    $sheet->setCellValue("C" . $celsKey, "WhatsApp: +7 917 894-26-76");
    $sheet->mergeCells('C' . $celsKey . ':E' . $celsKey);

    // кросспродажи
    $celsKey = $celsKey + 3;
    $sheet->getStyle("A" . $celsKey)->applyFromArray([
        'font' => [
            'bold' => true,
            'size' => 15
        ],
    ]);
    $sheet->setCellValue("A" . $celsKey, "Мы занимаемся комплексным оснащением ледовых арен.");
    $sheet->mergeCells('A' . $celsKey . ':E' . $celsKey);
    $celsKey++;
    $sheet->setCellValue("A" . $celsKey, "Вы сможете также приобрести у нас:");
    // холодильник
    $celsKey = $celsKey + 2;
    $drawing = new Drawing();
    $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . "/compare/cross-img/refrig.png");
    $drawing->setWorksheet($sheet);
    $drawing->setWidth(580);
    $drawing->setResizeProportional(true);
    $drawing->setCoordinates('A' . $celsKey);
    $sheet->getRowDimension($celsKey)->setRowHeight(140);
    $sheet->mergeCells('A'.$celsKey.':F'.$celsKey);
    // борт
    $celsKey = $celsKey + 2;
    $drawing = new Drawing();
    $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . "/compare/cross-img/bort.png");
    $drawing->setWorksheet($sheet);
    $drawing->setWidth(580);
    $drawing->setResizeProportional(true);
    $drawing->setCoordinates('A' . $celsKey);
    $sheet->getRowDimension($celsKey)->setRowHeight(140);
    $sheet->mergeCells('A'.$celsKey.':F'.$celsKey);
    // тренажеры
    $celsKey = $celsKey + 2;
    $drawing = new Drawing();
    $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . "/compare/cross-img/trenazher.png");
    $drawing->setWorksheet($sheet);
    $drawing->setWidth(580);
    $drawing->setResizeProportional(true);
    $drawing->setCoordinates('A' . $celsKey);
    $sheet->getRowDimension($celsKey)->setRowHeight(140);
    $sheet->mergeCells('A'.$celsKey.':F'.$celsKey);
    // заточка
    $celsKey = $celsKey + 2;
    $drawing = new Drawing();
    $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . "/compare/cross-img/stanki.png");
    $drawing->setWorksheet($sheet);
    $drawing->setWidth(580);
    $drawing->setResizeProportional(true);
    $drawing->setCoordinates('A' . $celsKey);
    $sheet->getRowDimension($celsKey)->setRowHeight(140);
    $sheet->mergeCells('A'.$celsKey.':F'.$celsKey);
    // инвентарь
    $celsKey = $celsKey + 2;
    $drawing = new Drawing();
    $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . "/compare/cross-img/gum.png");
    $drawing->setWorksheet($sheet);
    $drawing->setWidth(580);
    $drawing->setResizeProportional(true);
    $drawing->setCoordinates('A' . $celsKey);
    $sheet->getRowDimension($celsKey)->setRowHeight(140);
    $sheet->mergeCells('A'.$celsKey.':F'.$celsKey);
    // свет
    $celsKey = $celsKey + 2;
    $drawing = new Drawing();
    $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . "/compare/cross-img/lights.png");
    $drawing->setWorksheet($sheet);
    $drawing->setWidth(580);
    $drawing->setResizeProportional(true);
    $drawing->setCoordinates('A' . $celsKey);
    $sheet->getRowDimension($celsKey)->setRowHeight(140);
    $sheet->mergeCells('A'.$celsKey.':F'.$celsKey);
    // end

    /*
    // СТА №2
    $celsKey = $celsKey + 3;
    $styleArray = [
        'font' => [
            'bold' => true,
            'color' => ['argb' => 'FFFFFF'],
            'size' => 13
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
    ];
    $sheet->getStyle("A" . $celsKey)->applyFromArray($styleArray);
    $sheet->getStyle("A" . $celsKey)
        ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C78D8');
    $sheet->setCellValue("A" . $celsKey, "Cвяжитесь с нами, чтобы узнать стоимость ледозаливочной техники:");
    $sheet->mergeCells('A' . $celsKey . ':E' . $celsKey);
    // контакты СТА
    $celsKey++;
    $styleArray = [
        'font' => [
            'size' => 18
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
    ];
    $sheet->getStyle("A" . $celsKey)->applyFromArray($styleArray);
    $sheet->setCellValue("A" . $celsKey, "8 800 101-92-28");
    $sheet->mergeCells('A' . $celsKey . ':B' . $celsKey);
    $sheet->getStyle("C" . $celsKey)->applyFromArray($styleArray);
    $sheet->setCellValue("C" . $celsKey, "WhatsApp: +7 917 894-26-76");
    $sheet->mergeCells('C' . $celsKey . ':E' . $celsKey);
    // end

    // youtube
    $celsKey = $celsKey + 3;
    $richTextYT = new RichText();
    $obzor = $richTextYT->createTextRun('Смотрите больше обзоров ледозаливочной техники на нашем YouTube-канале.');
    $obzor->getFont()->setBold(true);
    $richTextYT->createTextRun('Сканируйте QR-код или переходите по ссылке: https://www.youtube.com/channel/UCg45Cn6OjHyfiKBfb1xzBtw ');
    $sheet->getCell('A' . $celsKey)->setValue($richTextYT);
    $sheet->mergeCells('A'.$celsKey.':B'.$celsKey);
    $sheet->getStyle('A'.$celsKey)
        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
    $sheet->getStyle('A' . $celsKey)
        ->getAlignment()->setWrapText(true);
    //qr
    $drawing = new Drawing();
    $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . "/compare/cross-img/qr-code.gif");
    $drawing->setWorksheet($sheet);
    $drawing->setWidth(180);
    $drawing->setResizeProportional(true);
    $drawing->setCoordinates('D' . $celsKey);
    $sheet->getRowDimension($celsKey)->setRowHeight(140);
    $sheet->mergeCells('D'.$celsKey.':F'.$celsKey);
    // обложка
    $celsKey++;
    $drawing = new Drawing();
    $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . "/compare/cross-img/YT-channel.png");
    $drawing->setWorksheet($sheet);
    $drawing->setWidth(550);
    $drawing->setResizeProportional(true);
    $drawing->setCoordinates('A' . $celsKey);
    $sheet->getRowDimension($celsKey)->setRowHeight(250);
    $sheet->mergeCells('A'.$celsKey.':F'.$celsKey);
    // end
*/

    // печать
    $celsKey = $celsKey + 2;
    $celsKey++;
    $drawing = new Drawing();
    $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . "/compare/cross-img/print.png");
    $drawing->setWorksheet($sheet);
    $drawing->setWidth(290);
    $drawing->setResizeProportional(true);
    $drawing->setCoordinates('A' . $celsKey);
    //$sheet->getRowDimension($celsKey)->setRowHeight(250);
    $sheet->mergeCells('A'.$celsKey.':B'.$celsKey);

    $sheet->getStyle("C" . $celsKey)->applyFromArray([
        'font' => [
            'bold' => true,
            'size' => 14
        ],
    ]);
    $sheet->setCellValue("C" . $celsKey, "Контакты для обратной связи:");
    $richTextPrint = new RichText();
    $site = $richTextPrint->createTextRun('Сайт: ');
    $site->getFont()->setBold(true);
    $richTextPrint->createTextRun('http://sportlp.ru/');
    $sheet->getCell('C' . ($celsKey+2))->setValue($richTextPrint);
    $richTextPrint = new RichText();
    $site = $richTextPrint->createTextRun('Тел. офиса: ');
    $site->getFont()->setBold(true);
    $richTextPrint->createTextRun('+7 (843) 528 28 96');
    $sheet->getCell('C' . ($celsKey+3))->setValue($richTextPrint);
    $richTextPrint = new RichText();
    $site = $richTextPrint->createTextRun('E-mail: ');
    $site->getFont()->setBold(true);
    $richTextPrint->createTextRun('nms@sportlp.ru');
    $sheet->getCell('C' . ($celsKey+4))->setValue($richTextPrint);
    $richTextPrint = new RichText();
    $site = $richTextPrint->createTextRun('Время работы: ');
    $site->getFont()->setBold(true);
    $richTextPrint->createTextRun('Ежедневно, с 8:00 до 22:00');
    $sheet->getCell('C' . ($celsKey+5))->setValue($richTextPrint);
    $richTextPrint = new RichText();
    $site = $richTextPrint->createTextRun('Нуриев Мансур Саматович ');
    $site->getFont()->setBold(true);
    $richTextPrint->createTextRun('+7 917 894 26 76');
    $sheet->getCell('C' . ($celsKey+6))->setValue($richTextPrint);
    // end печать

    // итоговое сохранение
    $oWriter = IOFactory::createWriter($oSpreadsheet_Out, 'Xlsx');
    //$oWriter->save($sOutFile);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . urlencode($sOutFile) . '"');
    $oWriter->save('php://output');
}
die();

class compareTableDraw{
    protected $oSpreadsheet_Out;
    protected $sheet;

    function __construct()
    {
        $this->oSpreadsheet_Out = new Spreadsheet();
        $this->oSpreadsheet_Out->getProperties()
            ->setCreator('aydargilyazov.ru')
            ->setTitle('Таблица Сравнение SL Поволжье');

        $this->sheet = $this->oSpreadsheet_Out->getActiveSheet();
    }

    /**
     * Шапка таблицы
     * @return void
     */
    protected function header(){
        $this->sheet->setCellValue('A2', '<b>text</b> some text');
        $this->sheet->mergeCells('A2:B2');
    }

    /**
     * Картинка + заголовок
     * @return void
     */
    protected function productTitle(){
        $this->sheet->getColumnDimension('A')->setWidth(25);
        $i = 1;
        foreach ($arResult as $key => $arElement) {
            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $imageFile = \CFile::GetFileArray($arElement["PREVIEW_PICTURE"]); // COMPARE_TABLE_PHOTO
            $arFileTmp = \CFile::ResizeImageGet($imageFile,  array("width" => 150, "height" => (150 * $imageFile["HEIGHT"] / $imageFile["WIDTH"])),  BX_RESIZE_IMAGE_EXACT, true);
            $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . $arFileTmp['src']); // put your path and image here
            $drawing->setName($arElement["NAME"]);
            $drawing->setWorksheet($sheet);
            $drawing->setCoordinates($alphabet[$i] . '4');

            $drawing->setResizeProportional(true);
            $sheet->getColumnDimension($alphabet[$i])->setWidth(ceil($arFileTmp['width']/7));
            $sheet->getRowDimension('4')->setRowHeight(112);

            /*echo $sheet->getColumnDimension($alphabet[$i])->getWidth() . PHP_EOL;
            echo $drawing->getWidth() . PHP_EOL;
            echo $arFileTmp['src'] . PHP_EOL;
            die();*/
            //$drawing->setOffsetX(($sheet->getColumnDimension($alphabet[$i])->getWidth()*11-$drawing->getWidth())/2);

            $coordinate = $alphabet[$i] . '5';
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
    }

    protected function drawSheet(){
        $this->header();
        $this->productTitle();
    }

    public function draw()
    {
        $sOutFile = 'sravnenie-mashin-SLP.xlsx';
        $oWriter = IOFactory::createWriter($this->oSpreadsheet_Out, 'Xlsx');
        //$oWriter->save($sOutFile);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($sOutFile) . '"');
        $oWriter->save('php://output');
    }
}

/*$table = new compareTableDraw();
$table->draw();*/