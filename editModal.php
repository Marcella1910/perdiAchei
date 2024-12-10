<?php
session_start();
include_once 'dbconnect.php';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['id']; // Identifica o usuário logado
    $titulo = $conn->real_escape_string($_POST['editTitulo']);
    $descricao = $conn->real_escape_string($_POST['editDescricao']);
    $categoria = $conn->real_escape_string($_POST['editCategoria']);
    $status = $conn->real_escape_string($_POST['editStatus']);
    $media = $conn->real_escape_string($_POST['editImagem']);
    
    $fotoPerfilPath = null;

    // Verificar se uma nova foto de perfil foi enviada
    if (isset($_FILES['profile-upload']) && $_FILES['profile-upload']['error'] === 0) {
        $uploadDir = 'img/userspfp/';
        $fileName = uniqid() . '_' . basename($_FILES['profile-upload']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Validar e mover o arquivo
        if (move_uploaded_file($_FILES['profile-upload']['tmp_name'], $targetFilePath)) {
            $fotoPerfilPath = $targetFilePath;
        } else {
            echo "Erro ao fazer upload da foto de perfil.";
        }
    }

    // Montar a query de atualização
    $sql = "UPDATE usuarios SET nome = '$nome', usuario = '$usuario'";
    if ($fotoPerfilPath) {
        $sql .= ", foto_perfil = '$fotoPerfilPath'";
    }
    $sql .= " WHERE id = $userId";

    if ($conn->query($sql)) {
        // Atualizar a sessão com os novos dados
        $_SESSION['nome'] = $nome;
        $_SESSION['usuario'] = $usuario;
        
        if ($fotoPerfilPath) {
            $_SESSION['foto_perfil'] = $fotoPerfilPath;
        }

        header('Location: feed.php'); // Redireciona de volta ao feed
        exit();
    } else {
        echo "Erro ao atualizar o perfil: " . $conn->error;
    }
}

$conn->close();
?>

<!--Editar publicação-->
<div id="editModal" class="modal">
    <div class="modal-content">

            <?php
            echo "<h2 class='username clickable-profile'><u>@{$_SESSION['usuario']}</u></h2>";
            ?>

        <div id="editForm">

            <div class="tags-tipos">

                <!--Mudar tipo de item-->
                <div class="toggle-buttons">
                    <input type="radio" id="perdido" name="status" value="perdido">
                    <label for="perdido" class="toggle-button">objeto perdido</label>

                    <input type="radio" id="encontrado" name="status" value="encontrado">
                    <label for="encontrado" class="toggle-button">objeto encontrado</label>
                </div>

                <!--Mudar categoria-->
                <select class="select-tags">

                    <option value="1">Roupas e agasalhos</option>
                    <option value="2">Eletrônicos</option>
                    <option value="3">Garrafas e Lancheiras</option>
                    <option value="4">Utensílios de cozinha</option>
                    <option value="5">Materiais escolares</option>
                    <option value="6">Documentos</option>
                    <option value="7">Produtos de higiene/Cosmético</option>
                    <option value="8">Outros</option>

                </select>


            </div>

            <!--Mudar titulo-->
            <input type="text" id="postTitle" name="title" placeholder="dê um título a postagem..." value="">

            <!--Mudar descrição-->
            <textarea placeholder="descreva o item..." id="postContent"></textarea>

            <!-- Área de upload -->


            <!-- Pré-visualização -->
            <div id="editPreviewContainer" class="preview-container" style="display: none;">
                <button id="editCancelPreview" class="cancel-preview" style="margin-top: 10px;"><i
                        class="fa-solid fa-xmark"></i></button>
                <img id="editPreviewImage" class="preview-image-editpost" alt="Pré-visualização da Imagem"
                    style="display: none;">
                <video id="editPreviewVideo" class="preview-video-editpost" controls style="display: none;"></video>
            </div>

            <div class="footerEditForm">
                <div class="upload-container">
                    <label for="editFileUpload" class="upload-button">
                        escolher arquivo
                    </label>
                    <input id="editFileUpload" type="file" accept="image/*,video/*" style="display: none;">
                </div>

                <div class="bts-popup">
                    <button type="button" class="cancel-button" onclick="closeEditPost()">Cancelar</button>
                    <button type="submit" class="submit-button" onclick="closeEditPost()">Salvar
                        Alterações</button>
                </div>

            </div>
            <!-- Botões do modal -->

        </div>
    </div>
</div>