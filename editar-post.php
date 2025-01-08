<?php
session_start();
include_once 'dbconnect.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    die("Erro: usuário não autenticado.");
}

// Pega os dados enviados pelo formulário
$postId = $_POST['id']; // ID da postagem
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$status = $_POST['status'];
$media = null;
$tipo_imagem = null;

// Verifica se um novo arquivo foi enviado
if (isset($_FILES['media']) && $_FILES['media']['size'] > 0) {
    $media = file_get_contents($_FILES['media']['tmp_name']);
    $tipo_imagem = $_FILES['media']['type'];
}

// Atualiza a postagem no banco de dados
if ($media) {
    $sql = $conn->prepare("
        UPDATE posts 
        SET titulo = ?, descricao = ?, categoria = ?, status = ?, imagem = ?, tipo_imagem = ?
        WHERE id = ? AND usuario_id = ?
    ");
    $sql->bind_param("sssssbii", $titulo, $descricao, $categoria, $status, $media, $tipo_imagem, $postId, $_SESSION['id']);
} else {
    $sql = $conn->prepare("
        UPDATE posts 
        SET titulo = ?, descricao = ?, categoria = ?, status = ?
        WHERE id = ? AND usuario_id = ?
    ");
    $sql->bind_param("ssssii", $titulo, $descricao, $categoria, $status, $postId, $_SESSION['id']);
}

if ($sql->execute()) {
    echo "Postagem editada com sucesso!";
} else {
    echo "Erro ao editar postagem: " . $conn->error;
}

$sql->close();
$conn->close();

header("Location: feed.php");
exit();
?>
