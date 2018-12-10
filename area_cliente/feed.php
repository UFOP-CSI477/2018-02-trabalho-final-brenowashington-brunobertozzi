<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: ../inicio.php');
}
include("../conexao.php");
$consulta = $connection->query("SELECT * FROM usuarios Where id = ".$_SESSION['user']);
$user = $consulta->fetch();

$posts = $connection->query("SELECT * FROM post Where id = ".$_SESSION['user']." OR id = (SELECT id_2 FROM amizades WHERE id_1 =".$_SESSION['user'].")");

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
				<a href="" >
					<span>
						<img src="../imagens_perfil/perfil.jpg">
						<h3><?php echo $user['nome']; ?></h3>
					</span>
				</a>
			</div>

			<div class="informacoes-perfil">
				<div class="titulo-informacoes">
					<img src="../imagens_perfil/Informacoes_pessoais.png">
					<h5>Sussurros</h5>
				</div>

				<div class="sussurros">
					<div>
						<img src="../imagens_gerais/Sigilo.png">
						<span>
							<p>Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro </p>
							<button class="denuncia" onclick="denunciar('#sussurro-1')">Denunciar</button>
							<input type="hidden" name="sussurro-1" id="sussurro-1" value="1">
						</span>
					</div>

					<div>
						<img src="../imagens_gerais/Sigilo.png">
						<span>
							<p>Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro Sussuro </p>
							<button class="denuncia">Denunciar</button>
						</span>
					</div>

				</div>

			</div>

		</div>

		<div class="col-md-8">
			<div class="container">

				<div id="criar-post" class="post">
					<div class="acoes-comentario">
						<button name="ativar-publicacao" id="ativar-publicacao">
							<span>
								<img src="../imagens_gerais/Texto.png">
								<h6>Publicação</h6>
							</span>
						</button>

						<div>
							<div id="barra-comentario" class="barrinha"></div>
						</div>

						<button name="ativar-foto" id="ativar-foto">
							<span>
								<img src="../imagens_gerais/Foto.png">
								<h6>Foto</h6>
							</span>
						</button>	
					</div>

					<div class="conteudo">
						<form class="form-group" id="publicar-msg" method="post" action="texto_post.php">
							<textarea class="form-control" id="texto-post" name="texto-post" placeholder="No que está pensando?"></textarea>
							<button type="submit" class="btn" id="Enviar-post" >Publicar</button>
						</form>

						<form class="form-group" id="publicar-foto" style="display: none" enctype="multipart/form-data" method="post" action="foto_post.php">
							<textarea class="form-control" id="texto-foto" name="texto-foto" placeholder="Digite uma legenda para sua imagem!"></textarea>
							<div class="custom-file" style="margin-top: 5px;margin-bottom: 5px">
								<input type="file" name="foto" id="foto-post" class="custom-file-input">
								<label for="foto" class="custom-file-label">Sua foto</label>
							</div>		
							<button type="submit" class="btn" id="Enviar-foto" >Publicar</button>
						</form>
					</div>

				</div>


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