<?php 
//include_once("../../database/connection.php");  
include_once("../../core/admin.php");
$form = $_POST;
unset($_POST);

$usuario    = strtolower( trim(safeHtml(trim($form['usuario'])) ) );
$contrasena = trim( safeHtml($form['contrasena']) );
if ($usuario=="" || $contrasena==""){
	header('Location: ../../index.php');	
	die;
	}
$sql = "SELECT * FROM sys_users " .
        "		WHERE usr_login='".admin::toSql($usuario,'text')."' and ".
        " usr_pass ='".md5($contrasena)."' ";
        
			  //usr_pass=LOWER(CONVERT(VARCHAR(32),HashBytes('MD5','".admin::toSql($contrasena,'text')."'),2))";

$numfiles = $db->numrows($sql); 
$db->query($sql);

//echo " numfiles ". $numfiles ." ". $sql;die;

if($numfiles==0) {	
	$message = safeHtml($_REQUEST["message"]) + 1;
	header('Location: ../../index.php?message='.$message);
	}
else
	{
	$Datos = $db->next_record();
		// GENERANDO LAS VARIABLES DE SESSION
		//$_SESSION['USER_LOGGED'] = $uid;
		$rol=admin::getDBvalue("SELECT rus_rol_uid FROM mdl_roles_users where rus_usr_uid=".$Datos["usr_uid"]);
		session_set_cookie_params(100*100);
		@session_start();
		$_SESSION["authenticated"]=true; // identificador si se encuentra logueado
		$_SESSION["usr_uid"]=$Datos["usr_uid"];
		$_SESSION["usr_rol"]=$rol;	
		$_SESSION["usr_photo"] = $Datos["usr_photo"];
		$_SESSION["usr_firstname"] = $Datos["usr_firstname"];
		$_SESSION["usr_lastname"] = $Datos["usr_lastname"];

		/*
		Estados de token
		0 = activo
		1 = salio correctamente
		2 = banneado al conectarse desde otra sesion
		*/
//var_dump(MULTIPLE_INSTANCES);
		if(!(MULTIPLE_INSTANCES===true)){
			$sql = "update sys_users_verify set suv_status=2 where suv_cli_uid='" . $Datos["usr_uid"] . "' and suv_status=0";
			//die($sql);
			$db->query($sql); 
		}
					
		$token = sha1(PREFIX.uniqid( rand(), TRUE ));		
		$sSQL  = "insert into sys_users_verify (suv_cli_uid,suv_token,suv_date,suv_ip,suv_status) values (". $Datos["usr_uid"].",'".$token."',GETDATE(),'". $_SERVER['REMOTE_ADDR'] ."',0)";
		//die($sSQL);
		$db->query($sSQL);  
		$rolDesc=admin::getDBvalue("SELECT rol_description FROM mdl_roles where rol_uid=".$rol);

		$modAccess = admin::getDBvalue("select top 1 a.mus_mod_uid from sys_modules_users a, sys_modules b where a.mus_rol_uid=".$rol." and a.mus_mod_uid=b.mod_uid and b.mod_status='ACTIVE' and b.mod_parent=0 order by b.mod_position");
                if($rolDesc=='ROOT')
			$urlSite = admin::getDBValue("select mod_index from sys_modules where mod_uid=1 and mod_status='ACTIVE'");
		else
			$urlSite = admin::getDBValue("select mod_index from sys_modules where mod_uid=". $modAccess ." and mod_status='ACTIVE'");
		
		$_POST = NULL;
		//echo "ROl:".$rolDesc."-". $modAccess."-".$urlSite;die;
		header('Location: ../../'.$urlSite.'?token='.$token);
	}	
?>