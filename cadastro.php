<?php
// Configurações do banco de dados
session_start();
include_once 'dbconnect.php';

// Definir variáveis de erro para o formulário
$erro_usuario = '';
$erro_email = '';
$erro_senha = '';
$erro_geral = '';
$nome = $usuario = $email = ''; // Variáveis para manter os dados preenchidos

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar e validar os dados do formulário
    $nome = $conn->real_escape_string(trim($_POST["nome"]));
    $usuario = $conn->real_escape_string(trim($_POST["usuario"]));
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);
    $cnfsenha = isset($_POST["cnfsenha"]) ? trim($_POST["cnfsenha"]) : '';

    // Sanitizar o email
    $email_sanitizado = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validar o email
    if (!filter_var($email_sanitizado, FILTER_VALIDATE_EMAIL)) {
        $erro_email = 'O email fornecido é inválido.';
    }

    // Verificar se as senhas são iguais
    if ($senha !== $cnfsenha) {
        $erro_senha = 'As senhas não coincidem.';
    }

    // Verificar se o nome de usuário já existe
    if (empty($erro_email)) {
        $sql_usuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $result_usuario = $conn->query($sql_usuario);
        if ($result_usuario->num_rows > 0) {
            $erro_usuario = 'Nome de usuário já cadastrado.';
        }

        // Verificar se o email já existe
        $sql_email = "SELECT * FROM usuarios WHERE email = '$email_sanitizado'";
        $result_email = $conn->query($sql_email);
        if ($result_email->num_rows > 0) {
            $erro_email = 'Email já cadastrado.';
        }
    }

    // Se não houver erros, realizar o cadastro
    if (empty($erro_usuario) && empty($erro_email) && empty($erro_senha)) {
        // Criptografar a senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir dados no banco
        $sql = "INSERT INTO usuarios (nome, usuario, email, senha) VALUES ('$nome', '$usuario', '$email_sanitizado', '$senha_hash')";

        if ($conn->query($sql) === TRUE) {
            // Redireciona para a página de login após o cadastro
            header("Location: login.php");
            exit();
        } else {
            $erro_geral = 'Erro ao cadastrar: ' . $conn->error;
        }
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css" />
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/cadastro.js" defer></script>
</head>

<body>

    <form action="cadastro.php" method="POST">
        <div class="bdcad">

            <div class="cadastro" id="cadastro">
                <h1 class="lgtitulo">Cadastre-se</h1>
                <div class="inputs">

                    <h4>Como devemos te chamar?</h4>
                    <div class="inputarea">
                        <input type="text" id="nome" name="nome" class="nome" placeholder="Nome" required
                            value="<?php echo isset($nome) ? $nome : ''; ?>">
                    </div>

                    <h4>Crie um nome de usuário</h4>
                    <div class="inputarea">
                        <input type="text" id="user" name="usuario" class="user" placeholder="Nome de Usuário" required
                            value="<?php echo isset($usuario) ? $usuario : ''; ?>">
                        <?php if ($erro_usuario): ?>
                            <small class="error-message"><?php echo $erro_usuario; ?></small>
                            <?php unset($erro_usuario); ?>
                        <?php endif; ?>
                    </div>

                    <h4>Insira seu email</h4>
                    <div class="inputarea">
                        <input type="email" id="email" name="email" class="email" placeholder="Email" required
                            value="<?php echo isset($email) ? $email : ''; ?>">
                        <?php if ($erro_email): ?>
                            <small class="error-message"><?php echo $erro_email; ?></small>
                            <span class="error"><?php echo $erro_usuario; ?></span>
                            <?php unset($erro_email); ?>
                        <?php endif; ?>
                    </div>

                    <h4>Crie uma senha</h4>
                    <div class="inputarea password-container">
                        <input type="password" id="senha" name="senha" class="senha" placeholder="Criar senha" required>
                        <i id="togglePassword1" class="fa-regular fa-eye" style="color: #555;"></i>
                    </div>

                    <h4>Confirmar senha</h4>
                    <div class="inputarea password-container">
                        <input type="password" id="cnfsenha" name="cnfsenha" class="cnfsenha"
                            placeholder="Confirmar senha" required>

                        <i id="togglePassword2" class="fa-regular fa-eye" style="color: #555;"></i>
                        <?php if ($erro_senha): ?>
                            <small class="error-message"><?php echo $erro_senha; ?></small>
                            <?php unset($erro_senha); ?>
                        <?php endif; ?>
                    </div>

                    <button type="submit" id="btnCad" class="btnCad">Cadastrar</button>

                    <?php if ($erro_geral): ?>
                        <small class="error-message"><?php echo $erro_geral; ?></small>
                        <?php unset($erro_geral); ?>
                    <?php endif; ?>

                </div>

                

            </div>

            <div class="imgCad">

                <!-- Título da div  -->
                <h1 class="lgtitulo">Bem-vindo(a) ao <span>perdiAchei!</span></h1>

                <!-- Subtítulo da div  -->
                <h4>Perdeu ou achou alguma coisa nos arredores do IFES Campus Serra? <span>Conecte-se!</span></h4>

                <!-- Botão para a página de login  -->
                <button class="btnLog" onclick="window.location.href='login.php'"> Fazer Login </button>

            </div>

        </div>
    </form>

</body>

</html>