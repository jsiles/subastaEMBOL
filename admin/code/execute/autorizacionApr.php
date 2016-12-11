<?php
include_once("../../core/admin.php");
//admin::initialize('autorizacion','autorizacionList',false);
$use_uidA = $_POST["uid"];
$sql = "update mdl_subasta set sub_finish=1 where sub_uid=".$use_uidA;
$db->query($sql);
?>