

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Area Administrativa - Login</title>

 	<link rel="icon" href="imagens/Sigilo.ico">
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.css">

</head>

<body>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #582C4D;">
    	<div class="container">
     		<div class="navbar-header d-flex" >
      			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        			<span class="navbar-toggler-icon"></span>
      			</button>

     		 	<a href="../inicio.php">
       				<span> 
        				<img src="imagens/logotipo.png" class="logo">
      				</span>
    			</a>   
			</div>

 			<div class="collapse navbar-collapse justify-content-center" id="conteudoNavbarSuportado">
				<ul class="navbar-nav">
					<li class="nav-item">
      					<a href="perfil.php" class="nav-link text-light">Home</a>
    				</li>       

    				<li class="nav-item">
     					<a class="nav-link text-light" href="#">Meu site</a>
   					</li>


				</ul>
			</div>
		</div>
	</nav>


	<div class="container">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header">
				<img src="imagens/adm30.png">
				Login - Area Administrativa
			</div>
			<div class="card-body">
				<form id="login" method="post" action="login.php">
					<div class="form-group">
						<label for="email">Email</label>
						<input class="form-control" type="email" name="emaillogin" id="emaillogin" placeholder="Digite seu E-mail">
					</div>

					<div class="form-group">
						<label for="senha">Senha</label>
						<input class="form-control" type="password" name="senhalogin" id="senhalogin" placeholder="Digite sua Senha">
					</div>

					<div class="form-group">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="form-check-input">
								Lembrar minha senha. 
							</label>
						</div>
					</div>	
					<button type="submit" name="logar" class="btn botao btn-block">
						<span class="cor_texto">
							Logar
						</span>
					</button>

					<div class="text-center">
						<a href="#" class="d-block small mt-3">Registrar</a>	
						<a href="#" class="d-block small ">Esqueceu a Senha?</a>	
					</div>				
				</form>
			</div>
		</div>
	</div>

	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>