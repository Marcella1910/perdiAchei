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
    <title>Criar postagem</title>
    <!-- Importando o CSS -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/feed.css">
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>

        <!-- Inicio da parte principal da página (A criação da postagem) -->
        <div class = "criarPostagem">

            <!-- Header: titulo, botao que leva de volta a pagina de feed  -->
            <div class="headerPost">

                <!-- Título  -->
                <h1 class="titulo">Criar postagem</h1>
                <!--  -->

                <!-- Botão que leva ao feed  -->
                <button class="cancelar" onclick="window.location.href='feed.php'">
                    <i class="fa-solid fa-xmark fa-2xl"></i>
                </button>
                <!--  -->

            </div>
            <!--  -->
            

            <!-- Formulário de criar postagem  -->
            <form class="formCriarPost">
                <!-- O lado esquerdo possui os dados que serão preenchidos  -->
                <div class="ladoEsq">

                    <!-- Subtitulo -->
                    <h2>Primeiramente, você perdeu ou achou um objeto? Escolha o status do objeto:</h2>
                    <!--  -->

                    <!-- Tipo de postagem  -->
                    <div class="tipo-postagem">

                        <!-- Item perdido  -->
                        <label class="tipopost">
                            <input type="radio" name="tipopost">
                            <span>Objeto Perdido</span>
                        </label>
                        <!--  -->

                        <!-- Item achado  -->
                        <label class="tipopost">
                            <input type="radio" name="tipopost">
                            <span>Objeto Encontrado</span>
                        </label>
                        <!--  -->

                    </div>
                    <!--  -->

                    <!-- Título da postagem  -->
                    <h4>Título:</h4>
                    <input type="text" id="tituloPost" class="tituloPost" required spellcheck="false" placeholder="Dê um título a postagem...">
                    <!--  -->

                    <!-- Categoria do item  -->
                    <h4>Categoria:</h4>
                    <select class="categorias" name = "categorias" id = "categorias" required>
                        <option value = "roAg">Roupas e Agasalhos</option>
                        <option value = "itEl">Itens Eletrônicos</option>
                        <option value = "gaLa">Garrafas e Lancheiras</option>
                        <option value = "utCo">Utensílios de Cozinha</option>
                        <option value = "maEs">Materiais Escolares</option>
                        <option value = "doc">Documentos</option>
                        <option value = "hiCo">Produtos de Higiene/Cosméticos</option>
                        <option value = "outros">Outros</option>
                    </select>
                    <!--  -->

                    <!-- Descrição do item  -->
                    <h4>Descrição</h4>
                    <textarea id="desc" class="desc" rows="5" cols="65" required spellcheck="false" placeholder="Descreva o item mais detalhadamente..."></textarea>
                    <!--  -->

                </div>
                <!-- Fim do lado Esq  -->

                <!-- O lado direito esta com a imagem e a escolha de arquivo  -->
                <div class="ladoDir">

                    <!-- Imagem exemplo  -->
                    <div class="img-item"  id="img-item">
                        <img src="img/postagens/imagem.jpg">
                    </div>
                    <!--  -->

                    <!-- Escolher a foto  -->
                    <span>Insira uma foto do item (obrigatório)</span>
                    <div class = "foto">

                        <!-- Botao de escolher arquivo  -->
                        <button class="escolherFt">Escolher foto
                            <input type="file" id="myfile" name="myfile" class="myfile">
                        </button>
                        <!--  -->

                    </div>
                    <!--  -->

                </div>
                <!-- Fim do lado Direito  -->

            </form>
            <!-- Fim do formulário -->

            <!-- Botão que publica  -->
            <input type="submit" class="botao-publicar" id = "botao-publicar" onclick="postarFeed()" value="Publicar"> 
            <!--  -->
           
        </div>
        <!-- Fim da parte principal  -->

        <!-- Mesma que a página de Feed  -->
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
                                    <img src="img/pfpusers/chuu.jpg">
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
                                    <img src="img/pfpusers/yves.jpg">
                                </div>
                                <p class="user-post">Yves</p>
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
                                    <img src="img/pfpusers/vivi.jpg">
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
                                
                                <h4>Achei esse caderno hj debaixo da mesa</h4>
                                <div class="profile-post">
                                    <div class="pfp-post"  id="post-pfp">
                                        <img src="img/pfpusers/haseul.jpg">
                                    </div>
                                    <p class="user-post">Chuu</p>
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
                                        <img src="img/pfpusers/chuu.jpg">
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
                                        <img src="img/pfpusers/yves.jpg">
                                    </div>
                                    <p class="user-post">Yves</p>
                                    
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
                        <img src="img/pfpusers/chuu.jpg">
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
