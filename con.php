<?php

    function conexao() {
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "nidra";
    $dbport = 3306;

    $conn = new mysqli($servername, $username, $password, $database, $dbport);

    return $conn;
    }
?>