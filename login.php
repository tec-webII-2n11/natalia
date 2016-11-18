<?php include 'layouts/header.php'; ?>
<?php include 'layouts/menu.php'; ?>
<div class="container login">
	<h1>Login</h1>

<form class="form-inline" method="POST"  action="val-login.php">
  <div class="form-group">
    <label for="user">Usuario</label>
    <input type="text" class="form-control" name="user" placeholder="Usuário">
  </div>
  <div class="form-group"> </div>
  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" name="pass" placeholder="Senha">
  </div>
  <button type="submit" class="btn btn-default">Ok</button>
</form>
<br>
  <a href="cadastro.php"><p>Não tem login,cadastrar-se</p></a><br>
</div>
<?php include 'layouts/footer.php'; ?>
