<?php
	session_start();
	include("conexao.php");
	$email = $_POST['emaillogin'];
	$senha = $_POST['senhalogin'];
	$consulta = $connection->query("SELECT * FROM usuarios Where e_mail = '$email' AND senha = '$senha' AND type =  1");
	if($user = $consulta->fetch()){
		$_SESSION['user'] = $user["id"];
		header('Location: view_index.php');
	}
	else{
		$_SESSION['falha_login'] = true;	
		header("Location: tela_login.php");	
	}
?>