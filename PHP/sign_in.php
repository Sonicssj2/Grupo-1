<?php

//codigo sql
$sel='SELECT numero_documento FROM usuarios WHERE numero_documento='.$_POST['numero_documento'];
$ins='INSERT INTO usuarios VALUES("","'.$_POST['nombre'].'","'.$_POST['apellido'].'","'.$_POST['tipo_documento'].'",'.$_POST['numero_documento'].',"'.$_POST['contraseña'].'",'.$_POST['curso'].',"'.$_POST['division'].'","'.$_POST['email'].'")';

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