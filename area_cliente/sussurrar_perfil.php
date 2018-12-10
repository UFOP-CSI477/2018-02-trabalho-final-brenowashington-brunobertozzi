<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: ../inicio.php');
}
if (!isset($_POST['texto_sussurro']) || !isset($_POST['sussurrado'])) {
	header('Location: ../inicio.php');
}
include("../conexao.php");
$sussurrado = $_POST['sussurrado'];
$texto = $_POST['texto_sussurro'];
if($sussurrado == $_SESSION['user']){
	header('Location: ../inicio.php');
}
try{
  	$stmt = $connection->prepare('INSERT INTO sussurros (texto,id_remetente,id_dest,created_at,updated_at) VALUES(:texto,:id_remetente,:id_dest,NOW(),NOW())');
 		$stmt->execute(array(
    		':texto' => $texto,
    		':id_remetente' => $_SESSION['user'],
        ':id_dest' => $sussurrado
  		));
    echo "Fez a inserção";
	}catch(PDOException $e) {
 		echo 'Error: ' . $e->getMessage();
 	}
 	/*$_SESSION['amigo'] = $sussurrado;
  header('Location: perfil.php');*/
?>