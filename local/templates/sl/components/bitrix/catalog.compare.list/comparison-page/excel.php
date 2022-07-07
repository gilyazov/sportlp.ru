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
    $sOutFile = 'out.xlsx';

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
    $sheet->getRowDimension('1')->setRowHeight(76);
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
    // телефон
    $richTextPhone = new RichText();
    $email = $richTextPhone->createTextRun('E-mail:');
    $email->getFont()->setBold(true);
    $richTextPhone->createTextRun(" nms@sportlp.ru \n");
    $boss = $richTextPhone->createTextRun('Нуриев Мансур Саматович:');
    $boss->getFont()->setBold(true);
    $richTextPhone->createTextRun(' +7 917 894 26 76');
    $sheet->getCell('C2')->setValue($richTextPhone);
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

    $sheet->getColumnDimension('A')->setWidth(25);
    $i = 1;
    foreach ($arResult as $key => $arElement) {
        // картинки
        if ($photo = $arElement["PROPERTIES"]["COMPARE_TABLE_PHOTO"]["VALUE"]){
            $drawing = new Drawing();
            $arFileTmp = \CFile::ResizeImageGet($photo,  array("width" => 100, "height" => 100),  BX_RESIZE_IMAGE_EXACT, true);
            $drawing->setPath($_SERVER["DOCUMENT_ROOT"] . $arFileTmp['src']); // put your path and image here
            $drawing->setName($arElement["NAME"]);
            $drawing->setWorksheet($sheet);
            $drawing->setCoordinates($alphabet[$i] . '4');

            $drawing->setResizeProportional(true);

            $sheet->getColumnDimension($alphabet[$i])->setWidth(15);
            $sheet->getRowDimension('4')->setRowHeight(83);
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
    $sheet->setCellValue("C" . $celsKey, "WA: +7 917 894-26-76");
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
    /*$sheet->mergeCells('A'.$celsKey.':B'.($celsKey+1));
    $sheet->getStyle("C" . $celsKey)->applyFromArray([
        'font' => [
            'bold' => true,
            'size' => 14
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
        ],
    ]);
    $sheet->setCellValue("C" . $celsKey, "Холодильное оборудование");
    $sheet->mergeCells('C'.$celsKey.':E'.$celsKey);*/

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
        $sOutFile = 'out.xlsx';
        $oWriter = IOFactory::createWriter($this->oSpreadsheet_Out, 'Xlsx');
        //$oWriter->save($sOutFile);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($sOutFile) . '"');
        $oWriter->save('php://output');
    }
}

/*$table = new compareTableDraw();
$table->draw();*/