// JavaScript Document
function objectAjax()
	{
	var xmlhttp=false;
	try 
		{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} 
	catch (e) 
		{
		try 
			{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} 
		catch (E) 
			{
			xmlhttp = false;
			}
		}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') 
		{
  		xmlhttp = new XMLHttpRequest();
  		}
  	return xmlhttp;
  	}
function isMail(texto)
	{ 
	var mailres = true;             
	var cadena = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890@._-"; 
	 
	var arroba = texto.indexOf("@",0); 
	if ((texto.lastIndexOf("@")) != arroba) arroba = -1; 
	 
	var punto = texto.lastIndexOf("."); 
				 
	for (var contador = 0 ; contador < texto.length ; contador++)
		{ 
		if (cadena.indexOf(texto.substr(contador, 1),0) == -1)
			{ 
			mailres = false; 
			break; 
		 	} 
		} 	
	if ((arroba > 1) && (arroba + 1 < punto) && (punto + 2 < (texto.length)) && (mailres == true) && (texto.indexOf("..",0) == -1)) 
		 mailres = true; 
	else 
		 mailres = false; 
	return mailres; 
	} 
function valOfert()
{
		domain=document.getElementById('domain').value;
		uid=document.getElementById('uid').value;
		ofert=document.getElementById('ct_value').value;
		$('#planCuentas').attr('href',domain+'/code/bids.php?uid='+uid+'&ofert='+ofert);

}

function valOfertIt()
{
		domain=document.getElementById('domain').value;
		uid=document.getElementById('uid').value;
		ofert=document.getElementById('ct_value').value;
		$('#planCuentas').attr('href',domain+'/code/bidsIt.php?uid='+uid+'&ofert='+ofert);

}