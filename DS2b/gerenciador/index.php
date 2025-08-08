<?php
include "tarefas.php";
$tarefas = listarTarefas();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
   
    <h1> Gerenciador de Tarefas</h1>
      <footer class="rodape">
        <h4>Raissa Dellamura - ETEC Ermelinda Gennini Teixeira</>
    </footer>
    <div class="form-container">
        <form action="processa.php" method="POST">
            <input type="text" name="nome" placeholder="Nome da tarefa" required>
            <textarea name="descricao" placeholder="Descrição"></textarea>
            <input type="datetime-local" name="data_hora" required>
            <button type="submit">Adicionar</button>
        </form>
    </div>

    <div class="container">
    <div class="lista-tarefas">
        
    <h2>Lista de Tarefas</h2>
    <ul>
        <?php foreach ($tarefas as $tarefa): ?>
            <li>
                <span class="tarefa-nome"><?php echo $tarefa["nome"]; ?></span> - 
                <?php echo $tarefa["descricao"]; ?> 
                <br><strong>Data e Hora:</strong> <?php echo $tarefa["data_hora"]; ?>
                <br><span class="tarefa-status">[<?php echo $tarefa["status"]; ?>]</span>

                <form action="processa.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $tarefa["id"]; ?>">
                    <select name="status">
                        <option value="Pendente" <?php if($tarefa["status"] == "Pendente") echo "selected"; ?>>Pendente</option>
                        <option value="Em andamento" <?php if($tarefa["status"] == "Em andamento") echo "selected"; ?>>Em andamento</option>
                        <option value="Concluído" <?php if($tarefa["status"] == "Concluído") echo "selected"; ?>>Concluído</option>
                    </select>
                    <button type="submit">Atualizar</button>
                </form>
   
                <details>
                    <strong>Editar</strong>
                    <form action="processa.php" method="post" style="display:block; margin-top:10px;">
                        Nome: <input type="text" name="nome" value="<?= $tarefa['nome'] ?>" required><br>
                        Descrição: <input type="text" name="descricao" value="<?= $tarefa['descricao'] ?>" required><br>

                        <?php
                        $dataHora = explode('T', $tarefa['data_hora']);
                        $data = $dataHora[0];
                        $hora = isset($dataHora[1]) ? substr($dataHora[1], 0, 5) : '';
                        ?>

                        Data: <input type="date" name="data" value="<?= $data ?>" required><br>
                        Hora: <input type="time" name="hora" value="<?= $hora ?>" required><br>

                        <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                        <button type="submit" name="atualizar">Salvar</button>
                    </form>
                </details>

                <form action="processa.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $tarefa["id"]; ?>">
                    <input type="hidden" name="deletar" value="1">
                    <button type="submit" style="background-color:rgb(255, 142, 204);">Excluir</button>
                </form>
    </div>
    </div>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
