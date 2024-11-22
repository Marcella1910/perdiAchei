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

            <div class="modal" id="confirmModal">
                <div class="modal-content">
                    <h3>Entrar em contato com usuário</h3>
                    <p>Deseja reivindicar um item? Preencha as informações necessárias e sua mensagem será enviada por
                        e-mail para o dono da postagem.</p>
                    <div class="bts-popup">
                        <button class="cancelarReport" onclick="closeConfirmPopup()">Cancelar</button>
                        <button class="confirm-button" onclick="openFormPopup()">Confirmar</button>
                    </div>

                </div>
            </div>

            <div class="modal" id="formModal">
                <div class="modal-content">
                    <h3>Reivindicar um item</h3>
                    <h4>Indique porque é que este item é seu</h4>
                    <p>Descreva o item o mais detalhadamente possível, especialmente o que não é visível ou que não foi
                        descrito. Desta forma, o responsável pelo artigo encontrado pode ter a certeza de que se trata
                        do próprio proprietário. E, se possível, forneça o máximo de informação possível sobre o local
                        em que perdeu o artigo (p. ex. número da sala/data ou horário que perdeu). Tenha cuidado ao
                        partilhar dados pessoais.</p>
                    <form id="contactForm">

                        <textarea id="contactReason" name="contactReason"
                            placeholder="descreva o motivo de reivindicar este item..." required></textarea><br>
                        <p>Você pode adicionar uma imagem que mostre ao dono. Por exemplo, uma foto do item ou um
                            comprovante de compra.</p>
                        <div class="container-upload-foto">
                            <input type="file" id="input-upload-foto" accept="image/*"
                                onchange="visualizarFoto(event)" />
                            <label for="input-upload-foto" class="botao-upload-foto">
                                enviar foto
                            </label>
                            <div class="container-preview-foto" id="container-preview-foto">
                                <img id="preview-foto" src="#" alt="Pré-visualização" style="display:none;" />
                                <button id="botao-remover-foto" class="botao-remover-foto" style="display:none;"
                                    onclick="removerFoto()"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>

                        <div class="bts-popup">
                            <button type="button" class="cancel-button" onclick="closeFormPopup()">Cancelar</button>
                            <button type="submit" class="submit-button">Enviar</button>
                        </div>

                    </form>
                </div>
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

            <div class="modal" id="confirmModalItemPerdido">
                <div class="modal-content">
                    <h3>Entrar em contato com usuário</h3>
                    <p>Deseja devolver um item? Preencha as informações necessárias e sua mensagem será enviada por
                        e-mail para o dono da postagem.</p>
                    <div class="bts-popup">
                        <button class="cancelarReport" onclick="closeConfirmPopupItemPerdido()">Cancelar</button>
                        <button class="confirm-button" onclick="openFormPopupItemPerdido()">Confirmar</button>
                    </div>
                </div>
            </div>

            <div class="modal" id="formModalItemPerdido">
                <div class="modal-content">
                    <h3 class="formModalItemPerdidoTitulo">Devolver um item</h3>
                    <p class="formModalItemPerdidoSubtitulo">Envie uma mensagem ao proprietário da postagem com uma foto
                        do item para que ele possa identificá-lo. Escolha um horário e um local dentro Campus para a
                        devolução. Todas as informações fornecidas serão enviadas por e-mail ao proprietário, e seu
                        endereço de e-mail cadastrado será compartilhado para que ele possa confirmar a troca. Fique
                        atento à sua caixa de entrada para acompanhar a comunicação.</p>
                    <form id="contactFormItemPerdido">

                        <textarea id="contactReasonItemPerdido" name="contactReasonItemPerdido"
                            placeholder="como deseja devolver este item?" required></textarea><br>
                        <p>Você pode adicionar uma foto do item para mostrar ao proprietário que ele está com você. </p>
                        <div class="container-upload-foto">
                            <input type="file" id="input-upload-foto-item-perdido" accept="image/*"
                                onchange="exibirFotoItemPerdido(event)" />
                            <label for="input-upload-foto-item-perdido" class="botao-upload-foto-item-perdido">
                                enviar foto
                            </label>
                            <div class="container-preview-foto-item-perdido" id="container-preview-foto-item-perdido">
                                <img id="preview-foto-item-perdido" src="#" alt="Pré-visualização"
                                    style="display:none;" />
                                <button id="botao-remover-foto-item-perdido" class="botao-remover-foto-item-perdido"
                                    style="display:none;" onclick="excluirFotoItemPerdido()"><i
                                        class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>

                        <div class="bts-popup">
                            <button type="button" class="cancel-button"
                                onclick="closeFormPopupItemPerdido()">Cancelar</button>
                            <button type="submit" class="submit-button">Enviar</button>
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
                            value="<?php echo $_SESSION['usuario']; ?>">

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
                echo "<h2 class='username clickable-profile'><u>{$_SESSION['usuario']}</u></h2>";
                ?>
            </div>
        </div>


    </div>


    <script src="js/feed.js"></script>


</body>

</html>