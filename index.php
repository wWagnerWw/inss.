<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <style>
        .mensagem {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 16px;
            color: white;
        }

        .mensagem.success {
            background-color: #4CAF50; 
        }

        .mensagem.error {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerenciador de Tarefas</h1>

        <?php if (isset($_SESSION['mensagem'])): ?>
            <div class="mensagem <?php echo strpos($_SESSION['mensagem'], 'Erro') !== false ? 'error' : 'success'; ?>">
                <?php
                echo $_SESSION['mensagem'];
                unset($_SESSION['mensagem']); 
                ?>
            </div>
        <?php endif; ?>

        <form action="processar_tarefa.php" method="POST">
            <input type="text" name="descricao" placeholder="Digite uma nova tarefa" required>
            <button type="submit" name="action" value="add">Adicionar Tarefa</button>
        </form>

        <ul>
            <?php require 'exibir_tarefas.php'; ?>
        </ul>
    </div>
</body>
</html>
