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
<br>
    <form name="addRav" method="post" action="code/execute/subastasRavAdd.php?token=<?=admin::getParam("token")?>" enctype="multipart/form-data">
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
        <td width="25%" ><select name="rav_rol" class="input"  >
                <option selected="selected" value="" class="txt10">Seleccionar Rol</option>
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
                                <td width="7%">&nbsp;</td>
        </tr>
        <tr>
            <td width="5%" >Monto inferior:</td>    
            <td width="20%" ><input name="rav_monto" value="" class="input"></td>
            <td width="7%">&nbsp;</td>
        </tr>
        <tr>
            <td width="5%" >Monto superior:</td>
            <td width="20%" ><input name="rav_monto1" value="" class="input"></td>
            <td width="7%">&nbsp;</td>
        </tr>
        <tr>
            <td width="5%" >Moneda</td>
        
        <td>
    <?php 
				
				$arrayMoneda = admin::dbFillArray("select cur_uid, cur_description from mdl_currency where cur_delete=0");
				
				//print_r($arrayMoneda); 
				
				?>
                <span id="div_sub_moneda">
                <select name="rav_moneda" id="sub_moneda" class="input" >
                <?php
				foreach($arrayMoneda as $key=>$value)
				{                
				?>
                	<option value="<?=$key?>"><?=$value?></option>
				<?php
				}
				?>
                </select>
                                &nbsp;<a href="javascript:addCurrency();" class="small2">agregar</a> | 
                <a href="javascript:delCurrency();" class="small3"><?=admin::labels('del');?></a></span>

                 <div id="div_add_currency" style="display:none;">
		<input type="text" name="add_currency" id="add_currency" class="input3" onfocus="setClassInput3(this,'ON');document.getElementById('div_add_currency_error').style.display='none';" onblur="setClassInput3(this,'OFF');document.getElementById('div_add_currency_error').style.display='none';" onclick="setClassInput3(this,'ON');document.getElementById('div_add_currency_error').style.display='none';"/>		
		<a href="javascript:addCurrencyOption()" class="button3"><?=admin::labels('add');?></a><a href="javascript:closeCurrency();" class="link2">Cerrar</a>		</div>
				<br /><span id="div_add_currency_error" style="display:none; padding-left:5px; padding-right:5px;" class="error"><?=admin::labels('required');?></span>
                </div>
                <br /><span id="div_sub_mount_base" style="display:none; padding-left:5px; padding-right:5px;" class="error"><?=admin::labels('subastas','titleerror');?></span>
				</td>
        </tr>
        <tr>
            <td width="5%" >Estado:</td>
            <td width="10%">
			<select name="rav_status" class="txt10" id="usr_status">
            	<option selected="selected" value="1"><?=admin::labels('active');?></option>
              	<option value="0"><?=admin::labels('inactive');?></option>
			</select>
			<span id="div_col_status" style="display:none;" class="error"></span>			</td>
                        <input name="rav_tipo" type="hidden" value="1" />
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
				<a href="" onclick="document.addRav.submit(); return false;" class="button">
				<?=admin::labels('register');?>
				</a> 
				</td>
          <td width="41%" style="font-size:11px;">
		  		<?=admin::labels('or');?> <a href="subastasRavList.php?token=<?=admin::getParam("token")?>" ><?=admin::labels('cancel');?></a> 
		  </td>
        </tr>
      </table></div>
      <br /><br />
<br />
<br />

      <br />
      <br />

