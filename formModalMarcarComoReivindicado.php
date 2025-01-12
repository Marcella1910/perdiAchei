<!--PopUp de contato com o usuário que entregou o item-->
<div class="modal" id="formModalMarcarComoReivindicado">
    <div class="modal-content">
        <h3 class="formModalMarcarComoReivindicadoTitulo">Defina o dono</h3>
        <form id="formMarcarComoReivindicado" action="marcarComoReividicado.php" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="postId" value="" />

            <div class="input-container">
                <label for="textarea" rows="1" cols="30">Marque o nome de usuário da pessoa para quem você
                    entregou o item. Esta informação será registrada para garantir a segurança do
                    site.</label>
                <textarea id="textarea" placeholder="Digite @ para marcar alguém..." spellcheck="false"
                    required></textarea>
                <div id="suggestions" class="suggestions"></div>
            </div>

            <div class="bts-popup">
                <button type="button" class="cancel-button"
                    onclick="closeFormModalMarcarComoReivindicado()">Cancelar</button>
                <button type="submit" class="submit-button">Marcar como reivindicado</button>
            </div>

        </form>
    </div>
</div>