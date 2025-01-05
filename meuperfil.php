<?php
session_start();

include_once 'dbconnect.php';
include_once 'validaSessao.php';

$usuarioId = $_SESSION['id'];

// Consulta para obter postagens do usuário logado
$result = $conn->query("SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, posts.tipo_imagem, posts.data_criacao, posts.usuario_id, usuarios.nome, usuarios.foto_perfil FROM posts INNER JOIN usuarios ON posts.usuario_id = usuarios.id WHERE posts.usuario_id = '$usuarioId' ORDER BY posts.data_criacao DESC");

if (!$result) {
    die("Erro na consulta SQL: " . $conn->error);
}

$postsAchados = [];
$postsPerdidos = [];

// Separar postagens em arrays diferentes
while ($row = $result->fetch_assoc()) {
    if ($row['status'] == 'encontrado') {
        $postsAchados[] = $row;
    } else {
        $postsPerdidos[] = $row;
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
                <?php if (count($postsPerdidos) > 0): ?>
                    <?php foreach ($postsPerdidos as $post): ?>
                        <div class="post">
                            <div class="post-header">
                                <div class="pfp-post">
                                    <?php
                                    // Exibe a foto do usuário ou uma imagem padrão
                                    if ($row['foto_perfil'] && file_exists($row['foto_perfil'])) {
                                        echo '<img class="pfp" src="' . htmlspecialchars($row['foto_perfil']) . '" alt="Profile Picture">';
                                    } else {
                                        echo '<img class="pfp" src="img/userspfp/usericon.jpg" alt="Profile Picture">';
                                    }
                                    ?>
                                </div>
                                <div class="perfil-post">
                                    <?php
                                    // Exibe o nome do usuário associado
                                    echo "<p class='nome'>" . htmlspecialchars($row['nome']) . "</p>";
                                    ?>
                                    <p class="data-post"><?php echo date("d/m/Y", strtotime($row['data_criacao'])); ?></p>
                                </div>
                                <div class="menu-container">
                                    <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                                    <div class="dropdown-menu" id="dropdown-menu">
                                        <ul>
                                            <?php if ($row['usuario_id'] == $_SESSION['id']): ?>
                                                <!-- Se a postagem pertence ao usuário logado -->
                                                <li><button onclick="openEditPost(<?php echo $postId; ?>)">Editar</button></li>
                                                <li><button class="dropdown-item"
                                                        onclick="openDeletePostModal(<?php echo $postId; ?>)">Excluir</button></li>
                                                <li><button class="dropdown-item"
                                                        onclick="openConfirmModalMarcarComoEncontrado()">Marcar como
                                                        'encontrado'</button></li>
                                            <?php else: ?>
                                                <!-- Se a postagem pertence a outro usuário -->
                                                <li><button class="dropdown-item" onclick="openReportForm()">Reportar</button></li>
                                                <?php if ($row['status'] == 'encontrado'): ?>
                                                    <!-- Caso seja um objeto achado -->
                                                    <li><button class="dropdown-item" onclick="openConfirmPopup()">Reivindicar
                                                            item</button></li>
                                                <?php else: ?>
                                                    <!-- Caso seja um objeto perdido -->
                                                    <li><button class="dropdown-item" onclick="openConfirmPopupItemPerdido()">Entrar em
                                                            contato com usuário</button></li>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="conteudo-principal">
                                <h2 class="titulo"><?php echo htmlspecialchars($row['titulo']); ?></h2>
                                <div class="midia">
                                    <?php if ($row['imagem']): ?>
                                        <?php if (strpos($row['tipo_imagem'], 'image') === 0): ?>
                                            <img class="imagem-post"
                                                src="data:<?php echo $row['tipo_imagem']; ?>;base64,<?php echo base64_encode($row['imagem']); ?>"
                                                alt="Imagem da postagem">
                                        <?php else: ?>
                                            <video class="video-post" controls>
                                                <source
                                                    src="data:<?php echo $row['tipo_imagem']; ?>;base64,<?php echo base64_encode($row['imagem']); ?>">
                                            </video>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <p class="texto-post"><?php echo htmlspecialchars($row['descricao']); ?></p>
                            </div>

                            <div class="post-footer">
                                <div class="tags-post">
                                    <button class="tp_publicacao">
                                        <?php echo htmlspecialchars($row['status'] == 'encontrado' ? 'objeto achado' : 'objeto perdido'); ?>
                                    </button>
                                    <button class="tag-item"><?php echo htmlspecialchars($row['categoria']); ?></button>
                                </div>
                                <div class="acoes">
                                    <?php if ($row['usuario_id'] != $_SESSION['id']): ?>
                                        <!-- Verifica se a postagem não pertence ao usuário logado -->
                                        <?php if ($row['status'] == 'encontrado'): ?>
                                            <!-- Caso seja um objeto encontrado -->
                                            <button class="e-meu" onclick="openConfirmPopup()">é meu !</button>
                                        <?php elseif ($row['status'] == 'perdido'): ?>
                                            <!-- Caso seja um objeto perdido -->
                                            <button class="encontrei" onclick="openConfirmPopupItemPerdido()">encontrei !</button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Você não tem objetos perdidos registrados.</p>
                <?php endif; ?>
            </div>

            <!-- Objetos Achados -->
            <div id="objetos-achados" class="section-tipo">
                <h3>Objetos Achados</h3>
                <?php if (count($postsAchados) > 0): ?>
                    <?php foreach ($postsAchados as $post): ?>
                        <div class="post">
                            <div class="post-header">
                                <div class="pfp-post">
                                    <?php
                                    // Exibe a foto do usuário ou uma imagem padrão
                                    if ($row['foto_perfil'] && file_exists($row['foto_perfil'])) {
                                        echo '<img class="pfp" src="' . htmlspecialchars($row['foto_perfil']) . '" alt="Profile Picture">';
                                    } else {
                                        echo '<img class="pfp" src="img/userspfp/usericon.jpg" alt="Profile Picture">';
                                    }
                                    ?>
                                </div>
                                <div class="perfil-post">
                                    <?php
                                    // Exibe o nome do usuário associado
                                    echo "<p class='nome'>" . htmlspecialchars($row['nome']) . "</p>";
                                    ?>
                                    <p class="data-post"><?php echo date("d/m/Y", strtotime($row['data_criacao'])); ?></p>
                                </div>
                                <div class="menu-container">
                                    <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                                    <div class="dropdown-menu" id="dropdown-menu">
                                        <ul>
                                            <?php if ($row['usuario_id'] == $_SESSION['id']): ?>
                                                <!-- Se a postagem pertence ao usuário logado -->
                                                <li><button onclick="openEditPost(<?php echo $postId; ?>)">Editar</button></li>
                                                <li><button class="dropdown-item"
                                                        onclick="openDeletePostModal(<?php echo $postId; ?>)">Excluir</button></li>
                                                <li><button class="dropdown-item"
                                                        onclick="openConfirmModalMarcarComoEncontrado()">Marcar como
                                                        'encontrado'</button></li>
                                            <?php else: ?>
                                                <!-- Se a postagem pertence a outro usuário -->
                                                <li><button class="dropdown-item" onclick="openReportForm()">Reportar</button></li>
                                                <?php if ($row['status'] == 'encontrado'): ?>
                                                    <!-- Caso seja um objeto achado -->
                                                    <li><button class="dropdown-item" onclick="openConfirmPopup()">Reivindicar
                                                            item</button></li>
                                                <?php else: ?>
                                                    <!-- Caso seja um objeto perdido -->
                                                    <li><button class="dropdown-item" onclick="openConfirmPopupItemPerdido()">Entrar em
                                                            contato com usuário</button></li>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="conteudo-principal">
                                <h2 class="titulo"><?php echo htmlspecialchars($row['titulo']); ?></h2>
                                <div class="midia">
                                    <?php if ($row['imagem']): ?>
                                        <?php if (strpos($row['tipo_imagem'], 'image') === 0): ?>
                                            <img class="imagem-post"
                                                src="data:<?php echo $row['tipo_imagem']; ?>;base64,<?php echo base64_encode($row['imagem']); ?>"
                                                alt="Imagem da postagem">
                                        <?php else: ?>
                                            <video class="video-post" controls>
                                                <source
                                                    src="data:<?php echo $row['tipo_imagem']; ?>;base64,<?php echo base64_encode($row['imagem']); ?>">
                                            </video>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <p class="texto-post"><?php echo htmlspecialchars($row['descricao']); ?></p>
                            </div>

                            <div class="post-footer">
                                <div class="tags-post">
                                    <button class="tp_publicacao">
                                        <?php echo htmlspecialchars($row['status'] == 'encontrado' ? 'objeto achado' : 'objeto perdido'); ?>
                                    </button>
                                    <button class="tag-item"><?php echo htmlspecialchars($row['categoria']); ?></button>
                                </div>
                                <div class="acoes">
                                    <?php if ($row['usuario_id'] != $_SESSION['id']): ?>
                                        <!-- Verifica se a postagem não pertence ao usuário logado -->
                                        <?php if ($row['status'] == 'encontrado'): ?>
                                            <!-- Caso seja um objeto encontrado -->
                                            <button class="e-meu" onclick="openConfirmPopup()">é meu !</button>
                                        <?php elseif ($row['status'] == 'perdido'): ?>
                                            <!-- Caso seja um objeto perdido -->
                                            <button class="encontrei" onclick="openConfirmPopupItemPerdido()">encontrei !</button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Você não tem objetos achados registrados.</p>
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