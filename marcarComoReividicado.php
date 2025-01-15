<?php
session_start();
include 'dbconnect.php'; // Substitua pelo caminho correto do seu arquivo de conexão

$error = ""; // Inicializa a variável para armazenar mensagens de erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['postId'];
    $emailReclamante = $_POST['emailReclamante'];

    if (empty($postId) || empty($emailReclamante)) {
        $error = "Erro: Dados incompletos.";
    } else {
        // Verifica se o email existe no banco de dados
        $sqlVerifyEmail = "SELECT email FROM usuarios WHERE email = ?";
        $stmtVerify = $conn->prepare($sqlVerifyEmail);

        if ($stmtVerify) {
            $stmtVerify->bind_param('s', $emailReclamante);
            $stmtVerify->execute();
            $stmtVerify->store_result();

            if ($stmtVerify->num_rows === 0) {
                $error = "Erro: O email fornecido não está registrado.";
                $stmtVerify->close();
            } else {
                $stmtVerify->close();

                // Atualiza os campos no banco de dados
                $sql = "UPDATE posts SET devolucao = 'sim', reclamante = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param('si', $emailReclamante, $postId);
                    if ($stmt->execute()) {
                        header("Location: feed.php"); // Redirecione para a página principal
                        exit;
                    } else {
                        $error = "Erro ao atualizar o status: " . $stmt->error;
                    }
                } else {
                    $error = "Erro ao preparar a declaração: " . $conn->error;
                }
            }
        } else {
            $error = "Erro ao preparar a verificação de email: " . $conn->error;
        }
    }
}
?>
