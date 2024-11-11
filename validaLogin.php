<?php
session_start(); // Inicia a sessão

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // Inclue o banco de dados
    include_once 'dbconnect.php';
    $email = $conn->real_escape_string($_POST["email"]);
    $senha = md5($_POST["senha"]);

    // Consulta ao banco para verificar usuário e email
    $sql = "SELECT * FROM usuarios WHERE senha = '$senha' AND email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION["id"] = $user["id"];
        $_SESSION["nome"] = $user["nome"]; // Aqui usa $user e não $usuario
        $_SESSION["usuario"] = $user["usuario"]; // Aqui usa $user e não $usuario
        $_SESSION["email"] = $user["email"];
        $_SESSION["senha"] = $senha;
        
        header('Location: feed.php');
        exit();
    } 
    else {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        echo "<script>alert('Email ou senha incorretos.'); window.location.href = 'login.php';</script>";
        header('Location: login.php');
    }
}

$conn->close();
?>