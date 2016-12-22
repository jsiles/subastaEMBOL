<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../../classes/class.SymmetricCrypt.inc.php");
admin::initialize('client','clientEdit',false);

$cli_uid = $_POST["cli_uid"];

$cli_companyname = admin::toSql(safeHtml($_POST["cli_companyname"]),"String");
$cli_socialreason = admin::toSql(safeHtml($_POST["cli_socialreason"]),"String");
$cli_user = admin::toSql(safeHtml($_POST["cli_user"]),"String");
$cli_pass = admin::toSql(safeHtml($_POST["cli_pass"]),"String");

$cli_firstname = admin::toSql(safeHtml($_POST["cli_firstname"]),"String");
$cli_lastname = admin::toSql(safeHtml($_POST["cli_lastname"]),"String");
$cli_email = admin::toSql(safeHtml($_POST["cli_email"]),"String");
$cli_status = admin::toSql(safeHtml($_POST["cli_status"]),"String");

if ($cli_pass!="") $changepass = "cli_pass='".SymmetricCrypt::encrypt($cli_pass)."',";
else $changepass =  "cli_pass='".SymmetricCrypt::encrypt('12345')."',";
;

$sql = "update mdl_client set
			cli_companyname='".$cli_companyname."',
			cli_socialreason='".$cli_socialreason."',
			cli_user='".$cli_user."',
			cli_email='".$cli_email."',
			cli_firstname='".$cli_firstname."', 
			cli_lastname='".$cli_lastname."',
			cli_status='".$cli_status."',
			".$changepass."
			cli_date=GETDATE()
		where cli_uid=".$cli_uid;
//echo $sql;//die; 
$db->query($sql);

// SUBIENDO LA IMAGEN NOTICIAS
$FILES = $_FILES ['cli_photo'];
		
        $allowedTypes = array("jpeg","jpg","gif","bmp");
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
	redimImgWH(PATH_ROOT."/img/client/".$nomIMG, PATH_ROOT."/img/client/".$nomIMG2,70,100);
	// Redimencionamos el nuevo jpg por el ancho definido
	$sql = "UPDATE mdl_client SET cli_photo='".$nomIMG."' WHERE cli_uid=".$cli_uid;
	$db->query($sql);
	}
$token=admin::getParam("token");		
unset($_POST);	
header('Location: ../../clientList.php?token='.$token);		
?>