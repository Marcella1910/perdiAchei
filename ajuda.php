<!-- Bem-vindo(a) ao perdiAchei! O achados e perdidos virtual do IFES Campus Serra. -->
<!-- Feito por Gabriele Maria Modesto Luciano, Marcella Gaurink Oliveira Dias e Verônica Gonçalves de Souza -->
<!-- INFO/5, 2024 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importando o CSS -->
    <link rel="stylesheet" href="css/feed.css">
    <script src="js/feed.js"></script>
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <title>Ajuda</title>
</head>
<body>
    <main>
        <!-- Conteúdo principal da página -->
        <div class="main-container-config">

            <!-- Início do menu lateral esquerdo da página -->
            <div class="main-left">
                
                <!-- Div botoes é a que guarda os botoes para abrir e fechar o menu -->
                <div class="botoes">

                    <!-- Esse botao abre o menu -->
                    <button class="menuExpandir" id="menuExpandir" onclick="abrirMenuConfigs()">
                        <i class="fa-solid fa-bars fa-lg"></i>
                    </button>

                    <!-- Esse botao fecha o menu -->
                    <button class="menuFechar" id="menuFechar" onclick="fecharMenuConfigs()">
                        <i class="fa-regular fa-circle-xmark fa-xl"></i>
                    </button>

                </div>
                
                
                <!-- O aside irá guardar os links para as principais páginas do site -->
                <aside>

                    <!-- Link para a página de feed(Home) -->
                    <a href="feed.php" class="menu-item">
                        <span><i class="fa fa-solid fa-house fa-lg"></i></span><h3 class="nome-menu-item">Home</h3>
                    </a>

                    <!-- Link para a página de Notificações -->
                    <a href="notificacoes.php" class="menu-item">
                        <span><i class="fa-solid fa-bell fa-lg"></i></span><h3 class="nome-menu-item">Notificações</h3>
                    </a>

                    <!-- Link para a página de Minhas publicações -->
                    <a href="my-posts.php" class="menu-item">
                        <span><i class="fa-solid fa-list fa-lg"></i></span><h3 class="nome-menu-item">Minhas publicações</h3>
                    </a>

                    <!-- Link para a página de Chats(conversas) -->
                    <a href="chats.php" class="menu-item">
                        <span><i class="fa-solid fa-comments fa-lg"></i></span><h3 class="nome-menu-item">Mensagens</h3>
                    </a>

                    <!-- Link para a página de Configurações -->
                    <a href="configuracoes.php" class="menu-item">
                        <span><i class="fa-solid fa-gear fa-lg"></i></span><h3 class="nome-menu-item">Configurações</h3>
                    </a>

                    <!-- Botão de criar postagem -->
                    <div class="menu-item">
                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                        <button class="btnPostar" id="btnPostar" onclick="criarPost()">Criar post</button>
                    </div>
                    
                    <!-- Link para fazer logout; -->
                    <a href="index.php" class="menu-item" id="log-out">
                        <span><i class="fa-solid fa-right-from-bracket fa-lg"></i></span> <h3>Sair</h3>
                    </a>

                    <!-- Essa div leva para a página de avaliação -->
                    <div class="avalie-nos">

                        <div class="conteudo-avalie-nos">
                            <h2>Ajude nos a melhorar nosso trabalho!</h2>
                            <h1>Avalie-nos</h1>
                            <!-- Este botão leva para a página de avaliação -->
                            <button class="botao-avalie-nos" onclick="irAvaliar()">
                                Avalie-nos
                            </button>
                        </div>

                    </div>
                    <!-- Fim da div de avaliação -->

                </aside>
                <!-- Fim do aside -->

            </div>
            <!-- Fim do menu lateral esquerdo da página -->

            <!-- Início do meio da página -->
            <div class="main-middle-config">

                <!-- Guarda o título e subtítulo da página de ajuda -->
                <div class="headerPagConfig">

                    <div class="tituloPagina">
                        <h1 class="titulopagina-config">Configurações</h1>
                        <p>Modifique seus dados e as configurações gerais do site</p>
                    </div>
             
                </div>

                <!-- Guarda os botões links para as páginas de configurações -->
                <div class="conteudo-config">

                    <!-- Botão que leva para a página de Temas e acessibilidade(Configurações principais) -->
                    <button class="tag-configuracao" onclick="window.location.href='configuracoes.php'">
                        <i class="fa-solid fa-palette"></i>
                        Temas e acessibilidade
                    </button>

                    <!-- Botão que leva para a página de Configurações da Conta -->
                    <button class="tag-configuracao" onclick="window.location.href='configConta.php'">
                        <i class="fa-solid fa-user"></i>
                        Configurações da conta
                    </button>

                    <!-- Botão que leva para a página de Configurar Notificações -->
                    <button class="tag-configuracao" onclick="window.location.href='configNot.php'">
                        <i class="fa-solid fa-bell"></i>
                        Configurar notificações
                    </button>

                    <!-- Botão que leva para a página de Ajuda -->
                    <button class="tag-configuracao-selected">
                        <i class="fa-solid fa-circle-info"></i>
                        Ajuda
                    </button>

                    <!-- Botão que leva para a página de Avaliação -->
                    <button class="tag-configuracao" onclick="window.location.href='avaliar.php'">
                        <i class="fa-solid fa-star"></i>
                        Avalie-nos
                    </button>
                </div>
                <!-- Fim da div de botões -->

                <!-- Formulário da configuração selecionada  -->
                <form class="config-selected">

                    <!-- Título da página; -->
                    <h1 class="titulo-config">Ajuda</h1>

                    <!-- Subtítulo da página; -->
                    <h1 class="subtitulo">Precisa de ajuda com o site?</h1>
                    
                    <!-- Sobre o email do projeto -->
                    <h4>Envie um email para o suporte <span>projetoperdiachei@gmail.com</span>. Iremos tirar todas as suas dúvidas!</h4>
                    
                </form>
                <!-- Fim do formulário de configuração -->
               

            </div>
            <!-- Fim do meio da página -->
 
        </div>
        <!-- Fim do conteúdo principal da página -->
    </main>

</body>
</html>
