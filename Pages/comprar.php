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
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1 align="center">Detalles de la compra</h1>
		<a href="../carritodecompras.php" title="ver carrito de compras">
			<img src="../imagenes/carrito.png">
		</a>
	</header>
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
						<table>
                <tr>
                 <td height="auto" width="auto"><img src="../productos/<?php echo $datos[$i]['imagen'];?>" style="max-width: 400px; max-height: 400px" > </td>
                 </tr>
                 </table>
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
		<h1 align="center"><em>Formulario de Envío</em></h1>
        <h2 align="center"><em>Registro de usuario</em></h2>
 <form action="validacion.php" method="post" name="form1" id="form1">
      <table align="center">
     
        <tr valign="baseline">
      <input type="hidden" name="idrol" value="2">
         

          <td nowrap="nowrap" align="right">Nombres:</td>
          <td><input type="text" required name="Nombres" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Apellidos:</td>
          <td><input type="text" required name="Apellidos" value="" size="32" /></td>
        </tr>
       <tr valign="baseline">
          <td nowrap="nowrap" align="right">Correo Electrónico:</td>
          <td><input type="text" required name="Usuario" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Contraseña:</td>
          <td><input type="text" required name="password" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Dirección:</td>
          <td><input type="text" required name="Direccion" value="" size="32" /></td>
        </tr>
        		
		
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Tarjeta de Débito/Crédito:</td>
          <td> <select required="required" name="Tarjeta">
        <option value="">Elija una Tarjeta</option>
        <option value="Visa" >Visa</option>
        <option value="MasterCard" >MasterCard</option>
        </select> </td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Número de tarjeta:</td>
          <td><input type="text" name="Numero_tarjeta" value="" size="32" /></td>
        </tr>
        <p>
        <br />
               
               
         		
		
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input name="action" type="submit" value="Comprar" /></td>
         <input name="action" type="hidden" value="Comprar" />
        </tr>
      </table>      
    </form>

		
		

		
</section>
</body>
</html>