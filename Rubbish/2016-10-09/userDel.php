<?php
include_once("../../database/connection.php");  
include_once("../../core/admin.php");
admin::initialize('users','usersNew',false);
$use_uidA = $_POST["uid"];
$sql = "update sys_users set usr_delete=1 where usr_uid=".$use_uidA;
$db->query($sql);
?>