<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr><td>
            &nbsp;
        </td></tr>
  <tr>
      <td width="77%" height="40"><span class="title">Ver Reporte</span>&nbsp;<a href="code/execute/reporteTplXlsPdf.php?token=<?=admin::getParam("token")?>&pro=<?=$sub_uid?>&type=xls">
              <img src="lib/ext/excel.png" border="0" alt="Excel" title="Excel" /></a>&nbsp;<a href="code/execute/reporteTplXlsPdf.php?token=<?=admin::getParam("token")?>&pro=<?=$sub_uid?>&type=pdf"><img src="lib/ext/acrobat.png" border="0" alt="Excel" title="Excel" /></a>
    </td>
    <td width="23%" height="40">&nbsp;</td>
  </tr>
    <tr><td>
            &nbsp;
        </td></tr>
  <tr>
  
  <tr>
    <td colspan="2" id="contentListing">
    	
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td width="100%" valign="top">
        
        
         <br />
         <table width="98%" border="0" cellpadding="5" cellspacing="5" class="box">
          <tr>
              <td>
          <!--INICIO-->
          
<?php

$sub_uid =admin::toSql(admin::getParam("sub_uid"),"Number");

$sql ="SELECT pro_name,pca_name,pro_description,pro_quantity,pro_unidad,sub_status, sub_modalidad, sub_type, sub_hour_end, sub_mount_base, sub_mount_unidad, sub_tiempo, sub_uid 
FROM mdl_subasta, mdl_product,mdl_pro_category
WHERE sub_uid=pro_sub_uid and pca_uid=sub_pca_uid and sub_status='ACTIVE' and sub_uid='".$sub_uid."'";
$db->query($sql);
while ($firstPart = $db->next_record())
{ 
	$pro_name=$firstPart['pro_name'];
	$pca_name=$firstPart['pca_name'];
	$pro_description=$firstPart['pro_description'];
	$pro_quantity=$firstPart['pro_quantity'];
	$pro_unidad=$firstPart['pro_unidad'];
	$sub_status=$firstPart['sub_status'];
	$sub_modalidad=$firstPart['sub_modalidad'];
	$sub_type=$firstPart['sub_type'];
	$sub_hour_end=explode(" ", $firstPart['sub_hour_end']);
	$sub_mount_base=$firstPart['sub_mount_base'];
	$sub_mount_unidad=$firstPart['sub_mount_unidad'];
	$sub_tiempo=$firstPart['sub_tiempo'];
	$sub_uid=$firstPart['sub_uid'];
}

$tipoFirma=admin::getDBvalue("SELECT sua_elaborado FROM mdl_subasta_adjudicar where sua_sub_uid='".$sub_uid."'");
$obs=admin::getDBvalue("SELECT sua_observaciones FROM mdl_subasta_adjudicar where sua_sub_uid='".$sub_uid."'");

?>
<table width="50%" border="0">
    <tr>
        <td ><img src="<?=$domain?>/lib/logo.png" width="100" /></td>
        <td colspan="4"><h1>Parametrizaci&oacute;n de subastas</h1><br /><span>Fecha: <?=date("d/m/Y")?></span></td>
    </tr>
<tr>
    <td colspan="5"><br /><br /></td>
    
</tr>
<tr>
    <td colspan="5"><h2>1: Datos generales de la subasta</h2></td>
</tr>
<tr>
    <td colspan="5"><br /></td>
</tr>
<tr>
    <td>Nombre:</td>
    <td align="left"><?=$pro_name?></td>
    <td></td>
    <td>Cantidad:</td>
    <td align="left"><?=$pro_quantity?></td>
</tr>
<tr>
    <td>Categor&iacute;a:</td>
    <td align="left"><?=$pca_name?></td>
    <td></td><td width="21%">Unidades:</td>
    <td align="left"><?=$pro_unidad?></td>
</tr>
<tr>
    <td>Descripci&oacute;n:</td>
    <td></td><td width="6%"></td>
    <td></td><td width="21%"></td>
</tr>
<tr>
    <td colspan="5" align="left"><?=$pro_description?></td>
</tr>
<tr>
    <td colspan="5"><br /><br /></td>
