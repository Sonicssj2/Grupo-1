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
$conexion=new conexion(H,U,P,D,"CALL SeleccionarRecursoPorRuta('$ruta_recurso')");

//variable de query
$ruta=$conexion->fetch();

//si ruta es igual a NULL significa que que el recurso a cargar no existe en la base de datos, por lo tanto se hace
//un INSERT en las tablas recursos y en materias_recursos, de lo contrario, se inserta solamente en materias_recursos
if($ruta==NULL){
	$conexion=new conexion(H,U,P,D,"CALL InsertarRecursos('$ruta_recurso','$nombre_recurso','$tipo_recurso')");
	$conexion=new conexion(H,U,P,D,"CALL InsertarMateriasRecursos1($materia_recurso)");
	echo "<p align='center'>Recurso cargado correctamente</p>";
}
else{
	$conexion=new conexion(H,U,P,D,"CALL InsertarMateriasRecursos2($materia_recurso,'".$ruta[0][0]."')");
	echo "<p align='center'>Recurso actualizado correctamente</p>";
}
if($tipo_recurso!="ENLACE"){
	move_uploaded_file($tmp_name, $ruta_recurso);
}
echo "<div align='center'><a href='$_SERVER[HTTP_REFERER]'>Volver</a></div>";

?>