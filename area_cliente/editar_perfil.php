<?php 
session_start();
if (!isset($_SESSION['user'])) {

}
include("../conexao.php");
$consulta = $connection->query("SELECT * FROM usuarios Where id = ".$_SESSION['user']);
$user = $consulta->fetch();
$fotos = $connection->query("SELECT * FROM fotos Where id_usuario = ".$_SESSION['user']);

include("menu.php");
if(isset($_SESSION["erro_senha"])){
	echo "<script>alert('".$_SESSION["erro_senha"]."');</script>";
}
?>

<div class="container">
	<div class="cadastro post">
		<h1>Editar perfil</h1>
		<form id="editar" method="post" action="edicao.php">
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" name="nome" id="nome" value=<?php echo "'".$user["nome"]."'"; ?>>
			</div>

			<div class="form-group">
				<label for="emailcadastro">E-mail:</label>
				<input type="email" class="form-control" id="email" name="email" value=<?php echo "'".$user["e_mail"]."'"; ?>>
			</div>

			<div class="form-group">
				<label for="datanasc">Data de nascimento:</label>
				<input type="date" name="datanasc" id="datanasc" class="form-control" value=<?php echo "'".$user["data_nasc"]."'"; ?>>
			</div>

			<div class="fotos-enviadas">
				<h3>Escolha sua foto de perfil</h3>
				<?php
				$i = 0;
				while ($foto = $fotos->fetch()) {
					if($i==0){
						echo "<div class='conteudo-perfil'>";
					}
					echo "<div onclick='selecionar_imagem(".$foto["cod_img"].")'>
					<img id='foto_".$foto["cod_img"]."' src='".$foto["arquivo"]."'>
					</div>
					";
					if($i==3){
						echo "</div>";
					}
					$i++;
				}
				?>
			</div>

			<input type="hidden" id="foto_selecionada" name="foto_selecionada" value="-1">

			<div class="form-group">
				<label for="senha-cadastro">Senha:</label>
				<input type="password" class="form-control" id="senha_antiga" name="senha_antiga" placeholder="Digite a senha atual">
			</div>

			<div class="form-group">
				<label for="senha-cadastro">Senha:</label>
				<input type="password" class=<?php if(isset($_SESSION["erro_senha"])){
					echo "'is-invalid form-control'";
					unset($_SESSION["erro_senha"]);
				}else{
					echo "'form-control'";
				}?> id="senha_nova" name="senha_nova" placeholder="Digite a nova senha" >
			</div>

			<div class="form-group">
				<button type="submit" name="botao_editar" id="botao_editar" class="btn">Editar</button> 
			</div>
		</form>



		<form id="excluir_user" class="justify-content-end" method="post" action="excluir.php">
			<button type="submit" name="botao_excluir" id="botao_excluir" class="btn">Excluir conta!</button> 
		</form>
	</div>
</div>

</body>
</html>