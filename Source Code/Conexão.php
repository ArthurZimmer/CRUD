<?php    
    $localhost = "127.0.0.1";
    $user = "root";
    $password = "";
    $banco = "crud2";
    $conn = mysqli_connect($localhost, $user, $password, $banco);
    if (! $conn){
        echo "Não conectou";
    }
?>