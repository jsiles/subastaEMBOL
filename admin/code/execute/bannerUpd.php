<? 
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/thumb.php");
admin::initialize('banner','bannerList',false);
$mythumb = new thumb();
$ban_uid=admin::toSql($_POST["uid"],"Number");
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
	//unlink($image1t);
}	

if($validPic){


$sql = "update mdl_banners set ban_title='".admin::toSql($_POST["ban_title"],"String")."' where ban_uid=".$ban_uid;
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

$sql = "update mdl_banners_contents set mbc_status='".admin::toSql($_POST["ban_status"],"String")."' where mbc_ban_uid=".$ban_uid;
		$db->query($sql);

header('Location: ../../bannerList.php?token='.admin::getParam("token"));
}
else
{
	header('Location: ../../bannerEdit.php?token='.admin::getParam("token").'&ban_uid='.$ban_uid.'&error=ok');
}
?>