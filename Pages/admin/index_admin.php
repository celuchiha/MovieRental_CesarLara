<?php
//validacion de sesion creada
require'../../class_sesiones/sessions.php';

$objses= new Sessions();
$objses->init();

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

if ($usuario == ''){
	header("Location:../index.php");
	
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>index_admin</title>
<style type="text/css">

html,body{

margin:0px;

height:100%;

}
a:link   
{
	text-decoration: none;
	color: #00F;
} 
</style>
<script>
function cerrar()
{
	if(confirm('Desea Cerrar Sesion?'))
		return true;
	else
		return false;
}
</script>

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
    <div align="right"><a href="../log_out.php" onclick="return cerrar()" >Cerrar Sesi&oacute;n </a></div>

    <h2 align="center">Sistema administrador Movie Rental</h2>

     

    <p></p>
    <a href="movies.php">Administrar Peliculas</a>
    
    
    
  <p></p>
    <!--<a href="Eval_report.php">Reporte de Evaluacion de Satisfacci&oacute;n de Auditor&iacute;a Interna</a>-->
    
    <p>&nbsp;</p>
  </div> 
  
</body>
</html>
