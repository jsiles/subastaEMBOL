<?php
include_once("../admin/core/admin.php");
$companyName=admin::getParam("companyName");
$reasonSocial = admin::getParam("reasonSocial");
$user = admin::getParam("user");
$pass = admin::getParam("pass");
$email = admin::getParam("email");
$firstnameClient = admin::getParam("firstnameClient");
$lastnameClient = admin::getParam("lastnameClient");
$idUser = admin::getParam("idUser");
if(!isset($idUser)){
$validaUser = admin::getDbValue("select count(*) from mdl_client where (cli_user ='$user' or cli_email='$email')");
if ($validaUser==0){
$sSQL = "insert into mdl_client "
        . "(cli_companyname
      ,cli_socialreason
      ,cli_user
      ,cli_pass
      ,cli_firstname
      ,cli_lastname
      ,cli_email
      ,cli_status
      ,cli_delete
      ,cli_date
      ,cli_photo)"
        . "values ('$companyName'"
        . ",'$reasonSocial'"
        . ",'$user'"
        . ",'".SymmetricCrypt::encrypt($pass)."'"
        . ", '$firstnameClient'"
        . ", '$lastnameClient'"
        . ",  '$email'"
        . ", 'INACTIVE'"
        . ", 0"
        . ", GETDATE()"
        . ", '')";
//echo $sSQL;die;
$db->query($sSQL);
$msg="Registro realizado correctamente. Ingrese <a href=\"".$domain."/session/"."\">aqui!!</a> para continuar.";
}else{
    $msg= "Usuario/Correo electr&oacute;nico ya registrado, intente con uno distinto.";
}
}else
    {
    
$sSQL = "update mdl_client set "
        . " cli_companyname = '$companyName' "
        . ",cli_socialreason = '$reasonSocial'"
        . ",cli_pass = '".SymmetricCrypt::encrypt($pass)."'"
        . ",cli_firstname = '$firstnameClient'"
        . ",cli_lastname = '$lastnameClient'"
        . ",cli_email = '$email'"
        . " where cli_uid=$idUser";
//echo $sSQL;
$db->query($sSQL);
$msg="Actualizaci&oacute;n realizada correctamente.";
    
    
    }

//echo $domain."/session/"; //
//header("Location: ".$domain."/session/");
echo $msg;
?>