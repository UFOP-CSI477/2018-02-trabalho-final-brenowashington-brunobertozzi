<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: ../inicio.php');
	}
	include("../conexao.php");
	$texto = $_POST["texto-post"];
	try{
		$stmt = $connection->prepare('INSERT INTO post (id,texto,created_at,updated_at) VALUES(:id,:texto,NOW(),NOW())');
 		$stmt->execute(array(
    		':id' => $_SESSION["user"],
    		':texto' => $texto
  		));
  		header('Location: feed.php');
	}catch(PDOException $e) {
 		echo 'Error: ' . $e->getMessage();
 	}
?>