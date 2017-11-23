<?php

function connect(){
	try {
		return new PDO('mysql:host=localhost;dbname=tic;charset=utf8mb4;port:3306','root','',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	} catch (PDOException $e) {
		return null;
	}
}

function login($mail, $pass){
 $conn = connect();
 $stmt = $conn->prepare("select * from tic.usuarios where mail ='".$mail."' and pass='".$pass."'");
 $stmt->execute();

 if (count($stmt->fetchAll(PDO::FETCH_ASSOC)) > 0){
  //$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //var_dump($users);

  //return $users['idUsuarios'];
 	return 1;
 } else{
  return -1;
 }
}

function selectUsuario($id)
{
	try{
		$conn = connect();
		$stmtSelect = $conn->prepare("select * from tic.usuarios where idUsuarios ='".$id."'");
		$stmtSelect->execute();

		return $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e){return null;}
}
function selectUsuariobyMail($mail)
{
	try{
		$conn = connect();
		$stmtSelect = $conn->prepare("select * from tic.usuarios where mail ='".$mail."'");
		$stmtSelect->execute();

		return $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e){return null;}
}
function traerMensajes($id)
{
	try {
		$conn = connect();
		$stmt = $conn->prepare("select * from tic.mensajes where idRecibe ='".$id."'");
		$stmt->execute();
		$mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $mensajes;
	}
	catch(PDOException $e){return null;}
}
function insertMensaje($mensaje, $idEnvia, $idRecibe, $fechayhora)
{
	try{
		$conn = connect();
		$stmt = $conn->prepare('insert into mensajes(idEnvia,mensaje,idRecibe,fechayhora) values (:idEnvia,:mensaje,:idRecibe,:fechayhora)');
		$stmt->bindValue(':idEnvia',$idEnvia, PDO::PARAM_STR);
		$stmt->bindValue(':mensaje',$mensaje, PDO::PARAM_STR);
		$stmt->bindValue(':idRecibe',$idRecibe, PDO::PARAM_STR);
		$stmt->bindValue(':fechayhora',$fechayhora, PDO::PARAM_STR);

		$stmt->execute();
		return 1;

	}
	catch(PDOException $e){return null;}
}
