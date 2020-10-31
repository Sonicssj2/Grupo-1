<?php

//inicia la sesion
session_start();

//guarda la id de la sesion
$sid=session_id();

require 'functions.php';

//variables
$numero_documento=$_POST['numero_documento'];
$contraseña_post=$_POST['contraseña'];

//variable de sesion
$_SESSION["numero_documento"]=$numero_documento;

//codigo sql
$select="CALL SeleccionarContraseña($numero_documento)";

//respuesta de query
$rs=connect($select);

//variable de query
$contraseña=mysqli_fetch_row($rs);

//respuesta liberada
mysqli_free_result($rs);

//verifica que la contraseña del usuario ingresado es correcta
if($contraseña!=NULL){
	if($contraseña[0]==$contraseña_post){
		header("location:Materia.php?sid=$sid");
	}
	else{
		echo '<p align="center">Error al validar la contraseña</p>';
	}
}
else{
	echo '<p align="center">No se encuentra el usuiario</p>';
}
echo '<div align="center"><a href="'.$_SERVER['HTTP_REFERER'].'">Volver</a></div>'

?>