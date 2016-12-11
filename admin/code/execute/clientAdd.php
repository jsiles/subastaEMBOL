<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/safeHtml.php");
include_once("../../../classes/class.SymmetricCrypt.inc.php");
admin::initialize('client','clientNew',false);
$cli_companyname = admin::toSql(safeHtml($_POST["cli_companyname"]),"String");
$cli_socialreason = admin::toSql(safeHtml($_POST["cli_socialreason"]),"String");
$cli_user = admin::toSql(safeHtml($_POST["cli_user"]),"String");
$cli_pass = admin::toSql(safeHtml($_POST["cli_pass"]),"String");
$mcl_pass =12345;
if(strlen($cli_pass)==0) $cli_pass=$mcl_pass;	
$cli_email = admin::toSql(safeHtml($_POST["cli_email"]),"String");
$cli_firstname = admin::toSql(safeHtml($_POST["cli_firstname"]),"String");
$cli_lastname = admin::toSql(safeHtml($_POST["cli_lastname"]),"String");
$cli_status = admin::toSql(safeHtml($_POST["cli_status"]),"String");
$cli_exist = admin::getDBvalue("select count(cli_user) FROM mdl_client where cli_user='".$cli_user."' and cli_delete=0");

if($cli_exist==0){
	$cli_uid = admin::getDBvalue("select max(cli_uid) FROM mdl_client");
	$cli_uid++;
	//$mcl_pass = $cli_uid.chr(floor(rand(65,90))). chr(floor(rand(65,90))). chr(floor(rand(48,57))). chr(floor(rand(65,90))) . chr(floor(rand(65,90)));
	$sql = "insert into mdl_client(							
								cli_companyname,
								cli_socialreason,
								cli_user,
								cli_pass,
								cli_firstname,
								cli_lastname,
								cli_email,
								cli_status,
								cli_delete,
								cli_date,
								cli_photo
								)
						values	(
								'$cli_companyname',
								'$cli_socialreason',
								'$cli_user',
								'".SymmetricCrypt::encrypt($cli_pass)."',
								'".$cli_firstname."', 
								'".$cli_lastname."', 
								'".$cli_email."',
								'".$cli_status."',
								0,
								GETDATE(),
								''
								)";
								
								//echo $sql;die;
	$db->query($sql);
	
	// OBTENEMOS EL ULTIMO ID INTRODUCIDO POR EL USUARIO EN LA BASE DE DATOS
	// ULTIMO REGISTRO
	/*$sql="SELECT LAST_INSERT_ID() as UID;";
	$db2->query($sql);
	$content = $db2->next_record();
	$mcl_uid = $content["UID"];	*/
	
	// SUBIENDO LA IMAGEN 		
	$FILES=$_FILES['cli_photo'];
    $allowedTypes=array("jpeg","jpg","gif","bmp");
    $validFile=$FILES['name']!='' && in_array( strtolower(pathinfo($FILES["name"],PATHINFO_EXTENSION)) ,$allowedTypes) ? true : false;
	
		if ($validFile && $FILES['error']==0)	{
			// DATOS DE ARCHIVO EN SU FORMATO ORIGINAL
			$extensionFile=admin::getExtension($FILES["name"]);
			$fileName=admin::imageName($cli_firstname)."_".$cli_uid.".".$extensionFile;
			// DATOS DE REDIMENCION DE IMAGENES
			$nomIMG=admin::imageName($cli_firstname)."_".$cli_uid.".jpg";
			$nomIMG2="thumb_".$nomIMG;
			// Subimos el archivo con el nombre original
			classfile::uploadFile($FILES,PATH_ROOT.'/img/client/',$fileName);
			// redimencionamos al mismo pero con extencion jpg en el mismo tamaño
			redimImgPercent(PATH_ROOT."/img/client/".$fileName, PATH_ROOT."/img/client/".$nomIMG,100,100);
			// Redimencionamos el nuevo jpg por el ancho definido
			redimImgWH(PATH_ROOT."/img/client/".$nomIMG, PATH_ROOT."/img/client/".$nomIMG2,50,100);
			// GUARDAMOS LA PRINCIPAL EN BASE DE DATOS
			$sql = "UPDATE mdl_client SET cli_photo='".$nomIMG."' WHERE cli_uid=".$cli_uid;
			$db->query($sql);
			}
}
 
//      ********************** correo **************************************************** 
if ($ct_mail!="")
	{
	$ct_nameto = "Subastas";
	$ct_mailto = "jorge.siles@dev-zone.info";
	//$ct_mailto = "contactos@inti.com";
	include_once("../phpmailer/class.phpmailer.php");
	include_once("../phpmailer/config.php");		
	$mail = new PHPMailer();
	$mail->From     = $ct_mailto;
	//$mail->Password = '';
	$mail->FromName = $ct_name;
	$mail->Host     = MAILSERVER;
	$mail->Mailer   = MAILTYPE;
	$mail->Subject  = "Registro > Subastas";
	$body  = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subastas</title>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" style="width: 562px;">
  <tr style="height: 5px;">
    <td></td>
  </tr>
  <tr>
    <td style="padding: 10px;"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #fff; border-top: 2px solid #c00000; border-bottom: 2px solid #c00000;">
      <tr>
        <td style="color: #8a8889; font-family: Arial, Helvetica, sans-serif; font-size:12px; line-height: 18px; padding: 22px 20px;">
		<span style="color: #c00000; font-size: 18px;">Contacto Subastas</span><br />
          <br />
          <span style="font-weight: 700;">Subastas</span> le ha enviado la siguiente informaci&oacute;n:<br />
          <br />
          <span style="color: #c00000; font-weight: 700;">Correo: </span>'.$cli_email.'<br />
		  <span style="color: #c00000; font-weight: 700;">Password: </span>'.$cli_pass.'<br />
          <br />
          <br /> 
		  </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>';
	
	// Plain text body (for mail clients that cannot read HTML)
	$text_body  = '
	Subastas
	
	Subastas le ha enviado la siguiente información:
	
	Nombre		: ' . $cli_name . '
	Correo		: ' . $cli_email . '
	Password	: ' . $cli_pass;

	$mail->Body    = $body;
	$mail->AltBody = $text_body; 
	
	$mail->AddAddress($cli_email, $cli_name);
	//$mail->AddBCC ("jquiroga@logoscomunicaciones.com", "TEST");
	// $mail->AddStringAttachment($row["photo"], "YourPhoto.jpg");´

	if(!$mail->Send())
		$msg= "Error al enviar la consulta.";
	else
		$msg="Su consulta fu&eacute; enviada correctamente.";
	// Clear all addresses and attachments for next loop
	$mail->ClearAddresses();
	//$mail->ClearAttachments();	
	}
else
	{
	$msg = "Todos los datos son requeridos.";
	}
//echo $msg

$token=admin::getParam("token");		
unset($_POST);	
header('Location: ../../clientList.php?token='.$token);
?>