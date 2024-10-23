<?php
include '../conexao.php';

$sql = "SELECT * FROM municipios";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Municípios</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Visualizar Municípios</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['idcidade']}</td>
                    <td>{$row['cidade']}</td>
                    <td>{$row['uf']}</td>
                    <td>
                        <a href='update.php?id={$row['idcidade']}'>Editar</a>
                        <a href='delete.php?id={$row['idcidade']}'>Deletar</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum registro encontrado</td></tr>";
        }
        $conexao->close();
        ?>
    </table>
    <a href="../index.php" class="back-button">Voltar</a>
</body>
</html>
