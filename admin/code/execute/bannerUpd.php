<?
include_once("../../database/connection.php");  
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/thumb.php");
admin::initialize('banner','bannerList',false);
$mythumb = new thumb();
$ban_uid=admin::toSql($_POST["uid"],"Number");
$ban_fecha0 = admin::changeFormatDate($_POST["ban_fecha0"],1);
$ban_fecha1 = admin::changeFormatDate($_POST["ban_fecha1"],1);
$sql = "update mdl_banners set ban_title='".admin::toSql($_POST["ban_title"],"String")."',  ban_url='".admin::toSql($_POST["ban_url"],"String")."',  ban_target='".admin::toSql($_POST["ban_target"],"String")."', ban_date_start='".$ban_fecha0."', ban_date_end='".$ban_fecha1."' where ban_uid=".$ban_uid;
$db->query($sql);

// SUBIENDO LA IMAGEN DE PUBLICACIONES
$FILES = $_FILES ['ban_adjunt'];
if ($FILES["name"] != '')
{
	// DATOS DE ARCHIVO EN SU FORMATO ORIGINAL
	$extensionFile = admin::getExtension($FILES["name"]);
	$fileName = admin::imageName(admin::toSql($_POST["ban_title"],"String"))."_".$ban_uid.".".$extensionFile;	
	$sql = "UPDATE mdl_banners SET ban_file='".$fileName."' WHERE ban_uid=".$ban_uid;
	$db->query($sql);
	
	if ($extensionFile=='swf')
	{
	// Subimos el archivo con el nombre original
	classfile::uploadFile($FILES,PATH_ROOT.'/img/banner/',$fileName);
	
	$swfCode='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="695" height="210" title="'.admin::toSql($_POST["ban_title"],"String").'">
    <param name="movie" value="'.$domain.'/img/banner/'.$fileName.'" />
    <param name="quality" value="high" />
    <param name="wmode" value="transparent" />
    <embed src="http://www.Santillana.com.bo/img/banner/'.$fileName.'" width="695" height="210" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
</object>';
	
	$sql = "UPDATE mdl_banners SET ban_content='".$swfCode."' WHERE ban_uid=".$ban_uid;
	$db->query($sql);
	
	}
	else
	{
	// Subimos el archivo con el nombre original
	classfile::uploadFile($FILES,PATH_ROOT.'/img/banner/',$fileName);
	redimImgWidth(PATH_ROOT."/img/banner/".$fileName, PATH_ROOT."/img/banner/thumb_".$fileName,60,100);
	$sql = "UPDATE mdl_banners SET ban_content='".$fileName."' WHERE ban_uid=".$ban_uid;
	$db->query($sql);
	
	$gifCode='<img src="http://www.Santillana.com.bo/img/banner/'.$fileName.'" alt="'.admin::toSql($_POST["ban_title"],"String").'" title="'.admin::toSql($_POST["ban_title"],"String").'" />';
	
	$sql = "UPDATE mdl_banners SET ban_content='".$gifCode."' WHERE ban_uid=".$ban_uid;
	$db->query($sql);
	
	}
}

$campos2 = $_POST["con_uid"];
if (is_array($_POST["con_uid"]))
{
	$sql = "update mdl_banners_contents set mbc_delete=1 where mbc_ban_uid=".$ban_uid;
	$db->query($sql);
	foreach ($campos2 as $value2)
	{
	$exist=admin::getDBvalue("select mbc_uid from mdl_banners_contents where mbc_ban_uid=".$ban_uid." and mbc_con_uid=".$value2);
		if($exist)
		{
		$sql = "update mdl_banners_contents set mbc_place='".$_POST["ban_place"]."', mbc_delete=0, mbc_status='".admin::toSql($_POST["ban_status"],"String")."' where mbc_ban_uid=".$ban_uid." and mbc_con_uid=".$value2;
		$db->query($sql);
		}
		else
		{
		$mbc_uid=admin::getDBvalue("select max(mbc_uid) from mdl_banners_contents");
		$mbc_uid++;
		
		$mbc_position=admin::getDBvalue("select max(mbc_position) from mdl_banners_contents where mbc_con_uid=".$value2);
		$mbc_position++;
		
		$sql = "insert into mdl_banners_contents(
										mbc_uid, 
										mbc_con_uid, 
										mbc_ban_uid,
										mbc_place, 
										mbc_position, 
										mbc_delete,
										mbc_status
										)
								values (							
									'".$mbc_uid."', 
									'".$value2."',
									'".$ban_uid."',
									'".$_POST["ban_place"]."',  
									'".$mbc_position."',
									0,
									'".admin::toSql($_POST["ban_status"],"String")."' 
									)";
		$db->query($sql);
		}
	}	
}

if ($_POST["ban_place"]==2)
{
	
	
	$sSQL="select * from mdl_contents left join mdl_contents_languages on (con_uid=col_con_uid) 
		where col_language='".$lang."' and con_parent=0 and con_delete<>1 order by con_position asc";		
	$db->query($sSQL);
	while ($listContent=$db->next_record()){

	   	$con_uid = $listContent["con_uid"];
		$existsBann=admin::getDBvalue("select mbc_con_uid FROM mdl_banners_contents where mbc_place=2 and mbc_con_uid='".$con_uid."'");
		//echo "select mbc_con_uid FROM mdl_banners_contents where mbc_place=2 and mbc_con_uid='".$con_uid."'<br />";
		if($existsBann)
		{
			$sql = "DELETE FROM mdl_banners_contents where mbc_place=2 and mbc_con_uid='".$con_uid."'";
			$db->query($sql);
		}
		$mbc_uid=admin::getDBvalue("select max(mbc_uid) from mdl_banners_contents");
		$mbc_uid++;
		
		$mbc_position=admin::getDBvalue("select max(mbc_position) from mdl_banners_contents where mbc_place=2 and mbc_con_uid=".$con_uid);
		$mbc_position++;
		
		$sql = "insert into mdl_banners_contents(
										mbc_uid, 
										mbc_con_uid, 
										mbc_ban_uid,
										mbc_place, 
										mbc_position, 
										mbc_delete,
										mbc_status
										)
								values (							
									'".$mbc_uid."', 
									'".$con_uid."',
									'".$ban_uid."',
									2,  
									'".$mbc_position."',
									0,
									'".admin::toSql($_POST["ban_status"],"String")."' 
									)";
		$db2->query($sql);
	}
}

	
header('Location: ../../bannerList.php?token='.admin::getParam("token"));
?>