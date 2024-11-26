<?php

session_start();

include_once 'dbconnect.php';
include_once 'validaSessao.php';


$result = $conn->query("SELECT titulo, descricao, categoria, status, imagem, tipo_imagem, data_criacao FROM posts ORDER BY data_criacao DESC");

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


            <div class="notification-panel">
                <div class="notification-header">
                    <?php
                    echo "<h2 class='username'> @<u>{$_SESSION['usuario']}</u></h2>";
                    ?>
                </div>
                <ul class="notification-list">
                    <li>
                        <div class="notif">
                            <img src="img/userspfp/jinsoul.jpg" alt="Usuário 1">
                            <div class="dados-notif">
                                <p>@jinsoul</p>
                                <p>quer reivindicar um item postado!</p>
                            </div>
                    </li>
                    <li>
                        <div class="notif">
                            <img src="img/userspfp/jinsoul.jpg" alt="Usuário 1">
                            <div class="dados-notif">
                                <p>@jinsoul</p>
                                <p>quer reivindicar um item postado!</p>
                            </div>
                    </li>
                    <li>
                        <div class="notif">
                            <img src="img/userspfp/jinsoul.jpg" alt="Usuário 1">
                            <div class="dados-notif">
                                <p>@jinsoul</p>
                                <p>quer reivindicar um item postado!</p>
                            </div>
                    </li>
                    <li>
                        <div class="notif">
                            <img src="img/userspfp/jinsoul.jpg" alt="Usuário 1">
                            <div class="dados-notif">
                                <p>@jinsoul</p>
                                <p>quer reivindicar um item postado!</p>
                            </div>
                    </li>
                    <!-- Adicione mais notificações aqui -->
                </ul>
            </div>

            <!-- Create Post Section -->
            <div class="create-post">
                <form action="criar_post.php" method="POST" enctype="multipart/form-data">
                    <textarea name="titulo" maxlength="80" rows="1" cols="30" class="titulopost"
                        placeholder="dê um título a postagem..."></textarea>
                    <textarea name="descricao" class="descricaopost" maxlength="280" rows="5" cols="30"
                        placeholder="perdeu ou achou algo?"></textarea>
                    <div id="preview-container" class="preview-container" style="display: none;">
                        <button id="cancel-button" style="margin-top: 10px;"><i class="fa-solid fa-xmark"></i></button>
                        <img id="preview-image" class="preview-image" alt="Pré-visualização da Imagem"
                            style="display: none;">
                        <video id="preview-video" class="preview-video" controls style="display: none;"></video>
                    </div>
                    <div class="botoes">
                        <button type="submit" class="createPostBtn" id="createPostBtn">criar publicação</button>
                        <div class="botoes-ladodir">
                            <select name="categoria" class="select-tags" id="select-tags">

                                <option value="roupas e agasalhos">roupas e agasalhos</option>
                                <option value="eletrônicos">eletrônicos</option>
                                <option value="garrafas e lancheiras">garrafas e lancheiras</option>
                                <option value="utensílios de cozinha">utensílios de cozinha</option>
                                <option value="materiais escolares">materiais escolares</option>
                                <option value="documentos">documentos</option>
                                <option value="produtos de higiene/cosmético">produtos de higiene/cosmético</option>
                                <option value="outros">outros</option>

                            </select>

                            <div class="toggle-buttons">
                                <input type="radio" id="perdido" name="status" value="perdido">
                                <label for="perdido" class="toggle-button">objeto perdido</label>

                                <input type="radio" id="encontrado" name="status" value="encontrado">
                                <label for="encontrado" class="toggle-button">objeto encontrado</label>
                            </div>

                            <div class="upload-container">
                                <label for="file-upload" class="upload-button">
                                    <i class="fa-solid fa-upload"></i>
                                </label>
                                <input name="media" id="file-upload" type="file" required accept="image/*,video/*">
                            </div>
                        </div>

                    </div>
                </form>
            </div>

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
                    <div class="post">

                        <div class="post-header">
                            <div class="pfp-post clickable-profile">
                                <?php
                                if (isset($_SESSION['foto_perfil']) && file_exists($_SESSION['foto_perfil'])) {
                                    echo '<img class="pfp" src="' . $_SESSION['foto_perfil'] . '" alt="Profile Picture">';
                                } else {
                                    echo '<img class="pfp" src="img/userspfp/usericon.jpg" alt="Profile Picture">';
                                }
                                ?>
                            </div>
                            <div class="perfil-post">
                                <?php
                                echo "<p class='nome clickable-profile'>{$_SESSION['nome']}</p>";
                                ?>
                                <p class="data-post"><?php echo date("d/m/Y", strtotime($row['data_criacao'])); ?></p>
                            </div>
                            <div class="menu-container">
                                <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                                <div class="dropdown-menu" id="dropdown-menu">
                                <ul>
                                    <li><button class="dropdown-item" onclick="openEditPost()">Editar</button></li>
                                    <li><button class="dropdown-item" onclick="openDeletePostModal()">Excluir</button>
                                    </li>
                                    <li><button class="dropdown-item"
                                            onclick="openConfirmModalMarcarComoEncontrado()">Marcar como
                                            'encontrado'</button></li>
                                </ul>
                            </div>
                            </div>
                        </div>

                        <div class="conteudo-principal">
                            <h2 class="titulo">
                                <?php echo htmlspecialchars($row['titulo']); ?>
                            </h2>
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
                                <button class="tag-item">
                                    <?php echo htmlspecialchars($row['categoria']); ?>
                                </button>
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


            
            
            <?php include 'reportModal.php'; ?>

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
        <div class="right-menu">
            <div class="header-right-menu">
                <p>Perfil</p>
                <button class="editperfil" onclick="openEditProfile()">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
            </div>
            <div class="centro-menu-right">
                <div class="ftperfil clickable-profile">
                    <?php
                    if (isset($_SESSION['foto_perfil']) && file_exists($_SESSION['foto_perfil'])) {
                        echo '<img src="' . $_SESSION['foto_perfil'] . '" alt="Profile Picture">';
                    } else {
                        echo '<img src="img/userspfp/usericon.jpg" alt="Profile Picture">';
                    }
                    ?>
                </div>

                <?php
                echo "<h2 class='nome clickable-profile'>{$_SESSION['nome']}</h2>";
                echo "<h2 class='username clickable-profile'><u>@{$_SESSION['usuario']}</u></h2>";
                ?>
            </div>
        </div>


    </div>


    <script src="js/feed.js"></script>


</body>

</html>