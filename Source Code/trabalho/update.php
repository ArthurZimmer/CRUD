<?php
include '../conexao.php';

$job_code = $_GET['job_code'];
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $job_description = $_POST['job_description'];

    $sql = "UPDATE trabalho SET job_description='$job_description' WHERE job_code='$job_code'";

    if ($conexao->query($sql) === TRUE) {
        $success = "Registro atualizado com sucesso!";
        $job_description = "";
    } else {
        $error = "Erro: " . $conexao->error;
    }
}

$sql = "SELECT * FROM trabalho WHERE job_code='$job_code'";
$result = $conexao->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Trabalho</title>
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
        <h2>Atualizar Trabalho</h2>
        <?php if ($success): ?>
            <div class="message"><?= $success; ?></div>
        <?php endif; ?>
        
        <form action="update.php?job_code=<?php echo $job_code; ?>" method="post">
            <input type="hidden" name="job_code" value="<?php echo htmlspecialchars($row['job_code']); ?>">
            
            <label for="job_description">Descrição do Trabalho:</label>
            <input type="text" id="job_description" name="job_description" value="<?php echo htmlspecialchars($row['job_description']); ?>" required>
            
            <input type="submit" value="Atualizar">
            <a href="read.php" class="back-button" style="display: block; text-align: center; margin-top: 20px;">Voltar</a>
        </form>
    </div>
</body>
</html>
