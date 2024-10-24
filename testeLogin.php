<?php
    //preenchimento dos dados
    if(isset($_POST['submit']) && 
    !empty($_POST['user']) &&
    !empty($_POST['email']) && 
    !empty($_POST['senha'])) {
        
        include_once('config.php');
        $user = $_POST['user'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE user = '$user' 
        and email = '$email'
        and senha = '$senha'";

        $resultado = $conexao->query($sql);

        if(mysqli_num_rows($resultado) < 1) {
            header('Location: login.php')
            echo('Não cadastrado')
        }
        else {
            header('Location: feed.php')
        }
    }

    else {
        header('Location: login.php');
        echo('Preencha os campos')
    }

?>