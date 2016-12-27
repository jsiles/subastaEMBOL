<?php
include_once("../../core/admin.php");
admin::initialize('reportes','reporteList',false);
require_once '../../excelPdf/PHPExcel.php';
$objPHPExcel = new PHPExcel();
		
date_default_timezone_set('America/La_Paz');
$pro_uid =admin::toSql(admin::getParam("pro"),"Number");

$sql ="SELECT pro_name,pca_name,pro_description,pro_quantity,pro_unidad,sub_status, sub_modalidad, sub_type, sub_hour_end, sub_mount_base, sub_mount_unidad, sub_tiempo, sub_uid 
FROM mdl_subasta, mdl_product,mdl_pro_category
WHERE sub_uid=pro_sub_uid and pca_uid=sub_pca_uid and sub_status='ACTIVE' and pro_uid='$pro_uid'";
$db->query($sql);
while ($firstPart = $db->next_record())
{ 
	$pca_name=$firstPart['pro_name'];
	$sub_uid=$firstPart['pca_name'];
	$pro_description=$firstPart['pro_description'];
	$pro_quantity=$firstPart['pro_quantity'];
	$pro_unidad=$firstPart['pro_unidad'];
	$sub_status=$firstPart['sub_status'];
	$sub_modalidad=$firstPart['sub_modalidad'];
	$sub_type=$firstPart['sub_type'];
	$sub_hour_end=$firstPart['sub_hour_end'];
	$sub_mount_base=$firstPart['sub_mount_base'];
	$sub_mount_unidad=$firstPart['sub_mount_unidad'];
	$sub_tiempo=$firstPart['sub_tiempo'];
	$sub_uid=$firstPart['sub_uid'];
}
	
$sql ="select concat(cli_firstname,' ',cli_lastname) as nombre, inc_lugar_entrega, tra_name, inl_name, inc_ajuste 
from mdl_incoterm, mdl_incoterm_language, mdl_transporte, mdl_client 
where inc_inl_uid=inl_uid and inc_tra_uid=tra_uid and inc_cli_uid=cli_uid and inc_delete=0 and inc_sub_uid='$sub_uid' 
order by inc_uid desc";
$db2->query($sql);	
$countVar= count($firstPart);

$secPart = $db2->next_record();
while ($firstPart = $db->next_record())
{ 
	$nombre=$secPart['nombre'];
	$inc_lugar_entrega=$secPart['inc_lugar_entrega'];
	$tra_name=$secPart['tra_name'];
	$inl_name=$secPart['inl_name'];
	$inc_ajuste=$secPart['inc_ajuste'];
}

if($countVar > 0 ){

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		// Se asignan las propiedades del reporte
		$objPHPExcel->getProperties()->setCreator("SCLE") 
							 ->setLastModifiedBy("SCLE") 
							 ->setTitle("Parametrización de subasta")
							 ->setSubject("Parametrización de subasta")
							 ->setDescription("Reporte de subasta")
							 ->setKeywords("Parametrización de subasta")
							 ->setCategory("Reporte excel");

		$tituloReporte = "Parametrización de subasta";
		$fechaReporte = date("d/m/Y");
		$tituloReporte1 = "1: Datos generales de la subasta";
		$tituloReporte2 = "2: Datos particulares de la subasta";
		$tituloReporte3 = "3: Proveedores habilitados";
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
		
		$titulosColumnas = array('NOMBRE', 'FECHA DE NACIMIENTO', 'SEXO', 'CARRERA');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:D1');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('E3',$tituloReporte)
        		    ->setCellValue('G4',  $fechaReporte)
		            ->setCellValue('B7',  $tituloReporte1)
        		    ->setCellValue('B15', $tituloReporte2)
            		->setCellValue('B23', $tituloReporte3);
		
		//Se agregan los datos de las subastas
		$i = 4;
		//while ($firstPart = $fila->fetch_array()) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $firstPart['pca_name'])
		            ->setCellValue('B'.$i,  $sub_uid)
        		    ->setCellValue('C'.$i,  $firstPart['pca_name'])
            		->setCellValue('D'.$i, utf8_encode($firstPart['pca_name']));
					$i++;
		//}
		
		$estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'Verdana',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
               	'size' =>16,
	            	'color'     => array(
    	            	'rgb' => 'FFFFFF'
        	       	)
            ),
	        'fill' => array(
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('argb' => 'FF220835')
			),
            'borders' => array(
               	'allborders' => array(
                	'style' => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
            'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'rotation'   => 0,
        			'wrap'          => TRUE
    		)
        );

		$estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true,                          
                'color'     => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation'   => 90,
        		'startcolor' => array(
            		'rgb' => 'c47cf2'
        		),
        		'endcolor'   => array(
            		'argb' => 'FF431a5d'
        		)
			),
            'borders' => array(
            	'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                )
            ),
			'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'wrap'          => TRUE
    		));
			
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'Arial',               
               	'color'     => array(
                   	'rgb' => '000000'
               	)
           	),
           	'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'		=> array('argb' => 'FFd9b7f4')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)             
           	)
        ));
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A3:D3')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:D".($i-1));
				*/
		for($i = 'A'; $i <= 'D'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('ReporteSubasta');
		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);
		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Reportedesubastas-'.date("YmdHis").'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	}
	else{
		print_r('No hay resultados para mostrar');
	}
?>