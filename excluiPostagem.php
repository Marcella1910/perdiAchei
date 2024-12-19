<?php

include_once "dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $postId = $_POST['id'];

        // Preparar a query para excluir a postagem
        $query = "DELETE FROM posts WHERE id = :id";
        $stmt = $pdo->prepare($query);

        // Bind do parâmetro
        $stmt->bindParam(':id', $postId, PDO::PARAM_INT);

        // Executa a query
        if ($stmt->execute()) {
            echo "Postagem excluída com sucesso!";
        } else {
            echo "Erro ao excluir a postagem.";
        }
    } else {
        echo "ID da postagem não foi fornecido.";
    }
} else {
    echo "Método HTTP inválido.";
}
?>