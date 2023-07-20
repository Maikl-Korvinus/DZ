<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$file = 'img.xlsx';
$spreadsheet  = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);;
$spreadsheet ->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();


$i = 0;
foreach ($spreadsheet->getActiveSheet()->getDrawingCollection() as $drawing) {
    if ($drawing instanceof \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing) {
        ob_start();
        call_user_func(
            $drawing->getRenderingFunction(),
            $drawing->getImageResource()
        );
        $imageContents = ob_get_contents();
        ob_end_clean();
        switch ($drawing->getMimeType()) {
            case \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::MIMETYPE_PNG :
                $extension = 'png';
                break;
            case \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::MIMETYPE_GIF:
                $extension = 'gif';
                break;
            case \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::MIMETYPE_JPEG :
                $extension = 'jpg';
                break;
        }
    } else {
        $zipReader = fopen($drawing->getPath(),'r');
        $imageContents = '';
        while (!feof($zipReader)) {
            $imageContents .= fread($zipReader,1024);
        }
        fclose($zipReader);
        $extension = $drawing->getExtension();
    }
    $myFileName = '00_Image_'.++$i.'.'.$extension;
    file_put_contents($myFileName,$imageContents);
}

?>