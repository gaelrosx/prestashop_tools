<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('Europe/London');

/** Include PHPExcel_IOFactory */
require_once dirname(__FILE__) . '/libs/PHPExcel/IOFactory.php';
	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();



	$fileTmpPath = $_FILES['file']['tmp_name'];
	 
	$fileName = $_FILES['file']['name'];
	$fileSize = $_FILES['file']['size'];
	$fileType = $_FILES['file']['type'];
	$fileNameCmps = explode(".", $fileName);
	$fileExtension = strtolower(end($fileNameCmps));


	
	
   $objPHPExcel = PHPExcel_IOFactory::load('products.xls');

   var_dump( $objPHPExcel );





?>