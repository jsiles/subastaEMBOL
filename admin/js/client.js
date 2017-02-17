// JavaScript Document
function verifyClient()
{
	sw=true;
	document.getElementById('div_cli_nit_ci').style.display='none';
	document.getElementById('div_cli_user').style.display='none';
	document.getElementById('div_cli_pass').style.display='none';
	document.getElementById('div_cli_socialreason').style.display='none';
	document.getElementById('div_cli_mainemail').style.display='none';
	
	if (document.getElementById('cli_nit_ci').value==''){
		document.getElementById('cli_nit_ci').className='inputError';
		document.getElementById('div_cli_nit_ci').style.display='';
		sw=false;
	}
		
	if (document.getElementById('cli_user').value==''){
		document.getElementById('cli_cli_user').className='inputError';
		document.getElementById('div_cli_user').style.display='';
		sw=false;
	}
	
	if (document.getElementById('cli_pass').value==''){
		document.getElementById('cli_pass').className='inputError';
		document.getElementById('div_cli_pass').style.display='';
		sw=false;
	}
	
	if (document.getElementById('cli_socialreason').value==''){
		document.getElementById('cli_socialreason').className='inputError';
		document.getElementById('div_cli_socialreason').style.display='';
		sw=false;
	}
	
	if (document.getElementById('cli_mainemail').value==''){
		document.getElementById('cli_mainemail').className='inputError';
		document.getElementById('div_cli_mainemail').style.display='';
		sw=false;
	}
	
	if (sw){
		document.frmClient.submit();
	}
	else{
		scroll(0,0);
	}
}