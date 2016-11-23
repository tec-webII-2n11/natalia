<?php
  include 'layouts/header.php';
  include 'layouts/menu.php';
  
 if(isset($_SESSION['id'])) {
?>
<div class="container cadastro col-md-4">
    <h1>Alterar perfil de <?php echo $_SESSION['nome']; ?> </h1>
	<form class="form-group" method="POST"  action="val-alteracao.php">
	    <div class="form-group">
            <label for="name">ID: <?php echo $_SESSION['id'];?></label>
            <input type="hidden" class="form-control" name="id" placeholder="Nome" value="<?php echo $_SESSION['id'];?>">
        </div>
	    <div class="form-group">
            <label for="name">Nome Completo</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $_SESSION['nome'];?>">
        </div>
        <div class="form-group">
            <label for="user">Usuario</label>
            <input type="text" class="form-control" name="user" placeholder="Apelido" value="<?php echo $_SESSION['user'];?>">
        </div>
        <div class="form-group">
            <label for="tel">Telefone</label>
            <input type="text" class="form-control" name="tel" placeholder="(11) 99999-9999" value="<?php echo $_SESSION['tel'];?>">
        </div>
        <div class="form-group">
            <label for="end">Endereço</label>
            <input type="text" class="form-control" name="end" placeholder="Endereço" value="<?php echo $_SESSION['end'];?>">
        </div>
        <div class="form-group">
            <label for="pass">Senha</label>
            <input type="password" class="form-control"name="oldpass" placeholder="Senha Atual">
        </div>
        <div class="form-group">
            <label for="pass">Senha</label>
            <input type="password" class="form-control"name="newpass" placeholder="Nova Senha">
        </div>
        <div class="form-group">
            <label for="pass">Confirmação de Senha</label>
            <input type="password" class="form-control"name="cnewpass" placeholder="Confirmação de Nova Senha">
        </div>
        <button type="submit" class="btn btn-default">Salvar</button>
    </form>
</div>
<?php
    include 'layouts/footer.php';
  }
?>