<?php
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $job_code = $_GET['job_code'];

    $sql = "DELETE FROM trabalho WHERE job_code='$job_code'";

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
