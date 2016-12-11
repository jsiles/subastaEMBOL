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
if((user.length>0)&&((email.length>0)))
{
$.ajax({
   type: "POST",
   url: SERVER+"/code/userAdd.php",
   data: "companyName="+companyName+"&reasonSocial="+reasonSocial+"&user="+user+"&email="+email+"&firstnameClient="+firstnameClient+"&lastnameClient="+lastnameClient,
   success: function(msg){
     document.location.href=msg;
   }
 });
}else{
	$("#message").html('Usuario y Correo electr&oacute;nico requeridos.');
	}
	return false;
}