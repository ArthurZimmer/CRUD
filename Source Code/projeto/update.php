<?php
include '../conexao.php';

$plan_code = $_GET['plan_code'];
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plan_description = $_POST['plan_description'];

    $sql = "UPDATE projeto SET plan_description='$plan_description' WHERE plan_code='$plan_code'";

    if ($conexao->query($sql) === TRUE) {
        $success = "Registro atualizado com sucesso!";
        $plan_description = "";
    } else {
        $error = "Erro: " . $conexao->error;
    }
}

$sql = "SELECT * FROM projeto WHERE plan_code='$plan_code'";
$result = $conexao->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Projeto</title>
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
        <h2>Atualizar Projeto</h2>
        <?php if ($success): ?>
            <div class="message"><?= $success; ?></div>
        <?php endif; ?>
        
        <form action="update.php?plan_code=<?php echo $plan_code; ?>" method="post">
            <input type="hidden" name="plan_code" value="<?php echo htmlspecialchars($row['plan_code']); ?>">
            
            <label for="plan_description">Descrição do Projeto:</label>
            <input type="text" id="plan_description" name="plan_description" value="<?php echo htmlspecialchars($row['plan_description']); ?>" required>
            
            <input type="submit" value="Atualizar">
            <a href="read.php" class="back-button" style="display: block; text-align: center; margin-top: 20px;">Voltar</a>
        </form>
    </div>
</body>
</html>
