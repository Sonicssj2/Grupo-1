<?php

//variables (icluido free de mysqli result)
$materias=mysqli_fetch_all($rsm,MYSQLI_NUM);
$num_rows=mysqli_num_rows($rsm);
$num_fields=mysqli_num_fields($rsm);
mysqli_free_result($rsm);
$eco='let materias=[';

//se genera un string contenedor de las descripciones de las materias, para luego ser enviado a javascript
for ($f=0;$f<$num_rows;$f++){
	$eco.='[';
	for ($c=0;$c<$num_fields;$c++){
		$eco.=($c!=$num_fields-1)?'"'.str_replace(PHP_EOL, '\n', $materias[$f][$c]).'",':'"'.str_replace(PHP_EOL, '\n', $materias[$f][$c]).'"';
	}
	$eco.=($f!=$num_rows-1)?'],':']';
}
$eco.='];';

//se envia el string con formato array de Javascript
echo $eco;

?>