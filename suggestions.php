<?php
include_once 'dbconnect.php'; // Conexão com o banco de dados

// Obtém o parâmetro 'query' da URL, se existir. Caso contrário, define como uma string vazia.
$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

if (!empty($query)) {
    // Realiza a consulta no banco para buscar títulos de postagens que contenham a string 'query'
    $sql = "SELECT titulo FROM posts WHERE titulo LIKE '%$query%' LIMIT 5";
    $result = $conn->query($sql);

    $suggestions = [];
    while ($row = $result->fetch_assoc()) {
        // Adiciona cada título encontrado ao array $suggestions
        $suggestions[] = $row['titulo'];
    }

    // Retorna as sugestões em formato JSON
    echo json_encode($suggestions);
} else {
    // Se não houver uma query, retorna um array vazio em formato JSON
    echo json_encode([]);
}
?>
