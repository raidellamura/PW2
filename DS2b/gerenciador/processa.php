<?php
include "tarefas.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["nome"], $_POST["data_hora"])) {
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"] ?? '';
        $dataHora = $_POST["data_hora"];

        adicionarTarefa($nome, $descricao, $dataHora);
    
    
    } elseif (isset($_POST["id"], $_POST["status"])) {
        atualizarStatus($_POST["id"], $_POST["status"]);

  
    } elseif (isset($_POST["id"], $_POST["deletar"])) {
        deletarTarefa($_POST["id"]);
    }
}
if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    $dataHora = $data . 'T' . $hora;

    $tarefas = listarTarefas();

    foreach ($tarefas as &$tarefa) {
        if ($tarefa['id'] == $id) {
            $tarefa['nome'] = $nome;
            $tarefa['descricao'] = $descricao;
            $tarefa['data_hora'] = $dataHora;
            break;
        }
    }

    salvarTarefas($tarefas);
}
header("Location: index.php");
exit;

