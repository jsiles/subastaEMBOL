<?php
include_once("../../core/simple99.php");
SIMPLE99::initialize('users','createRoles',false);

$uid = $_POST["uid"];
$status = $_POST["status"];
if ($status=='ACTIVE')
	{
	$newStatus = 'INACTIVE';
	$imgStatus = "lib/inactive_" . $lang . ".gif";
	}
else
	{
	$newStatus = 'ACTIVE';
	$imgStatus = "lib/active_" . $lang . ".gif";	
	}
$sql="update mdl_roles set rol_status='" . $newStatus . "' where rol_uid=" . $uid;
$db->query($sql);
?>
<a href="javascript:userCS('<?=$uid?>','<?=$newStatus?>');">
<img border="0" src="<?=$imgStatus?>" title="<?=SIMPLE99::labels('status_on')?>" alt="<?=SIMPLE99::labels('status_on')?>">
</a>