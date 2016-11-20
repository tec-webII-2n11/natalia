<?php 
    include 'layouts/header.php';
    include 'layouts/menu.php';
    if(isset($_SESSION['id'])) {
?>
<div class="container cadastro col-md-4">
    <h1>Perfil de <?php echo $_SESSION['nome']; ?> </h1>
	<form class="form-group" method="POST"  action="alterar-perfil.php">
	    <div class="form-group">
            <label for="name">ID: <?php echo $_SESSION['id']?></label>
        </div>
	    <div class="form-group">
            <label for="name">Nome Completo</label>
            <p><?php echo $_SESSION['nome']; ?></p>
        </div>
        <div class="form-group">
            <label for="user">Usuario</label>
            <p><?php echo $_SESSION['user']; ?></p>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <p><?php echo $_SESSION['email']; ?></p>
        </div>
        <div class="form-group">
            <label for="tel">Telefone</label>
            <p><?php echo $_SESSION['tel']; ?></p>
        </div>
        <div class="form-group">
            <label for="end">Endereço</label>
            <p><?php echo $_SESSION['end']; ?></p>
        </div>
        <button type="submit" class="btn btn-default">Alterar Dados</button>
    </form>
</div>
<?php
    include 'layouts/footer.php';
    } else {
        header('Location: ./home.php');
        exit;
    }
?>