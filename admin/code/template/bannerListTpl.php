<?php
/********BeginResetColorDelete*************/
$arrayscript = "<script>
var items =new Array();
";
/********EndResetColorDelete*************/
$sSQL="select * 
		from mdl_banners 
		where ban_delete<>1  
		order by ban_position ,ban_uid";
//	krumo($sSQL);	
$db->query($sSQL);
$nroReg = $db->numrows();
if ($nroReg>0)
	{
	?>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td width="77%" height="40"><span class="title"><?=admin::labels('banner','list')?></span></td>
    <td width="23%" height="40">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" id="contentListing">
<div class="itemList" id="itemList" style="width:99%"> 
<?php
$i=1;
$j=0;
while ($banner_list = $db->next_record())
	{
	$ban_uid = $banner_list["ban_uid"];
	$ban_position = $banner_list["ban_position"];
	if($ban_position=="MAIN")
		$ban_pos = " (" . admin::labels('banner','main') . ")";
	else
		$ban_pos = " (" . $ban_position . ")";
		/*
	switch ($ban_position)
		{
		case "MAIN": $ban_pos = " (" . admin::labels('banner','main') . ")"; break;
		case "LEFT": $ban_pos = " (" . admin::labels('banner','left') . ")"; break;
		case "RIGHT": $ban_pos = " (" . admin::labels('banner','right') . ")"; break;
		case "FOOTER": $ban_pos = " (" . admin::labels('banner','footer') . ")"; break;
		case "CONTENT": $ban_pos = " (" . admin::labels('banner','content') . ")"; break;
		}
		*/
	$ban_title = $banner_list["ban_title"];
	$ban_status = $banner_list["ban_status"];
	if ($ban_status=='ACTIVE') $labels_content='status_on';
	else $labels_content='status_off';
	if ($i%2==0) $class='row';
	else  $class='row0';
	/********BeginResetColorDelete*************/  
	$arrayscript .= "items[$j]=" . $ban_uid . ";";
	/********EndResetColorDelete*************/  
  	?> 
      <div class="groupItem" id="<?=$ban_uid?>">
            <div id="list_<?=$ban_uid?>" class="<?=$class?>" style="width:100%">
<table class="list" width="100%">
	<tr><td width="50%"><?=$ban_title?> <?=$ban_pos?></td>
	<td align="center" width="12%" height="5">
		   <a href="bannerView.php?ban_uid=<?=$ban_uid?>">
		<img src="<?=admin::labels('view','linkImage')?>" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
		</a>
	</td>
	<td align="center" width="12%" height="5">
		<a href="bannerEdit.php?ban_uid=<?=$ban_uid?>">
		<img src="<?=admin::labels('edit','linkImage')?>" border="0" title="<?=admin::labels('edit')?>" alt="<?=admin::labels('edit')?>">
		</a>
	</td>
	<td align="center" width="12%" height="5">	
		 <!--********BeginResetColorDelete*************-->
		<a href="removeList" onclick="removeList(<?=$ban_uid?>);return false;">
		<!--********EndResetColorDelete*************-->
		<img src="<?=admin::labels('delete','linkImage')?>" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">
		</a>		
	</td>
	<td align="center" width="14%" height="5">
	<div id="status_<?=$ban_uid?>">
	   <a href="javascript:void(0);" onclick="bannerCS('<?=$ban_uid?>','<?=$ban_status?>');">
		<img src="<?=admin::labels($labels_content,'linkImage')?>" border="0" title="<?=admin::labels($labels_content)?>" alt="<?=admin::labels($labels_content)?>">
		</a>
	</div>
	</td>
		</tr>
	</table>
	</div>
</div>
	<?php
	$j++;
	$i++;
	}  ?>
</div>
    </td>
    </tr>
</table><br />
<br />
<br />
<?php
/********BeginResetColorDelete*************/    
$arrayscript .= "
function resetOrderRemove(uid)
	{
	var nvector = new Array();
	j=0;
	for (i=0;i<items.length;i++)
		{
		if (items[i]!=uid)
			{
			nvector[j]= items[i]; 
			j++; 
			}
		 }
	 for (i=0;i<nvector.length;i++)
		{
		if (i%2!=0) document.getElementById('list_'+ nvector[i]).className='row';
		else document.getElementById('list_'+ nvector[i]).className='row0';
		}
	items=nvector;
	}
</script>\n";
echo $arrayscript;
/********EndResetColorDelete*************/  

 	} 
else
	{ ?>
	<br />
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">   
  <tr>
    <td colspan="2" id="contentListing">
<div  style="background-color: #f7f8f8;">
<table class="list"  width="100%">
	<tr><td height="30px" align="center" class="bold">
	<?=admin::labels('nocontent')?>
	</td></tr>	
 </table>
</div>
</td></tr></table>

<?php 	} ?>