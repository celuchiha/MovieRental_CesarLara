<?php 

//clase para eliminar registro de pelicula

require'../../class_sesiones/sessions.php';
$objses= new Sessions();
$objses->init();
$objses->vars();
	
	
//instancia de conexion BD
require'../../class_sesiones/config.php';
$con = new  Connection();
$pdo = $con->get_connected();
	
	
  $id=$_GET['id'];
  $query="DELETE FROM peliculas WHERE Cod_producto='$id'";
   
    $result=$pdo->prepare($query);
		
	$result->execute();	
	
	if($result ==true){
				
				
 echo "<script type=\"text/javascript\">alert('El registro fue Eliminado con exito!'); window.location='movies.php';</script>";
			
				
	}else{ 
				
   echo "<script type=\"text/javascript\">alert('Error al Eliminar el registro!'); window.location='movies.php';</script>";
			
				
	} ?>
	

