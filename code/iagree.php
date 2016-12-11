<?php
include_once("../admin/core/admin.php");
admin::initializeClient();
$_keycode=admin::getParam("_keycode");
$uidClient = admin::getSession("uidClient");
$datetime = date("Y-m-d H:i:s");
$db->query("insert into mdl_terminos values(null, $_keycode, $uidClient, '$datetime')");
//echo "insert into mdl_termnios values(null, $_keycode, $uidClient, '$datetime')";die;
?>