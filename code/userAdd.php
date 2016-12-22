<?php
include_once("../admin/core/admin.php");
$companyName=admin::toSql($_REQUEST["companyName"],"Text");
$reasonSocial = admin::toSql($_REQUEST["reasonSocial"],"Text");
$user = admin::toSql($_REQUEST["user"],"Text");
$email = admin::toSql($_REQUEST["email"],"Text");
$firstnameClient = admin::toSql($_REQUEST["firstnameClient"],"Text");
$lastnameClient = admin::toSql($_REQUEST["lastnameClient"],"Text");

$sSQL = "insert into mdl_client values (null,'$companyName','$reasonSocial','$user', '".SymmetricCrypt::encrypt(12345)."', '$firstnameClient', '$lastnameClient',  '$email', 'INACTIVE', 0, GETDATE(), '')";
//echo $sSQL;die;
$db->query($sSQL);

echo $domain."/session/"; //header("Location: ".$domain."/session/");

?>