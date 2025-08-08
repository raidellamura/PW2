<?php
 
 $xml = simplexml_load_file('exemplo.xml');
 
 // Adiciona um novo livro
 $novoLivro = $xml->addChild('livro');
 $novoLivro->addChild('titulo', 'Novo Livro');
 $novoLivro->addChild('autor', 'Autor Desconhecido');
 $novoLivro->addChild('ano', '2024');
 // Salva o XML modificado
 
 $xml->asXML('exemplo.xml');
 
 // Lê e exibe o conteúdo do XML
 foreach ($xml->livro as $livro) {
 echo "Título: " . $livro->titulo . "<br>";
 echo "Autor: " . $livro->autor . "<br>";
 echo "Ano: " . $livro->ano . "<br><br>";
 }
?>