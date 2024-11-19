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
                    <button class="createPostBtn" id="createPostBtn">criar publicação</button>
                    <div class="botoes-ladodir">

                        <select class="select-tags">

                            <option value="1">Roupas e agasalhos</option>
                            <option value="2">Eletrônicos</option>
                            <option value="3">Garrafas e Lancheiras</option>
                            <option value="4">Utensílios de cozinha</option>
                            <option value="5">Materiais escolares</option>
                            <option value="6">Documentos</option>
                            <option value="7">Produtos de higiene/Cosmético</option>
                            <option value="8">Outros</option>

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
                            <input id="file-upload" type="file" accept="image/*,video/*">
                        </div>
                    </div>

                </div>

            </div>

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

                    <?php
                    echo "<h2 class='nome'><u>{$_SESSION['nome']}</u></h2>";
                    ?>
                    <?php
                    echo "<h3 class = 'username'> @<u>{$_SESSION['usuario']}</u></h3>";
                    ?>
                    <div class="descricaoperfil">
                        <?php
                        echo "<p><u>{$_SESSION['descricao']}</u></p>";
                        ?>
                    </div>
                </div>

                <div class="menu-publicacoes">
                    <button class="menu-btn active" onclick="showSectionPerfil('objetos-perdidos')">objetos
                        perdidos</button>
                    <button class="menu-btn" onclick="showSectionPerfil('objetos-achados')">objetos achados</button>

                </div>
            </div>

            <!-- Create Post Section -->


            <div id="objetos-perdidos" class="section-tipo active">
                <h3>Objetos Perdidos</h3>

                <div class="post">

                    <div class="post-header">
                        <div class="pfp-post">
                            <img class="pfp" src="img/userspfp/usericon.jpg">
                        </div>
                        <div class="perfil-post">
                            <p class="nome">kevin de bruyne</p>
                            <p class="data-post">12/12/12</p>
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
                            perdi minha carteiraa
                        </h2>
                        <div class="midia">
                            <img class="imagem-post" src="img/postagens/carteira.jpg">
                        </div>
                        <p class="texto-post">perdi minha carteira '-'</p>
                    </div>


                    <div class="post-footer">
                        <div class="tags-post">
                            <button class="tp_publicacao">
                                objeto perdido
                            </button>
                            <button class="tag-item">
                                <i class="fa-solid fa-id-card"></i>
                                documentos
                            </button>
                        </div>



                    </div>
                </div>


            </div>

            <div id="objetos-achados" class="section-tipo">
                <h3>Objetos Achados</h3>

                <div class="post">

                    <div class="post-header">
                        <div class="pfp-post">
                            <img class="pfp" src="img/userspfp/usericon.jpg">
                        </div>
                        <div class="perfil-post">
                            <p class="nome">kevin de bruyne</p>
                            <p class="data-post">12/12/12</p>
                        </div>
                        <div class="menu-container">
                            <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                            <div class="dropdown-menu" id="dropdown-menu">
                                <ul>
                                    <li><button class="dropdown-item" onclick="openEditPost()">Editar</button></li>
                                    <li><button class="dropdown-item" onclick="openDeletePostModal()">Excluir</button>
                                    </li>
                                    <li><button class="dropdown-item"
                                            onclick="openConfirmModalMarcarComoReivindicado()">Marcar como
                                            'reivindicado'</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="conteudo-principal">
                        <h2 class="titulo">
                            encontrei um caderno
                        </h2>
                        <div class="midia">
                            <img class="imagem-post" src="img/postagens/caderno.jpg">
                        </div>
                        <p class="texto-post">caderno</p>
                    </div>


                    <div class="post-footer">
                        <div class="tags-post">
                            <button class="tp_publicacao">
                                objeto achado
                            </button>
                            <button class="tag-item">
                                <i class="fa-solid fa-pencil"></i> materiais escolares
                            </button>
                        </div>



                    </div>
                </div>




            </div>

            <!-- Posts -->

            <div class="modal" id="editPerfilModal">
                <form action="editar_perfil.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="profile-picture-container">
                            <div class="upload-pfp">
                                <label for="profile-upload" class="upload-button">
                                    <i class="fa-solid fa-camera"></i>
                                </label>
                                <input id="profile-upload" name="profile-upload" type="file" accept="image/*">
                            </div>
                            <?php
                            if (isset($_SESSION['foto_perfil']) && file_exists($_SESSION['foto_perfil'])) {
                                echo '<img id="profile-image" src="' . $_SESSION['foto_perfil'] . '" alt="Profile Picture">';
                            } else {
                                echo '<img id="profile-image" src="img/userspfp/usericon.jpg" alt="Profile Picture">';
                            }
                            ?>
                        </div>

                        <input type="text" id="editName" name="editName" placeholder="Nome"
                            value="<?php echo $_SESSION['nome']; ?>">

                        <input type="text" id="editUserName" name="editUserName" placeholder="Username"
                            value="@<?php echo $_SESSION['usuario']; ?>">

                        <?php
                        // Inicializar a chave 'descricao' se não estiver definida
                        if (!isset($_SESSION['descricao'])) {
                            $_SESSION['descricao'] = ''; // ou algum valor padrão
                        }
                        ?>

                        <?php
                        // Depuração - Exibe o conteúdo de $_SESSION['descricao']
                        var_dump($_SESSION['descricao']);
                        ?>

                        <textarea placeholder="Adicione uma breve descrição sobre você" id="editUserDesc"
                            name="editUserDesc">
                            <?php
                            // Verifica se a descrição existe e remove os espaços extras
                            echo isset($_SESSION['descricao']) ? htmlspecialchars(trim($_SESSION['descricao'])) : '';
                            ?>
                        </textarea>







                        <div class="footerEditPerfilModal">
                            <div class="bts-popup">
                                <button type="button" class="cancelarReport"
                                    onclick="closeEditProfile()">Cancelar</button>
                                <button type="submit" class="submit-button">Salvar Alterações</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div id="editModal" class="modal">
                <div class="modal-content">

                    <h2 class="editModalUsername">@kdb</h2>

                    <div id="editForm">

                        <div class="tags-tipos">

                            <div class="toggle-buttons">
                                <input type="radio" id="perdido" name="status" value="perdido">
                                <label for="perdido" class="toggle-button">objeto perdido</label>

                                <input type="radio" id="encontrado" name="status" value="encontrado">
                                <label for="encontrado" class="toggle-button">objeto encontrado</label>
                            </div>

                            <select class="select-tags">

                                <option value="1">Roupas e agasalhos</option>
                                <option value="2">Eletrônicos</option>
                                <option value="3">Garrafas e Lancheiras</option>
                                <option value="4">Utensílios de cozinha</option>
                                <option value="5">Materiais escolares</option>
                                <option value="6">Documentos</option>
                                <option value="7">Produtos de higiene/Cosmético</option>
                                <option value="8">Outros</option>

                            </select>


                        </div>

                        <input type="text" id="postTitle" name="title" placeholder="dê um título a postagem..."
                            value="">


                        <textarea placeholder="descreva o item..." id="postContent"></textarea>

                        <!-- Área de upload -->


                        <!-- Pré-visualização -->
                        <div id="editPreviewContainer" class="preview-container" style="display: none;">
                            <button id="editCancelPreview" class="cancel-preview" style="margin-top: 10px;"><i
                                    class="fa-solid fa-xmark"></i></button>
                            <img id="editPreviewImage" class="preview-image-editpost" alt="Pré-visualização da Imagem"
                                style="display: none;">
                            <video id="editPreviewVideo" class="preview-video-editpost" controls
                                style="display: none;"></video>
                        </div>

                        <div class="footerEditForm">
                            <div class="upload-container">
                                <label for="editFileUpload" class="upload-button">
                                    escolher arquivo
                                </label>
                                <input id="editFileUpload" type="file" accept="image/*,video/*" style="display: none;">
                            </div>

                            <div class="bts-popup">
                                <button type="button" class="cancel-button" onclick="closeEditPost()">Cancelar</button>
                                <button type="submit" class="submit-button" onclick="closeEditPost()">Salvar
                                    Alterações</button>
                            </div>

                        </div>
                        <!-- Botões do modal -->

                    </div>
                </div>
            </div>

            <div id="deletePostModal" class="modal">
                <div class="modal-content">
                    <form id="excluirPostagemForm">
                        <h2 class="excluirFormTitulo">
                            Tem certeza que deseja excluir essa publicação?
                        </h2>
                        <h4 class="excluirFormSubtitulo">Essa ação é permanente e não poderá ser desfeita.</h4>
                        <div class="bts-popup">
                            <button type="button" class="cancel-button" onclick="closeDeletePost()">Cancelar</button>
                            <button type="submit" class="submit-button">Ok</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal" id="confirmModalMarcarComoEncontrado">
                <div class="modal-content">
                    <h3 class="confirmModalMarcarComoEncontradoTitulo">Marcar como encontrado</h3>
                    <p class="confirmModalMarcarComoEncontradoSubtitulo">Encontrou este objeto? Marcar como "encontrado"
                        desativará a publicação, tornando-a invisível para outros usuários.</p>
                    <form id="formMarcarComoEncontrado">
                        <div class="bts-popup">
                            <button type="button" class="cancel-button"
                                onclick="closeConfirmModalMarcarComoEncontrado()">Cancelar</button>
                            <button type="submit" class="submit-button">Marcar como encontrado</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal" id="confirmModalMarcarComoReivindicado">
                <div class="modal-content">
                    <h3 class="confirmModalMarcarComoReivindicadoTitulo">Marcar como reivindicado</h3>
                    <p class="confirmModalMarcarComoReivindicadoSubtitulo">Devolveu este objeto? Marcar como
                        "reivindicado"
                        desativará a publicação, tornando-a invisível para outros usuários. Você precisará preencher
                        algumas informações sobre o processo de reclamação do objeto.</p>

                    <div class="bts-popup">
                        <button class="cancel-button"
                            onclick="closeConfirmModalMarcarComoReivindicado()">Cancelar</button>
                        <button class="confirm-button" onclick="openFormModalMarcarComoReivindicado()">Próximo</button>
                    </div>

                </div>
            </div>

            <div class="modal" id="formModalMarcarComoReivindicado">
                <div class="modal-content">
                    <h3 class="formModalMarcarComoReivindicadoTitulo">Defina o dono</h3>
                    <form id="formMarcarComoReivindicado">

                        <div class="input-container">
                            <label for="textarea" rows="1" cols="30">Marque o nome de usuário da pessoa para quem você
                                entregou o item. Esta informação será registrada para garantir a segurança do
                                site.</label>
                            <textarea id="textarea" placeholder="Digite @ para marcar alguém..." spellcheck="false"
                                required></textarea>
                            <div id="suggestions" class="suggestions"></div>
                        </div>

                        <div class="bts-popup">
                            <button type="button" class="cancel-button"
                                onclick="closeFormModalMarcarComoReivindicado()">Cancelar</button>
                            <button type="submit" class="submit-button">Marcar como reivindicado</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

        <!-- Right Menu -->
        <div class="right-menu">

        </div>

    </div>


    <script src="js/feed.js"></script>
</body>

</html>