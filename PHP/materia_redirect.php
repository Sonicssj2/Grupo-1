<?php

//si se accede a materia sin haber pasado por la validacion, se redirecciona a index.htm
$ref="http://localhost/santi/Grupo-1/Paginas/index.htm";
$sref=$_SERVER['HTTP_REFERER'];

($ref==$sref)?$sid=$_GET["sid"]:header("location:../Paginas/index.htm");

session_id($sid);//reestablece el id de sesion

session_start();//reanuda la sesion

?>