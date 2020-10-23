<?php

//variables (icluido free de mysqli result)
$archivos=mysqli_fetch_all($rsa,MYSQLI_NUM);
$num_rows=mysqli_num_rows($rsa);
mysqli_free_result($rsa);
$programa_i=0;
$teoria_i=0;
$trabajo_practico_i=0;
$nota_i=0;
$enlace_i=0;

//se generan 5 arrays bidimensionales para almacenar los campos, agrupandolos por
//tipo de archivo
for($f=0;$f<$num_rows;$f++){
	switch($archivos[$f][2]){
		case 'PROGRAMA':
			$programa[$programa_i++]=$archivos[$f];
			break;
		case 'TEORÍA':
			$teoria[$teoria_i++]=$archivos[$f];
			break;
		case 'TRABAJO PRÁCTICO':
			$trabajo_practico[$trabajo_practico_i++]=$archivos[$f];
			break;
		case 'NOTA':
			$nota[$nota_i++]=$archivos[$f];
			break;
		case 'ENLACE':
			$enlace[$enlace_i++]=$archivos[$f];
			break;
		default:
			echo '<h1>ERROR DE TIPO DE ARCHIVO H1</h1>';
			break;
	}
}

//es la mayor longitud de los 5 arrays, para saber la cantidad maxima de filas de
//la tabla HTML
$max=max($programa_i,$teoria_i,$trabajo_practico_i,$nota_i,$enlace_i);

//se reestablecen las variables que almacenaban la longitud de los arrays
$programa_i=0;
$teoria_i=0;
$trabajo_practico_i=0;
$nota_i=0;
$enlace_i=0;

//se crea la tabla, ordenando los valores insertados por el tipo de archivo
for($a=0;$a<$max;$a++){
	for($i=0;$i<5;$i++){
		switch($i){
			case 0:
				echo '<td><a href="'.$programa[$programa_i][0].'">'.$programa[$programa_i++][1].'</a></td>';
				break;
			case 1:
				echo '<td><a href="'.$teoria[$teoria_i][0].'">'.$teoria[$teoria_i++][1].'</a></td>';
				break;
			case 2:
				echo '<td><a href="'.$trabajo_practico[$trabajo_practico_i][0].'">'.$trabajo_practico[$trabajo_practico_i++][1].'</a></td>';
				break;
			case 3:
				echo '<td><a href="'.$nota[$nota_i][0].'">'.$nota[$nota_i++][1].'</a></td>';
				break;
			case 4:
				echo '<td><a href="'.$enlace[$enlace_i][0].'">'.$enlace[$enlace_i++][1].'</a></td>';
				break;
			default:
				echo '<td><h1>ERROR DE TIPO DE ARCHIVO TD</h1></td>';
				break;
		}
	}
	echo ($a!=$max-1)?'</tr><tr>':'</tr>';
}

?>