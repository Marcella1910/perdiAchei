<!--PopUp de contato com o usuário do item perdido-->
<div class="modal" id="formModalItemPerdido">
    <div class="modal-content">
        <h3 class="formModalItemPerdidoTitulo">Devolver um item</h3>
        <p class="formModalItemPerdidoSubtitulo">Envie uma mensagem ao proprietário da postagem com uma foto
            do item para que ele possa identificá-lo. Escolha um horário e um local dentro Campus para a
            devolução. Todas as informações fornecidas serão enviadas por e-mail ao proprietário, e seu
            endereço de e-mail cadastrado será compartilhado para que ele possa confirmar a troca. Fique
            atento à sua caixa de entrada para acompanhar a comunicação.</p>
        <form id="contactFormItemPerdido">

            <textarea id="contactReasonItemPerdido" name="contactReasonItemPerdido"
                placeholder="como deseja devolver este item?" required></textarea><br>
            <p>Você pode adicionar uma foto do item para mostrar ao proprietário que ele está com você. </p>
            <div class="container-upload-foto">
                <input type="file" id="input-upload-foto-item-perdido" accept="image/*"
                    onchange="exibirFotoItemPerdido(event)" />
                <label for="input-upload-foto-item-perdido" class="botao-upload-foto-item-perdido">
                    enviar foto
                </label>
                <div class="container-preview-foto-item-perdido" id="container-preview-foto-item-perdido">
                    <img id="preview-foto-item-perdido" src="#" alt="Pré-visualização" style="display:none;" />
                    <button id="botao-remover-foto-item-perdido" class="botao-remover-foto-item-perdido"
                        style="display:none;" onclick="excluirFotoItemPerdido()"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div class="bts-popup">
                <button type="button" class="cancel-button" onclick="closeFormPopupItemPerdido()">Cancelar</button>
                <button type="submit" class="submit-button">Enviar</button>
            </div>

        </form>
    </div>
</div>