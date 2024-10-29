<?php
// Configurações do banco de dados
include_once 'dbconnect.php';

date_default_timezone_set('America/Sao_Paulo'); // Altere para o fuso horário desejado

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$status = $_POST['status'];
$media = null;
$tipo_imagem = null;

// Verifica se um arquivo foi enviado
if (isset($_FILES['media']) && $_FILES['media']['size'] > 0) {
    $media = file_get_contents($_FILES['media']['tmp_name']);
    $tipo_imagem = $_FILES['media']['type'];
}


// Inserir dados no banco de dados
$sql = $conn->prepare("INSERT INTO posts (titulo, descricao, categoria, status, imagem, tipo_imagem) VALUES (?, ?, ?, ?, ?, ?)");
$sql->bind_param("ssssss", $titulo, $descricao, $categoria, $status, $media, $tipo_imagem);

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