<?php
	session_start();
	if (isset($_SESSION['user'])) {
		header('Location: area_cliente/feed.php');
	}
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Spotted</title>

	<link rel="shortcut icon" type="image/ico" href="imagens_gerais/Sigilo.ico"/>
	<link rel="stylesheet" type="text/css" href="css/geral.css">
	<link rel="stylesheet" type="text/css" href="css/menu_superior.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/perfil.css">
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/inicio.js"></script>

</head>

<body class="fundo">

	<div class="navbar menu-superior row">
		<div class="col-md-5 offset-md-1">
			<div>
				<a href="">
					<span> 
						<img src="imagens_barra/logotipo.png" class="logo">
					</span>
				</a>
			</div>

		</div>

		<div class="col-md-5 offset-md-1">
			<div class="menu-superior-perfil navbar-nav">
				
				<form class="menu-superior-form login" id="login" method="post" action="login.php">
					<input class="form-control" type="email" placeholder="E-mail" name="emaillogin" id="emaillogin">
					<input class="form-control" type="password" name="senhalogin" id="senhalogin" placeholder="Senha">
					<button type="submit" name="logar">Login</button>
				</form>
			</div>
		</div>
	</div>


	<div class="row perfil">
		<div class="col-md-1">

		</div>

		<div class="col-md-4">
			
			<div class="container">
				
				<img class="conecte-se" src="imagens_inicio/conecte-se.png">

			</div>

		</div>

		<div class="col-md-6">
			<div class="container">

				<div class="cadastro post">
					<h1>Cadastre-se</h1>
					<h3>Crie sua conta gratuitamente</h3>
					<form id="cadastrar" method="post" action="cadastrarUsuario.php">
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome completo">
						</div>

						<div class="form-group">
							<label for="emailcadastro">E-mail:</label>
							<input type="email" class="form-control" id="emailcadastro" name="emailcadastro" placeholder="E-mail">
						</div>

						<div class="form-group">
							<label for="data-nasc">Data de nascimento:</label>
							<input type="date" name="datanasc" id="datanasc" class="form-control">
						</div>

						<div class="form-group">
							<label for="senha-cadastro">Senha:</label>
							<input type="password" class="form-control" id="senhacadastro" name="senhacadastro" placeholder="Senha">
						</div>

						<div class="form-group">
							<button type="submit" name="Cadastrar" id="efetuarcadastro" class="btn">Cadastrar</button> 
						</div>
					</form>
				</div>

			</div>
		</div>

		<div class="col-md-1">

		</div>
	</div>

	<?php 
		if(isset($_SESSION['email_repetido'])){
			echo "<script>alert('Esse e-mail já está cadastrado!');</script>";
			unset($_SESSION['email_repetido']);
		}

		if (isset($_SESSION['falha_login'])) {
			echo "<script>alert('Informações de login não existentes!');</script>";
			unset($_SESSION['falha_login']);
		}
	?>

</body>

</html>