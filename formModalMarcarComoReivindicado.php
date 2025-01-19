<!-- PopUp para marcar um item como reivindicado -->
<div class="modal" id="formModalMarcarComoReivindicado">
    <div class="modal-content">
        <!-- Título do modal -->
        <h3 class="formModalMarcarComoReivindicadoTitulo">Defina o dono</h3>

        <!-- Formulário para registrar a entrega do item -->
        <form id="formMarcarComoReivindicado" action="marcarComoReivindicado.php" method="post" enctype="multipart/form-data"> 
            <!-- Campo oculto para armazenar o ID da postagem -->
            <input type="hidden" name="postId" value="" />

            <!-- Campo de entrada para o email do reclamante -->
            <div class="input-container">
                <label for="emailReclamante">
                    Marque o email do usuário para quem você entregou o item. Esta informação será registrada para garantir a segurança do site.
                </label>
                
                <!-- Campo de entrada do email com sugestões -->
                <textarea type="email" id="emailReclamante" name="emailReclamante" 
                    placeholder="Digite um email..." spellcheck="false" required></textarea>

                <!-- Área onde sugestões de email aparecerão -->
                <div id="suggestions" class="suggestions"></div>
            </div>

            <!-- Botões de ação -->
            <div class="bts-popup">
                <!-- Botão para cancelar a ação e fechar o modal -->
                <button type="button" class="cancel-button" onclick="closeFormModalMarcarComoReivindicado()">Cancelar</button>

                <!-- Botão para confirmar a ação e enviar o formulário -->
                <button type="submit" class="submit-button">Marcar como reivindicado</button>
            </div>
        </form>
    </div>
</div>
