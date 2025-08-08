<?php
function exibir($v){
    for ($i=1; $i <= $v; $i++){
        echo $i."-";
    }
}
echo("<h1> 1° Listas </h1>");
exibir(16);
echo("<h1> 2° Listas </h1>");
exibir(36);
echo("<h1> 3° Listas </h1>");
exibir(7);
?>