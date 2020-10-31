<?php

require 'functions.php';

//variables
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$tipo_documento=$_POST['tipo_documento'];
$numero_documento_post=$_POST['numero_documento'];
$contraseña=$_POST['contraseña'];
$curso=$_POST['curso'];
$division=$_POST['division'];
$email=$_POST['email'];

//codigo sql
$select="CALL SeleccionarNumeroDocumento($numero_documento_post)";
$insert="CALL InsertarUsuarios('$nombre','$apellido','$tipo_documento',$numero_documento_post,'$contraseña',$curso,$division,'$email')";

//respuesta de query
$rs_select=connect($select);

//variable de query
$numero_documento=mysqli_fetch_row($rs_select);

//respuesta liberada
mysqli_free_result($rs_select);

//si $numero_documento es NULL significa que el usuario no esta registrado, de lo contrario, no se llevara a cabo el
//INSERT
if ($numero_documento==NULL) {
	$rs_insert=connect($insert);
	if ($rs_insert) {
		echo '<p align="center">Usuario registrado</p>';
	}
	else{
		echo '<p align="center">Error al registrar usuario</p>';
	}
}
else {
	echo '<p align="center">Usuario existente</p>';
}
echo '<a href="../Paginas/index.htm">Iniciar sesión</a>';

?>