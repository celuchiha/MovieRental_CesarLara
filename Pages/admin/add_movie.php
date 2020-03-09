<?php

//validacion de sesion creada
require'../../class_sesiones/sessions.php';
$objses= new Sessions();
$objses->init();
$objses->vars();
	
	
	
//instancia de conexion BD
	
require'../../class_sesiones/dbactions.php';
$dbc = new Database();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>add_movie</title>

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
      
<h1>A&ntilde;adir película</h1>
 <form action="savemovie.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
      <table align="center">
     
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Nombre:</td>
          <td><input type="text" required="required" name="Nombre" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Descripción:</td>
          <td><input type="text" required="required" name="Descripcion" value="" size="32" /></td>
        </tr>
       <tr valign="baseline">
          <td nowrap="nowrap" align="right"><p>&nbsp;</p>
            <p>Portada</p>
          </td> 
          <div class="examinar">
          <td>
          <h5></h5><input type="file" name="imagen" value="" size="32" /><br />
           
                
          
         </div>
          </td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Precio:</td>
          <td><input type="text" required="required" name="Precio" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Precio renta:</td>
          <td><input type="text" required="required" name="Precio_renta" value="" size="32" /></td>
        </tr>
        
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Unidades en Stock:</td>
          <td><input type="text" required="required" name="Stock" value="" size="32" /></td>
        </tr>
        
        
        
         		
		
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input name="action" type="submit" value="Guardar" /></td>
         <input name="action" type="hidden" value="Guardar" />
        </tr>
      </table>      
    </form>
    <p>&nbsp;</p>
  </div> 
  
  
</body>
</html>
