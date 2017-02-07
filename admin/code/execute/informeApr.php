<?php
include_once("../../core/admin.php");
//admin::initialize('autorizacion','autorizacionList',false);
$sub_uid = $_POST["uid"];
$sql = "update mdl_subasta set sub_finish=4 where sub_uid=".$sub_uid;
$db->query($sql);
        
?>