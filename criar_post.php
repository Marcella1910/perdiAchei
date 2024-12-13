<?php
// Configurações do banco de dados
session_start();
include_once 'dbconnect.php';

date_default_timezone_set('America/Sao_Paulo'); // Altere para o fuso horário desejado

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    die("Erro: usuário não autenticado.");
}

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id']; // ID da categoria
$status = $_POST['status'];
$media = null;
$tipo_imagem = null;
$usuario_id = $_SESSION['id']; // Pega o ID do usuário logado

// Verifica se um arquivo foi enviado
if (isset($_FILES['media']) && $_FILES['media']['size'] > 0) {
    $media = file_get_contents($_FILES['media']['tmp_name']);
    $tipo_imagem = $_FILES['media']['type'];
}

// Inserir dados no banco de dados
$sql = $conn->prepare("
    INSERT INTO posts (titulo, descricao, categoria_id, status, imagem, tipo_imagem, usuario_id) 
    VALUES (?, ?, ?, ?, ?, ?, ?)
");
$sql->bind_param("ssisssi", $titulo, $descricao, $categoria_id, $status, $media, $tipo_imagem, $usuario_id);

if ($sql->execute()) {
    echo "Postagem criada com sucesso!";
} else {
    echo "Erro ao criar postagem: " . $conn->error;
}

$sql->close();
$conn->close();

header("Location: feed.php");
exit();
?>
