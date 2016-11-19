<?php
    include 'layouts/header.php';
    include 'layouts/menu.php';

    if(isset($_SESSION['id'])) {
        session_unset();
        unset($_SESSION['id']);
        unset($_SESSION['user']);
        session_destroy();
        session_write_close();
    }
    
    header('Location: ./login.php ');
    exit;
?>