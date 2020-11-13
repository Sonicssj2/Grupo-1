<?php

//variable de sesion
$numero_documento=$_SESSION['numero_documento'];

//variable de POST
$materia_post=($_POST!=NULL)?$_POST['materia']:"";

//se instancia el objeto de conexion y se ejecuta la consulta
$conexion=new conexion(H,U,P,D,"CALL SeleccionarMaterias($numero_documento)");

//variables de materias
$materias=$conexion->fetch();
$num_rows_materias=$conexion->rows();
$num_fields_materias=$conexion->fields();

//si se selecciono una materia:
if($materia_post!=""){
	//se instancia el objeto de conexion y se ejecuta la consulta
	$conexion=new conexion(H,U,P,D,"CALL SeleccionarRecursosPorMateria($materia_post)");

	//variables de recursos
	$recursos=$conexion->fetch();
	$num_rows_recursos=$conexion->rows();
	$num_fields_recursos=$conexion->fields();
}

?>