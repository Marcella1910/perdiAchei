<?php
// Inicia a sessão para acessar as variáveis globais do usuário logado
session_start();

// Inclui o arquivo de conexão com o banco de dados
include 'dbconnect.php';

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtém os dados enviados pelo formulário
    $postId = $_POST['postId'];
    $emailReclamante = $_POST['emailReclamante'];

    // Verifica se os campos obrigatórios foram preenchidos
    if (empty($postId) || empty($emailReclamante)) {
        // Redireciona para a página principal com um erro indicando que os dados estão faltando
        header("Location: feed.php?error=missing_data");
        exit;
    }

    // Verifica se o email informado existe na tabela `usuarios`
    $sqlVerifyEmail = "SELECT email FROM usuarios WHERE email = ?";
    $stmtVerify = $conn->prepare($sqlVerifyEmail);

    if ($stmtVerify) {
        // Associa o parâmetro da consulta SQL para evitar SQL Injection
        $stmtVerify->bind_param('s', $emailReclamante);
        $stmtVerify->execute();
        $stmtVerify->store_result();

        // Se nenhum registro for encontrado, significa que o email não está cadastrado
        if ($stmtVerify->num_rows === 0) {
            $stmtVerify->close();
            header("Location: feed.php?error=email_not_registered");
            exit;
        }
        // Fecha a consulta após a verificação do email
        $stmtVerify->close();
    } else {
        // Se houver erro na preparação da consulta, redireciona com um erro específico
        header("Location: feed.php?error=query_preparation");
        exit;
    }

    // Atualiza os campos `devolucao` e `reclamante` na tabela `posts`
    $sql = "UPDATE posts SET devolucao = 'sim', reclamante = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Associa os parâmetros à consulta para evitar SQL Injection
        $stmt->bind_param('si', $emailReclamante, $postId);
        
        // Executa a atualização e verifica se foi bem-sucedida
        if ($stmt->execute()) {
            // Se a atualização for bem-sucedida, redireciona para a página principal
            header("Location: feed.php");
            exit;
        } else {
            // Se houver erro na execução da consulta, redireciona com um erro específico
            header("Location: feed.php?error=query_execution");
        }
    } else {
        // Se houver erro na preparação da consulta, redireciona com um erro específico
        header("Location: feed.php?error=query_preparation");
    }
}
?>
