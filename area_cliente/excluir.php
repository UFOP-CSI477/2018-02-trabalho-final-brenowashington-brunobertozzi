<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: ../inicio.php');
}
include("../conexao.php");
try{
	$stmt = $connection->prepare("DELETE FROM usuarios Where id = ".$_SESSION['user']);
	$stmt->execute();
}catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}
unset($_SESSION['user']);
header('Location: ../inicio.php');	
?>