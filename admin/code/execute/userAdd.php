<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/safeHtml.php");
admin::initialize('users','usersNew',false);

$usr_loginA = admin::toSql(safeHtml($_POST["usr_login"]),"String");
$usr_passA = admin::toSql(safeHtml($_POST["usr_pass"]),"String");
$usr_firstnameA = admin::toSql(safeHtml($_POST["usr_firstname"]),"String");
$usr_lastnameA = admin::toSql(safeHtml($_POST["usr_lastname"]),"String");
$usr_emailA = admin::toSql(safeHtml($_POST["usr_email"]),"String");
$usr_photoA = admin::toSql(safeHtml($_POST["usr_photo"]),"String");
$usr_statusA = admin::toSql(safeHtml($_POST["usr_status"]),"String");
$usr_rolA = admin::toSql(safeHtml($_POST["usr_rol"]),"Number");
$usr_statusA = ($usr_statusA==1)?'ACTIVE':'INACTIVE';

if ($usr_passA!="") 
	{
	$changepass1 = " usr_pass ";
	$changepass2 = " '".md5($usr_passA)."' ";
	$confirmed=1;
	}
else 
	{
	$confirmed=0;
	$changepass1 = "";
	$changepass2 = "";
	}


$usr_exist = admin::getDBvalue("select usr_login FROM sys_users where usr_login='".$usr_loginA."'");

if($usr_exist==""){
$usr_max = admin::getDBvalue("select max(usr_uid) FROM sys_users ");	
$usr_max++;
	$sql = "insert into sys_users(							
		                        usr_uid,
								usr_login,
								usr_firstname,
								usr_lastname,
								usr_email,
								usr_status,
								usr_delete,
                                                                usr_date,
								".$changepass1."
								)
						values	(
							    ".$usr_max.",
								'".$usr_loginA."',
								'".$usr_firstnameA."', 
								'".$usr_lastnameA."', 
								'".$usr_emailA."',							
								'".$usr_statusA."',
								0,
                                                                GETDATE(),
								".$changepass2."
								)";
        //echo $sql;die;
	$db->query($sql);

		// OBTENEMOS EL ULTIMO ID INTRODUCIDO POR EL USUARIO EN LA BASE DE DATOS
		// ULTIMO REGISTRO
/*		$sql="SELECT SCOPE_IDENTITY() as UID;";
		$db2->query($sql);
		$content = $db2->next_record();
		$use_uidA = $content["UID"];*/

	$maxRolUser=admin::getDBvalue("select max(rus_uid) from mdl_roles_users");	
	$maxRolUser++;
	$sql = "insert into mdl_roles_users(rus_uid,rus_usr_uid,rus_rol_uid) values (".$maxRolUser.",".$usr_max.",".$usr_rolA.")";

	$db->query($sql);
	// SUBIENDO LA IMAGEN 		
	$FILES = $_FILES ['usr_photo'];
		
        $allowedTypes = array("jpeg","jpg","gif","bmp", "png");
        $validFile = $FILES['name'] != '' && in_array( strtolower(pathinfo($FILES["name"],PATHINFO_EXTENSION)),$allowedTypes) ? true : false;		
		
if ($validFile && $FILES['error']==0)
	{
	// DATOS DE ARCHIVO EN SU FORMATO ORIGINAL
	$extensionFile = admin::getExtension($FILES["name"]);
	$fileName = admin::imageName($usr_loginA)."_".$use_uidA.".".$extensionFile;
	// DATOS DE REDIMENCION DE IMAGENES
	$nomIMG = admin::imageName($usr_loginA)."_".$use_uidA.".jpg";
	$nomIMG2 = "thumb_".$nomIMG;
	$nomIMG22 = "thumb2_".$nomIMG;
	$nomIMG3 = "img_".$nomIMG;
	// Subimos el archivo con el nombre original
	classfile::uploadFile($FILES,PATH_ADMIN . '/upload/profile/',$fileName);
	// redimencionamos al mismo pero con extencion jpg en el mismo tama�o
	redimImgPercent(PATH_ADMIN . "/upload/profile/" . $fileName, PATH_ADMIN . "/upload/profile/". $nomIMG,100,100);
	// Redimencionamos el nuevo jpg por el ancho definido
	redimImgWH(PATH_ADMIN . "/upload/profile/" . $nomIMG, PATH_ADMIN . "/upload/profile/". $nomIMG2,60,100);
	// Redimencionamos el nuevo jpg por el ancho definido
	redimImgWidth(PATH_ADMIN . "/upload/profile/" . $nomIMG, PATH_ADMIN . "/upload/profile/". $nomIMG22,31,100);	
	// Redimencionamos el nuevo jpg por el ancho definido
	redimImgWidth(PATH_ADMIN . "/upload/profile/" . $nomIMG, PATH_ADMIN . "/upload/profile/". $nomIMG3,300,100);
	// GUARDAMOS LA PRINCIPAL EN BASE DE DATOS
	$sql = "UPDATE sys_users SET usr_photo='".$nomIMG."' WHERE usr_uid=".$use_uidA;
	$db->query($sql);
	}

}
$token=admin::getParam("token");		
unset($_POST);	
header('Location: ../../userList.php?token='.$token);
?>