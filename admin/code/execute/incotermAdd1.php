<?php
include_once("../../core/admin.php");
admin::initialize('subastas','docsCatAdd2',false); 
$cli_uid=admin::getParam("cli_uid");
$sub_uid=admin::getParam("sub_uid");
$inc_lugar_entrega=admin::getParam("inc_lugar_entrega");
$inc_tra_uid=admin::getParam("inc_tra_uid");
$inc_inl_uid=admin::getParam("inc_inl_uid");
$inc_ajuste=admin::getParam("inc_ajuste");

$maxUid=admin::getDBvalue("SELECT max(inc_uid) FROM mdl_incoterm");
$maxUid++;
// REGISTRANDO LENGUAGE DE LAS CATEGORIAS
$sql = "insert into mdl_incoterm(
					inc_uid,
					inc_cli_uid,
					inc_sub_uid,
					inc_lugar_entrega,
					inc_tra_uid, 
					inc_inl_uid,
					inc_ajuste,  
					inc_delete
					)
				values
					(
						'".$maxUid."', 
						'".$cli_uid."',
						'".$sub_uid."', 
						'".$inc_lugar_entrega."',
						'".$inc_tra_uid."', 
						'".$inc_inl_uid."',
						'".$inc_ajuste."', 
						0
					)";
$db->query($sql);	
// CONSTRUIMOS EL NUEVO SELECT	
$token=admin::getParam("token");
unset($_POST);
header('Location: ../../divisasEdit.php?token='.$token.'&pro_uid='.$pro_uid.'&sub_uid='.$sub_uid);
?>