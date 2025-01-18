<!-- Seção de Criação de Postagem -->
<div class="create-post">
    <!-- Formulário para criação de post -->
    <form action="criar_post.php" method="POST" enctype="multipart/form-data">
        <!-- Campo para o título da postagem -->
        <textarea name="titulo" maxlength="80" rows="1" cols="30" class="titulopost"
            placeholder="dê um título a postagem..."></textarea>

        <!-- Campo para a descrição da postagem -->
        <textarea name="descricao" class="descricaopost" maxlength="280" rows="5" cols="30"
            placeholder="perdeu ou achou algo?"></textarea>

        <!-- Container para pré-visualização da mídia (imagem/vídeo), inicialmente oculto -->
        <div id="preview-container" class="preview-container" style="display: none;">
            <!-- Botão para remover a mídia pré-visualizada -->
            <button id="cancel-button" style="margin-top: 10px;">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <!-- Pré-visualização de imagem, inicialmente oculta -->
            <img id="preview-image" class="preview-image" alt="Pré-visualização da Imagem" style="display: none;">
            <!-- Pré-visualização de vídeo, inicialmente oculta -->
            <video id="preview-video" class="preview-video" controls style="display: none;"></video>
        </div>

        <!-- Container dos botões de ação -->
        <div class="botoes">
            <!-- Botão para enviar o formulário e criar a publicação -->
            <button type="submit" class="createPostBtn" id="createPostBtn">criar publicação</button>

            <!-- Container para os botões à direita -->
            <div class="botoes-ladodir">
                <!-- Menu suspenso para selecionar a categoria do item -->
                <select name="categoria" class="select-tags" id="select-tags">
                    <option value="roupas e agasalhos">roupas e agasalhos</option>
                    <option value="eletrônicos">eletrônicos</option>
                    <option value="garrafas e lancheiras">garrafas e lancheiras</option>
                    <option value="utensílios de cozinha">utensílios de cozinha</option>
                    <option value="materiais escolares">materiais escolares</option>
                    <option value="documentos">documentos</option>
                    <option value="produtos de higiene/cosmético">produtos de higiene/cosmético</option>
                    <option value="outros">outros</option>
                </select>

                <!-- Botões de alternância para definir o status do item (perdido ou encontrado) -->
                <div class="toggle-buttons">
                    <!-- Botão para selecionar "objeto perdido" -->
                    <input type="radio" id="perdido" name="status" value="perdido">
                    <label for="perdido" class="toggle-button">objeto perdido</label>

                    <!-- Botão para selecionar "objeto encontrado" -->
                    <input type="radio" id="encontrado" name="status" value="encontrado">
                    <label for="encontrado" class="toggle-button">objeto encontrado</label>
                </div>

                <!-- Container para upload de arquivos -->
                <div class="upload-container">
                    <!-- Botão de upload de mídia -->
                    <label for="file-upload" class="upload-button">
                        <i class="fa-solid fa-upload"></i>
                    </label>
                    <!-- Input para selecionar uma imagem ou vídeo, obrigatório -->
                    <input name="media" id="file-upload" type="file" required accept="image/*,video/*">
                </div>
            </div>
        </div>
    </form>
</div>
