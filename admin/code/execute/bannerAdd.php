<?
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/thumb.php");
admin::initialize('banners','bannerList',false);
$mythumb = new thumb(); 
$validPic=false;
// SUBIENDO LA IMAGEN DE TEMP
$FILEST = $_FILES['ban_adjunt'];
if ($FILEST["name"] != '')
{
	// DATOS DE ARCHIVO EN SU FORMATO ORIGINAL
	$extensionFilet = admin::getExtension($FILEST["name"]);
	$fileNamet = "temp.".strtolower($extensionFilet);
	$image1t = PATH_ROOT.'/img/banner/'.$fileNamet;
	
	classfile::uploadFile($FILEST,$image1t);
	list($widtht, $heightt) = getimagesize($image1t);
	if($widtht<='770' && $heightt<='100') $validPic=true;
	else $validPic=false;
}	

if($validPic){
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
}

$sql = "insert into mdl_banners(
								ban_title, 
								ban_url,
								ban_content,
								ban_file
								)
						values (							
							'".admin::toSql($_POST["ban_title"],"String")."',
							'',  
							'".$randomString."',
							''
							)";
$db->query($sql);


$sql="SELECT ban_uid from mdl_banners where ban_title='".$_POST["ban_title"]."' and ban_content='".$randomString."';";
$db2->query($sql);
$content = $db2->next_record();
$ban_uid = $content["ban_uid"];

// SUBIENDO LA IMAGEN DE PUBLICACIONES
$FILES = $_FILES ['ban_adjunt'];
if ($FILES["name"] != '')
{
	// DATOS DE ARCHIVO EN SU FORMATO ORIGINAL
	$extensionFile = admin::getExtension($FILES["name"]);
	$fileName = admin::imageName(admin::toSql($_POST["ban_title"],"String"))."_".$ban_uid.".".$extensionFile;	
	$sql = "UPDATE mdl_banners SET ban_file='".$fileName."' WHERE ban_uid=".$ban_uid;
	$db->query($sql);
	

	// Subimos el archivo con el nombre original
	redimImgWidth($image1t, PATH_ROOT."/img/banner/".$fileName,770,100);
	redimImgWidth($image1t, PATH_ROOT."/img/banner/thumb_".$fileName,60,100);
	unlink($image1t);
	$sql = "UPDATE mdl_banners SET ban_content='".$fileName."' WHERE ban_uid=".$ban_uid;
	$db->query($sql);
	
	$gifCode='<img src="'.$domain.'/img/banner/'.$fileName.'" alt="'.admin::toSql($_POST["ban_title"],"String").'" title="'.admin::toSql($_POST["ban_title"],"String").'" />';
	
	$sql = "UPDATE mdl_banners SET ban_content='".$gifCode."' WHERE ban_uid=".$ban_uid;
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
									'1',
									'".$ban_uid."',
									2,  
									'".$mbc_position."',
									0,
									'".admin::toSql($_POST["ban_status"],"String")."' 
									)";
		$db2->query($sql);
unset($_POST);	
header('Location: ../../bannerList.php?token='.admin::getParam("token"));
}
else
{
	header('Location: ../../bannerNew.php?token='.admin::getParam("token").'&error=ok');
}

?>