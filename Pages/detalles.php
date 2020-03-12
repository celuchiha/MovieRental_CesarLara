<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Detalles</h1>
		<a href="./carritodecompras.php" title="ver carrito de compras">
		</a>
	</header>
	<section>
		
	<?php
	  
		require'../class_sesiones/config.php';       
		$con = new  Connection();
		$pdo = $con->get_connected();
		
		$query="select * from peliculas WHERE Cod_producto=".$_GET['id'];
		 
		$result=$pdo->prepare($query);
		
		$result->execute();	
	
	
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
		?>


			<div class="producto">
			<center>
          
                <table>
                <tr>
                 <td height="auto" width="auto"><img src="../productos/<?php echo $row['Imagen'];?>" style="max-width: 400px; max-height: 400px" > </td>
                 </tr>
                 </table>
				<span><?php echo $row['Nombre'];?></span><br>
                Descripción:<span><?php echo $row['Descripcion'];?></span><br>
                Precio: $<span><?php echo $row['Precio'];?></span><br>
                Precio renta: $<span><?php echo $row['Precio_renta'];?></span><br>Disponible:
                <span><?php if ($row['Disponible']==1)   echo 'SI'; else echo 'NO'
		  ;?></span><br>
                
				<a href="carritodecompras.php?id=<?php echo $row['Cod_producto']; ?>">Añadir al Carrito</a>
			</center>
		</div>
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>