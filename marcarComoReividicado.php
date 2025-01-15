<?php
session_start();
include 'dbconnect.php'; // Substitua pelo caminho correto do seu arquivo de conexão

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['postId'];
    $emailReclamante = $_POST['emailReclamante'];

    if (empty($postId) || empty($emailReclamante)) {
        header("Location: feed.php?error=missing_data");
        exit;
    }

    // Verifica se o email existe no banco de dados
    $sqlVerifyEmail = "SELECT email FROM usuarios WHERE email = ?";
    $stmtVerify = $conn->prepare($sqlVerifyEmail);

    if ($stmtVerify) {
        $stmtVerify->bind_param('s', $emailReclamante);
        $stmtVerify->execute();
        $stmtVerify->store_result();

        if ($stmtVerify->num_rows === 0) {
            $stmtVerify->close();
            header("Location: feed.php?error=email_not_registered");
            exit;
        }
        $stmtVerify->close();
    } else {
        header("Location: feed.php?error=query_preparation");
        exit;
    }

    // Atualiza os campos no banco de dados
    $sql = "UPDATE posts SET devolucao = 'sim', reclamante = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('si', $emailReclamante, $postId);
        if ($stmt->execute()) {
            header("Location: feed.php");
            exit;
        } else {
            header("Location: feed.php?error=query_execution");
        }
    } else {
        header("Location: feed.php?error=query_preparation");
    }
}
?>
