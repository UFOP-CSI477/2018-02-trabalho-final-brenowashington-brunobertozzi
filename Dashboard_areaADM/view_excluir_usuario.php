<?php 

	include("conexao.php");

	$usuarios = $connection -> query("SELECT * FROM usuarios");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale = 1, shrink-to-fit=no">
	<title>Area Administrativa</title>

	<link rel="icon" href="imagens/Sigilo.ico">
	<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bibliotecas/datatables/dataTables.bootstrap4.css">	
	<link rel="stylesheet" type="text/css" href="css/sb-admin.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<body id="page-top">
	<!-- navegação !-->

	<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" id="mainNav" style="background-color: #582C4D;">

     	<a href="../inicio.php">
       		<span> 
        		<img src="imagens/logotipo.png" class="logo">
      		</span>
    	</a> 

		<a class="navbar-brand" href="view_index.php">Area Administrativa</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
		data-target="#navbarCurso" aria-control="navbarCurso" aria-expanded="false" aria-label="Navegação Toggle">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="navbarCurso" class="collapse navbar-collapse">
			<ul class="navbar-nav navbar-sidenav" id="linksaccordion">
				<li class="nav-item" data-toggle="tooltip" data-placement="right">
					<a class="nav-link" href="#">
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Dashboard</span>
					</a>
				</li>
				<!-- -->
				<li class="nav-item" data-toggle="tooltip" data-placement="right">
					<a class="nav-link nav-link-collapse collapse" href="#linkstabelas"
					data-toggle="collapse" data-parent="#linksaccordion">
						<i class="fa fa-fw fa-table"></i>
						<span class="nav-link-text">Usuarios</span>
					</a>
					<ul class="sidenav-second-level collapse" id="linkstabelas">
						<li>
							<a href="view_lista_usuario.php">Lista de Úsuarios</a>
						</li>
						<li>
							<a href="view_add_usuario.php">Adicionar Usuario</a>
						</li>
						<li>
							<a href="#">Remover Usuario</a>
						</li>
					</ul>
				</li>
				<!-- -->
				<li class="nav-item" data-toggle="tooltip" data-placement="right">
					<a class="nav-link nav-link-collapse collapse" href="#linkscomponentes"
					data-toggle="collapse" data-parent="#linksaccordion">
						<i class="fa fa-fw fa-wrench"></i>
						<span class="nav-link-text">Componentes</span>
					</a>
					<ul class="sidenav-second-level collapse" id="linkscomponentes">
						<li>
							<a href="view_denuncias.php">Denuncias</a>
						</li>
						<li>
							<a href="view_lista_sussurros.php">Lista de sussuros</a>
						</li>
						<li>
							<a href="view_lista_amizades.php">Lista de amizades</a>
						</li>
					</ul>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right">
					<a class="nav-link nav-link-collapse collapse" href="#linkspagina"
					data-toggle="collapse" data-parent="#linksaccordion">
						<i class="fa fa-fw fa-file"></i>
						<span class="nav-link-text">Páginas</span>
					</a>
					<ul class="sidenav-second-level collapse" id="linkspagina">
						<li>
							<a href="tela_login.php">Página Login</a>
						</li>
						<li>
							<a href="recuperar_senha.php">Página Recuperar</a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="navbar-nav sidenav-toggler">
				<li class="nav-item">
					<a id="sidenavToggler" class="nav-link text-center">
						<i class="fa fa-fw fa-angle-left"></i>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown"
					href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-fw fa-envelope"></i>
						<span class="d-lg-none">
							Mensagens
							<span class="badge badge-pill badge-primary">12 novas</span>
						</span>
						<span class="indicator text-primary d-none d-lg-block">
							<i class="fa fa-fw fa-circle"></i>
						</span>
					</a>

					<div class="dropdown-menu" aria-labelledby="messagesDropdown">
						<h6 class="dropdown-header">Novas Mensagens</h6>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">
							<strong>José Francisco</strong>
							<span class="small float-right text-muted">14:30</span>
							<div class="dropdown-message small">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. 
							</div>
							<div class="dropdown-divider"></div>
						</a>
						<a class="dropdown-item" href="#">
							<strong>Maria Carolina</strong>
							<span class="small float-right text-muted">14:30</span>
							<div class="dropdown-message small">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. 
							</div>
							<div class="dropdown-divider"></div>
						</a>
						<a class="dropdown-item" href="#">
							<strong>Joice da Silva</strong>
							<span class="small float-right text-muted">14:30</span>
							<div class="dropdown-message small">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. 
							</div>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item small"> Ver todas Mensagens</a>
						</a>
						

					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown"
					href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-fw fa-bell"></i>
						<span class="d-lg-none">
							Alertas
							<span class="badge badge-pill badge-warning">5 novos</span>
						</span>
						<span class="indicator text-warning d-none d-lg-block">
							<i class="fa fa-fw fa-circle"></i>
						</span>
					</a>
					<div class="dropdown-menu" aria-labelledby="alertsDropdown">
						<h6 class="dropdown-header">Novos Alertas</h6>
						<div class="dropdown-divider"></div>
						<a  class="dropdown-item" href="#">
							<span class="text-success">
								<strong>
									<i class="fa fa-fw fa-long-arrow-up"></i>
									Atualização de Estado
								</strong>
							</span>
							<span class="small float-right text-muted">14:30</span>
							<div class="dropdown-message small">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. 
							</div>
							<div class="dropdown-divider"></div>
						</a>
						<a  class="dropdown-item" href="#">
							<span class="text-danger">
								<strong>
									<i class="fa fa-fw fa-long-arrow-down"></i>
									Atualização de Estado
								</strong>
							</span>
							<span class="small float-right text-muted">14:30</span>
							<div class="dropdown-message small">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. 
							</div>
							<div class="dropdown-divider"></div>
						</a>
						<a  class="dropdown-item" href="#">
							<span class="text-success">
								<strong>
									<i class="fa fa-fw fa-long-arrow-up"></i>
									Atualização de Estado
								</strong>
							</span>
							<span class="small float-right text-muted">14:30</span>
							<div class="dropdown-message small">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. 
							</div>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item small"> Ver todos Alertas</a>
						</a>

					</div>
				</li>

				<li class="nav-item">
					<form class="form-inline my-2 my-lg-0 mr-lg-2">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Pesquisar por...">
							<span class="input-group-btn">
								<button class="btn  botao" type="button">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="tela_login.php">
						Logout
					</a>
				</li>
				
			</ul>

		</div>
	</nav>
	<div class="content-wrapper martop">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="view_index.php">Home</a>
				</li>
				<li class="breadcrumb-item">
					Página em Branco
				</li>
			</ol>
			<div class="row">
				<div class="col-12">
					<h1>Excluir</h1>	
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i> Tabela de Usuarios
				</div>
				<div class="card-body">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nome</th>
								<th>Data Nascimento</th>
								<th>E-mail</th>
								<th>Senha</th>
								<th>Tipo</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Id</th>
								<th>Nome</th>
								<th>Data Nascimento</th>
								<th>E-mail</th>
								<th>Senha</th>
								<th>Tipo</th>
								<th>Excluir</th>
							</tr>
						</tfoot>
						<tbody>
								
								<?php
									while ($usuario = $usuarios->fetch()){
										echo "<tr>";
										echo"<th>".$usuario["id"]."</th>";
										echo"<th>".$usuario["nome"]."</th>";
										echo"<th>".$usuario["data_nasc"]."</th>";
										echo"<th>".$usuario["e_mail"]."</th>";
										echo"<th>".$usuario["senha"]."</th>";
										echo"<th>".$usuario["type"]."</th>";
										echo"<th><form method='post' action='excluir.php'>";
										echo "<input type='hidden' name='excluir' value=".$usuario["id"].">";
										echo "<button type='submit' name='botao_excluir' id='botao_excluir' class='btn'>Excluir conta!</button> ";
										echo"</form></th>";
										echo "</tr>";
									}
								?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<footer class="sticky-footer">
			<div class="container">
				<div class="text-center">
					<small>Site desenvolvido pela dupla sertaneja Breno e Bruno (B&B)! Só sucesso 2018</small>
				</div>
			</div>
		</footer>
	</div>


	<script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="bibliotecas/datatables/jquery.dataTables.js"></script>
	<script src="bibliotecas/datatables/dataTables.bootstrap4.js"></script>
	<script type="text/javascript" src="js/sb-admin.min.js"></script>
	<script type="text/javascript" src="js/sb-admin-datatables.min.js"></script>
	
</body>
</html>