<?php
// Inicia a sessão para armazenar informações do usuário
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once 'dbconnect.php';

// Define o fuso horário para garantir que os horários armazenados estejam corretos
date_default_timezone_set('America/Sao_Paulo'); // Modifique conforme necessário

// Verifica se o usuário está logado antes de permitir a criação da postagem
if (!isset($_SESSION['id'])) {
    die("Erro: usuário não autenticado."); // Interrompe a execução caso o usuário não esteja logado
}

// Obtém os valores do formulário enviado via POST
$titulo = $_POST['titulo'];       // Título da postagem
$descricao = $_POST['descricao']; // Descrição da postagem
$categoria = $_POST['categoria']; // Categoria escolhida pelo usuário
$status = $_POST['status'];       // Define se o item está "perdido" ou "encontrado"
$media = null;                    // Inicializa a variável para armazenar a mídia (imagem ou vídeo)
$tipo_imagem = null;               // Inicializa a variável para armazenar o tipo de mídia
$usuario_id = $_SESSION['id'];     // Obtém o ID do usuário logado a partir da sessão

// Verifica se um arquivo foi enviado no formulário
if (isset($_FILES['media']) && $_FILES['media']['size'] > 0) {
    $media = file_get_contents($_FILES['media']['tmp_name']); // Obtém o conteúdo do arquivo enviado
    $tipo_imagem = $_FILES['media']['type'];                 // Obtém o tipo do arquivo (ex: image/png, video/mp4)
}

// Prepara a consulta SQL para inserir os dados no banco de dados
$sql = $conn->prepare("
    INSERT INTO posts (titulo, descricao, categoria, status, imagem, tipo_imagem, usuario_id) 
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

// Associa os parâmetros à consulta
$sql->bind_param("ssssssi", $titulo, $descricao, $categoria, $status, $media, $tipo_imagem, $usuario_id);

// Executa a inserção no banco de dados
if ($sql->execute()) {
    echo "Postagem criada com sucesso!";
} else {
    echo "Erro ao criar postagem: " . $conn->error; // Exibe mensagem de erro caso a inserção falhe
}

// Fecha a consulta e a conexão com o banco de dados
$sql->close();
$conn->close();

// Redireciona o usuário para a página principal (feed)
header("Location: feed.php");
exit();
?>
