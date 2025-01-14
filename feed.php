<?php
session_start();

include_once 'dbconnect.php';
include_once 'validaSessao.php';

// Consulta SQL para buscar posts e dados do usuário associado
$searchQuery = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

if (!empty($searchQuery)) {
    // Consulta apenas resultados correspondentes à pesquisa
    $sql = "
        SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, posts.devolucao,
               posts.tipo_imagem, posts.data_criacao, posts.usuario_id, usuarios.nome, usuarios.foto_perfil
        FROM posts
        INNER JOIN usuarios ON posts.usuario_id = usuarios.id
        WHERE posts.titulo LIKE '%$searchQuery%' OR posts.descricao LIKE '%$searchQuery%'
        ORDER BY posts.data_criacao DESC
    ";
} else {
    // Consulta padrão
    $sql = "
        SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, posts.devolucao,
               posts.tipo_imagem, posts.data_criacao, posts.usuario_id, usuarios.nome, usuarios.foto_perfil
        FROM posts
        INNER JOIN usuarios ON posts.usuario_id = usuarios.id
        ORDER BY posts.data_criacao DESC
    ";
}

$posts = $conn->query("
        SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, posts.devolucao,
               posts.tipo_imagem, posts.data_criacao, posts.usuario_id, usuarios.nome, usuarios.foto_perfil
        FROM posts
        INNER JOIN usuarios ON posts.usuario_id = usuarios.id
        ORDER BY posts.data_criacao DESC
    ");

$roupaseagasalhos = [];
$eletronicos = [];
$garrafaselancheiras = [];
$utensiliosdecozinha = [];
$materiaisescolares = [];
$documentos = [];
$higieneecosmeticos = [];
$outros = [];

while ($post = $posts->fetch_assoc()) {
    if ($post['categoria'] == 'roupas e agasalhos') {
        $roupaseagasalhos[] = $post;
    } else if ($post['categoria'] == 'eletrônicos') {
        $eletronicos[] = $post;
    } else if ($post['categoria'] == 'garrafas e lancheiras') {
        $garrafaselancheiras[] = $post;
    } else if ($post['categoria'] == 'utensílios de cozinha') {
        $utensiliosdecozinha[] = $post;
    } else if ($post['categoria'] == 'materiais escolares') {
        $materiaisescolares[] = $post;
    } else if ($post['categoria'] == 'documentos') {
        $documentos[] = $post;
    } else if ($post['categoria'] == 'produtos de higiene/cosmético') {
        $higieneecosmeticos[] = $post;
    } else {
        $outros[] = $post;
    }

}

$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta SQL: " . $conn->error);
}

