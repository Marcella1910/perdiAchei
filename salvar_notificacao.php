<?php
header('Content-Type: application/json'); // Define o tipo de resposta como JSON
session_start();
include 'dbconnect.php';

// Certifique-se de que o usuário está logado
if (!isset($_SESSION['id'])) {
    echo json_encode(["success" => false, "error" => "Usuário não autenticado"]);
    exit;
}

$usuarioId = $_SESSION['id'];
$mensagem = isset($_POST['contactReasonItemPerdido']) ? trim($_POST['contactReasonItemPerdido']) : "";

if (empty($mensagem)) {
    echo json_encode(["success" => false, "error" => "Mensagem vazia"]);
    exit;
}

// Insere a notificação no banco de dados
$sql = "INSERT INTO notificacoes (usuario_id, mensagem, status, data_criacao) VALUES (?, ?, 'nao_lida', NOW())";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("is", $usuarioId, $mensagem);
    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Falha ao inserir no banco"]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "Erro na preparação da query"]);
}

$conn->close();
?>
