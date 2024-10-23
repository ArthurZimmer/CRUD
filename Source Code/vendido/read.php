<?php
include '../includes/db.php';

$sql = "SELECT * FROM VENDIDO_WEB";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Vendas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Vendas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Código do Produto</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['ID']}</td>
                    <td>{$row['PRODUTO_CODIGO']}</td>
                    <td>{$row['QUANTIDADE']}</td>
                    <td>
                        <a href='update.php?id={$row['ID']}'>Editar</a>
                        <a href='delete.php?id={$row['ID']}'>Deletar</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum registro encontrado</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <a href="../index.php" class="back-button">Voltar</a>
</body>
</html>
