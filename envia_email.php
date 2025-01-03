<?php
// Inclua o arquivo do PHPMailer manualmente (ajuste o caminho conforme a pasta onde você colocou os arquivos)
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

// Função para enviar o e-mail
function sendEmail($toEmail, $fromEmail, $subject, $message, $attachment = null) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Configuração do servidor de e-mail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'projetoperdiachei@gmail.com';  // Seu e-mail
        $mail->Password = 'projetoPerdiachei1504';  // Senha do aplicativo do Gmail
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom($fromEmail, 'PerdiAchei');
        $mail->addAddress($toEmail);

        // Assunto e corpo do e-mail
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Envio do arquivo anexo, se fornecido
        if ($attachment) {
            $mail->addAttachment($attachment);
        }

        // Envia o e-mail
        $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (PHPMailer\PHPMailer\Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }
}
?>
