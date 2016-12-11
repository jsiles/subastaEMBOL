// JavaScript Document
$(document).ready(function() {
subastaOpcion();

});

function subastaOpcion()
{
	valOpcion=$("#sub_modalidad").val();
switch(valOpcion)
{
	case 'TIEMPO': 
					$("#tr_numeroruedas").hide();
					$("#tr_montodead").hide();
					$("#tbl_subastaxitem").hide();
					break;
	case 'HOLANDESA': 
					$("#tr_numeroruedas").hide();
					$("#tr_montodead").show();
					if($("#sub_type").val()=='COMPRA') $("#montotype").html('Monto m&aacute;ximo');
					else $("#montotype").html('Monto m&iacute;nimo');
					$("#tbl_subastaxitem").hide();
					break;
	case 'JAPONESA': 
					$("#tr_numeroruedas").hide();
					$("#tr_montodead").hide();
					//if($("#sub_type").val()=='COMPRA') $("#montotype").html('Monto m&aacute;ximo');
					//else $("#montotype").html('Monto m&iacute;nimo');
					$("#tbl_subastaxitem").hide();
					break;

	case 'ITEM':
					$("#tr_numeroruedas").show();
					$("#tr_montodead").hide();
					$("#tr_montobase").hide();
					$("#tr_unidadmejora").hide();
					//if($("#sub_type").val()=='COMPRA') $("#montotype").html('Monto m&aacute;ximo');
					//else $("#montotype").html('Monto m&iacute;nimo');
					$("#tbl_subasta").hide();
					break;
	default:
					$("#tr_numeroruedas").hide();
					$("#tr_montodead").hide();
					$("#tbl_subastaxitem").hide();
					
	}
	
}

function verifyProduct()
{
	var sw=false;
	
	if($("#pro_product").val()) sw=true;
	if($("#pro_description").val()) sw=true;
	if($("#pro_cli_id").val()) sw=true;
	if($("#pro_precio").val()) sw=true;
	
	if(sw) document.frmIncoterm.submit();
	else return false;
	}