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
$rav_status =(admin::getParam("rav_status")==1)?"ACTIVE":"INACTIVE";
$rav_moneda = admin::getParam("rav_moneda");

    $sql="update mdl_rav set ".
         "rav_rol_uid= ". $rav_rol.
         ",rav_monto_inf= ". $rav_monto.
         ",rav_monto_sup= ". $rav_monto1.
         ",rav_status= '". $rav_status."'".
         ",rav_cur_uid= ". $rav_moneda.
         " where ".   
         " rav_uid=".$rav_uid;
    //echo $sql;die;
   $db->query($sql);

   unset($_POST);//die;
if($rav_tipo==1){
header('Location: ../../subastasRavList.php?token='.$token);	
}else{
header('Location: ../../subastasRavInfList.php?token='.$token);	    
}

?>