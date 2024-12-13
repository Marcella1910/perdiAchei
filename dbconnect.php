<?php
$servername = "localhost";
$username = "root";
$password = "usbw"; // Deixe em branco, a menos que tenha configurado uma senha
$dbname = "perdiAchei";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (!$conn->set_charset("utf8mb4")) {
    printf("Erro ao definir charset UTF-8: %s\n", $conn->error);
    exit();
}

?>