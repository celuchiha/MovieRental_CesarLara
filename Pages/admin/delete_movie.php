<?php 
require'../../class_sesiones/sessions.php';
$objses= new Sessions();
$objses->init();
$objses->vars();
	
	
//instancia de conexion BD
	
require'../../class_sesiones/dbactions.php';
$dbc = new Database();
	
	
  $id=$_GET['id'];
  $query="DELETE FROM peliculas WHERE Cod_producto='$id'";
  $resultado=$dbc->select($query);
	
	if($resultado>0){
				
				
 echo "<script type=\"text/javascript\">alert('El registro fue Eliminado con exito!'); window.location='movies.php';</script>";
			
				
	}else{ 
				
   echo "<script type=\"text/javascript\">alert('Error al Eliminar el registro!'); window.location='movies.php';</script>";
			
				
	} ?>
	

