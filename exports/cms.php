<?php
	ini_set('display_errors', '1');

	error_reporting(E_ALL ^ E_NOTICE);
	
	require dirname(__DIR__) . "/vendor/autoload.php";
	
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	use PhpOffice\PhpSpreadsheet\IOFactory;
	
	require_once  dirname(__DIR__) .'/libs/query.php';
	
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

	header('Content-Disposition: attachment;filename="cms.xlsx"');
	
	header('Cache-Control: max-age=0');

	
	$query = new Query();

    $results = $query->select_cms();

	$spread = new Spreadsheet();

	$sheet = $spread->getActiveSheet();
    $sheet->setTitle("CMS");
    
	$sheet->setCellValueByColumnAndRow(1, 1,"ID CMS");
	$sheet->setCellValueByColumnAndRow(2, 1,"ID LANG");
	$sheet->setCellValueByColumnAndRow(3, 1,"META TITULO");
	$sheet->setCellValueByColumnAndRow(4, 1,"HEAD SEO TITLE");
	$sheet->setCellValueByColumnAndRow(5, 1,"META DESCRIPCION");
	$sheet->setCellValueByColumnAndRow(6, 1,"META KEYWORDS");
	$sheet->setCellValueByColumnAndRow(7, 1,"CONTENIDO");

	$x = 1; $y=2;

	while ( $row = $results->fetch_assoc() ) {
		
		$sheet->setCellValueByColumnAndRow($x, $y, $row['id_cms'] );
		$sheet->setCellValueByColumnAndRow($x+1, $y, $row['id_lang'] );
		$sheet->setCellValueByColumnAndRow($x+2, $y, $row['meta_title'] );
		$sheet->setCellValueByColumnAndRow($x+3, $y, $row['head_seo_title'] );
		$sheet->setCellValueByColumnAndRow($x+4, $y, $row['meta_description'] );
		$sheet->setCellValueByColumnAndRow($x+5, $y, $row['meta_keywords'] );
        $sheet->setCellValueByColumnAndRow($x+6, $y, $row['content'] );
        
		$y++;
		
	}


	$writer = new Xlsx($spread);

	$writer = IOFactory::createWriter($spread, 'Xlsx');

	$writer->save('php://output');
 
 ?>