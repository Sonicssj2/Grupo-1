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

function php_to_javascript($array,$name,$num_rows,$num_fields){
	$echo='let '.$name.'=[';
	for ($f=0;$f<$num_rows;$f++){
		$echo.='[';
		for ($c=0;$c<$num_fields;$c++){
			$echo.=($c!=$num_fields-1)?'"'.str_replace(PHP_EOL, '<br>', $array[$f][$c]).'",':'"'.str_replace(PHP_EOL, '<br>', $array[$f][$c]).'"';
		}
		$echo.=($f!=$num_rows-1)?'],':']';
	}
	$echo.='];';
	return $echo;
}

?>