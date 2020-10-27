<?php

#error_reporting(E_ALL ^ E_NOTICE);//ELIMINAR NOTICE DEL SERVIDOR.

require 'functions.php';//funciones

//variables
$nombre=$_POST['nombre'];
$tipo_archivo=$_POST["tipo_archivo"];
if($tipo_archivo=="ENLACE"){
	$target=$_POST['archivo'];
}
else{
	$archivo=$_FILES['archivo'];
	$info=pathinfo($archivo['name']);
	$ext=$info['extension'];//Extencion del archivo
	$newname=$nombre.'.'.$ext;
	$target='../Archivos/'.$newname;
	$tmp_name=$archivo['tmp_name'];
}

//código sql
$sel=selectw("ruta","archivos","ruta",$target,true);
$ins=insert("archivos","'','$target','$nombre','$tipo_archivo'");
$upd=updatew("archivos","ruta='$target',nombre='$nombre',tipo_archivo='$tipo_archivo'","ruta",$target,true);

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
		($tipo_archivo=="ENLACE")?:move_uploaded_file($tmp_name, $target);//guarda el archivo en la ruta especificada
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
		($tipo_archivo=="ENLACE")?:move_uploaded_file($tmp_name, $target);//guarda el archivo en la ruta especificada
		echo '<p align="center">Archivo actualizado correctamente</p>';
	}
	else{
		echo '<p align="center">Error al actualizar archivo</p>';
	}
}
echo '<div align="center"><a href="Materia.php">Volver</a></div>';

?>