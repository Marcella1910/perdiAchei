<?php

// Verifica se o cookie 'auth_token' não está presente
// Se o cookie não existe, redireciona o usuário para a página de login
if (!isset($_COOKIE['auth_token'])) {
    header('Location: login.php');
    exit(); // Encerra a execução do script após o redirecionamento
}

// Inclui o arquivo de conexão com o banco de dados
include_once 'dbconnect.php';

// Obtém o valor do token armazenado no cookie
$token = $_COOKIE['auth_token'];

// Consulta no banco de dados para verificar se o token existe na tabela de usuários
$sql = "SELECT * FROM usuarios WHERE token = '$token'";
$result = $conn->query($sql);

// Verifica se foi encontrado um usuário com o token fornecido
if ($result->num_rows == 1) {
    // Se o token for válido, obtém os dados do usuário
    $user = $result->fetch_assoc();

    // Regenera as variáveis de sessão com as informações do usuário
    $_SESSION["id"] = $user["id"];  // Armazena o ID do usuário na sessão
    $_SESSION["nome"] = $user["nome"];  // Armazena o nome do usuário na sessão
    $_SESSION["usuario"] = $user["usuario"];  // Armazena o nome de usuário na sessão
    $_SESSION["email"] = $user["email"];  // Armazena o email do usuário na sessão
    $_SESSION['foto_perfil'] = $user['foto_perfil'];  // Armazena o caminho da foto de perfil do usuário na sessão

} else {
    // Se o token não for encontrado ou for inválido, remove o cookie 'auth_token'
    // O tempo de expiração é ajustado para um valor no passado para garantir que o cookie seja removido
    setcookie("auth_token", "", time() - 3600, "/");

    // Redireciona o usuário para a página de login
    header('Location: login.php');
    exit(); // Encerra a execução do script após o redirecionamento
}
?>
