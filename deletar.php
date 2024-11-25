<?php


include_once 'dbconnect.php';
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

// Obtém os parâmetros de forma segura
$id = $_SESSION['id']; // ID do usuário logado
$senha = isset($_POST['password']) ? trim($_POST['password']) : '';

// Verifica se a senha foi enviada
if (empty($senha)) {
    echo "Senha não fornecida. Tente novamente.";
    exit();
}
function custom_password_verify($password, $hash) {
    return crypt($password, $hash) === $hash;
}

// Prepara a consulta para verificar o usuário
$query = $conn->prepare("SELECT senha FROM usuarios WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $senhaHash = $user['senha'];

    // Verifica a senha
    if (md5($senha) === $senhaHash) {
        // Prepara a exclusão do usuário
        $deleteQuery = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
        $deleteQuery->bind_param("i", $id);

        if ($deleteQuery->execute()) {
            // Finaliza a sessão e redireciona
            session_destroy();
            header('Location: login.php'); // Redireciona para uma página de adeus
            exit();
        } else {
            echo "Erro ao excluir a conta. Por favor, tente novamente.";
        }
    } else {
        echo "Senha incorreta. Tente novamente.";
    }
} else {
    echo "Usuário não encontrado.";
}
?>
