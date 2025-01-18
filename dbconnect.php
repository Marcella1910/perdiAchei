<?php
// Definição das credenciais para conexão com o banco de dados
$servername = "localhost";  // Endereço do servidor do banco de dados (localhost para ambiente local)
$username = "root";         // Nome de usuário do banco de dados
$password = "usbw";        // Senha do banco de dados (padrão do USBWebServer)
$dbname = "perdiAchei";    // Nome do banco de dados 

// Criar a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error); // Interrompe o script e exibe o erro caso a conexão falhe
}

// Define o conjunto de caracteres para UTF-8 para suportar acentos e caracteres especiais
if (!$conn->set_charset("utf8mb4")) {
    printf("Erro ao definir charset UTF-8: %s\n", $conn->error); // Exibe mensagem de erro se não conseguir definir o charset
    exit(); // Interrompe a execução do script
}

?>
