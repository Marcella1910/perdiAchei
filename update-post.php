<?php
session_start();
include_once 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $categoria = $_POST['categoria'];
    $media = null;
    $tipo_imagem = null;

    // Verificar se um novo arquivo foi enviado
    if (isset($_FILES['media']) && $_FILES['media']['size'] > 0) {
        $media = file_get_contents($_FILES['media']['tmp_name']);
        $tipo_imagem = $_FILES['media']['type'];
    }

    // Atualizar os dados da postagem
    if ($media) {
        $stmt = $conn->prepare("UPDATE posts SET titulo = ?, descricao = ?, status = ?, categoria = ?, imagem = ?, tipo_imagem = ? WHERE id = ?");
        $stmt->bind_param("ssssssi", $titulo, $descricao, $status, $categoria, $media, $tipo_imagem, $postId);
    } else {
        $stmt = $conn->prepare("UPDATE posts SET titulo = ?, descricao = ?, status = ?, categoria = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $titulo, $descricao, $status, $categoria, $postId);
    }

    if ($stmt->execute()) {
        echo "Postagem atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar postagem: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Método inválido.";
}
?>