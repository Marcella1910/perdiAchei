<div class="modal" id="reportModal">
    <div class="modal-content">
        <h3>Reportar usuário</h3>
        <form id="reportForm">
            <label for="reportReason">Está vendo alguma coisa que não deveria?</label><br>
            <textarea id="reportReason" name="reportReason" placeholder="descreva o motivo da denúncia..."
                maxlength="280" required></textarea><br>
            <div class="bts-popup">
                <button class="cancelarReport" onclick="closeReportForm()">Cancelar</button>
                <button type="submit" class="submit-button">Enviar Denúncia</button>
            </div>

        </form>
    </div>
</div>