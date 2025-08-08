<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Digite um valor: <input type="number" name="v1">
        <br>
        <input type="submit" value="Calcular">
    </form>
<?php
include('biblioteca.php');
if($_POST){
    $v1=$_POST['v1'];
    echo("o dobro é ".dobro($v1)."<br>");
    parImpar($v1);
}
?>
</body>
</html>