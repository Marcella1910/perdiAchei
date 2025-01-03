<div class="right-menu">
    <div class="header-right-menu">
        <p>Perfil</p>
        <button class="editperfil" onclick="openEditProfile()">
            <i class="fa-solid fa-pen-to-square"></i>
        </button>
    </div>
    <div class="centro-menu-right">
        <div class="ftperfil clickable-profile">
            <?php
            if (isset($_SESSION['foto_perfil']) && file_exists($_SESSION['foto_perfil'])) {
                echo '<img src="' . $_SESSION['foto_perfil'] . '" alt="Profile Picture">';
            } else {
                echo '<img src="img/userspfp/usericon.jpg" alt="Profile Picture">';
            }
            ?>
        </div>

        <?php
        echo "<h2 class='nome clickable-profile'>{$_SESSION['nome']}</h2>";
        echo "<h2 class='username clickable-profile'><u>{$_SESSION['email']}</u></h2>";
        ?>
    </div>

</div>