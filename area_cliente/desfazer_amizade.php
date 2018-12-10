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
	$stmt = $connection->prepare("DELETE FROM amizades Where id_1 = ".$amigo." AND id_2 =".$_SESSION['user']);
	$stmt->execute();
	$stmt = $connection->prepare("DELETE FROM amizades Where id_2 = ".$amigo." AND id_1 =".$_SESSION['user']);
	$stmt->execute();
}catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}
$_SESSION['amigo'] = $_SESSION['user'];
header('Location: perfil.php');
?>