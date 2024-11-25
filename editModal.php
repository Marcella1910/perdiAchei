<div id="editModal" class="modal">
    <div class="modal-content">

        <h2 class="editModalUsername">@kdb</h2>

        <div id="editForm">

            <div class="tags-tipos">

                <div class="toggle-buttons">
                    <input type="radio" id="perdido" name="status" value="perdido">
                    <label for="perdido" class="toggle-button">objeto perdido</label>

                    <input type="radio" id="encontrado" name="status" value="encontrado">
                    <label for="encontrado" class="toggle-button">objeto encontrado</label>
                </div>

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

            <input type="text" id="postTitle" name="title" placeholder="dê um título a postagem..." value="">


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