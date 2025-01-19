<?php
session_start(); //Inicia a sessão
include_once 'dbconnect.php'; //Conexão com o banco

// Verifica se o usuário tem um token ativo
if (isset($_COOKIE['auth_token'])) {
    $token = $_COOKIE['auth_token'];

    // Limpa o token no banco de dados
    $sql = "UPDATE usuarios SET token = NULL WHERE token = '$token'";
    $conn->query($sql);

    // Remove o cookie
    setcookie("auth_token", "", time() - 3600, "/", "", true, true); // Expira o cookie

    // Destroi a sessão
    session_destroy();
}

// Redireciona o usuário para a página de login ou página inicial
header('Location: index.php'); // ou para a página que desejar
exit();
?>
