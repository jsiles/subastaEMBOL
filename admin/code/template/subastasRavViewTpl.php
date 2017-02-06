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
$rav_uid=  admin::getParam("rav_uid");
$qsearch="select * from mdl_rav where rav_tipologia=1 and rav_uid=".$rav_uid;
$db->query($qsearch);
$rav = $db->next_record();
?>
<div id="DIV_WAIT1" style="display:none;"><img border="0" src="lib/loading.gif"></div>
<br>
    <form name="addRav" method="post" action="code/execute/subastasRavUpd.php?token=<?=admin::getParam("token")?>" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="77%" height="40"><span class="title"><?=admin::modulesLabels()?></span></td>
    <td width="23%" height="40">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" id="contentListing"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50%" valign="top"><table width="98%" border="0" cellpadding="5" cellspacing="5" class="box">
         <tr>
            <td colspan="3" class="titleBox"><?=admin::labels('user','personaldata');?></td>
         </tr>
          
	<tr>
            <td width="5%" >Rol:</td>
        <td width="25%" >
                	<?php
                    $sql3 = "select rol_description from mdl_roles where rol_uid=".$rav["rav_rol_uid"];
                       $rol = admin::getDbValue($sql3);
                    ?>
			<?=$rol?>	
				
        </td>
                                <td width="7%">&nbsp;</td>
        </tr>
        <tr>
            <td width="5%" >Monto inferior:</td>    
            <td width="20%" ><?=$rav["rav_monto_inf"]?></td>
            <td width="7%">&nbsp;</td>
        </tr>
        <tr>
            <td width="5%" >Monto superior:</td>
            <td width="20%" ><?=$rav["rav_monto_sup"]?></td>
            <td width="7%">&nbsp;</td>
        </tr>
        <tr>
            <td width="5%" >Estado:</td>
            <td width="10%">
                <?php
                ($rav["rav_status"]=="ACTIVE")?$select = 'Activo':$select= 'Inactivo';
                        
                ?>
			<?=$select?>
			<span id="div_col_status" style="display:none;" class="error"></span>			</td>
                        <input name="rav_tipo" type="hidden" value="1" />
                        <input name="rav_uid" type="hidden" value="<?=$rav_uid?>" />
                        </td>
                <td width="7%">&nbsp;</td>
        </tr>
    </table>
    </form>
</div>
</td></tr>
</table>
    </td>
  </tr></table>
       
<br />
      <br />
      <div id="contentButton">
	  	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="59%" align="center">
				    <a href="subastasRavList.php?token=<?=admin::getParam("token")?>" class="button">Volver</a>
				</td>
         
        </tr>
      </table></div>
      <br /><br />
<br />
<br />

      <br />
      <br />

