
<?php
include_once("../../core/admin.php");
admin::initialize('reportes','reporteList',false);
require_once '../../excelPdf/PHPExcel.php';
include_once ('../../excelPdf/PHPExcel/Writer/PDF.php');
require_once ('../../excelPdf/PHPExcel/IOFactory.php');
include_once ('../../excelPdf/PHPExcel/Writer/Excel2007.php');
include_once ('../../excelPdf/PHPExcel/Writer/PDF/DomPDF.php');

$objPHPExcel = new PHPExcel();
		
date_default_timezone_set('America/La_Paz');
$pro_uid =admin::toSql(admin::getParam("pro"),"Number");
$formato =admin::toSql(admin::getParam("type"),"String");

if ($formato=="xls") {
	$type="Excel5";
}
if ($formato=="xlsx") {
	$type="Excel2007";
}
if ($formato=="pdf") {
	$type="PDF";
}

// Se asignan las propiedades del reporte
$objPHPExcel->getProperties()->setCreator("SCLE") 
							 ->setLastModifiedBy("SCLE") 
							 ->setTitle("Parametrización de subasta")
							 ->setSubject("Parametrización de subasta")
							 ->setDescription("Reporte de subasta")
							 ->setKeywords("Parametrización de subasta")
							 ->setCategory("Reporte excel");

$tituloReporte = "Parametrización de subasta";
$fechaReporte = 'Fecha: '.date("d/m/Y");
$tituloReporte1 = "1: Datos generales de la subasta";
$tituloReporte2 = "2: Datos particulares de la subasta";
$tituloReporte3 = "3: Proveedores habilitados";

$sql ="SELECT pro_name,pca_name,pro_description,pro_quantity,pro_unidad,sub_status, sub_modalidad, sub_type, sub_hour_end, sub_mount_base, sub_mount_unidad, sub_tiempo, sub_uid 
FROM mdl_subasta, mdl_product,mdl_pro_category
WHERE sub_uid=pro_sub_uid and pca_uid=sub_pca_uid and sub_status='ACTIVE' and pro_uid='$pro_uid'";
$db->query($sql);
while ($firstPart = $db->next_record())
{ 
	$pca_name=$firstPart['pro_name'];
	$pca_name=$firstPart['pca_name'];
	$pro_description=$firstPart['pro_description'];
	$pro_quantity=$firstPart['pro_quantity'];
	$pro_unidad=$firstPart['pro_unidad'];
	$sub_status=$firstPart['sub_status'];
	$sub_modalidad=$firstPart['sub_modalidad'];
	$sub_type=$firstPart['sub_type'];
	$sub_hour_end=explode(" ", $firstPart['sub_hour_end']);
	$sub_mount_base=$firstPart['sub_mount_base'];
	$sub_mount_unidad=$firstPart['sub_mount_unidad'];
	$sub_tiempo=$firstPart['sub_tiempo'];
	$sub_uid=$firstPart['sub_uid'];
}
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
		 			->setCellValue('D3',  $tituloReporte)
        		    ->setCellValue('G4',  $fechaReporte)
		            ->setCellValue('B7',  $tituloReporte1)
					->setCellValue('B15',  $tituloReporte2)
					->setCellValue('B23',  $tituloReporte3)
					->setCellValue('B9',  'Nombre:')
					->setCellValue('B10',  'Categoria:')
					->setCellValue('B11',  'Descripcion:')
					->setCellValue('B12',  $pro_description)
					->setCellValue('C9',  $pca_name)
					->setCellValue('C10',  $pca_name)
					->setCellValue('F9',  'Cantidad:')
					->setCellValue('F10',  'Unidades:')
					->setCellValue('G9',  $pro_quantity)
        		    ->setCellValue('G10', $pro_unidad)
					->setCellValue('B17', 'Modalidad de subasta:')
					->setCellValue('B18', 'Tipo de subasta:')
					->setCellValue('B19', 'Monto base:')
					->setCellValue('B20', 'Unidad de mejorar:')
					->setCellValue('C17', $sub_modalidad)
					->setCellValue('C18', $sub_type)
					->setCellValue('C19', $sub_mount_base)
					->setCellValue('C20', $sub_mount_unidad)
					->setCellValue('F17', 'Fecha de subasta:')
					->setCellValue('F18', 'Hora de subasta:')
					->setCellValue('F20', 'Tiempo límite de mejora en min.:')
					->setCellValue('G17', $sub_hour_end[0])
					->setCellValue('G18', $sub_hour_end[1])
					->setCellValue('G20', $sub_tiempo)
					->setCellValue('B25', 'Ofertante')
					->setCellValue('C25', 'Lugar de entrega')
					->setCellValue('D25', 'Medio de transporte')
					->setCellValue('E25', 'Incoterm')
					->setCellValue('F25', 'Factor de ajuste');
		
		//Se agregan los datos de las subastas

$sql ="select concat(cli_firstname,' ',cli_lastname) as nombre, inc_lugar_entrega, tra_name, inl_name, inc_ajuste 
from mdl_incoterm, mdl_incoterm_language, mdl_transporte, mdl_client 
where inc_inl_uid=inl_uid and inc_tra_uid=tra_uid and inc_cli_uid=cli_uid and inc_delete=0 and inc_sub_uid='$sub_uid' 
order by inc_uid desc";
$db2->query($sql);	
$i = 26;
while ($secPart = $db2->next_record())
{ 
	$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('B'.$i, $secPart['nombre'])
		            ->setCellValue('C'.$i, $secPart['inc_lugar_entrega'])
        		    ->setCellValue('D'.$i, $secPart['tra_name'])
					->setCellValue('E'.$i, $secPart['inl_name'])
            		->setCellValue('F'.$i, $secPart['inc_ajuste']);
					$i++;
}

		/*
		$gdImage = imagecreatefromjpeg('../../lib/logo.png');
		// Add a drawing to the worksheetecho date('H:i:s') . " Add a drawing to the worksheet\n";
		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$objDrawing->setName('Sample image');$objDrawing->setDescription('Sample image');
		$objDrawing->setImageResource($gdImage);
		$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
		$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
		$objDrawing->setHeight(70);
		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
		$objDrawing->setCoordinates('B2');
*/
        //$objPHPExcel->getActiveSheet()->getStyle('B1:G45')->getAlignment()->setWrapText(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B:G')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getStyle("D3")->getFont()->setSize(16);
		
		/*for($i = 'B'; $i <= 'H'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}*/
		
		
				
		$rendererName = PHPExcel_Settings::PDF_RENDERER_DOMPDF;
$rendererLibrary = 'domPDF0.6.0beta3';
$rendererLibraryPath = dirname(__FILE__). '../../dompdf' . $rendererLibrary;
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('ReporteSubasta');
		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);
		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		if ($type=="PDF") header('Content-Type: application/pdf');
		else header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		
		header('Content-Disposition: attachment;filename="Reportedesubastas-'.date("YmdHis").'.'.$formato.'"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $type);

		$objWriter->save('php://output');
		exit;
/*		
	}
	else{
		print_r('No hay resultados para mostrar');
	}*/
?>