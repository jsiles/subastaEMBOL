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
               <td width="29%">C&oacute;digo de la empresa:</td>
            <td width="64%">
<input name="cli_companyname" type="text" class="input" id="cli_companyname" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_companyname').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_companyname').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_companyname').style.display='none';" /><br /><span id="div_cli_companyname" style="display:none;" class="error">Nombre de la empresa es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="29%">Raz&oacute;n social de la empresa:</td>
            <td width="64%">
<input name="cli_socialreason" type="text" class="input" id="cli_socialreason" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_socialreason').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_socialreason').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_socialreason').style.display='none';" /><br /><span id="div_cli_socialreason" style="display:none;" class="error">Raz&oacute;n social es necesario</span>			</td>
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
            <td width="29%"><?=admin::labels('firstname');?> (Representante):</td>
            <td width="64%">
<input name="cli_firstname" type="text" class="input" id="cli_firstname" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_firstname').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_firstname').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_firstname').style.display='none';" /><br /><span id="div_cli_firstname" style="display:none;" class="error">Nombre es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
		  
          <tr>
            <td width="29%"><?=admin::labels('lastname');?> (Representante):</td>
            <td width="64%">
<input name="cli_lastname" type="text" class="input" id="cli_lastname" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_lastname').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_lastname').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_lastname').style.display='none';" /><br /><span id="div_cli_lastname" style="display:none;" class="error">Apellido es necesario</span>			</td>
            <td width="7%">&nbsp;</td>
          </tr>
          
          
          
          
          
          <tr>
            <td><?=admin::labels('email');?>: </td>
            <td>			
			<input name="cli_email" type="text" class="input" id="cli_email" size="60" onfocus="setClassInput(this,'ON');document.getElementById('div_cli_email').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cli_email').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cli_email').style.display='none';" /><br /><span id="div_cli_email" style="display:none;" class="error">Email es necesario</span>
			<span id="div_cli_email" style="display:none;" class="error"></span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="29%"><?=admin::labels('photo');?>:</td>
            <td width="64%">
<input name="cli_photo" type="file" id="cli_photo" class="txt10" size="45" />
<br /><span id="div_cli_photo" style="display:none;" class="error">Nombre del contenido es necesario</span>			</td>
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