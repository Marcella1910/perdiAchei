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

                
                <!-- Link para a página de Chats(conversas) -->
                <a href="chats.php" class="menu-item">
                    <span><i class="fa-solid fa-comments fa-lg"></i></span><h3 class="nome-menu-item">Mensagens</h3>
                </a>

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

            <!-- Create Post Section -->
            <div class="create-post">
                <textarea maxlength="80" rows="1" cols="30" class="titulopost" placeholder="dê um título a postagem..."></textarea>
                <textarea class="descricaopost" maxlength="280" rows="5" cols="30" placeholder="perdeu ou achou algo?"></textarea>
                <div id="preview-container" class="preview-container" style="display: none;">
                    <button id="cancel-button" style="margin-top: 10px;"><i class="fa-solid fa-xmark"></i></button>
                    <img id="preview-image" class="preview-image" alt="Pré-visualização da Imagem" style="display: none;">
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

            <!-- Posts -->
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
                                <li><a href="#">Editar</a></li>
                                <li><a href="#">Excluir</a></li>
                                <li><a href="#">Denunciar</a></li>
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

                    <div class="acoes">
                        <button class="encontrei">encontrei !</button>
                    </div>

                </div>
            </div>

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
                                <li><a href="#">Editar</a></li>
                                <li><a href="#">Excluir</a></li>
                                <li><a href="#">Denunciar</a></li>
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

                    <div class="acoes">
                        <button class="encontrei">encontrei !</button>
                    </div>

                </div>
            </div>

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
                                <li><a href="#">Editar</a></li>
                                <li><a href="#">Excluir</a></li>
                                <li><a href="#">Denunciar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="conteudo-principal">
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

                    <div class="acoes">
                        <button class="encontrei">encontrei !</button>
                    </div>

                </div>
            </div>

            

        </div>

        <!-- Right Menu -->
        <div class="right-menu">
            <div class="header-right-menu">
                <p>Perfil</p>
                <button class="editperfil">
                    <i class="fa-solid fa-pen-to-square"></i>  
                </button>
            </div>
            <div class="centro-menu-right">
                <div class="ftperfil clickable-profile">
                    <img src="img/userspfp/kdbicon.jpg"></img>
                </div>
                
                <h2 class="nome clickable-profile">kevin de bruyne</h2>
                <h3 class="username clickable-profile">@kdb</h3>
            </div>
        </div>

    </div>
    

    <script src="js/feed.js"></script>
</body>
</html>
