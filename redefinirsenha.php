<!-- Bem-vindo(a) ao perdiAchei! O achados e perdidos virtual do IFES Campus Serra. -->
<!-- Feito por Gabriele Maria Modesto Luciano, Marcella Gaurink Oliveira Dias e Verônica Gonçalves de Souza -->
<!-- INFO/5, 2024 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinição da senha</title>
    <!-- Importando o JS -->
    <script src="js/login.js" defer></script>
    <!-- Importando o CSS  -->
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <!-- Mesma que a de login  -->
    <!-- A div bdlog guarda o conteúdo principal da tela de login  -->
    <div class="bdlog">
        
            <!-- Div do login (onde preenche as informações)  -->
            <div class = "login" id = "login">

                <!-- Título  -->
                <h1 class="lgtitulo">
                    Redefinição da senha
                </h1>
                <!--  -->

                <!-- Div inputs guarda as informações que devem ser preenchidas  -->
                <div class="inputs">

                    <!-- Instruções  -->
                    <h4 class="explicacao">Por favor, insira no campo abaixo o código de ativação que você recebeu por email e redefina uma nova senha.</h4>
                    <!--  -->

                    <!-- Inserir o código  -->
                    <h4>Insira o código recebido</h4>
                    <div class="inputarea">
                        <input type="text" id="text" class="user" placeholder="Código">
                    </div>
                    <!--  -->

                    <!-- Nova senha  -->
                    <h4>Insira uma nova senha</h4>
                    <div class="inputarea password-container">
                        <input type="password" id="senha" class="senha" placeholder="Nova senha">
                        <i id="togglePassword1" class="fa-regular fa-eye"></i>
                    </div>
                    <!--  -->
                    
                    <!-- Repetir a senha  -->
                    <h4>Repita a nova senha</h4>
                    <div class="inputarea password-container">
                        <input type="password" id="cnfsenha" class="cnfsenha" placeholder="Nova senha">
                        <i id="togglePassword2" class="fa-regular fa-eye"></i>
                    </div>
                    <!--  -->
                    
                    <!-- Botão para tela de login  -->
                    <button class="btnCad" onclick="window.location.href='login.php'"> Redefinir </button>
                    <!--  -->
                    
                </div>
                <!-- Fim de inputs  -->
                

                <!-- Caso não tenha recebido o email, clique para reenviar  -->
                <p class="reenviarLink"> Caso não tenha recebido a mensagem, verifique se digitou o endereço de email corretamente ou se caiu na caixa de spam. <a href="esqueceSenha.php">Reenviar email</a></p>
                <!--  -->
     
            </div>
            <!-- Fim da div de login  -->

            <!-- imgLog guarda informações sobre a redefinição de senha  -->
            <div class = "imgLog">

                <!-- Título  -->
                <h1 class="lgtitulo">Email enviado!</h1>
                <!--  -->

                <!-- Sobre  -->
                <h4>Enviamos um email para <span>email_do_usuario@gmail.com</span> para finalizar o cadastro.</h4>
                <!--  -->

            </div>
            <!--  -->
    </div>
    <!-- Fim da div bdlog  -->

    <!-- Importando o JS  -->
    <script src ="js/login.js"></script>
</body>
</html>
