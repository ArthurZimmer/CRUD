<?php
include '../conexao.php';

if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

$sql = "SELECT * FROM beneficio";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Benefícios</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Benefícios</h1>
    <table>
        <tr>
            <th>Código do Funcionário</th>
            <th>Código do Plano</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['emp_code']}</td>
                    <td>{$row['plan_code']}</td>
                    <td>
                        <a href='update.php?emp_code={$row['emp_code']}&plan_code={$row['plan_code']}'>Editar</a>
                        <a href='delete.php?emp_code={$row['emp_code']}&plan_code={$row['plan_code']}'>Deletar</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum registro encontrado</td></tr>";
        }
        ?>
    </table>
    <a href="../index.php" class="back-button">Voltar</a>
    <?php
    $conexao->close();
    ?>
</body>
</html>
