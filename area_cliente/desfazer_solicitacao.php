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
try {
  $stmt = $connection->prepare("DELETE FROM solicitacao_amizade Where id_convidado = ".$amigo." AND id_pedinte =".$_SESSION['user']);
  $stmt->execute();
     
  echo $stmt->rowCount(); 
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

$_SESSION['amigo'] = $amigo;
header('Location: perfil.php');
?>