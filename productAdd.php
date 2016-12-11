<?php
include_once("../../database/connection.php");  
include_once("../../core/admin.php");
admin::initialize('subastas','docsCatAdd2',false); 
$sub_uid=admin::getParam("sub_uid");
$fldpro_product=admin::getParam("pro_product");
$fldpro_description=admin::getParam("pro_description");
$fldpro_image=admin::getParam("pro_image");
$fldpro_precio=admin::getParam("pro_precio");
$fldpro_cli_id=admin::getParam("pro_cli_id");
// REGISTRANDO LENGUAGE DE LAS CATEGORIAS
print_r($fldpro_cli_id);

$fldxitem = admin::getDbValue("select max(xit_uid) from mdl_xitem");
if(!$fldxitem) $fldxitem=1;
else $fldxitem++;

$sql = "insert into mdl_xitem(
					xit_uid,
					xit_sub_uid,
					xit_product,
					xit_description, 
					xit_image,
					xit_precio,  
					xit_delete
					)
				values
					(
						".$fldxitem.", 
						".$sub_uid.", 
						'".$fldpro_product."',
						'".$fldpro_description."', 
						'".$fldpro_image."',
						".$fldpro_precio.", 
						0
					)";
echo $sql;
foreach($fldpro_cli_id as $fldvalue)
{
$sql = "insert into mdl_clixitem(
					clx_uid,
					clx_cli_uid,
					clx_xit_uid,
					clx_delete
					)
				values
					(
						null, 
						".$fldvalue.",
						".$fldxitem.", 
						0
					)";

echo $sql;
}
exit;
/*$db->query($sql);	
// CONSTRUIMOS EL NUEVO SELECT	
$token=admin::getParam("token");
unset($_POST);*/
header('Location: ../../subastasEdit2.php?token='.$token.'&pro_uid='.$sub_uid);
?>