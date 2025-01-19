<!-- Menu esquerdo  -->
<div class="left-menu">
    <aside>

        <!-- Link para a página de feed(Home) -->
        <a href="feed.php" class="menu-item">
            <span><i class="fa fa-solid fa-house fa-lg"></i></span>
            <h3 class="nome-menu-item">Home</h3>
        </a>

        <!-- Link para o painel de Notificações -->
        <button class="menu-item-notifications">
            <span><i class="fa-solid fa-bell fa-lg"></i></span>
            <h3 class="nome-menu-item">Notificações</h3>
        </button>

        <!-- Link para a página de Perfil -->
        <a href="meuperfil.php" class="menu-item" id="link-perfil-menu">
            <span>
                <?php
                $fotoPerfil = isset($_SESSION['foto_perfil']) && file_exists($_SESSION['foto_perfil'])
                    ? htmlspecialchars($_SESSION['foto_perfil'])
                    : 'img/userspfp/usericon.jpg';
                ?>
                <img src="<?= $fotoPerfil ?>" alt="Foto de perfil" class="foto-perfil-menu">
            </span>
            <h3 class="nome-menu-item">Perfil</h3>
        </a>

        <!-- Link para a página de Configurações -->
        <a href="configuracoes.php" class="menu-item">
            <span><i class="fa-solid fa-gear fa-lg"></i></span>
            <h3 class="nome-menu-item">Configurações</h3>
        </a>


        <!-- Link para fazer logout; -->
        <a href="index.php" class="menu-item" id="log-out">
            <span><i class="fa-solid fa-right-from-bracket fa-lg"></i></span>
            <h3>Sair</h3>
        </a>

    </aside>
</div>