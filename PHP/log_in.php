<?php

require 'functions.php';//funciones

//codigo sql
$sql=selectw("contraseña","usuarios","numero_documento",$_POST['numero_documento'],false);

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
	if($contraseña[0]==$_POST['contraseña']){
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