<!-- Bem-vindo(a) ao perdiAchei! O achados e perdidos virtual do IFES Campus Serra. -->
<!-- Feito por Gabriele Maria Modesto Luciano, Marcella Gaurink Oliveira Dias e Verônica Gonçalves de Souza -->
<!-- INFO/5, 2024 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <!-- Importando o FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Publicação</title>
    <!-- Importando o CSS -->
    <link rel="stylesheet" href="css/feed.css">
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <!-- Inicio do conteudo principal da tela de postagem (expandida)  -->
        <div class = "publicacaoexpandida">

            <!-- Imagem do item  -->
            <figure>
                <!-- Botao para fechar a postagem expandida  -->
                <button class="cancelar" onclick="window.location.href='feed.php'">
                    <i class="fa-solid fa-xmark fa-2xl"></i>
                </button>
                <!--  -->

                <!-- Foto  -->
                <img src="img/postagens/estojo.jpg">
                <!--  -->

            </figure>
            <!--  -->

            <!-- Conteudo da postagem  -->
            <footer class="conteudo">

                <!-- Header: titulo, botao de reivindicar -->
                <div class="headerPublicacao">
                    <h1>Encontrei um estojo ontem</h1>

                    <!-- Leva para conversa com o criador do post  -->
                    <button class="reinvidicar" onclick="window.location.href='chats.php'">Reivindicar</button>   
                    <!--  -->

                    <!-- Menu  -->
                    <button class="menuPublicacao"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    <!--  -->
                </div>
                <!--  -->

                <!-- Categorias da postagem  -->
                <div class="catPostagem">
                    <h3 class="categoriaItem">Materiais Escolares</h3>
                    <h3 class="categoriaPublicacao">Item achado</h3>
                </div>
                <!--  -->
                

                <!-- Descrição do item  -->
                <p>Encontrei um estojo ontem dia 10 de junho no laboratório 206. Ele é azul da marca kipling e bem colorido, com um chaveiro de um macaquinho. Estive por lá por volta das 9:30 até as 11:10 da manhã.</p>
                <!--  -->
                
                <!-- Sobre o usuário  -->
                <div class="profile-post">
                    <!-- pfp  -->
                    <div class="pfp-post"  id="post-pfp">
                        <img src="img/userspfp/haseul.jpg">
                    </div>
                    <!-- user e data de postagem  -->
                    <h4 class="user-post">Haseul</h4>
                    <span>11 jun. 2024</span>
                </div>  
                <!--  -->

            </footer>
            <!--  -->

        </div>
        <!-- Fim do conteudo principal da tela de postagem  -->

        <!-- Mesmo da página de criarPostagem  -->
        <div class="main-container-criarPostagem">
            <div class="main-left">
                <div class="botoes">
                    <button class="menuExpandir" id="menuExpandir" onclick="abrirMenu()">
                        <i class="fa-solid fa-bars fa-lg"></i>
                    </button>
                    <button class="menuFechar" id="menuFechar" onclick="fecharMenu()">
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
                        <figure>
                            <img src="">
                        </figure>
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

            <div class="main-middle-criarPostagem">
                <div class="barPesquisa">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" placeholder="Pesquise um item....">
                </div>

                <div class="tags-pesquisa">
                    <div class="tag">
                        <div class="icon"><i class="fa-solid fa-shirt"></i></i></div><h3>Roupas e agasalhos</h3>
                    </div>
                    <div class="tag">
                        <span><i class="fa-regular fa-id-card"></i></i></span><h3>Documentos</h3>
                    </div>
                    <div class="tag">
                        <span><i class="fa-solid fa-mobile-screen-button"></i></i></span><h3>Eletrônicos</h3>
                    </div>
                    <div class="tag">
                        <span><i class="fa-solid fa-pen-ruler"></i></i></span><h3>Materiais escolares</h3>
                    </div>
                    <div class="tag">
                        <span><i class="fa-solid fa-key"></i></span><h3>Chaves</h3>
                    </div>
                    <div class="tag">
                        <span><i class="fa-solid fa-pump-soap"></i></span><h3>Produtos</h3>
                    </div>
                    <button class="vertodos">Ver todos</button>
                    
                </div>
                
                <!--posts recem visitados-->
                <div class="titulo">
                    <ul class="posts-visitados">
                        <h2 class="titulo-posts-visitados">Visitados recentemente</h2>
                        <li><button onclick="funciona()">Ver todos</button></li>
                    </ul>
                </div>
                


                <div class="recentes">


                    <div class="publicacao">
                        
                        <figure>
                            
                            <img src="img/postagens/fone.jpg">
                            
                        </figure>
                        <footer class="conteudo">
                            
                            <h4>Perdi meu fone me ajudem!!</h4>
                            <div class="profile-post">
                                <div class="pfp-post"  id="post-pfp">
                                    <img src="img/userspfp/chuu.jpg">
                                </div>
                                <p class="user-post">Chuu</p>
                                <span>11 jun. 2024</span>
                            </div>
                            
                            
                        </footer>
                    </div>

                    <div class="publicacao">
                        <figure>
                            <img src="img/postagens/estojo.jpg">
                        </figure>
                        <footer class="conteudo">
                            <h4>Encontrei um estojo ontem</h4>
                            <div class="profile-post">
                                <div class="pfp-post"  id="post-pfp">
                                    <img src="img/userspfp/haseul.jpg">
                                </div>
                                <p class="user-post">Haseul</p>
                                <span>11 jun. 2024</span>
                            </div>
                        </footer>
                    </div>

                    <div class="publicacao">
                        <figure>
                            
                            <img src="img/postagens/garrafinha.jpg">
                            
                        </figure>
                        <footer class="conteudo">
                            <h4>Alguém viu uma garrafinha mais ou menos assim</h4>
                            <div class="profile-post">
                                <div class="pfp-post"  id="post-pfp">
                                    <img src="img/userspfp/vivi.jpg">
                                </div>
                                <p class="user-post">Vivi</p>
                                <span>10 jun. 2024</span>
                            </div>
                        </footer>
                    </div>
                </div>
                <!--fim dos posts recem visitados-->

                <!--inicio dos posts publicados recentemente-->
                <div class="titulo">
                    <ul class="posts-recentes">
                        <h2 class="titulo-posts-recentes">Publicados recentemente</h2>
                        <li><button href="">Ver todos</button></li>
                    </ul>
                </div>


                <div class="novos">
                    <div class="post-novos">
                        <div class="publicacao">
                            <figure>
                                
                                <img src="img/postagens/caderno.jpg">
                                
                            </figure>
                            <footer class="conteudo">
                                
                                <h4>TAchei esse caderno hj debaixo da mesa</h4>
                                <div class="profile-post">
                                    <div class="pfp-post"  id="post-pfp">
                                        <img src="img/userspfp/yves.jpg">
                                    </div>
                                    <p class="user-post">Yves</p>
                                    <span>11 jun. 2024</span>
                                </div>
                                
                                
                            </footer>
                        </div>
    
                        <div class="publicacao">
                            <figure>
                                
                                <img src="img/postagens/fone.jpg">
                            </figure>
                            <footer class="conteudo">
                                <h4>Perdi meu fone me ajudem!!</h4>
                                <div class="profile-post">
                                    <div class="pfp-post"  id="post-pfp">
                                        <img src="img/userspfp/chuu.jpg">
                                    </div>
                                    <p class="user-post">Chuu</p>
                                    <span>11 jun. 2024</span>
                                </div>
                            </footer>
                        </div>
    
                        <div class="publicacao">
                            <figure>
                                
                                <img src="img/postagens/estojo.jpg">
                                
                            </figure>
                            <footer class="conteudo">
                                <h4>Encontrei um estojo ontem</h4>
                                <div class="profile-post">
                                    <div class="pfp-post"  id="post-pfp">
                                        <img src="img/userspfp/haseul.jpg">
                                    </div>
                                    <p class="user-post">Haseul</p>
                                    
                                    <span>11 jun. 2024</span>
                                </div>
                            </footer>
                        </div>
                        
                    </div>
                </div>
                
                
                


            </div>

            <div class="main-right">
                <!--inicio da area do perfil-->
                <a href="perfil.php" class="profile">
                    <div class="pfp"  id="my-pfp">
                        <img src="img/userspfp/chuu.jpg">
                    </div>
                    <div class="profile-handle">
                        <h4>Chuu</h4>
                        <p class="username">
                            @chuudoloona
                        </p>
                    </div>
                </a>
        
                <h2 class="h2-3">Minhas publicações</h2>
                <h3 class="h3-1">Mais recentes</h3>
                <div class="main-right-meusposts">
                    <div class="minha-publicacao">
                        <figure>
                            
                            <img src="img/postagens/fone.jpg">
                            
                        </figure>
                        <footer class="conteudo">
                            <h4>Perdi meu fone me ajudem!!</h4>
                            <div class="profile-post">
                                <span>11 jun. 2024</span>
                                <i class="fa-solid fa-trash"></i>
                            </div>
                        </footer>
                    </div>
                </div>
        
                <h2 class="h2-4">Todas</h2>
                <div class="main-right-meusposts">
                    <div class="minha-publicacao">
                        <figure>
                            
                            <img src="img/postagens/fone.jpg">
                            
                        </figure>
                        <footer class="conteudo">
                            <h4>Perdi meu fone me ajudem!!</h4>
                            <div class="profile-post">
                                <span>11 jun. 2024</span>
                                <i class="fa-solid fa-trash"></i>
                            </div>
                            
                        </footer>
                    </div>
                </div>
            </div>
        </div>

        <script src = "js/postagemAlerta.js"></script>
    </body>
</html>
