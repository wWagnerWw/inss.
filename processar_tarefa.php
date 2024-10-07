<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = $_POST['descricao'];
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    if ($action == 'add') {
        $sql = "INSERT INTO tarefas (descricao) VALUES ('$descricao')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['mensagem'] = "Tarefa adicionada com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao adicionar tarefa: " . $conn->error;
        }
        header("Location: index.php");
        exit;
    }

    if ($action == 'edit' && $id) {
        $sql = "UPDATE tarefas SET descricao='$descricao' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['mensagem'] = "Tarefa editada com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao editar tarefa: " . $conn->error;
        }
        header("Location: index.php");
        exit;
    }

    if ($action == 'delete' && $id) {
        $sql = "DELETE FROM tarefas WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['mensagem'] = "Tarefa excluída com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao excluir tarefa: " . $conn->error;
        }
        header("Location: index.php");
        exit;
    }
}
?>
