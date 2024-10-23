<?php 
include '../conexao.php';
$sql = "SELECT * FROM clientes";
$result = $conexao->query($sql); 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Visualizar Clientes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Visualizar Clientes</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Logradouro</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>CEP</th>
            <th>ID Cidade</th>
            <th>Email</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
        <?php 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr> 
                    <td>{$row['idclientes']}</td> 
                    <td>{$row['nome']}</td> 
                    <td>{$row['logradouro']}</td> 
                    <td>{$row['complemento']}</td> 
                    <td>{$row['bairro']}</td> 
                    <td>{$row['cep']}</td> 
                    <td>{$row['idcidade']}</td> 
                    <td>{$row['email']}</td> 
                    <td>{$row['idade']}</td> 
                    <td> 
                        <a href='update.php?id={$row['idclientes']}'>Editar</a> 
                        <a href='delete.php?id={$row['idclientes']}'>Deletar</a> 
                    </td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>Nenhum registro encontrado</td></tr>";
        }
        $conexao->close(); 
        ?>
    </table>
    <a href="../index.php" class="back-button">Voltar</a>
</body>

</html>
