<?php
	ini_set('display_errors', '1');

	error_reporting(E_ALL ^ E_NOTICE);
	
	require dirname(__DIR__) . "/vendor/autoload.php";
	
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	use PhpOffice\PhpSpreadsheet\IOFactory;
	
	require_once  dirname(__DIR__) .'/libs/query.php';
	
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

	header('Content-Disposition: attachment;filename="categories.xlsx"');
	
	header('Cache-Control: max-age=0');

	
	$query = new Query();

    $results = $query->select_categories();

	$spread = new Spreadsheet();

	$sheet = $spread->getActiveSheet();
    $sheet->setTitle("CATEGORIAS");
    
	$sheet->setCellValueByColumnAndRow(1, 1,"ID CATEGORIA");
	$sheet->setCellValueByColumnAndRow(2, 1,"ID LANG");
	$sheet->setCellValueByColumnAndRow(3, 1,"LINK REWRITE");
	$sheet->setCellValueByColumnAndRow(4, 1,"NOMBRE");
	$sheet->setCellValueByColumnAndRow(5, 1,"DESCRIPCION");
	$sheet->setCellValueByColumnAndRow(6, 1,"META TITULO");
	$sheet->setCellValueByColumnAndRow(7, 1,"META DESCRIPCION");

	$x = 1; $y=2;

	while ( $row = $results->fetch_assoc() ) {
		
		$sheet->setCellValueByColumnAndRow($x, $y, $row['id_category'] );
		$sheet->setCellValueByColumnAndRow($x+1, $y, $row['id_lang'] );
		$sheet->setCellValueByColumnAndRow($x+2, $y, $row['link_rewrite'] );
		$sheet->setCellValueByColumnAndRow($x+3, $y, $row['name'] );
		$sheet->setCellValueByColumnAndRow($x+4, $y, $row['description'] );
		$sheet->setCellValueByColumnAndRow($x+5, $y, $row['meta_title'] );
        $sheet->setCellValueByColumnAndRow($x+6, $y, $row['meta_description'] );
        
		$y++;
		
	}


	$writer = new Xlsx($spread);

	$writer = IOFactory::createWriter($spread, 'Xlsx');

	$writer->save('php://output');
 
 ?>