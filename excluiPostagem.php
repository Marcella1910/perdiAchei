<?php
session_start();
var_dump($_POST);
include_once 'dbconnect.php';

// Verifica se o ID da postagem foi enviado
if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("Erro: ID da postagem não fornecido.");
}

$postId = $_POST['id'];
$usuarioId = $_SESSION['id']; // ID do usuário logado

// Consulta para verificar se a postagem pertence ao usuário logado
$checkSql = $conn->prepare("SELECT * FROM posts WHERE id = ? AND usuario_id = ?");
$checkSql->bind_param("ii", $postId, $usuarioId);
$checkSql->execute();
$result = $checkSql->get_result();

if ($result->num_rows === 0) {
    die("Erro: Postagem não encontrada ou você não tem permissão para excluí-la.");
}

// Excluir a postagem
$deleteSql = $conn->prepare("DELETE FROM posts WHERE id = ?");
$deleteSql->bind_param("i", $postId);

if ($deleteSql->execute()) {
    echo "Postagem excluída com sucesso!";
} else {
    echo "Erro ao excluir a postagem: " . $conn->error;
}

$deleteSql->close();
$conn->close();

header("Location: feed.php");
exit();
?>