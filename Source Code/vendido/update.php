<?php
include '../includes/db.php';

$id = $_GET['id'];
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto_codigo = $_POST['produto_codigo'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE VENDIDO_WEB SET PRODUTO_CODIGO='$produto_codigo', QUANTIDADE='$quantidade' WHERE ID='$id'";
    
    if ($conn->query($sql) === TRUE) {
        $success = "Registro de venda atualizado com sucesso!";
        $produto_codigo = "";
        $quantidade = "";
    } else {
        $error = "Erro: " . $conn->error;
    }
}

$sql = "SELECT * FROM VENDIDO_WEB WHERE ID='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Vendas</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Atualizar Vendas</h2>
        <?php if ($success): ?>
            <div class="message"><?= $success; ?></div>
        <?php endif; ?>
        
        <form action="update.php?id=<?php echo $id; ?>" method="post">
            <label for="produto_codigo">Código do Produto:</label>
            <input type="text" id="produto_codigo" name="produto_codigo" value="<?php echo htmlspecialchars($row['PRODUTO_CODIGO']); ?>" required>

            <label for="quantidade">Quantidade:</label>
            <input type="text" id="quantidade" name="quantidade" value="<?php echo htmlspecialchars($row['QUANTIDADE']); ?>" required>

            <input type="submit" value="Atualizar">
            <a href="read.php" class="back-button" style="display: block; text-align: center; margin-top: 20px;">Voltar</a>
        </form>
    </div>
</body>
</html>