date_default_timezone_set('America/Sao_Paulo'); // Altere para o fuso horário desejado
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perdiAchei</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/feed.css">

    <!-- Estilos e scripts da barra -->
    <link rel="stylesheet" href="css/barra-acessibilidade.css">
    <script src="js/barra-acessibilidade.js" defer></script>

    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Inclui a Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Container -->
    <div class="adjustable-font container">

        <!-- Inclui Left Menu -->
        <?php include 'leftMenu.php'; ?>

        <!-- Middle Content -->
        <div class="main-content">

            <!-- Painel de notificações -->
            <?php include 'notifications-painel.php' ?>


            <div class="search-bar">
                <form id="search-form" method="GET" autocomplete="off">
                    <i class="fas fa-search"></i>
                    <input type="text" id="search-input" name="query" placeholder="pesquise um item...">
                </form>
                <div id="suggestions-box"></div>
            </div>


            <!-- Criar post formulário -->
            <?php if (empty($searchQuery)): ?>
                <?php include 'create-post-form.php'; ?>
            <?php endif; ?>

            <!-- Tags -->
            <?php if (empty($searchQuery)): ?>
                <div class="tags">
                    <button class="tag active" data-section="todos" onclick="showSection('todos')">Todos</button>
                    <button class="tag" data-section="roupas" onclick="showSection('roupas')">
                        <i class="fa-solid fa-shirt"></i> Roupas e agasalhos
                    </button>
                    <button class="tag" data-section="eletronicos" onclick="showSection('eletronicos')">
                        <i class="fa-solid fa-mobile"></i> Eletrônicos
                    </button>
                    <button class="tag" data-section="garrafas" onclick="showSection('garrafas')">
                        <i class="fa-solid fa-bottle-water"></i> Garrafas e lancheiras
                    </button>
                    <button class="tag" data-section="utensilioscozinha" onclick="showSection('utensilioscozinha')">
                        <i class="fa-solid fa-spoon"></i> Utensílios de cozinha
                    </button>
                    <button class="tag" data-section="materiaisescolares" onclick="showSection('materiaisescolares')">
                        <i class="fa-solid fa-pencil"></i> Materiais escolares
                    </button>
                    <button class="tag" data-section="documentos" onclick="showSection('documentos')">
                        <i class="fa-solid fa-id-card"></i> Documentos
                    </button>
                    <button class="tag" data-section="produtoshigiene" onclick="showSection('produtoshigiene')">
                        <i class="fa-solid fa-pump-soap"></i> Produtos de higiene/Cosmético
                    </button>
                    <button class="tag" data-section="outros" onclick="showSection('outros')">Outros</button>
                </div>
            <?php endif; ?>

            <?php if (!empty($searchQuery)): ?>
                <div class="search-results-message">
                    <p>Exibindo resultados para: <strong><?php echo htmlspecialchars($searchQuery); ?></strong></p>
                </div>
            <?php endif; ?>

            <div id="todos" class="section active">

                <?php while ($row = $result->fetch_assoc()): ?>
                    <?php $postId = $row['id']; ?> <!-- Garantindo que $postId está correto -->
                    <div class="post">
                        <div class="post-header">
                            <div class="pfp-post">
                                <?php
                                // Exibe a foto do usuário ou uma imagem padrão
                                if ($row['foto_perfil'] && file_exists($row['foto_perfil'])) {
                                    // Verifica se é o mesmo usuário logado
                                    if ($row['usuario_id'] == $_SESSION['id']) {
                                        echo '<a href="meuperfil.php"><img class="pfp" src="' . htmlspecialchars($row['foto_perfil']) . '" alt="Profile Picture"></a>';
                                    } else {
                                        echo '<a href="perfil-alheio.php?usuario_id=' . $row['usuario_id'] . '"><img class="pfp" src="' . htmlspecialchars($row['foto_perfil']) . '" alt="Profile Picture"></a>';
                                    }
                                } else {
                                    // Caso não tenha foto, usa a imagem padrão
                                    if ($row['usuario_id'] == $_SESSION['id']) {
                                        echo '<a href="meuperfil.php"><img class="pfp" src="img/userspfp/usericon.jpg" alt="Profile Picture"></a>';
                                    } else {
                                        echo '<a href="perfil-alheio.php?usuario_id=' . $row['usuario_id'] . '"><img class="pfp" src="img/userspfp/usericon.jpg" alt="Profile Picture"></a>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="perfil-post">
                                <?php
                                // Exibe o nome do usuário associado
                                if ($row['usuario_id'] == $_SESSION['id']) {
                                    echo "<p class='nome'><a href='meuperfil.php'>" . htmlspecialchars($row['nome']) . "</a></p>";
                                } else {
                                    echo "<p class='nome'><a href='perfil-alheio.php?usuario_id=" . $row['usuario_id'] . "'>" . htmlspecialchars($row['nome']) . "</a></p>";
                                }
                                ?>
                                <p class="data-post"><?php echo date("d/m/Y", strtotime($row['data_criacao'])); ?></p>
                            </div>
                            <div class="menu-container">
                                <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                                <div class="dropdown-menu" id="dropdown-menu">
                                    <ul>
                                        <?php if ($row['usuario_id'] == $_SESSION['id']): ?>
                                            <?php if ($row['devolucao'] == 'nao'): ?>
                                                <!-- Se a postagem pertence ao usuário logado -->
                                                <li><button onclick="openEditPost(<?php echo $postId; ?>)">Editar</button></li>
                                                <li><button class="dropdown-item"
                                                        onclick="openDeletePostModal(<?php echo $postId; ?>)">Excluir</button></li>
                                                <?php if ($row['status'] == 'encontrado'): ?>
                                                    <!-- Caso seja um objeto achado -->
                                                    <li><button class="dropdown-item"
                                                            onclick="openConfirmModalMarcarComoReivindicado(<?php echo $postId; ?>)">Marcar
                                                            como
                                                            'reivindicado'</button></li>
                                                <?php else: ?>
                                                    <!-- Caso seja um objeto perdido -->
                                                    <li><button class="dropdown-item"
                                                            onclick="openConfirmModalMarcarComoEncontrado(<?php echo $postId; ?>)">Marcar
                                                            como
                                                            'encontrado'</button></li>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <li><button class="dropdown-item"
                                                        onclick="openDeletePostModal(<?php echo $postId; ?>)">Excluir</button></li>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if ($row['devolucao'] == 'nao'): ?>
                                                <!-- Se a postagem pertence a outro usuário -->
                                                <li><button class="dropdown-item"
                                                        onclick="openReportForm(<?php echo $postId; ?>)">Reportar</button></li>
                                                <?php if ($row['status'] == 'encontrado'): ?>
                                                    <!-- Caso seja um objeto achado -->
                                                    <li><button class="dropdown-item"
                                                            onclick="openConfirmPopup(<?php echo $postId; ?>)">Reivindicar
                                                            item</button></li>
                                                <?php else: ?>
                                                    <!-- Caso seja um objeto perdido -->
                                                    <li><button class="dropdown-item"
                                                            onclick="openConfirmPopupItemPerdido(<?php echo $postId; ?>)">Entrar em
                                                            contato com usuário</button></li>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <li><button class="dropdown-item"
                                                        onclick="openReportForm(<?php echo $postId; ?>)">Reportar</button></li>
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
                                    <?php if ($row['devolucao'] == 'nao'): ?>
                                        <?php if ($row['status'] == 'encontrado'): ?>
                                            <!-- Caso seja um objeto encontrado -->
                                            <button class="e-meu" onclick="openConfirmPopup(<?php echo $postId; ?>)">é meu !</button>
                                        <?php elseif ($row['status'] == 'perdido'): ?>
                                            <!-- Caso seja um objeto perdido -->
                                            <button class="encontrei"
                                                onclick="openConfirmPopupItemPerdido(<?php echo $postId; ?>)">encontrei !</button>
                                        <?php endif; ?>
                                    <?php elseif ($row['devolucao'] == 'sim'): ?>
                                        <?php if ($row['status'] == 'encontrado'): ?>
                                            <!-- Caso seja um objeto encontrado -->
                                            <button class="e-meu indisponivel" onclick="openConfirmPopup(<?php echo $postId; ?>)" disabled>é meu !</button>
                                            <p class="infodevolucao">Reivindicado por: Fulano de tal</p>
                                        <?php elseif ($row['status'] == 'perdido'): ?>
                                            <!-- Caso seja um objeto perdido -->
                                            <button class="encontrei indisponivel"
                                                onclick="openConfirmPopupItemPerdido(<?php echo $postId; ?>)" disabled>encontrado</button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>
            <div id="roupas" class="section">
                <h3>Roupas e agasalhos</h3>
                <?php if (count($roupaseagasalhos) > 0): ?>
                    <?php foreach ($roupaseagasalhos as $post): ?>
                        <?php include 'postTemplateTags.php'; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="emptySection">Nenhuma postagem em "Roupas e agasalhos" feita.</p>
                <?php endif; ?>
            </div>
            <div id="eletronicos" class="section">
                <h3>Eletrônicos</h3>
                <?php if (count($eletronicos) > 0): ?>
                    <?php foreach ($eletronicos as $post): ?>
                        <?php include 'postTemplateTags.php'; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="emptySection">Nenhuma postagem em "Eletrônicos" feita.</p>
                <?php endif; ?>
            </div>
            <div id="garrafas" class="section">
                <h3>Garrafas e Lancheiras</h3>
                <?php if (count($garrafaselancheiras) > 0): ?>
                    <?php foreach ($garrafaselancheiras as $post): ?>
                        <?php include 'postTemplateTags.php'; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="emptySection">Nenhuma postagem em "Garrafas e lancheiras" feita.</p>
                <?php endif; ?>
            </div>
            <div id="utensilioscozinha" class="section">
                <h3>Utensílios de cozinha</h3>
                <?php if (count($utensiliosdecozinha) > 0): ?>
                    <?php foreach ($utensiliosdecozinha as $post): ?>
                        <?php include 'postTemplateTags.php'; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="emptySection">Nenhuma postagem em "Utensílios de cozinha" feita.</p>
                <?php endif; ?>
            </div>
            <div id="materiaisescolares" class="section">
                <h3>Materiais Escolares</h3>
                <?php if (count($materiaisescolares) > 0): ?>
                    <?php foreach ($materiaisescolares as $post): ?>
                        <?php include 'postTemplateTags.php'; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="emptySection">Nenhuma postagem em "Materiais escolares" feita.</p>
                <?php endif; ?>
            </div>
            <div id="documentos" class="section">
                <h3>Documentos</h3>
                <?php if (count($documentos) > 0): ?>
                    <?php foreach ($documentos as $post): ?>
                        <?php include 'postTemplateTags.php'; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="emptySection">Nenhuma postagem em "Documentos" feita.</p>
                <?php endif; ?>
            </div>
            <div id="produtoshigiene" class="section">
                <h3>Produtos higienicos</h3>
                <?php if (count($higieneecosmeticos) > 0): ?>
                    <?php foreach ($higieneecosmeticos as $post): ?>
                        <?php include 'postTemplateTags.php'; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="emptySection">Nenhuma postagem em "Produtos de higiene/cosmético" feita.</p>
                <?php endif; ?>
            </div>
            <div id="outros" class="section">
                <h3>Outros</h3>
                <?php if (count($outros) > 0): ?>
                    <?php foreach ($outros as $post): ?>
                        <?php include 'postTemplateTags.php'; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="emptySection">Nenhuma postagem em "Outros" feita.</p>
                <?php endif; ?>
            </div>


            <?php include 'reportModal.php'; ?>

            <?php include 'confirmModalItemAchado.php'; ?>

            <?php include 'formModalItemAchado.php'; ?>

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
            <?php include 'formModalMarcarComoReivindicado.php'; ?>

            <!-- Modal de editar perfil  -->
            <?php include 'editPerfilModal.php'; ?>



        </div>

        <!-- Right Menu -->
        <?php include 'right-menu.php'; ?>


    </div>


    <script src="js/feed.js"></script>


</body>

</html>