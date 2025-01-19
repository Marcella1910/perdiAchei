<?php
session_start(); //Inicia a sessão 

// Inclui os arquivos necessários para conexão com o banco e validação de sessão
include_once 'dbconnect.php';
include_once 'validaSessao.php';

// Obtém o ID do usuário da sessão
$usuarioId = $_SESSION['id'];

// Consulta SQL para pegar os posts do usuário logado, incluindo dados do usuário
$posts = $conn->query("
    SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, posts.devolucao, posts.reclamante,
           posts.tipo_imagem, posts.data_criacao, posts.usuario_id, usuarios.nome, usuarios.foto_perfil
    FROM posts
    INNER JOIN usuarios ON posts.usuario_id = usuarios.id
    WHERE posts.usuario_id = '$usuarioId'
    ORDER BY posts.data_criacao DESC
");

// Inicializa arrays para categorizar os posts
$achados = [];
$perdidos = [];

// Itera sobre os posts retornados pela consulta e os divide em achados e perdidos
while ($post = $posts->fetch_assoc()) {
    if ($post['status'] == 'encontrado') {
        $achados[] = $post;
    } else {
        $perdidos[] = $post;
    }
}

// Define o fuso horário para o Brasil
date_default_timezone_set('America/Sao_Paulo');
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu perfil</title>
    <!-- Importando o css  -->
    <link rel="stylesheet" href="css/feed.css">
    <!-- Importando o css e js da barra  -->
    <link rel="stylesheet" href="css/barra-acessibilidade.css">
    <script src="js/barra-acessibilidade.js" defer></script>
    <!-- Importando as fontes  -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Incluir a navbar  -->
    <?php include 'navbar.php'; ?>
    <div class="adjustable-font container">
        <!-- Menu esquerdo  -->
        <?php include 'leftMenu.php'; ?>

        <!-- Conteúdo principal  -->
        <div class="main-content">

            <!-- Painel de notificações  -->
            <?php include 'notifications-painel.php'; ?>

            <!-- Section de criação de post  -->
            <?php include 'create-post-form.php'; ?>

            <!-- Mostra as informações do usuário  -->
            <div class="visualiza-perfil">
                <div class="header-perfil">
                    <!-- Abre o modal de edição do perfil  -->
                    <button class="editperfil" onclick="openEditProfile()">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <!-- Foto do usuário  -->
                    <div class="ftperfil">
                        <?php
                        if (isset($_SESSION['foto_perfil']) && file_exists($_SESSION['foto_perfil'])) {
                            echo '<img src="' . $_SESSION['foto_perfil'] . '" alt="Profile Picture">';
                        } else {
                            echo '<img src="img/userspfp/usericon.jpg" alt="Profile Picture">';
                        }
                        ?>
                    </div>
                </div>
                <div class="middle-perfil">
                    <!-- Nome do usuário  -->
                    <h2 class='nome'><u><?php echo $_SESSION['nome']; ?></u></h2>
                    <!-- Email do usuário  -->
                    <h3 class='username'><u><?php echo $_SESSION['email']; ?></u></h3>
                </div>
                <!-- Divide os posts em achados e perdidos  -->
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
                    <p class="emptySection">Você não tem objetos perdidos registrados.</p>
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
                    <p class="emptySection">Você não tem objetos achados registrados.</p>
                <?php endif; ?>
            </div>

            <!-- Modal de editar perfil  -->
            <?php include 'editPerfilModal.php'; ?>

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

            <!-- Modal de marcar como encontrado  -->
            <?php include 'formModalItemPerdido.php'; ?>

            <!-- Modal de marcar como reivindicado  -->
            <?php include 'confirmModalMarcarComoReivindicado.php'; ?>

            <!-- Modal de marcar como reivindicado  -->
            <?php include 'formModalMarcarComoReivindicado.php'; ?>

        </div>

        <!-- Menu direito  -->
        <div class="right-menu">
            
        </div>
    </div>
    <!-- Importando script js  -->
    <script src="js/feed.js"></script>
</body>

</html>