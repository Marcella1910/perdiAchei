<?php
    if(!empty($_GET['id'])) {
        include_once 'dbconnect.php';
        $id = $_GET['id'];

        $bancoSelect = "SELECT * FROM usuarios WHERE id=$id";

        $result = $conn->query($bancoSelect);

        if($result->num_rows > 0) {
            $sqlDelete = "DELETE FROM usuario WHERE id=$id";
            $resultDel = $conn->query(sqlDelete);
        }
    }

    header('Location: login.php');
?>