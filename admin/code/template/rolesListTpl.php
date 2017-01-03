<?php
if ($_SESSION["usr_uid"]!=2) $sSQL= "select rol_uid,rol_description,rol_delete,rol_status from mdl_roles where rol_uid!=2 and rol_delete=0 and rol_status='ACTIVE'";			
else $sSQL= "select rol_uid,rol_description,rol_delete,rol_status from mdl_roles where rol_delete=0 and rol_status='ACTIVE'";

$db->query($sSQL);
$nroReg = $db->numrows();
if ($nroReg>0)
	{
	?>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td width="77%" height="40"><span class="title"><?=admin::labels('roles','list')?></span></td>
    <td width="23%" height="40">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" id="contentListing">
	<?php
$i=1;
while ($user_list = $db->next_record())
	{
	$rol_uid = $user_list["rol_uid"];
	$rol_description = $user_list["rol_description"];
	$rol_status = $user_list["rol_status"];
	
	if ($rol_status=='ACTIVE') $labels_content='status_on';
	else $labels_content='status_off';
	
	if ($i%2==0) $class='row';
	else  $class='row0';
  	?> 
  	<div id="<?=$rol_uid?>" class="<?=$class?>">
<table class="list" width="100%">
	<tr><td width="50%"><?=$rol_description?></td>
	<td align="center" width="12%" height="5">
    <?php 
	$valuePermit=admin::getDBvalue("select mop_status from sys_modules_options where mop_rol_uid=".$_SESSION['usr_rol']." and mop_mod_uid=44 and mop_lab_category='Ver'");
	if($valuePermit=='ACTIVE'){?>
		 <!--  <a href="../userView.php?usr_uid=<?=$usr_uid?>">-->
		<img src="lib/view_off_es.gif" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
		<!--</a>-->
         <?php }?>
	</td>
	<td align="center" width="12%" height="5">
    <?php 
	$valuePermit=admin::getDBvalue("select mop_status from sys_modules_options where mop_rol_uid=".$_SESSION['usr_rol']." and mop_mod_uid=44 and mop_lab_category='Editar'");
	if($valuePermit=='ACTIVE'){?>
		<a href="rolesEdit.php?rol_uid=<?=$rol_uid?>&token=<?=admin::getParam("token");?>">
		<img src="lib/edit_es.gif" border="0" title="<?=admin::labels('edit')?>" alt="<?=admin::labels('edit')?>">
		</a>
        <?php }?>
	</td>
	<td align="center" width="12%" height="5">
    <?php 
	$valuePermit=admin::getDBvalue("select mop_status from sys_modules_options where mop_rol_uid=".$_SESSION['usr_rol']." and mop_mod_uid=44 and mop_lab_category='Eliminar'");
	if($valuePermit=='ACTIVE'){?>
		<a href="#" onclick="removeList(<?=$rol_uid?>);return false;">
		<img src="lib/delete_es.gif" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">
		</a>
        <?php }?>
	</td>
	<td align="center" width="14%" height="5">
    <?php 
	$valuePermit=admin::getDBvalue("select mop_status from sys_modules_options where mop_rol_uid=".$_SESSION['usr_rol']." and mop_mod_uid=44 and mop_lab_category='Estado'");
	if($valuePermit=='ACTIVE'){?>
	<div id="status_<?=$rol_uid?>">
	   <a href="javascript:rolesCS('<?=$rol_uid?>','<?=$rol_status?>');">
		<img src="<?=admin::labels($labels_content,'linkImage')?>" border="0" title="<?=admin::labels($labels_content)?>" alt="<?=admin::labels($labels_content)?>">
		</a>
	</div>
    <?php }?>
	</td>
		</tr>
	</table>
	</div>
	<?php
	$i++;
	}  ?>
    </td>
    </tr>
</table><br />
<br />
<br />
<?php 	} 
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