<?php 
require'../../class_sesiones/sessions.php';
$objses= new Sessions();
$objses->init();
$objses->vars();
	
	
	
//instancia de conexion BD
	
require'../../class_sesiones/dbactions.php';
$dbc = new Database();

//captura de ID de los datos enviados del formulario
 
 
	$Cod_producto=$_GET['id'];
	
	
	$query="SELECT * FROM peliculas
		 WHERE Cod_producto='$Cod_producto'";
	
	
	$resultado=$dbc->select($query);
	
	$row=$resultado->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Modificar pelicula</title>

-->
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
    <h1>&nbsp;</h1> 
    <center><h1>Modificar datos de pelicula</h1></center>
		
		
    <form action="update_movie.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
      <table align="center">
        <tr valign="baseline">
        
         <td><input type="hidden" name="Cod_producto" value="<?php echo $Cod_producto; ?>">
         
</td>
</tr>
<tr>
          <td nowrap="nowrap" align="right">Nombre:</td>
          <td><input type="text" required="required" name="Nombre" value="<?php echo $row['Nombre'];  ?>"  size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Descripción:</td>
          <td><input type="text" required="required" name="Descripcion" value="<?php echo $row['Descripcion'];  ?>"  size="32" /></td>
        </tr>
       <tr valign="baseline">
          <td nowrap="nowrap" align="right">Cambiar Portada:</td>
                    <td height="auto" width="auto"><img src="../../productos/<?php echo $row['Imagen'];?>" style="max-width: 100px; max-height: 100px" > </td>
                    <div class="examinar2">
          <td>
          <h5>Nueva Portada</h5><input type="file" name="imagen" value="" size="32" /><br />
           
                
          
         </div>
          </td>
        </tr>
         <tr valign="baseline">
          <td nowrap="nowrap" align="right">Precio:</td>
          <td><input type="text" required="required" name="Precio" value="<?php echo $row['Precio'];  ?>"  size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Unidades en stock:</td>
          <td><input type="text" required="required" name="Stock" value="<?php echo $row['Stock'];  ?>"  size="32" /></td>
        </tr>
         <tr valign="baseline">
          <td nowrap="nowrap" align="right">Precio de renta:</td>
          <td><input type="text" required="required" name="Precio_renta" value="<?php echo $row['Precio_renta'];  ?>"  size="32" /></td>
        </tr>
         <tr valign="baseline">
          <td nowrap="nowrap" align="right">Disponible:</td>
          <td><select name="Disponible">
        <option value="1">SI</option>
        <option value="0">NO</option>
             
        </select> </td>
        </tr>
        
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input name="action" type="submit" value="Guardar" /></td>
         <input name="action" type="hidden" value="Guardar" />
        </tr>
      </table>      
    </form>
    <p>&nbsp;</p>  
    
    
    
  <!-- InstanceEndEditable -->    
   
  <!-- end .content --></div> 
  
  <!-- end .container -->
</body>
<!-- InstanceEnd --></html>
