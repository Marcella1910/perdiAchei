<?php
// Ativa a exibição de todos os erros do PHP para facilitar a depuração
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicia a sessão para acessar as variáveis do usuário logado
session_start();

// Inclui o arquivo de conexão com o banco de dados
include 'dbconnect.php'; // Substitua pelo caminho correto do seu arquivo de conexão

// Obtém o email do usuário logado a partir da sessão
$usuarioLogado = isset($_SESSION['email']) ? $_SESSION['email'] : null;

// Obtém o termo de busca enviado via GET (parâmetro 'q' na URL)
$query = isset($_GET['q']) ? $_GET['q'] : '';

// Verifica se o usuário está logado antes de continuar
if (!$usuarioLogado) {
    // Se não estiver logado, retorna um erro em formato JSON e encerra o script
    echo json_encode(['error' => 'Usuário não logado.']);
    exit;
}

// Verifica se o termo de busca não está vazio
if (!empty($query)) {
    // Monta a query SQL para buscar emails no banco de dados, excluindo o email do usuário logado
    $sql = "SELECT email FROM usuarios WHERE email LIKE ? AND email != ?";
    
    // Prepara a consulta para evitar SQL Injection
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Adiciona os caracteres '%' para buscar qualquer email que contenha o termo digitado
        $likeQuery = '%' . $query . '%';
        
        // Associa os parâmetros à consulta: 'ss' indica que ambos são strings
        $stmt->bind_param('ss', $likeQuery, $usuarioLogado);
        
        // Executa a consulta no banco de dados
        $stmt->execute();
        
        // Obtém os resultados da consulta
        $result = $stmt->get_result();

        // Cria um array para armazenar os emails encontrados
        $emails = [];
        while ($row = $result->fetch_assoc()) {
            $emails[] = $row['email']; // Adiciona cada email encontrado ao array
        }

        // Define o cabeçalho da resposta como JSON
        header('Content-Type: application/json');

        // Retorna os emails encontrados no formato JSON
        echo json_encode($emails);
    } else {
        // Caso ocorra um erro ao preparar a consulta, retorna um erro em formato JSON
        echo json_encode(['error' => 'Erro na consulta ao banco de dados.']);
    }
} else {
    // Se o termo de busca estiver vazio, retorna um array JSON vazio
    echo json_encode([]);
}
?>
