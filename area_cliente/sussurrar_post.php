<?php  
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: ../inicio.php');
}
include("../conexao.php");
$texto = $_POST["texto"];
$id_post = $_POST["id_post"];
try{
	$stmt = $connection->prepare('INSERT INTO sussurros (texto,id_remetente,id_post,created_at,updated_at) VALUES(:texto,:id_remet,:id_post,NOW(),NOW())');
	$stmt->execute(array(
		':texto' => $texto,
		':id_remetente' => $_SESSION['user'],
		':id_post' => $id_post
	));
}catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}
$_SESSION['amigo'] = $sussurrado;
header('Location: perfil.php');
?>