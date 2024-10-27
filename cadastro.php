<!-- Bem-vindo(a) ao perdiAchei! O achados e perdidos virtual do IFES Campus Serra. -->
<!-- Feito por Gabriele Maria Modesto Luciano, Marcella Gaurink Oliveira Dias e Verônica Gonçalves de Souza -->
<!-- INFO/5, 2024 -->

<?php
// Configurações do banco de dados
include_once 'dbconnect.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar e validar os dados do formulário
    $nome = $conn->real_escape_string($_POST["nome"]);
    $usuario = $conn->real_escape_string($_POST["usuario"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $senha = md5($_POST["senha"]);

    // Inserir dados no banco
    $sql = "INSERT INTO usuarios (nome, usuario, email, senha) VALUES ('$nome', '$usuario', '$email', '$senha')";

    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página feed.php
        header("Location: feed.php");
        exit(); // Encerra o script após o redirecionamento
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Importando o CSS -->
    <link rel="stylesheet" type="text/css" href="css/cadastro.css" />
    <!-- Importando o FontAwesome -->
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Importando o JS  -->
    <script src="js/cadastro.js" defer></script>
</head>

<body>

    <form action="cadastro.php" method="POST">
        <!-- A div bdcad guarda o conteúdo principal da tela de cadastro  -->
        <div class="bdcad">

            <!-- Div do cadastro (onde preenche as informações)  -->
            <div class="cadastro" id="cadastro">

                <!-- Título da div  -->
                <h1 class="lgtitulo">
                    Cadastre-se
                </h1>

                <!-- Div inputs guarda os inputs que o usuário irá responder -->
                <div class="inputs">

                    <!-- Nome do usuário  -->
                    <h4>Como devemos te chamar?</h4>
                    <div class="inputarea">
                        <input type="text" id="nome" name="nome" class="nome" placeholder="Nome">
                    </div>
                    <!--  -->

                    <!-- Username do usuário  -->
                    <h4>Crie um nome de usuário</h4>
                    <div class="inputarea">
                        <input type="text" id="user" name="usuario" class="user" placeholder="Nome de Usuário">
                    </div>
                    <!--  -->

                    <!-- Email do usuário  -->
                    <h4>Insira seu email</h4>
                    <div class="inputarea">
                        <input type="email" id="email" name="email" class="email" placeholder="Email">
                    </div>
                    <!--  -->

                    <!-- Criar senha  -->
                    <h4>Crie uma senha</h4>
                    <div class="inputarea password-container">
                        <input type="password" id="senha" name="senha" class="senha" placeholder="Criar senha">
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
                <p class="fazerLogin"> Já possui uma conta? <a href="login.php">Fazer login.</a></p>



            </div>
            <!-- Fim da div do cadastro  -->


            <!-- A div imgCad guarda a area para fazer login caso o usuário já possua cadastro  -->
            <div class="imgCad">

                <!-- Título da div  -->
                <h1 class="lgtitulo">Bem-vindo(a) ao <span>perdiAchei!</span></h1>

                <!-- Subtítulo da div  -->
                <h4>Perdeu ou achou alguma coisa nos arredores do IFES Campus Serra? <span>Conecte-se!</span></h4>

                <!-- Botão para a página de login  -->
                <button class="btnLog" onclick="window.location.href='login.php'"> Fazer Login </button>

            </div>
            <!-- Fim da div imgCad  -->

        </div>
        <!-- Fim da div bdcad  -->

    </form>

</body>

</html>