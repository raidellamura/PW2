<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Página de arquivos</h1>
<?php
    $path="arquivos/";
    $diretorio = dir($path);
    echo"Lista de arquivo do direório <b>".$path. "</b><br>";

    while($arquivo=$diretorio -> raed())
    {
        echo "<a href='".$path.$arquivo."'>".arquivo."</a><br>";
    }
    $diretorio -> close();
?>
</body>
</html>