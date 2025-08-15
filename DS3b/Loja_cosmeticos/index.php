<?php
include 'funcoes.php';

$categorias = buscarCategorias();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Cosméticos</title>
</head>
<body>
    <h1>Loja de Cosmético</h1>
    <h2>Buscar por Categoria com Filtro</h2>
        <form method="post">
        <select name="categoria_id">
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['categoria_id'] ?>"><?= $cat['categoria_nome'] ?></option>
        <?php endforeach; ?>
        </select>
        <button type="submit">Buscar</button>
    </form>
</body>
</html>

