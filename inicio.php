<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Movie Rental</h1>
		<a href="Pages/carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
      </header>
    <script>
function cerrar()
{
	if(confirm('Desea Cerrar Sesion?'))
		return true;
	else
		return false;
}
</script>
    <div align="right"> <h3><a href="class_sesiones/log_out.php" onclick="return cerrar()" >Cerrar Sesi&oacute;n </a></h3></div>
	<section>
		
	<?php
		//instancia de conexion BD
		require'class_sesiones/config.php';
		$con = new  Connection();
		$pdo = $con->get_connected();
		
		$query="select * from peliculas ";
		 
			$result=$pdo->prepare($query);
		
			$result->execute();	
	
	
	
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
		?>


			<div class="producto">
			<center>
				<img src="./productos/<?php echo $row['Imagen'];?>"><br>
				<span><?php echo $row['Nombre'];?></span><br>
                <span>Precio: $<?php echo $row['Precio'];?></span><br>
                <span>Precio renta: $<?php echo $row['Precio_renta'];?></span><br>
                <span>Disponible: $<?php echo $row['Precio_renta'];?></span><br>
				<a href="Pages/detalles.php?id=<?php echo $row['Cod_producto']; ?>">ver</a>
			</center>
		</div>
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>