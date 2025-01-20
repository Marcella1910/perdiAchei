<?php

require 'dbconnect.php'; // Certifique-se de que este arquivo contém a conexão correta

if (!isset($_SESSION['id'])) {
    die("Erro: ID do usuário não encontrado.");
}

$idUsuario = $_SESSION['id'];

// Verifica se a conexão foi estabelecida corretamente
if (!$conn) {
    die("Erro na conexão com o banco de dados.");
}

// Consulta preparada para evitar SQL Injection
$stmt = $conn->prepare("SELECT foto_perfil FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$result = $stmt->get_result();

// Pega o resultado da consulta
$usuario = $result->fetch_assoc();
$stmt->close();

// Define a foto de perfil na sessão
$_SESSION['foto_perfil'] = isset($usuario['foto_perfil']) ? $usuario['foto_perfil'] : 'img/userspfp/usericon.jpg';

// Verifica se o arquivo da foto existe, caso contrário, usa a imagem padrão
$fotoPerfil = file_exists($_SESSION['foto_perfil']) ? $_SESSION['foto_perfil'] : 'img/userspfp/usericon.jpg';
?>

<!-- Menu direito -->
<div class="right-menu">
    <div class="header-right-menu">
        <p>Perfil</p>
        <!-- Botão de editar perfil -->
        <button class="editperfil" onclick="openEditProfile()">
            <i class="fa-solid fa-pen-to-square"></i>
        </button>
    </div>
    <div class="centro-menu-right">
        <div class="ftperfil clickable-profile">
            <img src="<?= htmlspecialchars($fotoPerfil) ?>" alt="Profile Picture">
        </div>
        <h2 class='nome clickable-profile'><?= htmlspecialchars($_SESSION['nome']) ?></h2>
        <h2 class='username clickable-profile'><u><?= htmlspecialchars($_SESSION['email']) ?></u></h2>
    </div>
</div>
