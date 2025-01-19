<!-- PopUp de contato para devolver um item perdido -->
<div class="modal" id="formModalItemPerdido">
    <div class="modal-content">
        <!-- Título do modal -->
        <h3 class="formModalItemPerdidoTitulo">Devolver um item</h3>

        <!-- Texto explicativo para o usuário -->
        <p class="formModalItemPerdidoSubtitulo">
            Envie uma mensagem ao proprietário da postagem com uma foto do item para que ele possa identificá-lo.
            Escolha um horário e um local dentro do Campus para a devolução.
            Todas as informações fornecidas serão enviadas por e-mail ao proprietário, e seu endereço de e-mail
            cadastrado será compartilhado para que ele possa confirmar a troca.
            Fique atento à sua caixa de entrada para acompanhar a comunicação.
        </p>

        <!-- Formulário para envio da mensagem e foto do item -->
        <form id="contactFormItemPerdido" action="handle_contact.php" method="post" enctype="multipart/form-data">
            <!-- Campo oculto para armazenar o ID da postagem -->
            <input type="hidden" name="postId" value="" />
            <!-- Campo oculto para armazenar o ID do dono da postagem -->
            <input type="hidden" name="postOwnerId" value="" />

            <!-- Campo de texto onde o usuário descreve como deseja devolver o item -->
            <textarea id="contactReasonItemPerdido" name="contactReasonItemPerdido"
                placeholder="Como deseja devolver este item?" required></textarea><br>

            <!-- Instrução para adicionar uma foto -->
            <p>Você pode adicionar uma foto do item para mostrar ao proprietário que ele está com você.</p>

            <!-- Container para upload da foto -->
            <div class="container-upload-foto">
                <!-- Input de arquivo para permitir o upload de imagem -->
                <input type="file" id="input-upload-foto-item-perdido" name="attachment" accept="image/*"
                    onchange="exibirFotoItemPerdido(event)" />

                <!-- Botão estilizado para selecionar uma foto -->
                <label for="input-upload-foto-item-perdido" class="botao-upload-foto-item-perdido">
                    Enviar foto
                </label>

                <!-- Área de pré-visualização da imagem selecionada -->
                <div class="container-preview-foto-item-perdido" id="container-preview-foto-item-perdido">
                    <img id="preview-foto-item-perdido" src="#" alt="Pré-visualização" style="display:none;" />

                    <!-- Botão para remover a foto caso o usuário mude de ideia -->
                    <button id="botao-remover-foto-item-perdido" class="botao-remover-foto-item-perdido"
                        style="display:none;" onclick="excluirFotoItemPerdido()">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <!-- Botões para cancelar ou enviar o formulário -->
            <div class="bts-popup">
                <button type="button" class="cancel-button" onclick="closeFormPopupItemPerdido()">Cancelar</button>
                <button type="submit" class="submit-button">Enviar</button>
            </div>

        </form>
    </div>
</div>