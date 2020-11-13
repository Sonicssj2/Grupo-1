<?php

//constantes
const H='127.0.0.1';
const U='root';
const P='';
const D='chacawiki';

//clase
class conexion {
	private $link;
	private $rs;

	function __construct($db_host,$db_username,$db_password,$db_database,$query){
		if(!$this->link=mysqli_connect($db_host,$db_username,$db_password,$db_database)){
			die('Error de Conexión:'.mysqli_connect_error());
		}
		if(!$this->rs=mysqli_query($this->link,$query)){
			die('Error de Consulta:'.mysqli_error($this->link));
		}
	}

	function fetch(){
		return mysqli_fetch_all($this->rs,MYSQLI_NUM);
	}

	function rows(){
		return mysqli_num_rows($this->rs);
	}

	function fields(){
		return mysqli_num_fields($this->rs);
	}

	function __destruct(){
		mysqli_close($this->link);
	}
}

?>