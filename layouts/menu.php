<?php session_start(); ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php
        if(isset($_SESSION['user'])) {
          echo '<a class="navbar-brand" href="./perfil.php">' . $_SESSION['nome']  .'</a>';
        } else {
          echo '<a class="navbar-brand" href="./home.php">Espaço Nidra</a>';
        }
      ?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="horario.php">Horarios</a></li>
        <?php
        if(isset($_SESSION["id"])) {
          echo '<li><a href="perfil.php">Perfil</a></li>';
          if ($_SESSION['id'] == 1) {
            echo '<li><a href="cadastros.php">Cadastros</a></li>';
            echo '<li><a href="grade.php">Grade</a></li>';
          }
        } else {
          echo '<li><a href="login.php">Login</a></li>';
        }
      ?>
        <li><a href="contato.php">Contato</a></li>
        <li><a href="saibamais.php">Saiba Mais</a></li>
        <?php 
          if(isset($_SESSION['id'])) {
            echo '<li><a href="logout.php" style="color: rgb(143, 0, 179)">Sair</a></li>'; 
          }
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

