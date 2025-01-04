<?php
session_start();
include_once 'dbconnect.php';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['id']; // Identifica o usuário logado
    
    // Verificar se os campos existem antes de acessá-los
    $nome = isset($_POST['editName']) ? $conn->real_escape_string($_POST['editName']) : $_SESSION['nome'];
    $usuario = isset($_POST['editUserName']) ? $conn->real_escape_string($_POST['editUserName']) : $_SESSION['usuario'];
    
    $fotoPerfilPath = null;

    // Verificar se uma nova foto de perfil foi enviada
    if (isset($_FILES['profile-upload']) && $_FILES['profile-upload']['error'] === 0) {
        $uploadDir = 'img/userspfp/';
        $fileName = uniqid() . '_' . basename($_FILES['profile-upload']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Validar e mover o arquivo
        if (move_uploaded_file($_FILES['profile-upload']['tmp_name'], $targetFilePath)) {
            $fotoPerfilPath = $targetFilePath;
        } else {
            echo "Erro ao fazer upload da foto de perfil.";
        }
    }

    // Verificar se o campo usuário está vazio
    if (!empty($usuario)) {
        // Verificar se o nome de usuário já existe
        $checkQuery = "SELECT id FROM usuarios WHERE usuario = '$usuario' AND id != $userId";
        $checkResult = $conn->query($checkQuery);
        
        if ($checkResult->num_rows > 0) {
            echo "Erro: Nome de usuário já está em uso.";
            exit();
        }
    }

    // Montar a query de atualização
    $sql = "UPDATE usuarios SET nome = '$nome'";
    if (!empty($usuario)) {
        $sql .= ", usuario = '$usuario'";
    }
    if ($fotoPerfilPath) {
        $sql .= ", foto_perfil = '$fotoPerfilPath'";
    }
    $sql .= " WHERE id = $userId";

    if ($conn->query($sql)) {
        // Atualizar a sessão com os novos dados
        $_SESSION['nome'] = $nome;
        $_SESSION['usuario'] = $usuario;
        
        if ($fotoPerfilPath) {
            $_SESSION['foto_perfil'] = $fotoPerfilPath;
        }

        header('Location: feed.php'); // Redireciona de volta ao feed
        exit();
    } else {
        echo "Erro ao atualizar o perfil: " . $conn->error;
    }
}

$conn->close();
?>
