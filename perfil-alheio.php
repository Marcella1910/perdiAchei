<?php
session_start(); // Inicia a sessão

include_once 'dbconnect.php'; // Conexão com o banco de dados
include_once 'validaSessao.php'; // Validação da sessão do usuário

// Verifica se o ID do usuário foi passado via GET
if (!isset($_GET['usuario_id'])) {
    echo "Usuário não especificado.";
    exit;
}

// Obtém o ID do usuário e converte para um inteiro
$usuarioId = intval($_GET['usuario_id']);

// Obtém as informações do usuário
$queryUsuario = $conn->prepare("
    SELECT nome, email, foto_perfil 
    FROM usuarios 
    WHERE id = ?
");
$queryUsuario->bind_param("i", $usuarioId); // Prepara a consulta para evitar SQL injection
$queryUsuario->execute(); // Executa a consulta
$resultUsuario = $queryUsuario->get_result(); // Obtém o resultado da consulta

if ($resultUsuario->num_rows == 0) {
    echo "Usuário não encontrado.";
    exit;
}

// Recupera os dados do usuário
$usuario = $resultUsuario->fetch_assoc();

// Obtém as postagens do usuário
$queryPosts = $conn->prepare("
    SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, posts.devolucao, posts.reclamante,
           posts.tipo_imagem, posts.data_criacao
    FROM posts
    WHERE posts.usuario_id = ?
    ORDER BY posts.data_criacao DESC
");
$queryPosts->bind_param("i", $usuarioId); // Prepara a consulta para evitar SQL injection
$queryPosts->execute(); // Executa a consulta
$resultPosts = $queryPosts->get_result(); // Obtém o resultado das postagens

$achados = [];
$perdidos = [];

// Organiza as postagens em arrays de achados e perdidos
while ($post = $resultPosts->fetch_assoc()) {
    // Adiciona informações adicionais à postagem
    $post['nome'] = $usuario['nome']; // Nome do usuário
    $post['usuario_id'] = $usuarioId; // ID do usuário
    $post['foto_perfil'] = $usuario['foto_perfil']; // Foto de perfil do usuário

    // Classifica as postagens de acordo com o status
    if ($post['status'] == 'encontrado') {
        $achados[] = $post;
    } else {
        $perdidos[] = $post;
    }
}

// Define o fuso horário
date_default_timezone_set('America/Sao_Paulo');
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mostra o nome do perfil associado  -->
    <title>Perfil de <?php echo htmlspecialchars($usuario['nome']); ?> - perdiAchei</title>
    <!-- Importando o css  -->
    <link rel="stylesheet" href="css/feed.css">
    <!-- Importando o css e js da barra  -->
    <link rel="stylesheet" href="css/barra-acessibilidade.css">
    <script src="js/barra-acessibilidade.js" defer></script>
    <!-- Importando as fontes  -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Importa a navbar  -->
    <?php include 'navbar.php'; ?>
    <div class="adjustable-font container">
        <!-- Importa o menu esquerdo  -->
        <?php include 'leftMenu.php'; ?>
        <div class="main-content">
            <!-- Inclui o painel de notificações  -->
            <?php include 'notifications-painel.php'; ?>
            <!-- Mostra os dados do usuário  -->
            <div class="visualiza-perfil">
                <div class="header-perfil">
                    <!-- Foto de perfil do usuário  -->
                    <div class="ftperfil">
                        <?php if (isset($usuario['foto_perfil']) && file_exists($usuario['foto_perfil'])): ?>
                            <img src="<?php echo htmlspecialchars($usuario['foto_perfil']); ?>" alt="Foto de perfil">
                        <?php else: ?>
                            <img src="img/userspfp/usericon.jpg" alt="Foto de perfil">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="middle-perfil">
                    <!-- Mostra o nome do usuário  -->
                    <h2 class='nome'><u><?php echo htmlspecialchars($usuario['nome']); ?></u></h2>
                    <!-- Mostra o email do usuário  -->
                    <h3 class='username'><u><?php echo htmlspecialchars($usuario['email']); ?></u></h3>
                </div>
                <!-- Divide os posts em objetos achados e perdidos  -->
                <div class="menu-publicacoes">
                    <button class="menu-btn active" onclick="showSectionPerfil('objetos-perdidos')">objetos
                        perdidos</button>
                    <button class="menu-btn" onclick="showSectionPerfil('objetos-achados')">objetos achados</button>
                </div>
            </div>

            <!-- Objetos Perdidos -->
            <div id="objetos-perdidos" class="section-tipo active">
                <h3>Objetos Perdidos</h3>
                <?php if (count($perdidos) > 0): ?>
                    <?php foreach ($perdidos as $post): ?>
                        <?php include 'postTemplate.php'; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="emptySection">Nenhum objeto perdido registrado.</p>
                <?php endif; ?>
            </div>

            <!-- Objetos Achados -->
            <div id="objetos-achados" class="section-tipo">
                <h3>Objetos Achados</h3>
                <?php if (count($achados) > 0): ?>
                    <?php foreach ($achados as $post): ?>
                        <?php include 'postTemplate.php'; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="emptySection">Nenhum objeto achado registrado.</p>
                <?php endif; ?>
            </div>

            <!-- Modal de report -->
            <?php include 'reportModal.php'; ?>

            <!-- Modal de confirmação para reivindicar um item  -->
            <?php include 'confirmModalItemAchado.php'; ?>

            <!-- Modal de edição de um post  -->
            <?php include 'editModal.php'; ?>

            <!-- Modal de exclusão de um post  -->
            <?php include 'deletePostModal.php'; ?>

            <!-- Modal de confirmação de devolução de um post  -->
            <?php include 'confirmModalItemPerdido.php'; ?>

            <!-- Modal de marcar como encontrado  -->
            <?php include 'confirmModalMarcarComoEncontrado.php'; ?>

            <!-- Modal de confirmação de devolução de um post  -->
            <?php include 'confirmModalItemPerdido.php'; ?>

            <!-- Modal de marcar como reivindicado  -->
            <?php include 'confirmModalMarcarComoReivindicado.php'; ?>

            <!-- Modal de editar perfil  -->
            <?php include 'editPerfilModal.php'; ?>

            <!-- Modal de reivindicação  -->
            <?php include 'formModalItemAchado.php'; ?>

            <!-- Modal de devolução  -->
            <?php include 'formModalItemPerdido.php'; ?>

            <!-- Modal de editar perfil  -->
            <?php include 'editPerfilModal.php'; ?>
        </div>



        <!-- Right Menu -->
        <?php include 'right-menu.php'; ?>
    </div>
    <!-- Importando o js  -->
    <script src="js/perfilalheio.js"></script>
</body>

</html>