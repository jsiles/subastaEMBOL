<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
admin::initialize('users','createRoles',false);
 
$rol_uid =admin::toSql(admin::getParam("rol_uid"),"Number");
$rol_name = admin::toSql(safeHtml(admin::getParam("rol_name")),"String");
/*foreach ($_POST["mod_uid"] as $key => $value) {
	if(is_array($value))
		print($key);
	else
		print($value);
	print('<br>');
	}*/
//***********************************************update del nombre de rol***************************************************
$sqldat = "update mdl_roles set rol_description='".$rol_name."' where rol_uid= ".$rol_uid;
$db->query($sqldat);
//********************************************update de los permisos del rol************************************************
//******Modulos-------------------------------------------------------------------------------------------------------------
/*$sqldat = "update sys_modules_users set mus_delete=1 where mus_rol_uid=".$rol_uid." and mus_mod_uid  and mus_place='MODULE'";// not in(1,10,11) ,31,32,33,34,35,36
$db->query($sqldat);

$sqldat = "update sys_modules_fields set mof_delete=1 where mof_rol_uid=".$rol_uid;
$db->query($sqldat);*/
admin::getDBvalue("delete from sys_modules_users where mus_rol_uid=".$rol_uid." and mus_place='MODULE'");

if (is_array($_POST["mod_uid"])){
	$campos = $_POST["mod_uid"];
	foreach ($campos as $key => $value){
		$moduleId = is_array($value) ? $key : $value;
		
		$countMod=admin::getDBvalue("select count(mus_uid) from sys_modules_users where mus_rol_uid=".$rol_uid." and mus_mod_uid = ".$moduleId." and mus_place='MODULE'");
		if ($countMod>0){	
			$sqldat = "update sys_modules_users set mus_delete=0 where mus_rol_uid=".$rol_uid." and mus_mod_uid =".$moduleId." and mus_place='MODULE'";
			//echo "1:".$sqldat."<br>";
			$db->query($sqldat);
		}
		else{
			$sql = "insert into sys_modules_users (mus_rol_uid,mus_mod_uid,mus_place,mus_delete) values (".$rol_uid.", ".$moduleId.", 'MODULE', 0)";
			//echo "1:". $sql."<br>";
			$db->query($sql);
		}
		if(is_array($value)){
			foreach ($value as  $nivel2){
				if(is_array($nivel2)){ 
					/* Interiores de los modulos -------------------------------------------------------------------------------------------------- */
						if(is_array($nivel2)){
							foreach ($nivel2 as  $interior){
								$countMod=admin::getDBvalue("select count(mof_uid) from sys_modules_fields where mof_mod_uid=".$moduleId." and mof_rol_uid=".$rol_uid." and mof_mfl_uid=".$interior);
								if ($countMod>0){	
									$sqldat = "update sys_modules_fields set mof_delete=0 where mof_mod_uid='".$moduleId."' and mof_rol_uid=".$rol_uid." and mof_mfl_uid='".$interior."'";
								    //echo "2:".$sqldat."<br>";
									$db->query($sqldat);
								}
								else{
									$sql = "insert into sys_modules_fields (mof_delete,mof_mod_uid,mof_rol_uid,mof_mfl_uid) values (0, '".$moduleId."', ".$rol_uid.", ".$interior."')";
									//echo "2:".$sql."<br>";
									$db->query($sql);
								}
						
							}
						}
					/* Fin INteriores-------------------------------------------------------------------------------------------------------------------------*/
				}
				else{
					$countMod=admin::getDBvalue("select count(mus_uid) from sys_modules_users where mus_rol_uid=".$rol_uid." and mus_mod_uid = ".$nivel2." and mus_place='MODULE'");
					if ($countMod>0){	
						$sqldat = "update sys_modules_users set mus_delete=0 where mus_rol_uid=".$rol_uid." and mus_mod_uid =".$nivel2." and mus_place='MODULE'";
						//echo "3:".$sqldat."<br>";
						$db->query($sqldat);
					}
					else{
						$sql = "insert into sys_modules_users (mus_rol_uid,mus_mod_uid,mus_place,mus_delete) values (".$rol_uid.", ".$nivel2.", 'MODULE', 0)";
						//echo "3:".$sql."<br>";
						$db->query($sql);
					}			
				}
			}
		}
		
	}	
}

