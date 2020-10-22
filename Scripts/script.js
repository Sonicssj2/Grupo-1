/*constantes*/
const DNI="DNI";
const LC="LC";
const LE="LE";
const CERO=0;
const UNO=1;
//
//
/*funciones*/
function rango_documento(tipo_documento,id_tag){
	if (tipo_documento==DNI) {
		max_min_de_rango_documento(99999999,10000000,id_tag);
	}
	else{
		if (tipo_documento==LC||tipo_documento==LE) {
			max_min_de_rango_documento(7999999,UNO,id_tag);
		}
		else{
			max_min_de_rango_documento(9999999999,UNO,id_tag);
		}
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
function materia_verde_logo(mat,materias,id_mat,id_img,id_desc){
	if (mat=="") {
		mat_img("Seleccione una materia ","../Imagenes/chaca.png","",id_mat,id_img,id_desc);
	}
	else{
		for(let f=0;f<materias.length;f++){
			if (materias[f][0]==mat) {
				mat_img(mat+' ',"../Imagenes/"+mat+".png",materias[f][1],id_mat,id_img,id_desc);
				break;
			}
		}
	}

}
//
//
function mat_img(mat,img,desc,id_mat,id_img,id_desc){
	document.getElementById(id_mat).innerHTML=mat;
	document.getElementById(id_img).src=img;
	document.getElementById(id_desc).innerText=desc;
}
//
//
function valida_texto(id){
	var texto=document.getElementById(id).value;
	var texto_length=texto.length;
	var error;
	var incorrecto=false;
	for (var a=CERO;a<texto_length;a++) {
		if (/^[a-zA-Zá-úÁ-Ú]/.test(texto[a])==false) {
			error=texto[a];
			incorrecto=true;
			break;
		}
	}
	if (incorrecto) {
		document.getElementById(id).value=texto.split(error)[CERO]+texto.split(error)[UNO];
	}
}