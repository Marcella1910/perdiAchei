<?php
session_start(); // Inicia a sessão

// Configurações do banco de dados
include_once 'dbconnect.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $senha = md5($_POST["senha"]);

    // Consulta ao banco para verificar usuário e email
    $sql = "SELECT * FROM usuarios WHERE senha = '$senha' AND email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION["usuario_id"] = $user["id"];
        $_SESSION["usuario_nome"] = $usuario["nome"];
        $_SESSION["usuario_email"] = $email["email"];
        $_SESSION["usuario_senha"] = $senha["senha"]; 
    } 
    else {
        echo "<script>alert('Usuário ou email não encontrado.'); window.location.href = 'login.php';</script>";
    }
}

$conn->close();
?>