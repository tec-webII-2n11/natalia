<?php include 'layouts/header.php'; ?>
<?php include 'layouts/menu.php'; ?>
<div class="container cadastro">
	<h1>Cadastro</h1>
	<form class="form-group">
  <div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" id="nome" placeholder="Nome">
  </div>
   <div class="form-group">
    <label for="user">Usuario</label>
    <input type="text" class="form-control" id="user" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">Email</label>
    <input type="email" class="form-control" id="email" placeholder="@hotmail.com">
  </div>
   <div class="form-group">
    <label for="pass">Senha</label>
    <input type="password" class="form-control" id="pass" placeholder="">
  </div>
  <button type="submit" class="btn btn-default">Ok</button>
  <a href="cadastro.php">Não tem login,cadastrar-se</a><br>
</form>


</div>
<?php include 'layouts/footer.php'; ?>