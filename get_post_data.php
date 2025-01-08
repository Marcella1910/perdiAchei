<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['id'])) {
    die("Erro: usuário não autenticado.");
}

$postId = $_GET['id']; // Obtém o ID da postagem da URL

$sql = $conn->prepare("SELECT id, titulo, descricao, categoria, status, imagem, tipo_imagem FROM posts WHERE id = ? AND usuario_id = ?");
$sql->bind_param("ii", $postId, $_SESSION['id']);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
    echo json_encode($post); // Retorna os dados como JSON
} else {
    echo json_encode(null); // Caso a postagem não seja encontrada
}

$sql->close();
$conn->close();
?>
