<?php 

//validacion de sesion creada
require'../../class_sesiones/sessions.php';
$objses= new Sessions();
$objses->init();

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

if ($usuario == ''){
	header("Location:../index.php");
	
	}
	
//instancia de conexion BD
require'../../class_sesiones/config.php';
$con = new  Connection();
$pdo = $con->get_connected();

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Movies</title>

<style type="text/css">
    .box{
        
        display: none;
        
    }
    .div{ display: none ; }
	.div2{ display: none; }
	.div3{ display: none; }
	.div4{ display: none; }
	.div5{ display: none; }

    
</style>

</head>

<body>

<div class="container" style="width:100%; height:100%;">
  <div class="header">
 <hr width="300%" size="10" noshade color="#000066" />
<hr width="300%" size="10" noshade color="#FFCC00" /></div>
  
  <div class="content"  style="max-width:100%; max-height:100%;">
  <link rel="stylesheet" href="../CSS/bootstrap/css/bootstrap.css" />
      
     <div align="right"><a href="../log_out.php" onclick="return cerrar()" >Cerrar Sesion </a></div>      
       
    <h3> <a href="add_movie.php">A&ntilde;adir Pelicula</a></h3>
<h2>Inventario de Peliculas</h2>

<script>
function eliminar()
{
	if(confirm('¿Desea eliminar el registro?'))
		return true;
	else
		return false;
}
</script>

<script>
function modificar()
{
	if(confirm('¿Desea modificar el registro?'))
		return true;
	else
		return false;
}
</script>
<script>
function cerrar()
{
	if(confirm('Desea Cerrar Sesion?'))
		return true;
	else
		return false;
}
</script>

  <?php 
  
  //consulta a la bd de todos las peliculas
  
   $query="SELECT * FROM peliculas";
   

   	$result=$pdo->prepare($query);
		
	$result->execute();	
		
	?>
  
  <table width="1300" border = '1'> 
  <tr width="60">
  <td width="83" align="center"><strong>Nombre  </strong></td>
  <td width="86" align="center"><strong>Descripción  </strong></td>
  <td width="119" align="center"><strong>Portada</strong></td>
  <td width="70" align="center"><strong>Precio</strong></td>
  <td width="70" align="center"><strong>Unidades en Stock</strong></td>  
  <td width="70" align="center"><strong>Precio Renta</strong></td>
  <td width="70" align="center"><strong>Disponible</strong></td>    
  <td width="59"> </td>
  <td width="65"> </td>
  
    </tr>
  <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){ ?>
           <tr>
           <td> <?php echo $row['Nombre'];?> </td>
           <td> <?php echo $row['Descripcion'];?> </td>
           <td align="center"><img src="../../productos/<?php echo $row['Imagen'];?>" style="max-width: 100px; max-height: 100px" > </td>
           <td align="center">$ <?php echo $row['Precio'];?> </td>
           <td align="center"> <?php echo $row['Stock'];?> </td>           
           <td align="center">$ <?php echo $row['Precio_renta'];?> </td>
           <td align="center"> <?php if ($row['Disponible']==1)   echo 'SI'; else echo 'NO'
		  ;?> </td>           
         
        
           
            <!-- envío de variables para la modificación de un usuario -->
            
		   <td><a href="modificar_pelicula.php?id=<?php echo $row['Cod_producto'];?>" onclick="return modificar()">Modificar</a></td>
		     <td><a href="delete_movie.php?id=<?php echo $row['Cod_producto'];?>" onclick="return eliminar()">Eliminar</a></td>
             
		   </tr>
           
           
           <?php } ?>
      </table>
	  
    
  
    
  
   
  </div> 

</body>
</html>

