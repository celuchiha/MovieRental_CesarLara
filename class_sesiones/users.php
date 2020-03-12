<?php

//clase para validar usuarios
class Users{
	
	public $objCon;
	public $objSe;
	public $result;
	public $rows;
	public $useropc;
	
	public function __construct(){
		
		
		$this->objSe = new Sessions();
		$this->objCon = new Connection();
		
	}
	
	public function login_in(){

	$pdo = $this->objCon->get_connected();

		$query = "SELECT u.IDUsuario, u.usuario, r.idrol FROM usuarios as u, roles as r WHERE u.usuario = '".$_POST["email"]."' AND u.password = '".$_POST["password"]."' AND u.idrol = r.idrol";
		
		$result = $pdo->prepare($query);
		$result->execute();		
	
		if($result == true){
			
			if($row=$result->fetch(PDO::FETCH_ASSOC)){
				
				$this->objSe->init();
                $this->objSe->set('usuario', $row["usuario"]);
				$this->objSe->set('IDUsuario', $row["IDUsuario"]);
				$this->objSe->set('idrol', $row["idrol"]);
				
				
				$this->useropc = $row["idrol"];
				
				switch($this->useropc){
					
					case '1':
<<<<<<< HEAD
                        header("Location:../Pages/admin/movies.php");		 						break;
=======
                        header("Location:../Pages/admin/index_admin.php");		 						break;
>>>>>>> origin/master
						
						
					case '2':
		                header("location:../inicio.php");	
						break;
						
											
				}
				
			}
			
		}else {
		 
		 echo"<script type=\"text/javascript\">alert('Nombre de usuario o contrasena invalida!'); window.location='../index.php';</script>";;
	   }
	}
	
}	


?>