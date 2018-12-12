<?php

include("conexao.php");

$id = $_POST['excluir'];

try{
	$stmt = $connection->prepare("DELETE FROM usuarios Where id = ".$id);
	$stmt->execute();
}catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}
unset($_SESSION['user']);
header('Location: view_excluir_usuario.php');	
?>