</tr>
<tr>
    <td colspan="5"><h2>2: Datos particulares de la subasta</h2></td>
</tr>
<tr>
    <td colspan="5"><br /></td>
</tr>
<tr>
    <td>Modalidad de subasta:</td>
    <td align="left"><?=$sub_modalidad?></td>
    <td></td>
    <td>Fecha de subasta:</td>
    <td align="left"><?=$sub_hour_end[0]?></td>
</tr>
<tr>
    <td>Tipo de subasta:</td>
    <td align="left"><?=$sub_type?></td>
    <td></td>
    <td>Hora de subasta:</td>
    <td align="left"><?=$sub_hour_end[1]?></td>
</tr>
<tr>
    <td >Monto base:</td>
    <td align="left"><?=$sub_mount_base?></td>
    <td></td><td width="21%">Tiempo l&iacute;mite de mejora en min.:</td>
    <td align="left"><?=$sub_tiempo?></td>
</tr>
<tr>
    <td >Unidad de mejorar:</td>
    <td  align="left"><?=$sub_mount_unidad?></td>
    <td ></td><td width="21%"></td>
    <td ></td>
</tr>
<tr>
    <td colspan="5"><br /><br /></td>
</tr>
<tr>
    <td colspan="5"><h2>3: Proveedores habilitados</h2></td>
</tr>
<tr>
    <td colspan="5"><br /></td>
</tr>
<tr>
    <td colspan="5">
	<table width="100%">
    	<tr><th width="10%">Oferente:</th>
            <th width="10%">Lugar de entrega:</th>
            <th width="10%">Medio de transporte:</th>
            <th width="10%">Incoterm:</th>
            <th width="10%">Factor de ajuste:</th>
        </tr>
<?php

$sql ="select concat(cli_firstname,' ',cli_lastname) as nombre, inc_lugar_entrega, tra_name, inl_name, inc_ajuste 
from mdl_incoterm, mdl_incoterm_language, mdl_transporte, mdl_client 
where inc_inl_uid=inl_uid and inc_tra_uid=tra_uid and inc_cli_uid=cli_uid and inc_delete=0 and inc_sub_uid='$sub_uid' 
order by inc_uid desc";
$db2->query($sql);	

while ($secPart = $db2->next_record())
{		
?>
        <tr>
            <td width="20%" align="center"><?=$secPart['nombre']?></td>
            <td width="20%" align="center"><?=$secPart['inc_lugar_entrega']?></td>
            <td width="20%" align="center"><?=$secPart['tra_name']?></td>
            <td width="20%" align="center"><?=$secPart['inl_name']?></td>
            <td width="20%" align="center"><?=$secPart['inc_ajuste']?></td>
        </tr>
        <?php
 } 
?>
        </table>
</td>
</tr>
<tr>
    <td colspan="5"><br /><br /><br /></td>
</tr>
<tr>
    <th colspan="5" align="left">Observaciones:</th>
</tr>
<tr>
    <td colspan="5" align="left"><?=$obs?></td>
</tr>
<tr>
    <td colspan="5"><br /><br /><br /><br /></td>
</tr>
<tr>
    <th align="center" colspan="2" >Elaborado</th>
    <th align="center" >Revisado</th>
    <th align="center" colspan="2" ><?=$tipoFirma?></th>
</table>
</td>
          </tr>
          <!--FIN-->
           <tr>
            <td width="50%" valign="top">
            <table width="98%" border="0"  align="right" cellpadding="0" cellspacing="5" class="box">
          <tr>
            <td colspan="2" class="titleBox"></td>
          </tr>
          
        </table>&nbsp;
        </td>
          </tr>
		  
        </table>
         </td>
    </tr>
</table>
</td>
</tr>
<tr>
    <td>&nbsp;</td>
</tr>
<tr>
    <td colspan="5" align="rigth">
        
      <div id="contentButton">
	  	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="59%" align="center">
                                    <a href="reporteList.php?token=<?=admin::getParam("token")?>" class="button" >Volver</a> 
				</td>
        </tr>
      </table>
      </div>
    
    </td>
   
</tr>
<tr>
    <td>&nbsp;</td>
</tr>

</table>

    