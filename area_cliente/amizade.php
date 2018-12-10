<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: ../inicio.php');
}
if (!isset($_POST['amigo'])) {
	header('Location: ../inicio.php');
}
include("../conexao.php");
$amigo = $_POST['amigo'];
if($amigo == $_SESSION['user']){
	header('Location: ../inicio.php');
}
try{
		$stmt = $connection->prepare('INSERT INTO solicitacao_amizade (id_pedinte,id_convidado,created_at,updated_at) VALUES(:id_1,:id_2,NOW(),NOW())');
 		$stmt->execute(array(
    		':id_1' => $_SESSION['user'],
    		':id_2' => $_POST['amigo']
  		));
	}catch(PDOException $e) {
 		echo 'Error: ' . $e->getMessage();
 	}
 	$_SESSION['amigo'] = $amigo;
 	header('Location: perfil.php');
?>