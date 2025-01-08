<?php
// Configurações do banco de dados
session_start();
include_once 'dbconnect.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    die("Erro: usuário não autenticado.");
}

$postId = $_POST['post_id']; // Obtém o ID da postagem
$titulo = $_POST['title'];   // Obtém o título da postagem
$descricao = $_POST['descricao']; // Obtém a descrição
$categoria = $_POST['categoria']; // Obtém a categoria
$status = $_POST['status']; // Obtém o status (perdido/encontrado)
$usuario_id = $_SESSION['id']; // Pega o ID do usuário logado

// Verifica se um arquivo foi enviado
$media = null;
$tipo_imagem = null;
if (isset($_FILES['media']) && $_FILES['media']['size'] > 0) {
    $media = file_get_contents($_FILES['media']['tmp_name']);
    $tipo_imagem = $_FILES['media']['type'];
}

// Atualiza os dados da postagem no banco de dados
$sql = $conn->prepare("
    UPDATE posts
    SET titulo = ?, descricao = ?, categoria = ?, status = ?, imagem = ?, tipo_imagem = ?
    WHERE id = ? AND usuario_id = ?
");
$sql->bind_param("ssssssii", $titulo, $descricao, $categoria, $status, $media, $tipo_imagem, $postId, $usuario_id);

if ($sql->execute()) {
    echo "Postagem atualizada com sucesso!";
} else {
    echo "Erro ao atualizar postagem: " . $conn->error;
}

$sql->close();
$conn->close();

// Redireciona de volta para o feed ou página de postagens
header("Location: feed.php");
exit();
?>
