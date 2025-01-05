<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'envia_email.php'; // Certifique-se de que este arquivo existe e está correto.

session_start();

// Mensagem de depuração para verificar o estado da sessão
echo "Debug: Sessão iniciada. E-mail do usuário na sessão: " . (isset($_SESSION['email']) ? $_SESSION['email'] : 'não definido') . "<br>";

// Redefine variáveis
$postId = null;
$userEmail = null;
$message = null;
$recipientEmail = null;
$attachmentPath = null;

// Teste inicial para depuração
if (!isset($_SESSION['email'])) {
    die("Erro: Sessão não iniciada ou e-mail do usuário não definido.");
}

// Conexão com o banco
$conn = new mysqli('localhost', 'root', 'usbw', 'perdiachei');
if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

// Validações básicas do POST
if (!isset($_POST['postId']) || !isset($_POST['contactReasonItemPerdido'])) {
    die("Erro: Dados do formulário estão faltando.");
}

// Obtém os dados do formulário
$postId = intval($_POST['postId']);
$userEmail = $_SESSION['email'];
$message = $_POST['contactReasonItemPerdido'];

// Verifica se um arquivo foi enviado
if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['attachment']['name']);

    // Move o arquivo enviado para o diretório de uploads
    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadFile)) {
        $attachmentPath = $uploadFile;
        echo "Debug: Arquivo anexado: $attachmentPath<br>";
    } else {
        echo "Erro: Falha ao mover o arquivo enviado.";
    }
}

// Mensagens de depuração para verificar os dados obtidos
echo "Debug: Valor de postId recebido do formulário = " . (isset($_POST['postId']) ? $_POST['postId'] : 'não definido') . "<br>";
echo "Debug: postId após conversão para inteiro = $postId<br>";
echo "Debug: userEmail = $userEmail<br>";
echo "Debug: message = $message<br>";

// Verifica se os dados são válidos
if (empty($postId) || empty($message)) {
    die("Erro: Dados insuficientes fornecidos.");
}

// Consulta para buscar o e-mail do destinatário (dono da postagem)
$sql = "SELECT u.email FROM posts p 
        JOIN usuarios u ON p.usuario_id = u.id 
        WHERE p.id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Erro ao preparar a consulta: " . $conn->error);
}
$stmt->bind_param('i', $postId);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se encontrou o destinatário
if ($result->num_rows === 0) {
    die("Erro: Não foi possível encontrar o destinatário para este post.");
}

$row = $result->fetch_assoc();
$recipientEmail = $row['email'];
echo "Debug: E-mail do destinatário obtido: $recipientEmail<br>"; // Mensagem de depuração
$stmt->close();

// Envia o e-mail para o dono da postagem
$subject = "PerdiAchei: Contato para devolucao de item";
try {
    echo "Debug: Tentando enviar e-mail para $recipientEmail<br>"; // Mensagem de depuração
    $isSent = sendEmail($userEmail, $recipientEmail, $subject, $message, $attachmentPath);
    if ($isSent) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar mensagem.";
    }
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: " . $e->getMessage();
}

// Redefine as variáveis após o envio do e-mail
$postId = null;
$userEmail = null;
$message = null;
$recipientEmail = null;
$attachmentPath = null;

$conn->close();
?>
