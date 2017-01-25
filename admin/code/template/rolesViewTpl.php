<?php
$rol_uid = admin::toSql(admin::getParam("rol_uid"),"Number");
$titleRol=admin::getDBvalue("SELECT rol_description FROM mdl_roles where rol_uid=".$rol_uid);
?>
<br />
<form name="frmRoles" method="post" action="code/execute/rolesUpd.php?token=<?=admin::getParam("token");?>" onsubmit="return false;" enctype="multipart/form-data">
<input name="rol_uid" type="hidden" value="<?=$rol_uid?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="77%" height="40"><span class="title">Ver Rol</span></td>
    <td width="23%" height="40">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="2" id="contentListing">
    	
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td width="50%" valign="top">
        
        <table width="98%" border="0" cellpadding="5" cellspacing="5" class="box">
          <tr>
            <td width="15%"><?=admin::labels('user','nameRol');?>:</td>
            <td >
			<?=$titleRol?>
            <br /><span id="div_rol_name" style="display:none;" class="error">Campo Requerido</span>			
            </td>
           </tr>
         </table>
         <br />
         <table width="98%" border="0" cellpadding="5" cellspacing="5" class="box">
          <tr>
            <td colspan="2" class="titleBox">Modulos:</td>
          </tr>
          
           <tr>
            <td width="50%" valign="top">
            <table width="98%" border="0"  align="right" cellpadding="0" cellspacing="5" class="box">

          <tr>
            <td colspan="2" class="titleBox"><?=admin::labels('users','rights');?></td>
          </tr>
          
<?php 
if ($_SESSION["usr_uid"]!=2) $sqldat="select * from sys_modules where mod_language='".$lang."' and 
			  mod_parent=0 and mod_uid not in ('1','31','34') and
			  mod_status='ACTIVE'";	
else $sqldat="select * from sys_modules where mod_language='".$lang."' and 
			  mod_parent=0  and
			  mod_status='ACTIVE'";
$db->query($sqldat);
while($row = $db->next_record()){
$OnOff3 =admin::getDBvalue("select count(mus_uid) from sys_modules_users where mus_rol_uid='".$rol_uid."' and mus_mod_uid=".$row["mod_uid"]." and mus_delete=0 and mus_place='MODULE'");
		if ($OnOff3!=0) $OnOff3='checked="checked"';
		else $OnOff3='';		
?>
          <tr <?=$displaynone;?> >
            <td width="10">
                <input name="mod_uid[<?=$row["mod_uid"]?>]" disabled type="checkbox" id="mod_uid[<?=$row["mod_uid"]?>]" <?=$OnOff3?> value="<?=$row["mod_uid"]?>" onclick="checkAll('mod_uid[<?=$row["mod_uid"]?>]')" />
			</td>
            <td><?=$row["mod_name"]?></td>
            
          </tr>
		<tr>
        <td>
        </td>
        <td>
 			<table class="box" border="0" width="100%">
			 <?php
             $sql2="select mod_uid,mod_name from sys_modules where mod_language='".$lang."' and 
                          mod_parent=".$row["mod_uid"]." and 
                          mod_status='ACTIVE' order by mod_uid asc";
					
                    $db2->query($sql2);
                    while($row2 = $db2->next_record()){	
            			$OnOff4 =admin::getDBvalue("select count(mus_uid) from sys_modules_users where mus_rol_uid='".$rol_uid."' and mus_mod_uid=".$row2["mod_uid"]." and mus_delete=0 and mus_place='MODULE'");
                    	if ($OnOff4!=0) $OnOff4='checked="checked"';
                    	else $OnOff4='';		
            ?>
            <tr>       
            <td width="10"><input disabled name="mod_uid[<?=$row["mod_uid"]?>][]" type="checkbox"  <?=$OnOff4?> value="<?=$row2["mod_uid"]?>"  />
			</td>
            <td ><?=$row2["mod_name"]?></td>
             <?php
                        $sSQL = "select mop_uid, mop_lab_category from sys_modules_options where mop_mod_uid=".$row2["mod_uid"]." and mop_status='ACTIVE'";
                        $cantidadOp=$db4->numrows($sSQL);
                        //echo $sSQL;
                        //echo $cantidadOp;
                        if($cantidadOp>0){                          
                            
			?>
            <td>
            <table>
                <tr>
            	<td>&nbsp;</td>
            	<td>
                	<table border="0" width="100%" class="box">
	                    <tr>
                                <?php
                                $db4->query($sSQL);
                                while($options=$db4->next_record())
                                {
                                    $active = admin::getDbValue("select moa_status from sys_modules_access where moa_mop_uid=".$options["mop_uid"]." and moa_rol_uid=$rol_uid");
                                    if($active=='ACTIVE') $checked='checked';
                                    else $checked='';
                                ?>
                                <td width="13"><input disabled name="mod_uid[<?=$row["mod_uid"]?>][<?=$row2["mod_uid"]?>][]" <?=$checked?> type="checkbox" value="<?=$options["mop_uid"]?>" /></td>
                        	<td><?=$options["mop_lab_category"]?></td>
                                <?php
                                }
                                ?>
                            </tr>
                    </table>
            	</td>
             </tr></table></td>
            <?php
			}
            ?>
        	</tr>
            
	<?php	} ?>            
            <?php 
             $sql3="select mof_mfl_uid,lab_label,mof_delete 
			 		from sys_modules_fields 
					left join sys_labels on lab_uid=mof_lab_uid and lab_category=mof_lab_category 
					where mof_mod_uid=".$row["mod_uid"]." 
					and mof_rol_uid='".$rol_uid."' 
					and lab_language='".$lang."' 
					order by mof_mfl_uid";
					
                    $db3->query($sql3);
                    while($row3 = $db3->next_record()){	
                    	$checked = $row3["mof_delete"] ? '':'checked="checked"' ;
			
			?>
            <tr>
            	<td>&nbsp;</td>
            	<td>
                	<table border="0" width="100%" class="box">
	                    <tr>
                        	<td width="10"><input disabled name="mod_uid[<?=$row["mod_uid"]?>][interior][]" type="checkbox"  <?=$checked?> value="<?=$row3["mof_mfl_uid"]?>" onclick="checkedVerify('mod_uid[<?=$row["mod_uid"]?>]')" /></td>
                        	<td><?=$row3["lab_label"]?></td>
                        </tr>
                    </table>
            	</td>
             </tr>
             <?php } ?>
	
            </table>
            
        </td>
      </tr>

<?php } ?>                    

        </table>&nbsp;
        </td>
          </tr>
		  
        </table>
         </td>
                
        <td width="50%" valign="top">
        <table width="98%" border="0" cellpadding="5" cellspacing="5" class="box" style="display:none">
         
		   <tr>
            <td colspan="2" class="titleBox">Contenidos:</td>
          </tr> 
           <tr>
            <td width="50%" valign="top">
            <table width="98%" border="0"  align="right" cellpadding="0" cellspacing="5" class="box">
