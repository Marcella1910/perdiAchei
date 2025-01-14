<?php
session_start();
include 'dbconnect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['postId'];

    // Verifique se o ID do post foi enviado
    if (empty($postId)) {
        echo "Erro: ID do post não fornecido.";
        exit;
    }

    // Atualize o status 'devolucao' para 'sim'
    $sql = "UPDATE posts SET devolucao = 'sim' WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $postId);
        if ($stmt->execute()) {
            header("Location: feed.php"); // Redirecione para a página desejada após a atualização
            exit;
        } else {
            echo "Erro ao atualizar o status: " . $stmt->error;
        }
    } else {
        echo "Erro ao preparar a declaração: " . $conn->error;
    }
}
?>
