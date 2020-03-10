<?php
	session_start();
	require'../class_sesiones/dbactions.php';
     $dbc = new Database();
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_GET['id']){
							$encontro=true;
							$numero=$i;
						}
					}
					if($encontro==true){
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					}else{
						$nombre="";
						$precio=0;
						$imagen="";
						
			
		$query="select * from peliculas where Cod_producto=".$_GET['id'];
		 
		$resultado=$dbc->select($query);
		
												
						while ($row=$resultado->fetch_assoc()) {
							$nombre=$row['Nombre'];
							$precio=$row['Precio'];
							$imagen=$row['Imagen'];
						}
						$datosNuevos=array('Id'=>$_GET['id'],
										'nombre'=>$nombre,
										'precio'=>$precio,
										'imagen'=>$imagen);

						array_push($arreglo, $datosNuevos);
						$_SESSION['carrito']=$arreglo;

					}
		}




	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";
	
	$query="select * from peliculas where Cod_producto=".$_GET['id'];
			
			$resultado=$dbc->select($query);
		
			while ($row=$resultado->fetch_assoc()) {
				
				$nombre=$row['Nombre'];
				$precio=$row['Precio'];
				$imagen=$row['Imagen'];
			}
			$arreglo[]=array('Id'=>$_GET['id'],
							'nombre'=>$nombre,
							'precio'=>$precio,
							'imagen'=>$imagen);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Carrito de compras - Movie rental</h1>
		<a href="../carritodecompras.php" title="ver carrito de compras">
			<img src="../imagenes/carrito.png">
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
    <div align="right"> <h3><a href="../class_sesiones/log_out.php" onclick="return cerrar()" >Cerrar Sesi&oacute;n </a></h3></div>
	<section>
		<?php
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
	?>
				<div class="producto">
					<center>
						<img src="../productos/<?php echo $datos[$i]['imagen'];?>"><br>
						<span><?php echo $datos[$i]['nombre'];?></span><br>
						<span>Precio: <?php echo $datos[$i]['precio'];?></span><br>
						
						<span>Subtotal:$<?php echo $datos[$i]['precio'];?></span><br>
						
					</center>
				</div>
			<?php
				$total=($datos[$i]['precio'])+$total;
			}
				
			}else{
				echo '<center><h2>No has a&ntilde;adido ningun producto</h2></center>';
			}
			echo '<center><h2>Total: $'.$total.'</h2></center>';
		
		?>
		<center><a href="../inicio.php">Ver catalogo</a></center></br>
        <center><a href="comprar.php">FINALIZAR COMPRA</a></center>
		
		

		
	</section>
</body>
</html>