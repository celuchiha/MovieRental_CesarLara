<?php

//clase para validar usuarios
class Users{
	
	public $objDb;
	public $objSe;
	public $result;
	public $rows;
	public $useropc;
	
	public function __construct(){
		
		$this->objDb = new Database();
		$this->objSe = new Sessions();
		
	}
	
	public function login_in(){

$query = "SELECT u.IDUsuario, u.usuario, r.idrol FROM usuarios as u, roles as r WHERE u.usuario = '".$_POST["email"]."' AND u.password = '".$_POST["password"]."' AND u.idrol = r.idrol";
		$this->result = $this->objDb->select($query);
		$this->rows = mysqli_num_rows($this->result);
		if($this->rows > 0){
			
			if($row=mysqli_fetch_array($this->result)){
				
				$this->objSe->init();
                $this->objSe->set('usuario', $row["usuario"]);
				$this->objSe->set('IDUsuario', $row["IDUsuario"]);
				$this->objSe->set('idrol', $row["idrol"]);
				
				
				$this->useropc = $row["idrol"];
				
				switch($this->useropc){
					
					case '1':
                        header("Location:../Pages/admin/index_admin.php");		 						break;
						
						
					case '2':
		                header("location:../inicio.php");	
						break;
						
											
				}
				
			}
			
		}else {
		 
		 echo"<script type=\"text/javascript\">alert('Nombre de usuario o contrasena invalida!'); window.location='index.php';</script>";;
	   }
	}
	
}	


?>