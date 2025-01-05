<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($fromEmail, $toEmail, $subject, $messageBody, $attachmentPath = null) {
    $mail = new PHPMailer(true);

    try {
        // Configuração do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'perdiachei.projeto@gmail.com'; // Substitua pelo seu e-mail
        $mail->Password = 'ggylgzrgepjyngwo';   // Substitua pela senha de aplicativo do Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configurações do remetente e destinatário
        $mail->setFrom($fromEmail, 'PerdiAchei'); // Remetente
        $mail->addAddress($toEmail);             // Destinatário

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $messageBody;

        // Adiciona anexo, se fornecido
        if ($attachmentPath && file_exists($attachmentPath)) {
            $mail->addAttachment($attachmentPath);
        }

        // Envia o e-mail
        $mail->send();
        echo "Debug: E-mail enviado para $toEmail<br>"; // Mensagem de depuração
        return true;
    } catch (Exception $e) {
        echo "Debug: Erro ao enviar mensagem: " . $mail->ErrorInfo . "<br>"; // Mensagem de depuração
        throw new Exception("Erro ao enviar mensagem: " . $mail->ErrorInfo);
    }

    
}
?>
