<?php
include_once("../../core/simple99.php");
SIMPLE99::initialize('dpf','dpfList',false);

$ind_uid = SIMPLE99::toSql(SIMPLE99::getParam("ind_uid"),"Number");
$ind_description = SIMPLE99::toSql(SIMPLE99::getParam("ind_description2".$ind_uid),"String");
$ind_por_bol = SIMPLE99::toSql(SIMPLE99::getParam("ind_por_bol2".$ind_uid),"String");
$ind_por_dol = SIMPLE99::toSql(SIMPLE99::getParam("ind_por_dol2".$ind_uid),"String");
$ind_por_ufv = SIMPLE99::toSql(SIMPLE99::getParam("ind_por_ufv2".$ind_uid),"String");
$ind_plazo = SIMPLE99::toSql(SIMPLE99::getParam("ind_plazo2".$ind_uid),"Number");


$sqldat = "update mdl_indicadores set ind_description='".$ind_description."', ind_por_bol='".$ind_por_bol."', ind_por_dol='".$ind_por_dol."', ind_por_ufv='".$ind_por_ufv."', ind_plazo='".$ind_plazo."' where ind_uid=".$ind_uid;
$db->query($sqldat);

$token=SIMPLE99::getParam("token");
$nextUrl='dpfList.php?token='.SIMPLE99::getParam("token");
unset($_POST);
header('Location: ../../'.$nextUrl);
?>