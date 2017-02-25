// JavaScript Document
function login()
{
usernameClient = $("#usernameClient").val();
passwordClient = $("#passwordClient").val();

$.ajax({
   type: "POST",
   url: SERVER+"/code/session.php",
   data: "usernameClient="+usernameClient+"&passwordClient="+passwordClient,
   success: function(msg){
     document.location.href=msg;
   }
 });
	return false;
}
function altas(ruta)
{
	pass2 = $("#pass2").val();
	pass = $("#pass").val();
	idUser = $("#idUser").val();
	if((idUser.length>0)&&(pass.length>0)&&(pass2.length>0))
	{
		$.ajax({
   			type: "POST",
   			url: SERVER+"/code/userAdd.php",
  			data: "pass="+pass+"&pass2="+pass2+"&idUser="+idUser,
   			success: function(msg){
	     		$("#message").html(msg);
   			}
 		});
	}else{
		$("#message").html('Usuario, contrase&ntilde;a y/o correo electr&oacute;nico requeridos.');
	}
	 setTimeout(function () {
       window.location.href = ruta; //will redirect to your blog page (an ex: blog.html)
    }, 4000);
}