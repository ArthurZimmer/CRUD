<?php
include '../conexao.php';

$id = $_GET['id'];
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    $sql = "UPDATE municipios SET cidade='$cidade', uf='$uf' WHERE idcidade='$id'";
    
    if ($conexao->query($sql) === TRUE) {
        $success = "Registro atualizado com sucesso!";
        $cidade = "";
        $uf = "";
    } else {
        $error = "Erro: " . $sql . "<br>" . $conexao->error;
    }
}

$sql = "SELECT * FROM municipios WHERE idcidade='$id'";
$result = $conexao->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Município</title>
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
        <h2>Atualizar Município</h2>
        <?php if ($success): ?>
            <div class="message"><?= $success; ?></div>
        <?php endif; ?>
        
        <form action="update.php?id=<?php echo $id; ?>" method="post">
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($row['cidade']); ?>" required>
            
            <label for="uf">UF:</label>
            <input type="text" id="uf" name="uf" value="<?php echo htmlspecialchars($row['uf']); ?>" maxlength="2" required>
            
            <input type="submit" value="Atualizar">
            <a href="read.php" class="back-button" style="display: block; text-align: center; margin-top: 20px;">Voltar</a>
        </form>
    </div>
</body>
</html>
