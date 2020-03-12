<?php 
require'../../class_sesiones/sessions.php';
$objses= new Sessions();
$objses->init();
$objses->vars();
	
	
//instancia de conexion BD
require'../../class_sesiones/config.php';
$con = new  Connection();
$pdo = $con->get_connected();


//captura de datos enviados del formulario
	
	$id=$_POST['Cod_producto'];
	$Nombre = $_POST['Nombre'];	
	$Descripcion = $_POST['Descripcion'];
	
	$tamano = $_FILES["imagen"]['size'];
    $tipo = $_FILES["imagen"]['type'];
    $archivo = $_FILES["imagen"]['name'];
	
	$ruta = $_FILES['imagen']['tmp_name'];	
	
	$Precio = $_POST['Precio'];
	
	$Stock = $_POST['Stock'];
	$Precio_renta = $_POST['Precio_renta'];
	$Disponible = $_POST['Disponible'];
	
	if ($archivo != "") {
        // guardamos el archivo a la carpeta Archhivos
         $destino =  "../../productos/".$archivo;
	
        if (copy($ruta,$destino)) {
            $status = "Archivo subido: <b>".$archivo."</b>"; 
		}
	}

	
  $query="UPDATE peliculas SET
`Nombre` = '$Nombre',
`Descripcion` = '$Descripcion',
`Imagen` = '$archivo',
`Precio` = '$Precio',
`Stock` = '$Stock',
`Precio_renta` = '$Precio_renta',
`Disponible` = '$Disponible'
WHERE `Cod_producto` = '$id';";

   $result=$pdo->prepare($query);
		
	$result->execute();	
	
	if($result ==true){
				
				
 echo "<script type=\"text/javascript\">alert('Los datos fueron modificados con exito!');  history.go(-2);</script>";
			
				
	}else{ 
				
   echo "<script type=\"text/javascript\">alert('Error al Modificar datos!');  history.go(-2);</script>";
			
				
	} 
		
	?>
	

