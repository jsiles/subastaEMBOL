<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/thumb.php");
admin::initialize('subastaRav','subastaRavUpd'); 
$token=admin::getParam("token");
$rav_uid = admin::getParam("rav_uid");
$rav_rol =admin::getParam("rav_rol");
$rav_monto =admin::getParam("rav_monto"); 
$rav_monto1 =admin::getParam("rav_monto1");
$rav_tipo =admin::getParam("rav_tipo");
$array=$rav_uid;
print_r($rav_uid);

foreach ($array as $key => $value) {
    $sql="update mdl_rav set ".
         "rav_rol_uid= ". $rav_rol[$key].
         ",rav_monto_inf= ". $rav_monto[$key].
         ",rav_monto_sup= ". $rav_monto1[$key].
         " where ".   
         " rav_uid=".$rav_uid[$key];
    //echo $sql;
   $db->query($sql);
}
unset($_POST);//die;
header('Location: ../../subastasRavList.php?token='.$token);	
?>