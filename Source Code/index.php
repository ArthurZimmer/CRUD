<?php
// index.php
session_start();
include 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Crud</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f5f5f5; 
        }

        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #007BFF; 
            color: white;
            padding: 20px;
            box-sizing: border-box;
            height: 100vh;
        }

        .sidebar h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar-section {
            margin-bottom: 30px;
        }

        .sidebar-section h3 {
            margin-bottom: 10px;
            color: #e0e0e0; 
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 5px;
            background-color: #0056b3; 
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #004494; 
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .logout-button {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin-top: 20px;
            background-color: #dc3545; 
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #c82333; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Sistema</h2>
            
            <div class="sidebar-section">
                <h3>Funcionários</h3>
                <a href="funcionario/create.php">Cadastrar Funcionários</a>
                <a href="funcionario/read.php">Visualizar Funcionários</a>
            </div>
            
            <div class="sidebar-section">
                <h3>Clientes</h3>
                <a href="cliente/create.php">Cadastrar Clientes</a>
                <a href="cliente/read.php">Visualizar Clientes</a>
            </div>
            
            <div class="sidebar-section">
                <h3>Município</h3>
                <a href="municipio/create.php">Cadastrar Município</a>
                <a href="municipio/read.php">Visualizar Municípios</a>
            </div>
            
            <div class="sidebar-section">
                <h3>Benefício</h3>
                <a href="beneficio/create.php">Cadastrar Benefício</a>
                <a href="beneficio/read.php">Visualizar Benefício</a>
            </div>
            <div class="sidebar-section">
                <h3>Trabalho</h3>
                <a href="trabalho/create.php">Cadastrar Trabalho</a>
                <a href="trabalho/read.php">Visualizar Trabalho</a>
            </div>
            <div class="sidebar-section">
                <h3>Projeto</h3>
                <a href="projeto/create.php">Cadastrar Projeto</a>
                <a href="projeto/read.php">Visualizar Projeto</a>
            </div>
            <div class="sidebar-section">
                <h3>Usuário</h3>
                <a href="usuario/create.php">Cadastrar Usuário</a>
                <a href="usuario/read.php">Visualizar Usuário</a>
            </div>
            
            <a href="logout.php" class="logout-button">Logout</a> 
        </div> 
    </div>
    <div class="content">
        <h1>Bem-vindo, <?php echo $_SESSION['user_nome']; ?>!</h1>
    </div>
</body>
</html>
