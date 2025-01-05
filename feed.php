<?php
session_start();

include_once 'dbconnect.php';
include_once 'validaSessao.php';

// Consulta SQL para buscar posts e dados do usuário associado
$result = $conn->query("
    SELECT posts.id, posts.titulo, posts.descricao, posts.categoria, posts.status, posts.imagem, 
           posts.tipo_imagem, posts.data_criacao, posts.usuario_id, usuarios.nome, usuarios.foto_perfil
    FROM posts
    INNER JOIN usuarios ON posts.usuario_id = usuarios.id
    ORDER BY posts.data_criacao DESC
");

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
                <i class="fas fa-search"></i>
                <input type="text" placeholder="pesquisar um item...">
            </div>

            <!-- Criar post formulário  -->
            <?php include 'create-post-form.php'; ?>

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

            <div id="todos" class="section active">

                <?php while ($row = $result->fetch_assoc()): ?>
                    <?php $postId = $row['id']; ?> <!-- Garantindo que $postId está correto -->
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
                                            <li><button class="dropdown-item" onclick="openDeletePostModal(<?php echo $postId; ?>)">Excluir</button></li>
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
                <?php endwhile; ?>






                <div class="post">

                    <div class="post-header">
                        <div class="pfp-post clickable-profile-alheio">
                            <img class="pfp" src="img/userspfp/chuu.jpg">
                        </div>
                        <div class="perfil-post">
                            <p class="nome clickable-profile-alheio">chuu</p>
                            <p class="data-post">12/12/12</p>
                        </div>
                        <div class="menu-container">
                            <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                            <div class="dropdown-menu" id="dropdown-menu">
                                <ul>
                                    <li><button class="dropdown-item" onclick="openReportForm()">Reportar</button></li>
                                    <li><button class="dropdown-item" onclick="openConfirmPopup()">Reivindicar
                                            item</button></li>
                                </ul>
                            </div>
                        </div>


                    </div>

                    <div class="conteudo-principal">
                        <h2 class="titulo">
                            achei uma garrafa
                        </h2>
                        <div class="midia">
                            <img class="imagem-post" src="img/postagens/garrafinha.jpg">
                        </div>
                        <p class="texto-post">olha essa garrafa que eu achei</p>
                    </div>


                    <div class="post-footer">
                        <div class="tags-post">
                            <button class="tp_publicacao">
                                objeto achado
                            </button>
                            <button class="tag-item">
                                <i class="fa-solid fa-bottle-water"></i>
                                garrafas e lancheiras
                            </button>
                        </div>

                        <div class="acoes">
                            <button class="e-meu" onclick="openConfirmPopup()">é meu !</button>
                        </div>

                    </div>
                </div>

                <div class="post">

                    <div class="post-header">
                        <div class="pfp-post">
                            <img class="pfp" src="img/userspfp/haseul.jpg">
                        </div>
                        <div class="perfil-post">
                            <p class="nome">haseul</p>
                            <p class="data-post">12/12/12</p>
                        </div>
                        <div class="menu-container">
                            <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                            <div class="dropdown-menu" id="dropdown-menu">
                                <ul>
                                    <li><button class="dropdown-item" onclick="openReportForm()">Reportar</button></li>
                                    <li><button class="dropdown-item" onclick="openConfirmPopupItemPerdido()">Entrar em
                                            contato com usuário</button></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="conteudo-principal">
                        <h2 class="titulo">
                            perdi minha estojo mi ajuda
                        </h2>
                        <div class="midia">
                            <img class="imagem-post" src="img/postagens/estojo.jpg">
                        </div>
                        <p class="texto-post">meu estojo</p>
                    </div>


                    <div class="post-footer">
                        <div class="tags-post">
                            <button class="tp_publicacao">
                                objeto perdido
                            </button>
                            <button class="tag-item">
                                <i class="fa-solid fa-pencil"></i> materiais escolares
                            </button>
                        </div>

                        <div class="acoes">
                            <button class="encontrei" onclick="openConfirmPopupItemPerdido()">encontrei !</button>
                        </div>

                    </div>
                </div>



            </div>
            <div id="roupas" class="section">
                <h3>Roupas e agasalhos</h3>
            </div>
            <div id="eletronicos" class="section">
                <h3>Eletrônicos</h3>
            </div>
            <div id="garrafas" class="section">
                <h3>Garrafas e Lancheiras</h3>
                <div class="post">

                    <div class="post-header">
                        <div class="pfp-post clickable-profile-alheio">
                            <img class="pfp" src="img/userspfp/chuu.jpg">
                        </div>
                        <div class="perfil-post">
                            <p class="nome">chuu</p>
                            <p class="data-post">12/12/12</p>
                        </div>
                        <div class="menu-container">
                            <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                            <div class="dropdown-menu" id="dropdown-menu">
                                <ul>
                                    <li><button class="dropdown-item" onclick="openReportForm()">Reportar</button></li>
                                    <li><button class="dropdown-item" onclick="openConfirmPopup()">Reivindicar
                                            item</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="conteudo-principal">
                        <h2 class="titulo">
                            achei uma garrafa
                        </h2>
                        <div class="midia">
                            <img class="imagem-post" src="img/postagens/garrafinha.jpg">
                        </div>
                        <p class="texto-post">olha essa garrafa que eu achei</p>
                    </div>


                    <div class="post-footer">
                        <div class="tags-post">
                            <button class="tp_publicacao">
                                objeto achado
                            </button>
                            <button class="tag-item">
                                <i class="fa-solid fa-bottle-water"></i>
                                garrafas e lancheiras
                            </button>
                        </div>

                        <div class="acoes">
                            <button class="e-meu" onclick="openConfirmPopup()">é meu !</button>
                        </div>

                    </div>
                </div>

            </div>
            <div id="utensilioscozinha" class="section">
                <h3>Utensílios de cozinha</h3>
            </div>
            <div id="materiaisescolares" class="section">
                <h3>Materiais Escolares</h3>



                <div class="post">

                    <div class="post-header">
                        <div class="pfp-post">
                            <img class="pfp" src="img/userspfp/haseul.jpg">
                        </div>
                        <div class="perfil-post">
                            <p class="nome">haseul</p>
                            <p class="data-post">12/12/12</p>
                        </div>
                        <div class="menu-container">
                            <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                            <div class="dropdown-menu" id="dropdown-menu">
                                <ul>
                                    <li><button class="dropdown-item" onclick="openReportForm()">Reportar</button></li>
                                    <li><button class="dropdown-item" onclick="openConfirmPopupItemPerdido()">Entrar em
                                            contato com usuário</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="conteudo-principal">
                        <h2 class="titulo">
                            perdi minha estojo mi ajuda
                        </h2>
                        <div class="midia">
                            <img class="imagem-post" src="img/postagens/estojo.jpg">
                        </div>
                        <p class="texto-post">meu estojo</p>
                    </div>


                    <div class="post-footer">
                        <div class="tags-post">
                            <button class="tp_publicacao">
                                objeto perdido
                            </button>
                            <button class="tag-item">
                                <i class="fa-solid fa-pencil"></i> materiais escolares
                            </button>
                        </div>

                        <div class="acoes">
                            <button class="encontrei" onclick="openConfirmPopupItemPerdido()">encontrei !</button>
                        </div>

                    </div>
                </div>

            </div>
            <div id="documentos" class="section">
                <h3>Documentos</h3>





            </div>
            <div id="produtoshigiene" class="section">
                <h3>Produtos higienicos</h3>
            </div>
            <div id="outros" class="section">
                <h3>Outros</h3>
            </div>


            <div class="modal" id="reportModal">
                <div class="modal-content">
                    <h3>Reportar usuário</h3>
                    <form id="reportForm">
                        <label for="reportReason">Está vendo alguma coisa que não deveria?</label><br>
                        <textarea id="reportReason" name="reportReason" placeholder="descreva o motivo da denúncia..."
                            maxlength="280" required></textarea><br>
                        <div class="bts-popup">
                            <button class="cancelarReport" onclick="closeReportForm()">Cancelar</button>
                            <button type="submit" class="submit-button">Enviar Denúncia</button>
                        </div>

                    </form>
                </div>
            </div>


            <?php include 'confirmarReivindicarItemModal.php'; ?>

            <?php include 'reivindicarItemModal.php'; ?>

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

            <!-- Modal de editar perfil  -->
            <?php include 'editPerfilModal.php'; ?>



        </div>

        <!-- Right Menu -->
        <?php include 'right-menu.php'; ?>
        

    </div>


    <script src="js/feed.js"></script>


</body>

</html>