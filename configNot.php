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
    <!-- Importando o JS -->
    <script src="js/feed.js"></script>
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <title>Configurar notificações</title>
</head>
<body>
    <main>
        <!-- Conteúdo principal da página de Configurações da Conta-->
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

            <!-- Inicio do meio da página de configurações das notificações -->
            <div class="main-middle-config">

                <!-- Guarda o título e subtítulo da página  -->
                <div class="headerPagConfig">
                    <div class="tituloPagina">

                        <!-- Título  -->
                        <h1 class="titulopagina-config">Configurações</h1>

                        <!-- Subtítulo  -->
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
                    <button class="tag-configuracao-selected" onclick="window.location.href='configNot.php'">
                        <i class="fa-solid fa-bell"></i>
                        Configurar notificações
                    </button>

                    <!-- Botão que leva para a página de Ajuda -->
                    <button class="tag-configuracao" onclick="window.location.href='ajuda.php'">
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

                <!-- Formulário da configuração selectionada  -->
                <form class="config-selected">

                    <!-- Título  -->
                    <h1 class="titulo-config">Configurar notificações</h1>

                    <!-- Sobre a configuração  -->
                    <h4>Customizar notificações e emails que você recebe</h4>
                    
                    <!-- Subtítulo  -->
                    <h1 class="subtitulo">Notificações pré-definidas</h1>

                    <!-- Configuraçoes das notificacoes   -->
                    <div class="configs">

                        <!-- Configuração 1 -->
                        <div class="config-notif">
                            <!-- Marca e desmarca  -->
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <!-- Descrição da configuração  -->
                            <div class="descConfig">
                                <h3>Receber notificações de pedidos de reinvidicação</h3>
                                <p>Quando um outro usuário querer reinvidicar um item perdido que você postou, você será notificado.</p>
                            </div>
                        </div>
                        <!--  -->

                        <!-- Configuração 2  -->
                        <div class="config-notif">
                            <!-- Marca e desmarca  -->
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <!-- Descrição da configuração  -->
                            <div class="descConfig">
                                <h3>Receber notificações de mensagens</h3>
                                <p>Você será notificado quando receber uma nova mensagem de um dos seus contatos.</p>
                            </div>
                        </div>
                        <!--  -->

                        <!-- Configuração 3  -->
                        <div class="config-notif">
                            <!-- Marca e desmarca  -->
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <!-- Descrição da configuração  -->
                            <div class="descConfig">
                                <h3>Receber notificações de quando um item achado similar a um item perdido seu for achado</h3>
                                <p>Quando um outro usuário publicar um item achado por ele com características similares a um item perdido seu, você será notificado.</p>
                            </div>
                        </div>
                        <!--  -->
                  
                    </div>
                    <!-- Fim das configuracoes das notificacoes  -->

                    <!-- Input que salva as alterações  -->
                    <input type="submit" class="salvarAlter" value="Salvar">
                    
                    <!-- Botão que reseta e cancela as alterações -->
                    <button type="reset" class="cancelAlter">Cancelar</button>
                    
                </form>
                <!-- Fim do formulário  -->
                         
            </div>
            <!-- Fim do meio da página de configurações das notificações -->

        </div>
        <!-- Fim do conteúdo principal da página de Configurações das Notificações -->
    </main>

</body>
</html>
