<?php
// Inicia a sessão para manter a autenticação do usuário
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once 'dbconnect.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['id'])) {
    die("Erro: usuário não autenticado."); // Interrompe o script se o usuário não estiver logado
}

// Captura os dados enviados pelo formulário
$postId = $_POST['id'];        // ID da postagem a ser editada
$titulo = $_POST['titulo'];    // Novo título da postagem
$descricao = $_POST['descricao']; // Nova descrição
$categoria = $_POST['categoria']; // Nova categoria da postagem
$status = $_POST['status'];    // Novo status (perdido/encontrado)
$media = null;                 // Inicializa a variável para armazenar a mídia (caso exista)
$tipo_imagem = null;           // Tipo do arquivo de mídia (imagem/vídeo)

// Verifica se um novo arquivo foi enviado pelo usuário
if (isset($_FILES['media']) && $_FILES['media']['size'] > 0) {
    $media = file_get_contents($_FILES['media']['tmp_name']); // Lê o conteúdo do arquivo
    $tipo_imagem = $_FILES['media']['type']; // Captura o tipo MIME do arquivo enviado
}

// Atualiza os dados no banco de dados
if ($media) {
    // Se o usuário enviou uma nova mídia, a query deve incluir o campo de imagem e tipo de mídia
    $sql = $conn->prepare("
        UPDATE posts 
        SET titulo = ?, descricao = ?, categoria = ?, status = ?, imagem = ?, tipo_imagem = ?
        WHERE id = ? AND usuario_id = ?
    ");
    // Associa os valores aos placeholders na query
    $sql->bind_param("sssssbii", $titulo, $descricao, $categoria, $status, $media, $tipo_imagem, $postId, $_SESSION['id']);
} else {
    // Caso o usuário não tenha enviado uma nova mídia, a query não altera os campos de imagem
    $sql = $conn->prepare("
        UPDATE posts 
        SET titulo = ?, descricao = ?, categoria = ?, status = ?
        WHERE id = ? AND usuario_id = ?
    ");
    // Associa os valores sem incluir a imagem
    $sql->bind_param("ssssii", $titulo, $descricao, $categoria, $status, $postId, $_SESSION['id']);
}

// Executa a query e verifica se a edição foi bem-sucedida
if ($sql->execute()) {
    echo "Postagem editada com sucesso!";
} else {
    echo "Erro ao editar postagem: " . $conn->error;
}

// Fecha a consulta e a conexão com o banco de dados
$sql->close();
$conn->close();

// Redireciona o usuário de volta para a página do feed após a edição
header("Location: feed.php");
exit();
?>