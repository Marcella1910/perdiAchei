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
                                    <li><button class="dropdown-item" onclick="openConfirmPopup()">Entrar em contato com usuário</button></li>
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
                                    <li><button class="dropdown-item">Editar</button></li>
                                    <li><button class="dropdown-item">Excluir</button></li>
                                    <li><button class="dropdown-item">Marcar como 'encontrado'</button></li>
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
                                    <li><button class="dropdown-item">Editar</button></li>
                                    <li><button class="dropdown-item">Excluir</button></li>
                                    <li><button class="dropdown-item">Marcar como 'encontrado'</button></li>
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

            </div>
            <div id="roupas" class="section"><h3>Roupas e agasalhos</h3></div>
            <div id="eletronicos" class="section"><h3>Eletrônicos</h3></div>
            <div id="garrafas" class="section"><h3>Garrafas e Lancheiras</h3>
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
                                        <li><button class="dropdown-item" onclick="openConfirmPopup()">Entrar em contato com usuário</button></li>
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
            <div id="utensilioscozinha" class="section"><h3>Utensílios de cozinha</h3></div>
            <div id="materiaisescolares" class="section"><h3>Materiais Escolares</h3></div>
            <div id="documentos" class="section"><h3>Documentos</h3>

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
                                    <li><button class="dropdown-item">Editar</button></li>
                                    <li><button class="dropdown-item">Excluir</button></li>
                                    <li><button class="dropdown-item">Marcar como 'encontrado'</button></li>
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
                                    <li><button class="dropdown-item">Editar</button></li>
                                    <li><button class="dropdown-item">Excluir</button></li>
                                    <li><button class="dropdown-item">Marcar como 'encontrado'</button></li>
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
                                    <li><button class="dropdown-item">Editar</button></li>
                                    <li><button class="dropdown-item">Excluir</button></li>
                                    <li><button class="dropdown-item">Marcar como 'encontrado'</button></li>
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
                
            </div>
            <div id="produtoshigiene" class="section"><h3>Produtos higienicos</h3></div>
            <div id="outros" class="section"><h3>Outros</h3></div>
            
            
            <div class="modal" id="reportModal">
                <div class="modal-content">
                    <h3>Reportar @chuu</h3>
                    <form id="reportForm">
                        <label for="reportReason">Está vendo alguma coisa que não deveria?</label><br>
                        <textarea id="reportReason" name="reportReason" placeholder="descreva o motivo da denúncia..." maxlength="280" required></textarea><br>
                        <div class="bts-popup">
                            <button type="button" class="cancel-button" onclick="closeReportForm()">Cancelar</button>
                            <button type="submit" class="submit-button">Enviar Denúncia</button>
                        </div>
                        
                    </form>
                </div>
            </div>
           
            <div class="modal" id="confirmModal">
                <div class="modal-content">
                    <h3>Entrar em contato com @chuu</h3>
                    <p>Deseja reivindicar um item? Preencha as informações necessárias e sua mensagem será enviada por e-mail para o dono da postagem.</p>
                    <div class="bts-popup">
                        <button class="cancel-button" onclick="closeConfirmPopup()">Cancelar</button>
                        <button class="confirm-button" onclick="openFormPopup()">Confirmar</button>
                    </div>
                    
                </div>
            </div>

            <div class="modal" id="formModal">
                <div class="modal-content">
                    <h3>Reivindicar um item</h3>
                    <h4>Indique porque é que este item é seu</h4>
                    <p>Descreva o item o mais detalhadamente possível, especialmente o que não é visível ou que não foi descrito. Desta forma, o responsável pelo artigo encontrado pode ter a certeza de que se trata do próprio proprietário. E, se possível, forneça o máximo de informação possível sobre o local em que perdeu o artigo (p. ex. número da sala/data ou horário que perdeu). Tenha cuidado ao partilhar dados pessoais.</p>
                    <form id="contactForm">
                        
                        <textarea id="contactReason" name="contactReason" placeholder="descreva o motivo de reivindicar este item..." required></textarea><br>
                        <p>Você pode adicionar uma imagem que mostre ao dono. Por exemplo, uma foto do item ou um comprovante de compra.</p>
                        <div class="container-upload-foto">
                            <input type="file" id="input-upload-foto" accept="image/*" onchange="visualizarFoto(event)" />
                            <label for="input-upload-foto" class="botao-upload-foto">
                                enviar foto
                            </label>
                            <div class="container-preview-foto" id="container-preview-foto">
                                <img id="preview-foto" src="#" alt="Pré-visualização" style="display:none;" />
                                <button id="botao-remover-foto" class="botao-remover-foto" style="display:none;" onclick="removerFoto()"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>
                    
                        <div class="bts-popup">
                            <button type="button" class="cancel-button" onclick="closeFormPopup()">Cancelar</button>
                            <button type="submit" class="submit-button">Enviar</button>
                        </div>
                        
                    </form>
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
