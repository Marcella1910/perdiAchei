<!-- PopUp de quando o usuário quer reivindicar um item -->
<div class="modal" id="formModal">
    <div class="modal-content">
        <!-- Título do modal -->
        <h3>Reivindicar um item</h3>
        <h4>Indique porque é que este item é seu</h4>

        <!-- Instruções para o usuário sobre como descrever o item de forma detalhada -->
        <p>Descreva o item o mais detalhadamente possível, especialmente o que não é visível ou que não foi
            descrito. Desta forma, o responsável pelo artigo encontrado pode ter a certeza de que se trata
            do próprio proprietário. E, se possível, forneça o máximo de informação possível sobre o local
            em que perdeu o artigo (p. ex. número da sala/data ou horário que perdeu). Tenha cuidado ao
            partilhar dados pessoais.</p>

        <!-- Formulário para reivindicar um item -->
        <form id="contactForm" action="handle_contact.php" method="post" enctype="multipart/form-data">
            <!-- Campo oculto para armazenar o ID do post que está sendo reivindicado -->
            <input type="hidden" name="postId" value="" />
            

            <!-- Campo de texto para que o usuário descreva o motivo da reivindicação -->
            <textarea id="contactReason" name="contactReason"
                placeholder="Descreva o motivo de reivindicar este item..." required></textarea><br>

            <!-- Instruções sobre o envio de uma imagem como evidência -->
            <p>Você pode adicionar uma imagem que mostre ao dono. Por exemplo, uma foto do item ou um
                comprovante de compra.</p>

            <!-- Container para upload da foto -->
            <div class="container-upload-foto">
                <!-- Input para upload da foto -->
                <input type="file" id="input-upload-foto" name="attachment" accept="image/*"
                    onchange="visualizarFoto(event)" />

                <!-- Botão estilizado para o usuário clicar e selecionar uma foto -->
                <label for="input-upload-foto" class="botao-upload-foto">
                    Enviar foto
                </label>

                <!-- Pré-visualização da foto enviada -->
                <div class="container-preview-foto" id="container-preview-foto">
                    <img id="preview-foto" src="#" alt="Pré-visualização" style="display:none;" />

                    <!-- Botão para remover a foto selecionada -->
                    <button id="botao-remover-foto" class="botao-remover-foto" style="display:none;"
                        onclick="removerFoto()"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <!-- Botões do formulário: cancelar e enviar -->
            <div class="bts-popup">
                <button type="button" class="cancel-button" onclick="closeFormPopup()">Cancelar</button>
                <button type="submit" class="submit-button">Enviar</button>
            </div>

        </form>
    </div>
</div>

<!-- Script JavaScript para exibir um log no console quando o formulário é enviado -->
<script>
    document.getElementById('contactForm').addEventListener('submit', function (event) {
        console.log('Formulário foi submetido!');
    }); 
</script>