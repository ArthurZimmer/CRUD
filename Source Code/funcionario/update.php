<?php
include '../conexao.php';

$id = $_GET['id'];
$success = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];

    $sql = "UPDATE funcionario SET emp_code='$codigo', emp_name='$nome', job_code='$usuario' WHERE emp_code='$id'";
    
    if ($conexao->query($sql) === TRUE) {
        $success = "Registro atualizado com sucesso!"; 
        $codigo = "";
        $nome = "";
        $usuario = "";
    } else {
        $error = "Erro: " . $sql . "<br>" . $conexao->error;
    }
}

$sql = "SELECT * FROM funcionario WHERE emp_code='$id'";
$result = $conexao->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Funcionários</title>
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
        .back-button {
            display: inline-block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 15px;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Atualizar Funcionários</h2>
        <?php if ($success): ?>
            <div class="message"><?= $success; ?></div>
        <?php endif; ?>
        
        <form action="update.php?id=<?php echo $id; ?>" method="post">
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" value="<?php echo htmlspecialchars($codigo ?? $row['emp_code']); ?>" required>
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome ?? $row['emp_name']); ?>" required>
            
            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($usuario ?? $row['job_code']); ?>" required>
            
            <input type="submit" value="Atualizar">
            <a href="read.php" class="back-button">Voltar</a> 
        </form>
    </div>
</body>
</html>
