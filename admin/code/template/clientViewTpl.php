<script language="javascript" type="text/javascript">
function verifyImageUpload()
	{
	document.getElementById('div_cli_photo').style.display="none";
	var cv = document.getElementById('cli_photo').value;
	var filepart = cv.split(".");
	var part = filepart.length-1;
	var extension = filepart[part];
	extension = extension.toLowerCase();
	if (extension!='jpg' && extension!='jpeg' && extension!='bmp' && extension!='gif' && extension!='png')	
		{
		document.getElementById('cli_photo').value="";
		$('#div_cli_photo').fadeIn(500);
		}
	}
</script>	
<?php
$cli_uid=admin::toSql($_REQUEST["mcl_uid"],"String");
$sql = "select * from mdl_client where cli_uid=".$cli_uid;
$db->query($sql);
$regusers = $db->next_record();
?>
<br />
<form name="frmClient" method="post" action="code/execute/clientUpd.php?token=<?=admin::getParam("token");?>" onsubmit="return false;" enctype="multipart/form-data">
<input type="hidden" name="cli_uid" value="<?=$regusers["cli_uid"]?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="77%" height="40"><span class="title"><?=admin::labels('client','clientedit');?></span></td>
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
            <td width="29%">Nombre de la empresa:</td>
            <td width="64%"><?=$regusers["cli_companyname"]?>
<br /><span id="div_cli_companyname" style="display:none;" class="error">Nombre de la empresa es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Raz&oacute;n social de la empresa:</td>
            <td width="64%"><?=$regusers["cli_socialreason"]?><br /><span id="div_cli_socialreason" style="display:none;" class="error">Raz&oacute;n social es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Usuario:</td>
            <td width="64%"><?=$regusers["cli_user"]?><br /><span id="div_cli_user" style="display:none;" class="error">Usuario es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          
		   <tr>
            <td width="29%"><?=admin::labels('login','password');?>:</td>
            <td width="64%"><span id="deltag">************</td>
            <td width="7%"><a href="pass" id="linkpass" style="display:none;" onClick="return generarPassword(this.form,'cli_pass',5);">Generar</a>&nbsp;</td>
          </tr>
		  <tr>
            <td width="29%"><?=admin::labels('firstname');?>:</td>
            <td width="64%"><?=$regusers["cli_firstname"]?><br /><span id="div_cli_firstname" style="display:none;" class="error">Nombre es necesario</span></td>
            <td width="7%">&nbsp;</td>
          </tr>
		  <tr>
            <td width="29%"><?=admin::labels('lastname');?>:</td>
            <td width="64%"><?=$regusers["cli_lastname"]?><br /><span id="div_cli_lastname" style="display:none;" class="error">Apellido es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          <tr>
            <td><?=admin::labels('email');?>: </td>
            <td><?=$regusers["cli_email"]?><br /><span id="div_cli_email" style="display:none;" class="error">Email es necesario</span>
			<span id="div_cli_email" style="display:none;" class="error"></span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td valign="top"><?=admin::labels('news','image');?>:</td>
            <td>
			<?php
			$imgSavedroot1 = PATH_ROOT."/img/client/thumb_".$regusers["cli_photo"];
			$imgSaveddomain1 = PATH_DOMAIN."/img/client/thumb_".$regusers["cli_photo"];
			$imgSaveddomain2 = PATH_DOMAIN."/img/client/img_".$regusers["cli_photo"];
			if (file_exists($imgSavedroot1) && $regusers["cli_photo"]!=""){
			?>
			<div id="image_edit_<?=$regusers["cli_uid"]?>">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableUpload">
			<tr>
				<td width="25%" rowspan="2" align="center" valign="middle" style="padding:4px;">
				<a href="<?=$imgSaveddomain2?>" target="_blank"><img src="<?=$imgSaveddomain1?>?<?=time();?>" border="0" /></a>				</td>
				<td width="75%" style="font-size:11px;">
				<?=$regusers["cli_firstname"];?><br />
				</td>
			</tr>
			<tr>
				<td height="24">
				<div id="imageChange1" style="display:none">
			<input type="file" name="cli_photo" id="cli_photo" size="14" onchange="verifyImageUpload();" style="font-size:11px;"  >  <a href="javascript:viewInputFile('off')" onclick="document.getElementById('cli_photo').value='';document.getElementById('button_next').innerHTML='<?=admin::labels('public');?>';"><img border="0" src="lib/close.gif" align="top"/></a>
			
			<span id="div_cli_photo" class="error" style="display:none">Solo archivos jpg bmp gif png</span></div></td>
			</tr>
			</table>
			</div>
			<div id="image_add_<?=$regusers["cli_uid"]?>" style="display:none;"></div>
			<?php	}
		 ?>			</td>
          </tr>
          <tr>
            <td><?=admin::labels('status');?>:</td>
            <td><?php if($regusers["cli_status"]=='ACTIVE') echo "Activo"; else echo "Inactivo"; ?>
			<span id="div_cli_status" style="display:none;" class="error"></span>			</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="50%" colspan="2" valign="top"><table width="98%" border="0" cellpadding="5" cellspacing="5" class="box">
     </table></td></tr>
</table>
</td></tr></table>
	  </form>
<br />      
 <div id="contentButton">
	  	<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="100%" align="center">
                <a href="clientList.php?token=<?=admin::getParam("token")?>"  class="button">Volver</a>
				</td>
          
        </tr>
      </table></div>
<br /><br /><br />
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calendario/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>