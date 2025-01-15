<!--PopUp de contato com o usuário que entregou o item-->
<div class="modal" id="formModalMarcarComoReivindicado">
    <div class="modal-content">
        <h3 class="formModalMarcarComoReivindicadoTitulo">Defina o dono</h3>
        <form id="formMarcarComoReivindicado" action="marcarComoReividicado.php" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="postId" value="" />

            <div class="input-container">
                <label for="emailReclamante" rows="1" cols="30">Marque o email de usuário da pessoa para quem você
                    entregou o item. Esta informação será registrada para garantir a segurança do
                    site.</label>
                <textarea type="email" id="emailReclamante" name="emailReclamante" placeholder="Digite um email..." spellcheck="false"
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