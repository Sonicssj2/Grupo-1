<?php

//inicia la sesion
session_start();

//guarda la id de la sesion
$sid=session_id();

require 'AccesoADatos.php';

//variables
$numero_documento=$_POST['numero_documento'];
$tipo_documento=$_POST['tipo_documento'];

//variable de sesion
$_SESSION["numero_documento"]=$numero_documento;
$_SESSION["tipo_documento"]=$$tipo_documento=$_POST['tipo_documento'];


//se instancia el objeto de conexion y se ejecuta la consulta
$conexion=new AccesoADatos(H,U,P,D,"CALL SeleccionarContraseña($numero_documento,'$tipo_documento')");
$conexion->connect();
$conexion->query();

//variable de query
$contraseña=$conexion->fetch(MYSQLI_NUM);

//verifica que la contraseña del usuario ingresado es correcta
if($contraseña!=NULL){
	if($contraseña[0][0]==$_POST['contraseña']){
		header("location:Materia.php?sid=$sid");
	}
	else{
		echo "<p align='center'>Error al validar la contraseña</p>";
	}
}
else{
	echo "<p align='center'>No se encuentra el usuiario</p>";
}
echo "<div align='center'><a href='../Paginas/index.htm'>Volver</a></div>";

?>