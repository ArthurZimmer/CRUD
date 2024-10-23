<?php
$localhost = "127.0.0.1";
$user = "root";
$password = "";
$banco = "crud2";

$conexao = new mysqli($localhost, $user, $password, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>