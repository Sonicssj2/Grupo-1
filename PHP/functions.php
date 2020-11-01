<?php

function connect($query){
	$link=mysqli_connect('127.0.0.1','root','','chacawiki');
	if(!$link){
		$return="Error al conectar.";
	}
	else{
		$return=mysqli_query($link,$query);
		mysqli_close($link);
		if(!$return){
			$return="Error al ejecutar consulta.";
		}
	}

	return $return;
}

function redirect($sref,$refs){
	$return=false;
	foreach ($refs as $ref) {
		if($ref==$sref){
			$return+=true;
			break;
		}
		else{
			$return+=false;
		}
	}

	return $return;
}

/*function php_to_javascript($array,$name){
	$echo=PHP_EOL.$name.'=[';
	foreach ($array as $fila){
		$echo.='[';
		foreach ($fila as $var){
			$echo.='"'.str_replace(PHP_EOL, '<br>', $var).'",';
		}
		$echo=trim($echo,',').'],';
	}
	$echo=trim($echo,',').'];'.PHP_EOL;
	return $echo;
}*/

?>