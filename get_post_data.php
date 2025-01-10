<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['id'])) {
    die(json_encode(["error" => "Usuário não autenticado."]));
}

$postId = $_GET['id']; // Obtém o ID da postagem da URL

$sql = $conn->prepare("SELECT id, titulo, descricao, categoria, status, imagem, tipo_imagem FROM posts WHERE id = ? AND usuario_id = ?");
$sql->bind_param("ii", $postId, $_SESSION['id']);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
    
    // Codifica a imagem em Base64, se existir
    if (!empty($post['imagem'])) {
        $post['imagem'] = base64_encode($post['imagem']);
    }
    
    echo json_encode($post); // Retorna os dados como JSON
} else {
    echo json_encode(["error" => "Postagem não encontrada."]);
}

$sql->close();
$conn->close();
?>