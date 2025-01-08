<!-- Editar publicação -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <?php
        echo "<h2 class='editModalUsername'><u>@{$_SESSION['usuario']}</u></h2>";
        ?>

        <form id="editPostForm" action="atualizar_post.php" method="POST" enctype="multipart/form-data">
            <!-- Campo oculto para o ID da postagem -->
            <input type="hidden" name="post_id" value="<?php echo $postId; ?>">

            <div class="tags-tipos">
                <!-- Mudar tipo de item -->
                <div class="toggle-buttons">
                    <input type="radio" id="perdido" name="status" value="perdido">
                    <label for="perdido" class="toggle-button">objeto perdido</label>

                    <input type="radio" id="encontrado" name="status" value="encontrado">
                    <label for="encontrado" class="toggle-button">objeto encontrado</label>
                </div>

                <!-- Mudar categoria -->
                <select class="select-tags" name="categoria" id="editarCategorias">
                    <option value="roupas e agasalhos">roupas e agasalhos</option>
                    <option value="eletrônicos">eletrônicos</option>
                    <option value="garrafas e lancheiras">garrafas e lancheiras</option>
                    <option value="utensílios de cozinha">utensílios de cozinha</option>
                    <option value="materiais escolares">materiais escolares</option>
                    <option value="documentos">documentos</option>
                    <option value="produtos de higiene/cosmético">produtos de higiene/cosmético</option>
                    <option value="outros">outros</option>
                </select>
            </div>

            <!-- Mudar título -->
            <input type="text" id="postTitle" name="title" placeholder="dê um título a postagem..." value="">

            <!-- Mudar descrição -->
            <textarea name="descricao" placeholder="descreva o item..." id="postContent"></textarea>

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
                    <input id="editFileUpload" name="media" type="file" accept="image/*,video/*" style="display: none;">
                </div>

                <div class="bts-popup">
                    <button type="button" class="cancel-button" onclick="closeEditPost()">Cancelar</button>
                    <button type="submit" class="submit-button">Salvar Alterações</button>
                </div>
            </div>
        </form>
    </div>
</div>
