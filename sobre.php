<!-- Bem-vindo(a) ao perdiAchei! O achados e perdidos virtual do IFES Campus Serra. -->
<!-- Feito por Gabriele Maria Modesto Luciano, Marcella Gaurink Oliveira Dias e Verônica Gonçalves de Souza -->
<!-- INFO/5, 2024 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nós e nosso trabalho</title>
    <!-- Importando o CSS -->
    <link rel = "stylesheet" href = "css/index.css">
</head>
<body>
    <header>
        <!-- Início da navbar contendo a logo do perdiAchei, botão para o usuário fazer login e link para voltar a index page -->
        <nav>
            <div class="topnav">

                <!-- Nossa logo -->
                <img class="logo" src = "img/logos/logo.png" alt = "logo">

                <!-- Voltar para a index page -->
                <ul id="nav-mobile" class="left">
                    <li><a href="index.php">Voltar</a> </li>

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
    <div class = "banner">

        <!-- Conteúdo escrito da página -->
        <div class="conteudo">

            <!-- Título da página -->
            <h1 class="titulosobre">Sobre nós e nosso trabalho</h1>

            <!-- A div explicação guarda a explicação sobre o que é o perdiAchei -->
            <div class="explicacao">

                <!-- Guarda a parte escrita da explicação -->
                <div class="txtmissao">
                    <h2>O que é o perdiAchei?</h2>
                    <p>O perdiAchei é o sistema de achados e perdidos virtual do IFES Campus Serra.
                    O sistema nasce com o objetivo de tornar a recuperação de itens perdidos no Campus mais fácil e dinâmica, sendo assim um adicional para o já existente Achados e Perdidos da instituição.</p>
                </div>

                <!-- Guarda uma imagem para exemplificação -->
                <div class = "imgMissao">
                    <img class = "misImg" src = "img/sobre/imagemsobre1.png" alt = "missao">
                </div>
            </div>

            <!-- Fim da div explicação -->


            <!-- A div pesquisa guarda a explicação sobre o perdiAchei foi formado -->
            <div class="pesquisa">

                 

                <!-- Guarda a parte escrita da explicação -->
                <div class="txtpesquisa">
                    <h2>Como nasce o perdiAchei?</h2>
                    <p>As constantes idas e vindas ao Campus e, algumas experiências pessoais nos fizeram aprender que o Achados e Perdidos físico que temos não é tão eficiente quanto poderia ser.
                        <br></br>
                        A partir disso, fizemos uma pesquisa com vários outros alunos da instituição e a grande parte relataram os mesmos problemas: falta de organização, dificuldade de encontrar o Achados e Perdidos(ele sempre muda de lugar), além de experiências
                        de nunca ter reencontrado os itens perdidos. Assim, nasce a ideia de fazer um sistema on-line para mediar as devoluções. </p>
                </div>

                <!-- Guarda uma imagem para exemplificação -->
                <div class = "imgPesquisa">
                    <img class = "pesquisaImg" src = "img/sobre/imgsobre2.png" alt = "pesquisa">
                </div>

            </div>
            <!-- Fim da div pesquisa -->

            <!-- A div nos guarda informações sobre as integrantes do grupo que fez o perdiAchei -->
            <div class = "nos">
                
                <!-- Guarda a parte escrita da explicação -->
                <div class="txtnos">
                    <h2>Quem somos nós?</h2>
                    <p>Somos um grupo de três alunas preocupadas em ajudar os estudantes de nosso campus a encontrar seus itens perdidos pelos arredores da escola.</p>
                </div>

                <!-- Guarda uma imagem para exemplificação -->
                <div class = "imgNos">
                    <img class = "nosImg" src = "img/sobre/nos.png" alt = "FtSobreNos">
                </div> 
                
            </div>
            <!-- Fim da div nos -->
            
        </div>

    </div>
    <!-- Fim do meio e conteúdo principal da página -->

    
    <!-- Início do rodapé da página -->
    <footer class="rodape">
        <div class="interface">

            <div class="line-footer">

                <div class="flex">

                    <!-- Div contendo a logo do projeto -->
                    <div class="logo-footer cima">
                        <img class="logo" src = "img/logos/versao2logo.png" alt = "O achados e perdidos do IFES Serra">
                    </div>

                    <div class="btn-social">
                        <a href="#"><button><i class="fa-brands fa-github"></i></button></a>
                        <a href="#"><button><i class="fa-brands fa-instagram"></i></button></a>
                        <a href="#"><button><i class="fa-brands fa-readme"></i></button></a>
                    </div>

                </div>
                

            </div>
            
            <div class="line-footer borda">
                <p><i class="fa-solid fa-envelope"></i><a href="mailto:projetoperdiachei@gmail.com">projetoperdiachei@gmail.com</a></p>
            </div>

        </div>
        
    </footer>
    <!-- Fim do rodapé da página -->

</body>
</html>
