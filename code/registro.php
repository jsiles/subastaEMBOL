<?php
$uidClient = admin::getSession("uidClient");
if($uidClient){
$sql = "select cli_companyname
      ,cli_socialreason
      ,cli_user
      ,cli_pass
      ,cli_firstname
      ,cli_lastname
      ,cli_email from mdl_client where cli_uid=$uidClient";
$db->query($sql);
$client = $db->next_record();
}
?>
<div id="content">
				<div id="box6" class="box-style">
					<div class="title">
                                            <h2><span>Registro/Actualizaci&oacute;n de datos</span></h2>
					</div>
					<div class="content">
						<p>&nbsp;</p>
						<form name="formLabel" id="formLabel" class="formLabel" autocomplete="off" method="post">
						<p>
                                                  <label>Nombre de la empresa:</label><input name="companyName" id="companyName" type="text" value="<?=$client["cli_companyname"]?>" onKeyUp="if (event.keyCode==13) document.getElementById('reasonSocial').focus();"/> </p><div class="clear"></div>
                          <p>
						  <label>Raz&oacute;n social:</label><input name="reasonSocial" id="reasonSocial" type="text" value="<?=$client["cli_socialreason"]?>" onKeyUp="if (event.keyCode==13) document.getElementById('user').focus();"/> </p><div class="clear"></div>
                        <p>
					  <label>Usuario:</label><input name="user" id="user" type="text" value="<?=$client["cli_user"]?>" onKeyUp="if (event.keyCode==13) document.getElementById('pass').focus();"/> 
                        </p>
                        <p>
                            <label>Contrase&ntilde;a:</label><input name="pass" id="pass" type="password" value="" onKeyUp="if (event.keyCode==13) document.getElementById('email').focus();"/> 
                        </p>
                        
                        <div class="clear"></div>
                        <p>
						  <label>Correo eletr&oacute;nico:</label><input name="email" id="email" type="text" value="<?=$client["cli_email"]?>" onKeyUp="if (event.keyCode==13) document.getElementById('firstnameClient').focus();"/> </p><div class="clear"></div>
						<p>
						  <label>Nombre (Representante):</label>
						  <input name="firstnameClient" id="firstnameClient" type="text" value="<?=$client["cli_firstname"]?>" onKeyUp="if (event.keyCode==13) document.getElementById('lastnameClient').focus();"/> </p><div class="clear"></div>
                          <p>
						  <label>Apellido (Representante):</label>
						  <input name="lastnameClient" id="lastnameClient" type="text" value="<?=$client["cli_lastname"]?>" onKeyUp="if (event.keyCode==13) document.formLabel.submit();"/> </p><div class="clear"></div>
                          <input name="idUser" id="idUser" type="hidden" value="<?=$uidClient?>">
                        <a href="login" onClick="return alta();" class="addcart">Continuar</a>
						<!--<p><label>C&oacute;digo de seguridad:</label><input name="password" id="password" value="" /></p>--><div class="clear"></div><label id="message" class="red"></label>
						</form>
                    </div>
				</div>
			</div>