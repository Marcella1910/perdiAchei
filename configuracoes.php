<?php
// Iniciando a sessão
session_start();
// Conexão com o banco, validação da sessão do usuário 
include_once 'dbconnect.php';
include_once 'validaSessao.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Importando o css -->
    <link rel="stylesheet" href="css/feed.css">
    <!-- Estilos e scripts da barra -->
    <link rel="stylesheet" href="css/barra-acessibilidade.css">
    <script src="js/barra-acessibilidade.js" defer></script>
    <!-- Importando as fontes  -->
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

            <!--configurações-->
            <div class="config-conta">
                <h3>Conta</h3>
                
                <!--Botâo para excluir conta cadastrada do banco de dados-->
                <div class="excluir-conta">
                    <h4>Excluir conta</h4>
                    <button onclick="openModalDeleteAccount()" class="excluir-conta-btn">excluir conta</button>
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


        </div>

        <!-- Modal de editar perfil  -->
        <?php include 'editPerfilModal.php'; ?>

        
        <!-- Right Menu -->
        <?php include 'right-menu.php'; ?>

    </div>

    <script src="js/configuracoes.js"></script>
    <!-- Importando script js das configurações  -->
</body>

</html>