<?php
	ini_set('display_errors', '1');

	error_reporting(E_ALL ^ E_NOTICE);

	require dirname(__DIR__) . "/vendor/autoload.php";

	require_once  dirname(__DIR__) .'/libs/query.php';

	use PhpOffice\PhpSpreadsheet\IOFactory;

	$fileTmpPath = $_FILES['file']['tmp_name'];

	$spreadsheet = IOFactory::load($fileTmpPath);
	
	$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

	$query = new Query();
	
	foreach($sheetData as $key => $row )
	{
		if( $key > 1 )
		{
			$query->update_metas_cms( $row );
			
		}
	}

  header("Location: ../index.php?msg=import_success");

?>