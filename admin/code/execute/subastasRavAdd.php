<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/thumb.php");
admin::initialize('subastaRav','subastaRavAdd'); 
$token=admin::getParam("token");
$rav_uid = admin::getParam("rav_uid");
$rav_rol =admin::getParam("rav_rol");
$rav_monto =admin::getParam("rav_monto"); 
$rav_monto1 =admin::getParam("rav_monto1");
$rav_tipo =admin::getParam("rav_tipo");
$array=$rav_uid;
//print_r($rav_uid);

    $sql="insert into mdl_rav (rav_rol_uid, rav_monto_inf, rav_monto_sup, rav_tipologia)"
            . " values ($rav_rol,$rav_monto,$rav_monto1, $rav_tipo) ";
    //echo $sql;
   $db->query($sql);
unset($_POST);//die;
if($rav_tipo==1){
header('Location: ../../subastasRavList.php?token='.$token);	
}else{
header('Location: ../../subastasRavInfList.php?token='.$token);	    
}
?>