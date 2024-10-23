<?php
include '../conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM funcionario WHERE emp_code='$id'";

if ($conexao->query($sql) === TRUE) {
    echo "Registro deletado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conexao->error;
}

$conexao->close();

header("Location: read.php");
exit;
?>
