<?php

require_once 'conexao.php';

function lerTarefas() {
    $conn = conectarBanco();
    $sql = "SELECT * FROM Tarefas ORDER BY data_hora ASC";
    $result = $conn->query($sql);

    $tarefas = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tarefas[] = $row;
        }
    }
    $conn->close();
    return $tarefas;
}


function criarTarefa($dados) {
    $conn = conectarBanco();
    $sql = "INSERT INTO Tarefas (data_hora, nome_tar, descricao_tar, status_tar) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $dataHora = $dados['data'] . ' ' . $dados['hora'];
    $stmt->bind_param("ssss", $dataHora, $dados['titulo'], $dados['descricao'], $dados['status']);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

function exibirTarefas() {
    $tarefas = lerTarefas();

    foreach ($tarefas as $tarefa) {
        $classeStatus = strtolower(str_replace('í', 'i', $tarefa['status_tar'])); // Remove acento para classe CSS
        echo "<div class='tarefa $classeStatus'>";
        echo "<h3>" . htmlspecialchars($tarefa['nome_tar']) . "</h3>";
        echo "<p><strong>Descrição:</strong> " . htmlspecialchars($tarefa['descricao_tar']) . "</p>";
        echo "<p><strong>Data e Hora:</strong> " . htmlspecialchars($tarefa['data_hora']) . "</p>";
        echo "<p><strong>Status:</strong> " . htmlspecialchars($tarefa['status_tar']) . "</p>";

        echo "<div class='acoes'>";
        echo "<form method='post' action='index.php' style='display:inline;'>";
        echo "<input type='hidden' name='acao' value='excluir'>";
        echo "<input type='hidden' name='id' value='" . $tarefa['id'] . "'>";
        echo "<button type='submit'>Excluir</button>";
        echo "</form>";

        // Botão para editar
        echo "<form method='get' action='editar.php' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='" . $tarefa['id'] . "'>";
        echo "<button type='submit'>Editar</button>";
        echo "</form>";

        echo "</div>";
        echo "</div>";
    }
}


function atualizarTarefa($dados) {
    $conn = conectarBanco();
    $sql = "UPDATE Tarefas SET data_hora = ?, nome_tar = ?, descricao_tar = ?, status_tar = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $dataHora = $dados['data'] . ' ' . $dados['hora'];
    $stmt->bind_param("ssssi", $dataHora, $dados['titulo'], $dados['descricao'], $dados['status'], $dados['id']);
    $stmt->execute();

    $stmt->close();
    $conn->close();
    header('Location: index.php');
    exit();
}

function excluirTarefa($id) {
    $conn = conectarBanco();
    $sql = "DELETE FROM Tarefas WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
    header('Location: index.php');
    exit();
}