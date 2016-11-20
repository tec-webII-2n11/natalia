<?php
    include 'layouts/header.php';
    include 'layouts/menu.php';
    
    if($_SESSION['id'] == 1 ) {
?>
    <div class="container container-fluid">
        <h1>Grade</h1>
        <h2 class"text-center">Coordenadora</h2>
        <p class"text-center">Tania</p>
        <h2 class"text-center">Professores</h2> 
        <p class"text-center">Rosangela Maria - Pilates</p>
        <p class"text-center">Fatima - Pilates</p>
        <p class"text-center">Pedro Felipe - Musculação</p> 
        <p class"text-center">Gustavo - Musculação</p>
        <p class"text-center">Tania - Yoga</p>
    </div>
<?php
    include 'layouts/footer.php';
    } else  {  
        header('Location: ./perfil.php');
    }
?>
