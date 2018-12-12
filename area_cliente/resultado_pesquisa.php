<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_GET["campo_pesquisa"])) {
	header('Location: ../inicio.php');
}
include("../conexao.php");
$pesquisa = $_GET["campo_pesquisa"];
$consulta = $connection->query("SELECT * FROM usuarios Where nome LIKE '%".$pesquisa."%'");
if ($consulta->rowCount() == 0) {
	$erro = true;
}

$c_usuario = $connection->query("SELECT * FROM usuarios Where id = ".$_SESSION['user']);
$user = $c_usuario->fetch();

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

			<div class="informacoes-perfil">
				<div class="titulo-informacoes">
					<img src="../imagens_perfil/Informacoes_pessoais.png">
					<h5>Sussurros</h5>
				</div>

				<div class="sussurros">
					<?php
						while ($sussurro = $sussurros->fetch()) {
							echo "<div>
						<img src='../imagens_gerais/Sigilo.png'>
						<span>
							<p>".$sussurro["texto"]."</p>
							<form method='post' action='denunciar.php'>
							<button type='submit' class='denuncia'>Denunciar</button>
							<input type='hidden' name='sussurro-denunciado' value='".$sussurro["cod_sussurro"]."'>
							</form>
						</span>
					</div>";
						}
					?>
				</div>

			</div>

		</div>

		<div class="col-md-8">
			<div class="container">

				<?php
				if (isset($erro) && $erro == true) {
					echo "<div class='informacoes-perfil'>
					<div class='informacoes-post'>
					<h6>Nenhum usuário encontrado</h6>
					</div>
					</div>";
				}
				else{
					while ($pessoa = $consulta->fetch()) {
						echo "<div class='informacoes-perfil'>
						<div class='informacoes-post'>";
						if ($pessoa['foto_perfil']!=NULL) {
							$busca_foto = $connection->query("SELECT * FROM fotos WHERE cod_img =".$pessoa['foto_perfil']);
							$foto = $busca_foto->fetch();
							echo "<img src=".$foto["arquivo"].">";
						}
						echo "<h6>".$pessoa["nome"]."</h6>
						<form method='get' action='perfil.php'>
						<input type='hidden' name='usuario' value='".$pessoa["id"]."'>
						<button type='submit' name='perfil-user' class='denuncia'>Ver perfil</button>
						</input>
						</form>
						</div>
						</div>";
					}
				}
				?>
				


			</div>
		</div>
	</div>
</div>

</body>
</html>