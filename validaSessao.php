<?php

if (!isset($_COOKIE['auth_token'])) {
    header('Location: login.php');
    exit();
}

include_once 'dbconnect.php';

// Obtém o token do cookie
$token = $_COOKIE['auth_token'];

// Consulta para verificar o token no banco de dados
$sql = "SELECT * FROM usuarios WHERE token = '$token'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    // Regenera as variáveis da sessão com informações do usuário
    $_SESSION["id"] = $user["id"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["usuario"] = $user["usuario"];
    $_SESSION["email"] = $user["email"];
} else {
    // Token inválido ou expirado
    setcookie("auth_token", "", time() - 3600, "/"); // Remove o cookie
    header('Location: login.php');
    exit();
}
?>
