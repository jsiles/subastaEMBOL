<?php
$sub_uid=admin::getParam("sub_uid");
$sql = "SELECT * FROM mdl_product, mdl_subasta, mdl_pro_category WHERE sub_uid=pro_sub_uid and pca_uid=sub_pca_uid and sub_status='ACTIVE' and pro_uid='".$sub_uid."'";
$db->query($sql);
$prod = $db->next_record();

?>
<br />
<div id="div_wait" style="display:none;"><img border="0" src="lib/loading.gif"></div>
<form name="frmsubasta" method="post" action="code/execute/adjudicarSubastaUpd.php?token=<?=admin::getParam("token")?>&sub_uid=<?=$prod["sub_uid"]?>" enctype="multipart/form-data" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="77%" height="40">
		<span class="title"><?=admin::modulesLabels('informesNew')?></span>
		</td>
		<td width="23%" height="40">&nbsp;</td>
	</tr>
  	<tr>
	<td colspan="2" id="contentListing">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		<td width="50%" valign="top">
		<!--TABLA IZQUIERDA BEGIN-->
        
        <table width="98%" border="0" cellpadding="5" cellspacing="5" class="box">			
			<tr>
			<td colspan="2" class="titleBox"><?=admin::labels('data');?> subasta:</td>
			</tr>
            <tr>
				<td><?=admin::labels('name');?>:</td>
				<td><?=$prod["pro_name"]?>
				<br /><span id="div_pro_name" style="display:none; padding-left:5px; padding-right:5px;" class="error"><?=admin::labels('subasta','titleerror');?></span>
				</td>
			</tr>
            <tr>
				<td width="29%"><?=admin::labels('category','label');?>:</td>
				<td width="64%">
				<?php
                    $category = admin::getDbValue("select pca_name from mdl_pro_category where pca_delete=0 and pca_uid=".$prod["sub_pca_uid"]);
					echo $category;
					?>
					
				</td>
			</tr>
            
            <tr>
				<td><?=admin::labels('seo','metadescription');?> corta:</td>
				<td><?=$prod["sub_description"]?>
				</td>
			</tr>
            <tr>
				<td><?=admin::labels('seo','metadescription')?>:</td>
				<td><?=$prod["pro_description"]?>
				</td>
			</tr>
            <tr>
				<td><?=admin::labels('labels','quantity');?>:</td>
				<td><?=$prod["pro_quantity"]?>
				</td>
			</tr>
             <tr>
				<td>Unidad (Ej. millones):</td>
				<td><?=$prod["pro_unidad"]?>
				</td>
			</tr>
         <tr>
            <td valign="top"><?=admin::labels('news','image');?>:</td>
            <td>
			<?php
			$imgSavedroot1 = PATH_ROOT."/img/subasta/thumb2_".$prod["pro_image"];
			$imgSaveddomain1 = PATH_DOMAIN."/img/subasta/thumb2_".$prod["pro_image"];
			$imgSaveddomain2 = PATH_DOMAIN."/img/subasta/img_".$prod["pro_image"];
			if (file_exists($imgSavedroot1) && $prod["pro_image"]!=""){
			?>
			<div id="image_edit_<?=$prod["pro_image"]?>">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableUpload">
			<tr>
				<td width="25%" rowspan="2" align="center" valign="middle" style="padding:4px;">
				<a href="<?=$imgSaveddomain2?>" target="_blank"><img src="<?=$imgSaveddomain1?>?<?=time();?>" border="0" /></a>				</td>
				<td width="75%" style="font-size:11px;">
				<?=$prod["pro_name"];?><br />
				</td>
			</tr>
			<tr>
				<td height="24">
				<div id="imageChange1" style="display:none">
			<input type="file" name="pro_image" id="pro_image" size="14" onchange="verifyImageUpload();" style="font-size:11px;"  >  <a href="javascript:viewInputFile('off')" onclick="document.getElementById('pro_image').value='';document.getElementById('button_next').innerHTML='<?=admin::labels('public');?>';"><img border="0" src="lib/close.gif" align="top"/></a>
			
			<span id="div_pro_image" class="error" style="display:none">Solo archivos jpg bmp gif png</span></div></td>
			</tr>
			</table>
			</div>
			<div id="image_add_<?=$prod["pro_uid"]?>" style="display:none;"></div>
			<?php	}
			?>			</td>
          </tr>
          <tr>
            <td valign="top"><?=admin::labels('annex','adjunt');?>:</td>
            <td>
			<?php 
			$imgSavedroot2=PATH_ROOT."/docs/subasta/".$prod["pro_document"];
			$imgSaveddomain2=PATH_DOMAIN."/docs/subasta/".$prod["pro_document"];
			//echo $imgSaveddomain2;die;
			if (file_exists($imgSavedroot2) && $prod["pro_document"]!="")
				{
				$extension = admin::getExtension($prod["pro_document"]);
//				echo $extension;die;
				$imgextension = admin::getExtensionImage($extension);
			//	echo $imgextension;die;
			?>
			<div id="document_edit_<?=$prod["pro_uid"]?>">
			<div id="changeFile">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="12%" rowspan="2" align="center" valign="top">
				<?php if ($imgextension!="") { ?>
					<a href="<?=$imgSaveddomain2?>" target="_blank"><img border="0" src="<?=$imgextension?>" width="16" height="16"/></a>
				<?php } ?>				</td>
				<td width="88%" style="font-size:11px;">
				<span class="nameFile"><?=substr($prod["pro_document"],0,20);?>...</span>
			<br />
				</td>
			</tr>
			<tr>
				<td height="24" valign="top"><div id="div_adjunt_file_change" style="display:none">
				<table border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td>
				<input type="file" name="pro_document" id="pro_document" size="13" style="font-size:11px;" class="input5"></td>
				<td> <a href="javascript:chageUploadFile('off')" onclick="document.getElementById('pro_document').value='';"><img border="0" src="lib/close.gif" align="top"/></a>				</td>
				</tr>
				</table>
				</div>				</td>
			</tr>
			</table>
			</div>
			</div>
			<div id="document_add_<?=$news["new_uid"]?>" style="display:none;"></div>
			<?php
                          } 
			 ?>
			</td>
          </tr>
          <tr>
            <td valign="top"><?=admin::labels('status');?></td>
            <td><?php if ('ACTIVE'==$prod["sub_status"]) echo "Activo"; else echo "Inactivo";?></td>
          </tr>
        </table>

		<!--TABLA IZQUIERDA END-->

         	</td>
        <td width="50%" valign="top">
		<!--TABLA DERECHA BEGIN-->

		<table width="98%" border="0" align="right" cellpadding="5" cellspacing="5" class="box">
          <tr>
            <td colspan="2" class="titleBox"><?=admin::labels('data');?> subasta:</td>
          </tr>
                        
            <tr>
				<td width="29%">Modalidad de subasta:</td>
				<td width="64%">
				<?php if ('TIEMPO'==$prod["sub_modalidad"]) echo "Por tiempo"; else echo "";?>
				</td>
			</tr>         
                
                
                <tr>
				<td width="29%">Tipo de subasta:</td>
				<td width="64%">
				<?php if ('COMPRA'==$prod["sub_type"]) echo "Compra"; else echo "Venta";?></td>
			</tr>
            
       
