<?php

//clase
class AccesoADatos {
	private $db_host;
	private $db_username;
	private $db_password;
	private $db_database;
	private $rs;

	function __construct($db_host,$db_username,$db_password,$db_database){
		$this->db_host=$db_host;
		$this->db_username=$db_username;
		$this->db_password=$db_password;
		$this->db_database=$db_database;
	}

	function query($query){
		if(!$link=mysqli_connect($this->db_host,$this->db_username,$this->db_password,$this->db_database)){
			die('Error de Conexión: '.mysqli_connect_error());
		}
		if(!$this->rs=mysqli_query($link,$query)){
			die('Error de Consulta: '.mysqli_error($this->link));
		}
		mysqli_close($link);
	}

	function fetch(){
		//MYSQLI_ASSOC=1, MYSQLI_NUM=2, MYSQLI_BOTH=3
		return mysqli_fetch_all($this->rs,MYSQLI_NUM);
	}

	function headers(){
		return mysqli_fetch_fields($this->rs);
	}
}

//se instancia el objeto de conexion y se conecta a la base de datos
$conexion=new AccesoADatos('127.0.0.1','root','','chacawiki');

?>