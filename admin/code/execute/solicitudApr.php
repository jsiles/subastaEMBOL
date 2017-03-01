<?php
include_once("../../core/admin.php");
//admin::initialize('autorizacion','autorizacionList',false);
$sol_uid = $_POST["uid"];
$sql = "update mdl_solicitud_compra set sol_estado=1, sol_status='ACTIVE' where sol_uid=".$sol_uid;
$db->query($sql);
echo $sql;      
?>