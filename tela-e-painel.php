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
    <link rel="stylesheet" href="css/barra-acessibilidade.css">
    <script src="js/barra-acessibilidade.js" defer></script>
    <script src="js/configuracoes.js" defer></script>
    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <!-- Main Container -->
    <div class="adjustable-font container">



        <!-- Left Menu -->
        <?php include 'leftMenu.php'; ?>

        <!-- Middle Content -->
        <div class="main-content">
            <!-- Painel de notificações -->
            <?php include 'notifications-painel.php'; ?>

            <!-- Mudança de cores no site -->
            <div class="config-conta">
                <h3>Painel</h3>
                <div class="painel-tema">
                    <h4>Temas</h4>
                    <select class="temas-select">
                        <option value="1">Original</option>
                        <option value="2">Escuro</option>
                        <option value="3">Claro</option>
                    </select>
                </div>


                

            </div>


            <!-- Create Post Section -->

        </div>

        <!-- Right Menu -->
        <div class="right-menu-configuracoes">
            <aside>

                <h3 class="tituloconfiguracoes">Configurações</h3>
                
                <a href="configuracoes.php" class="menu-item">
                    <h3 class="nome-menu-item">Conta</h3>
                    <h4>O principal</h4>
                </a>

                
                <a href="tela-e-painel.php" class="menu-item active">
                    <h3 class="nome-menu-item">Painel</h3>
                    <h4>Tela e acessibilidade</h4>
                </a>

               
                <a href="notificacoes.php" class="menu-item">
                    <h3>Notificações</h3>
                    <h4>Receba atualizações por e-mail</h4>
                </a>

                

            </aside>

        </div>

    </div>


</body>

</html>
