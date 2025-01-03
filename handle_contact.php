<?php
session_start();  // Certifique-se de que a sessão está iniciada

// Inclua a função sendEmail
require 'envia_email.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera o ID da postagem e o e-mail do usuário logado
    $postId = intval($_POST['postId']);
    $userEmail = $_SESSION['email'];  // O e-mail do usuário logado

    // Conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', 'usbw', 'perdiachei');

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Primeiro, buscar o usuario_id da postagem
    $stmt = $conn->prepare("SELECT usuario_id FROM posts WHERE id = ?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $stmt->bind_result($usuarioId);
    $stmt->fetch();
    $stmt->close();

    // Se a postagem não existir
    if (!$usuarioId) {
        die("Erro: Postagem não encontrada.");
    }

    // Agora, buscar o e-mail do usuário associado ao usuario_id
    $stmt = $conn->prepare("SELECT email FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $usuarioId);
    $stmt->execute();
    $stmt->bind_result($toEmail);
    $stmt->fetch();
    $stmt->close();

    // Se não encontrar o e-mail do usuário destinatário
    if (!$toEmail) {
        die("Erro: Usuário destinatário não encontrado.");
    }

    // Dados do formulário
    $contactReason = $_POST['contactReasonItemPerdido'];
    $message = "Mensagem de devolução do item:\n\n" . $contactReason;
    // Se houver foto anexada
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $attachment = $_FILES['photo']['tmp_name'];
        $filename = $_FILES['photo']['name'];
    } else {
        $attachment = null;
    }

    // Enviar o e-mail para o dono da postagem
    sendEmail($toEmail, $userEmail, 'PerdiAchei: contato para devolução de item', $message, $attachment);
}
?>
