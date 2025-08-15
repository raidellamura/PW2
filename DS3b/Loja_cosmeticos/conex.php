<?php
function conectarBanco() {
    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "loja_cosmeticos";

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $conn->set_charset("utf8mb4");

    return $conn;
}
?>