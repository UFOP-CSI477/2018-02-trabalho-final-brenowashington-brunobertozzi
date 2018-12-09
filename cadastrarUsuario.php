<?php
	session_start();
	if (isset($_SESSION['user'])) {
		header('Location: inicio.php');
	}
	
	include("conexao.php");
	$nome = $_POST["nome"];
	$email = $_POST["emailcadastro"];
	$data = $_POST["datanasc"];
	$senha = $_POST["senhacadastro"];

	try{
		$stmt = $connection->prepare('INSERT INTO usuarios (nome,data_nasc,e_mail,senha,created_at,updated_at) VALUES(:nome,:datanasc,:email,:senha,NOW(),NOW())');
 		$stmt->execute(array(
    		':nome' => $nome,
    		':datanasc' => $data,
    		':email' => $email,
    		':senha' => $senha
  		));
  		$usuario = $connection->query("SELECT * FROM usuarios WHERE nome = '$nome'");
  		if ($user = $usuario->fetch()) {
  			$_SESSION['user'] = $user["id"];
  			mkdir(__DIR__.'/imagem/'.$user["id"].'/', 0777, true);
  			header("Location: area_cliente/feed.php");
  		}else{
  			$_SESSION['email_repetido'] = true;
  			header("Location: inicio.php");	
  		}
	}catch(PDOException $e) {
 		echo 'Error: ' . $e->getMessage();
 	}
?>