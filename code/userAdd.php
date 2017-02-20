<?php
include_once("../admin/core/admin.php");

$pass = admin::getParam("pass");
$pass2 = admin::getParam("pass2");
$idUser = admin::getParam("idUser");

if ($pass==$pass2){
    $pass = md5($pass);
    $sSQL = "update mdl_client set "
        . " cli_password = '".$pass."'"
        . ",cli_pass_change = 1"
        . " where cli_uid=$idUser";

	$db->query($sSQL);
	$msg="Actualizaci&oacute;n realizada correctamente.";
}
echo $msg;
?>