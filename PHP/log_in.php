<?php

require 'functions.php';//funciones

//variables
$numero_documento=$_POST['numero_documento'];
$contraseña_post=$_POST['contraseña'];

//codigo sql
$select=SeleccionarContraseñaDeUsuariosConWhere($numero_documento);

//variables de conexión
$rs=connect($select);

//variables
$contraseña=mysqli_fetch_row($rs);

//variables liberadas
mysqli_free($rs);

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