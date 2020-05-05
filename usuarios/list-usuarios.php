<?php

    //Iniciar a session
    session_start();

    //Testar se o usário tem a session
    if(!$_SESSION){

        //Redirecionando para a página de login, caso usuário não tenha
        header('location: ../login/login.php');
    }

    //Includes
    include('../includes/functions.php');

    //Carregando usuários
    $usuarios = carregaUsuarios();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Seja bem vindo(a), <?= $_SESSION['nome'] ?>!</h1>
    <?php

        //Mostrando usuários
        echo "<pre>";
        print_r($usuarios);
        echo "</pre>";

    ?>
    
</body>
</html>