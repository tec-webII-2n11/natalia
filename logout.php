<?php
    include 'layouts/header.php';
    include 'layouts/menu.php';

    if(isset($_SESSION['id'])) {
        session_unset();
        session_destroy();
        session_write_close();
    }
    
    header('Location: ./login.php ');
    exit;
?>