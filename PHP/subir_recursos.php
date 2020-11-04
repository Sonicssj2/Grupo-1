<?php

require 'funciones.php';

//variables
$nombre_recurso=$_POST['nombre'];
$tipo_recurso=$_POST['tipo_recurso'];
$materia_recurso=$_POST['materia_recurso'];
if($tipo_recurso=="ENLACE"){
	$ruta_recurso=$_POST['recurso'];
}
else{
	$recurso=$_FILES['recurso'];
	$info=pathinfo($recurso['name']);
	$ext=$info['extension'];
	$ruta_recurso="../Recursos/$nombre_recurso.$ext";
	$tmp_name=$recurso['tmp_name'];
}

//respuesta de query
$rs_select=connect("CALL SeleccionarRecursoPorRuta('$ruta_recurso')");

//variable de query
$ruta=mysqli_fetch_row($rs_select);

//respuesta liberada
mysqli_free_result($rs_select);

//si ruta es igual a NULL significa que que el recurso a cargar no existe en la base de datos, por lo tanto se hace
//un INSERT en las tablas recursos y en materias_recursos, de lo contrario, se inserta solamente en materias_recursos
if($ruta==NULL){
	if(connect("CALL InsertarRecursos('$ruta_recurso','$nombre_recurso','$tipo_recurso')")&&connect("CALL InsertarMateriasRecursos1($materia_recurso)")){
		if($tipo_recurso!="ENLACE"){
			move_uploaded_file($tmp_name, $ruta_recurso);
		}
		echo "<p align='center'>Recurso cargado correctamente</p>";
	}
	else{
		echo "<p align='center'>Error al subir recurso</p>";
	}
}
else{
	if(connect("CALL InsertarMateriasRecursos2($materia_recurso,'$ruta[0]')")){
		if($tipo_recurso!="ENLACE"){
			move_uploaded_file($tmp_name, $ruta_recurso);
		}
		echo "<p align='center'>Recurso actualizado correctamente</p>";
	}
	else{
		echo "<p align='center'>Error al actualizar recurso</p>";
	}
}
echo "<div align='center'><a href='$_SERVER[HTTP_REFERER]'>Volver</a></div>";

?>