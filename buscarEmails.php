<?php
session_start();
include 'dbconnect.php'; // Substitua pelo caminho correto do seu arquivo de conexão

$usuarioLogado = $_SESSION['email']; // Email do usuário logado
$query = $_GET['q'] ?? '';

if (!empty($query)) {
    $sql = "SELECT email FROM usuarios WHERE email LIKE ? AND email != ?";
    $stmt = $conn->prepare($sql);
    $likeQuery = '%' . $query . '%';
    $stmt->bind_param('ss', $likeQuery, $usuarioLogado);
    $stmt->execute();
    $result = $stmt->get_result();

    $emails = [];
    while ($row = $result->fetch_assoc()) {
        $emails[] = $row['email'];
    }

    echo json_encode($emails);
}
?>
