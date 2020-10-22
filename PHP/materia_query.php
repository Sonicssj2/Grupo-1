<?php

require 'functions.php';//funciones

//código slq
$sqlm=select("materia,descripcion","materias");
$sqla=select("ruta,nombre,tipo_archivo","archivos");

//conexión
$link=mysqli_connect('127.0.0.1','root','','chacawiki');

//variables de conexión
$rsm=mysqli_query($link,$sqlm);
$rsa=mysqli_query($link,$sqla);

//cierre de conexión
mysqli_close($link);

?>