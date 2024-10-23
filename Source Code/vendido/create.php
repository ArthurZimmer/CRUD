<?php
include '../includes/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto_codigo = $_POST['produto_codigo'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO VENDIDO_WEB (PRODUTO_CODIGO, QUANTIDADE) VALUES ('$produto_codigo', '$quantidade')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "<div class='success-msg'>Novo registro de venda criado com sucesso</div>";
    } else {
        $message = "<div class='error-msg'>Erro: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Vendas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php echo $message; ?>
        <h1>Cadastrar Vendas</h1>
        <form action="create.php" method="post">
            <label for="produto_codigo">Código do Produto:</label>
            <input type="text" id="produto_codigo" name="produto_codigo" required>
            
            <label for="quantidade">Quantidade:</label>
            <input type="text" id="quantidade" name="quantidade" required>
            
            <input type="submit" value="Criar">
        </form>

        <div class="back-btn">
            <a href="../index.php">← Voltar ao Início</a>
        </div>
    </div>
</body>
</html>
