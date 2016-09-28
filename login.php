<?php include 'layouts/header.php'; ?>
<?php include 'layouts/menu.php'; ?>
<div class="container login">
	<h1>Login</h1>

<form class="form-inline">
  <div class="form-group">
    <label for="user">Usuario</label>
    <input type="text" class="form-control" id="user" placeholder="usuario">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">Email</label>
    <input type="email" class="form-control" id="email" placeholder="@hotmail.com">
  </div>
  <button type="submit" class="btn btn-default">Ok</button>
  <a href="cadastro.php">Não tem login,cadastrar-se</a><br>
</form>

</div>
<?php include 'layouts/footer.php'; ?>
