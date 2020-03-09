<?php 

require'../class_sesiones/dbactions.php';
    $dbc = new Database();
	

 if ($_POST["action"] == "Comprar"){
	
	$Nombres=$_POST['Nombres'];
	$Apellidos=$_POST['Apellidos'];
	$Usuario=$_POST['Usuario'];
	$password=$_POST['password'];
	$idrol=$_POST['idrol'];
	
	$query = "INSERT INTO `bd_movierental`.`usuarios`
(
`Nombres`,
`Apellidos`,
`Usuario`,
`password`,
`idrol`)
VALUES
('".$Nombres."',
'".$Apellidos."',
'".$Usuario."',
'".$password."',
'".$idrol."')";	 
   	$resultado=$dbc->select($query);				
				
 echo "<script type=\"text/javascript\">alert('Gracias por su compra!');window.location='../inicio.php'</script>";
 
  echo "<script type=\"text/javascript\">history.go(0);</script> ";		
				
	}else{ 
				
   echo "<script type=\"text/javascript\">alert('Error al procesar la compra!');window.location='../inicio.php' </script>";
			
				
	} 
	
	
	

	
 
	
	?>
    
	

