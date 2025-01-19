<?php
// Inicia a sessão para acessar as variáveis de sessão
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once 'dbconnect.php';

// Verifica se a requisição é do tipo POST (enviada via formulário)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário (id da postagem, título, descrição, status e categoria)
    $postId = $_POST['id'];  // ID da postagem que será atualizada
    $titulo = $_POST['titulo'];  // Novo título da postagem
    $descricao = $_POST['descricao'];  // Nova descrição da postagem
    $status = $_POST['status'];  // Novo status da postagem
    $categoria = $_POST['categoria'];  // Nova categoria da postagem
    $media = null;  // Variável para armazenar o conteúdo do arquivo de imagem (se enviado)
    $tipo_imagem = null;  // Variável para armazenar o tipo da imagem (se enviada)

    // Verificação para garantir que todos os campos obrigatórios estão preenchidos
    // Se algum campo obrigatório estiver vazio, exibe uma mensagem e encerra o processo
    if (empty($titulo) || empty($descricao) || empty($status) || empty($categoria)) {
        echo "Todos os campos são obrigatórios.";  // Mensagem de erro
        exit;  // Encerra a execução do script
    }

    // Verifica se um arquivo de imagem foi enviado no formulário
    if (isset($_FILES['media']) && $_FILES['media']['size'] > 0) {
        // Lê o conteúdo do arquivo de imagem enviado e o armazena em $media
        $media = file_get_contents($_FILES['media']['tmp_name']);
        // Obtém o tipo da imagem (ex: image/jpeg, image/png)
        $tipo_imagem = $_FILES['media']['type'];
    }

    // Se uma imagem foi enviada, o código prepara a consulta SQL para atualizar a postagem, incluindo a imagem
    if ($media) {
        // Prepara a consulta SQL para atualizar os campos da postagem com imagem
        $stmt = $conn->prepare("UPDATE posts SET titulo = ?, descricao = ?, status = ?, categoria = ?, imagem = ?, tipo_imagem = ? WHERE id = ?");
        // Bind dos parâmetros da consulta SQL
        $stmt->bind_param("ssssssi", $titulo, $descricao, $status, $categoria, $media, $tipo_imagem, $postId);
    } else {
        // Se nenhuma imagem foi enviada, a consulta SQL será preparada sem os campos relacionados à imagem
        $stmt = $conn->prepare("UPDATE posts SET titulo = ?, descricao = ?, status = ?, categoria = ? WHERE id = ?");
        // Bind dos parâmetros da consulta SQL
        $stmt->bind_param("ssssi", $titulo, $descricao, $status, $categoria, $postId);
    }

    // Executa a consulta SQL preparada
    if ($stmt->execute()) {
        // Se a execução for bem-sucedida, redireciona o usuário para a página de postagens
        header("Location: postagens.php?status=sucesso");
    } else {
        // Se ocorrer algum erro ao executar a consulta, exibe o erro
        echo "Erro ao atualizar postagem: " . $conn->error;
    }

    // Fecha a declaração preparada
    $stmt->close();
    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    // Caso o método não seja POST, exibe uma mensagem de erro
    echo "Método inválido.";  // Exibe que o método usado não é permitido
}
?>