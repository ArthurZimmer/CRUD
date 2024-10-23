<?php
include '../conexao.php';

$message = '';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (nome, senha) VALUES ('$nome', '$senha')";
    
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
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php echo $message; ?>
        <h1>Cadastrar Usuário</h1>
        <form action="create.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            
            <input type="submit" value="Cadastrar">
        </form>

        <div class="back-btn">
            <a href="../index.php">← Voltar ao Início</a>
        </div>
    </div>
</body>
</html>
