<?php  
session_start();
if (!isset($_SESSION['user'])) {
	return false;
}
include("../conexao.php");
if(!isset($_POST["texto"]) || !isset($_POST["id_post"])){
	return false;
}
$texto = $_POST["texto"];
$id_post = $_POST["id_post"];

try{
	$consulta = $connection->query("SELECT * FROM post Where cod_post = ".$id_post);
	if ($consulta->rowCount()==0) {
		return false;
	}
	$post = $consulta->fetch();
	$stmt = $connection->prepare('INSERT INTO sussurros (texto,id_remetente,id_dest,id_post,created_at,updated_at) VALUES (:texto,:id_remetente,:id_dest,:id_post,NOW(),NOW())');
	$stmt->execute(array(
		':texto' => $texto,
		':id_remetente' => $_SESSION['user'],
		':id_post' => $id_post,
		':id_dest' => $post["id"]
	));
	return true;
}catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}
?>