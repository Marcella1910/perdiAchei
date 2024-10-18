<!-- Bem-vindo(a) ao perdiAchei! O achados e perdidos virtual do IFES Campus Serra. -->
<!-- Feito por Gabriele Maria Modesto Luciano, Marcella Gaurink Oliveira Dias e Verônica Gonçalves de Souza -->
<!-- INFO/5, 2024 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha</title>
    <!-- Importando o CSS -->
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <!-- A div bdlog guarda o conteúdo principal da tela de esqueceSenha (Mesmo da de login)  -->
    <div class="bdlog">
        
            <!-- Mesma da de login  -->
             <!-- Guarda os principais dados para recuperar a senha  -->
            <div class = "login" id = "login">

                <!-- Título  -->
                <h1 class="lgtitulo">
                    Recuperar senha
                </h1>

                <!-- Mesma da de login  -->
                 <!-- Guarda as informações para recuperar a senha  -->
                <div class="inputs">
                    
                    <!-- Email  -->
                    <h4>Insira seu email</h4>
                    <div class="inputarea">
                        <input type="email" id="email" class="email" placeholder="Email">
                    </div>
                    <!--  -->

                    <!-- Leva para a tela de redefinir senha  -->
                    <button class="btnCad" onclick="window.location.href='redefinirsenha.php'"> Redefinir senha </button>
                    <!--  -->
                    
                </div>
                <!-- Fim de inputs  -->

                <!-- Link para a tela de login caso o usuário já possua cadastro  -->
                <p class="esqueciSenha"> Já possui cadastro? <a href="login.php">Faça seu login!</a></p>
                <!--  -->

            </div>
            <!-- Fim de bdlog  -->

            <!-- Mesma da de login  -->
            <div class = "imgLog">
                <!-- informações sobre a página de esqueceSenha  -->
                <h1 class="lgtitulo">Esqueceu sua senha?</h1>
                <h4>Sem problemas, enviaremos um email com as instruções para mudar sua senha.</h4>
                <!--  -->
            </div>
            <!-- Fim de imglog  -->
        
    </div>
    <!-- Fim da div bdlog  -->

    <!-- Importa o JS  -->
    <script src ="js/login.js"></script>
</body>
</html>
