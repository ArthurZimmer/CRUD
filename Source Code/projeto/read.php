<?php
include '../conexao.php';

if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

$sql = "SELECT * FROM projeto";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Projetos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Projetos</h1>
    <table>
        <tr>
            <th>Código do Projeto</th>
            <th>Descrição do Projeto</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['plan_code']}</td>
                    <td>{$row['plan_description']}</td>
                    <td>
                        <a href='update.php?plan_code={$row['plan_code']}'>Editar</a>
                        <a href='delete.php?plan_code={$row['plan_code']}'>Deletar</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum registro encontrado</td></tr>";
        }
        $conexao->close();
        ?>
    </table>
    <a href="../index.php" class="back-button">Voltar</a>
</body>
</html>
