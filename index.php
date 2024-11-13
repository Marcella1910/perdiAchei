<!-- Bem-vindo(a) ao perdiAchei! O achados e perdidos virtual do IFES Campus Serra. -->
<!-- Feito por Gabriele Maria Modesto Luciano, Marcella Gaurink Oliveira Dias e Verônica Gonçalves de Souza -->
<!-- INFO/5, 2024 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>perdi?Achei!</title>
    <!-- Importando o CSS -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <header>
        <!-- Início da navbar contendo a logo do perdiAchei, botão para o usuário fazer login e link para a página de sobre -->
        <nav>
            <div class="topnav">

                <!-- Nossa logo -->
                <div class="logo">
                    <p>perdeu algo? ache aqui!</p>
                </div>

                <!-- Link para a página de sobre -->
                <ul id="nav-mobile" class="left">
                    <li><a href="#sobre">Sobre</a></li>

                    <!-- Botão para o usuário fazer login -->
                    <button class="btnLogin" onclick="window.location.href='login.php'">
                        <i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
                        Entrar
                    </button>

                </ul>

            </div>
        </nav>
        <!-- Fim da navbar -->
    </header>

    <!-- Início do meio e conteúdo principal da página -->

    <div class="banner index">

        <!-- A coluna esquerda guarda o conteúdo escrito da página -->
        <div class="colunaEsq">

            <!-- Título da página -->
            <h1 class="tituloPagina">Perdeu algo? Encontre <span>Aqui.</span></h1>

            <!-- Subtítulo da página -->
            <h3 class="subtitulo">Bem-vindo(a) ao perdiAchei! O Achados e Perdidos Online do IFES Campus Serra. Iremos
                te ajudar a encontrar o que você perdeu nos arredores do IFES!</h3>

            <!-- Botão para o usuário se cadastrar -->
            <button class="btnCad" onclick="window.location.href='cadastro.php'"> cadastre-se! </button>

        </div>

        <!-- A coluna direita guarda o símbolo do perdiAchei: a caixa do achados e perdidos -->
        <div class="colunaDir">

            <img src="img/logos/caixinha.png">

        </div>

    </div>
    <!-- Fim do meio e conteúdo principal da página -->

    <div class="banner sobre" id="sobre">

        <!-- Conteúdo escrito da página -->
        <div class="conteudo">

            <!-- Título da página -->


            <!-- A div explicação guarda a explicação sobre o que é o perdiAchei -->
            <div class="explicacao">

                <!-- Guarda a parte escrita da explicação -->

                <h2>O que é o perdiAchei?</h2>



                <!-- Guarda uma imagem para exemplificação -->
                <p>O perdiAchei é o sistema de achados e perdidos virtual do IFES Campus Serra.
                    O sistema nasce com o objetivo de tornar a recuperação de itens perdidos no Campus mais fácil e
                    dinâmica, sendo assim um adicional para o já existente Achados e Perdidos da instituição.</p>

            </div>

            <!-- Fim da div explicação -->


            <!-- A div pesquisa guarda a explicação sobre o perdiAchei foi formado -->
            <div class="pesquisa">



                <!-- Guarda a parte escrita da explicação -->


                <p>
                    Algumas experiências pessoais nos fizeram perceber que o
                    Achados e Perdidos físico que temos não é tão eficiente quanto poderia ser.
                    Falta de organização e a dificuldade de encontrar o Achados e
                    Perdidos eram as opiniões que prevaleciam.
                    <br><span>Assim, nasce a ideia de fazer um sistema on-line
                        para mediar as devoluções.</span>
                </p>


                <!-- Guarda uma imagem para exemplificação -->


            </div>
            <!-- Fim da div pesquisa -->

            <!-- A div nos guarda informações sobre as integrantes do grupo que fez o perdiAchei -->
            <div class="nos">

                <!-- Guarda a parte escrita da explicação -->

                <h2>Quem somos nós?</h2>

                <div class="cards-container">
                    <!-- Card 1 -->
                    <div class="card">
                        <img src="img/userspfp/gabi.jpg" alt="Gabi">
                        <div class="card-content">
                            <h3 class="card-title">Gabriele</h3>
                            <p class="card-description">Descrição breve sobre a pessoa ou seu papel.</p>

                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card">
                        <img src="https://via.placeholder.com/220" alt="Foto de perfil">
                        <div class="card-content">
                            <h3 class="card-title">Jean</h3>
                            <p class="card-description">Descrição breve sobre a pessoa ou seu papel.</p>

                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="card">
                        <img src="https://via.placeholder.com/220" alt="Foto de perfil">
                        <div class="card-content">
                            <h3 class="card-title">Marcella</h3>
                            <p class="card-description">Descrição breve sobre a pessoa ou seu papel.</p>

                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="card">
                        <img src="https://via.placeholder.com/220" alt="Foto de perfil">
                        <div class="card-content">
                            <h3 class="card-title">Verônica</h3>
                            <p class="card-description">Descrição breve sobre a pessoa ou seu papel.</p>

                        </div>
                    </div>
                </div>

                <!-- Guarda uma imagem para exemplificação -->


            </div>
            <!-- Fim da div nos -->

        </div>

    </div>

    <!-- Início do rodapé da página -->
    <footer class="rodape">
        <div class="interface">

            <div class="line-footer">

                <div class="flex">

                    <!-- Div contendo a logo do projeto -->
                    <div class="logo-footer cima">
                        <img class="logo" src="img/logos/versao2logo.png" alt="O achados e perdidos do IFES Serra">
                    </div>

                    <button class="btn-social"><i class="fa-brands fa-github"></i>
                    </button>


                </div>


            </div>

            <div class="line-footer borda">
                <p><i class="fa-solid fa-envelope"></i>
                    <a href="mailto:projetoperdiachei@gmail.com">projetoperdiachei@gmail.com</a>
                </p>
            </div>

        </div>

    </footer>
    <!-- Fim do rodapé da página -->
</body>

</html>