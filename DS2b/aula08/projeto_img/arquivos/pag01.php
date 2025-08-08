<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="teste.php" method="post" enctype="multipart/form-data">
        <h1>Imagens</h1>

        <h3>Primeira imagem</h3>
        <input type="file" name="pictures[]"/><br><br>

        <h3>Segunda imagem</h3>
        <input type="file" name="pictures[]"/><br><br>

        <input type="submit" value="Enviar">
        
    </form>
</body>
</html>