<tr>
			<td>Fecha de subasta:</td>
			<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr><td width="28%" valign="middle"> 
                <?php
                $date_end1=admin::changeFormatDate(substr($prod["sub_hour_end"],0,10),2);
				$hour_end1=substr($prod["sub_hour_end"],11,5);
				?>
				<?=$date_end1?>
				</td><td width="72%" valign="middle">
				
				</td>
				</tr>
				</table>			
				</td>
				</tr>          
                	<tr>
					<td>Hora de subasta:</td>
					<td><?=$hour_end1?>
					</td>
				</tr>  
              <tr id="tr_montobase" style="display:">
				<td>Monto base:</td>
				<td><?=$prod["sub_mount_base"]?>
                <?=admin::getDbValue("select cur_description from mdl_currency where cur_uid=".$prod["sub_moneda"])?>
				</td>
			</tr>
            <tr id="tr_unidadmejora" style="display:">
				<td>Unidad de mejorar:</td>
				<td><?=$prod["sub_mount_unidad"]?>
				</td>
			</tr>
            
			<tr>
				<td>Tiempo l&iacute;mite de mejora en min.:</td>
				<td><?=$prod["sub_tiempo"]?>
				</td>
			</tr>	
		<tr><td colspan="2">
         <?php
		 $countBids=admin::getDBvalue("SELECT count(*) FROM mdl_bid where bid_sub_uid='".$prod["sub_uid"]."'");
		 if ($countBids>0){
		 ?>
         <table width="100%" border="0">
         <tr>
            <td colspan="2" class="titleBox">Listado de pujas:</td>
            <td><a href="excel" onclick="document.location.href='ficheroExcel.php?subasta=<?=$prod["sub_uid"]?>'; return false;" class="xls">
				<img border="0" src="lib/ext/excel.png" alt="Excel" title="Excel" />
					</a></td>
          </tr>
                
            <tr>
				<td width="40%" class="txt11 color2">Nombre de usuario:</td>
				<td width="30%" class="txt11 color2">Fecha y hora:</td>
                <td width="30%" class="txt11 color2">Monto:</td>
			</tr>         
               
                 <?php
				$sql2 = "SELECT * FROM mdl_bid where bid_sub_uid='".$prod["sub_uid"]."'";
				$db2->query($sql2);
				while ($content=$db2->next_record())
				{
				 $clientName=admin::getDBvalue("SELECT cli_socialreason FROM mdl_client where cli_uid='".$content["bid_cli_uid"]."'");
				 ?><tr>
				<td width="40%"><?=$clientName?></td>
				<td width="30%"><?=$content["bid_date"]?></td>
                <td width="30%"><?=$content["bid_mount"]?></td></tr>
             	<?php
				 }
				 ?>    
        </table>
         <?php
		 }
		 ?>
        </td></tr>	
   </table>
		<!--TABLA DERECHA END-->
		</td>
        </tr>
 	</table>
    </td>
    </tr>

