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

            <div class="config-conta">
                <h3>Conta</h3>
                <div class="email-conta">
                    <h4>Email</h4>
                    <h4 class="user-email" id="user-email">kdb@gmail.com</h4>
                    <button onclick="openModal()" class="mudarEmailBtn"><i class="fa-solid fa-pen-to-square"></i></button>
                </div>
                <div class="senha-conta">
                    <h4>Senha</h4>
                    <h4 class="user-senha" id="user-senha">••••••••••</h4>
                    <button onclick="openModal()" ><i class="fa-solid fa-pen-to-square"></i></button>
                </div>
                <div class="excluir-conta">
                    <h4>Excluir conta</h4>
                    <button onclick="openModal()" class="excluir-conta-btn">excluir conta</button>
                </div>

            </div>

            <div class="modal" id="deleteModal">
                <div class="modal-content">
                    <h3>Defina sua senha</h3>
                    <p>Para fazer essas alterações, primeiro você precisa definir uma senha utilizando o link de redefinição de senha enviado ao seu e-mail.</p>
                    <div class="bts-popup">
                        <button onclick="closeModal()" class="fecharAba">Cancelar</button>
                        <button onclick="confirmSenha()" class="confirmaSenha">Enviar e-mail de redefinição de senha</button>
                    </div>
                </div>
            </div>

            <!-- Create Post Section -->
        
        </div>     

        <!-- Right Menu -->
        <div class="right-menu-configuracoes">
            <aside>

                <h3 class="tituloconfiguracoes">Configurações</h3>
                <!-- Link para a página de feed(Home) -->
                <a href="configuracoes.php" class="menu-item active">
                    <h3 class="nome-menu-item">Conta</h3>
                    <h4>O principal</h4>
                </a>

                <!-- Link para a página de Configurações -->
                <a href="tela-e-painel.php" class="menu-item">
                    <h3 class="nome-menu-item">Painel</h3>
                    <h4>Tela e acessibilidade</h4>
                </a>

                <!-- Botão de criar postagem -->


                <!-- Link para fazer logout; -->
                <a href="notificacoes.php" class="menu-item">
                    <h3>Notificações</h3>
                    <h4>Receba atualizações por e-mail</h4>
                </a>

                <!-- Essa div leva para a página de avaliação -->

                <!-- Fim da div de avaliação -->

            </aside>

        </div>

    </div>

    <script src="js/configuracoes.js"></script>
</body>
</html>
