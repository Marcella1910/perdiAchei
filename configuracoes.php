<?php

session_start();

include_once 'dbconnect.php';
include_once 'validaSessao.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perdiAchei</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/feed.css">

    <!-- Estilos e scripts da barra -->
    <link rel="stylesheet" href="css/barra-acessibilidade.css">
    <script src="js/barra-acessibilidade.js" defer></script>

    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Inclui a Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Container -->
    <div class="adjustable-font container">

        <!-- Inclui Left Menu -->
        <?php include 'leftMenu.php'; ?>

        <!-- Middle Content -->
        <div class="main-content">


            <!--Div da pequena tela que aparece quando se clica em notificações-->
            <div class="notification-panel">
                <div class="notification-header">
                    <h2 class="username">@kdb</h2>
                </div>
                <ul class="notification-list">
                    <li>
                        <div class="notif">
                            <img src="img/userspfp/jinsoul.jpg" alt="Usuário 1">
                            <div class="dados-notif">
                                <p>@jinsoul</p>
                                <p>quer reivindicar um item postado!</p>
                            </div>
                    </li>
                    <li>
                        <div class="notif">
                            <img src="img/userspfp/jinsoul.jpg" alt="Usuário 1">
                            <div class="dados-notif">
                                <p>@jinsoul</p>
                                <p>quer reivindicar um item postado!</p>
                            </div>
                    </li>
                    <li>
                        <div class="notif">
                            <img src="img/userspfp/jinsoul.jpg" alt="Usuário 1">
                            <div class="dados-notif">
                                <p>@jinsoul</p>
                                <p>quer reivindicar um item postado!</p>
                            </div>
                    </li>
                    <li>
                        <div class="notif">
                            <img src="img/userspfp/jinsoul.jpg" alt="Usuário 1">
                            <div class="dados-notif">
                                <p>@jinsoul</p>
                                <p>quer reivindicar um item postado!</p>
                            </div>
                    </li>
                    <!-- Adicione mais notificações aqui -->
                </ul>
            </div>

            <!--configurações-->
            <div class="config-conta">
                <h3>Conta</h3>
                <div class="email-conta">
                    <h4>Email</h4>
                    <!--Pega o email cadastrado da sessao e mostra na tela-->
                    <?php echo "<h4 class='user-email' id='user-email'><u>{$_SESSION['email']}</u></h4>"; ?>

                    <button onclick="openModal()" class="mudarEmailBtn"><i class="fa-solid fa-pen-to-square"></i></button>
                </div>
                <div class="senha-conta">
                    <h4>Senha</h4>
                    <h4 class="user-senha" id="user-senha">••••••••••</h4>
                    <button onclick="openModal()"><i class="fa-solid fa-pen-to-square"></i></button>
                </div>
                
                <!--Botâo para excluir conta cadastrada do banco de dados-->
                <div class="excluir-conta">
                    <h4>Excluir conta</h4>
                    <button onclick="openModalDeleteAccount()" class="excluir-conta-btn">excluir conta</button>
                </div>

            </div>

            <!--PopUp de quando se clica para redefinir senha-->
            <div class="modal" id="deleteModal">
                <div class="modal-content">
                    <h3>Defina sua senha</h3>
                    <p>Para fazer essas alterações, primeiro você precisa definir uma senha utilizando o link de
                        redefinição de senha enviado ao seu e-mail.</p>
                    <div class="bts-popup">
                        <button onclick="closeModal()" class="fecharAba">Cancelar</button>
                        <button onclick="confirmSenha()" class="confirmaSenha">Enviar e-mail de redefinição de
                            senha</button>
                    </div>
                </div>
            </div>

            <!--PopUp de quando se clica para excluir conta-->
            <div class="modal" id="deleteAccountModal" style="display: none;">
                <div class="modal-content">
                    <h3>Confirmar Exclusão de Conta</h3>
                    <p>Tem certeza de que deseja excluir sua conta? Essa ação não pode ser desfeita.</p>
                    <form id="deleteAccountForm" action="deletar.php" method="POST">
                        
                        <input type="password" id="password" name="password" required placeholder="Digite sua senha para confirmar...">
                        <!-- Campo oculto para enviar o ID do usuário -->
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                        <div class="bts-popup">
                            <button type="button" onclick="closeModalDeleteAccount()" class="fecharAba">Cancelar</button>
                            <button type="submit" class="confirmaSenha">Excluir Conta</button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Create Post Section -->

        </div>

        <!-- Right Menu -->
        <div class="right-menu-configuracoes">
            <aside>

                <h3 class="tituloconfiguracoes">Configurações</h3>
                <!-- Link para a página de feed(Home) -->
                <a href="configuracoes.php" class="menu-item active">
                    <h3 class="nome-menu-item">Conta</h3>
                    <h4>O principal</h4>
                </a>

                <!-- Link para a página de Configurações -->
                <a href="tela-e-painel.php" class="menu-item">
                    <h3 class="nome-menu-item">Painel</h3>
                    <h4>Tela e acessibilidade</h4>
                </a>

                <!-- Botão de criar postagem -->


                <!-- Link para fazer logout; -->
                <a href="notificacoes.php" class="menu-item">
                    <h3>Notificações</h3>
                    <h4>Receba atualizações por e-mail</h4>
                </a>

                <!-- Essa div leva para a página de avaliação -->

                <!-- Fim da div de avaliação -->

            </aside>

        </div>

    </div>

    <script src="js/configuracoes.js"></script>
</body>

</html>