<?php
include '../conexao.php';

$sql = "SELECT * FROM funcionario";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Funcionários</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Funcionários</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Nome</th>
            <th>Código do Trabalho</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['emp_code']}</td>
                    <td>{$row['emp_code']}</td>
                    <td>{$row['emp_name']}</td>
                    <td>{$row['job_code']}</td>
                    <td>
                        <a href='update.php?id={$row['emp_code']}'>Editar</a>
                        <a href='delete.php?id={$row['emp_code']}'>Deletar</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum registro encontrado</td></tr>";
        }
        $conexao->close();
        ?>
    </table>
    <a href="../index.php" class="back-button">Voltar</a>
</body>
</html>
