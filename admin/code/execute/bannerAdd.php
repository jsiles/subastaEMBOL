<?
include_once("../../database/connection.php");  
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/thumb.php");
admin::initialize('banner','bannerList',false);
$mythumb = new thumb(); 
$ban_fecha0 = admin::changeFormatDate($_POST["ban_fecha0"],1);
$ban_fecha1 = admin::changeFormatDate($_POST["ban_fecha1"],1);

$newPos=2;
$sSQL="SELECT mbc_uid FROM mdl_banners_contents, mdl_banners WHERE ban_uid = mbc_ban_uid
AND mbc_delete=0 AND mbc_status='ACTIVE' and ban_date_start<='".date('Y-m-d')."' and ban_date_end>='".date('Y-m-d')."' order by  mbc_position asc";		
$db->query($sSQL);
while ($listContent=$db->next_record()){
	$sql2 = "UPDATE mdl_banners_contents SET mbc_position='".$newPos."' WHERE mbc_uid=".$listContent["mbc_uid"];
	$db2->query($sql2);
	$newPos++;
}	

$sql = "insert into mdl_banners(
								ban_title, 
								ban_url,
								ban_content,
								ban_target,
								ban_date_start,
								ban_date_end
								)
						values (							
							'".admin::toSql($_POST["ban_title"],"String")."',
							'".admin::toSql($_POST["ban_url"],"String")."',  
							'".admin::toSql($_POST["ban_content"],"String")."',
							'".admin::toSql($_POST["ban_target"],"String")."',
							'".$ban_fecha0."',
							'".$ban_fecha1."'
							)";
$db->query($sql);


$sql="SELECT LAST_INSERT_ID() as UID;";
$db2->query($sql);
$content = $db2->next_record();
$ban_uid = $content["UID"];

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
    <embed src="http://www.santillana.com.bo/img/banner/'.$fileName.'" width="695" height="210" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
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
	foreach ($campos2 as $value2)
	{
	
	$mbc_uid=admin::getDBvalue("select max(mbc_uid) from mdl_banners_contents");
	$mbc_uid++;
	
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
								'1',
								0,
								'".admin::toSql($_POST["ban_status"],"String")."' 
								)";
	$db->query($sql);
	}	
}

if ($_POST["ban_place"]==2)
{
	$sSQL="select * from mdl_contents left join mdl_contents_languages on (con_uid=col_con_uid) 
		where col_language='".$lang."' and con_parent=0 and con_delete<>1 order by con_position asc";		
	$db->query($sSQL);
	while ($listContent=$db->next_record()){

	   $con_uid = $listContent["con_uid"];

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

unset($_POST);	
header('Location: ../../bannerList.php?token='.admin::getParam("token"));
?>