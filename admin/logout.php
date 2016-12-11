<?php 
include_once("core/admin.php");
@session_start();
			$sql = "update sys_users_verify set suv_status=1,suv_token='' where suv_cli_uid='" . $_SESSION["usr_uid"] . "' and suv_token='".admin::getParam("token")."'";
			$db->query($sql);
session_unset();
session_destroy(); 
header('Location: index.php');
?>
