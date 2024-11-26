<!--Perfil de outro usuário-->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perdiAchei</title>

    <link rel="stylesheet" href="css/feed.css">

    <!-- Estilos e scripts da barra -->
    <link rel="stylesheet" href="css/barra-acessibilidade.css">
    <script src="js/barra-acessibilidade.js" defer></script>

    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body>

    <!-- Inclui a Navbar -->
    <?php include 'navbar.php'; ?>


    <!-- Main Container -->
    <div class="adjustable-font container">

        <!-- Include Left Menu -->
        <?php include 'leftMenu.php'; ?>

        <!-- Middle Content -->
        <div class="main-content">
             <!--Div da pequena tela que aparece quando se clica em notificações-->
            <div class="notification-panel">
                <div class="notification-header">
                    <h2 class="username">@kdb</h2>
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

            <!--Criar local de post-->
            <div class="create-post">
                <textarea maxlength="80" rows="1" cols="30" class="titulopost"
                    placeholder="dê um título a postagem..."></textarea>
                <textarea class="descricaopost" maxlength="280" rows="5" cols="30"
                    placeholder="perdeu ou achou algo?"></textarea>
                <div id="preview-container" class="preview-container" style="display: none;">
                    <button id="cancel-button" style="margin-top: 10px;"><i class="fa-solid fa-xmark"></i></button>
                    <img id="preview-image" class="preview-image" alt="Pré-visualização da Imagem"
                        style="display: none;">
                    <video id="preview-video" class="preview-video" controls style="display: none;"></video>
                </div>
                <div class="botoes">
                    <button>criar publicação</button>
                    <div class="botoes-ladodir">

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
                            <input id="file-upload" type="file" accept="image/*,video/*">
                        </div>
                    </div>

                </div>

            </div>

            <!--Visualizar perfil de outro usuário-->
            <div class="visualiza-perfil">
                <div class="header-perfil">
                    <button class="menu-button">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                    <div class="dropdown-menu" id="dropdown-menu">
                        <ul>
                            <li><button class="dropdown-item" onclick="openReportForm()">Reportar</button></li>
                            <li><button class="dropdown-item">Entrar em contato com usuário</button></li>
                        </ul>
                    </div>
                    <div class="ftperfil">
                        <img src="img/userspfp/chuu.jpg"></img>
                    </div>
                </div>

                <div class="middle-perfil">
                    <h2 class="nome">chuu</h2>
                    <h3 class="username">@chuu</h3>

                </div>

                <div class="menu-publicacoes">
                    <button class="menu-btn active" onclick="showSectionPerfil('objetos-perdidos')">objetos
                        perdidos</button>
                    <button class="menu-btn" onclick="showSectionPerfil('objetos-achados')">objetos achados</button>

                </div>
            </div>

            <!-- Create Post Section -->

            <!--Items perdidos de outro usuário-->
            <div id="objetos-perdidos" class="section-tipo active">
                <h3>Objetos Perdidos</h3>




            </div>

            <!--Items achados do outro usuário-->
            <div id="objetos-achados" class="section-tipo">
                <h3>Objetos Achados</h3>
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
                                    <li><button class="dropdown-item" onclick="openConfirmPopUp()">Entrar em contato com
                                            usuário</button></li>
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
                            <button class="e-meu">é meu !</button>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Modal de reportar usuário -->
            <?php include 'reportModal.php'; ?>

            <!-- Modal de quando se reinvidica um item -->
            <?php include 'confirmarReivindicarItemModal.php'; ?>

            <!-- Modal de quando o usuário quer reinvidicar um item -->
            <?php include 'reivindicarItemModal.php'; ?>

            <!-- Modal de editar publicação -->
            <?php include 'editModal.php'; ?>

            <!-- Modal de excluir publicação -->
            <?php include 'deletePostModal.php'; ?>

            <!-- Modal de quando se encontrar um item -->
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

        </div>

    </div>


    <script src="js/feed.js" defer></script>
</body>

</html>