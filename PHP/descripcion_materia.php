<?php

//se genera la descripcion de la materia
if($materia_post!=""){
	for($f=0;$f<$num_rows_materias;$f++){
		if($materias[$f][0]==$materia_post){
			$nom=$materias[$f][1];
			$rut=$materias[$f][2];
			$des=str_replace(PHP_EOL, "<br>", $materias[$f][3]);
			break;
		}
	}
}
else{
	$nom="Seleccione una materia";
	$rut="../Imagenes/chaca.png";
	$des="";
}

echo "
	<div id='matv'>
		$nom
	</div>
	<img src='$rut' width='30' height='20' id='img'>
	<br>
	<div class='espacio'>
		Descripcion de la materia:
	</div>
	<div id='descripcion' name='descripcion'>
		$des
	</div>
	<br>
";

?>