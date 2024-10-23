<?php
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $plan_code = $_GET['plan_code'];

    $sql = "DELETE FROM projeto WHERE plan_code='$plan_code'";

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
