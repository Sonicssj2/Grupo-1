<?php

require 'functions.php';//funciones

//variables
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$tipo_documento=$_POST['tipo_documento'];
$numero_documento=$_POST['numero_documento'];
$contraseña=$_POST['contraseña'];
$curso=$_POST['curso'];
$division=$_POST['division'];
$email=$_POST['email'];

//codigo sql
$sel=SeleccionarNumeroDocumentoDeUsuariosConWhere($numero_documento);
$ins=InsertarUsuarios($nombre,$apellido,$tipo_documento,$numero_documento,$contraseña,$curso,$division,$email);

//conexión
$link=mysqli_connect('127.0.0.1','root','','chacawiki');

//variables de conexión
$rs_s=mysqli_query($link,$sel);
$numero_documento=mysqli_fetch_row($rs_s);

//si $numero_documento es NULL significa que el usuario no esta registrado, de lo contrario, no se llevara a cabo el
//INSERT
if ($numero_documento==NULL) {
	$rs_i=mysqli_query($link,$ins);
	mysqli_close($link);//cierrre de conexión
	if ($rs_i) {
		echo '<p align="center">Usuario registrado</p>';
	}
	else{
		echo '<p align="center">Error al registrar usuario</p>';
	}
}
else {
	mysqli_close($link);//cierrre de conexión
	echo '<p align="center">Usuario existente</p>';
}
echo '<a href="../Paginas/index.htm">Iniciar sesión</a>';

?>