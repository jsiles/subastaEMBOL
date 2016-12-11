// JavaScript Document


function checkedVerify(parent){
	var sw=false;

	var collection = document.getElementsByName(parent+'[]');
	for(i=0 ; i<collection.length;i++){
			if(collection.item(i).checked==true)
				sw=true
	}

	var interiores = document.getElementsByName(parent+'[interior][]');
	for(i=0 ; i<interiores.length;i++){
				if(interiores.item(i).checked==true)
					sw=true
	}

	if(sw)	
		document.getElementById( parent ).checked=true;
	else
		document.getElementById( parent ).checked=false;
}


function checkAll(parent){
    if(document.getElementById(parent).checked)
		new_status = true;
	else 
		new_status= false;
		
	var collection = document.getElementsByName(parent+'[]');
	for(i=0 ; i<collection.length;i++){
			collection.item(i).checked=new_status;
	}
	
	var interiores = document.getElementsByName(parent+'[interior][]');
	for(i=0 ; i<interiores.length;i++){
				interiores.item(i).checked=new_status;
	}
}

function verifyRoles(){
   
  	x= $('#rol_name').val();
	valor= /^[a-zA-Z0-9 áéíóúAÉÍÓÚÑñ\.,;:\|)"(º_@><#&'\?¿¡!/\\%\$=]*$/
	  if(!valor.test(x) || x==''){
		$('#div_rol_name').fadeIn(600);
		 return;
    	}
	else{
		document.frmRoles.submit();	
    }	
		
}

$(document).ready(function(){

});
