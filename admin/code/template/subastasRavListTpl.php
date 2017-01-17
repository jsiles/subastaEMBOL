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
$qsearch="select * from mdl_rav where rav_tipologia=1 order by rav_uid asc";
?>
<div id="DIV_WAIT1" style="display:none;"><img border="0" src="lib/loading.gif"></div>
<?php
/********EndResetColorDelete*************/
$_pagi_sql=$qsearch.$orderCode;
//echo $_pagi_sql;

$_pagi_cuantos = $maxLine;//Elegí un número pequeño para que se generen varias páginas
//cantidad de enlaces que se mostrarán como máximo en la barra de navegación
$_pagi_nav_num_enlaces = 5;//Elegí un número pequeño para que se note el resultado
//Decidimos si queremos que se muesten los errores de mysql
$_pagi_mostrar_errores = false;//recomendado true sólo en tiempo de desarrollo.
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
      <td width="77%" height="40"><span class="title">Listado RAV Par&aacute;metros</span></td>
      <td width="23%" height="40" align="right"><a href="subastasRavEdit.php?token=<?=admin::getParam("token")?>">Editar RAV Par&aacute;metros</a></td>
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
        $rav_rol = admin::getDbValue("select rol_description from mdl_roles where rol_uid=". $subasta_list["rav_rol_uid"]);
	$rav_monto = trim($subasta_list["rav_monto_inf"]);
	$rav_monto1 = ($subasta_list["rav_monto_sup"]!=0)?$subasta_list["rav_monto_sup"]:"Sin l&iacute;mite";
	$rav_tipo =  ($subasta_list["rav_tipologia"]==1)?"Aprobaci&oacute;n":"Informe";
        $dest="";
		?> 
	<div class="groupItem" id="<?=$pro_uid?>">
    
    <div id="list_<?=$pro_uid?>" class="<?=$class?>" style="width:100%" >
    
    <table class="list" width="100%" style="">
	<tr>
		<td width="5%" ><span <?=$dest?>><?=admin::toHtml($rav_uid)?></span></td>
        <td width="25%" ><span <?=$dest?>><?=ucfirst(strtolower(trim(admin::toHtml($rav_rol))))?></span></td>
        <td width="20%" ><span <?=$dest?>><?=strtolower(trim(admin::toHtml($rav_monto)))?></span></td>
        <td width="20%" ><span><?=$rav_monto1?></span></td>
        <td width="10%" ><span><?=$rav_tipo?></span>
        	</td>
                <td width="20%" >
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
    <td colspan="2">
    <br />
    </td>
    </tr>
    <tr>
    <td colspan="2">
    
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
</form>

<?php 	} 
?>