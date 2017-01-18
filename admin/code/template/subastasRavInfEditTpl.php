<?php
define (SYS_LANG,$lang);
$maxLine=20;
$order=0; 
//variables para filtros de productos*******************************************
$timeNow= date("Y-m-d H:i:s");//sub_finish<>0
//echo $timeNow;
$maxLine2 = admin::toSql(admin::getParam("maxLineP"),"Number");
if ($maxLine2) {$maxLine=$maxLine2; admin::setSession("maxLineP",$maxLine2);}
else {
		$maxLine2=admin::getSession("maxLineP");
		if ($maxLine2) $maxLine=$maxLine2;
	}

if ($lang=='es') $urlFrontLang='';
else $urlFrontLang=$lang.'/';
 
$UrlProduct=admin::getDBvalue("select col_url FROM mdl_contents_languages where col_con_uid=3 and col_language='".$lang."'");

$contentURL = admin::getContentUrl($con_uid,SYS_LANG);
$qsearch="select * from mdl_rav where rav_tipologia=2 order by rav_uid asc";
?>
<div id="DIV_WAIT1" style="display:none;"><img border="0" src="lib/loading.gif"></div>
<form name="frmsubastaRav" method="post" action="code/execute/subastasRavUpd.php?token=<?=admin::getParam("token")?>" enctype="multipart/form-data" >

    <?php
/********EndResetColorDelete*************/
$_pagi_sql=$qsearch.$orderCode;
//echo $_pagi_sql;

$_pagi_cuantos = $maxLine;//Eleg� un n�mero peque�o para que se generen varias p�ginas
//cantidad de enlaces que se mostrar�n como m�ximo en la barra de navegaci�n
$_pagi_nav_num_enlaces = 5;//Eleg� un n�mero peque�o para que se note el resultado
//Decidimos si queremos que se muesten los errores de mysql
$_pagi_mostrar_errores = false;//recomendado true s�lo en tiempo de desarrollo.
$nroReg = $db->numrows($_pagi_sql);
$db->query($_pagi_sql);
//echo $_pagi_sql;
include("core/paginator.inc.php");

