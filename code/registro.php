<?php
$uidClient = admin::getSession("uidClient");
if($uidClient){
$sql = "select cli_socialreason
      ,cli_interno
      ,cli_user
      ,cli_mainemail
      ,cli_legalname
      ,cli_legallastname
      ,cli_mainemail from mdl_client where cli_uid=$uidClient";
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
                                                  <label>Raz&oacute;n social:</label><input name="socialreason" id="socialreason" type="text" value="<?=$client["cli_socialreason"]?>" onKeyUp="if (event.keyCode==13) document.getElementById('socialreason').focus();"/> </p><div class="clear"></div>
                          <p>
						  <label>Codigo interno:</label><input name="interno" id="interno" type="text" value="<?=$client["cli_interno"]?>" onKeyUp="if (event.keyCode==13) document.getElementById('interno').focus();"/> </p><div class="clear"></div>
                        <p>
					  <label>Usuario:</label><input name="user" id="user" type="text" value="<?=$client["cli_user"]?>" onKeyUp="if (event.keyCode==13) document.getElementById('user').focus();"/> 
                        </p>
                        <p>
                            <label>Contrase&ntilde;a:</label><input name="pass" id="pass" type="password" value="" onKeyUp="if (event.keyCode==13) document.getElementById('email').focus();"/> 
                        </p>
                        
                        <div class="clear"></div>
                        <p>
						  <label>Correo eletr&oacute;nico:</label><input name="mainemail" id="mainemail" type="text" value="<?=$client["cli_mainemail"]?>" onKeyUp="if (event.keyCode==13) document.getElementById('mainemail').focus();"/> </p><div class="clear"></div>
						<p>
						  <label>Nombre (Representante):</label>
						  <input name="legalname" id="legalname" type="text" value="<?=$client["cli_legalname"]?>" onKeyUp="if (event.keyCode==13) document.getElementById('legalname').focus();"/> </p><div class="clear"></div>
                          <p>
						  <label>Apellido (Representante):</label>
						  <input name="legallastname" id="legallastname" type="text" value="<?=$client["cli_legallastname"]?>" onKeyUp="if (event.keyCode==13) document.formLabel.submit();"/> </p><div class="clear"></div>
                          <input name="idUser" id="idUser" type="hidden" value="<?=$uidClient?>">
                        <a href="login" onClick="return alta();" class="addcart">Continuar</a>
						<!--<p><label>C&oacute;digo de seguridad:</label><input name="password" id="password" value="" /></p>--><div class="clear"></div><label id="message" class="red"></label>
						</form>
                    </div>
				</div>
			</div>