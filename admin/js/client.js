// JavaScript Document
function verifyClient()
{
	sw=true;
	document.getElementById('div_cli_nit_ci').style.display='none';
	document.getElementById('div_cli_user').style.display='none';
	document.getElementById('div_cli_pass').style.display='none';
	document.getElementById('div_cli_socialreason').style.display='none';
	document.getElementById('div_cli_mainemail').style.display='none';
	document.getElementById('div_cli_interno').style.display='none';
	document.getElementById('div_cli_legalname').style.display='none';
	document.getElementById('div_cli_legallastname').style.display='none';

	if (document.getElementById('cli_nit_ci').value==''){
		document.getElementById('cli_nit_ci').className='inputError';
		document.getElementById('div_cli_nit_ci').style.display='';
		sw=false;
	}
		
	if (document.getElementById('cli_user').value==''){
		document.getElementById('cli_user').className='inputError';
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
	
	if (document.getElementById('cli_interno').value==''){
		document.getElementById('cli_interno').className='inputError';
		document.getElementById('div_cli_interno').style.display='';
		sw=false;
	}
	
	if (document.getElementById('cli_legalname').value==''){
		document.getElementById('cli_legalname').className='inputError';
		document.getElementById('div_cli_legalname').style.display='';
		sw=false;
	}
		
	if (document.getElementById('cli_legallastname').value==''){
		document.getElementById('cli_legallastname').className='inputError';
		document.getElementById('div_cli_legallastname').style.display='';
		sw=false;
	}
	
	if (sw){
		document.frmClient.submit();
	}
	else{
		scroll(0,0);
	}
}

function nal2(flag)
{
	if(flag==1){
		$('#nal2').show();
		$('#aal2').show();
		$('#l2a').hide();
		$('#l2b').show();	
	}
	else{
		$('#nal2').hide();
		$('#aal2').hide();
		$('#l2a').show();
		$('#l2b').hide();
		$('#nal3').hide();
		$('#aal3').hide();
		$('#l3a').show();
		$('#l3b').hide();
	}
}

function nal3(flag)
{
	if(flag==1){
		$('#nal3').show();
		$('#aal3').show();
		$('#l3a').hide();
		$('#l3b').show();	
	}
	else{
		$('#nal3').hide();
		$('#aal3').hide();
		$('#l3a').show();
		$('#l3b').hide();
	}
}

function checkinOut()
{
	if(document.getElementById('cli_doc_uid[10]').checked){
		$(".subDocs").attr("checked", "true");
	}
	else{
		$(".subDocs").attr("checked", "");
	}
}
