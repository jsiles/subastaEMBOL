<?php
include_once("../../core/admin.php");
//admin::initialize('autorizacion','autorizacionList',false);
$cli_uid = $_POST["uid"];
$sql = "update mdl_client set cli_status_main=2 where cli_uid=".$cli_uid;
$db->query($sql);

?>