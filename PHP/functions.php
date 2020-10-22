<?php

function selectw($field,$table,$a,$b,$type){
	if($type){
		$query="SELECT $field FROM $table WHERE $a LIKE '$b'";
	}
	else{
		$query="SELECT $field FROM $table WHERE $a=$b";
	}

	return $query;
}

function select($field,$table){
	return "SELECT $field FROM $table";
}

function insert($table,$values){
	return "INSERT INTO $table VALUES ($values)";
}

function updatew($table,$values,$a,$b,$type){
	if($type){
		$query="UPDATE $table SET $values WHERE $a LIKE '$b'";
	}
	else{
		$query="UPDATE $table SET $values WHERE $a=$b";
	}

	return $query;
}

?>