<!-- Bem-vindo(a) ao perdiAchei! O achados e perdidos virtual do IFES Campus Serra. -->
<!-- Feito por Gabriele Maria Modesto Luciano, Marcella Gaurink Oliveira Dias e Verônica Gonçalves de Souza -->
<!-- INFO/5, 2024 -->

<?php
    include_once('dbconnect.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer login</title>
    <!-- Importando o CSS -->
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <!-- Importando o JS -->
    <script src="js/login.js" defer></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Importando o FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <form action = "validaLogin.php" method = "POST">
        <!-- A div bdlog guarda o conteúdo principal da tela de login  -->
        <div class="bdlog">

            <!-- Div do login (onde preenche as informações)  -->
            <div class = "login" id = "login">

                <!-- Título  -->
                <h1 class="lgtitulo">
                    Fazer login
                </h1>
    
                <!-- Div inputs guarda os inputs que o usuário irá responder -->
                <div class="inputs">
        
                    <!-- Nome de usuário  -->
                    <!-- <h4>Insira seu nome de usuário</h4>
                    <div class="inputarea">
                        <input type="text" name="username" id="username" class="user" placeholder="Nome de Usuário" required>
                    </div> -->
                    <!--  -->
        
                    <!-- Email  -->
                    <h4>Insira seu email</h4>
                    <div class="inputarea">
                        <input type="email" name="email" id="email" class="email" placeholder="Email" required>
                    </div>
                    <!--  -->

                    <!-- Senha  -->
                    <h4>Insira sua senha</h4>
                    <div class="inputarea password-container">
                        <input type="password" name="senha" id="senha" class="senha" placeholder="Senha" required>
                        <i id="togglePassword1" class="fa-regular fa-eye"></i>
                    </div>
                    <!--  -->

                    <!-- Botão de fazer login  -->
                    <button type="submit" id="btnLogin" class="btnLogin">Entrar ></button>
                    <small id="erro" class="error-message"></small>

                </div>
                <!-- Fim de inputs  -->

                <!-- Caso tenha esquecido a senha  -->
                <p class="esqueciSenha"> Esqueceu a senha? <a href="esqueceSenha.php">Clique aqui.</a></p>         

            </div>
            <!-- Fim da div de login  -->

            <!-- A div imgLog guarda a area para fazer cadastro caso o usuário não tenha cadastro  -->
            <div class = "imgLog">
    
                <!-- Título da div  -->
                <h1 class="lgtitulo">Bem-vindo(a) de volta!</h1>

                <!-- Subtítulo  -->
                <h4>Ainda não possui uma conta? <span>Conecte-se!</span></h4>

                <!-- Botão que leva ao cadastro  -->
                <button class="btnCad" onclick="window.location.href='cadastro.php'"> Cadastre-se </button>

            </div>
            <!-- Fim de imgLog  -->

        </div>
        <!-- Fim da div bdlog  -->
    </form>

    <!-- Importando o JS  -->
    <script src ="js/login.js"></script>
</body>
</html>
