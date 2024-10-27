<?php
session_start(); // Inicia a sessão

// Configurações do banco de dados
include_once 'dbconnect.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $_POST["password"];

    // Consulta ao banco para verificar usuário e email
    $sql = "SELECT * FROM usuarios WHERE usuario = '$username' AND email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificação da senha
        if (md5($password) === $user["senha"]) {
            // Login bem-sucedido, armazenando dados na sessão
            $_SESSION["usuario_id"] = $user["id"];
            $_SESSION["usuario_nome"] = $user["nome"];

            // Redireciona para a página de feed
            header("Location: feed.php");
            exit();
        } else {
            echo "<script>alert('Senha incorreta.'); window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Usuário ou email não encontrado.'); window.location.href = 'login.php';</script>";
    }
}

$conn->close();
?>
