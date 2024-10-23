<?php
include '../includes/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM VENDIDO_WEB WHERE ID='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Registro de venda deletado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: read.php");
exit;
?>
