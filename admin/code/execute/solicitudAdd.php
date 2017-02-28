<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/thumb.php");
admin::initialize('solicitud','solicitudAdd'); 

$mythumb = new thumb(); 
$sql = "insert into mdl_subasta
					(
					sub_uid,
					sub_pca_uid,
					sub_usr_uid,
					sub_description,
					sub_type,
					sub_modalidad,
					sub_date,
					sub_hour,
					sub_wheels,
					sub_mount_base,
					sub_mountdead,
					sub_moneda,
					sub_moneda1,
					sub_mount_unidad,
					sub_hour_end,
					sub_tiempo,
					sub_status,
					sub_delete,
					sub_deadtime,
					sub_finish,
					sub_mode
					)
			values	(
					'".$sub_uid."', 
					'".$sub_pca_uid."', 
					".admin::getSession('usr_uid').", 
					'".$sub_description."', 
					'".$sub_type."',
					'".$sub_modalidad."',
					'".$sub_date."', 
					'".$sub_hour."',
					'".$sub_wheels."',
					'".$sub_mount_base."',
					'".$sub_mountdead."',
					'".$sub_moneda."',
					0,
					'".$sub_mount_unidad."',
					'".$sub_hour_end."',
					".$sub_tiempo.",
					'".$sub_status."',
					0,
					'".$dead_time."',
					0,
					'SUBASTA')";
	$db->query($sql);

        
$FILES2 = $_FILES ['pro_adjunt'];
if ($FILES2["name"] != '')
	{
	$ext = admin::getExtension($FILES2 ["name"]);
	$nomDOC = 'pro_'.$pro_uid.".".$ext;	
	classfile::uploadFile($FILES2,PATH_ROOT.'/docs/subasta/',$nomDOC);	
	$sql = "UPDATE mdl_product SET pro_document='".$nomDOC."' WHERE pro_uid='".$pro_uid."'";
	$db->query($sql);
	}
$token=admin::getParam("token");
unset($_POST);
header('Location: ../../subastasNew2.php?token='.$token."&pro_uid=".$pro_uid."&sub_uid=".$sub_uid);	
?>