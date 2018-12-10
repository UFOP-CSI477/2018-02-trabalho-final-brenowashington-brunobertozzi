<?php

$pedidos = $connection->query("SELECT * FROM solicitacao_amizade Where id_convidado = ".$_SESSION['user']);
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link rel="shortcut icon" type="image/ico" href="../imagens_gerais/Sigilo.ico"/>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/menu_superior.css">
  <link rel="stylesheet" type="text/css" href="../css/geral.css">
  <link rel="stylesheet" type="text/css" href="../css/perfil.css">

  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="../js/perfil.js"></script>


</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #582C4D;">

    <div class="container">

     <div class="navbar-header d-flex" >
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a href="">
       <span> 
        <img src="../imagens_barra/logotipo.png" class="logo">
      </span>
    </a>   

    <form class="form-inline" id="pesquisar" method="get" action="resultado_pesquisa">
     <input name="campo_pesquisa" id="campo_pesquisa" class="form-control mr-sm-1" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
     <button class="btn btn-outline-light" type="submit">Pesquisar</button>
   </form> 

 </div>

 <div class="collapse navbar-collapse justify-content-center" id="conteudoNavbarSuportado">

   <ul class="navbar-nav">

     <li class="nav-item">
      <a href="perfil.php" class="nav-link text-light">Perfil</a>
    </li>       

    <li class="nav-item">
     <a class="nav-link text-light" href="feed.php">Inicio</a>
   </li>

   <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span>
       <img src="../imagens_barra/Not_amizades.png" class="menu-superior-not">
     </span>
   </a>

   <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <?php
    
    ?>
  </div> -->
</li>

<li class="nav-item">
  <a class="nav-link disabled text-light" href="../sair.php">Sair</a>
</li>
</ul>

</div>
</div>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>