<?php
// Inicia a sessão para acessar as variáveis globais do usuário logado
session_start();

// Inclui o arquivo de conexão com o banco de dados
include 'dbconnect.php';

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o ID do post enviado pelo formulário
    $postId = $_POST['postId'];

    // Verifica se o ID do post foi fornecido
    if (empty($postId) || !is_numeric($postId)) {
        echo "Erro: ID do post não fornecido ou inválido.";
        exit;
    }

    // Prepara a consulta SQL para atualizar o status de devolução da postagem
    $sql = "UPDATE posts SET devolucao = 'sim' WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Associa o ID do post ao parâmetro da consulta para evitar SQL Injection
        $stmt->bind_param("i", $postId);

        // Executa a atualização no banco de dados
        if ($stmt->execute()) {
            // Fecha o statement e redireciona para a página principal após a atualização
            $stmt->close();
            $conn->close();
            header("Location: feed.php");
            exit;
        } else {
            echo "Erro ao atualizar o status: " . $stmt->error;
        }
    } else {
        echo "Erro ao preparar a declaração: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados para liberar recursos
    $conn->close();
}
?>