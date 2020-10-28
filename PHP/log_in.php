<?php

require 'functions.php';//funciones

//variables
$numero_documento=$_POST['numero_documento'];
$contraseña_post=$_POST['contraseña'];

//codigo sql
$sql=SeleccionarContraseñaDeUsuariosConWhere($numero_documento);

//conexión
$link=mysqli_connect('127.0.0.1','root','','chacawiki');

//variables de conexión
$rs=mysqli_query($link,$sql);

//cierrre de conexión
mysqli_close($link);

//variables
$contraseña=mysqli_fetch_row($rs);

//verifica que la contraseña del usuario ingresado es correcta
if($contraseña!=null){
	if($contraseña[0]==$contraseña_post){
		header('location:Materia.php');
	}
	else{
		echo '
			<p align="center">Error al validar la contraseña</p>
			<a href="../Paginas/index.htm">Volver</a>
		';
	}
}
else{
	echo '
		<p align="center">No se encuentra el usuiario</p>
		<a href="../Paginas/index.htm">Volver</a>
	';
}

?>