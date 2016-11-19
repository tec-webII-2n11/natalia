<?php
    include 'layouts/header.php';
    include 'layouts/menu.php';
    
    if(!isset($_SESSION['id'])) {
        header('Location: ./home.php');
    } else  {  
?>
<div class="container aulas">
    <h1>Aulas</h1>
</div>
<?php
    include 'layouts/footer.php';
}
?>