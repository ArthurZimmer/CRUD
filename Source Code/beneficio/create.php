<?php
include '../conexao.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_code = $_POST['emp_code'];
    $plan_code = $_POST['plan_code'];

    $sql = "INSERT INTO beneficio (emp_code, plan_code) VALUES (?, ?)";
    $stmt = $conexao->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conexao->error);
    }

    $stmt->bind_param("ss", $emp_code, $plan_code);

    if ($stmt->execute()) {
        $message = "<div class='success-msg'>Novo registro criado com sucesso</div>";
    } else {
        $message = "<div class='error-msg'>Erro: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Benefício</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <?php echo $message; ?>
        <h1>Cadastrar Benefício</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="emp_code">Código do Funcionário:</label>
            <input type="text" id="emp_code" name="emp_code" required>
            
            <label for="plan_code">Código do Projeto:</label>
            <input type="text" id="plan_code" name="plan_code" required>
            
            <input type="submit" value="Cadastrar">
        </form>

        <div class="back-btn">
            <a href="../index.php">← Voltar ao Início</a>
        </div>
    </div>
</body>

</html>
