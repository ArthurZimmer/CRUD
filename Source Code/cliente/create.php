<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../conexao.php';

if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $logradouro = $_POST['logradouro'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $idcidade = $_POST['idcidade'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    $sql = "INSERT INTO clientes (nome, logradouro, complemento, bairro, cep, idcidade, email, idade) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conexao->error);
    }

    $stmt->bind_param("ssssiisi", $nome, $logradouro, $complemento, $bairro, $cep, $idcidade, $email, $idade);

    if ($stmt->execute()) {
        $message = "<div class='success-msg'>Novo cliente criado com sucesso</div>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Cliente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <?php echo $message; ?>
        <h1>Criar Cliente</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="logradouro">Logradouro:</label>
            <input type="text" id="logradouro" name="logradouro" required>
            
            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento">
            
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" required>
            
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" required>

            <label for="idcidade">ID Cidade:</label>
            <input type="number" id="idcidade" name="idcidade" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required>

            <input type="submit" value="Criar" style="margin-top: 15px;">
        </form>
        <div class="back-btn">
            <a href="../index.php">← Voltar ao Início</a>
        </div>
    </div>
</body>

</html>
