<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: ../inicio.php');
}
if (!isset($_POST['solicitante'])) {
	header('Location: ../inicio.php');
}
include("../conexao.php");
$amigo = $_POST['solicitante'];
if($amigo == $_SESSION['user']){
	header('Location: ../inicio.php');
}
try{
		$stmt = $connection->prepare('INSERT INTO amizades (id_1,id_2,created_at,updated_at) VALUES(:id_1,:id_2,NOW(),NOW())');
 		$stmt->execute(array(
    		':id_1' => $_SESSION['user'],
    		':id_2' => $amigo
  		));
  		$stmt = $connection->prepare('INSERT INTO amizades (id_1,id_2,created_at,updated_at) VALUES(:id_1,:id_2,NOW(),NOW())');
 		$stmt->execute(array(
    		':id_2' => $_SESSION['user'],
    		':id_1' => $amigo
  		));
  		$stmt = $connection->prepare("DELETE FROM solicitacao_amizade Where id_pedinte = ".$amigo." AND id_convidado =".$_SESSION['user']);
  		$stmt->execute();

	}catch(PDOException $e) {
 		echo 'Error: ' . $e->getMessage();
 	}
 	$_SESSION['amigo'] = $_SESSION['user'];
 	header('Location: perfil.php');
?>
