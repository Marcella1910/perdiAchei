<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'dbconnect.php'; // Substitua pelo caminho correto do seu arquivo de conexão

// Email do usuário logado
$usuarioLogado = isset($_SESSION['email']) ? $_SESSION['email'] : null;

// Query de busca
$query = isset($_GET['q']) ? $_GET['q'] : '';

if (!$usuarioLogado) {
    echo json_encode(['error' => 'Usuário não logado.']);
    exit;
}

if (!empty($query)) {
    $sql = "SELECT email FROM usuarios WHERE email LIKE ? AND email != ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $likeQuery = '%' . $query . '%';
        $stmt->bind_param('ss', $likeQuery, $usuarioLogado);
        $stmt->execute();
        $result = $stmt->get_result();

        $emails = [];
        while ($row = $result->fetch_assoc()) {
            $emails[] = $row['email'];
        }

        // Retornar os resultados em JSON
        header('Content-Type: application/json');
        echo json_encode($emails);
    } else {
        // Erro ao preparar a consulta
        echo json_encode(['error' => 'Erro na consulta ao banco de dados.']);
    }
} else {
    echo json_encode([]);
}
?>
