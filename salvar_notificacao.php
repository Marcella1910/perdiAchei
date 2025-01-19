<?php
session_start(); //Inicia a sessão
include 'dbconnect.php'; // Certifique-se de que este arquivo conecta ao banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postId = $_POST['postId'];
    $postOwnerId = $_POST['postOwnerId'];
    $mensagem = "Alguém quer devolver um item que você postou!";

    // Obtém o ID do usuário logado (quem está enviando a notificação)
    $usuarioRemetenteId = $_SESSION['id'];

    // Insere a notificação no banco de dados
    $sql = "INSERT INTO notificacoes (usuario_id, post_id, mensagem, status) VALUES (?, ?, ?, 'nao_lida')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $postOwnerId, $postId, $mensagem);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Notificação enviada com sucesso!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao enviar notificação."]);
    }

    $stmt->close();
    $conn->close();
}
?>
