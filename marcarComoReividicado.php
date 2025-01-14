<?php
session_start();
include 'dbconnect.php'; // Substitua pelo caminho correto do seu arquivo de conexão

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['postId'];
    $emailReclamante = $_POST['emailReclamante'];

    if (empty($postId) || empty($emailReclamante)) {
        echo "Erro: Dados incompletos.";
        exit;
    }

    // Atualiza os campos no banco de dados
    $sql = "UPDATE posts SET devolucao = 'sim', reclamante = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('si', $emailReclamante, $postId);
        if ($stmt->execute()) {
            header("Location: feed.php"); // Redirecione para a página principal
            exit;
        } else {
            echo "Erro ao atualizar o status: " . $stmt->error;
        }
    } else {
        echo "Erro ao preparar a declaração: " . $conn->error;
    }
}
?>
