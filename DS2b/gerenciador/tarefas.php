<?php

define("JSON_FILE", "tarefas.json");

function carregarTarefas() {
    if (!file_exists(JSON_FILE)) {
        return [];
    }
    $json = file_get_contents(JSON_FILE);
    return json_decode($json, true);
}

function salvarTarefas($tarefas) {
    file_put_contents(JSON_FILE, json_encode($tarefas, JSON_PRETTY_PRINT));
}

function adicionarTarefa($nome, $descricao, $dataHora) {
    $tarefas = carregarTarefas();
    $tarefas[] = [
        "id" => uniqid(),
        "nome" => $nome,
        "descricao" => $descricao,
        "data_hora" => $dataHora,
        "status" => "Pendente"
    ];
    salvarTarefas($tarefas);
}

function atualizarStatus($id, $status) {
    $tarefas = carregarTarefas();
    foreach ($tarefas as &$tarefa) {
        if ($tarefa["id"] === $id) {
            $tarefa["status"] = $status;
            break;
        }
    }
    salvarTarefas($tarefas);
}

function deletarTarefa($id) {
    $tarefas = carregarTarefas();
    $tarefas = array_filter($tarefas, fn($tarefa) => $tarefa["id"] !== $id);
    salvarTarefas($tarefas);
}

function listarTarefas() {
    return carregarTarefas();
}
?>