</table>
<div id="DIV_WAIT1" style="display:none;"><img border="0" src="lib/loading.gif"></div>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
     <td width="77%" height="40"><span class="title">Lista de la Puja</span></td>
     <td width="23%" height="40">&nbsp;</td>
    </tr>
   <?php 
   $sSQL= "select * from mdl_bid where bid_sub_uid='".$sub_uid."' order by bid_uid desc ";
   $nroReg = $db2->numrows($sSQL);
   $db2->query($sSQL);

if ($nroReg>0)
	{
	?> 
     <tr>
    <td colspan="2" id="contentListing">
    <div class="row0">
    <table class="list" width="100%">
	<tr>
            <td width="12%" style="color:#16652f">Fecha y Hora</td>
            <td width="12%" style="color:#16652f">Proveedor</td>
    <td width="12%" style="color:#16652f">Monto</td>
    	<td align="center" width="12%" height="5">&nbsp;</td>
    <td align="center" width="12%" height="5">&nbsp;</td>
	</tr>
	</table>
    </div>
<div class="itemList" id="itemList" style="width:99%">  
	<?php
$i=1;
while ($list = $db2->next_record())
	{
	$cli_uid = $list["bid_cli_uid"];
	$cli_name = admin::getDBvalue("select cli_socialreason as nombre from mdl_client WHERE cli_uid='".$cli_uid."'");
	$bid_monto = $list["bid_mount"];
        $bid_fecha = $list["bid_date"];
	if ($i%2==0) $class='row0';
	else  $class='row';
	if ($i%2==0) $class2='row';
	else  $class2='row1';
  	?> 
    <div class="groupItem" id="<?=$inc_uid?>">
  	<div id="list_<?=$inc_uid?>" class="<?=$class?>" style="width:100%" >
<table class="list" width="100%">
	<tr>
            <td width="12%"><?=$bid_fecha?></td>
            <td width="12%"><?=$cli_name?></td>
            <td width="12%"><?=$bid_monto?></td>
   	<td align="center" width="12%" height="5">
		<!--<a href="#" onclick="showTab('list_<?=$inc_uid?>');showTab('Add_<?=$inc_uid?>'); return false;">
		<img src="lib/edit_es.gif" border="0" title="<?=admin::labels('edit')?>" alt="<?=admin::labels('edit')?>">
		</a>-->
	</td>
	<td align="center" width="12%" height="5">
			</td>
	</tr>
	</table>
	</div>
    </div>
    	<?php
	$i++;
	} 
 ?>
</div> 
    </td>
    </tr>
    <?php 
    } 
