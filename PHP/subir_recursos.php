<?php

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

require 'AccesoADatos.php';

//se ejecuta la consulta
$conexion->query("CALL SeleccionarRecursoPorRuta('$ruta_recurso')");

//variable de query
$recurso_id=$conexion->fetch();

//si ruta es igual a NULL significa que que el recurso a cargar no existe en la base de datos, por lo tanto se hace
//un INSERT en las tablas recursos y en materias_recursos, de lo contrario, se inserta solamente en materias_recursos
if($recurso_id==NULL){
	//se ejecutan las consultas
	$conexion->query("CALL InsertarRecursos('$ruta_recurso','$nombre_recurso','$tipo_recurso')");
	$conexion->query("CALL InsertarUltimoRegistro($materia_recurso)");

	echo "<p align='center'>Recurso cargado correctamente</p>";
}
else{
	//se ejecuta la consulta
	$conexion->query("CALL test($materia_recurso,".$recurso_id[0][0].")");
	$mr=$conexion->fetch();

	if($mr==NULL){
		//se ejecuta la consulta
		$conexion->query("CALL InsertarMateriasRecursos($materia_recurso,'".$recurso_id[0][0]."')");
	}
	echo "<p align='center'>Recurso actualizado correctamente</p>";
}
if($tipo_recurso!="ENLACE"){
	move_uploaded_file($tmp_name, $ruta_recurso);
}
echo "<div align='center'><a href='$_SERVER[HTTP_REFERER]'>Volver</a></div>";

?>