<?php
session_start();

include_once 'dbconnect.php';
include_once 'validaSessao.php';

// Verifica se o ID do usuário foi passado via GET
if (!isset($_GET['usuario_id'])) {
    echo "Usuário não especificado.";
    exit;
}

$usuarioId = intval($_GET['usuario_id']);

// Obtém informações do usuário
$queryUsuario = $conn->prepare("
    SELECT nome, email, foto_perfil 
    FROM usuarios 
    WHERE id = ?
");
$queryUsuario->bind_param("i", $usuarioId);
$queryUsuario->execute();
$resultUsuario = $queryUsuario->get_result();

if ($resultUsuario->num_rows == 0) {
    echo "Usuário não encontrado.";
    exit;
}

$usuario = $resultUsuario->fetch_assoc();

// Obtém postagens do usuário
$queryPosts = $conn->prepare("
    SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, 
           posts.tipo_imagem, posts.data_criacao
    FROM posts
    WHERE posts.usuario_id = ?
    ORDER BY posts.data_criacao DESC
");
$queryPosts->bind_param("i", $usuarioId);
$queryPosts->execute();
$resultPosts = $queryPosts->get_result();

$achados = [];
$perdidos = [];

// Organizando postagens em arrays de achados e perdidos
while ($post = $resultPosts->fetch_assoc()) {
    // Preenche as informações necessárias para cada postagem
    $post['nome'] = $usuario['nome']; // Nome do usuário
    $post['usuario_id'] = $usuarioId; // ID do usuário
    $post['foto_perfil'] = $usuario['foto_perfil']; // Foto de perfil do usuário

    if ($post['status'] == 'encontrado') {
        $achados[] = $post;
    } else {
        $perdidos[] = $post;
    }
}

date_default_timezone_set('America/Sao_Paulo'); // Ajuste o fuso horário conforme necessário
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?php echo htmlspecialchars($usuario['nome']); ?> - perdiAchei</title>
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
            <div class="visualiza-perfil">
                <div class="header-perfil">
                    <div class="ftperfil">
                        <?php if (isset($usuario['foto_perfil']) && file_exists($usuario['foto_perfil'])): ?>
                            <img src="<?php echo htmlspecialchars($usuario['foto_perfil']); ?>" alt="Foto de perfil">
                        <?php else: ?>
                            <img src="img/userspfp/usericon.jpg" alt="Foto de perfil">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="middle-perfil">
                    <h2 class='nome'><u><?php echo htmlspecialchars($usuario['nome']); ?></u></h2>
                    <h3 class='username'><u><?php echo htmlspecialchars($usuario['email']); ?></u></h3>
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

            <!-- Modals -->
            <?php include 'reportModal.php'; ?>
            <?php include 'confirmModalItemAchado.php'; ?>
            <?php include 'editModal.php'; ?>
            <?php include 'deletePostModal.php'; ?>
            <?php include 'confirmModalItemPerdido.php'; ?>
            <?php include 'confirmModalMarcarComoEncontrado.php'; ?>
            <?php include 'confirmModalItemPerdido.php'; ?>
            <?php include 'confirmModalMarcarComoReivindicado.php'; ?>
            <?php include 'marcarComoReivindicado.php'; ?>
            <?php include 'editPerfilModal.php'; ?>

        </div>
        <div class="right-menu"></div>
    </div>
    <script src="js/perfilalheio.js"></script>
</body>

</html>