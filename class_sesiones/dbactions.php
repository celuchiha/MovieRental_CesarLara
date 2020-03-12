<?php

class Database{
	
	public $result;
	
	public function __construct(){ }
	
	private $dbHost = '127.0.0.1:3307';
	private $dbUser = 'root';
	private $dbPass = '';
	private $dbName = 'bd_movierental'; 
	
	

public function select($query){
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="bd_movierental"; // base de datos 
$tbl_name="usuarios"; // nombre de la tabla

// Conectar el servidor y seleccion de base de datos.
//$dbc = mysqli_connect($host, $username,$password, $db_name);
$dbc = mysqli_connect($host, $username,$password);
if(!$dbc){
echo "No se pudo conectar a la base de datos";
exit; 
}

		return $this->result = mysqli_query($dbc,$query);
	
	
	
	/*$mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
	$dbConnection = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	if(!$dbConnection){
     echo "No se pudo conectar a la base de datos";
     exit; 
}
	
	return $this->result = $dbConnection->query($query) ;*/
	

}
	
}


?>