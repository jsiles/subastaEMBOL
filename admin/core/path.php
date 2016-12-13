<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
session_start();
$langDefault='es';
//for localhost
/*$basedatos = "subasta";
$host = "localhost";
$user = "root";
$pass = "";*/

//SQL SERVER
$basedatos = "subasta";
//$host = "DESKTOP-FG08IPJ\SQLEXPRESS2014";
$host = "007-LAPTOP\SQLEXP2014"; 
//$host = "JORGES\JORGES_SQL";
//$host = "DESKTOP-ADCBS9A\SQLEXPRESS";
//$user = "userSubasta";
//$pass = "Abc-12345678";
$user = "sa";
$pass = "simple";

$tiempoMax=15;

define("DATABASE",	$basedatos);
define("DBHOST",	$host);
define("DBUSER",	$user);
define("DBPASSWORD",$pass);
/*
//for server
$basedatos = "subasta";
$host = "localhost";
$user = "root";
$pass = "";

define("DATABASE",	"subasta");
define("DBHOST",	"localhost");
define("DBUSER",	"root");
define("DBPASSWORD","");
*/


//for localhost

	//$xpath = "/subasta";
	$xpath = "/subasta/subastaEMBOL";
	$urlLanguage=1;
	$urlPositionTitle	=	1;
	$urlPositionSubtitle=	2;
	$urlPositionSubtitle2=	3;
	$urlPositionSubtitle3=	4;

// for sever
/*
	$xpath = "";
	$urlLanguage=1;
	$urlPositionTitle	=	0;
	$urlPositionSubtitle=	1;
	$urlPositionSubtitle2=	2;
	$urlPositionSubtitle3=	3;
*/
 
$domain = "http://" . $_SERVER['HTTP_HOST'].$xpath;
$rootsystem = $_SERVER['DOCUMENT_ROOT'] . $xpath;

define("PATH_DOMAIN",	$domain);
define("PATH_ROOT"	,	$rootsystem);					// PAGINA PRINCIPAL DEL SITIO
define("PATH_ADMIN",	PATH_ROOT . "/admin"); 		// RUTA DEL ADMINISTRADOR
define("PATH_UPLOAD", 	PATH_ADMIN . "/upload"); 		// DONDE SE SUBEN ARCHIVOS
define("PATH_GALLERY", 	PATH_UPLOAD . "/gallery");		// GALERIA DE IMAGENES
define("PATH_BLOGS", 	PATH_UPLOAD . "/blogs"); 		// DONDE SE SUBEN LAS IMAGENES DE LOS BLOGS
define("PATH_BULLETIN", PATH_UPLOAD . "/bulletin"); 	// CONTENIDO DE BOLETINES FOTOS Y WEBS
define("PATH_EVENT", 	PATH_UPLOAD . "/events");		// GALERIA DE IMAGENES

define("PATH_LOG"	, 	PATH_ADMIN . "/logfile");		// ARCHIVO DE ERRORES
define("DEBUG"		,	true);
define("SAVELOG"	,	false);

define("MULTIPLE_INSTANCES"	,	false);


define("PATH_TEMPLATE",	PATH_ROOT."/tpl/");

define("TIME_ACTIVITY", 120);

//include_once(PATH_ROOT."/classes/krumo/class.krumo.php");

function __autoload($class_name) {
    require_once PATH_ROOT."/classes/class.".$class_name . '.inc.php';
   /* if(!file_exists(PATH_ROOT."/classes/class.".$class_name . '.inc.php'))
    	{ echo "RUTA SERVER CARGADO:".PATH_ROOT."/classes/class.".$class_name . '.inc.php';}
    else {echo  "Archivo Cargado:".PATH_ROOT."/classes/class.".$class_name . '.inc.php';}*/
}
$db =new DBmysql;
$db2=new DBmysql;
$db3=new DBmysql;
$db4=new DBmysql;
$pagDb=new DBmysql;
$msg="";

//db->query("select count(*) from sys_users");
//echo admin::getDBValue("select count(*) from sys_users");die;
?>