<?php 
$sqldat="select * 
		from mdl_contents
		left join mdl_contents_languages on (con_uid=col_con_uid)
		where col_language='".$lang."' and 
			  con_parent=0 and 
			  con_delete<>1 
			  and con_uid not in (1) 
		order by con_position asc";	

$db->query($sqldat);
while($row = $db->next_record()){
		$OnOff =admin::getDBvalue("select count(mus_uid) from sys_modules_users where mus_rol_uid='".$rol_uid."' and mus_mod_uid=".$row["con_uid"]." and mus_delete=0 and mus_place='CONTENT'");
		if ($OnOff!=0) $OnOff='checked="checked"';
		else $OnOff='';
?>
          <tr>
            <td width="10"><input name="con_uid[<?=$row["con_uid"]?>]" type="checkbox" id="con_uid[<?=$row["con_uid"]?>]" <?=$OnOff?> value="<?=$row["con_uid"]?>" onclick="checkAll('con_uid[<?=$row["con_uid"]?>]')" />
			</td>
            <td><?=$row["col_title"]?></td>
          </tr>
<?php
		$sql2="select * 
				from mdl_contents
				left join mdl_contents_languages on (con_uid=col_con_uid)
				where col_language='".$lang."' and 
					  con_parent=".$row["con_uid"]." and 
					  con_delete<>1 
				order by con_position asc";	
		
		$db2->query($sql2);

		while($row2 = $db2->next_record()){
		$OnOff2 =admin::getDBvalue("select count(mus_uid) from sys_modules_users where mus_rol_uid='".$rol_uid."' and mus_mod_uid=".$row2["con_uid"]." and mus_delete=0 and mus_place='CONTENT'");
		if ($OnOff2!=0) $OnOff2='checked="checked"';
		else $OnOff2='';		
?>
		<tr>
        <td> 
        </td>
        <td>
 			<table border="0"  class="box" width="100%">
            <tr>       
            <td width="10"><input name="con_uid[<?=$row["con_uid"]?>][]" type="checkbox"  <?=$OnOff2?> value="<?=$row2["con_uid"]?>" onclick="checkedVerify('con_uid[<?=$row["con_uid"]?>]')" />
			</td>
            <td><?=$row2["col_title"]?></td>
        	</tr>
  
            </table>
               
        </td>
        
          </tr>
<?php
		}


}?>

        </table><span id="div_con_uid" style="display:none;" class="error">Seleccione al menos un Contenido</span>
        </td>
          </tr>
		  
        </table>
 <!--inicicio  modulos-->        
        </td>
    </tr>
</table>
      </tr>
    </table>
</form>

      <div id="contentButton">
	  	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="59%" align="center">
                                    <a href="rolesList.php?token=<?=admin::getParam("token")?>" class="button" >Volver</a> 
				</td>
        </tr>
      </table></div>