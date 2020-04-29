<?php

    //Includes
    include('../includes/functions.php');

    //Carregando usuários
    $usuarios = carregaUsuarios();

    //Mostrando usuários
    echo "<pre>";
    print_r($usuarios);
    echo "</pre>";

?>