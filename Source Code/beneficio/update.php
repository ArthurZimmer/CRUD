<?php
include '../conexao.php';

$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_code = $_POST['emp_code'];
    $plan_code = $_POST['plan_code'];

    $sql = "UPDATE beneficio SET plan_code='$plan_code' WHERE emp_code='$emp_code'";

    if ($conexao->query($sql) === TRUE) {
        $success = "Registro atualizado com sucesso!";
        $emp_code = "";
        $plan_code = "";
    } else {
        $error = "Erro: " . $conexao->error;
    }
} else {
    $emp_code = $_GET['emp_code'];
    $plan_code = $_GET['plan_code'];

    $sql = "SELECT * FROM beneficio WHERE emp_code='$emp_code' AND plan_code='$plan_code'";
    $result = $conexao->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Benefício</title>
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
        <h2>Atualizar Benefício</h2>
        <?php if ($success): ?>
            <div class="message"><?= $success; ?></div>
        <?php endif; ?>
        
        <form action="update.php" method="post">
            <input type="hidden" name="emp_code" value="<?php echo htmlspecialchars($row['emp_code']); ?>">
            
            <label for="plan_code">Código do Projeto:</label>
            <input type="text" id="plan_code" name="plan_code" value="<?php echo htmlspecialchars($row['plan_code']); ?>" required>
            
            <input type="submit" value="Atualizar">
            <a href="read.php" class="back-button" style="display: block; text-align: center; margin-top: 20px;">Voltar</a>
        </form>
    </div>
</body>
</html>