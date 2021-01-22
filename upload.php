<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

error_reporting(E_ALL ^ E_NOTICE);




$fileTmpPath = $_FILES['file']['tmp_name'];

$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));


$inputFileName = __DIR__ . '/products.xls';
//$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
$spreadsheet = IOFactory::load($fileTmpPath);
$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
foreach($sheetData as $key => $row )
{
	var_dump($key,$row);
	echo "<br>";
}






?>