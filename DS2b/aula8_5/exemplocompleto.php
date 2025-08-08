<?php
function manipularArquivo($texto) {
 $arquivo = 'meu_arquivo.txt';
 $fp = fopen($arquivo, 'a+'); // Abre para leitura e escrita, 
 // adicionando ao final do arquivo
 if ($fp) {
 // Escreve no arquivo
 fwrite($fp, $texto . "<br>");
 
 // Volta o ponteiro para o início do arquivo
 rewind($fp);
 
 // Lê o conteúdo do arquivo
 while (!feof($fp)) {
 $linha = fgets($fp);
 echo $linha;
 }
 // Fecha o arquivo
 fclose($fp);
 } else {
 echo "Erro ao abrir o arquivo.\n";
 }
}
// Chama a função com o texto a ser gravado
manipularArquivo("Aula de PW2!");
?>