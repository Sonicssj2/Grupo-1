<?php

function SeleccionarNumeroDocumentoDeUsuariosConWhere($numero_documento){
	return "CALL SeleccionarNumeroDocumentoDeUsuariosConWhere($numero_documento)";
}

function SeleccionarContraseñaDeUsuariosConWhere($numero_documento){
	return "CALL SeleccionarContraseñaDeUsuariosConWhere($numero_documento)";
}

function SeleccionarArchivosConWhere($ruta_archivo){
	return "CALL SeleccionarArchivosConWhere($ruta_archivo)";
}

function SeleccionarMaterias(){
	return "CALL SeleccionarMaterias()";
}

function SeleccionarArchivos(){
	return "CALL SeleccionarArchivos()";
}

function InsertarUsuarios($nombre,$apellido,$tipo_documento,$numero_documento,$contraseña,$curso,$division,$email){
	return "CALL InsertarUsuarios($nombre,$apellido,$tipo_documento,$numero_documento,$contraseña,$curso,$division,$email)";
}

function InsertarArchivos($ruta_archivo,$nombre_archivo,$tipo_archivo){
	return "CALL InsertarArchivos($ruta_archivo,$nombre_archivo,$tipo_archivo)";
}

function ActualizarArchivos($ruta_archivo,$nombre_archivo,$tipo_archivo){
	return "CALL ActualizarArchivos($ruta_archivo,$nombre_archivo,$tipo_archivo)";
}

?>