<?php

include_once 'dbconnect.php';

// Busca todas as categorias na tabela 'categorias'
$result = $conn->query("SELECT id, nome FROM categorias");
?>

<!-- Create Post Section -->
<div class="create-post">
    <form action="criar_post.php" method="POST" enctype="multipart/form-data">
        <textarea name="titulo" maxlength="80" rows="1" cols="30" class="titulopost"
            placeholder="dê um título a postagem..."></textarea>
        <textarea name="descricao" class="descricaopost" maxlength="280" rows="5" cols="30"
            placeholder="perdeu ou achou algo?"></textarea>
        <div id="preview-container" class="preview-container" style="display: none;">
            <button id="cancel-button" style="margin-top: 10px;">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <img id="preview-image" class="preview-image" alt="Pré-visualização da Imagem" style="display: none;">
            <video id="preview-video" class="preview-video" controls style="display: none;"></video>
        </div>

        <div class="botoes">
            <button type="submit" class="createPostBtn" id="createPostBtn">criar publicação</button>
            <div class="botoes-ladodir">
                

                <!-- Select dinâmico para categorias -->
                <select name="categoria_id" class="select-tags" id="select-tags">
                    <option value="" disabled selected>Escolha uma categoria</option>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <option value="<?php echo $row['id']; ?>">
                            <?php echo htmlspecialchars($row['nome']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <!-- Toggle status para objeto perdido/encontrado -->
                <div class="toggle-buttons">
                    <input type="radio" id="perdido" name="status" value="perdido">
                    <label for="perdido" class="toggle-button">objeto perdido</label>

                    <input type="radio" id="encontrado" name="status" value="encontrado">
                    <label for="encontrado" class="toggle-button">objeto encontrado</label>
                </div>

                <!-- Upload de mídia -->
                <div class="upload-container">
                    <label for="file-upload" class="upload-button">
                        <i class="fa-solid fa-upload"></i>
                    </label>
                    <input name="media" id="file-upload" type="file" required accept="image/*,video/*">
                </div>
            </div>
        </div>
    </form>
</div>