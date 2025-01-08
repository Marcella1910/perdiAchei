<!-- PopUp de quando o usuário quer reinvidicar um item -->
<div class="modal" id="formModal">
    <div class="modal-content">
        <h3>Reivindicar um item</h3>
        <h4>Indique porque é que este item é seu</h4>
        <p>Descreva o item o mais detalhadamente possível, especialmente o que não é visível ou que não foi
            descrito. Desta forma, o responsável pelo artigo encontrado pode ter a certeza de que se trata
            do próprio proprietário. E, se possível, forneça o máximo de informação possível sobre o local
            em que perdeu o artigo (p. ex. número da sala/data ou horário que perdeu). Tenha cuidado ao
            partilhar dados pessoais.</p>
        <form id="contactForm" action="handle_contact.php" method="post" enctype="multipart/form-data"> 
                <input type="hidden" name="postId" value="" />

            <textarea id="contactReason" name="contactReason"
                placeholder="descreva o motivo de reivindicar este item..." required></textarea><br>
            <p>Você pode adicionar uma imagem que mostre ao dono. Por exemplo, uma foto do item ou um
                comprovante de compra.</p>
            <div class="container-upload-foto">
                <input type="file" id="input-upload-foto" name="attachment" accept="image/*" onchange="visualizarFoto(event)" />
                <label for="input-upload-foto" class="botao-upload-foto">
                    enviar foto
                </label>
                <div class="container-preview-foto" id="container-preview-foto">
                    <img id="preview-foto" src="#" alt="Pré-visualização" style="display:none;" />
                    <button id="botao-remover-foto" class="botao-remover-foto" style="display:none;"
                        onclick="removerFoto()"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div class="bts-popup">
                <button type="button" class="cancel-button" onclick="closeFormPopup()">Cancelar</button>
                <button type="submit" class="submit-button">Enviar</button>
            </div>

        </form>
    </div>
</div>
