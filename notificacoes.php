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

    <!-- Inclui a Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Container -->
    <div class="adjustable-font container">

        <!-- Inclui Left Menu -->
        <?php include 'leftMenu.php'; ?>

        <!-- Middle Content -->
        <div class="main-content">

             <!-- Painel de notificações -->
            <?php include 'notifications-painel.php'; ?>


            <div class="config-conta">
                <h3>Notificações</h3>
                <div class="email-conta">
                    <h4>Receber notificações por email</h4>
                    <h4 class="user-notif" id="user-notif">Você receberá pedidos de reivindicação de itens, além de mensagens por email para a realização da troca de itens.</h4>
                    <div class="toggle-switch">
                        <input type="checkbox" id="toggle" class="toggle-checkbox">
                        <label for="toggle" class="toggle-label"></label>
                    </div>
                </div>
            </div>


            
        
        </div>     

        <!-- Right Menu -->
        <div class="right-menu-configuracoes">
            <aside>

                <h3 class="tituloconfiguracoes">Configurações</h3>
               
                <a href="configuracoes.php" class="menu-item">
                    <h3 class="nome-menu-item">Conta</h3>
                    <h4>O principal</h4>
                </a>

                
                <a href="tela-e-painel.php" class="menu-item">
                    <h3 class="nome-menu-item">Painel</h3>
                    <h4>Tela e acessibilidade</h4>
                </a>

               


                
                <a href="notificacoes.php" class="menu-item active">
                    <h3>Notificações</h3>
                    <h4>Receba atualizações por e-mail</h4>
                </a>

                

            </aside>

        </div>

    </div>
    

    
</body>
</html>
