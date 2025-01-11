<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($fromEmail, $toEmail, $subject, $messageBody) {
    $mail = new PHPMailer(true);

    try {
        echo "Debug: Início da função sendEmail<br>";

        // Configuração do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'perdiachei.projeto@gmail.com'; // Substitua pelo seu e-mail
        $mail->Password = 'ggylgzrgepjyngwo';   // Substitua pela senha de aplicativo do Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        echo "Debug: Configuração do servidor SMTP concluída.<br>";

        // Configurações do remetente e destinatário
        $mail->setFrom($fromEmail, 'PerdiAchei'); // Remetente
        $mail->addAddress($toEmail);             // Destinatário
        echo "Debug: Configurações do remetente e destinatário definidas.<br>";

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $messageBody;
        echo "Debug: Conteúdo do e-mail definido. Assunto: $subject, Mensagem: $messageBody<br>";

        // Envia o e-mail
        $mail->send();
        echo "Debug: E-mail enviado.<br>";
        return true;
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: " . $mail->ErrorInfo . "<br>";
        throw new Exception("Erro ao enviar mensagem: " . $mail->ErrorInfo);
    }
}
?>
