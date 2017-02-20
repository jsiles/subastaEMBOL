<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/safeHtml.php");
include_once("../../../classes/class.SymmetricCrypt.inc.php");
admin::initialize('client','clientNew',false);

$cli_nit_ci = admin::toSql(safeHtml($_POST["cli_nit_ci"]),"String");
$cli_interno = admin::toSql(safeHtml($_POST["cli_interno"]),"String");
$cli_lec_uid = admin::toSql(safeHtml($_POST["cli_lec_uid"]),"String");
$cli_socialreason = admin::toSql(safeHtml($_POST["cli_socialreason"]),"String");
$cli_legaldirection = admin::toSql(safeHtml($_POST["cli_legaldirection"]),"String");
$cli_phone = admin::toSql(safeHtml($_POST["cli_phone"]),"String");
$cli_mainemail = admin::toSql(safeHtml($_POST["cli_mainemail"]),"String");
$cli_commercialemail = admin::toSql(safeHtml($_POST["cli_commercialemail"]),"String");
$cli_legalname = admin::toSql(safeHtml($_POST["cli_legalname"]),"String");
$cli_legallastname = admin::toSql(safeHtml($_POST["cli_legallastname"]),"String");
$cli_legalname2 = admin::toSql(safeHtml($_POST["cli_legalname2"]),"String");
$cli_legallastname2 = admin::toSql(safeHtml($_POST["cli_legallastname2"]),"String");
$cli_legalname3 = admin::toSql(safeHtml($_POST["cli_legalname3"]),"String");
$cli_legallastname3 = admin::toSql(safeHtml($_POST["cli_legallastname3"]),"String");
$cli_commercialname = admin::toSql(safeHtml($_POST["cli_commercialname"]),"String");
$cli_commerciallastname = admin::toSql(safeHtml($_POST["cli_commerciallastname"]),"String");

$cli_user = admin::toSql(safeHtml($_POST["cli_user"]),"String");
$cli_pass = admin::toSql(safeHtml($_POST["cli_pass"]),"String");
$mcl_pass =12345;
if(strlen($cli_pass)==0) $cli_pass=$mcl_pass;	
$cli_email = admin::toSql(safeHtml($_POST["cli_email"]),"String");
$cli_firstname = admin::toSql(safeHtml($_POST["cli_firstname"]),"String");
$cli_lastname = admin::toSql(safeHtml($_POST["cli_lastname"]),"String");
$cli_status = (admin::getParam("cli_status")==1)?'ACTIVE':'INACTIVE';
$cli_exist = admin::getDBvalue("select count(cli_user) FROM mdl_client where cli_user='".$cli_user."' and cli_delete=0");

if($cli_exist==0){
	$cli_uid = admin::getDBvalue("select max(cli_uid) FROM mdl_client");
        if($cli_uid!=NULL)
	$cli_uid++;
        else $cli_uid=1;
	//$mcl_pass = $cli_uid.chr(floor(rand(65,90))). chr(floor(rand(65,90))). chr(floor(rand(48,57))). chr(floor(rand(65,90))) . chr(floor(rand(65,90)));
	$sql = "insert into mdl_client(							
								cli_nit_ci,
								cli_interno,
								cli_lec_uid,
								cli_socialreason,
								cli_legaldirection,
								cli_phone,
								cli_mainemail,
								cli_commercialemail,
								cli_legalname,
								cli_legallastname,
								cli_legalname2,
								cli_legallastname2,
								cli_legalname3,
								cli_legallastname3,
								cli_commercialname,
								cli_commerciallastname,
								cli_user,
								cli_pass,
								cli_firstname,
								cli_lastname,
								cli_email,
								cli_status,
								cli_delete,
								cli_date,
								cli_photo,
                                                                cli_status_main
								)
						values	(
								'$cli_nit_ci',
								'$cli_interno',
								'$cli_lec_uid',
								'$cli_socialreason',
								'$cli_legaldirection',
								'$cli_phone', 
								'$cli_mainemail', 
								'$cli_commercialemail',
								'$cli_legalname',
								'$cli_legallastname',
								'$cli_legalname2',
								'$cli_legallastname2',
								'$cli_legalname3',
								'$cli_legallastname3',
								'$cli_commercialname',
								'$cli_commerciallastname',
								'$cli_user',
								'".SymmetricCrypt::encrypt($cli_pass)."',
								'".$cli_firstname."', 
								'".$cli_lastname."', 
								'".$cli_email."',
								'".$cli_status."',
								0,
								GETDATE(),
								'',
                                                                0
								)";
	$db->query($sql);

	$cli_uid = admin::getDBvalue("select cli_uid FROM mdl_client where cli_nit_ci='".$cli_nit_ci."' and cli_delete=0");
	
	$cli_doc_uid = admin::getParam("cli_doc_uid");
	if (is_array($cli_doc_uid)){
         foreach (array_keys($cli_doc_uid) as $value) {
              $sql = "insert into mdl_documentsclient (dcl_cli_uid, dcl_doc_uid) values (".$cli_uid.", ".$value.")";
              $db->query($sql);
		 }
    }
	$FILES = $_FILES ['cli_logo'];
		
        $allowedTypes = array("jpeg","jpg","gif","bmp", "png");
        $validFile = $FILES['name'] != '' && in_array( strtolower(pathinfo($FILES["name"],PATHINFO_EXTENSION)),$allowedTypes) ? true : false;		
		
if ($validFile && $FILES['error']==0)
	{
	// DATOS DE ARCHIVO EN SU FORMATO ORIGINAL
	$extensionFile = admin::getExtension($FILES["name"]);
	$fileName=admin::imageName($cli_firstname)."_".$cli_uid.".".$extensionFile;
	// DATOS DE REDIMENCION DE IMAGENES
	$nomIMG= admin::imageName($cli_firstname)."_".$cli_uid.".jpg";
	$nomIMG2="thumb_".$nomIMG;
	// Subimos el archivo con el nombre original
	classfile::uploadFile($FILES,PATH_ROOT.'/img/client/',$fileName);
	// redimencionamos al mismo pero con extencion jpg en el mismo tamaño
	redimImgPercent(PATH_ROOT."/img/client/".$fileName, PATH_ROOT."/img/client/".$nomIMG,100,100);
	// Redimencionamos el nuevo jpg por el ancho definido
	redimImgWH(PATH_ROOT."/img/client/".$nomIMG, PATH_ROOT."/img/client/".$nomIMG2,60,100);
	// Redimencionamos el nuevo jpg por el ancho definido
	$sql = "UPDATE mdl_client SET cli_photo='".$nomIMG."' WHERE cli_uid=".$cli_uid;
	$db->query($sql);
	}
}
        $token=admin::getParam("token");		
unset($_POST);	
header('Location: ../../clientList.php?token='.$token);
?>