<?php

require 'functions.php';

//variables
$nombre_recurso=$_POST['nombre'];
$tipo_recurso=$_POST["tipo_recurso"];
if($tipo_recurso=="ENLACE"){
	$ruta_recurso=$_POST['recurso'];
}
else{
	$recurso=$_FILES['recurso'];
	$info=pathinfo($recurso['name']);
	$ext=$info['extension'];
	$newname=$nombre_recurso.'.'.$ext;
	$ruta_recurso='../Recursos/'.$newname;
	$tmp_name=$recurso['tmp_name'];
}

//código sql
$select="CALL SeleccionarRuta('$ruta_recurso')";
$insert="CALL InsertarRecusros('$ruta_recurso','$nombre_recurso','$tipo_recurso')";
$update="CALL ActualizarRecursos('$ruta_recurso','$nombre_recurso','$tipo_recurso')";

//respuesta de query
$rs_select=connect($select);

//variable de query
$ruta=mysqli_fetch_row($rs_select);

//respuesta liberada
mysqli_free_result($rs_select);

//si ruta es igual a NULL significa que que el recurso a cargar no existe en la base de datos, por lo tanto se hace
//un INSERT, de lo contrario, se hace un UPDATE
if($ruta==NULL){
	if(connect($insert)){
		if($tipo_recurso!="ENLACE"){
			//guarda el recurso en la ruta especificada
			move_uploaded_file($tmp_name, $ruta_recurso);
		}
		echo '<p align="center">Recurso cargado correctamente</p>';
	}
	else{
		echo '<p align="center">Error al subir recurso</p>';
	}
}
else{
	if(connect($update)){
		if($tipo_recurso!="ENLACE"){
			move_uploaded_file($tmp_name, $ruta_recurso);
		}
		echo '<p align="center">Recurso actualizado correctamente</p>';
	}
	else{
		echo '<p align="center">Error al actualizar recurso</p>';
	}
}
echo '<div align="center"><a href="'.$_SERVER['HTTP_REFERER'].'">Volver</a></div>';

?>