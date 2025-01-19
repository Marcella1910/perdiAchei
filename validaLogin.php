<?php
// Inicia a sessão para poder acessar variáveis de sessão
session_start();

// Verifica se o formulário foi enviado via método POST e se os campos 'email' e 'senha' não estão vazios
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // Inclui o arquivo de conexão com o banco de dados
    include_once 'dbconnect.php';

    // Escapa as entradas para evitar SQL Injection e prepara o email e a senha
    $email = $conn->real_escape_string($_POST["email"]);
    $senha = md5($_POST["senha"]); // A senha é criptografada com MD5 (observação: MD5 não é recomendado por questões de segurança)

    // Consulta ao banco de dados para verificar se há um usuário com o email e a senha fornecidos
    $sql = "SELECT * FROM usuarios WHERE senha = '$senha' AND email = '$email'";
    $result = $conn->query($sql);

    // Verifica se existe um único usuário que corresponde à consulta
    if ($result->num_rows == 1) {
        // Caso o usuário exista, recupera os dados do usuário
        $user = $result->fetch_assoc();

        // Gera um token único para a sessão
        $token = bin2hex(openssl_random_pseudo_bytes(32)); // Gera um token de 32 bytes em formato hexadecimal
        $userId = $user["id"]; // Obtém o ID do usuário

        // Atualiza o banco de dados com o token gerado para esse usuário
        $updateToken = "UPDATE usuarios SET token = '$token' WHERE id = '$userId'";
        if ($conn->query($updateToken)) {
            // Se a atualização for bem-sucedida, cria um cookie para armazenar o token de autenticação
            // O cookie expira em 7 dias
            setcookie("auth_token", $token, time() + (7 * 24 * 60 * 60), "/", "", true, true); // O cookie é seguro e só acessível por HTTP

            // Redireciona o usuário para a página 'feed.php'
            header('Location: feed.php');
            exit(); // Encerra o script para garantir que o redirecionamento ocorra imediatamente
        } else {
            // Se houver erro ao salvar o token no banco de dados, armazena uma mensagem de erro na sessão
            $_SESSION['erro_login'] = "Erro ao salvar o token.";
            header('Location: login.php'); // Redireciona de volta para a página de login
            exit();
        }
    } else {
        // Se o email ou a senha estiverem incorretos, armazena uma mensagem de erro na sessão
        $_SESSION['erro_login'] = "Email ou senha incorretos.";
        error_log("Mensagem de erro armazenada na sessão: " . $_SESSION['erro_login']); // Registra o erro no log
        header('Location: login.php'); // Redireciona de volta para a página de login
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>