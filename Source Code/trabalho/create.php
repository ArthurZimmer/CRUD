<?php
include '../conexao.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $job_description = $_POST['job_description'];

    $sql = "INSERT INTO trabalho (job_description) VALUES ('$job_description')";
    
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
    <title>Cadastrar Trabalho</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php echo $message; ?>
        <h1>Cadastrar Trabalho</h1>
        <form action="create.php" method="post">
            <label for="job_description">Descrição do Trabalho:</label>
            <input type="text" id="job_description" name="job_description" required>
            
            <input type="submit" value="Cadastrar">
        </form>

        <div class="back-btn">
            <a href="../index.php">← Voltar ao Início</a>
        </div>
    </div>
</body>
</html>
