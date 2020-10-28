<?php
//"CALL <funcion>(<param 1>,...,<param n>)"
function selectw($field,$table,$a,$b,$type){
	if($type){
		$query="CALL SelecionarConWhereLike($field,$table,$a,$b)";
	}
	else{
		$query="CALL SelecionarConWhereEqual($field,$table,$a,$b)";
	}

	return $query;
}

function select($field,$table){
	return "CALL Selecionar($field,$table)";
}

function insert($table,$values){
	return "CALL Insertar($table,$values)";
}

function update($target,$nombre,$tipo_archivo){
	return "CALL ActualizarArchivos($target,$nombre,$tipo_archivo)";
}

?>