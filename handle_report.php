<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'envia_report.php';

session_start();


// Redefine variáveis
$postId = null;
$userEmail = null;
$username = null;
$message = null;
$recipientEmail = "perdiachei.projeto@gmail.com";
$postTitle = null;

// Verifica se o e-mail do usuário está na sessão
if (!isset($_SESSION['email']) || !isset($_SESSION['usuario'])) {
    header("Location: feed.php?error=session");
    exit;
}

$userEmail = $_SESSION['email'];
$username = $_SESSION['usuario'];

// Conexão com o banco
$conn = new mysqli('localhost', 'root', 'usbw', 'perdiachei');
if ($conn->connect_error) {
    header("Location: feed.php?error=db_connection");
    exit;
}



// Validações básicas do POST
if (!isset($_POST['postId']) || !isset($_POST['reportReason'])) {
    header("Location: feed.php?error=missing_data");
    exit;
}

// Obtém os dados do formulário
$postId = intval($_POST['postId']);
$message = trim($_POST['reportReason']); // Use trim() to remove any leading/trailing whitespace


// Verifica se a mensagem está vazia
if (empty($message)) {
    header("Location: feed.php?error=empty_message");
    exit;
}


// Consulta para buscar o nome do dono da postagem e título da postagem
$sql = "SELECT u.usuario AS dono, p.titulo AS titulo FROM posts p 
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
$dono = $row['dono'];
$postTitle = $row['titulo'];
$stmt->close();


// Envia o e-mail de denúncia
$subject = "'@$username' denuncia '@$dono' no post '$postTitle'";
try {
    $isSent = sendEmail($userEmail, $recipientEmail, $subject, $message);
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
?>
