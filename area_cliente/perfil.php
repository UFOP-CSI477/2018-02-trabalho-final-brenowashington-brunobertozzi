<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: ../inicio.php');
}
if (!isset($_GET['usuario']) && !isset($_SESSION['amigo'])) {
	$amigo = $_SESSION['user'];
}

include("../conexao.php");
if (isset($_GET['usuario'])) {
	$amigo = $_GET['usuario'];
}else if (isset($_SESSION['amigo'])){
	$amigo = $_SESSION['amigo'];
	unset($_SESSION['amigo']);
}

$consulta = $connection->query("SELECT * FROM usuarios Where id = ".$amigo);
if ($consulta->rowCount() == 0) {
	header('Location: ../inicio.php');
}

$user = $consulta->fetch();
if ($_SESSION['user'] == $user["id"]) {
	$proprio = true;
}

$consulta = $connection->query("SELECT * FROM amizades Where id_1 = ".$amigo." AND id_2 =".$_SESSION['user']);
if($consulta->rowCount() > 0){
	$amigos = true;
}

$consulta = $connection->query("SELECT * FROM solicitacao_amizade Where id_convidado = ".$amigo." AND id_pedinte =".$_SESSION['user']);

if ($consulta->rowCount()>0) {
	$solicitado = true;
}
$posts = $connection->query("SELECT * FROM post Where id = ".$amigo);

?>
<?php
include("menu.php");
if(isset($_SESSION["erro_img"])){
	echo "<script>alert('".$_SESSION["erro_img"]."');</script>";
	unset($_SESSION["erro_img"]);
}
?>

<div class="container">
	<div class="row perfil">
		<div class="col-md-4">
			<div class="container perfil-inicio">
				<div class="container">
					<?php
					if ($user['foto_perfil']!=NULL) {
						$busca_foto = $connection->query("SELECT * FROM fotos WHERE cod_img =".$user['foto_perfil']);
						$foto = $busca_foto->fetch();
						echo "<img class='imagem-perfil' src='".$foto["arquivo"]."'>";
					}
					?>
					<h3 class="nome-perfil"><?php echo $user['nome']; ?></h3>
				</div>
			</div>

			<?php
			if (!isset($proprio)) {
				if(isset($amigos)){
					echo "<form action='desfazer_amizade.php' method='post'>
					<input type='hidden' name='amigo' value='".$user["id"]."'>
					<button class='btn btn-lg btn-block botao-amizade'>Desfazer amizade!</button>
					</form>";
				}else if (isset($solicitado)) {
					echo "<form action='desfazer_solicitacao.php' method='post'>
					<input type='hidden' name='amigo' value='".$user["id"]."'>
					<button class='btn btn-lg btn-block botao-amizade'>Desfazer solicitação!</button>
					</form>";
				}
				else{
					echo "<form action='amizade.php' method='post'>
					<input type='hidden' name='amigo' value='".$user["id"]."'>
					<button class='btn btn-lg btn-block botao-amizade'>Adicionar amigo!</button>
					</form>";
				}
			}
			else{
				echo "<a class='btn btn-lg btn-block' href='editar_perfil.php'>Editar perfil</a>";
			}
			?>

			
			<?php
			if (isset($proprio)) {
				echo "<div class='informacoes-perfil'>";
				while ($pedido = $pedidos->fetch()) {
					$busca = $connection->query("SELECT * FROM usuarios Where id = ".$pedido["id_pedinte"]);
					$solicitante = $busca->fetch();
					echo "<div class='dropdown-item'>
					<div class='informacoes-post'>";
					if ($solicitante['foto_perfil']!=NULL) {
						$busca_foto = $connection->query("SELECT * FROM fotos WHERE cod_img =".$solicitante['foto_perfil']);
						$foto = $busca_foto->fetch();
						echo "<img src=".$foto["arquivo"].">";
					}
					echo "<h6>".$solicitante["nome"]."</h6>
					<form method='post' action='aceitar.php'>
					<input type='hidden' name='solicitante' value='".$solicitante["id"]."'>
					<button type='submit' name='perfil-user' class='btn btn-light'>Aceitar!</button>
					</input>
					</form>
					<form method='post' action='rejeitar.php'>
					<input type='hidden' name='solicitante' value='".$solicitante["id"]."'>
					<button type='submit' name='perfil-user' class='btn btn-light'>Rejeitar!</button>
					</input>
					</form>
					</div>
					</div>";
				}
				echo "</div>";
			}else{
				echo "<div class='informacoes-perfil justify-content-center'>
				<form class='form-group acoes-sussurro justify-content-center' id='publicar-sussurro' method='post' action='sussurrar_perfil.php'>
				<textarea class='form-control' id='texto_sussurro' name='texto_sussurro' placeholder='Sussure sua mensagem!'></textarea>
				<input type='hidden' name='sussurrado' value='".$user["id"]."'>
				<button type='submit' name='sussurrar_pessoa' class='justify-content-center'>
				<spa>
				<img src='../imagens_gerais/Sussurrar.png'>
				<h6>Sussurrar</h6>
				</span>
				</button>
				</form>
				</div>";
			}
			?>
			

		</div>

		<div class="col-md-8">
			<div class="container">



				<?php
				while ($post = $posts->fetch()) {
					$id_post =  $connection->query("SELECT * FROM usuarios Where id = ".$post["id"]);
					$dono = $id_post->fetch();
					echo "<div class='post'>
					<div class='informacoes-post'>";
					if ($dono['foto_perfil']!=NULL) {
						$busca_foto = $connection->query("SELECT * FROM fotos WHERE cod_img =".$dono['foto_perfil']);
						$foto = $busca_foto->fetch();
						echo "<img src=".$foto["arquivo"].">";
					}

					echo "<h6>".$dono["nome"]."</h6>
					<p>".$post["created_at"]."</p>
					<form method='get' action='perfil.php'>
					<input type='hidden' name='usuario' value='".$dono["id"]."'>
					<button type='submit' name='perfil-user' class='denuncia'>Ver perfil</button>
					</input>
					</form>
					</div>


					<div class='conteudo'>
					<p>".$post['texto']." </p>";
					if ($post['cod_img']!=NULL) {
						$busca_foto = $connection->query("SELECT * FROM fotos WHERE cod_img =".$post['cod_img']);
						$foto = $busca_foto->fetch();
						echo "<img src='".$foto['arquivo']."'>";
					}

					echo "</div>

					<div class='caixa-comentarios' id='espaco_comentarios".$post['cod_post']."'>
					<div class='comentario'>
					<img src='../imagens_gerais/Sigilo.png'>
					<p>Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro </p>

					</div>
					<div class='informacoes-comentario'>
					<p>06/11/2018 às 16:15</p>
					<button class='denuncia'>Denunciar</button>	
					</div>
					</div>
					<div class='acoes-comentario justify-content-center'>
					<form class='form-group' id='publicar-msg' method='post' class='conteudo' action='#' onsubmit='sussurrar(\"#texto_".$post['cod_post']."\",\"#".$post['cod_post']."\")' >
					<div class='form-group'>
					<textarea class='form-control' id='texto_".$post['cod_post']."' name='texto-post' placeholder='Sussurre neste post'></textarea>
					</div>
					<input type='hidden' id='".$post['cod_post']."' name='post' value='".$post['cod_post']."'>
					<button type='submit' name='sussurrar_post'>
					<span>
					<img src='../imagens_gerais/Sussurrar.png'>
					<h6>Sussurrar</h6>
					</span>
					</button>	
					</div>


					</form>
					</div>

					";
				}
				?>
			</div>
		</div>
	</div>
</div>

</body>
</html>