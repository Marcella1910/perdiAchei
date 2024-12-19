<!-- PopUp de exclusão de publicação -->
<div id="deletePostModal" class="modal">
    <div class="modal-content">
        <form id="excluirPostagemForm" method="POST" action="excluiPostagem.php" onsubmit="return handleDeletePost(event)">
            <input type = "hidden" name = "id" id = "postIdToDelete">
            <h2 class="excluirFormTitulo">
                Tem certeza que deseja excluir essa publicação?
            </h2>
            <h4 class="excluirFormSubtitulo">Essa ação é permanente e não poderá ser desfeita.</h4>
            <div class="bts-popup">
                <button type="button" class="cancel-button" onclick="closeDeletePost()">Cancelar</button>
                <button type="submit" class="submit-button">Ok</button>
            </div>
            <!-- Campo oculto para enviar o ID da postagem -->
            <input type="hidden" name="id" id="postIdToDelete">
        </form>
    </div>
</div>