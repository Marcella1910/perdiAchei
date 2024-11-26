<!--PopUp de quando o usuario encontra o seu item perdido-->
<div class="modal" id="confirmModalMarcarComoEncontrado">
    <div class="modal-content">
        <h3 class="confirmModalMarcarComoEncontradoTitulo">Marcar como encontrado</h3>
        <p class="confirmModalMarcarComoEncontradoSubtitulo">Encontrou este objeto? Marcar como "encontrado"
            desativará a publicação, tornando-a invisível para outros usuários.</p>
        <form id="formMarcarComoEncontrado">
            <div class="bts-popup">
                <button type="button" class="cancel-button"
                    onclick="closeConfirmModalMarcarComoEncontrado()">Cancelar</button>
                <button type="submit" class="submit-button">Marcar como encontrado</button>
            </div>
        </form>
    </div>
</div>