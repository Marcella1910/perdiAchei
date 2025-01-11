<!-- PopUp de reportar usuário -->
<div class="modal" id="reportModal">
    <div class="modal-content">
        <h3>Reportar usuário</h3>
        <form id="reportForm" action="handle_report.php" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="postId" value="" />

            <label for="reportReason">Está vendo alguma coisa que não deveria?</label><br>
            <textarea id="reportReason" name= "reportReason" placeholder="descreva o motivo da denúncia..." required></textarea><br>
            <div class="bts-popup">
                <button class="cancelarReport" onclick="closeReportForm()">Cancelar</button>
                <button type="submit" class="submit-button">Enviar Denúncia</button>
            </div>

        </form>
    </div>
</div>