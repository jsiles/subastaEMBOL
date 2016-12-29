<?
include_once("../../database/connection.php");  
include_once("../../core/admin.php");
admin::initialize('banner','bannerList',false);
// Cambiamos el estado del contenido de activo a inactivo
$uid = $_POST["uid"];
$status = $_POST["status"];
if ($status=='ACTIVE')
	{
	$newStatus = 'INACTIVE';
	$labels_content='status_off';
	$imgStatus = "lib/inactive_".$lang.".gif";
	$sql="update mdl_banners_contents set mbc_status='INACTIVE' where mbc_uid=".$uid;
	}
else
	{
	$newStatus = 'ACTIVE';
	$labels_content='status_on';
	$imgStatus = "lib/active_".$lang.".gif";
	$sql="update mdl_banners_contents set mbc_status='ACTIVE' where mbc_uid=".$uid;
	}
$db->query($sql);
?>
<a href="javaScript:void(0);" onclick="bannerCS('<?=$uid?>','<?=$newStatus?>');">
<img src="<?=$imgStatus?>"  title="<?=admin::labels($labels_content)?>" alt="<?=admin::labels($labels_content)?>" border="0"/>
</a>