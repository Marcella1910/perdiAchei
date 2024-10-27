<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perdiAchei</title>
    
    <link rel="stylesheet" href="css/feed.css">
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo"><p>perdeu algo? ache aqui!</p></div>
        <img src="img/logos/caixinha.png"></img>
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="pesquisar um item...">
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">

        <!-- Left Menu -->
        <div class="left-menu">
            <aside>

                <!-- Link para a página de feed(Home) -->
                <a href="feed.php" class="menu-item">
                    <span><i class="fa fa-solid fa-house fa-lg"></i></span><h3 class="nome-menu-item">Home</h3>
                </a>

                <!-- Link para a página de Notificações -->
                <button class="menu-item-notifications">
                    <span><i class="fa-solid fa-bell fa-lg"></i></span><h3 class="nome-menu-item">Notificações</h3>
                </button>

                
                

                

                <!-- Link para a página de Configurações -->
                <a href="configuracoes.php" class="menu-item">
                    <span><i class="fa-solid fa-gear fa-lg"></i></span><h3 class="nome-menu-item">Configurações</h3>
                </a>

                <!-- Botão de criar postagem -->
                
                
                <!-- Link para fazer logout; -->
                <a href="index.php" class="menu-item" id="log-out">
                    <span><i class="fa-solid fa-right-from-bracket fa-lg"></i></span> <h3>Sair</h3>
                </a>

                <!-- Essa div leva para a página de avaliação -->
                
                <!-- Fim da div de avaliação -->

            </aside>
        </div>

        <!-- Middle Content -->
        <div class="main-content">
            <div class="notification-panel">
                <div class="notification-header">
                    <h2 class="username">@kdb</h2>
                </div>
                <ul class="notification-list">
                    <li><div class="notif">
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
                    <li><div class="notif">
                        <img src="img/userspfp/jinsoul.jpg" alt="Usuário 1">
                        <div class="dados-notif">
                            <p>@jinsoul</p>
                            <p>quer reivindicar um item postado!</p>
                        </div></li>
                    <li><div class="notif">
                        <img src="img/userspfp/jinsoul.jpg" alt="Usuário 1">
                        <div class="dados-notif">
                            <p>@jinsoul</p>
                            <p>quer reivindicar um item postado!</p>
                        </div></li>
                    <!-- Adicione mais notificações aqui -->
                </ul>
            </div>

            <div class="create-post">
                <textarea maxlength="80" rows="1" cols="30" class="titulopost" placeholder="dê um título a postagem..."></textarea>
                <textarea class="descricaopost" maxlength="280" rows="5" cols="30" placeholder="perdeu ou achou algo?"></textarea>
                <div id="preview-container" class="preview-container" style="display: none;">
                    <button id="cancel-button" style="margin-top: 10px;"><i class="fa-solid fa-xmark"></i></button>
                    <img id="preview-image" class="preview-image" alt="Pré-visualização da Imagem" style="display: none;">
                    <video id="preview-video" class="preview-video" controls style="display: none;"></video>
                </div>
                <div class="botoes">
                    <button class="createPostBtn" id="createPostBtn">criar publicação</button>
                    <div class="botoes-ladodir">

                        <div class="dropdown-tags">
                            <button class="dropdown-btn-tags">
                                Roupas e agasalhos
                                <i class="fa-solid fa-caret-down"></i> <!-- Ícone da seta -->
                            </button>
                            <div class="dropdown-content-tags">
                                <a href="#">Roupas e agasalhos</a>
                                <a href="#">Eletrônicos</a>
                                <a href="#">Garrafas e Lancheiras</a>
                                <a href="#">Utensílios de cozinha</a>
                                <a href="#">Materiais escolares</a>
                                <a href="#">Documentos</a>
                                <a href="#">Produtos de higiene/Cosmético</a>
                                <a href="#">Outros</a>
                            </div>
                        </div>

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
                        <img src="img/userspfp/kdbicon.jpg"></img>
                        
                    </div>
                </div>
                
                <div class="middle-perfil">
                    <h2 class="nome">kevin de bruyne</h2>
                    <h3 class="username">@kdb</h3>
                    <div class="descricaoperfil">
                        <p>Lorem ipsum dolor sit amet. Ut reprehenderit dolores sed aliquid reprehenderit cum facere molestias et amet molestiae ut enim saepe ut odit nostrum. Ea minima debitis in omnis voluptatem eum odio ipsum ut quia blanditiis eos cumque delectus et neque repellendus. Qui facere voluptatum et praesentium unde At nulla amet. . </p>
                    </div>
                </div>

                <div class="menu-publicacoes">
                    <button class="menu-btn active" onclick="showSectionPerfil('objetos-perdidos')">objetos perdidos</button>
                    <button class="menu-btn" onclick="showSectionPerfil('objetos-achados')">objetos achados</button>
                    
                </div>
            </div>

            <!-- Create Post Section -->
           

            <div id="objetos-perdidos" class="section-tipo active">
                <h3>Objetos Perdidos</h3>
                
                <div class="post">

                    <div class="post-header">
                        <div class="pfp-post">
                            <img class="pfp" src="img/userspfp/kdbicon.jpg">
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
                                    <li><button class="dropdown-item" onclick="openDeletePostModal()">Excluir</button></li>
                                    <li><button class="dropdown-item" onclick="openConfirmModalMarcarComoEncontrado()">Marcar como 'encontrado'</button></li>
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
                            <img class="pfp" src="img/userspfp/kdbicon.jpg">
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
                                    <li><button class="dropdown-item" onclick="openDeletePostModal()">Excluir</button></li>
                                    <li><button class="dropdown-item" onclick="openConfirmModalMarcarComoReivindicado()">Marcar como 'reivindicado'</button></li>
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
                <div class="modal-content">
                    <div class="profile-picture-container">
                        <div class="upload-pfp">
                            <label for="profile-upload" class="upload-button">
                                <i class="fa-solid fa-camera"></i>
                            </label>
                            <input id="profile-upload" type="file" accept="image/*">
                        </div>
                        <img id="profile-image" src="img/userspfp/kdbicon.jpg" alt="Profile Picture">
                    </div>

                    <input type="text" id="editName" name="editName" placeholder="Nome" value="">

                    <input type="text" id="editUserName" name="editUserName" placeholder="Username" value="">

                    <textarea placeholder="Adicione uma breve descrição sobre você" id="editUserDesc"></textarea>

                    <div class="footerEditPerfilModal">
                        <div class="bts-popup">
                            <button class="cancelarReport" onclick="closeEditProfile()">Cancelar</button>
                            <button type="submit" class="submit-button" onclick="closeEditProfile()">Salvar Alterações</button>
                        </div>
                    </div>
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

                                <div class="dropdown-tags">
                                    <button class="dropdown-btn-tags">
                                        Roupas e agasalhos
                                    <i class="fa-solid fa-caret-down"></i> <!-- Ícone da seta -->
                                    </button>
                                    <div class="dropdown-content-tags">
                                        <a href="#">Roupas e agasalhos</a>
                                        <a href="#">Eletrônicos</a>
                                        <a href="#">Garrafas e Lancheiras</a>
                                        <a href="#">Utensílios de cozinha</a>
                                        <a href="#">Materiais escolares</a>
                                        <a href="#">Documentos</a>
                                        <a href="#">Produtos de higiene/Cosmético</a>
                                        <a href="#">Outros</a>
                                    </div>
                                </div>
                            

                            </div>
                            
                        <input type="text" id="postTitle" name="title" placeholder="dê um título a postagem..." value="">
                        
                        
                        <textarea placeholder="descreva o item..." id="postContent"></textarea>

                        <!-- Área de upload -->
                        

                        <!-- Pré-visualização -->
                        <div id="editPreviewContainer" class="preview-container" style="display: none;">
                            <button id="editCancelPreview" class="cancel-preview" style="margin-top: 10px;"><i class="fa-solid fa-xmark"></i></button>
                            <img id="editPreviewImage" class="preview-image-editpost" alt="Pré-visualização da Imagem" style="display: none;">
                            <video id="editPreviewVideo" class="preview-video-editpost" controls style="display: none;"></video>
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
                                <button type="submit" class="submit-button" onclick="closeEditPost()">Salvar Alterações</button>
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
                    <p class="confirmModalMarcarComoEncontradoSubtitulo">Encontrou este objeto? Marcar como "encontrado" desativará a publicação, tornando-a invisível para outros usuários.</p>
                    <form id="formMarcarComoEncontrado">
                        <div class="bts-popup">
                            <button type="button" class="cancel-button" onclick="closeConfirmModalMarcarComoEncontrado()">Cancelar</button>
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
                            <label for="textarea" rows="1" cols="30">Marque o nome de usuário da pessoa para quem você entregou o item. Esta informação será registrada para garantir a segurança do site.</label>
                            <textarea id="textarea" placeholder="Digite @ para marcar alguém..." spellcheck="false" required></textarea>
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
