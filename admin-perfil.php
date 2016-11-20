<?php
  include 'layouts/header.php';
  include 'layouts/menu.php';
  include 'con.php';
  
    if(isset($_SESSION['id']) && $_SESSION['id'] == 1) {
?>
<div class="container cadastro col-md-6">
    <h1>Alterar perfil de <?php echo $_POST['nome']; ?></h1>
	<form class="form-group" method="POST"  action="val-alteracao.php">
	    <div class="form-group">
            <label for="name">ID <?php echo trim($_POST['id']);?></label>
            <input type="hidden" class="form-control" name="id" placeholder="Nome" value="<?php echo trim($_POST['id']);?>">
        </div>
	    <div class="form-group">
            <label for="name">Nome Completo</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo trim($_POST['nome']);?>">
        </div>
        <div class="form-group">
            <label for="user">Usuario</label>
            <input type="text" class="form-control" name="user" placeholder="Apelido" value="<?php echo trim($_POST['user']);?>">
        </div>
        <div class="form-group">
            <label for="tel">Telefone</label>
            <input type="text" class="form-control" name="tel" placeholder="(11) 99999-9999" value="<?php echo trim($_POST['tel']);?>">
        </div>
        <div class="form-group">
            <label for="end">Endereço</label>
            <input type="text" class="form-control" name="end" placeholder="Endereço" value="<?php echo trim($_POST['end']);?>">
        </div>
        <button type="submit" class="btn btn-default">Gravar Alterações</button>
    </form>
</div>
<?php
    include 'layouts/footer.php';
    } else {
        header('Location: perfil.php');
    }
?>