<?php
include '../conexao.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plan_description = $_POST['plan_description'];

    $sql = "INSERT INTO projeto (plan_description) VALUES ('$plan_description')";
    
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
    <title>Cadastrar Projeto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php echo $message; ?>
        <h1>Cadastrar Projeto</h1>
        <form action="create.php" method="post">
            <label for="plan_description">Descrição do Projeto:</label>
            <input type="text" id="plan_description" name="plan_description" required>
            
            <input type="submit" value="Cadastrar">
        </form>

        <div class="back-btn">
            <a href="../index.php">← Voltar ao Início</a>
        </div>
    </div>
</body>
</html>
