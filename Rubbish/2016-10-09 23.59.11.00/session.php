<?php
include_once("../admin/core/admin.php");
$usernameClient = $_REQUEST["usernameClient"];
$passwordClient = $_REQUEST["passwordClient"];
$uidClient = admin::getDBValue("SELECT cli_uid FROM mdl_client WHERE (cli_email='".admin::toSql($usernameClient,"Text")."' or cli_user='".admin::toSql($usernameClient,"Text")."') and cli_pass='".SymmetricCrypt::encrypt(admin::toSql($passwordClient,"Text"))."' and cli_delete=0 and cli_status='ACTIVE'");
if (strlen($uidClient)>0)
{
	$tiempoActual = time();

	$tiempoNuevo = $tiempoActual + (60*$tiempoMax);
	//echo $tiempoNuevo. "." .$tiempoActual ;die;
/*	$controlaSesion =  admin::getDBValue("select count(*) from sys_session where (ses_user_uid=" .admin::toSql($uidClient,"Integer"). ") and ses_lastactivity>$tiempoActual and ses_registered='V'");
	if($controlaSesion==0) { header("Location:".$domain."/logout.php?uidClient=$uidClient");}*/
	
	$iValidaSesion = admin::getDBValue("SELECT count(*) FROM sys_session WHERE (ses_user_uid=" .admin::toSql($uidClient,"Integer"). " or ses_ipaddress='".admin::toSql($_SERVER['REMOTE_ADDR'],"Text")."') and ses_registered='V'");
	if($iValidaSesion==0)
	{
		admin::setSession("uidClient",$uidClient);
		admin::setSession("userAgent", $_SERVER['HTTP_USER_AGENT']);
		admin::setSession("SKey", uniqid(mt_rand(), true));
		admin::setSession("IPaddress", $_SERVER['REMOTE_ADDR']);
		admin::setSession("LastActivity", $tiempoNuevo);
		$sSQL = "INSERT INTO sys_session VALUES(null, $uidClient,'" .admin::getSession("userAgent"). "', '" .admin::getSession("SKey"). "', '" .admin::getSession("IPaddress"). "', '" .admin::getSession("LastActivity"). "', 'V')"; 
		//echo $sSQL;die;
        $db->query($sSQL);
		if(admin::getSession("uidClient")) {
			header("Location:". $domain."/");
			}
		else header("Location:".$domain."/session/1/"); 
	}
	else
	{

		header("Location:".$domain."/session/2/");	
	}
}else
{ 
	header("Location:".$domain."/session/1/");
}
?>