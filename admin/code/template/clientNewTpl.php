<br />
<form name="frmClient" method="post" action="code/execute/clientAdd.php?token=<?=admin::getParam("token");?>" onsubmit="return false;" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="77%" height="40"><span class="title">Crear proveedor</span></td>
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
               <td width="29%">NIT o CI:</td>
            <td width="64%">
<input name="cli_nit_ci" type="text" class="input" id="cli_nit_ci" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_nit_ci').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_nit_ci').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_nit_ci').style.display='none';" /><br /><span id="div_cli_nit_ci" style="display:none;" class="error">NIT o CI es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Clasificacion juridica:</td>
            <td width="64%">
            <select name="cli_lec_uid" class="txt10" id="cli_lec_uid">
                <? 
				$sql = "select lec_uid, lec_name from mdl_legalclassification where lec_delete=0";
					$db2->query($sql);
					while ($content=$db2->next_record())
					{
				?>
            	    <option value="<?=$content["lec_uid"]?>"><?=$content["lec_name"]?></option>	
              	<? 
					}
				?>
			</select><br /><span id="div_cli_lec_uid" style="display:none;" class="error">Clasificacion juridica es necesaria</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Razon social:</td>
            <td width="64%">
<input name="cli_socialreason" type="text" class="input" id="cli_socialreason" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_socialreason').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_socialreason').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_socialreason').style.display='none';" /><br /><span id="div_cli_socialreason" style="display:none;" class="error">Razon social es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Direccion legal:</td>
            <td width="64%">
<input name="cli_legaldirection" type="text" class="input" id="cli_legaldirection" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_legaldirection').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_legaldirection').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_legaldirection').style.display='none';" /><br /><span id="div_cli_legaldirection" style="display:none;" class="error">Direccion legal es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Telefono fijo:</td>
            <td width="64%">
<input name="cli_phone" type="text" class="input" id="cli_phone" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_phone').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_phone').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_phone').style.display='none';" /><br /><span id="div_cli_phone" style="display:none;" class="error">Telefono fijo es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Email administrativo:</td>
            <td width="64%">
<input name="cli_mainemail" type="text" class="input" id="cli_mainemail" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_mainemail').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_mainemail').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_mainemail').style.display='none';" /><br /><span id="div_cli_mainemail" style="display:none;" class="error">Email administrativo es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Email comercial:</td>
            <td width="64%">
<input name="cli_commercialemail" type="text" class="input" id="cli_commercialemail" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_commercialemail').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_commercialemail').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_commercialemail').style.display='none';" /><br /><span id="div_cli_commercialemail" style="display:none;" class="error">Email comercial es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Nombre Adm/legal:</td>
            <td width="64%">
<input name="cli_legalname" type="text" class="input" id="cli_legalname" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_legalname').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_legalname').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_legalname').style.display='none';" /><br /><span id="div_cli_legalname" style="display:none;" class="error">Nombre Adm/legal es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Apellido Adm/legal:</td>
            <td width="64%">
<input name="cli_legallastname" type="text" class="input" id="cli_legallastname" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_legallastname').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_legallastname').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_legallastname').style.display='none';" /><br /><span id="div_cli_legallastname" style="display:none;" class="error">Apellido Adm/legal es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Nombre comercial:</td>
            <td width="64%">
<input name="cli_commercialname" type="text" class="input" id="cli_commercialname" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_commercialname').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_commercialname').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_commercialname').style.display='none';" /><br /><span id="div_cli_commercialname" style="display:none;" class="error">Nombre comercial es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Nombre comercial:</td>
            <td width="64%">
<input name="cli_commercialname" type="text" class="input" id="cli_commercialname" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_commercialname').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_commercialname').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_commercialname').style.display='none';" /><br /><span id="div_cli_commercialname" style="display:none;" class="error">Nombre comercial es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Apellido comercial:</td>
            <td width="64%">
<input name="cli_commerciallastname" type="text" class="input" id="cli_commerciallastname" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_commerciallastname').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_commerciallastname').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_commerciallastname').style.display='none';" /><br /><span id="div_cli_commerciallastname" style="display:none;" class="error">Apellido comercial es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Usuario:</td>
            <td width="64%">
<input name="cli_user" type="text" class="input" id="cli_user" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_user').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_user').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_user').style.display='none';" /><br /><span id="div_cli_user" style="display:none;" class="error">Usuario es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Contrase&ntilde;a:</td>
            <td width="64%">
<input name="cli_pass" type="text" class="input" id="cli_pass" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_pass').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_pass').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_pass').style.display='none';" /><br /><span id="div_cli_pass" style="display:none;" class="error">Contrase&ntilde;a es necesario</span>			</td>
            <td width="7%"><a href="pass" onClick="return generarPassword(this.form,'cli_pass',5);">Generar</a>&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Forma de pago al proveedor:</td>
            <td width="64%">
            <select name="cli_lec_uid" class="txt10" id="cli_lec_uid">
                <? 
				$sql = "select pts_uid, pts_type from mdl_paymenttosupplier where pts_delete=0";
					$db2->query($sql);
					while ($content=$db2->next_record())
					{
				?>
            	    <option value="<?=$content["pts_uid"]?>"><?=$content["pts_type"]?></option>	
              	<? 
					}
				?>
			</select><br /><span id="div_cli_lec_uid" style="display:none;" class="error">Clasificacion juridica es necesaria</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Datos adicionales del pago:</td>
            <td width="64%">
<input name="cli_pts_description" type="text" class="input" id="cli_pts_description" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_pts_description').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_pts_description').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_pts_description').style.display='none';" /><br /><span id="div_cli_pts_description" style="display:none;" class="error">Datos adicionales del pago es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Documentacion:</td>
            <td width="64%">
                <? 
				$sql = "select doc_uid, doc_name from mdl_documents where doc_delete=0";
					$db2->query($sql);
					while ($content=$db2->next_record())
					{
				?>
            	    <input name="doc_uid[<?=$content["doc_uid"]?>]" type="checkbox" /><?=$content["doc_name"]?>	
              	<? 
					}
				?>
					</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
		  <tr>
            <td><?=admin::labels('status');?>:</td>
            <td>
			<select name="cli_status" class="txt10" id="cli_status">
            	<option selected="selected" value="1"><?=admin::labels('active');?></option>
              	<option value="0"><?=admin::labels('inactive');?></option>
			</select>
			<span id="div_cli_status" style="display:none;" class="error"></span>			</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="50%" valign="top">&nbsp;
        </td>
      </tr>
    </table></td>
    </tr>
</table>
	  </form>
      <br />
      <br />
      <div id="contentButton">
	  	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="59%" align="center">
				<a href="#" onclick="verifyClient();" class="button">
				<?=admin::labels('register');?>
				</a> 
				</td>
          <td width="41%" style="font-size:11px;">
		  		<?=admin::labels('or');?> <a href="clientList.php?token=<?=admin::getParam("token")?>" ><?=admin::labels('cancel');?></a> 
		  </td>
        </tr>
      </table></div>
<br /><br /><br />