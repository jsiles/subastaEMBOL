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
function alta()
{
companyName = $("#companyName").val();
reasonSocial = $("#reasonSocial").val();
user = $("#user").val();
email= $("#email").val();
firstnameClient = $("#firstnameClient").val();
lastnameClient = $("#lastnameClient").val();
pass = $("#pass").val();
idUser = $("#idUser").val();
if((user.length>0)&&(pass.length>0)&&((email.length>0)))
{

 $("#companyName").val('');
 $("#reasonSocial").val('');
 $("#user").val('');
 $("#email").val('');
 $("#firstnameClient").val('');
 $("#lastnameClient").val('');
 $("#pass").val('');
 
 
$.ajax({
   type: "POST",
   url: SERVER+"/code/userAdd.php",
   data: "companyName="+companyName+"&reasonSocial="+reasonSocial+"&user="+user+"&email="+email+"&firstnameClient="+firstnameClient+"&lastnameClient="+lastnameClient+"&pass="+pass+"&idUser="+idUser,
   success: function(msg){
     //document.location.href=msg;
     $("#message").html(msg);
   }
 });
}else{
	$("#message").html('Usuario, contrase&ntilde;a y/o correo electr&oacute;nico requeridos.');
	}
	return false;
}