
<?php

// // Соединение с базой данных
// $servername = "127.0.0.1:3306";
// $username = "root";
// $password = "yLiC3/u(VXSe-Ub@";
// $dbname = "backuptest";

// $conn = mysqli_connect($servername, $username, $password, $dbname);

// // Проверка соединения
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// // SQL-запрос для получения данных из подтаблицы
// $sql = "SELECT id, img_link FROM tgko_equip";
// $result = mysqli_query($conn, $sql);

// // Формирование данных для записи в файл
// $lines = array();

// // Добавляем первую строку с названиями столбцов
// $lines[] = "id,img_link";

// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         $lines[] = $row['id'] . ',' . $row['img_link'];
//     }
// }

// // Закрытие соединения с базой данных
// mysqli_close($conn);

// // Запись данных в файл
// $file = fopen('result_file.csv', 'w');
// foreach ($lines as $line) {
//     fwrite($file, $line . PHP_EOL);
// }
// fclose($file);

// echo 'Данные успешно записаны в файл result_file.csv';



// Укажите путь к файлу CSV
$csvFile = 'result_file.csv';

// Создайте пустой массив для данных
$data = array();

// Откройте файл в режиме чтения
if (($handle = fopen($csvFile, "r")) !== FALSE) {
    
    // Прочитайте строки из файла CSV по одной
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        
        // Добавьте массив данных в основной массив
        $data[] = $row;
    }
    
    // Закройте файл
    fclose($handle);
}

// Выведите массив данных
print_r($data);

// <?php

// require 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

// $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("petstest.xlsx");

// $activeWorksheet = $spreadsheet->getActiveSheet();

// $column = 'D';

// // your directory to save images
// $imageDir = 'rezEx/';

// $row = 2; 
 
// echo 111;

// while($activeWorksheet->getCell($column.$row) != "") {
//     $coordinate = $column.$row;
//     $cellValue = $activeWorksheet->getCell($coordinate);
//     foreach ($activeWorksheet->getDrawingCollection() as $drawing) {
//         if ($drawing instanceof Drawing) {
//             $cellID = $drawing->getCoordinates();
//             if ($cellID == $coordinate) {
//                 $filename = $drawing->getIndexedFilename();
//                 list ($startColumn, $startRow) = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::coordinateFromString($cellID);
//                 $imageDir .= $startColumn . $startRow . '/';
//                 if (!file_exists($imageDir)) {
//                     mkdir($imageDir);
//                 }

//                 $drawing->save($imageDir . $filename);
//             }
//         }
//     }

//     $row++;
// }
// ?>