<?php

require 'AccesoADatos.php';

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

//se instancia el objeto de conexion y se ejecuta la consulta
$conexion=new AccesoADatos(H,U,P,D,"CALL SeleccionarRecursoPorRuta('$ruta_recurso')");
$conexion->connect();
$conexion->query();

//variable de query
$recurso_id=$conexion->fetch(MYSQLI_NUM);

//si ruta es igual a NULL significa que que el recurso a cargar no existe en la base de datos, por lo tanto se hace
//un INSERT en las tablas recursos y en materias_recursos, de lo contrario, se inserta solamente en materias_recursos
if($recurso_id==NULL){
	$conexion=new AccesoADatos(H,U,P,D,"CALL InsertarRecursos('$ruta_recurso','$nombre_recurso','$tipo_recurso')");
	$conexion->connect();
	$conexion->query();

	$conexion=new AccesoADatos(H,U,P,D,"CALL InsertarUltimoRegistro($materia_recurso)");
	$conexion->connect();
	$conexion->query();

	echo "<p align='center'>Recurso cargado correctamente</p>";
}
else{
	$conexion=new AccesoADatos(H,U,P,D,"CALL test($materia_recurso,".$recurso_id[0][0].")");
	$conexion->connect();
	$conexion->query();
	$mr=$conexion->fetch(MYSQLI_NUM);

	if($mr==NULL){
		$conexion=new AccesoADatos(H,U,P,D,"CALL InsertarMateriasRecursos($materia_recurso,'".$recurso_id[0][0]."')");
		$conexion->connect();
		$conexion->query();
	}
	echo "<p align='center'>Recurso actualizado correctamente</p>";
}
if($tipo_recurso!="ENLACE"){
	move_uploaded_file($tmp_name, $ruta_recurso);
}
echo "<div align='center'><a href='$_SERVER[HTTP_REFERER]'>Volver</a></div>";

?>