<?php

function redirect($sref,$refs){
	$return=false;
	foreach ($refs as $ref) {
		if($ref==$sref){
			$return=true;
			break;
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