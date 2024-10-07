<?php
require 'db_connect.php';

$sql = "SELECT * FROM tarefas";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li>
                <form action='processar_tarefa.php' method='POST'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <input type='text' name='descricao' value='{$row['descricao']}'>
                    <button type='submit' name='action' value='edit'>Editar</button>
                    <button type='submit' name='action' value='delete'>Excluir</button>
                </form>
              </li>";
    }
} else {
    echo "<li>Não há tarefas cadastradas</li>";
}
?>
