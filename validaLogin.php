<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once 'dbconnect.php';

    $email = $conn->real_escape_string($_POST["email"]);
    $senha = md5($_POST["senha"]);

    // Consulta ao banco para verificar usuário
    $sql = "SELECT * FROM usuarios WHERE senha = '$senha' AND email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Gera um token único
        $token = bin2hex(openssl_random_pseudo_bytes(32));
        $userId = $user["id"];

        // Atualiza o token no banco de dados
        $updateToken = "UPDATE usuarios SET token = '$token' WHERE id = '$userId'";
        if ($conn->query($updateToken)) {
            // Configura um cookie para prolongar a sessão
            setcookie("auth_token", $token, time() + (7 * 24 * 60 * 60), "/", "", true, true); // Expira em 7 dias

            header('Location: feed.php');
            exit();
        } else {
            $_SESSION['erro_login'] = "Erro ao salvar o token.";
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['erro_login'] = "Email ou senha incorretos.";
        error_log("Mensagem de erro armazenada na sessão: " . $_SESSION['erro_login']);
        header('Location: login.php');
        exit();

    }
}

$conn->close();
?>