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
$select_numero_documento=SeleccionarNumeroDocumentoDeUsuariosConWhere($numero_documento);
$select_id_division=SeleccionarIdDivisionDeDivisionesConWhere($curso,$division);

//variables de conexión
$rs_select_numero_documento=connect($select_numero_documento);
$numero_documento=mysqli_fetch_row($rs_select_numero_documento);
mysqli_free_result($rs_select_numero_documento);

//si $numero_documento es NULL significa que el usuario no esta registrado, de lo contrario, no se llevara a cabo el
//INSERT
if ($numero_documento==NULL) {
	$rs_select_id_division=connect($select_id_division);
	$id_division=mysqli_fetch_row($rs_select_id_division);
	mysqli_free_result($rs_select_id_division);
	echo $id_division;
	$insert=InsertarUsuarios($id_division,$nombre,$apellido,$tipo_documento,$numero_documento,$contraseña,$curso,$division,$email);

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