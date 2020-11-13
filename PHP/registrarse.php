<?php

require 'AccesoADatos.php';

//variables
$nombre="'$_POST[nombre]'";
$apellido="'$_POST[apellido]'";
$tipo_documento="'$_POST[tipo_documento]'";
$numero_documento_post=$_POST['numero_documento'];
$contraseña="'$_POST[contraseña]'";
$curso=$_POST['curso'];
$division=$_POST['division'];
$email="'$_POST[email]'";

//se instancia el objeto de conexion y se ejecuta la consulta
$conexion=new conexion(H,U,P,D,"CALL SeleccionarNumeroDocumento($numero_documento_post)");

//variable de query
$numero_documento=$conexion->fetch();

//si $numero_documento es NULL significa que el usuario no esta registrado, de lo contrario, no se llevara a cabo el
//INSERT
if ($numero_documento==NULL) {
	if (connect("CALL InsertarUsuarios($nombre,$apellido,$tipo_documento,$numero_documento_post,$contraseña,$curso,$division,$email)")) {
		echo "<p align='center'>Usuario registrado</p>";
	}
	else{
		echo "<p align='center'>Error al registrar usuario</p>";
	}
}
else {
	echo "<p align='center'>Usuario existente</p>";
}
echo "<div align='center'><a href='../Paginas/index.htm'>Iniciar sesión</a><div>";

?>