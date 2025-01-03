<!--Editar perfil-->
<div class="modal" id="editPerfilModal">
    <form action="editar_perfil.php" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="profile-picture-container">
                <!--Upload foto para foto de perfil-->
                <div class="upload-pfp">
                    <label for="profile-upload" class="upload-button">
                        <i class="fa-solid fa-camera"></i>
                    </label>
                    <input id="profile-upload" name="profile-upload" type="file" accept="image/*">
                </div>
                <!--Conferir de que cada foto de perfil de cada usuário apareça, e seja aquela que o usuário colocou-->
                <?php
                if (isset($_SESSION['foto_perfil']) && file_exists($_SESSION['foto_perfil'])) {
                    echo '<img id="profile-image" src="' . $_SESSION['foto_perfil'] . '" alt="Profile Picture">';
                } else {
                    echo '<img id="profile-image" src="img/userspfp/usericon.jpg" alt="Profile Picture">';
                }
                ?>
            </div>
            
            <!--Mostrar nome do usuário da sessão-->
            <input type="text" id="editName" name="editName" placeholder="Nome"
                value="<?php echo $_SESSION['nome']; ?>">


            <div class="footerEditPerfilModal">
                <div class="bts-popup">
                    <button type="button" class="cancelarReport" onclick="closeEditProfile()">Cancelar</button>
                    <button type="submit" class="submit-button">Salvar Alterações</button>
                </div>
            </div>
        </div>
    </form>
</div>