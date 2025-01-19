<?php
// Inicia a sessão para acessar as variáveis globais
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once 'dbconnect.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['id'])) {
    // Se não estiver autenticado, retorna um JSON com erro e encerra o script
    die(json_encode(["error" => "Usuário não autenticado."]));
}

// Obtém o ID da postagem da URL via GET
$postId = $_GET['id'];

// Prepara uma consulta SQL para buscar a postagem do usuário autenticado
$sql = $conn->prepare("
    SELECT id, titulo, descricao, categoria, status, imagem, tipo_imagem 
    FROM posts 
    WHERE id = ? AND usuario_id = ?
");

// Substitui os placeholders (?) pelos valores reais, garantindo segurança contra SQL Injection
$sql->bind_param("ii", $postId, $_SESSION['id']);

// Executa a consulta
$sql->execute();

// Obtém o resultado da consulta
$result = $sql->get_result();

// Verifica se a postagem existe
if ($result->num_rows > 0) {
    // Transforma o resultado em um array associativo
    $post = $result->fetch_assoc();
    
    // Se houver uma imagem armazenada, converte-a para Base64 para ser enviada no JSON
    if (!empty($post['imagem'])) {
        $post['imagem'] = base64_encode($post['imagem']);
    }
    
    // Retorna os dados da postagem no formato JSON
    echo json_encode($post);
} else {
    // Se a postagem não for encontrada, retorna um erro em JSON
    echo json_encode(["error" => "Postagem não encontrada."]);
}

// Fecha a consulta preparada
$sql->close();

// Fecha a conexão com o banco de dados
$conn->close();
?>
