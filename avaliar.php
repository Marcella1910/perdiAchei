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
    <title>Avalie-nos</title>
</head>
<body>
    <main>
        <!-- Conteúdo principal da página de Avaliar(Feedback)-->
        <div class="main-container-feedback">

            <!-- Início do menu lateral esquerdo da página -->
            <div class="main-left">

                <!-- Div botoes é a que guarda os botoes para abrir e fechar o menu -->
                <div class="botoes">

                    <!-- Esse botao abre o menu -->
                    <button class="menuExpandir" id="menuExpandir" onclick="abrirMenuAvaliar()">
                        <i class="fa-solid fa-bars fa-lg"></i>
                    </button>

                    <!-- Esse botao fecha o menu -->
                    <button class="menuFechar" id="menuFechar" onclick="fecharMenuAvaliar()">
                        <i class="fa-regular fa-circle-xmark fa-xl"></i>
                    </button>

                </div>
                
                
                <!-- O aside irá guardar os links para as principais páginas do site -->
                <aside>

                    <!-- Link para a página de feed(Home) -->
                    <a href="feed.html" class="menu-item">
                        <span><i class="fa fa-solid fa-house fa-lg"></i></span><h3 class="nome-menu-item">Home</h3>
                    </a>

                    <!-- Link para a página de Notificações -->
                    <a href="notificacoes.html" class="menu-item">
                        <span><i class="fa-solid fa-bell fa-lg"></i></span><h3 class="nome-menu-item">Notificações</h3>
                    </a>

                    <!-- Link para a página de Minhas publicações -->
                    <a href="my-posts.html" class="menu-item">
                        <span><i class="fa-solid fa-list fa-lg"></i></span><h3 class="nome-menu-item">Minhas publicações</h3>
                    </a>

                    <!-- Link para a página de Chats(conversas) -->
                    <a href="chats.html" class="menu-item">
                        <span><i class="fa-solid fa-comments fa-lg"></i></span><h3 class="nome-menu-item">Mensagens</h3>
                    </a>

                    <!-- Link para a página de Configurações -->
                    <a href="configuracoes.html" class="menu-item">
                        <span><i class="fa-solid fa-gear fa-lg"></i></span><h3 class="nome-menu-item">Configurações</h3>
                    </a>

                    <!-- Botão de criar postagem -->
                    <div class="menu-item">
                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                        <button class="btnPostar" id="btnPostar" onclick="criarPost()">Criar post</button>
                    </div>

                    <!-- Link para fazer logout; -->
                    <a href="index.html" class="menu-item" id="log-out">
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
            <div class="main-middle-feedback">

                <!-- Título da página -->
                <h1 class="titulo">Feedback</h1>

                <!-- Subtítulo da página -->
                <h4 class="subtitulo">Avalie o nosso trabalho e sua experiência com o site!</h4>

                <!-- Div que guarda o conteúdo da avaliação -->
                <div class="avaliacao">

                    <!-- Formulário da avaliação -->
                    <form class="feedback-form">

                        <!-- Título do formulário -->
                        <h2>Como você avaliaria sua experiência com o perdiAchei?</h2>

                        <!-- Div form-group guarda o grupo de possíveis avaliações em emojis -->
                        <div class="form-grupo">
                            <div class="ratings">
                                <!-- Uma avaliação -->
                                <label class="rating">
                                    <input type="radio" name="rating">
                                    <img src="img/avaliacoes/mood-cry.png" alt="terrivel"/>
                                    <span>Terrível</span>
                                </label>
                                <!-- Uma avaliação -->
                                <label class="rating">
                                    <input type="radio" name="rating">
                                    <img src="img/avaliacoes/mood-sad.png" alt="ruim"/>
                                    <span>Ruim</span>
                                </label>
                                <!-- Uma avaliação -->
                                <label class="rating">
                                    <input type="radio" name="rating">
                                    <img src="img/avaliacoes/mood-empty.png" alt="neutro"/>
                                    <span>Neutro</span>
                                </label>
                                <!-- Uma avaliação -->
                                <label class="rating">
                                    <input type="radio" name="rating">
                                    <img src="img/avaliacoes/mood-smile.png" alt="bom"/>
                                    <span>Bom</span>
                                </label>
                                <!-- Uma avaliação -->
                                <label class="rating">
                                    <input type="radio" name="rating">
                                    <img src="img/avaliacoes/mood-happy.png" alt="muitobom"/>
                                    <span>Amei!</span>
                                </label>
                            </div>
                        </div>
                        <!-- Fim da div form-group -->

                        <!-- Subtítulo do formulário  -->
                        <h2>
                            Quais são os motivos para sua avaliação? Descreva sua experiência:
                        </h2>

                        <!-- Textarea para o usuário escrever sua experiência  -->
                        <textarea class="motivos"
                        id="motivos"
                        cols="30"
                        rows="10"
                        spellcheck="false">   
                        </textarea>

                        <!-- Input type submit para enviar o formulário  -->
                        <input id="btnEnv" type="submit" value="Enviar" class="enviar">

                        <!-- Botão para cancelar e resetar as informações do formulário preenchidas  -->
                        <button type="reset" class="cancelar">Cancelar</button>

                    </form>
                    <!-- Fim do formulário da avaliação -->
                    
                </div>
                <!-- Fim da div que guarda o conteúdo da avaliação -->
                
            </div>
            <!-- Fim do meio da página -->
            
        </div> 
        <!-- Fim do conteúdo principal da página de Avaliar(Feedback)-->  

    </main>
</body>
</html>
