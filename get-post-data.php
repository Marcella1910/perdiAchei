<?php
session_start();
include_once 'dbconnect.php';

header('Content-Type: application/json'); // Define o tipo de conteúdo como JSON

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Consulta SQL para buscar os dados da postagem
    $stmt = $conn->prepare("SELECT titulo, descricao, categoria, status, imagem, tipo_imagem FROM posts WHERE id = ?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Retorna os dados em formato JSON
        echo json_encode([
            'titulo' => $row['titulo'],
            'descricao' => $row['descricao'],
            'categoria' => $row['categoria'],
            'status' => $row['status'],
            'imagem' => base64_encode($row['imagem']),
            'tipo_imagem' => $row['tipo_imagem']
        ]);
    } else {
        echo json_encode(['error' => 'Postagem não encontrada']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'ID da postagem não fornecido']);
}
?>
