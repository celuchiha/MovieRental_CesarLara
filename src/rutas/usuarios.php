<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = new \Slim\App;

//require '/src/config/db.php';


//GET Todos los usuarios

$app->get('/api/usuarios/', function(Request $request, Response $response)
		  {
			  
			  //echo "Todos los usuarios";
			  
			  $sql = "SELECT * FROM usuarios";
			  try{
				  
				  $db = new db();
				  $db = $db->connectionDB();  
				  $resultado = $db->query($sql);
				  if($resultado->rowCount() > 0)
				  {
					 $usuarios = $resultado->fetchAll(PDO::FETCH_OBJ);
					  echo json_encode($usuarios);
				  }
				  else
				  {
					  echo json_encode("No existen usuarios");
					  
				  }
				  $resultado = null;
				  $db =null;
			  }
			  catch (PDOException $e)
			  {
				  echo '{"error" : {"text":'.$e->getMessage().'}';
			  }
		  });

//GET recuperar usuario por id

$app->get('/api/usuarios/{id}', function(Request $request, Response $response)
		  {
			  $id_usuario = $request->getAttribute('id');
			  $sql = "SELECT * FROM usuarios WHERE IDUsuario = $id_usuario";
			  
			  try{
				  
				  $db = new db();
				  $db = $db->connectionDB();  
				  $resultado = $db->query($sql);
				   
				  if($resultado->rowCount() > 0)
				  {
					 $usuarios = $resultado->fetchAll(PDO::FETCH_OBJ);
					  echo json_encode($usuarios);
				  }
				  else
				  {
					  echo json_encode("No existen usuarios");
					  
				  }
				  $resultado = null;
				  $db =null;
			  }
			  catch (PDOException $e)
			  {
				  echo '{"error" : {"text":'.$e->getMessage().'}';
			  }
		  });

//POST crear nuevo usuario 

$app->post('/api/usuarios/nuevo', function(Request $request, Response $response)
		  {
			  $nombre = $request->getParam('Nombres');
			  $apellidos = $request->getParam('Apellidos');
			  $idrol = $request->getParam('IDRol');
			  $password = $request->getParam('password');
			  $usuario = $request->getParam('Usuario');
			  
			  
			  $sql = "INSERT INTO usuarios (Nombres,Apellidos,IDRol,password,Usuario) VALUES (:Nombres,:Apellidos,:IDRol,:password,:Usuario)";
			  
			  try{
				  
				  $db = new db();
				  $db = $db->connectionDB();  
				  $resultado = $db->prepare($sql);
				  
				  $resultado->bindParam(':Nombres', $nombre);
				  $resultado->bindParam(':Apellidos', $apellidos);
				  $resultado->bindParam(':IDRol', $idrol);
				  $resultado->bindParam(':password', $password);
				  $resultado->bindParam(':Usuario', $usuario);
				  
				  $resultado->execute(); 
				  echo json_encode("Nuevo usuario guardado");
				   
				 
				  $resultado = null;  
				  $db =null;
			  }
			  catch (PDOException $e)
			  {
				  echo '{"error" : {"text":'.$e->getMessage().'}';
			  }
		  });

//PUT modificar nuevo usuario 

$app->put('/api/usuarios/modificar/{id}', function(Request $request, Response $response)
		  {
			  $id_usuario = $request->getAttribute('id');
			  $nombre = $request->getParam('Nombres');
			  $apellidos = $request->getParam('Apellidos');
			  $idrol = $request->getParam('IDRol');
			  $password = $request->getParam('password');
			  $usuario = $request->getParam('Usuario');
			  
			  
			  $sql = "UPDATE usuarios SET 
			  Nombres = :Nombres,
			  Apellidos = :Apellidos,
			  IDRol = :IDRol,
			  password = :password,
			  Usuario = :Usuario
			  WHERE IDUsuario = $id_usuario";
			  
			  try{ 
				  
				  $db = new db();
				  $db = $db->connectionDB();  
				  $resultado = $db->prepare($sql);
				  
				  $resultado->bindParam(':Nombres', $nombre);
				  $resultado->bindParam(':Apellidos', $apellidos);
				  $resultado->bindParam(':IDRol', $idrol);
				  $resultado->bindParam(':password', $password);
				  $resultado->bindParam(':Usuario', $usuario);
				  
				  $resultado->execute(); 
				  echo json_encode("usuario ha sido modificado");
				   
				 
				  $resultado = null;  
				  $db =null;
			  }
			  catch (PDOException $e)
			  {
				  echo '{"error" : {"text":'.$e->getMessage().'}';
			  }
		  });


//DELETE usuario 

$app->delete('/api/usuarios/delete/{id}', function(Request $request, Response $response)
		  {
			  $id_usuario = $request->getAttribute('id');
			  
			  
			  
			  $sql = "DELETE FROM usuarios 
			  WHERE IDUsuario = $id_usuario";
			  
			  try{ 
				  
				  $db = new db();
				  $db = $db->connectionDB();  
				  $resultado = $db->prepare($sql);
				  
				  
				  if($resultado->rowCount() >0)
				  {
					   echo json_encode("usuario ha sido eliminado");
				  }
				  else {
					  echo json_encode("no existe el usuario");
				  }
				  $resultado->execute(); 
				 
				   
				 
				  $resultado = null;  
				  $db =null;
			  }
			  catch (PDOException $e)
			  {
				  echo '{"error" : {"text":'.$e->getMessage().'}';
			  }
		  });