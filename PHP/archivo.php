<?php

#error_reporting(E_ALL ^ E_NOTICE);//ELIMINAR NOTICE DEL SERVIDOR.

require 'functions.php';//funciones

//variables
$nombre_archivo=$_POST['nombre'];
$tipo_archivo=$_POST["tipo_archivo"];
if($tipo_archivo=="ENLACE"){
	$ruta_archivo=$_POST['archivo'];
}
else{
	$archivo=$_FILES['archivo'];
	$info=pathinfo($archivo['name']);
	$ext=$info['extension'];//Extencion del archivo
	$newname=$nombre_archivo.'.'.$ext;
	$ruta_archivo='../Archivos/'.$newname;
	$tmp_name=$archivo['tmp_name'];
}

//código sql
$sel=SeleccionarArchivosConWhere($ruta_archivo);
$ins=InsertarArchivos($ruta_archivo,$nombre_archivo,$tipo_archivo);
$upd=ActualizarArchivos($ruta_archivo,$nombre_archivo,$tipo_archivo);

//conexión
$link=mysqli_connect('127.0.0.1','root','','chacawiki');

//variables de conexión
$rss=mysqli_query($link,$sel);//ejecuta query de SELECT

//variables (icluido free de mysqli result)
$ruta=mysqli_fetch_row($rss);
mysqli_free_result($rss);

//si ruta es igual a NULL significa que que el archivo a cargar no existe en la base de datos, por lo tanto se hace
//un INSERT, de lo contrario, se hace un UPDATE
if($ruta==NULL){
	$rs=mysqli_query($link,$ins);//ejecuta query de INSERT
	mysqli_close($link);//cierre de conexión
	if($rs){
		($tipo_archivo=="ENLACE")?:move_uploaded_file($tmp_name, $ruta_archivo);//guarda el archivo en la ruta especificada
		echo '<p align="center">Archivo cargado correctamente</p>';
	}
	else{
		echo '<p align="center">Error al cargar archivo</p>';
	}
}
else{
	$rs=mysqli_query($link,$upd);//ejecuta query de UPDATE
	mysqli_close($link);//cierre de conexión
	if($rs){
		($tipo_archivo=="ENLACE")?:move_uploaded_file($tmp_name, $ruta_archivo);//guarda el archivo en la ruta especificada
		echo '<p align="center">Archivo actualizado correctamente</p>';
	}
	else{
		echo '<p align="center">Error al actualizar archivo</p>';
	}
}
echo '<div align="center"><a href="Materia.php">Volver</a></div>';

?>