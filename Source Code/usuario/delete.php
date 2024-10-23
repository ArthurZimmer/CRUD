<?php
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $idusuarios = $_GET['idusuarios'];

    $sql = "DELETE FROM usuarios WHERE idusuarios='$idusuarios'";

    if ($conexao->query($sql) === TRUE) {
        echo "Registro deletado com sucesso";
    } else {
        echo "Erro: " . $conexao->error;
    }

    $conexao->close();
    header("Location: read.php"); 
    exit();
}
?>
