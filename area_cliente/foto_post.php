<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: ../inicio.php');
}
include("../conexao.php");
if ( isset( $_FILES[ 'foto' ][ 'name' ] ) && $_FILES[ 'foto' ][ 'error' ] == 0 ){
	$arquivo_tmp = $_FILES[ 'foto' ][ 'tmp_name' ];
	$nome = $_FILES[ 'foto' ][ 'name' ];

	// Pega a extensão
	$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

    // Converte a extensão para minúsculo
	$extensao = strtolower ( $extensao );

    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
	if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
		$novoNome = uniqid ( time () ) . '.' . $extensao;

        // Concatena a pasta com o nome
		$destino = '../imagem/'.$_SESSION['user'].'/'.$novoNome;

        // tenta mover o arquivo para o destino
		if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
			/*echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
			echo ' < img src = "' . $destino . '" />';*/
			$texto = $_POST["texto-foto"];
			try{
				$stmt = $connection->prepare('INSERT INTO fotos (arquivo,id_usuario,created_at,updated_at) VALUES(:arquivo,:id,NOW(),NOW())');
				$stmt->execute(array(
					':id' => $_SESSION["user"],
					':arquivo' => $destino
				));
				$busca = $connection->query("SELECT * FROM fotos WHERE arquivo ='$destino'");
				$foto = $busca->fetch();
				$stmt = $connection->prepare('INSERT INTO post (id,texto,cod_img,created_at,updated_at) VALUES(:id,:texto,:cod,NOW(),NOW())');
				$stmt->execute(array(
					':id' => $_SESSION["user"],
					':texto' => $texto,
					':cod' => $foto["cod_img"]
				));
				header('Location: feed.php');
			}catch(PDOException $e) {
				echo 'Error: ' . $e->getMessage();
			}
		}
		else
			$_SESSION["erro_img"] = 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
	}
	else
		$_SESSION["erro_img"] = 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else{
	$_SESSION["erro_img"] =  'Você não enviou nenhum arquivo!';
}
header('Location: feed.php');
?>