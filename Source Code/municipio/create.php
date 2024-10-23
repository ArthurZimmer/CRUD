<?php
include '../conexao.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    $sql = "INSERT INTO municipios (cidade, uf) VALUES ('$cidade', '$uf')";
    
    if ($conexao->query($sql) === TRUE) {
        $message = "<div class='success-msg'>Novo registro criado com sucesso</div>";
    } else {
        $message = "<div class='error-msg'>Erro: " . $sql . "<br>" . $conexao->error . "</div>";
    }

    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Municípios</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php echo $message; ?>
        <h1>Cadastrar Municípios</h1>
        <form action="create.php" method="post">
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required>
            
            <label for="uf">UF:</label>
            <input type="text" id="uf" name="uf" maxlength="2" required>
            
            <input type="submit" value="Cadastrar">
        </form>

        <div class="back-btn">
            <a href="../index.php">← Voltar ao Início</a>
        </div>
    </div>
</body>
</html>
