<?php
include '../conexao.php';

$message = ''; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_code = $_POST['emp_code'];
    $emp_name = $_POST['emp_name'];
    $job_code = $_POST['job_code'];

    $sql = "INSERT INTO funcionario (emp_code, emp_name, job_code) VALUES ('$emp_code', '$emp_name', '$job_code')";
    
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
    <title>Cadastrar Funcionários</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php echo $message; ?>
        <h1>Cadastrar Funcionários</h1>
        <form action="create.php" method="post">
            <label for="emp_code">Código:</label>
            <input type="text" id="emp_code" name="emp_code" required>
            
            <label for="emp_name">Nome:</label>
            <input type="text" id="emp_name" name="emp_name" required>
            
            <label for="job_code">Código do Trabalho:</label>
            <input type="text" id="job_code" name="job_code" required>
            
            <input type="submit" value="Cadastrar">
        </form>

        <div class="back-btn">
            <a href="../index.php">← Voltar ao Início</a>
        </div>
    </div>
</body>
</html>
