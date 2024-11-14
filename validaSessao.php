<?php
// Verifique se a sessão já foi iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    
}

// Verifica se o email e senha estão na sessão para validar
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    header('location: login.php');
    exit();
}
?>
