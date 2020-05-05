<?php

    //Includes
    include("../includes/functions.php");

    $loginOk = true;
    //Verificar se o form do login foi enviado
    if ($_POST) {

        //Buscar um usuário com e-mail enviado no $_POST['email']
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuarios = carregaUsuarios();

        foreach ($usuarios as $usuario) {
            //Testando se usuário está cadastrado
            if ($usuario['email'] == $email) {
                //Usuário ok, testando senha
                if (password_verify($senha, $usuario['senha'])){

                    //Iniciar a session
                    session_start();

                    //Criando a session para o usuário 
                    //Isso manda o cookie para o usuário, de forma que ele permaneça identificado quando retornar à página
                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['imagem'] = $usuario['imagem'];
                    $_SESSION['telefone'] = $usuario['telefone'];

                    //Chegando nesse ponto, vou redirecioná-lo para a pag que lista usuários
                    header('location: ../usuarios/list-usuarios.php');
                }
            }
        }
        //Se não achar o usuário, exibir um erro     
        $loginOk = false;

    }

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
        <label for="email"><input id="email" name="email" type="text" placeholder="E-mail"></label>
        <label for="senha"><input id="senha" name="senha" type="password" placeholder="Senha"></label>
        <!--Se não achar o usuário, exibir um erro!-->
        <?= ($loginOk?'':'<span class="error">Falha no login</span>') ?>
        <button type="submit">Entrar</button>        

    </form>
    
</body>
</html>