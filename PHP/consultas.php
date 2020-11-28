<?php

//variable de POST
$materia_post=($_POST!=NULL)?$_POST['materia']:"";

//se ejecuta la consulta
$conexion->query("CALL SeleccionarMaterias(".$_SESSION['numero_documento'].",'".$_SESSION['tipo_documento']."')");

//variable de materias
$materias=$conexion->fetch();

//si se selecciono una materia:
if($materia_post!=""){
	//se ejecuta la consulta
	$conexion->query("CALL SeleccionarRecursosPorMateria($materia_post)");

	//variables de recursos
	$recursos=$conexion->fetch();
	$cabeceras=$conexion->headers();
}

?>