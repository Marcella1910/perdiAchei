<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'envia_email.php';

session_start();
header('Content-Type: text/html; charset=utf-8'); // Garante que a resposta seja enviada em UTF-8

// Verifica se o e-mail do usuário está na sessão
if (!isset($_SESSION['email'])) {
    header("Location: feed.php?error=session");
    exit;
}

// Conexão com o banco
$conn = new mysqli('localhost', 'root', 'usbw', 'perdiachei');

// Definir o charset da conexão como UTF-8
$conn->set_charset("utf8");

if ($conn->connect_error) {
    header("Location: feed.php?error=db_connection");
    exit;
}

// Validações básicas do POST
if (!isset($_POST['postId']) || (!isset($_POST['contactReasonItemPerdido']) && !isset($_POST['contactReason']))) {
    header("Location: feed.php?error=missing_data");
    exit;
}

// Obtém os dados do formulário
$postId = intval($_POST['postId']);
$userEmail = $_SESSION['email'];
$message = null;

// Verifica qual campo de mensagem foi preenchido
if (isset($_POST['contactReasonItemPerdido']) && trim($_POST['contactReasonItemPerdido']) !== '') {
    $message = trim($_POST['contactReasonItemPerdido']);
} elseif (isset($_POST['contactReason']) && trim($_POST['contactReason']) !== '') {
    $message = trim($_POST['contactReason']);
} else {
    header("Location: feed.php?error=empty_message");
    exit;
}

// Converte a mensagem para UTF-8 (caso necessário)
$message = mb_convert_encoding($message, "UTF-8", "auto");

// Verifica se um arquivo foi enviado
$attachmentPath = null;
if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    
    // Garante que o diretório de uploads existe
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadFile = $uploadDir . basename($_FILES['attachment']['name']);

    // Move o arquivo enviado para o diretório de uploads
    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadFile)) {
        $attachmentPath = $uploadFile;
    }
}

// Consulta para buscar o e-mail do destinatário (dono da postagem)
$sql = "SELECT u.email FROM posts p 
        JOIN usuarios u ON p.usuario_id = u.id 
        WHERE p.id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    header("Location: feed.php?error=query_preparation");
    exit;
}

$stmt->bind_param('i', $postId);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se encontrou o destinatário
if ($result->num_rows === 0) {
    header("Location: feed.php?error=no_recipient");
    exit;
}

$row = $result->fetch_assoc();
$recipientEmail = $row['email'];
$stmt->close();

// Define o assunto do e-mail corretamente
$subject = mb_convert_encoding("PerdiAchei: Contato para devolucao de item", "UTF-8", "auto");

try {
    $isSent = sendEmail($userEmail, $recipientEmail, $subject, $message, $attachmentPath);
    
    if ($isSent) {
        header("Location: feed.php?success=email_sent");
    } else {
        header("Location: feed.php?error=email_failure");
    }
} catch (Exception $e) {
    header("Location: feed.php?error=email_exception");
}

// Fecha a conexão com o banco de dados
$conn->close();
exit;
?>
