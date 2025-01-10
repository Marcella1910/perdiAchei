<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['id'])) {
    die("Erro: usuário não autenticado.");
}

$postId = $_POST['post_id'];
$titulo = $_POST['title'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$status = $_POST['status'];
$manterMidia = $_POST['mantenha_midia'] === 'true'; // Captura se a mídia deve ser mantida

$media = null;
$tipo_imagem = null;

// Verifica se o usuário enviou nova mídia
if (isset($_FILES['media']) && $_FILES['media']['size'] > 0) {
    $media = file_get_contents($_FILES['media']['tmp_name']);
    $tipo_imagem = $_FILES['media']['type'];
} elseif ($manterMidia) {
    // Se não há nova mídia e o usuário optou por manter, buscamos a mídia existente
    $query = $conn->prepare("SELECT imagem, tipo_imagem FROM posts WHERE id = ? AND usuario_id = ?");
    $query->bind_param("ii", $postId, $_SESSION['id']);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $media = $row['imagem'];
        $tipo_imagem = $row['tipo_imagem'];
    }
    $query->close();
}

// Atualiza os dados da postagem no banco de dados
$sql = $conn->prepare("
    UPDATE posts
    SET titulo = ?, descricao = ?, categoria = ?, status = ?, imagem = ?, tipo_imagem = ?
    WHERE id = ? AND usuario_id = ?
");
$sql->bind_param("ssssssii", $titulo, $descricao, $categoria, $status, $media, $tipo_imagem, $postId, $_SESSION['id']);

if ($sql->execute()) {
    echo "Postagem atualizada com sucesso!";
} else {
    echo "Erro ao atualizar postagem: " . $conn->error;
}

$sql->close();
$conn->close();
?>
