<?php
session_start();
// Inicia a sessão para armazenar e acessar dados do usuário logado.

include_once 'dbconnect.php';
include_once 'validaSessao.php';
// Inclui os arquivos responsáveis pela conexão com o banco de dados e validação da sessão do usuário.

// Verifica se há uma consulta de pesquisa enviada via GET
$searchQuery = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';
// Se houver uma query na URL (parâmetro `query`), a sanitiza para evitar SQL Injection usando `real_escape_string`.

if (!empty($searchQuery)) {
    // Se o usuário digitou algo na pesquisa, busca apenas os posts que correspondem ao termo.
    $sql = "
        SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, posts.devolucao, posts.reclamante,
               posts.tipo_imagem, posts.data_criacao, posts.usuario_id, usuarios.nome, usuarios.foto_perfil
        FROM posts
        INNER JOIN usuarios ON posts.usuario_id = usuarios.id
        WHERE posts.titulo LIKE '%$searchQuery%' OR posts.descricao LIKE '%$searchQuery%'
        ORDER BY posts.data_criacao DESC
    ";
} else {
    // Se não houver uma pesquisa, busca todos os posts normalmente, ordenando pelos mais recentes.
    $sql = "
        SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, posts.devolucao, posts.reclamante,
               posts.tipo_imagem, posts.data_criacao, posts.usuario_id, usuarios.nome, usuarios.foto_perfil
        FROM posts
        INNER JOIN usuarios ON posts.usuario_id = usuarios.id
        ORDER BY posts.data_criacao DESC
    ";
}

// Consulta para buscar todas as postagens do banco de dados, independente da pesquisa.
$posts = $conn->query("
        SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, posts.devolucao, posts.reclamante,
               posts.tipo_imagem, posts.data_criacao, posts.usuario_id, usuarios.nome, usuarios.foto_perfil
        FROM posts
        INNER JOIN usuarios ON posts.usuario_id = usuarios.id
        ORDER BY posts.data_criacao DESC
    ");

// Declaração de arrays para armazenar posts por categoria.
$roupaseagasalhos = [];
$eletronicos = [];
$garrafaselancheiras = [];
$utensiliosdecozinha = [];
$materiaisescolares = [];
$documentos = [];
$higieneecosmeticos = [];
$outros = [];

// Percorre todos os posts e os classifica em categorias específicas.
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
    // Se a categoria do post não corresponder a nenhuma das listadas, ele é colocado no array "outros".
}

// Executa a consulta final ao banco de dados.
$result = $conn->query($sql);

if (!$result) {
    // Caso ocorra um erro na execução da consulta, exibe a mensagem de erro e encerra o script.
    die("Erro na consulta SQL: " . $conn->error);
}

