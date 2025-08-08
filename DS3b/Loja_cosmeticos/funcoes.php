<?php
    $sql = SELECT 
            produtos.nome_prod AS nome_produto, 
            produtos.preco, 
            categorias.nome_cat AS nome_categoria 
        FROM 
            produtos 
        INNER JOIN 
            categorias ON produtos.categoria_id = categorias.id_cat 
        WHERE 
            categorias.id_cat = ?;
?>