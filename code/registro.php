<div id="content">
				<div id="box6" class="box-style">
					<div class="title">
						<h2><span>Registro de usuarios</span></h2>
					</div>
					<div class="content">
						<p>Por favor ingrese sus datos, el sistema le enviar&aacute; un correo eletr&oacute;nico con sus datos.</p>
						<p>&nbsp;</p>
						<form name="formLabel" id="formLabel" class="formLabel" autocomplete="off" method="post">
						<p>
						  <label>Nombre de la empresa:</label><input name="companyName" id="companyName" type="text" value="" onKeyUp="if (event.keyCode==13) document.getElementById('reasonSocial').focus();"/> </p><div class="clear"></div>
                          <p>
						  <label>Raz&oacute;n social:</label><input name="reasonSocial" id="reasonSocial" type="text" value="" onKeyUp="if (event.keyCode==13) document.getElementById('user').focus();"/> </p><div class="clear"></div>
                        <p>
						  <label>Usuario:</label><input name="user" id="user" type="text" value="" onKeyUp="if (event.keyCode==13) document.getElementById('email').focus();"/> </p><div class="clear"></div>
                        <p>
						  <label>Correo eletr&oacute;nico:</label><input name="email" id="email" type="text" value="" onKeyUp="if (event.keyCode==13) document.getElementById('firstnameClient').focus();"/> </p><div class="clear"></div>
						<p>
						  <label>Nombre (Representante):</label>
						  <input name="firstnameClient" id="firstnameClient" type="text" value="" onKeyUp="if (event.keyCode==13) document.getElementById('lastnameClient').focus();"/> </p><div class="clear"></div>
                          <p>
						  <label>Apellido (Representante):</label>
						  <input name="lastnameClient" id="lastnameClient" type="text" value="" onKeyUp="if (event.keyCode==13) document.formLabel.submit();"/> </p><div class="clear"></div>
                        <a href="login" onClick="return alta();" class="addcart">Continuar</a>
						<!--<p><label>C&oacute;digo de seguridad:</label><input name="password" id="password" value="" /></p>--><div class="clear"></div><label id="message" class="red"></label>
						</form>
                    </div>
				</div>
			</div>