else
	{ ?>
    <tr>
    <td colspan="2"><br /></td>
    </tr>
  <tr>
    <td colspan="2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">   
  <tr>
    <td colspan="2" id="contentListing">
<div  style="background-color: #f7f8f8;">
<table class="list"  width="100%">
	<tr><td height="30px" align="center" class="bold">
	<?=admin::labels('subastas','noIncoterm')?>
	</td></tr>	
 </table>
</div>
</td></tr>
</table>
</td>
</tr>
<?php 	} ?>
<tr><td><br /></td></tr>
<tr>
     <td width="77%" height="40"><span class="title">Informe Subasta</span></td>
     <td width="23%" height="40">&nbsp;</td>
</tr>
<tr>
    <td colspan="2" id="contentListing">
    <div class="row0">
         <?php
        $sua_uid= admin::getParam("sua_uid");
        $sql="select * from mdl_subasta_informe where sua_uid=$sua_uid";
        $db2->query($sql);
        $informe = $db2->next_record();
        ?>
    <table class="list" width="100%">
	<tr>
            <td width="12%" style="color:#16652f">Elaborado por:</td>
            <td>
                <input id="elaborado" name="elaborado" value="<?=$informe["sua_elaborado"]?>">
                <input id="sua_uid" type="hidden" name="sua_uid" value="<?=$sua_uid?>">
            <br /><span id="div_elaborado" style="display:none; padding-left:5px; padding-right:5px;" class="error">* Campo requerido</span>
            </td>
        </tr>
        <tr>
            <td width="12%" style="color:#16652f">Aprobado por:</td>
            <td><input id="aprobado" name="aprobado" value="<?=$informe["sua_aprobado"]?>">
            <br /><span id="div_aprobado" style="display:none; padding-left:5px; padding-right:5px;" class="error">* Campo requerido</span>
            </td>
        </tr>
        <tr>
            <td width="12%" style="color:#16652f">Ahorro econ&oacute;mico:</td>
            <td><input id="ahorro" name="ahorro" value="<?=$informe["sua_ahorro"]?>">
            <br /><span id="div_ahorro" style="display:none; padding-left:5px; padding-right:5px;" class="error">* Campo requerido</span>
            </td>
        </tr>
        <tr>
            <td width="12%" style="color:#16652f">Observaciones:</td>
            <td><textarea id="observaciones" rows="4" cols="45" name="observaciones"><?=$informe["sua_observaciones"]?></textarea>
            <br /><span id="div_observaciones" style="display:none; padding-left:5px; padding-right:5px;" class="error">* Campo requerido</span>
            </td>
        </tr>
    </table>
    </div>
    </td>
</tr>
<tr>
<td colspan="2">
<br />
<div id="contentButton">
	  	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="59%" align="center">
                                    <a href="#" class="button" onclick="verifyadjudicar();" >Actualizar</a>
				</td>
                                <td width="41%" style="font-size:11px;">
                                    o <a href="informeList.php?token=<?=admin::getParam("token")?>" >Cancelar</a> 
                                </td>
        </tr>
      </table>
</div>
<br /><br /><br /><br /><br />
</td></tr>
</table>
</form>