if ($nroReg>0)
	{
	?>
   
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td width="77%" height="40"><span class="title">Editar RAV Informe</span></td>
    <td width="23%" height="40" align="right"></td>
  </tr>
  <tr>
	<td width="90%" height="40"></td>
    <td>
    </td>
  </tr>
  <tr>
  <td>
  <table width="100%" border="0">
	<tr>
            <td width="8%"><span class="txt11 color2"><?=admin::labels('code');?></span></td>
            <td width="18%" ><span class="txt11 color2">Rol</span></td>
            <td width="20%" ><span class="txt11 color2">Monto Inferior</span></td>
            <td width="20%" ><span class="txt11 color2">Monto Superior</span></td>
            <td width="10%"><span class="txt11 color2">Tipo</span></td>
        <td width="10%"></td>		
	</tr>
	</table>
  </td>
  </tr>
  <tr>
    <td id="contentListing" colspan="2">
 	<?php
$i=1;
?>
<div class="itemList" id="itemList" style="width:99%"> 
<?php
$j=0;
while ($subasta_list = $pagDb->next_record())
	{
	$rav_uid = trim($subasta_list["rav_uid"]);		
        $rav_rol = $subasta_list["rav_rol_uid"];//admin::getDbValue("select rol_description from mdl_roles where rol_uid=". $subasta_list["rav_rol_uid"]);
	$rav_monto = trim($subasta_list["rav_monto_inf"]);
	$rav_monto1 = $subasta_list["rav_monto_sup"];
	$rav_tipo =  ($subasta_list["rav_tipologia"]==1)?"Aprobaci&oacute;n":"Informe";
        $dest="";
		?> 
	<div class="groupItem" id="<?=$pro_uid?>">
    
    <div id="list_<?=$pro_uid?>" class="<?=$class?>" style="width:100%" >
    
    <table class="list" width="100%" style="">
	<tr>
            <td width="5%" ><?=admin::toHtml($rav_uid)?><input name="rav_uid[]" type="hidden" value="<?=$rav_uid?>"></td>
        <td width="25%" ><select name="rav_rol[]" class="input"  >
                	<?php
                    $sql3 = "select rol_uid, rol_description from mdl_roles";
					$db3->query($sql3);
					while ($content=$db3->next_record())
					{	
					?>
					<option <?php if($content["rol_uid"]==$rav_rol) echo 'selected="selected"';?> value="<?=$content["rol_uid"]?>"><?=$content["rol_description"]?></option>					
					<?php
					}
                    ?>
				</select></td>
        <td width="20%" ><input name="rav_monto[]" value="<?=strtolower(trim(admin::toHtml($rav_monto)))?>"></td>
        <td width="20%" ><input name="rav_monto1[]" value="<?=$rav_monto1?>"></td>
        <td width="10%" ><?=$rav_tipo?>
        	</td>
                <td width="20%" >
                    <a href="eliminar" onclick="document.frmsubastaRav.eliminaRav.value=<?=$rav_uid?>;document.frmsubastaRav.submit();return false;">
		<img src="lib/delete_es.gif" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">
		</a>
                    
        	</td>
    </table>
<?php
$i++; 
$j++; 
?>
</div>
</div>
<?php } 
?>
</div>
    </td>
    </tr>
	<tr>
    <td colspan="2"><td colspan="2"><input name="eliminaRav" type="hidden" value=""><input name="rav_tipo" type="hidden" value="2">
    <br />
    </td>
    </tr>
    <tr>
<td colspan="2">
<br />
<div id="contentButton">
	
      
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="tbl_subasta" style="display:">
			<tr>
				<td width="79%" align="center">
                                    
                                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="49%" align="center">
                                                        <a href="guardar" onclick="document.frmsubastaRav.submit();return false;" class="button">
                                                    <?=admin::labels('save');?>
                                                    </a> 
                                                    </td>
                                                    <td width="51%" style="font-size:11px;">
                                                    <?=admin::labels('or');?> <a href="subastasRavList.php?token=<?=admin::getParam("token")?>" ><?=admin::labels('cancel');?></a> 
                                                    </td>
                                                    </tr>
                                         </table>
                                                                </td>
          
        </tr>
      </table>
      
      </div>

</td></tr>
</table>
<?php 	} 
else
	{ ?>
	<br />
<br />
<div id="itemList"> 
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
      <td width="77%" height="40"><span class="title">Listado RAV</span></td>
    <td width="23%" height="40" align="right"><a href="susbastaRavEditar.php">Editar RAV</a></td>
  </tr>
  <tr>
    <td colspan="2" id="contentListing">
<div  style="background-color: #f7f8f8;">
<table class="list"  width="100%">
	<tr><td height="30px" align="center" class="bold">
	No existen registros
	</td></tr>	
 </table>
</div>
</td></tr>
</table>

<?php 	} 
?>
</form>

	
<div id="itemList"> 
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
            <td width="77%" height="40"><span class="title" style="color: orange">+ Adicionar RAV Informe</span></td>
    <td width="23%" height="40" align="right"></td>
  </tr>
  <tr>
    <td colspan="2" id="contentListing">
<div  style="background-color: #f7f8f8;">
    <form name="addRav" method="post" action="code/execute/subastasRavAdd.php?token=<?=admin::getParam("token")?>" enctype="multipart/form-data">
<table class="list" width="100%" style="">
	<tr>
            <td width="5%" ></td>
        <td width="25%" ><select name="rav_rol" class="input"  >
                <option selected="selected" value="">Seleccionar Rol</option>
                	<?php
                    $sql3 = "select rol_uid, rol_description from mdl_roles";
					$db3->query($sql3);
					while ($content=$db3->next_record())
					{	
					?>
					<option value="<?=$content["rol_uid"]?>"><?=$content["rol_description"]?></option>					
					<?php
					}
                    ?>
				</select></td>
        <td width="20%" ><input name="rav_monto" value=""></td>
        <td width="20%" ><input name="rav_monto1" value=""></td>
        <td width="10%" ><input name="rav_tipo" type="hidden" value="2">
        	</td>
                <td width="20%" >
                    <a href="guardar" onclick="document.addRav.submit(); return false;">
		<img src="lib/save_es.gif" border="0" title="<?=admin::labels('save')?>" alt="<?=admin::labels('save')?>">
		</a>
                    
        	</td>
    </table>
    </form>
</div>
</td></tr>
</table>
	<br />
<br />
