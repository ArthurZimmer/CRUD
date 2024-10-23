<?php
include '../conexao.php';

$idusuarios = $_GET['idusuarios'];
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = "UPDATE usuarios SET nome='$nome', senha='$senha' WHERE idusuarios='$idusuarios'";

    if ($conexao->query($sql) === TRUE) {
        $success = "Registro atualizado com sucesso!";
        $nome = "";
        $senha = "";
    } else {
        $error = "Erro: " . $conexao->error;
    }
}

$sql = "SELECT * FROM usuarios WHERE idusuarios='$idusuarios'";
$result = $conexao->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Usuário</title>
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
        <h2>Atualizar Usuário</h2>
        <?php if ($success): ?>
            <div class="message"><?= $success; ?></div>
        <?php endif; ?>
        
        <form action="update.php?idusuarios=<?php echo $idusuarios; ?>" method="post">
            <input type="hidden" name="idusuarios" value="<?php echo htmlspecialchars($row['idusuarios']); ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>" required>
            
            <label for="senha">Senha:</label>
            <input type="text" id="senha" name="senha" value="<?php echo htmlspecialchars($row['senha']); ?>" required>
            
            <input type="submit" value="Atualizar">
            <a href="read.php" class="back-button" style="display: block; text-align: center; margin-top: 20px;">Voltar</a>
        </form>
    </div>
</body>
</html>
