<?php

//variable de sesion
$numero_documento=$_SESSION['numero_documento'];

//variable de POST
$materia_post=($_POST!=NULL)?$_POST['materia']:"";

//se instancia el objeto de conexion y se ejecuta la consulta
$conexion=new AccesoADatos(H,U,P,D,"CALL SeleccionarMaterias($numero_documento)");
$conexion->connect();
$conexion->query();

//variables de materias
$materias=$conexion->fetch(MYSQLI_NUM);
$num_rows_materias=$conexion->rows();
$num_fields_materias=$conexion->fields();

//si se selecciono una materia:
if($materia_post!=""){
	//se instancia el objeto de conexion y se ejecuta la consulta
	$conexion=new AccesoADatos(H,U,P,D,"CALL SeleccionarRecursosPorMateria($materia_post)");
	$conexion->connect();
	$conexion->query();

	//variables de recursos
	$recursos=$conexion->fetch(MYSQLI_NUM);
	//$recursos=$conexion->fetch(MYSQLI_NUM);
	$cabecera=$conexion->cabecera();
	$num_rows_recursos=$conexion->rows();
	$num_fields_recursos=$conexion->fields();
}

?>