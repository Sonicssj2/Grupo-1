<?php

//constantes
const H='127.0.0.1';
const U='root';
const P='';
const D='chacawiki';

//clase
class AccesoADatos {
	private $db_host;
	private $db_username;
	private $db_password;
	private $db_database;
	private $query;
	private $link;
	private $rs;

	function __construct($db_host,$db_username,$db_password,$db_database,$query){
		$this->db_host=$db_host;
		$this->db_username=$db_username;
		$this->db_password=$db_password;
		$this->db_database=$db_database;
		$this->query=$query;
	}

	function connect(){
		if(!$this->link=mysqli_connect($this->db_host,$this->db_username,$this->db_password,$this->db_database)){
			die('Error de Conexión:'.mysqli_connect_error());
		}
	}

	function query(){
		if(!$this->rs=mysqli_query($this->link,$this->query)){
			die('Error de Consulta:'.mysqli_error($this->link));
		}
	}

	function fetch($rt){
		//MYSQLI_ASSOC=1, MYSQLI_NUM=2, MYSQLI_BOTH=3
		return mysqli_fetch_all($this->rs,$rt);
	}

	function cabecera(){
		return mysqli_fetch_fields($this->rs);
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

/*
class test{
	function test($rt){
		if($rt==NULL){
			$rt=a;
		}
		return $rt;
	}
}

$test=new test();
$test->test();
*/
?>