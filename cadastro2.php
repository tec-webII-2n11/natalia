<?php include 'layouts/header.php'; ?>
<?php include 'layouts/menu.php'; ?>
<div class="container cadastro col-xs-3">
	<h1>Cadastro - Etapa 2</h1>
	<form class="form-group" method="POST"  action="val-etapa2.php">
	 <input type="hidden" name="nome" value="<?php echo $nome; ?>"> 
		<input type="hidden" name="email" value="<?php echo $email; ?>"> 
		<input type="hidden" name="user" value="<?php echo $user; ?>"> 
		<input type="hidden" name="pass" value="<?php echo $pass; ?>"> 
  <div class="form-group">
    <label for="tel">Telefone</label>
    <input type="text" class="form-control" name="tel" placeholder="(11) 99999-9999">
  </div>
   <div class="form-group">
    <label for="end">Endereço</label>
    <input type="text" class="form-control" name="end" placeholder="Endereço">
  </div>
  <button type="submit" class="btn btn-default">Ok</button>
</form>

</div>
<?php include 'layouts/footer.php'; ?>