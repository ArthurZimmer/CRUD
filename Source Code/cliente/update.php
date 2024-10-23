<?php
include '../conexao.php';

$id = $_GET['id'];
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $logradouro = $_POST['logradouro'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $idcidade = $_POST['idcidade'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    $sql = "UPDATE clientes SET nome='$nome', logradouro='$logradouro', complemento='$complemento', bairro='$bairro', cep='$cep', idcidade='$idcidade', email='$email', idade='$idade' WHERE idclientes='$id'";
    
    if ($conexao->query($sql) === TRUE) {
        $success = "Registro atualizado com sucesso!";
        $nome = "";
        $logradouro = "";
        $complemento = "";
        $bairro = "";
        $cep = "";
        $idcidade = "";
        $email = "";
        $idade = "";
    } else {
        $error = "Erro: " . $conexao->error;
    }
}

$sql = "SELECT * FROM clientes WHERE idclientes='$id'";
$result = $conexao->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Clientes</title>
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
        <h2>Atualizar Clientes</h2>
        <?php if ($success): ?>
            <div class="message"><?= $success; ?></div>
        <?php endif; ?>
        
        <form action="update.php?id=<?php echo $id; ?>" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>" required>
            
            <label for="logradouro">Logradouro:</label>
            <input type="text" id="logradouro" name="logradouro" value="<?php echo htmlspecialchars($row['logradouro']); ?>" required>
            
            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento" value="<?php echo htmlspecialchars($row['complemento']); ?>">
            
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($row['bairro']); ?>" required>
            
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" value="<?php echo htmlspecialchars($row['cep']); ?>" required>
            
            <label for="idcidade">ID Cidade:</label>
            <input type="text" id="idcidade" name="idcidade" value="<?php echo htmlspecialchars($row['idcidade']); ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" value="<?php echo htmlspecialchars($row['idade']); ?>" required min="0">
            
            <input type="submit" value="Atualizar">
            <a href="read.php" class="back-button" style="display: block; text-align: center; margin-top: 20px;">Voltar</a>
        </form>
    </div>
</body>
</html>
