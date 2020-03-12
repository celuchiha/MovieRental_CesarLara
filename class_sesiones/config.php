<?php

class Connection{		
	
	private $dbHost = '127.0.0.1:3306';
	private $dbUser = 'root';
	private $dbPass = '';
	private $dbName = 'bd_movierental'; 
	
	//connection
	
	public function get_connected(){
		
		$mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
		$dbConnection = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
		$dbConnection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $dbConnection; 
	}
	
}

?>