<?php
error_reporting(0); // Desativa mensagens de erro para evitar saídas indesejadas
ini_set('display_errors', 0);

if (!empty($_GET['id'])) {
    include_once 'dbconnect.php'; // Verifique se não há espaços no arquivo incluído

    $id = intval($_GET['id']); // Converte para inteiro (segurança)

    // Verifica se o usuário existe antes de deletar
    $bancoSelect = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($bancoSelect);

    if ($result && $result->num_rows > 0) {
        $sqlDelete = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
        $sqlDelete->bind_param("i", $id);
        $sqlDelete->execute();
    }
}

// Fecha a sessão e redireciona
session_write_close();
header('Location: login.php');
exit();
