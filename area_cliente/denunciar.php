<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: ../inicio.php');
}
if (!isset($_POST['sussurro-denunciado'])) {
	header('Location: ../inicio.php');
}
$denunciado = $_POST['sussurro-denunciado'];
include("../conexao.php");
try{
	$busca = $connection->query("SELECT * FROM sussurros Where cod_sussurro =".$denunciado); /*AND id_dest = ".$_SESSION['user']");*/
	if($busca->rowCount() > 0){
		$sussurro = $busca->fetch();
		$stmt = $connection->prepare('INSERT INTO denuncias (id,cod_sussurro,created_at,updated_at) VALUES(:id,:cod,NOW(),NOW())');
	$stmt->execute(array(
		':id' => $sussurro["id_remetente"],
		':cod' => $denunciado
	));
	$stmt = $connection->prepare('UPDATE sussurros SET valido = :val WHERE cod_sussurro = '.$denunciado);
	$stmt->execute(array(
		':val' => 1
	));
	}
	header('Location: feed.php');
}catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}
?>