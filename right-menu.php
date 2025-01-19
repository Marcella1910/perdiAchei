<!-- Menu direito  -->
<div class="right-menu">
    <div class="header-right-menu">
        <p>Perfil</p>
        <!-- Botão de editar perfil  -->
        <button class="editperfil" onclick="openEditProfile()">
            <i class="fa-solid fa-pen-to-square"></i>
        </button>
    </div>
    <div class="centro-menu-right">
        <div class="ftperfil clickable-profile">
            <?php
            // Certificando de que a conexão com o banco está ativa
            if (!isset($conn)) {
                include 'db_connection.php';  // Conexão com o banco 
            }

            // Atualiza a sessão com a foto do banco de dados
            $idUsuario = $_SESSION['id'];
            $result = $conn->query("SELECT foto_perfil FROM usuarios WHERE id = $idUsuario");

            if ($result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
                $_SESSION['foto_perfil'] = $usuario['foto_perfil'];
            }

            // Exibe a foto de perfil
            if (isset($_SESSION['foto_perfil']) && file_exists($_SESSION['foto_perfil'])) {
                echo '<img src="' . htmlspecialchars($_SESSION['foto_perfil']) . '" alt="Profile Picture">';
            } else {
                echo '<img src="img/userspfp/usericon.jpg" alt="Profile Picture">';
            }
            ?>
        </div>

        <?php
        // Nome do usuário 
        echo "<h2 class='nome clickable-profile'>" . htmlspecialchars($_SESSION['nome']) . "</h2>";
        // Email do usuário 
        echo "<h2 class='username clickable-profile'><u>" . htmlspecialchars($_SESSION['email']) . "</u></h2>";
        ?>
    </div>
</div>
