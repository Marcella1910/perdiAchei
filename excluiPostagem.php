<?php
// Inicia a sessão para acessar os dados do usuário logado
session_start();

// Depuração: exibe os dados enviados via POST
var_dump($_POST);

// Inclui o arquivo de conexão com o banco de dados
include_once 'dbconnect.php';

// Verifica se o ID da postagem foi enviado pelo formulário
if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("Erro: ID da postagem não fornecido."); // Encerra o script se o ID não foi enviado
}

// Obtém o ID da postagem e o ID do usuário logado
$postId = $_POST['id'];
$usuarioId = $_SESSION['id']; // ID do usuário logado

// Consulta para verificar se a postagem pertence ao usuário logado
$checkSql = $conn->prepare("SELECT * FROM posts WHERE id = ? AND usuario_id = ?");
$checkSql->bind_param("ii", $postId, $usuarioId);
$checkSql->execute();
$result = $checkSql->get_result();

// Verifica se a postagem existe e pertence ao usuário
if ($result->num_rows === 0) {
    die("Erro: Postagem não encontrada ou você não tem permissão para excluí-la.");
}

// Se a verificação passou, prossegue com a exclusão da postagem
$deleteSql = $conn->prepare("DELETE FROM posts WHERE id = ?");
$deleteSql->bind_param("i", $postId);

// Executa a exclusão e verifica se foi bem-sucedida
if ($deleteSql->execute()) {
    echo "Postagem excluída com sucesso!";
} else {
    echo "Erro ao excluir a postagem: " . $conn->error;
}

// Fecha as consultas e a conexão com o banco de dados
$deleteSql->close();
$conn->close();

// Redireciona o usuário de volta para a página do feed
header("Location: feed.php");
exit();
?>
