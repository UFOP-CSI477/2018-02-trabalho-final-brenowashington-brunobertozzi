<?php 
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: ../inicio.php');
}
include("../conexao.php");
$fotos = $connection->query("SELECT * FROM usuarios Where cod_img =".$foto." AND id_usuario = ".$_SESSION['user']);

$validade = $connection->query("SELECT * FROM usuarios Where senha =".$_POST["senha_antiga"]." AND id = ".$_SESSION['user']);
if ($validade->rowCount()==0) {
	$_SESSION["erro_senha"] = "Senha incorreta!";
	header('Location: editar_perfil.php');
}

$nome = $_POST["nome"];
$email = $_POST["email"];
$data = $_POST["datanasc"];
if ($_POST["senha_nova"]) {
	$senha = $_POST["senha_nova"];
}
else{
	$senha =  $_POST["senha_antiga"];
}
$foto = $_POST["foto_selecionada"];

$fotos = $connection->query("SELECT * FROM fotos Where cod_img =".$foto." AND id_usuario = ".$_SESSION['user']);
if($fotos->rowCount() == 0){
	$foto = NULL;
}
try{
	$stmt = $connection->prepare('UPDATE usuarios SET nome=:nome,data_nasc = :datanasc,e_mail = :email,foto_perfil = :foto_perfil,senha = :senha,updated_at = NOW() WHERE id = '.$_SESSION['user']);
	$stmt->execute(array(
		':nome' => $nome,
		':datanasc' => $data,
		':foto_perfil' => $foto,
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
header('Location: perfil.php');
?>