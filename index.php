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
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

    <header>
        <!-- Início da navbar contendo a logo do perdiAchei, botão para o usuário fazer login e link para a página de sobre -->
        <nav>
            <div class="topnav">

                <!-- Nossa logo -->
                <img class="logo" src = "img/logos/logo.png" alt = "logo">

                <!-- Link para a página de sobre -->
                <ul id="nav-mobile" class="left">
                    <li><a href="sobre.php">Sobre</a></li>

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
            <h3 class="subtitulo">Bem-vindo(a) ao perdiAchei! O Achados e Perdidos Online do IFES Campus Serra. Iremos te ajudar a encontrar o que você perdeu nos arredores do IFES!</h3>
            
            <!-- Botão para o usuário se cadastrar -->
            <button class="btnCad" onclick="window.location.href='cadastro.php'"> CADASTRE-SE </button>

        </div>

        <!-- A coluna direita guarda o símbolo do perdiAchei: a caixa do achados e perdidos -->
        <div class="colunaDir">

            <img src="img/logos/caixinha.png">  

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
