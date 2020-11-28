<?php

//variables
$sid=$_GET["sid"];
$refs=[
	"http://localhost/santi/Grupo-1/Paginas/index.htm",
	"http://localhost/santi/Grupo-1/PHP/subir_recursos.php",
	"http://localhost/santi/Grupo-1/PHP/Materia.php?sid=$sid"
];

//si se accede a materia con $_SERVER['HTTP_REFERER'] distinto de todos los elmentos de $refs, se redirecciona a index.htm
$redirect=true;
foreach ($refs as $ref) {
	if($ref==$_SERVER['HTTP_REFERER']){
		$redirect=false;
		break;
	}
}

if($redirect){
	header("location:../Paginas/index.htm");
}

//reestablece el id de sesion
session_id($sid);

//reanuda la sesion
session_start();

?>