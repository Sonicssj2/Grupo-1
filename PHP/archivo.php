<?php

#error_reporting(E_ALL ^ E_NOTICE);//ELIMINAR NOTICE DEL SERVIDOR.

//sesión
session_start();

//variables
$replace=$_GET['replace'];
if($replace=="true"){
	$info=$_SESSION['info'];
	$ext=$_SESSION['ext'];
	$name=$_SESSION['name'];
	$newname=$_SESSION['newname'];
	$target=$_SESSION['target'];
	$fl=$_SESSION['fl'];
	$tipo_archivo=$_SESSION['tipo_archivo'];
}
else{
	$info=pathinfo($_FILES['archivo']['name']);
	$ext=$info['extension'];//Extencion del archivo
	$name=$_POST['nombre'];
	$newname=$name.'.'.$ext;
	$target='../Archivos/'.$newname;
	$fl=$_FILES['archivo']['tmp_name'];
	$tipo_archivo=$_POST["tipo_archivo"];
	
	//variables de sesión
	$_SESSION['info']=$info;
	$_SESSION['ext']=$ext;
	$_SESSION['name']=$name;
	$_SESSION['newname']=$newname;
	$_SESSION['target']=$target;
	$_SESSION['fl']=$fl;
	$_SESSION['tipo_archivo']=$tipo_archivo;
}
var_dump($fl,$target);

//código sql
$sel="SELECT ruta FROM archivos WHERE ruta LIKE '$target'";
$ins="INSERT INTO archivos VALUES('','$target','$name','$tipo_archivo')";
$upd="UPDATE archivos SET tipo_archivo='$tipo_archivo' WHERE ruta LIKE '$target'";

//conexión
$link=mysqli_connect('127.0.0.1','root','','chacawiki');

//variables de conexión
$rss=mysqli_query($link,$sel);//ejecuta query de SELECT

//variables (icluido free de mysqli result)
$ruta=mysqli_fetch_row($rss);
mysqli_free_result($rss);

//si ruta es igual a NULL significa que que el archivo a cargar no existe en la base de datos, por lo tanto se hace
//un INSERT, de lo contrario, depende de la variable $replace determinar si se decidió hacer el UPDATE o no
if($ruta==NULL){
	//$rs=($replace)?mysqli_query($link,$upd):mysqli_query($link,$ins);
	$rs=mysqli_query($link,$ins);//ejecuta query de INSERT
	mysqli_close($link);//cierre de conexión
	if($rs){
		move_uploaded_file($fl, $target);//guarda el archivo en la ruta especificada
		echo '<p align="center">Archivo cargado correctamente</p>';
	}
	else{
		echo '<p align="center">Error al cargar archivo</p>';
	}
	echo '<a href="Materia.php">Volver</a>';
}
else{
	if($replace=="true"){
		$rs=mysqli_query($link,$upd);//ejecuta query de UPDATE
		mysqli_close($link);//cierre de conexión
		if($rs){
			move_uploaded_file($fl, $target);//guarda el archivo en la ruta especificada
			echo '<p align="center">Archivo actualizado correctamente</p>';
		}
		else{
			echo '<p align="center">Error al actualizar archivo</p>';
		}
		echo '<a href="Materia.php">Volver</a>';
	}
	else{
		mysqli_close($link);//cierre de conexión
		echo '<p align="center">Archivo existente, <a href="archivo.php?replace=true">desea reemplazarlo?</a></p>';
	}
}

?>