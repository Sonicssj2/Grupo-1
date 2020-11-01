/*funciones*/
function rango_documento(tipo_documento,id_tag){
	switch(tipo_documento){
		case "DNI":
			max_min_de_rango_documento(99999999,10000000,id_tag);
			break;
		case "":
			max_min_de_rango_documento(9999999999,1,id_tag);
			break;
		default:
			max_min_de_rango_documento(7999999,1,id_tag);
			break;
	}
}
//
//
function max_min_de_rango_documento(max,min,id_tag){
	document.getElementById(id_tag).max=max;
	document.getElementById(id_tag).min=min;
}
//
//
function valida_texto(id){
	texto=document.getElementById(id).value;
	texto_length=texto.length;
	incorrecto=false;
	for (a=0;a<texto_length;a++){
		if (/^[a-zA-Zá-úÁ-Ú]/.test(texto[a])==false){
			error=texto[a];
			incorrecto=true;
			break;
		}
	}
	if(incorrecto){
		document.getElementById(id).value=texto.split(error)[CERO]+texto.split(error)[UNO];
	}
}
//
//
function recurso_form(tipo_recurso,recurso,recurso_lbl){
	switch(tipo_recurso){
		case "ENLACE":
			recurso.type="url";
			recurso_lbl.innerText="Ruta:";
		break;
		
		case "":
			recurso.type="hidden";
			recurso_lbl.innerText="";
		break;

		default:
			recurso.type="file";
			recurso_lbl.innerText="";
		break;
	}
}
//
//
function subir_archivo(materia_recurso){
	if(materia_recurso==""){
		alert("Seleccione una materia!");
		document.getElementById('materia').focus();
		ret=false;
	}
	else{
		ret=true;
	}

	return ret;
}