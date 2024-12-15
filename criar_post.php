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
    $media = file_get_contents($_FILES['media']['tmp_name']); // Captura o conteúdo do arquivo
    $tipo_imagem = $_FILES['media']['type']; // Captura o tipo do arquivo
}

// Ajusta a query para incluir os campos imagem e tipo_imagem
$sql = $conn->prepare("INSERT INTO posts (titulo, descricao, categoria_id, status, usuario_id, imagem, tipo_imagem) 
                       VALUES (?, ?, ?, ?, ?, ?, ?)");

if ($sql === false) {
    die('Erro ao preparar a consulta: ' . $conn->error);
}

// Adicione "b" para tipos binários (imagem)
$sql->bind_param("ssisiss", $titulo, $descricao, $categoria_id, $status, $usuario_id, $media, $tipo_imagem);

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