// Define o fuso horário para São Paulo (Brasil), garantindo que as datas sejam exibidas corretamente.
date_default_timezone_set('America/Sao_Paulo'); 
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perdiAchei</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Estilo da página  -->
    <link rel="stylesheet" href="css/feed.css">
    <!-- Estilos e scripts da barra -->
    <link rel="stylesheet" href="css/barra-acessibilidade.css">
    <script src="js/barra-acessibilidade.js" defer></script>
    <!-- Fontes  -->
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

            

            <!-- Barra de pesquisa  -->
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

            <!-- Exibe a query pesquisada  -->
            <?php if (!empty($searchQuery)): ?>
                <div class="search-results-message">
                    <p>Exibindo resultados para: <strong><?php echo htmlspecialchars($searchQuery); ?></strong></p>
                </div>
            <?php endif; ?>

            <!-- Section Todos  -->
            <div id="todos" class="section active">
                <!-- Carregando as postagens no feed  -->
                <?php while ($row = $result->fetch_assoc()): ?>
                    <!-- Inicia um loop para percorrer todas as postagens recuperadas do banco de dados. 
                        A variável $row representa cada linha de resultado da consulta. -->

                    <?php $postId = $row['id']; ?>
                    <!-- Armazena o ID da postagem atual em uma variável $postId, usada em várias partes do código. -->

                    <div class="post">
                        <!-- Container principal de cada postagem. -->

                        <div class="post-header">
                            <!-- Cabeçalho da postagem que contém informações sobre o usuário e o menu de ações. -->

                            <div class="pfp-post">
                                <!-- Exibe a foto de perfil do usuário. -->
                                <?php
                                if ($row['foto_perfil'] && file_exists($row['foto_perfil'])) {
                                    // Verifica se o usuário tem uma foto de perfil válida e se o arquivo existe.
                                    if ($row['usuario_id'] == $_SESSION['id']) {
                                        // Se for o usuário logado, o link redireciona para "meuperfil.php".
                                        echo '<a href="meuperfil.php"><img class="pfp" src="' . htmlspecialchars($row['foto_perfil']) . '" alt="Profile Picture"></a>';
                                    } else {
                                        // Caso contrário, redireciona para o perfil de outro usuário.
                                        echo '<a href="perfil-alheio.php?usuario_id=' . $row['usuario_id'] . '"><img class="pfp" src="' . htmlspecialchars($row['foto_perfil']) . '" alt="Profile Picture"></a>';
                                    }
                                } else {
                                    // Caso não tenha uma foto de perfil válida, usa uma imagem padrão.
                                    if ($row['usuario_id'] == $_SESSION['id']) {
                                        echo '<a href="meuperfil.php"><img class="pfp" src="img/userspfp/usericon.jpg" alt="Profile Picture"></a>';
                                    } else {
                                        echo '<a href="perfil-alheio.php?usuario_id=' . $row['usuario_id'] . '"><img class="pfp" src="img/userspfp/usericon.jpg" alt="Profile Picture"></a>';
                                    }
                                }
                                ?>
                            </div>

                            <div class="perfil-post">
                                <!-- Exibe o nome do usuário e a data da postagem. -->
                                <?php
                                if ($row['usuario_id'] == $_SESSION['id']) {
                                    // Nome do usuário logado redireciona para "meuperfil.php".
                                    echo "<p class='nome'><a href='meuperfil.php'>" . htmlspecialchars($row['nome']) . "</a></p>";
                                } else {
                                    // Nome de outros usuários redireciona para "perfil-alheio.php".
                                    echo "<p class='nome'><a href='perfil-alheio.php?usuario_id=" . $row['usuario_id'] . "'>" . htmlspecialchars($row['nome']) . "</a></p>";
                                }
                                ?>
                                <p class="data-post"><?php echo date("d/m/Y", strtotime($row['data_criacao'])); ?></p>
                                <!-- Formata a data da criação da postagem para o formato "dia/mês/ano". -->
                            </div>

                            <div class="menu-container">
                                <!-- Container para o menu dropdown de ações da postagem. -->
                                <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                                <!-- Botão para abrir o menu dropdown. -->
                                <div class="dropdown-menu" id="dropdown-menu">
                                    <ul>
                                        <!-- Lista de ações disponíveis no menu. -->
                                        <?php if ($row['usuario_id'] == $_SESSION['id']): ?>
                                            <!-- Se o usuário logado for o dono da postagem. -->
                                            <?php if ($row['devolucao'] == 'nao'): ?>
                                                <!-- Verifica se o item ainda não foi devolvido. -->
                                                <li><button onclick="openEditPost(<?php echo $postId; ?>)">Editar</button></li>
                                                <!-- Botão para editar a postagem. -->
                                                <li><button class="dropdown-item"
                                                        onclick="openDeletePostModal(<?php echo $postId; ?>)">Excluir</button></li>
                                                <!-- Botão para excluir a postagem. -->

                                                <?php if ($row['status'] == 'encontrado'): ?>
                                                    <!-- Se o status da postagem for "encontrado". -->
                                                    <li><button class="dropdown-item"
                                                            onclick="openConfirmModalMarcarComoReivindicado(<?php echo $postId; ?>)">Marcar
                                                            como 'reivindicado'</button></li>
                                                <?php else: ?>
                                                    <!-- Se o status da postagem for "perdido". -->
                                                    <li><button class="dropdown-item"
                                                            onclick="openConfirmModalMarcarComoEncontrado(<?php echo $postId; ?>)">Marcar
                                                            como 'encontrado'</button></li>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <!-- Caso o item já tenha sido devolvido. -->
                                                <li><button class="dropdown-item"
                                                        onclick="openDeletePostModal(<?php echo $postId; ?>)">Excluir</button></li>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <!-- Se o usuário logado não for o dono da postagem. -->
                                            <?php if ($row['devolucao'] == 'nao'): ?>
                                                <li><button class="dropdown-item"
                                                        onclick="openReportForm(<?php echo $postId; ?>)">Reportar</button></li>
                                                <?php if ($row['status'] == 'encontrado'): ?>
                                                    <!-- Caso o item tenha sido encontrado. -->
                                                    <li><button class="dropdown-item"
                                                            onclick="openConfirmPopup(<?php echo $postId; ?>)">Reivindicar item</button>
                                                    </li>
                                                <?php else: ?>
                                                    <!-- Caso o item esteja perdido. -->
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
                            <!-- Exibe o conteúdo principal da postagem: título, mídia e descrição. -->
                            <h2 class="titulo"><?php echo htmlspecialchars($row['titulo']); ?></h2>
                            <div class="midia">
                                <!-- Verifica e exibe a mídia anexada à postagem. -->
                                <?php if ($row['imagem']): ?>
                                    <?php if (strpos($row['tipo_imagem'], 'image') === 0): ?>
                                        <!-- Se for uma imagem, exibe-a como <img>. -->
                                        <img class="imagem-post"
                                            src="data:<?php echo $row['tipo_imagem']; ?>;base64,<?php echo base64_encode($row['imagem']); ?>"
                                            alt="Imagem da postagem">
                                    <?php else: ?>
                                        <!-- Se for um vídeo, exibe-o como <video>. -->
                                        <video class="video-post" controls>
                                            <source
                                                src="data:<?php echo $row['tipo_imagem']; ?>;base64,<?php echo base64_encode($row['imagem']); ?>">
                                        </video>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <p class="texto-post"><?php echo htmlspecialchars($row['descricao']); ?></p>
                            <!-- Exibe a descrição da postagem. -->
                        </div>

                        <div class="post-footer">
                            <!-- Rodapé da postagem contendo tags e botões de ação. -->
                            <div class="tags-post">
                                <button class="tp_publicacao">
                                    <!-- Botão indicando o tipo da postagem (achado ou perdido). -->
                                    <?php echo htmlspecialchars($row['status'] == 'encontrado' ? 'objeto achado' : 'objeto perdido'); ?>
                                </button>
                                <button class="tag-item"><?php echo htmlspecialchars($row['categoria']); ?></button>
                                <!-- Botão para a categoria da postagem. -->
                            </div>
                            <div class="acoes">
                                <!-- Botões de ação relacionados ao item (reivindicar ou encontrado). -->
                                <?php if ($row['usuario_id'] != $_SESSION['id']): ?>
                                    <!-- Exibe opções para outros usuários. -->
                                    <?php if ($row['devolucao'] == 'nao'): ?>
                                        <?php if ($row['status'] == 'encontrado'): ?>
                                            <button class="e-meu" onclick="openConfirmPopup(<?php echo $postId; ?>)">é meu !</button>
                                        <?php elseif ($row['status'] == 'perdido'): ?>
                                            <button class="encontrei"
                                                onclick="openConfirmPopupItemPerdido(<?php echo $postId; ?>)">encontrei !</button>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <!-- Indica que o item já foi devolvido. -->
                                        <?php if ($row['status'] == 'encontrado'): ?>
                                            <p class="infodevolucao">Reivindicado por:
                                                <?php echo htmlspecialchars($row['reclamante']); ?>
                                            </p>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <!-- Fim do loop de postagens. -->


            </div>

            <!-- Section categoria roupas e agasalhos  -->
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

            <!-- Section categoria eletrônicos  -->
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

            <!-- Section categoria garrafas e lancheiras  -->
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

            <!-- Section categoria utensílios de cozinha  -->
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

            <!-- Section categoria materiais escolares  -->
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

            <!-- Section categoria documentos  -->
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

            <!-- Section categoria produtos de higiene/cosméticos  -->
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

            <!-- Section categoria Outros  -->
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

            <!-- Modal de report das postagens  -->
            <?php include 'reportModal.php'; ?>

            <!-- Modal de confirmação para reivindicar um item  -->
            <?php include 'confirmModalItemAchado.php'; ?>

            <!-- Modal de reivindicação de um item  -->
            <?php include 'formModalItemAchado.php'; ?>

            <!-- Modal de editar um post  -->
            <?php include 'editModal.php'; ?>

            <!-- Modal de excluir um post  -->
            <?php include 'deletePostModal.php'; ?>

            <!-- Modal de confirmação de devolução de um item  -->
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
    <!-- Importando o script js  -->
    <script src="js/feed.js"></script>

</body>

</html>