//******Contenidos-------------------------------------------------------------------------------------------------------------
/*$sqldat = "update sys_modules_users set mus_delete=1 where mus_rol_uid=".$rol_uid." and mus_mod_uid not in('1') and mus_place='CONTENT'";
$db->query($sqldat);

$campos = $_POST["con_uid"];
if (is_array($_POST["con_uid"])){
	foreach ($campos as $key => $value){
			if(is_array($value)){ 
				$countMod=admin::getDBvalue("select count(mus_uid) from sys_modules_users where mus_rol_uid=".$rol_uid." and mus_mod_uid=".$key." and mus_place='CONTENT'");
				if ($countMod){	
					$sqldat = "update sys_modules_users set mus_delete=0 where mus_rol_uid=".$rol_uid." and mus_mod_uid=".$key." and mus_place='CONTENT'";
					$db->query($sqldat);
				}
				else{
					$sql = "insert into sys_modules_users set mus_rol_uid=".$rol_uid.", mus_mod_uid=".$key.", mus_place='CONTENT', mus_delete=0";
					$db->query($sql);
				}
					foreach ($value as  $nivel2){		
						if(!is_array($nivel2)){//nivel 2 similar nivel 1
							$countMod=admin::getDBvalue("select count(mus_uid) from sys_modules_users where mus_rol_uid=".$rol_uid." and mus_mod_uid=".$nivel2." and mus_place='CONTENT'");
							if ($countMod){	
								$sqldat = "update sys_modules_users set mus_delete=0 where mus_rol_uid=".$rol_uid." and mus_mod_uid=".$nivel2." and mus_place='CONTENT'";
								$db->query($sqldat);
							}
							else{
								$sql = "insert into sys_modules_users set mus_rol_uid=".$rol_uid.", mus_mod_uid=".$nivel2.", mus_place='CONTENT', mus_delete=0";
								$db->query($sql);
							}
						}
					}
			}
			else{
				$countMod=admin::getDBvalue("select count(mus_uid) from sys_modules_users where mus_rol_uid=".$rol_uid." and mus_mod_uid=".$value." and mus_place='CONTENT'");
				
				if ($countMod){	
					$sqldat = "update sys_modules_users set mus_delete=0 where mus_rol_uid=".$rol_uid." and mus_mod_uid=".$value." and mus_place='CONTENT'";
					$db->query($sqldat);
				}
				else{
					$sql = "insert into sys_modules_users set mus_rol_uid=".$rol_uid.", mus_mod_uid=".$value.", mus_place='CONTENT', mus_delete=0";
					$db->query($sql);
				}
			}
	}	
}
*/
//******Opciones-------------------------------------------------------------------------------------------------------------
/*
$ver26 = admin::toSql(safeHtml(admin::getParam("ver26")),"String");
if ($ver26=='on') $ver26='ACTIVE';
else $ver26='INACTIVE';
$ver44 = admin::toSql(safeHtml(admin::getParam("ver44")),"String");
if ($ver44=='on') $ver44='ACTIVE';
else $ver44='INACTIVE';
$ver57 = admin::toSql(safeHtml(admin::getParam("ver57")),"String");
if ($ver57=='on') $ver57='ACTIVE';
else $ver57='INACTIVE';
$ver61 = admin::toSql(safeHtml(admin::getParam("ver61")),"String");
if ($ver61=='on') $ver61='ACTIVE';
else $ver61='INACTIVE';

$editar26 = admin::toSql(safeHtml(admin::getParam("editar26")),"String");
if ($editar26=='on') $editar26='ACTIVE';
else $editar26='INACTIVE';
$editar44 = admin::toSql(safeHtml(admin::getParam("editar44")),"String");
if ($editar44=='on') $editar44='ACTIVE';
else $editar44='INACTIVE';
$editar57 = admin::toSql(safeHtml(admin::getParam("editar57")),"String");
if ($editar57=='on') $editar57='ACTIVE';
else $editar57='INACTIVE';
$editar61 = admin::toSql(safeHtml(admin::getParam("editar61")),"String");
if ($editar61=='on') $editar61='ACTIVE';
else $editar61='INACTIVE';

$eliminar26 = admin::toSql(safeHtml(admin::getParam("eliminar26")),"String");
if ($eliminar26=='on') $eliminar26='ACTIVE';
else $eliminar26='INACTIVE';
$eliminar44 = admin::toSql(safeHtml(admin::getParam("eliminar44")),"String");
if ($eliminar44=='on') $eliminar44='ACTIVE';
else $eliminar44='INACTIVE';
$eliminar57 = admin::toSql(safeHtml(admin::getParam("eliminar57")),"String");
if ($eliminar57=='on') $eliminar57='ACTIVE';
else $eliminar57='INACTIVE';
$eliminar61 = admin::toSql(safeHtml(admin::getParam("eliminar61")),"String");
if ($eliminar61=='on') $eliminar61='ACTIVE';
else $eliminar61='INACTIVE';

$estado26 = admin::toSql(safeHtml(admin::getParam("estado26")),"String");
if ($estado26=='on') $estado26='ACTIVE';
else $estado26='INACTIVE';
$estado44 = admin::toSql(safeHtml(admin::getParam("estado44")),"String");
if ($estado44=='on') $estado44='ACTIVE';
else $estado44='INACTIVE';
$estado57 = admin::toSql(safeHtml(admin::getParam("estado57")),"String");
if ($estado57=='on') $estado57='ACTIVE';
else $estado57='INACTIVE';
$estado61 = admin::toSql(safeHtml(admin::getParam("estado61")),"String");
if ($estado61=='on') $estado61='ACTIVE';
else $estado61='INACTIVE';

for($i=0; $i<4; $i++)
{
if ($i==0) {$valor=26; $verX=$ver26; $editarX=$editar26; $eliminarX=$eliminar26; $estadoX=$estado26;}
elseif ($i==1){$valor=44; $verX=$ver44; $editarX=$editar44; $eliminarX=$eliminar44; $estadoX=$estado44;}
elseif ($i==2){$valor=57; $verX=$ver57; $editarX=$editar57; $eliminarX=$eliminar57; $estadoX=$estado57;}
elseif ($i==3){$valor=61; $verX=$ver61; $editarX=$editar61; $eliminarX=$eliminar61; $estadoX=$estado61;}



$countOpt=admin::getDBvalue("select distinct count(mop_uid) from sys_modules_options where mop_mod_uid='".$valor."' and mop_rol_uid='".$rol_uid."' order by mop_uid");
if($countOpt>0){
	$sql = "update sys_modules_options set mop_status='".$verX."' where mop_rol_uid=".$rol_uid." and mop_mod_uid=".$valor." and mop_lab_category='Ver'";
	$db->query($sql);
	
	$sql = "update sys_modules_options set mop_status='".$editarX."' where mop_rol_uid=".$rol_uid." and mop_mod_uid=".$valor." and mop_lab_category='Editar'";
	$db->query($sql);
	
	$sql = "update sys_modules_options set mop_status='".$eliminarX."' where mop_rol_uid=".$rol_uid." and mop_mod_uid=".$valor." and mop_lab_category='Eliminar'";
	$db->query($sql);
	
	$sql = "update sys_modules_options set mop_status='".$estadoX."' where mop_rol_uid=".$rol_uid." and mop_mod_uid=".$valor." and mop_lab_category='Estado'";
	$db->query($sql);
	}
	else
	{
		$maxUid=admin::getDBvalue("select max(mop_uid) from sys_modules_options");
		$maxUid++;
		$sql = "insert into sys_modules_options set mop_uid='".$maxUid."', mop_mod_uid='".$valor."',mop_rol_uid='".$rol_uid."', mop_lab_category='Ver', mop_status='".$verX."'";
		
		$db->query($sql);
		
		$maxUid=admin::getDBvalue("select max(mop_uid) from sys_modules_options");
		$maxUid++;
		$sql = "insert into sys_modules_options set mop_uid='".$maxUid."', mop_mod_uid='".$valor."',mop_rol_uid='".$rol_uid."', mop_lab_category='Editar', mop_status='".$editarX."'";
		$db->query($sql);
		
		$maxUid=admin::getDBvalue("select max(mop_uid) from sys_modules_options");
		$maxUid++;
		$sql = "insert into sys_modules_options set mop_uid='".$maxUid."', mop_mod_uid='".$valor."',mop_rol_uid='".$rol_uid."', mop_lab_category='Eliminar', mop_status='".$eliminarX."'";
		$db->query($sql);
		
		$maxUid=admin::getDBvalue("select max(mop_uid) from sys_modules_options");
		$maxUid++;
		$sql = "insert into sys_modules_options set mop_uid='".$maxUid."', mop_mod_uid='".$valor."',mop_rol_uid='".$rol_uid."', mop_lab_category='Estado', mop_status='".$estadoX."'";
		$db->query($sql);
	}
}*/
//----------------------------------------------------------------------------------------------------------------------------



$token=admin::getParam("token");
unset($_POST);
header('Location: ../../rolesList.php?token='.$token);
?>