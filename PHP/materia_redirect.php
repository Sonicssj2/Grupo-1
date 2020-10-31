<?php

//variables
$sref=$_SERVER['HTTP_REFERER'];
$refs=["http://localhost/santi/Grupo-1/Paginas/index.htm","http://localhost/santi/Grupo-1/PHP/subir_recurso.php"];

//si se accede a materia con $_SERVER['HTTP_REFERER'] distinto de todos los elmentos de $refs, se redirecciona a index.htm
(redirect($sref,$refs))?$sid=$_GET["sid"]:header("location:../Paginas/index.htm");

//reestablece el id de sesion
session_id($sid);

//reanuda la sesion
session_start();

?>