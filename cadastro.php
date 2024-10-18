<!-- Bem-vindo(a) ao perdiAchei! O achados e perdidos virtual do IFES Campus Serra. -->
<!-- Feito por Gabriele Maria Modesto Luciano, Marcella Gaurink Oliveira Dias e Verônica Gonçalves de Souza -->
<!-- INFO/5, 2024 -->
<?php
    if(isset($_POST['submit'])) {

        include_once('config.php');

        $nome = $_POST['nome'];
        $user = $_POST['user'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cnfsenha = $_POST['cnfsenha']



        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,user,email,senha,cnfsenha) 
        VALUES ($nome,$user,$email,$senha,$cnfsenha)");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <!-- Importando o CSS -->
    <link rel="stylesheet" type="text/css" href="css/cadastro.css"/>
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Importando o JS  -->
    <script src ="js/cadastro.js" defer></script>
</head>
<body>

    <!-- A div bdcad guarda o conteúdo principal da tela de cadastro  -->
    <div class="bdcad">
        
        <!-- Div do cadastro (onde preenche as informações)  -->
        <div class = "cadastro" id = "cadastro">

            <!-- Título da div  -->
            <h1 class="lgtitulo">
                Cadastre-se
            </h1>
                
            <!-- Div inputs guarda os inputs que o usuário irá responder -->
            <div class="inputs">

                <!-- Nome do usuário  -->
                <h4>Como devemos te chamar?</h4>
                <div class="inputarea">
                    <input type="text" id="nome" class="nome" placeholder="Nome">
                </div>
                <!--  -->

                <!-- Username do usuário  -->
                <h4>Crie um nome de usuário</h4>
                <div class="inputarea">
                    <input type="text" id="user" class="user" placeholder="Nome de Usuário">
                </div>
                <!--  -->
                    
                <!-- Email do usuário  -->
                <h4>Insira seu email</h4>
                <div class="inputarea">
                    <input type="email" id="email" class="email" placeholder="Email">
                </div>
                <!--  -->
                    
                <!-- Criar senha  -->
                <h4>Crie uma senha</h4>
                <div class="inputarea password-container">
                    <input type="password" id="senha" class="senha" placeholder="Criar senha">
                    <i id="togglePassword1" class="fa-regular fa-eye"></i>
                </div>
                <!--  -->
                    
                <!-- Repetir a senha  -->
                <div class="inputarea password-container">
                    <input type="password" id="cnfsenha" class="cnfsenha" placeholder="Confirmar senha">
                    <i id="togglePassword2" class="fa-regular fa-eye"></i>
                </div>
                <!--  -->
                    
                <!-- Botão para fazer login  -->
                <button type="submit" id="btnCad" class="btnCad">Entrar ></button>
                <small id="erro" class="error-message"></small>

                    
            </div>
            <!-- Fim de inputs -->

            <!-- Link para fazer login caso o usuário já possua conta  -->
            <p class="fazerLogin"> Já possui uma conta? <a href="login.html">Fazer login.</a></p>

                
     
        </div>
        <!-- Fim da div do cadastro  -->


        <!-- A div imgCad guarda a area para fazer login caso o usuário já possua cadastro  -->
        <div class = "imgCad">

            <!-- Título da div  -->
            <h1 class="lgtitulo">Bem-vindo(a) ao <span>perdiAchei!</span></h1>

            <!-- Subtítulo da div  -->
            <h4>Perdeu ou achou alguma coisa nos arredores do IFES Campus Serra? <span>Conecte-se!</span></h4>

            <!-- Botão para a página de login  -->
            <button class="btnLog" onclick="window.location.href='login.html'"> Fazer Login </button>

        </div>
        <!-- Fim da div imgCad  -->
        
    </div>
    <!-- Fim da div bdcad  -->
    
</body>
</html>
