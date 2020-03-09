<?php

class Sessions{
	
	public function __construct(){ }
	
	public function init(){
		@session_start();
	}
	
	public function set($varname, $value){
		
		$_SESSION[$varname] = $value;
		
	}
	
	public function destroy(){
		
		session_unset();
		session_destroy();
		
	}
	public function vars()
{
	$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

if ($usuario == ''){
	header("Location:../index.php");
	
	}
}
	
}

?>