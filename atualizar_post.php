<?php
// Inicia a sessão para acessar variáveis globais do usuário autenticado
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once 'dbconnect.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['id'])) {
    // Se não estiver autenticado, encerra o script e exibe um erro
    die("Erro: usuário não autenticado.");
}

// Captura os dados enviados pelo formulário via método POST
$postId = $_POST['post_id'];     // ID do post que será atualizado
$titulo = $_POST['title'];       // Novo título do post
$descricao = $_POST['descricao']; // Nova descrição do post
$categoria = $_POST['categoria']; // Nova categoria do post
$status = $_POST['status'];      // Novo status do post
$manterMidia = $_POST['mantenha_midia'] === 'true'; // Verifica se o usuário quer manter a mídia atual

// Inicializa as variáveis para armazenar mídia e o tipo de imagem
$media = null;
$tipo_imagem = null;

// Verifica se o usuário enviou um novo arquivo de mídia
if (isset($_FILES['media']) && $_FILES['media']['size'] > 0) {
    // Se um novo arquivo de mídia foi enviado, obtém seu conteúdo
    $media = file_get_contents($_FILES['media']['tmp_name']); // Obtém os dados do arquivo
    $tipo_imagem = $_FILES['media']['type']; // Obtém o tipo do arquivo (ex: image/jpeg)
} elseif ($manterMidia) {
    // Se o usuário optou por manter a mídia e não enviou uma nova, recuperamos a mídia atual do banco
    $query = $conn->prepare("SELECT imagem, tipo_imagem FROM posts WHERE id = ? AND usuario_id = ?");
    $query->bind_param("ii", $postId, $_SESSION['id']);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Se encontrou a mídia no banco, armazena os valores
        $row = $result->fetch_assoc();
        $media = $row['imagem'];
        $tipo_imagem = $row['tipo_imagem'];
    }
    $query->close();
}

// Prepara a query para atualizar os dados do post no banco de dados
$sql = $conn->prepare("
    UPDATE posts
    SET titulo = ?, descricao = ?, categoria = ?, status = ?, imagem = ?, tipo_imagem = ?
    WHERE id = ? AND usuario_id = ?
");

// Faz a vinculação dos parâmetros para evitar SQL Injection
$sql->bind_param("ssssssii", $titulo, $descricao, $categoria, $status, $media, $tipo_imagem, $postId, $_SESSION['id']);

// Executa a query e verifica se a atualização foi bem-sucedida
if ($sql->execute()) {
    echo "Postagem atualizada com sucesso!";
} else {
    echo "Erro ao atualizar postagem: " . $conn->error;
}

// Fecha a consulta e a conexão com o banco de dados
$sql->close();
$conn->close();
?>