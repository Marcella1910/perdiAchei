<!-- Bem-vindo(a) ao perdiAchei! O achados e perdidos virtual do IFES Campus Serra. -->
<!-- Feito por Gabriele Maria Modesto Luciano, Marcella Gaurink Oliveira Dias e Verônica Gonçalves de Souza -->
<!-- INFO/5, 2024 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importando o FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Minha publicação</title>
    <!-- Importando o CSS -->
    <link rel="stylesheet" href="css/feed.css">
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <!-- Importando o JS -->
    <script src="js/feed.js"></script>
</head>
<body>
    <main>
        <!-- Div que guarda a principal parte da página (A postagem expandida) -->
        <div class = "publicacaoexpandida">
            <!-- Foto do item  -->
            <figure>

                <!-- Botão de fechar a tela  -->
                <button class="cancelar" onclick="history.back()">
                    <i class="fa-solid fa-xmark fa-2xl"></i>
                </button>
                <!--  -->

                <!-- Foto  -->
                <img src="img/postagens/fone.jpg">
                <!--  -->

            </figure>

            <!-- Conteudo da publicação  -->
            <footer class="conteudo">

                <!-- Header: título, botão de editar e menu  -->
                <div class="headerPublicacao">
                    <h1>Perdi meu fone me ajudem!!</h1>
                    <button class="editarPublicacao">Editar publicação</button>   
                    <button class="menuPublicacao"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                </div>
                <!--  -->

                <!-- Categorias da postagem  -->
                <div class="catPostagem">
                    <h3 class="categoriaItem">Eletrônicos</h3>
                <h3 class="categoriaPublicacao">Item perdido</h3>
                </div>
                <!--  -->

                <!-- Descrição do item  -->
                <p>Perdi meu fone ontem dia 10 de junho. Ele é um fone bluetooth branco da JBL e me lembro de estar com ele pela última vez na sala 105, mais ou menos até as 13:00. </p>
                <!--  -->
                
                <!-- Sobre o usuário  -->
                <div class="profile-post">
                    <div class="pfp-post"  id="post-pfp">
                        <img src="img/userspfp/chuu.jpg">
                    </div>
                    <h4 class="user-post">Chuu</h4>
                    <span>11 jun. 2024</span>
                </div>   
                <!--  -->

            </footer>
            <!-- Fim do conteudo  -->

        </div>
        <!-- Fim da parte principal da página  -->

        <!-- Mesma coisa da tela de my-posts  -->
        <div class="main-container-minhaPublicacao">
            <div class="main-left">
                <div class="botoes">
                    <button class="menuExpandir" id="menuExpandir" onclick="abrirMenuMeusPosts()">
                        <i class="fa-solid fa-bars fa-lg"></i>
                    </button>
                    <button class="menuFechar" id="menuFechar" onclick="fecharMenuMeusPosts()">
                        <i class="fa-regular fa-circle-xmark fa-xl"></i>
                    </button>
                </div>
                
                

                <aside>
                    <a href="feed.php" class="menu-item">
                        <span><i class="fa fa-solid fa-house fa-lg"></i></span><h3 class="nome-menu-item">Home</h3>
                    </a>
                    <a href="notificacoes.php" class="menu-item">
                        <span><i class="fa-solid fa-bell fa-lg"></i></span><h3 class="nome-menu-item">Notificações</h3>
                    </a>
                    <a href="my-posts.php" class="menu-item">
                        <span><i class="fa-solid fa-list fa-lg"></i></span><h3 class="nome-menu-item">Minhas publicações</h3>
                    </a>
                    <a href="chats.php" class="menu-item">
                        <span><i class="fa-solid fa-comments fa-lg"></i></span><h3 class="nome-menu-item">Mensagens</h3>
                    </a>
                    <a href="configuracoes.php" class="menu-item">
                        <span><i class="fa-solid fa-gear fa-lg"></i></span><h3 class="nome-menu-item">Configurações</h3>
                    </a>
                    <div class="menu-item">
                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                        <button class="btnPostar" id="btnPostar" onclick="criarPost()">Criar post</button>
                    </div>
                    
                    <a href="index.php" class="menu-item" id="log-out">
                        <span><i class="fa-solid fa-right-from-bracket fa-lg"></i></span> <h3>Sair</h3>
                    </a>
                    <div class="avalie-nos">
                        <div class="conteudo-avalie-nos">
                            <h2>Ajude nos a melhorar nosso trabalho!</h2>
                            <h1>Avalie-nos</h1>
                            <button class="botao-avalie-nos" onclick="irAvaliar()">
                                Avalie-nos
                            </button>
                        </div>
                    </div>
                    
                </aside>
            </div>

            <div class="main-middle-my-posts">

                <div class="titulopagina-myposts">
                    <h1>Minhas publicações</h1>
                </div>

                <div class="subtitulopagina-myposts">
                    <h1>Recentes</h1>
                </div>

                <div class="listPostsRecentes">

                    <a href="minhapublicacao.php" class="publicacao-myposts">
                        <figure>
                            <img src="img/postagens/fone.jpg">
                        </figure>

                        <footer class="conteudo">
                            <div class="headerpub">
                                <h4>Perdi meu fone me ajudem!!</h4>
                                <button class="editarpub">Editar</button>
                            </div>
                            <div class="profile-post">
                                <div class="pfp-post"  id="post-pfp">
                                   <img src="img/userspfp/chuu.jpg">
                                </div>
                                <p class="user-post">Chuu</p>
                                <span>11 jun. 2024</span>
                            </div>
                        </footer>
                    </a>

                <div class="subtitulopagina-myposts">
                    <h1>Todos</h1>
                </div>

                <div class="listPostsTodos">

                    <a href="minhapublicacao.php" class="publicacao-myposts">
                        <figure>
                            <img src="img/postagens/fone.jpg">
                        </figure>

                        <footer class="conteudo">
                            <div class="headerpub">
                                <h4>Perdi meu fone me ajudem!!</h4>
                                <button class="editarpub">Editar</button>
                            </div>
                            <div class="profile-post">
                                <div class="pfp-post"  id="post-pfp">
                                   <img src="img/userspfp/chuu.jpg">
                                </div>
                                <p class="user-post">Chuu</p>
                                <span>11 jun. 2024</span>
                            </div>
                        </footer>
                    </a>

                </div>              
            
            </div>

        </div>

    </body>
</html>
