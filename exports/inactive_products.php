<?php
	ini_set('display_errors', '1');

	error_reporting(E_ALL ^ E_NOTICE);
	
	require dirname(__DIR__) . "/vendor/autoload.php";
	
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	use PhpOffice\PhpSpreadsheet\IOFactory;
	
	require_once  dirname(__DIR__) .'/libs/query.php';
	
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

	header('Content-Disposition: attachment;filename="inactive_products.xlsx"');
	
	header('Cache-Control: max-age=0');

	
	$query = new Query();

	$results = $query->active_inactive_producs( 0 );

	$spread = new Spreadsheet();

	$sheet = $spread->getActiveSheet();
	$sheet->setTitle("PRODUCTOS INACTIVOS");

	$sheet->setCellValueByColumnAndRow(1, 1,"ID PRODUCTO");
	$sheet->setCellValueByColumnAndRow(2, 1,"CATEGORIA POR DEFECCTO");
	$sheet->setCellValueByColumnAndRow(3, 1,"PRECIO PRODUCTO");
	$sheet->setCellValueByColumnAndRow(4, 1,"DESCRIPCION");
	$sheet->setCellValueByColumnAndRow(5, 1,"DESCRIPCION CORTA");
	$sheet->setCellValueByColumnAndRow(6, 1,"META DESCRIPCION");
	$sheet->setCellValueByColumnAndRow(7, 1,"META KEYWORS");
	$sheet->setCellValueByColumnAndRow(8, 1,"META TITULO");
	$sheet->setCellValueByColumnAndRow(9, 1,"NOMBRE");

	$x = 1; $y=2;

	foreach( $results as $key => $row ){
		$sheet->setCellValueByColumnAndRow($x, $y, $row['id_product'] );
		$sheet->setCellValueByColumnAndRow($x+1, $y, $row['id_category_default'] );
		$sheet->setCellValueByColumnAndRow($x+2, $y, $row['price'] );
		$sheet->setCellValueByColumnAndRow($x+3, $y, $row['description'] );
		$sheet->setCellValueByColumnAndRow($x+4, $y, $row['description_short'] );
		$sheet->setCellValueByColumnAndRow($x+5, $y, $row['meta_description'] );
		$sheet->setCellValueByColumnAndRow($x+6, $y, $row['meta_keywords'] );
		$sheet->setCellValueByColumnAndRow($x+7, $y, $row['meta_title'] );
		$sheet->setCellValueByColumnAndRow($x+8, $y, $row['name'] );

		$y++;
		
	}


	$writer = new Xlsx($spread);

	$writer = IOFactory::createWriter($spread, 'Xlsx');

	$writer->save('php://output');
 
 ?>