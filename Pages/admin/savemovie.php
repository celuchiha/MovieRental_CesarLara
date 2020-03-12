<?php
require'../../class_sesiones/sessions.php';
$objses= new Sessions();
$objses->init();
$objses->vars();
	
	
	
//instancia de conexion BD
	
require'../../class_sesiones/config.php';
$con = new  Connection();
$pdo = $con->get_connected();
?>


<?php
//captura de datos del formulario
$status = "";
    if ($_POST["action"] == "Guardar"){
	$Nombre = $_POST['Nombre'];	
	$Descripcion = $_POST['Descripcion'];
	
	$tamano = $_FILES["imagen"]['size'];
    $tipo = $_FILES["imagen"]['type'];
    $archivo = $_FILES["imagen"]['name'];
	
	$ruta = $_FILES['imagen']['tmp_name'];	
   
	
	$Precio = $_POST['Precio'];	
	$Precio_renta = $_POST['Precio_renta'];
	$Stock = $_POST['Stock'];
	
 if ($archivo != "") {
        // guardamos el archivo a la carpeta Archhivos
         $destino =  "../../productos/".$archivo;
        if (copy($ruta,$destino)) {
            $status = "Archivo subido: <b>".$archivo."</b>"; 
		$query = "INSERT INTO `bd_movierental`.`peliculas`
(
`Nombre`,
`Descripcion`,
`Imagen`,
`Precio`,
`Stock`,
`Precio_renta`,
`Disponible`)
VALUES
('".$Nombre."',
'".$Descripcion."',
'".$archivo."',
'".$Precio."',
'".$Stock."',
'".$Precio_renta."',
'1')";	
	
	$result=$pdo->prepare($query);
		
	$result->execute();	
			
   	if ($result == true ){
   
echo"<script type=\"text/javascript\">alert('Los datos se guardaron con exito!'); window.location='movies.php';</script>";; 
        } else {
            echo"<script type=\"text/javascript\">alert('Hubo un error al guardar los datos!'); window.location='movies.php';</script>";; 
        }
    } 
	
	}
	}
	
	
?>
   