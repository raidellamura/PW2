<?php
require_once 'conex.php';

function buscarCategorias() {
    $conn = conectarBanco();
    $sql = "SELECT * FROM categoria";

    $result = $conn->query($sql);

    $categoria = [];
  
        while ($row = $result->fetch_assoc()) {
            $categoria[] = $row;
        }
    
    $conn->close();
    return $categoria;
}

function buscarProdutos(){
    
}