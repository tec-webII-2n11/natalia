<?php include 'layouts/header.php'; ?>
<?php include 'layouts/menu.php'; ?>
<div class="container cadastro col-xs-3">
	<h1>Cadastro</h1>
	<form class="form-group" method="POST"  action="val-etapa1.php">
  <div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="nome" placeholder="Nome">
  </div>
   <div class="form-group">
    <label for="user">Usuario</label>
    <input type="text" class="form-control" name="user" placeholder="Apelido">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" placeholder="usuario@email.com">
  </div>
   <div class="form-group">
    <label for="pass">Senha</label>
    <input type="password" class="form-control"name="pass" placeholder="******">
  </div>
  <button type="submit" class="btn btn-default">Ok</button>
</form>


</div>
<?php include 'layouts/footer.php'; ?>