<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'envia_email.php';

session_start();

// Redefine variáveis
$postId = null;
$userEmail = null;
$message = null;
$recipientEmail = null;
$attachmentPath = null;

// Verifica se o e-mail do usuário está na sessão
if (!isset($_SESSION['email'])) {
    header("Location: feed.php?error=session");
    exit;
}

// Conexão com o banco
$conn = new mysqli('localhost', 'root', 'usbw', 'perdiachei');
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

// Prioriza o campo preenchido, seja `contactReasonItemPerdido` ou `contactReason`
if (isset($_POST['contactReasonItemPerdido']) && !empty(trim($_POST['contactReasonItemPerdido']))) {
    $message = $_POST['contactReasonItemPerdido'];
} elseif (isset($_POST['contactReason']) && !empty(trim($_POST['contactReason']))) {
    $message = $_POST['contactReason'];
} else {
    header("Location: feed.php?error=empty_message");
    exit;
}

// Verifica se um arquivo foi enviado
if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    // Certifique-se de que o diretório de uploads existe
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

// Envia o e-mail para o dono da postagem
$subject = "PerdiAchei: Contato para devolução de item";
try {
    $isSent = sendEmail($userEmail, $recipientEmail, $subject, $message, $attachmentPath);
    if ($isSent) {
        header("Location: feed.php?success=email_sent");
        exit;
    } else {
        header("Location: feed.php?error=email_failure");
        exit;
    }
} catch (Exception $e) {
    header("Location: feed.php?error=email_exception");
    exit;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
