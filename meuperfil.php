<?php
session_start();

include_once 'dbconnect.php';
include_once 'validaSessao.php';

$usuarioId = $_SESSION['id'];

$posts = $conn->query("
    SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, 
           posts.tipo_imagem, posts.data_criacao, posts.usuario_id, usuarios.nome, usuarios.foto_perfil
    FROM posts
    INNER JOIN usuarios ON posts.usuario_id = usuarios.id
    WHERE posts.usuario_id = '$usuarioId'
    ORDER BY posts.data_criacao DESC
");

$achados = [];
$perdidos = [];

while ($post = $posts->fetch_assoc()) {
    if ($post['status'] == 'encontrado') {
        $achados[] = $post;
    } else {
        $perdidos[] = $post;
    }
}

date_default_timezone_set('America/Sao_Paulo'); // Altere para o fuso horário desejado

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perdiAchei</title>
    <link rel="stylesheet" href="css/feed.css">
    <link rel="stylesheet" href="css/barra-acessibilidade.css">
    <script src="js/barra-acessibilidade.js" defer></script>
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="adjustable-font container">
        <?php include 'leftMenu.php'; ?>
        <div class="main-content">
            <?php include 'notifications-painel.php'; ?>
            <?php include 'create-post-form.php'; ?>

            <div class="visualiza-perfil">
                <div class="header-perfil">
                    <button class="editperfil" onclick="openEditProfile()">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
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
                    <h2 class='nome'><u><?php echo $_SESSION['nome']; ?></u></h2>
                    <h3 class='username'><u><?php echo $_SESSION['email']; ?></u></h3>
                </div>
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

            <?php include 'confirmarReivindicarItemModal.php'; ?>

            <?php include 'editModal.php'; ?>

            <?php include 'deletePostModal.php'; ?>

            <?php include 'confirmModalItemPerdido.php'; ?>

            <!-- Modal de marcar como encontrado  -->
            <?php include 'confirmModalMarcarComoEncontrado.php'; ?>

            <!-- Modal de marcar como encontrado  -->
            <?php include 'formModalItemPerdido.php'; ?>

            <!-- Modal de marcar como reivindicado  -->
            <?php include 'confirmModalMarcarComoReivindicado.php'; ?>

            <!-- Modal de marcar como reivindicado  -->
            <?php include 'marcarComoReivindicado.php'; ?>

        </div>
        <div class="right-menu">

        </div>
    </div>
    <script src="js/feed.js"></script>
</body>

</html>