<?php
	session_start();
	include("conexao.php");
	$email = $_POST['emaillogin'];
	$senha = $_POST['senhalogin'];
	$consulta = $connection->query("SELECT * FROM usuarios Where e_mail = '$email' AND senha = '$senha'");
	if($user = $consulta->fetch()){
		$_SESSION['user'] = $user["id"];
		if(isset($_SESSION['falha_login'])){
			unset($_SESSION['falha_login']);
		}
		header('Location: area_cliente/feed.php');
	}
	else{
		$_SESSION['falha_login'] = true;	
		header("Location: inicio.php");	
	}
?>